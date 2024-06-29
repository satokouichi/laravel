<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BasicAuthMiddleware;
use App\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'index'])->middleware('auth.basic');
// Route::get('/', function () {
//     return 'Success';
// })->middleware('auth.basic');