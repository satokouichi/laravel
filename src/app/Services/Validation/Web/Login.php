<?php

namespace App\Services\Validation\Web;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Login
{
    public static function getValidation($data)
    {
        $validation = Validator::make($data, self::rules($data), self::message(), self::attribute());
        $message_bag = $validation->getMessageBag();

        return $message_bag;
    }

    private static function rules($data)
    {
        $rules = [
            'email'     => ['required','exists:users,email'],
            'password'  => ['required'],
        ];

        return $rules;
    }

    private static function message()
    {
        return [
            'required' => ':attributeを入力してください。',
            '*.exists' => ':attributeは会員登録されていません。',
        ];
    }

    private static function attribute()
    {
        return [
            'email'    => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}