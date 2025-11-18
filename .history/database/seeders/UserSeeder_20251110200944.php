<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Create regular users (penduduk)
        // Total sekitar 1250 penduduk untuk statistik
        $totalUsers = 1250;
        
        $this->command->info("Creating {$totalUsers} users (penduduk)...");
        
        // Create users in batches for better performance
        $batchSize = 100;
        $created = 0;
        
        for ($i = 0; $i < $totalUsers; $i += $batchSize) {
            $users = [];
            $currentBatch = min($batchSize, $totalUsers - $i);
            
            for ($j = 0; $j < $currentBatch; $j++) {
                $users[] = [
                    'name' => $faker->name(),
                    'email' => $faker->unique()->safeEmail(),
                    'password' => Hash::make('password'), // Default password for demo
                    'role' => 'user',
                    'email_verified_at' => $faker->boolean(80) ? now() : null, // 80% verified
                    'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                    'updated_at' => now(),
                ];
            }
            
            User::insert($users);
            $created += $currentBatch;
            
            // Show progress
            if ($created % 500 == 0 || $created == $totalUsers) {
                $this->command->info("Created {$created}/{$totalUsers} users...");
            }
        }
        
        $this->command->info("✓ Successfully created {$totalUsers} users!");
    }
}

