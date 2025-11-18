<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;

class ChecklistMasalahAssessmentSeeder extends Seeder
{
    public function run()
    {
        Assessment::updateOrCreate(
            ['type' => 'checklist_masalah'],
            [
                'name' => 'Instrumen Kriteria Diagnostik DCM',
                'type' => 'checklist_masalah',
                'total_questions' => 100, // Total questions from 5 categories
                'time_limit_minutes' => 15,
                'instructions' => 'Beri tanda centang (✓) pada setiap gejala yang Anda rasakan',
                'disclaimer_text' => 'Hasil assessment untuk keperluan evaluasi diri. Jika Anda mengalami gejala yang berat, segera hubungi profesional kesehatan.',
                'is_active' => true
            ]
        );

        $this->command->info('Checklist Masalah Assessment created or updated successfully.');
    }
}