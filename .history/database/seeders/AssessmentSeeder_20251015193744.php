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
            'name' => 'PCL-5 (PTSD Checklist for DSM-5)',
            'type' => 'pcl5',
            'total_questions' => 20,
            'time_limit_minutes' => 15,
            'instructions' => 'Petunjuk: Di bawah ini adalah daftar masalah dan keluhan yang kadang-kadang dialami orang sebagai respons terhadap peristiwa hidup yang penuh tekanan. Mohon baca setiap item dengan cermat, kemudian pilih salah satu angka untuk menunjukkan seberapa banyak Anda terganggu oleh masalah tersebut dalam sebulan terakhir.',
            'disclaimer_text' => 'Instrumen ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik. Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualitas.',
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
