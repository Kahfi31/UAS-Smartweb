<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a test guide user
        User::create([
            'first_name' => 'John',
            'last_name' => 'Guide',
            'email' => 'guide@test.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
        ]);

        // Create a test admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create another test tourist user
        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Tourist',
            'email' => 'tourist@test.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
        ]);

        $this->command->info('Test users created successfully!');
        $this->command->info('Guide: guide@test.com / password');
        $this->command->info('Admin: admin@test.com / password');
        $this->command->info('Tourist: tourist@test.com / password');
    }
}
