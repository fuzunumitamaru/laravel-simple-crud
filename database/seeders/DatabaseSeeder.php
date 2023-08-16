<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //SETUP INITIAL ADMIN USER
        $this->call(AdminUserSeeder::class);

        //SETUP DUMMY STORES AND USERS
        // User::factory()->count(5)->create();
        User::factory()->count(100)->create()->each(function ($user) {
            Store::factory()->count(rand(1, 100))->create(['user_id' => $user->id]);
        });
    }
}
