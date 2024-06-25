<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
        // Redisの設定テスト
        Redis::set('kakukukeko', 'dsgfdgf');
        $test = Redis::get('kakukukeko');
        dump($test);

        // 仮ユーザーを追加
        $this->addDummyUser();

        return view('welcome');
    }

    protected function addDummyUser()
    {
        // ランダムな文字列を生成して仮ユーザーのメールアドレスに使用
        $randomString = Str::random(10);
        $dummyUserData = [
            'name' => 'Dummy User ' . $randomString,
            'email' => 'dummy_' . $randomString . '@example.com',
            'password' => bcrypt('secret'), // パスワードはbcryptでハッシュ化
        ];

        // 仮ユーザーを作成
        User::create($dummyUserData);
        dump('Dummy user created: ' . $dummyUserData['email']);
    }
}
