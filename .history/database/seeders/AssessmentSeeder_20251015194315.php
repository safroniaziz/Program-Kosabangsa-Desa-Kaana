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
        // PTSD Diagnostic Criteria Assessment
        Assessment::create([
            'name' => 'Instrumen Kriteria Diagnostik PTSD',
            'type' => 'ptsd_diagnostic',
            'total_questions' => 30,
            'time_limit_minutes' => 20,
            'instructions' => 'Bacalah setiap pernyataan di bawah ini, kemudian berilah tanda silang (X) pada lembar jawaban yang sesuai dengan keadaan Anda. Jika pernyataan tersebut BENAR bagi Anda, beri tanda silang. Jika TIDAK BENAR, biarkan kosong.',
            'disclaimer_text' => 'Instrumen ini dikembangkan oleh Prof. Dr. Nandang Rusmana, M.Pd dan Dr. Juwanto, S.Pd.I., M.Pd untuk tujuan skrining dan bukan diagnosis medis. Konsultasikan dengan profesional kesehatan mental jika diperlukan.',
            'is_active' => true
        ]);

        // DASS-21 Assessment
        Assessment::create([
            'name' => 'DASS-21 (Depression Anxiety Stress Scales)',
            'type' => 'dass21',
            'total_questions' => 21,
            'time_limit_minutes' => 10,
            'instructions' => 'Silakan baca setiap pernyataan dan pilih angka 0, 1, 2 atau 3 yang menunjukkan seberapa banyak pernyataan itu berlaku untuk Anda selama SEMINGGU YANG LALU. Tidak ada jawaban yang benar atau salah.',
            'disclaimer_text' => 'Instrumen ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik. Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualitas.',
            'is_active' => true
        ]);
    }
}
