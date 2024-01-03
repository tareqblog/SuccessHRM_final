<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateFileImportController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientTermController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DeshboardMenuController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\JobcategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\Actions\FetchEmployeeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\PassTypeController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\RemarksTypesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TncController;
use App\Http\Controllers\UploadFileTypeController;
use App\Http\Controllers\UserController;
use App\Models\ClientUploadFile;
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
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});
// Dashbaord ends



// Candidate Payroll Start
Route::get('/candidate/payroll/month', function () {
    return view('admin.candidatePayroll.month');
});
Route::get('/candidate/payroll', function () {
    return view('admin.candidatePayroll.index');
});
Route::get('/candidate/payroll/create', function () {
    return view('admin.candidatePayroll.create');
});
Route::get('/candidate/payroll/edit', function () {
    return view('admin.candidatePayroll.edit');
});
// Candidate Payroll Ends

// Nationality Start
Route::get('/nationality', function () {
    return view('admin.nationality.index');
});
Route::get('/nationality/create', function () {
    return view('admin.nationality.create');
});
Route::get('/nationality/edit', function () {
    return view('admin.nationality.edit');
});
// Nationality Ends
// company Start
Route::get('/company-profile', function () {
    return view('admin.companyProfile.index');
});
Route::get('/company-profile/create', function () {
    return view('admin.companyProfile.create');
});
Route::get('/company-profile/edit', function () {
    return view('admin.companyProfile.edit');
});
// company Ends
// Timesheet Start
Route::get('/timesheet', function () {
    return view('admin.timesheet.index');
});
Route::get('/timesheet/create', function () {
    return view('admin.timesheet.create');
});
Route::get('/timesheet/edit', function () {
    return view('admin.timesheet.edit');
});
// Timesheet Ends
// Invoice Start
Route::get('/invoice/month', function () {
    return view('admin.invoice.month');
});
Route::get('/invoice', function () {
    return view('admin.invoice.index');
});
Route::get('/invoice/create', function () {
    return view('admin.invoice.create');
});
Route::get('/invoice/edit', function () {
    return view('admin.invoice.edit');
});
// Invoice Ends


// Personal Folder Start
Route::get('/personal-folder', function () {
    return view('admin.personalFolder.index');
});
Route::get('/personal-folder/create', function () {
    return view('admin.personalFolder.create');
});
Route::get('/personal-folder/edit', function () {
    return view('admin.personalFolder.edit');
});
// Personal Folder Ends


