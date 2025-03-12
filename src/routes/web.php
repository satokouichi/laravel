<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\TopController;
use App\Http\Controllers\Web\Auth\AuthenticatedSessionController;

// トップページ
Route::get('/', [TopController::class, 'index'])->name('index');

// 商品
Route::prefix('products')->name('product.')->group(function () {
    // 一覧
    Route::get('/list', [ProductController::class, 'index'])->name('index');
    // 詳細
    Route::get('/{product_id}', [ProductController::class, 'show'])->name('show')
        ->where(['product_id' => '[1-9][0-9]*']);
});

// 注文
Route::prefix('order')->name('order.')->group(function () {
    // 完了
    Route::get('/complete', [OrderController::class, 'complete'])->name('complete');
});

// ログイン
Route::middleware('guest:web')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// ログアウト
Route::middleware('auth:web')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});