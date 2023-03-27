<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::get('/list', [MovieController::class, 'index'])->name('movie.index');
Route::get('/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/list', [MovieController::class, 'store'])->name('movie.store');
