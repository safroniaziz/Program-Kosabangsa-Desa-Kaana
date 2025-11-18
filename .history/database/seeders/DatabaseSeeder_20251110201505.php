<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            UserSeeder::class, // Create users/penduduk
            CoordinateSeeder::class, // Create faskes/health facilities
            UmkmSeeder::class, // Create UMKM data
            SmartServicesSeeder::class, // Create Smart Services
            ChecklistMasalahQuestionSeeder::class,
            UserAssessmentSeeder::class, // Create sample assessments
        ]);
    }
}
