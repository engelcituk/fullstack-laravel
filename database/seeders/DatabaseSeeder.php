<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'adminuser@mail.com',
            'is_admin' => true,
            'is_active' => true
        ]);

        User::factory(100)->create();
    }
}

// php artisan migrate:fresh --seed
