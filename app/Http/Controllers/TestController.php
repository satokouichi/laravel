<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index()
    {
        Redis::set('kakukukeko', 'dsgfdgf');
        $test = Redis::get('kakukukeko');
        dump($test);

        return view('welcome');
    }
}
