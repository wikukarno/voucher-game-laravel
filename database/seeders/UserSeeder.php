<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'roles' => 'Admin',
                'phone' => '081234567890',
                'favorite' => null,
                'status' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Player',
                'username' => 'player',
                'email' => 'player@gmail.com',
                'password' => bcrypt('player12345'),
                'roles' => 'Player',
                'phone' => '081234567890',
                'favorite' => 1,
                'status' => 'Y',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        User::insert($user);
    }
}
