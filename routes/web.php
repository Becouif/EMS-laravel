<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\MailController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/landing',function(){
    return view('admin.layouts.master');
});

Route::group(['middleware'=>'auth'],function(){
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('departments',DepartmentController::class);

    Route::resource('roles',RoleController::class);
    
    Route::resource('users',UserController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('leaves',LeaveController::class);
    Route::resource('notices',NoticeController::class);

    // get route for mail 
    Route::get('/mail',[MailController::class, 'create']);
    Route::post('/mail',[MailController::class, 'store'])->name('mail.store');
});

