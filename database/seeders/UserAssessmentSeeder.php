<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserAssessment;
use App\Models\UserAnswer;
use App\Models\ChecklistMasalahQuestion;
use App\Services\AssessmentQuestions\PTSDDiagnosticQuestions;
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

        $this->command->info("Creating assessments for " . $users->count() . " users...");

        $ptsdCategories = PTSDDiagnosticQuestions::getAllCategories();
        $dcmQuestionsByCategory = ChecklistMasalahQuestion::all()->groupBy('category')->map(function ($group) {
            return $group->pluck('id')->all();
        })->toArray();

        // Create assessments untuk setiap user
        foreach ($users as $user) {
            // Create sample PTSD assessments
            $ptsdAssessments = [
                [
                    'results' => [
                        'total_score' => 18,
                        'category_scores' => [
                            'A' => 4,
                            'B' => 3,
                            'C' => 5,
                            'D' => 3,
                            'E' => 2,
                            'F' => 1
                        ],
                        'ranking' => [
                            'A' => ['name' => 'Terbayangi oleh Peristiwa Traumatis', 'rank' => 1, 'score' => 4],
                            'B' => ['name' => 'Harapan Masa Depan Rendah', 'rank' => 2, 'score' => 3],
                            'C' => ['name' => 'Berpikir Negatif', 'rank' => 3, 'score' => 5],
                            'D' => ['name' => 'Emosional', 'rank' => 4, 'score' => 3],
                            'E' => ['name' => 'Mengisolasi Diri', 'rank' => 5, 'score' => 2],
                            'F' => ['name' => 'Merasa Tidak Berdaya', 'rank' => 6, 'score' => 1]
                        ]
                    ],
                ],
                [
                    'results' => [
                        'total_score' => 12,
                        'category_scores' => [
                            'A' => 2,
                            'B' => 2,
                            'C' => 3,
                            'D' => 2,
                            'E' => 2,
                            'F' => 1
                        ],
                        'ranking' => [
                            'A' => ['name' => 'Terbayangi oleh Peristiwa Traumatis', 'rank' => 1, 'score' => 2],
                            'B' => ['name' => 'Harapan Masa Depan Rendah', 'rank' => 2, 'score' => 2],
                            'C' => ['name' => 'Berpikir Negatif', 'rank' => 3, 'score' => 3],
                            'D' => ['name' => 'Emosional', 'rank' => 4, 'score' => 2],
                            'E' => ['name' => 'Mengisolasi Diri', 'rank' => 5, 'score' => 2],
                            'F' => ['name' => 'Merasa Tidak Berdaya', 'rank' => 6, 'score' => 1]
                        ]
                    ],
                ],
                [
                    'results' => [
                        'total_score' => 25,
                        'category_scores' => [
                            'A' => 5,
                            'B' => 4,
                            'C' => 6,
                            'D' => 4,
                            'E' => 3,
                            'F' => 3
                        ],
                        'ranking' => [
                            'A' => ['name' => 'Terbayangi oleh Peristiwa Traumatis', 'rank' => 1, 'score' => 5],
                            'B' => ['name' => 'Harapan Masa Depan Rendah', 'rank' => 2, 'score' => 4],
                            'C' => ['name' => 'Berpikir Negatif', 'rank' => 3, 'score' => 6],
                            'D' => ['name' => 'Emosional', 'rank' => 4, 'score' => 4],
                            'E' => ['name' => 'Mengisolasi Diri', 'rank' => 5, 'score' => 3],
                            'F' => ['name' => 'Merasa Tidak Berdaya', 'rank' => 6, 'score' => 3]
                        ]
                    ],
                ]
            ];

            foreach ($ptsdAssessments as $assessmentData) {
                $assessmentRecord = UserAssessment::create([
                    'user_id' => $user->id,
                    'assessment_type' => 'ptsd',
                    'status' => 'completed',
                    'started_at' => Carbon::now()->subDays(rand(1, 30)),
                    'completed_at' => Carbon::now()->subDays(rand(1, 30))->addMinutes(rand(10, 20)),
                    'results' => $assessmentData['results']
                ]);

                $this->seedPtsdAnswersFromResults($assessmentRecord, $assessmentData['results'], $ptsdCategories);
            }

            // Create sample DCM assessments (hanya untuk 30% user)
            if (rand(1, 100) <= 30 && !empty($dcmQuestionsByCategory)) {
                $dcmAssessments = [
                    [
                        'results' => [
                            'total_score' => 65,
                            'category_scores' => [
                                1 => 15,
                                2 => 12,
                                3 => 13,
                                4 => 14,
                                5 => 11
                            ],
                            'ranking' => [
                                1 => ['name' => 'Fisik', 'rank' => 1, 'score' => 15],
                                2 => ['name' => 'Perilaku', 'rank' => 2, 'score' => 14],
                                3 => ['name' => 'Mental', 'rank' => 3, 'score' => 13],
                                4 => ['name' => 'Emosi', 'rank' => 4, 'score' => 12],
                                5 => ['name' => 'Spiritual', 'rank' => 5, 'score' => 11]
                            ]
                        ],
                    ],
                    [
                        'results' => [
                            'total_score' => 45,
                            'category_scores' => [
                                1 => 8,
                                2 => 10,
                                3 => 9,
                                4 => 10,
                                5 => 8
                            ],
                            'ranking' => [
                                1 => ['name' => 'Emosi', 'rank' => 1, 'score' => 10],
                                2 => ['name' => 'Perilaku', 'rank' => 2, 'score' => 10],
                                3 => ['name' => 'Mental', 'rank' => 3, 'score' => 9],
                                4 => ['name' => 'Fisik', 'rank' => 4, 'score' => 8],
                                5 => ['name' => 'Spiritual', 'rank' => 5, 'score' => 8]
                            ]
                        ],
                    ]
                ];

                foreach ($dcmAssessments as $assessmentData) {
                    $assessmentRecord = UserAssessment::create([
                        'user_id' => $user->id,
                        'assessment_type' => 'checklist_masalah',
                        'status' => 'completed',
                        'started_at' => Carbon::now()->subDays(rand(1, 30)),
                        'completed_at' => Carbon::now()->subDays(rand(1, 30))->addMinutes(rand(15, 25)),
                        'results' => $assessmentData['results']
                    ]);

                    $this->seedDcmAnswersFromResults($assessmentRecord, $assessmentData['results'], $dcmQuestionsByCategory);
                }
            }
        }

        $this->command->info('User assessments seeded successfully!');
    }

    private function seedPtsdAnswersFromResults(UserAssessment $assessment, array $results, array $ptsdCategories): void
    {
        foreach ($ptsdCategories as $category => $questionNumbers) {
            $score = $results['category_scores'][$category] ?? 0;
            $score = min($score, count($questionNumbers));

            foreach ($questionNumbers as $index => $questionNumber) {
                $answerValue = $index < $score ? 1 : 0;

                UserAnswer::create([
                    'user_assessment_id' => $assessment->id,
                    'question_number' => $questionNumber,
                    'answer_value' => $answerValue,
                    'answered_at' => $assessment->completed_at ?? now(),
                ]);
            }
        }
    }

    private function seedDcmAnswersFromResults(UserAssessment $assessment, array $results, array $questionsByCategory): void
    {
        foreach ($questionsByCategory as $category => $questionIds) {
            $score = $results['category_scores'][$category] ?? 0;
            if ($score <= 0 || empty($questionIds)) {
                continue;
            }

            $selected = collect($questionIds)->shuffle()->take($score);

            foreach ($selected as $questionId) {
                UserAnswer::create([
                    'user_assessment_id' => $assessment->id,
                    'question_number' => $questionId,
                    'answer_value' => 1,
                    'answered_at' => $assessment->completed_at ?? now(),
                ]);
            }
        }
    }
}
