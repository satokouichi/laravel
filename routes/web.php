<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BasicAuthMiddleware;
use App\Http\Controllers\TopController;

// Route::middleware([BasicAuthMiddleware::class])->group(function () {
    Route::get('/', [TopController::class, 'index']);
// });