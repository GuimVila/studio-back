<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ReadingProgressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\NewsletterSendController;

/*
|--------------------------------------------------------------------------
| Public routes (no auth)
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->middleware('throttle:5,1');
Route::get('/newsletter/confirm/{token}', [NewsletterController::class, 'confirm']);
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe']);

/*
|--------------------------------------------------------------------------
| Protected routes (auth:sanctum)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout-all', [AuthController::class, 'logoutAll']);

    // Reading progress
    Route::get('/reading-progress', [ReadingProgressController::class, 'index']);
    Route::post('/reading-progress/read', [ReadingProgressController::class, 'markAsRead']);
    Route::patch('/reading-progress', [ReadingProgressController::class, 'update']);

    // Newsletter
    Route::post('/newsletter/send-new-resource', [NewsletterSendController::class, 'sendNewResource'])->middleware('throttle:5,1');
});
