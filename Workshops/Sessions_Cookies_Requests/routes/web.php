<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogInController;

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

Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::post('/', [FormController::class, 'store'])->name('form.store');

Route::get('/login', [LogInController::class, 'index'])->name('form.login.index');
Route::get('/logout', [LogInController::class, 'destroy'])->name('form.logout.destroy');
Route::post('/login', [LogInController::class, 'store'])->name('form.login.store');
Route::get('/home', [HomeController::class, 'index'])->name('form.home.index');



