<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('books', [BookController::class, 'index']);
// Route::get('books/create', [BookController::class, 'create']);
// Route::get('books/{book_id}', [BookController::class, 'show']);
// Route::get('numbers', [NumberController::class, 'index']);

Route::get('users/{name}', [UserController::class, 'list']);