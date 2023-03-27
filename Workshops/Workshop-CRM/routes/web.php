<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/{company}', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');
Route::delete('/company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');


Route::get('/company/{company}/employee', [EmployeeController::class, 'index'])->name('company.employee.index');
Route::get('/company/{company}/employee/create', [EmployeeController::class, 'create'])->name('company.employee.create');
Route::get('/company/{company}/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('company.employee.edit');
Route::post('/company/{company}/employee/', [EmployeeController::class, 'store'])->name('company.employee.store');
Route::put('/company/{company}/employee/{employee}', [EmployeeController::class, 'update'])->name('company.employee.update');
Route::delete('/company/{company}/employee/{employee}', [EmployeeController::class, 'destroy'])->name('company.employee.destroy');
