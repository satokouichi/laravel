<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;

// トップページは無しなので注文ページへリダイレクト
Route::get('/', function () {
    return redirect('/' . config('constant.admin_dir') . '/order');
});

// 商品
Route::prefix('product')->name('product.')->group(function () {
    // 一覧
    Route::match(['get', 'post'], '/', [ProductController::class, 'index'])->name('index');
    // 登録
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    // 編集
    Route::get('/{product_id}/edit', [ProductController::class, 'edit'])->name('edit');
    // CSVエクスポート
    Route::post('/export/{version}', [ProductController::class, 'export'])->name('export');
    // CSV雛形ダウンロード
    Route::post('/template', [ProductController::class, 'template'])->name('template');
    // CSVインポート
    Route::get('/csv', [ProductController::class, 'csv'])->name('csv');
    Route::post('/import', [ProductController::class, 'import'])->name('import');
});

// 注文
Route::prefix('order')->name('order.')->group(function () {
    Route::match(['get', 'post'], '/', [OrderController::class, 'index'])->name('index');
});

// レビュー
Route::prefix('review')->name('review.')->group(function () {
    Route::match(['get', 'post'], '/', [ReviewController::class, 'index'])->name('index');
});

// 記事
Route::prefix('post')->name('post.')->group(function () {
    Route::match(['get', 'post'], '/', [PostController::class, 'index'])->name('index');
});

// お知らせ
Route::prefix('info')->name('info.')->group(function () {
    Route::match(['get', 'post'], '/', [InfoController::class, 'index'])->name('index');
});
