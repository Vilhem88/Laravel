<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('movies', [MovieController::class, 'index'])->middleware(['verified', 'age']);
    Route::get('movies/create', [MovieController::class, 'create'])->middleware(['role:Admin']);

    Route::prefix('cards')->group(function () {
        Route::get('',             [CardController::class, 'index'])->name('cards.index');

        Route::middleware(['admin'])->group(function () {

        Route::get('create',        [CardController::class, 'create']);
        Route::get('edit/{card}',   [CardController::class, 'edit']);
        Route::post('',            [CardController::class, 'store']);
        Route::put('{card}',        [CardController::class, 'update']);
        Route::delete('{card}',     [CardController::class, 'destroy']);
        });
        
    });
});

require __DIR__ . '/auth.php';
