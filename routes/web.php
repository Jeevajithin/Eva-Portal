<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\CheckModuleAccess;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

Route::get('/dashboard',[AdminController::class, 'admin_dashboard'])->name('dashboard');

Route::post('/login',[AdminController::class, 'login']);

Route::get('/logout',[AdminController::class, 'user_logout'])->name('logout');

/********Settings->Course*********/ 

Route::get('/new_course',[AdminController::class, 'new_course'])->name('new_course');

Route::post('/add_course_action',[AdminController::class, 'add_course_action']);

Route::get('/view_course',[AdminController::class, 'view_course'])->name('view_course');

Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    
Route::post('/edit_course_action/{id}', [AdminController::class, 'edit_course_action'])->name('courses.update');

Route::get('/courses/{id}', [AdminController::class, 'destroy'])->name('courses.destroy');

/********Settings->Course->end********/ 

/********Settings->Source*********/ 

Route::get('/new_source',[AdminController::class, 'new_source'])->name('new_source');

Route::post('/add_source_action',[AdminController::class, 'add_source_action']);

Route::get('/view_sources',[AdminController::class, 'view_sources'])->name('view_sources');

Route::get('/edit_source/{id}', [AdminController::class, 'edit_source'])->name('edit_source');
    
Route::post('/edit_source_action/{id}', [AdminController::class, 'edit_source_action'])->name('edit_source_action');

Route::get('/delete_source/{id}', [AdminController::class, 'delete_source'])->name('delete_source');

/********Settings->Source->end*********/ 

/********Settings->Reference*********/ 

Route::get('/new_reference',[AdminController::class, 'new_reference'])->name('new_reference');

Route::post('/add_reference_action',[AdminController::class, 'add_reference_action']);

Route::get('/view_reference',[AdminController::class, 'view_reference'])->name('view_reference');

Route::get('/edit_reference/{id}', [AdminController::class, 'edit_reference'])->name('edit_reference');

Route::post('/edit_reference_action/{id}', [AdminController::class, 'edit_reference_action'])->name('edit_reference_action');

Route::get('/delete_reference/{id}', [AdminController::class, 'delete_reference'])->name('delete_reference');

/********Settings->Reference->end*********/ 

/********Settings->technology*********/ 

Route::get('/new_technology',[AdminController::class, 'new_technology'])->name('new_technology');

Route::post('/add_technology_action',[AdminController::class, 'add_technology_action']);

Route::get('/view_technologies',[AdminController::class, 'view_technologies'])->name('view_technologies');

Route::get('/edit_technology/{id}', [AdminController::class, 'edit_technology'])->name('edit_technology');

Route::post('/edit_technology_action/{id}', [AdminController::class, 'edit_technology_action'])->name('edit_technology_action');

Route::get('/delete_technology/{id}', [AdminController::class, 'delete_technology'])->name('delete_technology');

/********Settings->technology->end*********/ 

/********Employee*********/ 

Route::get('/new_user',[AdminController::class, 'new_user'])->name('new_user');

Route::post('/new_user_action',[AdminController::class, 'new_user_action']);

Route::get('/view_users',[AdminController::class, 'view_users'])->name('view_users');

Route::get('/edit_user/{id}',[AdminController::class, 'edit_user'])->name('edit_user');

Route::post('/edit_user_action/{id}',[AdminController::class, 'edit_user_action']);

Route::get('/delete_user/{id}',[AdminController::class, 'delete_user'])->name('delete_user');

Route::get('/view_more_users/{id}',[AdminController::class, 'view_more_users'])->name('view_more_users');


/********Employee End*********/ 

/**********Role************/
Route::get('/new_roles',[AdminController::class, 'new_roles'])->name('new_roles');

Route::post('/add_roles_action',[AdminController::class, 'add_roles_action']);

//Route::get('/add_reporting_person',[AdminController::class, 'add_reporting_person'])->name('add_reporting_person');

/********Role End***********/

/*********Student***********/

Route::get('/new_student',[AdminController::class, 'new_student'])->name('new_student');

Route::get('/test/{id}',[AdminController::class, 'test'])->name('test');

Route::post('/new_student_action',[AdminController::class, 'new_student_action']);

Route::get('/view_students',[AdminController::class, 'view_students'])->name('view_students');

//Route::get('/view_all_students',[AdminController::class, 'view_all_students'])->name('view_all_students');

/*********Student End************/

/*********Excel Upload DB********/

Route::get('/add_bulk_data',[AdminController::class, 'add_bulk_data'])->name('add_bulk_data');

Route::post('/bulk_registration_action',[AdminController::class, 'bulk_registration_action']);

/*******End Excel Upload DB*********/

/**********Team*************/
Route::get('/add_team',[AdminController::class, 'add_team'])->name('add_team');

