<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->group(function () {

    Route::get('posts', [ApiController::class, 'getPosts']);
    Route::get('posts/{post}', [ApiController::class, 'show']);
    
    Route::post('posts/{post}/comments', [ApiController::class, 'store']);

    Route::delete('posts/{post}', [ApiController::class, 'destroy']);



});