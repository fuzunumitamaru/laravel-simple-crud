<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin1234',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('pass1234'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        // User::create([
        //     'username' => 'user1234',
        //     'firstname' => 'User',
        //     'lastname' => 'User',
        //     'email' => 'user@example.com',
        //     'password' => bcrypt('pass1234'),
        //     'role' => 'user',
        //     'status' => 'active',
        // ]);
    }
}
