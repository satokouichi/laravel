<?php

namespace App\Http\Controllers\Web\Auth;

use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use App\Actions\Web\AttemptToAuthenticate;
use App\Services\Validation\Web\Login as vLogin;

class AuthenticatedSessionController
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the login view.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        // アクセス元のURL
        $default_path = str_replace(config('app.url'), '', url()->previous());
        $target_path = $request->session()->pull('target_path', $default_path);

        // Meta関連
        $heads = [
            'title' => 'ログインページ',
        ];

        // bodyタグ関連
        $bodys = [
            'id' => 'loginPage',
            'class' => 'one-column',
        ];

        return view('web.login', [
            'heads' => $heads,
            'bodys' => $bodys,
            'guard' => 'web',
            'target_path' => $target_path
        ]);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $param = $request->all();

        $errors = vLogin::getValidation($param);
        if ($errors->count() > 0) {
            // エラー時はリダイレクト先を再設定
            session(['target_path' => $request->input('target_path')]);
            return redirect($request->header('referer'))
                ->withErrors($errors)
                ->withInput();
        }

        $target_path = $request->input('target_path');

        return $this->loginPipeline($request)->then(function ($request) use($target_path) {
            return $target_path
                ? redirect($target_path)
                : redirect(route('index'));
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(Request $request)
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy(Request $request)
    {
        $this->guard->logout();

        $request->session()->regenerateToken();

        return redirect(route('index'));
    }
}