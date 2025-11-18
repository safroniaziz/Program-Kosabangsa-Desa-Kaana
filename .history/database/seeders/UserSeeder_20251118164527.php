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
        // Total sekitar 80 penduduk untuk statistik demo
        $totalUsers = 80;

        $this->command->info("Creating {$totalUsers} users (penduduk)...");

        // Create users in batches for better performance
        $batchSize = 100;
        $created = 0;

        for ($i = 0; $i < $totalUsers; $i += $batchSize) {
            $users = [];
            $currentBatch = min($batchSize, $totalUsers - $i);

            for ($j = 0; $j < $currentBatch; $j++) {
                $gender = $faker->randomElement(['male', 'female']);
                $birthDate = $faker->dateTimeBetween('-80 years', '-5 years');
                $religion = $faker->randomElement(['islam', 'islam', 'islam', 'islam', 'islam', 'kristen', 'katolik', 'hindu', 'buddha', 'lainnya']); // 85% islam
                $socioeconomic = $faker->randomElement(['sangat_miskin', 'miskin', 'menengah_bawah', 'menengah', 'menengah_atas', 'kaya']);

                $users[] = [
                    'name' => $faker->name($gender === 'male' ? 'male' : 'female'),
                    'email' => $faker->unique()->safeEmail(),
                    'password' => Hash::make('password'), // Default password for demo
                    'role' => 'user',
                    'gender' => $gender,
                    'birth_date' => $birthDate->format('Y-m-d'),
                    'religion' => $religion,
                    'socioeconomic_status' => $socioeconomic,
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

