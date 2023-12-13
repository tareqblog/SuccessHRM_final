<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Actions\FetchEmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashbaord Start
Route::get('/dashboard', function() {return view('admin.dashboard.index');});
// Dashbaord ends

// client start
Route::get('/clients', function() {return view('admin.client.index');});
Route::get('/client/create', function() {return view('admin.client.create');});
Route::get('/client/edit', function() {return view('admin.client.edit');});
// client ends
// employee start
Route::get('/employees', function() {return view('admin.employee.index');});
Route::get('/employee/create', function() {return view('admin.employee.create');});
Route::get('/employee/edit', function() {return view('admin.employee.edit');});
// employee ends

// employee start
Route::get('/candidates', function() {return view('admin.candidate.index');});
Route::get('/candidate/create', function() {return view('admin.candidate.create');});
Route::get('/candidate/walk', function() {return view('admin.candidate.walkCandidate');});
Route::get('/candidate/import', function() {return view('admin.candidate.importCandidate');});
Route::get('/candidate/edit', function() {return view('admin.candidate.edit');});
Route::get('/candidate/search', function() {return view('admin.candidate.search');});



// employee ends

// Candidate Payroll Start
Route::get('/candidate/payroll/month', function() {return view('admin.candidatePayroll.month');});
Route::get('/candidate/payroll', function() {return view('admin.candidatePayroll.index');});
Route::get('/candidate/payroll/create', function() {return view('admin.candidatePayroll.create');});
Route::get('/candidate/payroll/edit', function() {return view('admin.candidatePayroll.edit');});
// Candidate Payroll Ends

// Job posting start
Route::get('/job', function() {return view('admin.job.index');});
Route::get('/job/create', function() {return view('admin.job.create');});
Route::get('/job/edit', function() {return view('admin.job.edit');});
Route::get('/job/application', function() {return view('admin.job.application');});
// Job posting ends
// Job category start
Route::get('/job-category', function() {return view('admin.jobCategory.index');});
Route::get('/job-category/edit', function() {return view('admin.jobCategory.edit');});
// Job category ends
// Leave Start
Route::get('/leave', function() {return view('admin.leave.index');});
Route::get('/leave/create', function() {return view('admin.leave.create');});
Route::get('/leave/edit', function() {return view('admin.leave.edit');});
// Leave Ends
// Leave Type Start
// Route::get('/leave-type', function() {return view('admin.leaveType.index');});
// Route::get('/leave-type/create', function() {return view('admin.leaveType.create');});
// Route::get('/leave-type/edit', function() {return view('admin.leaveType.edit');});
// Leave Type Ends
// Department Start
// Route::get('/department', function() {return view('admin.department.index');});
// Route::get('/department/create', function() {return view('admin.department.create');});
// Route::get('/department/edit', function() {return view('admin.department.edit');});
// Department Ends
// Nationality Start
Route::get('/nationality', function() {return view('admin.nationality.index');});
Route::get('/nationality/create', function() {return view('admin.nationality.create');});
Route::get('/nationality/edit', function() {return view('admin.nationality.edit');});
// Nationality Ends
// company Start
Route::get('/company-profile', function() {return view('admin.companyProfile.index');});
Route::get('/company-profile/create', function() {return view('admin.companyProfile.create');});
Route::get('/company-profile/edit', function() {return view('admin.companyProfile.edit');});
// company Ends
// Timesheet Start
Route::get('/timesheet', function() {return view('admin.timesheet.index');});
Route::get('/timesheet/create', function() {return view('admin.timesheet.create');});
Route::get('/timesheet/edit', function() {return view('admin.timesheet.edit');});
// Timesheet Ends
// TNC Start
Route::get('/tnc', function() {return view('admin.tnc.index');});
Route::get('/tnc/create', function() {return view('admin.tnc.create');});
Route::get('/tnc/edit', function() {return view('admin.tnc.edit');});
// TNC Ends
// Invoice Start
Route::get('/invoice/month', function() {return view('admin.invoice.month');});
Route::get('/invoice', function() {return view('admin.invoice.index');});
Route::get('/invoice/create', function() {return view('admin.invoice.create');});
Route::get('/invoice/edit', function() {return view('admin.invoice.edit');});
// Invoice Ends


// Invoice Start
Route::get('/personal-folder', function() {return view('admin.personalFolder.index');});
Route::get('/personal-folder/create', function() {return view('admin.personalFolder.create');});
Route::get('/personal-folder/edit', function() {return view('admin.personalFolder.edit');});
// Invoice Ends


// User Control Start
Route::get('/user-control', function() {return view('admin.userControl.index');});
// User Control Ends
// Activity Start
Route::get('/activity', function() {return view('admin.activity.report');});
// Activity Ends
// Activity Start
Route::get('/employee-group', function() {return view('admin.employeeGroup.index');});
// Activity Ends
// Activity Start
Route::get('/job-type', function() {return view('admin.jobType.index');});
Route::get('/job-status', function() {return view('admin.jobStatus.index');});
Route::get('/pass-type', function() {return view('admin.passType.index');});
Route::get('/pay-mode', function() {return view('admin.payMode.index');});
Route::get('/file-type', function() {return view('admin.fileType.index');});
Route::get('/remark-type', function() {return view('admin.remarkType.index');});
Route::get('/designation', function() {return view('admin.designation.index');});
Route::get('/industry-type', function() {return view('admin.industryType.index');});
// Activity Ends




Auth::routes();

Route::prefix('admin')->group( function (){
Route::get('/log', function(){
    return json_encode(activity::all()->last());
});

Route::get('/setting/profile',[App\Http\Controllers\AdminController::class, 'Index'])->name('user.profiles');
// Single Action Controllers
Route::get('/employee/fetch', FetchEmployeeController::class)->name('employee.fetch');
Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'employee' => EmployeeController::class,
    'department' => DepartmentController::class,
    'leavetype' => LeaveTypeController::class,
]);


Route::get('{any}',  [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/',  [App\Http\Controllers\AdminController::class, 'root'])->name('/');

})->middleware('AdminMiddleware');
