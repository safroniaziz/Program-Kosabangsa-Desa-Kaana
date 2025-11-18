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
        // Create demo user if not exists
        $user = User::firstOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name' => 'Demo User',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create sample PTSD assessments
        $assessments = [
            [
                'user_id' => $user->id,
                'assessment_type' => 'ptsd_diagnostic',
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
                'assessment_type' => 'ptsd_diagnostic',
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
                'assessment_type' => 'ptsd_diagnostic',
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

        $this->command->info('User assessments seeded successfully!');
    }
}
