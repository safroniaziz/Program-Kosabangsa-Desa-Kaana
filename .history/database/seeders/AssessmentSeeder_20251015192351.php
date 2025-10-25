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
            'total_questions' => 20,
            'time_limit_minutes' => 15,
            'instructions' => 'Mohon baca setiap pernyataan dan pilih angka yang paling menggambarkan seberapa sering Anda terganggu oleh masalah tersebut selama SEBULAN TERAKHIR.',
            'disclaimer_text' => 'Hasil ini hanya untuk screening dan bukan diagnosis medis. Konsultasikan dengan tenaga kesehatan mental jika diperlukan.',
            'is_active' => true
        ]);

        // DASS-21 Assessment
        Assessment::create([
            'name' => 'DASS-21',
            'type' => 'dass21',
            'total_questions' => 21,
            'time_limit_minutes' => 10,
            'instructions' => 'Mohon baca setiap pernyataan dan pilih angka 0, 1, 2 atau 3 yang menunjukkan seberapa banyak pernyataan itu berlaku untuk Anda selama seminggu yang lalu.',
            'disclaimer_text' => 'Hasil ini hanya untuk screening dan bukan diagnosis medis. Konsultasikan dengan tenaga kesehatan mental jika diperlukan.',
            'is_active' => true
        ]);
    }
}
