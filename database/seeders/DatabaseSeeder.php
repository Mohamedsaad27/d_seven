<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name_ar' => 'Test User',
            'name_en' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'phone' => '0123456789',
            'role' => 'user',
        ]);
    }
}
