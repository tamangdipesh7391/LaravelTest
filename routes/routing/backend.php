<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\CompanyDepartmentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DesignationController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\EmployeeDepartmentController;
use App\Http\Controllers\backend\UserController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('login',[DashboardController::class,'login'])->name('admin.login');
    Route::resource('users',UserController::class);
    Route::post('login',[UserController::class,'verify'])->name('admin.verify');
});
Route::group(['prefix' => 'admin','middleware' => 'loginAuth'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[DashboardController::class,'logout'])->name('admin.logout');
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('companydepartments', CompanyDepartmentController::class);
    Route::get('companydepartments/list/{company_id}',[CompanyDepartmentController::class,'list'])->name('companydepartments.list');
    Route::resource('departments', DepartmentController::class);
    Route::resource('designations', DesignationController::class);
    Route::resource('employeedepartments', EmployeeDepartmentController::class);
 });