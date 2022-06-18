<?php

use App\Http\Controllers\Api\CompanyController as ApiCompanyController;
use App\Http\Controllers\Api\DepartmentController as ApiDepartmentController;
use App\Http\Controllers\Api\EmployeeController as ApiEmployeeController;
use App\Http\Controllers\Api\EmployeeDepartmentCompanyController;
use App\Http\Controllers\Api\EmployeeDepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('companies', ApiCompanyController::class)->only(['index']);
Route::apiResource('departments', ApiDepartmentController::class)->only(['index']);
Route::apiResource('employees', ApiEmployeeController::class)->only(['index']);
Route::apiResource('employee-departments', EmployeeDepartmentController::class)->only(['show']);
Route::apiResource('employee-department-companies', EmployeeDepartmentCompanyController::class)->only(['index']);
