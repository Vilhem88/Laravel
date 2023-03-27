<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\HttpKernel\EventListener\RouterListener;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::prefix('movies')->group(function () {
        Route::get('', [MovieController::class, 'index'])->name('movies.index');

        Route::middleware(['admin'])->group(function () {
            Route::get('create', [MovieController::class, 'create'])->name('movies.create');
            Route::post('', [MovieController::class, 'store'])->name('movies.store');
            Route::get('edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
            Route::put('{movie}', [MovieController::class, 'update'])->name('movies.update');
           
        });

        Route::get('{movie}/rent', [MovieController::class, 'rent'])->name('movies.rent');
        Route::get('{movie}/return', [MovieController::class, 'return'])->name('movies.return');


    });
});





require __DIR__ . '/auth.php';
