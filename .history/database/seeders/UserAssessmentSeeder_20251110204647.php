<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserAssessment;
use Carbon\Carbon;

class UserAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get random users untuk assessment (ambil 50 user random dari total users)
        $users = User::where('role', 'user')->inRandomOrder()->limit(50)->get();
        
        if ($users->isEmpty()) {
            // Jika belum ada user, create demo user
            $users = collect([User::firstOrCreate(
                ['email' => 'demo@example.com'],
                [
                    'name' => 'Demo User',
                    'password' => bcrypt('password'),
                    'email_verified_at' => now(),
                ]
            )]);
        }

        // Create sample PTSD assessments
        $assessments = [
            [
                'user_id' => $user->id,
                'assessment_type' => 'ptsd',
                'status' => 'completed',
                'started_at' => Carbon::now()->subDays(7),
                'completed_at' => Carbon::now()->subDays(7)->addMinutes(15),
                'results' => json_encode([
                    'total_score' => 18,
                    'category_scores' => [
                        'A' => 4, // Terbayangi oleh Peristiwa Traumatis
                        'B' => 3, // Harapan Masa Depan Rendah
                        'C' => 5, // Berpikir Negatif
                        'D' => 3, // Emosional
                        'E' => 2, // Mengisolasi Diri
                        'F' => 1  // Merasa Tidak Berdaya
                    ],
                    'ranking' => [
                        'A' => ['name' => 'Terbayangi oleh Peristiwa Traumatis', 'rank' => 1, 'score' => 4],
                        'B' => ['name' => 'Harapan Masa Depan Rendah', 'rank' => 2, 'score' => 3],
                        'C' => ['name' => 'Berpikir Negatif', 'rank' => 3, 'score' => 5],
                        'D' => ['name' => 'Emosional', 'rank' => 4, 'score' => 3],
                        'E' => ['name' => 'Mengisolasi Diri', 'rank' => 5, 'score' => 2],
                        'F' => ['name' => 'Merasa Tidak Berdaya', 'rank' => 6, 'score' => 1]
                    ]
                ])
            ],
            [
                'user_id' => $user->id,
                'assessment_type' => 'ptsd',
                'status' => 'completed',
                'started_at' => Carbon::now()->subDays(3),
                'completed_at' => Carbon::now()->subDays(3)->addMinutes(12),
                'results' => json_encode([
                    'total_score' => 12,
                    'category_scores' => [
                        'A' => 2, // Terbayangi oleh Peristiwa Traumatis
                        'B' => 2, // Harapan Masa Depan Rendah
                        'C' => 3, // Berpikir Negatif
                        'D' => 2, // Emosional
                        'E' => 2, // Mengisolasi Diri
                        'F' => 1  // Merasa Tidak Berdaya
                    ],
                    'ranking' => [
                        'A' => ['name' => 'Terbayangi oleh Peristiwa Traumatis', 'rank' => 1, 'score' => 2],
                        'B' => ['name' => 'Harapan Masa Depan Rendah', 'rank' => 2, 'score' => 2],
                        'C' => ['name' => 'Berpikir Negatif', 'rank' => 3, 'score' => 3],
                        'D' => ['name' => 'Emosional', 'rank' => 4, 'score' => 2],
                        'E' => ['name' => 'Mengisolasi Diri', 'rank' => 5, 'score' => 2],
                        'F' => ['name' => 'Merasa Tidak Berdaya', 'rank' => 6, 'score' => 1]
                    ]
                ])
            ],
            [
                'user_id' => $user->id,
                'assessment_type' => 'ptsd',
                'status' => 'completed',
                'started_at' => Carbon::now()->subDays(1),
                'completed_at' => Carbon::now()->subDays(1)->addMinutes(18),
                'results' => json_encode([
                    'total_score' => 25,
                    'category_scores' => [
                        'A' => 5, // Terbayangi oleh Peristiwa Traumatis
                        'B' => 4, // Harapan Masa Depan Rendah
                        'C' => 6, // Berpikir Negatif
                        'D' => 4, // Emosional
                        'E' => 3, // Mengisolasi Diri
                        'F' => 3  // Merasa Tidak Berdaya
                    ],
                    'ranking' => [
                        'A' => ['name' => 'Terbayangi oleh Peristiwa Traumatis', 'rank' => 1, 'score' => 5],
                        'B' => ['name' => 'Harapan Masa Depan Rendah', 'rank' => 2, 'score' => 4],
                        'C' => ['name' => 'Berpikir Negatif', 'rank' => 3, 'score' => 6],
                        'D' => ['name' => 'Emosional', 'rank' => 4, 'score' => 4],
                        'E' => ['name' => 'Mengisolasi Diri', 'rank' => 5, 'score' => 3],
                        'F' => ['name' => 'Merasa Tidak Berdaya', 'rank' => 6, 'score' => 3]
                    ]
                ])
            ]
        ];

        foreach ($assessments as $assessmentData) {
            UserAssessment::create($assessmentData);
        }

        // Create sample DCM assessments
        $dcmAssessments = [
            [
                'user_id' => $user->id,
                'assessment_type' => 'checklist_masalah',
                'status' => 'completed',
                'started_at' => Carbon::now()->subDays(5),
                'completed_at' => Carbon::now()->subDays(5)->addMinutes(20),
                'results' => json_encode([
                    'total_score' => 65,
                    'category_scores' => [
                        1 => 15, // Fisik
                        2 => 12, // Emosi
                        3 => 13, // Mental
                        4 => 14, // Perilaku
                        5 => 11  // Spiritual
                    ],
                    'ranking' => [
                        1 => ['name' => 'Fisik', 'rank' => 1, 'score' => 15],
                        2 => ['name' => 'Perilaku', 'rank' => 2, 'score' => 14],
                        3 => ['name' => 'Mental', 'rank' => 3, 'score' => 13],
                        4 => ['name' => 'Emosi', 'rank' => 4, 'score' => 12],
                        5 => ['name' => 'Spiritual', 'rank' => 5, 'score' => 11]
                    ]
                ])
            ],
            [
                'user_id' => $user->id,
                'assessment_type' => 'checklist_masalah',
                'status' => 'completed',
                'started_at' => Carbon::now()->subDays(2),
                'completed_at' => Carbon::now()->subDays(2)->addMinutes(25),
                'results' => json_encode([
                    'total_score' => 45,
                    'category_scores' => [
                        1 => 8,  // Fisik
                        2 => 10, // Emosi
                        3 => 9,  // Mental
                        4 => 10, // Perilaku
                        5 => 8   // Spiritual
                    ],
                    'ranking' => [
                        1 => ['name' => 'Emosi', 'rank' => 1, 'score' => 10],
                        2 => ['name' => 'Perilaku', 'rank' => 2, 'score' => 10],
                        3 => ['name' => 'Mental', 'rank' => 3, 'score' => 9],
                        4 => ['name' => 'Fisik', 'rank' => 4, 'score' => 8],
                        5 => ['name' => 'Spiritual', 'rank' => 5, 'score' => 8]
                    ]
                ])
            ]
        ];

        foreach ($dcmAssessments as $assessmentData) {
            UserAssessment::create($assessmentData);
        }

        $this->command->info('User assessments seeded successfully!');
    }
}
