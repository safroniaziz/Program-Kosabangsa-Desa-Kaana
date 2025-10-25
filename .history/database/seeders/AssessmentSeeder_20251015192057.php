<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PCL-5 Assessment
        Assessment::create([
            'name' => 'PCL-5 (PTSD Checklist)',
            'type' => 'pcl5',
            'description' => 'Asesmen untuk mendeteksi gejala Post-Traumatic Stress Disorder (PTSD) berdasarkan kriteria DSM-5',
            'question_count' => 20,
            'estimated_duration' => 10,
            'is_active' => true,
            'instructions' => 'Petunjuk akan ditampilkan di halaman asesmen',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // DASS-21 Assessment
        Assessment::create([
            'name' => 'DASS-21',
            'type' => 'dass21',
            'description' => 'Asesmen tingkat depresi, kecemasan, dan stres menggunakan Depression Anxiety Stress Scales',
            'question_count' => 21,
            'estimated_duration' => 8,
            'is_active' => true,
            'instructions' => 'Petunjuk akan ditampilkan di halaman asesmen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}