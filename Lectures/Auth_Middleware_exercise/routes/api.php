<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API

// Route::get('test', function (){

//     return  response()->json(['response' => 'This is a test api']);

// });

Route::middleware('auth:sanctum')->group(function () {

    Route::get('movies/count', [ApiController::class, 'count']);
    Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});
