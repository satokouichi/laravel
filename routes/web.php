<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BasicAuthMiddleware;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TopController;

// Route::middleware([BasicAuthMiddleware::class])->group(function () {
    // Route::get('/', [TopController::class, 'index']);
// });

// ログイン
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// ログアウト
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth:web')->group(function () {
    Route::get('/', [TopController::class, 'index'])->name('index');
});