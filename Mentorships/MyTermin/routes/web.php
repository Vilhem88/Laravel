<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class, 'titlePage'])->name('titlePage');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/create', [HomeController::class, 'create'])->name('home.create');
Route::post('/store', [HomeController::class, 'store'])->name('home.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   
    Route::get('/show', [HomeController::class, 'show'])->name('home.show');
    Route::get('/edit/{appointment}', [HomeController::class, 'edit'])->name('home.edit');
    Route::delete('{appointment}', [HomeController::class, 'destroy'])->name('home.delete');
});




Route::middleware('admin')->group(function () {
    Route::get('/list', [AdminController::class, 'index'])->name('admin.list');
    Route::get('create/doctor', [AdminController::class, 'create'])->name('admin.create');
    Route::get('edit/{appointment}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/show', [AdminController::class, 'show'])->name('admin.appointment');
    Route::post('', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/cancel/{appointment}', [AdminController::class, 'cancel'])->name('admin.cancel');
});
