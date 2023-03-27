<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
Route::get('/employees',[MainController::class, 'employees'] );
Route::get('/sales',[MainController::class, 'sales'] );
Route::get('/overdue',[MainController::class, 'overdue'] );
