<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com', // optional
                'password' => '12345678', // optional
            ]
        ];

        foreach ($users as $key => $user) {

            $userData = [
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ];

            $newUser = User::create($userData);
            $newUser->save();
        }
    }
}
