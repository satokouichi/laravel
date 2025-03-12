<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController
{
    /**
     * トップページ
     */
    public function index()
    {
        // Meta関連
        $heads = [
            'title' => 'トップページ',
        ];

        // bodyタグ関連
        $bodys = [
            'id' => 'topPage',
            'class' => 'one-column',
        ];

        return view('web.index', [
            'heads' => $heads,
            'bodys' => $bodys,
        ]);
    }
}
