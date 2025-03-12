<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create([
            'name' => '仮会員',
            'email' => 'test@test.test',
            'password' => Hash::make('aaa123456'),
            'zip' => '123-4567',
            'address' => '東京都千代田区1-1-1',
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);
    }
}
