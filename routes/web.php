<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BasicAuthMiddleware;
use App\Http\Controllers\TestController;

Route::middleware([BasicAuthMiddleware::class])->group(function () {
    Route::get('/', [TestController::class, 'index']);
});

// Route::get('/', function () {
//     return 'Success';
// })->middleware('auth.basic');