<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class TopController
{
    /**
     * トップページ
     */
    public function index()
    {
        return view('web.index', []);
    }
}