// User Control Start
Route::get('/user-control', function () {
    return view('admin.userControl.index');
});
// User Control Ends
// Activity Start
Route::get('/activity', function () {
    return view('admin.activity.report');
});
// Activity Ends
// Activity Start
Route::get('/employee-group', function () {
    return view('admin.employeeGroup.index');
});
// Activity Ends
// Activity Start
Route::get('/job-status', function () {
    return view('admin.jobStatus.index');
});
Route::get('/pay-mode', function () {
    return view('admin.payMode.index');
});
Route::get('/file-type', function () {
    return view('admin.fileType.index');
});
// Activity Ends




Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/log', function () {
        return json_encode(activity::all()->last());
    });

    // Route::get('/employeefetch',[App\Http\Controllers\Action\FetchEmployeeController::class])->name('employee.fetch');

    Route::resources([
        '/roles' => RoleController::class,
        '/users' => UserController::class,
        '/department' => DepartmentController::class,
        '/designation' => DesignationController::class,
        '/employee' => EmployeeController::class,
        '/leave-type' => LeaveTypeController::class,
        '/tnc' => TncController::class,
        '/dashboard/menu' => DeshboardMenuController::class,
        '/religion' => ReligionController::class,
        '/client-term' => ClientTermController::class,
        '/marital-status' => MaritalStatusController::class,
        '/marital-status' => MaritalStatusController::class,
        '/industry-type' => IndustryTypeController::class,
        '/clients' => ClientController::class,
        '/job-type' => JobTypeController::class,
        '/job-category' => JobcategoryController::class,
        '/job' => JobController::class,
        '/leave' => LeaveController::class,
        '/candidate' => CandidateController::class,
       '/import' => CandidateFileImportController::class,
        '/file-type' => UploadFileTypeController::class,
        '/pass-type' => PassTypeController::class,
        '/remarks-type' => RemarksTypesController::class,
        '/job-application' => JobApplicationController::class,
    ]);
    Route::get('/authenticate',  [UserController::class, 'storecomplete'])->name('user.authenticate');
    Route::post('/users/fetch-email',  [UserController::class, 'search'])->name('email.searchapi');

    Route::get('/setting/profile', [App\Http\Controllers\AdminController::class, 'index'])->name('user.profiles');

    Route::get('/import',  [CandidateFileImportController::class, 'index'])->name('import.index');
    Route::post('/import/upload',  [CandidateFileImportController::class, 'upload'])->name('upload.files');
    Route::post('/delete/import/data',  [CandidateFileImportController::class, 'deleteUploadedData'])->name('delete.uploaded.data');
    Route::post('/import/extract',  [CandidateFileImportController::class, 'extractInfo'])->name('extract.info');
    Route::post('/import/data/temporary/save',  [CandidateFileImportController::class, 'temporaryDataSave'])->name('temporary.data.save');
    Route::post('/import/data/temporary/delete/{id}',  [CandidateFileImportController::class, 'temporaryDataDelete'])->name('temporary.data.delete');
    // Route::post('/import/candidate/data',  [CandidateFileImportController::class, 'importCandidateData'])->name('import.candidate.data');
    Route::post('/import/candidate/data', [CandidateFileImportController::class, 'importCandidateData'])->name('import.candidate.data');
    // Route::post('/preview-file', [CandidateFileImportController::class, 'previewFile'])->name('preview.file');
    // Employee extra route start
    Route::post('salary/info/post', [EmployeeController::class, 'salaryInfoPost'])->name('employee.salary.info.post');
    // Employee extra route ends



    Route::post('/file-upload/{id}', [ClientController::class, 'fileUpload'])->name('client.file.upload');
    Route::delete('/file-delete/{id}', [ClientController::class, 'fileDelete'])->name('client.file.delete');
    Route::post('/client/followup/{id}', [ClientController::class, 'followUp'])->name('client.followup');
    Route::delete('/client/followup/{id}', [ClientController::class, 'folowupDelete'])->name('client.followup.delete');
    //Candidate extra part
    Route::post('/candidate/file-upload/{id}', [CandidateController::class, 'fileUpload'])->name('candidate.file.upload');
    Route::delete('/candidate/file-delete/{id}', [CandidateController::class, 'fileDelete'])->name('candidate.file.delete');
    Route::post('/candidate/followup/{id}', [CandidateController::class, 'followUp'])->name('candidate.followup');
    Route::delete('/candidate/followup/{id}', [CandidateController::class, 'folowupDelete'])->name('candidate.followup.delete');
    Route::post('/candidate/remark/{id}', [CandidateController::class, 'remark'])->name('candidate.remark');
    Route::delete('/candidate/remark/{id}', [CandidateController::class, 'remarkDelete'])->name('candidate.remark.delete');
    Route::post('/candidate/payroll/{id}', [CandidateController::class, 'payroll'])->name('candidate.payroll');
    Route::delete('/candidate/payroll/{id}', [CandidateController::class, 'payrollDelete'])->name('candidate.payroll.delete');
    Route::post('/candidate/working-hour/{id}', [CandidateController::class, 'workingHour'])->name('candidate.working.hour');
    Route::post('/candidate/family/{id}', [CandidateController::class, 'family'])->name('candidate.family');
    Route::delete('/candidate/family/{id}', [CandidateController::class, 'familyDelete'])->name('candidate.family.delete');
    Route::post('/candidate/resume/{id}', [CandidateController::class, 'resumeUpload'])->name('candidate.resume');
    Route::delete('/candidate/resume/{id}', [CandidateController::class, 'resumeDelete'])->name('candidate.resume.delete');
    Route::post('/candidate/main/{id}', [CandidateController::class, 'resumeMain'])->name('candidate.resume.main');


    Route::get('{any}',  [App\Http\Controllers\HomeController::class, 'index']);


    Route::get('/',  [App\Http\Controllers\AdminController::class, 'root'])->name('/');
})->middleware('AdminMiddleware');
