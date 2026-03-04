<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProtocolController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ThreadController;
use Illuminate\Support\Facades\Route;

// Public routes here
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::get('/protocols/{id}', [ProtocolController::class, 'getProtocolById']);
Route::get('/threads/{id}', [ThreadController::class, 'getThreadsByProtocolId']);
Route::get('/reviews/{id}', [ReviewController::class, 'getReviewsByProtocolId']);


// Protected routes here
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);
});