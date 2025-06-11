<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@example.com')->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'status' => 'active',
                'role' => 'admin',
            ]);
        }

        if (!User::where('email', 'petani@example.com')->exists()) {
            User::create([
                'name' => 'Petani Satu',
                'email' => 'petani@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'status' => 'active',
                'role' => 'petani',
                'user_created_id' => $admin->id ?? null,
                'user_created_name' => $admin->name ?? null,
            ]);
        }
    }
}
