<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Import Log facade
use Spatie\SimpleExcel\SimpleExcelReader;


use App\Models\User;
use App\Models\Course;
use App\Models\Source;
use App\Models\Reference;
use App\Models\Technology;
use App\Models\Module;
use App\Models\Employee_detail;
use App\Models\Modules_assigned_detail;
use App\Models\ReferencesAssignedDetail;
use App\Models\SourcesAssignedDetail;
use App\Models\Role;
use App\Models\StudentDetail;
use App\Models\StudentsTechnologyDetail;
use App\Models\StudentsReferenceDetail;

class AdminController extends Controller
{
    /******Check module Access******/
    private function checkModuleAccess($moduleId)
    {
        $userId = session('user_id');
        $userType = session('user_type');

        if ($userType === 'Super Admin') {
            return true;
        }
        return $this->userHasModuleAccess($userId, $moduleId);
    }

    protected function userHasModuleAccess($userId, $moduleId)
    {
        return Modules_assigned_detail::where('user_id', $userId)
            ->where('module_id', $moduleId)
            ->exists();
    }

    /******Check module Access End******/

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['adminlog' => true]);
            session(['user_id' => $user->id, 'user_type' => $user->user_type]);
            return redirect('/dashboard');
        } else {
            session(['adminlog' => false]);
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }
    }

    public function user_logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function admin_dashboard()
    {

        /*
        if ($userType === 'Super Admin') 
        {
            
        }
        else
        {
            $user = Employee_detail::where('userid', $userId)->first();
            $user_title = $user->emp_name;
            
        }
        */
        $userId = session('user_id');
        $userType = session('user_type');

        if ($userType === 'Super Admin') 
        {
            $students = StudentDetail::select('student_details.*', 'courses.course_name')
            ->join('courses', 'student_details.course_id', '=', 'courses.id')
            ->orderBy('student_details.id')
            ->get();

            $user_title = "ADMIN";
        }
        else
        {

            $students = StudentDetail::select('student_details.*', 'courses.course_name')
    ->join('courses', 'student_details.course_id', '=', 'courses.id')
    ->whereIn('student_details.id', function ($query) use ($userId) {
        $query->select('studentid')
            ->from('students_reference_details')
            ->whereIn('employee_id', function ($subquery) use ($userId) {
                $subquery->select('reference_id')
                    ->from('references_assigned_details')
                    ->where('user_id', $userId);
            });
    })
    ->orderBy('student_details.id')
    ->get();

            $user = Employee_detail::where('userid', $userId)->first();
            $user_title = $user->emp_name;
        }

    return view('admin_dashboard', ['students' => $students], compact('user_title'));

    }

    public function new_course()
    {
        $moduleId = 1;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        return view('add_new_course');
    }

    public function add_course_action(Request $request)
    {
        Course::insert([
            'course_id'=>$request->course_id,
            'course_name'=>$request->course_name,
            'status'=>1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/new_course')->with('success', 'Successfully course created.');
    }

    public function view_course()
    {
        $moduleId = 2;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $courses=Course::where('status', 1)->get();
        return view('view_courses',['courses'=>$courses]);
    }
    public function edit($id)
    {
        $moduleId = 3;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
    
        $course = Course::find($id);
        return view('edit_course', ['course' => $course]);
    }

    public function destroy($id)
    {
        $moduleId = 4;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }

        Course::where('id', $id)
        ->update([
            'status' => 0,
            'updated_at' => now(),
        ]);

        return redirect('view_course')->with('success', 'Course deleted successfully');
    }

    public function edit_course_action(Request $request, $id)
    {
        Course::where('id', $id)
                ->update([
                            'course_id'=>$request->course_id,
                            'course_name'=>$request->course_name,
                            'status'=>1,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
        return redirect('/view_course')->with('success', 'Successfully course updated.');
    }
                    
    public function new_source()
    {
        $moduleId = 5;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        return view('/add_new_source');
    }
    
    public function edit_source($id)
    {
        $moduleId = 8;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }

        $source = Source::find($id);
        return view('edit_source', ['source' => $source]);
    }

    public function add_source_action(Request $request)
    {
        Source::insert([
                    'source_name'=>$request->source_name,
                    'status'=>1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                    ]);
        return redirect('/new_source')->with('success', 'Successfully source created.');
    }
    public function view_sources()
    {
        $moduleId = 6;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $sources=Source::where('status', 1)->get();
        return view('view_sources',['sources'=>$sources]);
    }
    public function edit_source_action(Request $request, $id)
    {
        Source::where('id', $id)
                ->update([
                            'source_name'=>$request->source_name,
                            'status'=>1,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
        return redirect('/view_sources')->with('success', 'Successfully Source updated.');
    }
    public function delete_source($id)
    {
        $moduleId = 7;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        Source::where('id', $id)
        ->update([
            'status' => 0,
            'updated_at' => now(),
        ]);

        return redirect('view_sources')->with('success', 'Source deleted successfully');
    }

    public function new_reference()
    {
        $moduleId = 17;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        return view('/add_new_reference');
    }
    public function add_reference_action(Request $request)
    {
        Reference::insert([
                    'reference_name'=>$request->reference_name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                    ]);
        return redirect('/new_reference')->with('success', 'Successfully reference created.');
    }

    public function view_reference()
    {
        $moduleId = 18;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $reference=Reference::all();
        return view('view_reference',['reference'=>$reference]);
    }

    public function edit_reference($id)
    {
        $moduleId = 19;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $reference = Reference::find($id);
        return view('edit_reference', ['reference' => $reference]);
    }

    public function edit_reference_action(Request $request, $id)
    {
        Reference::where('id', $id)
                ->update([
                            'reference_name'=>$request->reference_name,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
        return redirect('/view_reference')->with('success', 'Successfully Reference updated.');
    }

    public function delete_reference(Request $request, $id)
    {
        $moduleId = 20;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        Reference::where('id', $id)
                ->delete();

        return redirect('/view_reference')->with('success', 'Successfully Reference deleted.');
    }

    public function new_technology()
    {
        $moduleId = 9;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        return view('/add_new_technology');
    }
    public function add_technology_action(Request $request)
    {
        $requestTechnologyName = $request->input('technology_name');
        $file = $request->file('photo');
        $randomNumber = mt_rand(1000, 9999);
        $fileName = $randomNumber . '_' . $requestTechnologyName . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('upload', $fileName);
        $destinationPath = 'upload';
        $file->move($destinationPath,$path);

        Technology::insert([
                    'technology_name'=>$request->technology_name,
                    'photo_path'=>$path,
                    'status'=>1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                    ]);
        return redirect('/new_technology')->with('success', 'Successfully Technology Created.');
    }

    public function view_technologies()
    {
        $moduleId = 10;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $technologies = Technology::where('status', 1)->get();
        return view('view_technologies', ['technologies' => $technologies]);
    }

    public function edit_technology($id)
    {
        $moduleId = 11;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $technology = Technology::find($id);
        return view('edit_technology', ['technology' => $technology]);
    }

    public function edit_technology_action(Request $request, $id)
    {
    $requestTechnologyName = $request->input('technology_name');
    $file = $request->file('photo');
    $destinationPath = 'upload';

    // Find the existing technology
    $technology = Technology::find($id);

    if($file) 
    {
        $randomNumber = mt_rand(1000, 9999);
        $fileName = $randomNumber . '_' . $requestTechnologyName . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($destinationPath, $fileName);
        $file->move($destinationPath,$path); 
        Storage::delete($technology->photo_path);
        
    }
    else 
    {
        $path = $technology->photo_path;
    }

    Technology::where('id', $id)
        ->update([
            'technology_name' => $requestTechnologyName,
            'photo_path' => $path,
            'updated_at' => now(),
        ]);

    return redirect('/view_technologies')->with('success', 'Technology successfully updated.');
}
public function delete_technology($id)
    {
        $moduleId = 12;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        Technology::where('id', $id)
        ->update([
            'status' => 0,
            'updated_at' => now(),
        ]);

        return redirect('/view_technologies')->with('success', 'Technology successfully deleted.');
    }

    public function new_user()
    {
        $moduleId = 13;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $module = Module::all();
        $roles = Role::all();
        $reference = Reference::all();
        $sources = Source::all();

        return view('new_user', [
            'module' => $module,
            'reference' => $reference,
            'sources' => $sources,
            'roles' => $roles,
        ]);
    }
    public function new_user_action(Request $request)
    {
        // Validate the user input
        // $request->validate([
        //     'email' => 'required|email|unique:users,username',
        //     'password' => 'required|min:8|max:20|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+]{8,}$/',
        //     'emp_id' => 'required',
        //     'emp_name' => 'required',
        //     'contact_number' => 'required|numeric|digits_between:10,10', // Set your desired min and max limits
        //     'designation' => 'required',
        //     // Add more validation rules as needed
        // ]);
        
    
        // Create a new user
        $user = User::create([
            'username' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => 'employee',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        $userId = $user->id;
    
        // Insert employee details
        Employee_detail::create([
            'userid' => $userId,
            'emp_id' => $request->emp_id,
            'emp_name' => $request->emp_name,
            'email' => $request->email,
            'contact_no' => $request->contact_number,
            'designation' => $request->designation,
            'team_lead' => 0,
            'marketing_manager' => 0,
            'reporting_person' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Assign modules, references, and sources
        $this->assignModules($userId, $request->input('modules', []), Modules_assigned_detail::class,'module_id');
        // $this->assignModules($userId, $request->input('references', []), ReferencesAssignedDetail::class,'reference_id');
        $this->assignModules($userId, $request->input('sources', []), SourcesAssignedDetail::class,'source_id');
    
        return redirect('/new_user')->with('success', 'Successfully User created.');
    }
    
    protected function assignModules($userId, $moduleIds, $model, $field)
    {
        foreach ($moduleIds as $moduleId) {
            $model::create([
                'user_id' => $userId,
                $field => $moduleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function edit_user_action(Request $request, $userId)
    {
        // Validate the user input
        // Add your validation rules as needed

        // Update the user
        $user = User::find($userId);

        // Update employee details
        $employeeDetails = Employee_detail::where('userid', $userId)->first();
        $employeeDetails->update([
            'emp_id' => $request->emp_id,
            'emp_name' => $request->emp_name,
            'email' => $request->email,
            'contact_no' => $request->contact_number,
            'designation' => $request->designation,
            'team_lead' => $request->team_lead,
            'marketing_manager' => $request->manager,
            'reporting_person' => $request->reporting_person,
            'updated_at' => now(),

        ]);

        // Update assigned modules, references, and sources
        $this->updateAssignedModules($userId, $request->input('modules', []), Modules_assigned_detail::class, 'module_id');
        $this->updateAssignedModules($userId, $request->input('references', []), ReferencesAssignedDetail::class, 'reference_id');
        $this->updateAssignedModules($userId, $request->input('sources', []), SourcesAssignedDetail::class, 'source_id');

        return redirect('/edit_user/'.$userId)->with('success', 'User updated successfully.');
    }

protected function updateAssignedModules($userId, $moduleIds, $model, $field)
    {
        // Delete existing assignments
        $model::where('user_id', $userId)->delete();

        // Insert updated assignments
        foreach ($moduleIds as $moduleId) {
            $model::create([
                'user_id' => $userId,
                $field => $moduleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function view_users()
    {
        $moduleId = 16;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        //$users=Employee_detail::all();
        $users = Employee_detail::whereIn('userid', function ($query) {
            $query->select('id')->from('users')->where('status', 1);
        })->get();
        
        return view('view_users',['users'=>$users]);
    }

    public function delete_user($id)
    {
        $moduleId = 14;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        
        User::where('id', $id)
        ->update([
            'status' => 0,
            'updated_at' => now(),
        ]);

        return redirect('/view_users')->with('success', 'User successfully deleted.');
    }


    public function new_roles()
    {
        $moduleId = 21;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        return view('/add_new_role');
    }

    public function add_roles_action(Request $request)
    {
        Role::insert([
                    'role_title'=>$request->role_title,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                    ]);
        return redirect('/new_roles')->with('success', 'Successfully Role Created.');
    }

    //edit user
    public function edit_user(Request $request)
    {
        $moduleId = 25;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }

        $id=$request->id;

        $users= Employee_detail::where('userid', $id)->get();

        $user_reference = Employee_detail::whereIn('userid', function ($query) {
            $query->select('id')->from('users')->where('status', 1);
        })->get();

        $teamleads = $this->getEmployeesByRole(['Marketing Lead', 'Marketing Manager', 'Manager']);
        $marketingmanagers = $this->getEmployeesByRole(['Marketing Manager', 'Manager']);
        $managers = $this->getEmployeesByRole(['Manager']);

            $module = Module::all();
            $roles = Role::all();
            $reference = Reference::all();
            $sources = Source::all();


        return view('edit_user', [
            'teamleads' => $teamleads,
            'marketingmanagers' => $marketingmanagers,
            'managers' => $managers,
            'users' => $users,
            'module' => $module,
            'reference' => $reference,
            'sources' => $sources,
            'roles' => $roles,
            'user_reference'=>$user_reference
        ]);
    }
    // Helper function to retrieve employees by role
    private function getEmployeesByRole($roles)
    {
        return Employee_detail::select('employee_details.*', 'roles.role_title')
            ->join('roles', 'employee_details.designation', '=', 'roles.id')
            ->whereIn('roles.role_title', $roles)
            ->get();
    }

    public function view_more_users()
    {
        return view('view_more_users');
    }

    //Student registration

    public function new_student()
    {
        $moduleId = 22;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $courses = Course::all();

        $technology = Technology::all();

        $reference = Employee_detail::whereIn('userid', function ($query) {
            $query->select('id')->from('users')->where('status', 1);
        })->get();

        $sources = Source::all();

        $admissionNo = 'SC' . mt_rand(10000, 99999);

        return view('add_new_student', [
            'courses' => $courses,
            'reference' => $reference,
            'sources' => $sources,
            'technology' => $technology,
            'admissionNo' => $admissionNo
        ]);
    }

    public function test($id){
        
        //$references = Reference::where('id', '!=', $id)->get();

        // $references = Employee_detail::whereNotIn('userid', function ($query) {
        //     $query->select('id')->from('users')->where('status', 1);
        // })->where('userid', '!=', $id)->get();

        $references = Employee_detail::where('userid', '!=', $id)
    ->whereIn('userid', function ($query) {
        $query->select('id')->from('users')->where('status', 1);
    })
    ->get();

      foreach($references as $rf)
      {
        echo '<div class="col-md-3">
		<label class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" name="references_shared[]" value="'.$rf->userid.'">
				<span class="form-check-label">'.$rf->emp_name.'</span>
			</label>
	        </div>';
      }
 
}

public function new_student_action(Request $request)
{
    $request->validate([
        'joining_date' => 'required|date',
        'student_name' => 'required|string',
        'course_id' => 'required|exists:courses,id',
        'fee_paid' => 'required|numeric',
        'total_fee' => 'required|numeric',
        'contact_no' => 'required|string',
        'email' => 'required|email',
        'comments' => 'nullable|string',
        'reference_owner' => 'nullable|exists:references,id',
        'sources_id' => 'required|exists:sources,id',
        'technology' => 'array',	
    ]);

    $selectedCertificates = $request->input('certificate_details', []);
    $certificates = implode(',', $selectedCertificates);

    $student = StudentDetail::create([
        'admission_no' => $request->admission_no,
        'joining_date' => $request->joining_date,
        'name' => $request->student_name,
        'course_id' => $request->course_id,
        'total_fee' => $request->total_fee,
        'fee_paid' => $request->fee_paid,
        'contact_no' => $request->contact_no,
        'email_id' => $request->email,
        'comments' => $request->comments,
        'source_id' => $request->sources_id,
        'certificate_status' => $certificates,
        'status' => 1,
    ]);

    $studentId = $student->id;
    foreach ($request->technologyids as $technologyid) 
    {   
        StudentsTechnologyDetail::insert([
            'studentid'=>$studentId,
            'technology_id'=>$technologyid,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]); 
    }

    StudentsReferenceDetail::insert([
        'studentid'=>$studentId,
        'employee_id'=>$request->reference_owner,
        'type'=>"Owner",
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ]); 

        if ($request->has('references_shared') && !empty($request->input('references_shared'))) {

            $selectedReferences = $request->input('references_shared');
   
            foreach ($selectedReferences as $refId) {
                StudentsReferenceDetail::insert([
                    'studentid'=>$studentId,
                    'employee_id'=>$refId,
                    'type'=>"Distributer",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

    return redirect('/new_student')->with('success', 'Successfully Student Details Created.');

    
}
public function view_students()
    {
        $moduleId = 23;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $userId = session('user_id');
        $userType = session('user_type');

        if ($userType === 'Super Admin') 
        {
            $students = StudentDetail::select('student_details.*', 'courses.course_name')
            ->join('courses', 'student_details.course_id', '=', 'courses.id')
            ->orderBy('student_details.id')
            ->get();
        }
        else
        {

            $students = StudentDetail::select('student_details.*', 'courses.course_name')
                        ->join('courses', 'student_details.course_id', '=', 'courses.id')
                        ->whereIn('student_details.id', function ($query) use ($userId) {
                            $query->select('studentid')
                            ->from('students_reference_details')
                            ->whereIn('employee_id', function ($subquery) use ($userId) {
                            $subquery->select('reference_id')
                            ->from('references_assigned_details')
                            ->where('user_id', $userId);
                            });
                        })
                        ->orderBy('student_details.id')
                        ->get();
        }

    return view('view_students', ['students' => $students]);

    }

    // public function view_all_students()
    // {

    // return view('view_all_students');

    // }

    public function add_bulk_data()
    {
        $moduleId = 24;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        return view('bulk_student_registration');
    }

    
    public function bulk_registration_action(Request $request)
    {
        Log::info('Start bulk_registration_action');
    
        try {
            $file = $request->file('excel_data');
    
            // Generate a unique filename by appending a timestamp
            $timestamp = now()->timestamp;
            $filename = "temp_file_{$timestamp}.csv";
    
            // Store the file in the storage/app/excel directory with the unique filename
            $filePath = $file->storeAs('excel', $filename, 'local');
    
            // Log storage path and file path for debugging
            Log::info("Storage Path: " . Storage::path('excel'));
            Log::info("File Path: " . $filePath);
    
            // Read the Excel file using spatie/simple-excel with the 'csv' reader
            $excelFilePath = Storage::path($filePath);
            Log::info("Full file path: {$excelFilePath}");
    
            // Log the content of the CSV file for debugging
            Log::info("CSV File Content: " . file_get_contents($excelFilePath));
    
            // Continue with the rest of your code...
            $excel = SimpleExcelReader::create($excelFilePath)
                ->useDelimiter(',');
    
            foreach ($excel->getRows() as $row) {
                // Log the row for debugging
                Log::info('Row Data: ' . json_encode($row));
    
                // Create a new StudentDetail record for each row
                $student = StudentDetail::create([
                    'admission_no' => $row['admission_no'],
                    'joining_date' => $row['joining_date'],
                    'name' => $row['name'],
                    'course_id' => $row['course_id'],
                    'total_fee' => $row['total_fee'],
                    'fee_paid' => $row['fee_paid'],
                    'contact_no' => $row['contact_no'],
                    'email_id' => $row['email_id'],
                    'comments' => $row['comments'],
                    'source_id' => $row['source_id'],
                    'certificate_status' => $row['certificate_status'],
                    'status' => $row['status'],
                ]);

                $studentId = $student->id;
                $ref_id = $row['reference'];
                $tech_id = $row['technology'];

                if ($row['multiple_technology'] == 1) {

                    $technology_array = explode(",", $tech_id);
                
                    foreach ($technology_array as $techId) {
                        StudentsTechnologyDetail::insert([
                            'studentid'=>$studentId,
                            'technology_id'=>$techId,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ]); 
                    }

                }
                else{
                    StudentsTechnologyDetail::insert([
                        'studentid'=>$studentId,
                        'technology_id'=>$tech_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                        ]); 
                }

                if ($row['multiple_reference'] == 1) {                   
                    $reference_array = explode(",", $ref_id);
                
                    foreach ($reference_array as $refId) {
                        StudentsReferenceDetail::insert([
                            'studentid' => $studentId,
                            'employee_id' => $refId,
                            'type' => "Distributor",
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                } else {
                    StudentsReferenceDetail::insert([
                        'studentid' => $studentId,
                        'employee_id' => $ref_id,
                        'type' => "Owner",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
    
                // Log the created student for debugging
                Log::info('Created Student: ' . json_encode($student));
            }
    
            // Optionally, you can redirect back with a success message
            return redirect()->back()->with('success', 'Data imported successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error("Exception: {$e->getMessage()}");
    
            // Handle the exception, e.g., log it
            // Optionally, you can redirect back with an error message
            return redirect()->back()->with('error', $e->getMessage());
        } finally {
            Log::info('End bulk_registration_action');
        }
    }
    
    /***********Team************/

    public function add_team()
    {
        $moduleId = 26;
        if (!$this->checkModuleAccess($moduleId)) {
            return redirect('/unauthorized');
        }
        $modules=Module::all();
        return view('add_new_team',['modules'=>$modules]);
    }
    
}
