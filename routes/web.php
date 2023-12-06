<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;;
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




Route::get('/client/create', function() {return view('admin.client.create');});
Route::get('/client/edit', function() {return view('admin.client.edit');});
Route::get('/employee/create', function() {return view('admin.employee.create');});
Route::get('/employee/edit', function() {return view('admin.employee.edit');});
Route::get('/candidate/create', function() {return view('admin.candidate.create');});
Route::get('/candidate/edit', function() {return view('admin.candidate.edit');});




Auth::routes();

Route::prefix('admin')->group( function (){
Route::get('/log', function(){
    return json_encode(activity::all()->last());
});

Route::get('/setting/profile',[App\Http\Controllers\AdminController::class, 'Index'])->name('user.profiles');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);


Route::get('{any}',  [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/',  [App\Http\Controllers\AdminController::class, 'root'])->name('/');

})->middleware('AdminMiddleware');
