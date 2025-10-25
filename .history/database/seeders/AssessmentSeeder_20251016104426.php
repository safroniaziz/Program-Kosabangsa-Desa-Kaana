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
            'instructions' => 'Bacalah setiap pernyataan di bawah ini, kemudian berilah tanda centang (✓) pada lembar jawaban yang sesuai dengan keadaan Anda. Jika pernyataan tersebut BENAR bagi Anda, beri tanda centang. Jika TIDAK BENAR, biarkan kosong.',
            'disclaimer_text' => 'Instrumen ini dikembangkan oleh Prof. Dr. Nandang Rusmana, M.Pd dan Dr. Juwanto, S.Pd.I., M.Pd untuk tujuan skrining dan bukan diagnosis medis. Konsultasikan dengan profesional kesehatan mental jika diperlukan.',
            'is_active' => true
        ]);

        // Checklist Masalah Assessment
        Assessment::create([
            'name' => 'Daftar Cek Masalah Pasca Bencana',
            'type' => 'checklist_masalah',
            'total_questions' => 70, // Total semua gejala dari 5 kategori
            'time_limit_minutes' => 15,
            'instructions' => 'Berilah tanda silang (X) pada setiap gejala yang terasa setelah musibah/bencana. Pilih "Ada" jika Anda mengalami gejala tersebut, atau "Tidak Ada" jika tidak mengalami.',
            'disclaimer_text' => 'Instrumen ini dikembangkan untuk mengidentifikasi gejala pasca bencana dan bukan merupakan alat diagnostik. Konsultasikan dengan profesional kesehatan mental jika mengalami gejala yang mengganggu.',
            'is_active' => true
        ]);
    }
}
