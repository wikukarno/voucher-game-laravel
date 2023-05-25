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
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'roles' => 'Admin',
                'phone' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user'),
                'roles' => 'User',
                'phone' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        User::insert($user);
    }
}
