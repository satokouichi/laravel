<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProductController
{
    /**
     * 一覧
     */
    public function index()
    {
        dd('商品一覧');
    }

    /**
     * 登録
     */
    public function store()
    {
        dd('商品登録');
    }

    /**
     * 編集
     */
    public function edit()
    {
        dd('商品編集');
    }

    /**
     * CSVエクスポート
     */
    public function export()
    {
        dd('商品CSVエクスポート');
    }

    /**
     * CSV雛形ダウンロード
     */
    public function template()
    {
        dd('商品CSV雛形ダウンロード');
    }

    /**
     * CSVインポート（画面）
     */
    public function csv()
    {
        dd('商品CSVインポート（画面）');
    }

    /**
     * CSVインポート（処理）
     */
    public function import()
    {
        dd('商品CSVインポート（処理）');
    }
}
