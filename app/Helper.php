<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Str;


use App\Models\Reference;
use App\Models\Technology;

use App\Models\StudentDetail;
use App\Models\StudentsTechnologyDetail;
use App\Models\StudentsReferenceDetail;
use App\Models\Role;
use App\Models\Modules_assigned_detail;
use App\Models\ReferencesAssignedDetail;
use App\Models\SourcesAssignedDetail;
use App\Models\Employee_detail;

class Helper
{

    public static function get_technology_details($id)
    {
        $technologyDetails = StudentsTechnologyDetail::select('students_technology_details.*', 'technologies.technology_name')
        ->join('technologies', 'students_technology_details.technology_id', '=', 'technologies.id')
        ->where('students_technology_details.studentid', $id)
        ->get();

        return $technologyDetails;

        //print_r($technologyDetails);
    }

    public static function get_reference_details($id)
    {
        // $referenceDetails = StudentsReferenceDetail::select('students_reference_details.*', 'references.reference_name')
        // ->join('references', 'students_reference_details.employee_id', '=', 'references.id')
        // ->where('students_reference_details.studentid', $id)
        // ->get();

        $referenceDetails = Employee_detail::whereIn('userid', function ($query) use ($id) {
            $query->select('employee_id')->from('students_reference_details')->where('studentid', $id);
        })->get();

        return $referenceDetails;
    }

    public static function get_designation_details($id)
    {
        $designationDetails = Role::select('id', 'role_title')->where('id', $id)->first();

        return $designationDetails;
    }

        public static function get_module_access_details($id)
        {
            $userModules = Modules_assigned_detail::where('user_id', $id)->get();

            return $userModules;
        }

        public static function get_reference_access_details($id)
        {
            $userReference = ReferencesAssignedDetail::where('user_id', $id)->get();

            return $userReference;
        }

        public static function get_source_access_details($id)
        {
            $userSource = SourcesAssignedDetail::where('user_id', $id)->get();

            return $userSource;
        }

        public static function get_teamlead_details($id)
        {
            $teamleadDetails = Employee_detail::where('userid', $id)->first();

            return $teamleadDetails;
        }

        public static function get_manager_details($id)
        {
            $managerDetails = Employee_detail::where('userid', $id)->first();

            return $managerDetails;
        }

        public static function get_reporting_person_details($id)
        {
            $reportingPersonDetails = Employee_detail::where('userid', $id)->first();

            return $reportingPersonDetails;
        }
    
}

?>