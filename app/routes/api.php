<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('users/me', [\App\Http\Controllers\ProfileController::class, 'update']);
    Route::apiResource('users', \App\Http\Controllers\UserController::class)
        ->except(['store', 'show']);


    Route::delete('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout']);
});

Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login'])
    ->name('login');
Route::post('/register', [\App\Http\Controllers\AuthenticationController::class, 'register']);
