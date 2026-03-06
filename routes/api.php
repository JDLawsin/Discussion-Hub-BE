<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProtocolController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\VoteController;
use Illuminate\Support\Facades\Route;

// Public routes here
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::get('/protocols/{id}', [ProtocolController::class, 'getProtocolById']);
Route::get('/threads/{id}', [ThreadController::class, 'getThreadsByProtocolId']);
Route::get('/reviews/{id}', [ReviewController::class, 'getReviewsByProtocolId']);
Route::get('/threads/view/{id}', [ThreadController::class, 'getThreadsById']);
Route::get('/threads/{threadId}/comments', [CommentController::class, 'getCommentsByThreadId']);

// Protected routes here
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/protocols/{protocolId}/reviews/has-reviewed', [ReviewController::class, 'hasReviewed']);
    Route::get('/threads/{votableId}/vote/user', [VoteController::class, 'getUserVoteType'])->defaults('votableType', 'thread');
    Route::get('/comments/{votableId}/vote/user', [VoteController::class, 'getUserVoteType'])->defaults('votableType', 'comment');

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/protocols/{id}/reviews', [ReviewController::class, 'createReview']);
    Route::post('/threads/{votableId}/vote', [VoteController::class, 'vote'])->defaults('votableType', 'thread');
    Route::post('/comments/{votableId}/vote', [VoteController::class, 'vote'])->defaults('votableType', 'comment');
    Route::post('/threads/{threadId}/comments', [CommentController::class, 'create']);
    Route::post('/protocols', [ProtocolController::class, 'create']);
    Route::post('/threads', [ThreadController::class, 'create']);

    Route::delete('/protocols/{id}', [ProtocolController::class, 'delete']);
    Route::delete('/threads/{id}', [ThreadController::class, 'delete']);
    Route::delete('/reviews/{id}', [ReviewController::class, 'delete']);
    Route::delete('/comments/{id}', [CommentController::class, 'delete']);
});