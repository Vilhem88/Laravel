<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscussionController;

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
// Public routes
Route::get('/',  [DiscussionController::class, 'index'])->name('discussion.index');

Route::get('/comments/{discussion}', [DiscussionController::class, 'comments'])->name('discussion.comments');

// Only Authenticated users routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        Route::get('/create', [DiscussionController::class, 'create'])->name('dashboard');
        Route::post('/', [DiscussionController::class, 'store'])->name('discussion.store');
        

        Route::get('/commentar/{discussion}', [DiscussionController::class, 'commentar'])->name('discussion.commentar');
        Route::post('/commentar/{slug}', [DiscussionController::class, 'post']);
        Route::delete('{post}', [DiscussionController::class, 'destroy'])->name('commentar.delete');

        Route::middleware('admin')->group(function () {
        
            Route::get('admin/show', [AdminController::class, 'show'])->name('admin.show');        
            Route::get('admin/approve/{discussion}', [AdminController::class, 'approve'])->name('admin.approve');        
            Route::get('admin/edit/{discussion}', [AdminController::class, 'edit'])->name('admin.edit');        
            Route::put('admin/update/{discussion}', [AdminController::class, 'update'])->name('admin.update');        
        
        });
    });
});

require __DIR__ . '/auth.php';
