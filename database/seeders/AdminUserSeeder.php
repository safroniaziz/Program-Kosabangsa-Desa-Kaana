<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kosabangsa.com'],
            [
                'name' => 'Administrator',
                'email' => 'admin@kosabangsa.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'superadmin@kosabangsa.com'],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@kosabangsa.com',
                'password' => Hash::make('superadmin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
