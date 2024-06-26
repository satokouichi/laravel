<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
        // 仮ユーザーを追加
        // $this->addDummyUser();

        $users = Cache::remember('users', 60, function () {
            return User::all();
        });

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
