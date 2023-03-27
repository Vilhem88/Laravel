<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
// use App\Http\Controllers\MovieController;
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

Route::resource('books', BookController::class);

// Route::get('movies', [MovieController::class, 'index'])->name('books.index');
// Route::get('books', [BookController::class, 'index'])->name('books.index');
// Route::get('books/create', [BookController::class, 'create'])->name('books.create');
// Route::get('books/{$id}', [BookController::class, 'show'])->name('books.show');
// Route::get('books/{$id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Route::post('books', [BookController::class, 'store'])->name('books.store');
// Route::put('books/{$id}', [BookController::class, 'update'])->name('books.update');
// Route::delete('books/{$id}', [BookController::class, 'destroy'])->name('books.destroy');

// Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
// Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
// Route::get('clients{$id}', [ClientController::class, 'show'])->name('clients.show');
// Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
Route::resource('clients', ClientController::class);

