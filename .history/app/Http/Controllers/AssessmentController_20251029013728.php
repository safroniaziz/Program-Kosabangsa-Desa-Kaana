<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\FacadesLog;
use App\Models\Assessment;
use App\Models\User;
use App\Models\UserAssessment;
use App\Models\UserAnswer;
use App\Services\AssessmentCalculationService;
use App\Services\AssessmentQuestions\PTSDDiagnosticQuestions;
use App\Services\AssessmentQuestions\ChecklistMasalahQuestions;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{
    protected $calculationService;

    public function __construct(AssessmentCalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }


    /**
     * Start a specific mental health assessment
     */
    public function start(Assessment $assessment)
    {
        // Delete any incomplete PTSD assessments and their answers for this user to allow fresh start
        if ($assessment->type === 'ptsd_diagnostic') {
            $incompleteAssessments = UserAssessment::where('user_id', Auth::id())
                ->where('assessment_type', 'ptsd_diagnostic')
                ->whereNull('completed_at')
                ->get();

            Log::info('Found incomplete assessments: ' . $incompleteAssessments->count());

            foreach ($incompleteAssessments as $incompleteAssessment) {
                Log::info('Deleting incomplete assessment ID: ' . $incompleteAssessment->id);

                try {
                    // Delete associated answers first
                    $deletedAnswers = UserAnswer::where('user_assessment_id', $incompleteAssessment->id)->delete();
                    Log::info('Deleted ' . $deletedAnswers . ' answers for assessment ' . $incompleteAssessment->id);

                    // Then delete the assessment
                    $incompleteAssessment->delete();
                    Log::info('Deleted assessment ID: ' . $incompleteAssessment->id);

                    Log::info('Successfully deleted assessment ID: ' . $incompleteAssessment->id);

                } catch (\Exception $e) {
                    Log::error('Failed to delete assessment ID ' . $incompleteAssessment->id . ': ' . $e->getMessage());
                    Log::error('Stack trace: ' . $e->getTraceAsString());
                }
            }
        }

        // Allow users to take assessment multiple times without restriction
        // Removed 30-day limitation to allow unlimited assessment attempts

        // Get questions based on assessment type
        $questions = $this->getQuestionsForAssessment($assessment);

        if (empty($questions)) {
            return redirect()->route('assessment')
                ->with('error', 'Asesmen ini belum tersedia.');
        }

        return view('assessment.take', compact('assessment', 'questions'));
    }

    /**
     * Start a new assessment (Show 2 column layout with history + new form)
     */
    public function startNew(Assessment $assessment)
    {
        // Get only the latest assessment for this specific assessment type
        $recentAssessments = UserAssessment::where('user_id', Auth::id())
            ->where('assessment_type', $assessment->type)
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->take(1) // Show only the latest assessment
            ->get();

        // Get questions based on assessment type
        $questions = $this->getQuestionsForAssessment($assessment);

        if (empty($questions)) {
            return redirect()->route('assessment')
                ->with('error', 'Asesmen ini belum tersedia.');
        }

        // Use appropriate view based on assessment type
        if ($assessment->type === 'checklist_masalah') {
            return view('assessment.start-new-dcm', compact('assessment', 'questions', 'recentAssessments'));
        } else {
            return view('assessment.start-new', compact('assessment', 'questions', 'recentAssessments'));
        }
    }

    /**
     * Submit assessment answers
     */
    public function submit(Request $request, Assessment $assessment)
    {
        // Handle DCM checkbox submission
        if ($assessment->type === 'checklist_masalah') {
            return $this->submitDcmChecklist($request, $assessment);
        }

        // Adjust validation based on assessment type (only for non-DCM assessments)
        $validationRules = [
            'answers' => 'required|array',
        ];

        if ($assessment->type === 'ptsd_diagnostic') {
            // For PTSD: answers are optional (0 or 1), but if present must be integer
            $validationRules['answers.*'] = 'sometimes|integer|min:0|max:1';
        } else {
            // For other assessments: all answers must be present
            $validationRules['answers.*'] = 'required|integer|min:0|max:4';
        }

        $request->validate($validationRules);

        try {
            DB::beginTransaction();

            // Debug: Log the incoming data
            Log::info('Assessment submission data:', [
                'assessment_type' => $assessment->type,
                'answers' => $request->answers,
                'user_id' => Auth::id()
            ]);

            Log::info('Creating user assessment record...');

            // Create user assessment record
            $userAssessment = UserAssessment::create([
                'user_id' => Auth::id(),
                'assessment_type' => $assessment->type,
                'started_at' => now()
                // Note: completed_at and status will be set only when user actually submits
            ]);

            Log::info('User assessment created with ID: ' . $userAssessment->id);

            // Save individual answers
            $questionsData = $this->getQuestionsForAssessment($assessment);
            $totalQuestions = count($questionsData['questions']);

            for ($questionNumber = 1; $questionNumber <= $totalQuestions; $questionNumber++) {
                $answerValue = $request->answers[$questionNumber] ?? 0; // Default to 0 for unanswered questions

                UserAnswer::create([
                    'user_assessment_id' => $userAssessment->id,
                    'question_number' => $questionNumber,
                    'answer_value' => $answerValue,
                    'answered_at' => now()
                ]);
            }

            Log::info('Answers saved successfully');

            // Calculate results based on assessment type
            Log::info('Calculating assessment results...');
            $results = $this->calculateAssessmentResults($userAssessment, $assessment);

            // Update user assessment with results and mark as completed
            // For PTSD: no overall_risk_level needed, use default
            $userAssessment->update([
                'results' => $results,
                'completed_at' => now(),
                'status' => 'completed',
                'overall_risk_level' => 'low', // Default value for PTSD too
                'requires_followup' => false
            ]);

            Log::info('Results calculated and updated');

            DB::commit();

            Log::info('Transaction committed, redirecting to result page...');

            // For PTSD and DCM assessments, redirect to start-new to show history
        if ($assessment->type === 'ptsd_diagnostic' || $assessment->type === 'dcm_diagnostic') {
            $assessmentType = $assessment->type === 'ptsd_diagnostic' ? 'PTSD' : 'DCM';
            return redirect()->route('assessment.start-new', $assessment)
                ->with('success', "Assesmen {$assessmentType} berhasil diselesaikan. Anda dapat melihat hasil pada panel riwayat.");
        }

        return redirect()->route('assessment.result', $userAssessment->id)
            ->with('success', 'Asesmen berhasil diselesaikan.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Assessment submission failed: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan hasil asesmen: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Process cleanup choice for PTSD assessment
     */
    public function processCleanup(Request $request, Assessment $assessment)
    {
        $action = $request->input('action');
        $assessmentId = $request->input('assessment_id');

        // Validate action
        if (!in_array($action, ['delete', 'continue'])) {
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        }

        if ($action === 'delete') {
            Log::info('User chose to delete assessment ID: ' . $assessmentId);

            try {
                DB::beginTransaction();

                // Delete associated answers first
                $deletedAnswers = UserAnswer::where('user_assessment_id', $assessmentId)->delete();
                Log::info('Deleted ' . $deletedAnswers . ' answers for assessment ' . $assessmentId);

                // Then delete the assessment
                UserAssessment::find($assessmentId)->delete();
                Log::info('Deleted assessment ID: ' . $assessmentId);

                DB::commit();
                Log::info('Successfully deleted assessment and cleaned up answers');

                return redirect()->route('assessment.start', $assessment)
                    ->with('success', 'Assessment lama telah dihapus. Silakan mulai assessment baru.');

            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Failed to delete assessment: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal menghapus assessment.');
            }
        }

        if ($action === 'continue') {
            Log::info('User chose to continue with assessment ID: ' . $assessmentId);

            // Set session to indicate which assessment to continue with
            session(['assessment_session_ptsd_diagnostic' => $assessmentId]);

            return redirect()->route('assessment.start', $assessment)
                ->with('info', 'Anda memilih untuk melanjutkan assessment yang ada.');
        }
    }

    /**
     * Show assessment results
     */
    public function result(UserAssessment $userAssessment)
    {
        // Check if user owns this assessment
        if ($userAssessment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to assessment results.');
        }


        // Get assessment data based on assessment_type
        $assessment = Assessment::where('type', $userAssessment->assessment_type)->first();

        // If no assessment found, create a default object
        if (!$assessment) {
            $assessment = new \stdClass();
            $assessment->name = $this->getAssessmentTypeName($userAssessment->assessment_type);
            $assessment->type = $userAssessment->assessment_type;
            $assessment->disclaimer_text = 'Hasil assessment untuk keperluan evaluasi diri.';
        }

        // Prepare results based on assessment type
        $results = $this->prepareResultsData($userAssessment, $assessment->type ?? $userAssessment->assessment_type);

        // Use appropriate view based on assessment type
        $viewName = ($userAssessment->assessment_type === 'checklist_masalah') ? 'assessment.dcm-result' : 'assessment.result';

        return view($viewName, compact('userAssessment', 'assessment', 'results'));
    }

    /**
     * Get assessment type name in Indonesian
     */
    private function getAssessmentTypeName($type): string
    {
        $names = [
            'ptsd_diagnostic' => 'Instrumen Kriteria Diagnostik PTSD',
            'checklist_masalah' => 'Daftar Cek Masalah Pasca Bencana',
            'pcl5' => 'PCL-5 (PTSD Checklist)',
            'dass21' => 'DASS-21 (Depression Anxiety Stress Scales)',
            'combined' => 'Combined Assessment'
        ];

        return $names[$type] ?? 'Unknown Assessment';
    }

    /**
     * Prepare results data based on assessment type
     */
    private function prepareResultsData(UserAssessment $userAssessment, string $assessmentType): array
    {
        switch ($assessmentType) {
            case 'ptsd_diagnostic':
                // Use PTSD Diagnostic Questions class for proper calculation
                $answers = $userAssessment->answers()->pluck('answer_value', 'question_number')->toArray();

                // Use the PTSD Questions class to calculate scores and ranking properly
                $categoryScores = PTSDDiagnosticQuestions::calculateCategoryScores($answers);
                $ranking = PTSDDiagnosticQuestions::getCategoryRanking($categoryScores);
                $categoryDescriptions = PTSDDiagnosticQuestions::getCategoryNames();

                // Find primary concern (highest score)
                $primaryConcern = array_key_first($ranking);

                // Generate recommendations based on risk level and primary concern
                $recommendations = $this->generatePTSDRecommendations($userAssessment->overall_risk_level ?? 'low', $primaryConcern, $ranking);

                // Calculate total score (all categories combined)
                $totalScore = array_sum($categoryScores);
                $maxPossibleScore = 30; // 30 questions max 1 point each

                // Determine risk level based on total score
                $percentage = ($totalScore / $maxPossibleScore) * 100;
                $riskLevel = $percentage >= 60 ? 'high' : ($percentage >= 40 ? 'moderate' : ($percentage >= 20 ? 'low' : 'very_low'));

                return [
                    'total_score' => $totalScore,
                    'category_scores' => $categoryScores,
                    'severity' => $riskLevel, // Use risk level as severity for checkbox
                    'risk_level' => $riskLevel,
                    'interpretation' => $this->generateInterpretation($totalScore, $maxPossibleScore, $primaryConcern, $ranking),
                    'ranking' => $ranking,
                    'primary_concern' => $primaryConcern,
                    'recommendations' => $recommendations,
                    'max_possible_score' => $maxPossibleScore
                ];

            case 'dass21':
                $recommendations = $this->generateDASS21Recommendations($userAssessment->overall_risk_level ?? 'low', [
                    'depression_level' => $userAssessment->dass21_depression_level ?? 'normal',
                    'anxiety_level' => $userAssessment->dass21_anxiety_level ?? 'normal',
                    'stress_level' => $userAssessment->dass21_stress_level ?? 'normal'
                ]);

                return [
                    'depression_score' => $userAssessment->dass21_depression_score ?? 0,
                    'anxiety_score' => $userAssessment->dass21_anxiety_score ?? 0,
                    'stress_score' => $userAssessment->dass21_stress_score ?? 0,
                    'depression_level' => $userAssessment->dass21_depression_level ?? 'normal',
                    'anxiety_level' => $userAssessment->dass21_anxiety_level ?? 'normal',
                    'stress_level' => $userAssessment->dass21_stress_level ?? 'normal',
                    'risk_level' => $userAssessment->overall_risk_level ?? 'low',
                    'interpretation' => $userAssessment->interpretation_text ?? 'Assessment selesai.',
                    'recommendations' => $recommendations
                ];

            case 'checklist_masalah':
                // Use the actual results from our calculation service
                $results = $userAssessment->results ?? [];

                // If no results calculated yet, calculate them
                if (empty($results)) {
                    $results = $this->calculationService->calculateChecklistMasalah($userAssessment);
                }

                // Extract data from results
                $totalChecked = $results['total_problems'] ?? 0;
                $categoryScores = $results['category_scores'] ?? [];
                $dominantCategory = $results['dominant_category'] ?? 'Fisik';
                $dominantCategoryName = $results['dominant_category_name'] ?? 'Gejala Fisik';
                $riskLevel = $results['risk_level'] ?? 'Rendah';
                $recommendations = $results['recommendations'] ?? [];

                // Create ranking data based on actual category scores
                $ranking = [];
                $categories = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getAllCategories();

                foreach ($categories as $categoryKey => $categoryInfo) {
                    $score = $categoryScores[$categoryKey] ?? 0;
                    $ranking[$categoryKey] = [
                        'score' => $score,
                        'name' => $categoryInfo['name'],
                        'description' => $categoryInfo['description'],
                        'rank' => 0 // Will be set after sorting
                    ];
                }

                // Sort by score (descending)
                uasort($ranking, function($a, $b) {
                    return $b['score'] - $a['score'];
                });

                // Update ranks
                $rank = 1;
                foreach ($ranking as $key => &$data) {
                    $data['rank'] = $rank++;
                }

                return [
                    'total_score' => $totalChecked,
                    'total_checked' => $totalChecked,
                    'total_problems' => $totalChecked,
                    'total_possible_problems' => $results['total_possible_problems'] ?? 100,
                    'percentage' => $results['percentage'] ?? 0,
                    'risk_level' => $riskLevel,
                    'interpretation' => $userAssessment->interpretation_text ?? 'DCM Assessment - ' . $riskLevel,
                    'ranking' => $ranking,
                    'primary_concern' => $dominantCategory,
                    'dominant_category' => $dominantCategory,
                    'dominant_category_name' => $dominantCategoryName,
                    'category_scores' => $categoryScores,
                    'recommendations' => $recommendations,
                    'max_possible_score' => 100,
                    'interpretation_data' => $results['interpretation'] ?? []
                ];

            default:
                return [
                    'total_score' => 0,
                    'risk_level' => $userAssessment->overall_risk_level ?? 'low',
                    'interpretation' => $userAssessment->interpretation_text ?? 'Assessment selesai.',
                    'recommendations' => [
                        'Lanjutkan memantau kondisi kesehatan mental Anda',
                        'Jangan ragu berkonsultasi dengan profesional jika dibutuhkan',
                        'Praktikkan teknik relaksasi dan manajemen stress'
                    ]
                ];
        }
    }

    /**
     * Generate PTSD recommendations based on risk level and primary concern
     */
    private function generatePTSDRecommendations($riskLevel, $primaryConcern, $ranking): array
    {
        $baseRecommendations = [
            'Lanjutkan memantau perkembangan gejala PTSD Anda',
            'Praktikkan teknik relaksasi seperti pernapasan dalam dan meditasi',
            'Jaga pola tidur yang teratur dan cukup',
            'Lakukan aktivitas fisik ringan secara teratur'
        ];

        $riskSpecificRecommendations = [
            'low' => [
                'Tingkatkan jaringan dukungan sosial dengan keluarga dan teman',
                'Pelajari teknik coping yang sehat untuk mengelola stress'
            ],
            'moderate' => [
                'Pertimbangkan untuk berkonsultasi dengan konselor atau terapis',
                'Ikuti program terapi kognitif-perilaku jika dianjurkan',
                'Batasi paparan terhadap pemicu trauma jika mungkin'
            ],
            'high' => [
                'Segera cari bantuan profesional kesehatan mental',
                'Pertimbangkan terapi yang dipandu oleh profesional berpengalaman',
                'Informasikan keluarga dekat untuk memberikan dukungan',
                'Ikuti semua rekomendasi pengobatan dari profesional'
            ],
            'critical' => [
                'SEGERA cari bantuan medis profesional',
                'Hubungi layanan darurat kesehatan mental jika ada pikiran untuk menyakiti diri',
                'Jangan ragu untuk dirawat di fasilitas kesehatan mental',
                'Ikuti program perawatan intensif yang disarankan'
            ]
        ];

        $concernSpecificRecommendations = [
            'B' => [
                'Praktikkan teknik grounding saat muncul intrusi',
                'Batasi waktu membicarakan pengalaman traumatik',
                'Fokus pada aktivitas sehari-hari yang memberikan rasa kontrol'
            ],
            'C' => [
                'Secara bertahap hadapi situasi yang dihindari',
                'Gunakan teknik eksposur bertahap dengan bantuan profesional',
                'Tetap terhubung dengan lingkungan dukungan'
            ],
            'D' => [
                'Tantang pikiran negatif dengan fakta alternatif',
                'Praktikkan afirmasi positif secara teratur',
                'Fokus pada kekuatan dan kemampuan pribadi'
            ],
            'E' => [
                'Pelajari teknik relaksasi otot progresif',
                'Batasi konsumsi kafein dan stimulan lain',
                'Praktikkan teknik manajemen kemarahan'
            ]
        ];

        $recommendations = array_merge(
            $baseRecommendations,
            $riskSpecificRecommendations[$riskLevel] ?? $riskSpecificRecommendations['low'],
            $concernSpecificRecommendations[$primaryConcern] ?? []
        );

        return array_slice($recommendations, 0, 6); // Return max 6 recommendations
    }

    /**
     * Generate DASS-21 recommendations
     */
    private function generateDASS21Recommendations($riskLevel, $scores): array
    {
        $recommendations = [
            'Lanjutkan memantau kondisi kesehatan mental Anda',
            'Praktikkan teknik relaksasi dan manajemen stress',
            'Jaga pola tidur yang teratur dan cukup'
        ];

        if (isset($scores['depression_level']) && $scores['depression_level'] !== 'normal') {
            $recommendations[] = 'Tingkatkan aktivitas fisik dan sosial';
            $recommendations[] = 'Tetap terhubung dengan teman dan keluarga';
        }

        if (isset($scores['anxiety_level']) && $scores['anxiety_level'] !== 'normal') {
            $recommendations[] = 'Pelajari teknik pernapasan dalam dan meditasi';
            $recommendations[] = 'Batasi konsumsi kafein dan stimulan';
        }

        if (isset($scores['stress_level']) && $scores['stress_level'] !== 'normal') {
            $recommendations[] = 'Prioritaskan tugas dan belajar mengatakan tidak';
            $recommendations[] = 'Luangkan waktu untuk hobi dan aktivitas yang disukai';
        }

        if ($riskLevel === 'high' || $riskLevel === 'critical') {
            $recommendations[] = 'Segera berkonsultasi dengan profesional kesehatan mental';
        }

        return $recommendations;
    }

    /**
     * Generate checklist masalah recommendations
     */
    private function generateChecklistRecommendations($riskLevel, $totalChecked, $primaryConcern): array
    {
        $baseRecommendations = [
            'Catat gejala yang Anda alami dalam jurnal harian',
            'Lanjutkan memantau perubahan gejala dari waktu ke waktu',
            'Jaga komunikasi terbuka dengan keluarga tentang perasaan Anda'
        ];

        if ($totalChecked > 20) {
            $baseRecommendations[] = 'Pertimbangkan untuk berkonsultasi dengan konselor atau psikolog';
            $baseRecommendations[] = 'Ikuti program dukungan kelompok jika tersedia';
        }

        $concernSpecific = [
            'anxiety' => [
                'Praktikkan teknik pernapasan dalam saat merasa cemas',
                'Batasi waktu membicarakan kejadian traumatis'
            ],
            'depression' => [
                'Tingkatkan aktivitas fisik ringan secara teratur',
                'Tetap terhubung dengan teman dan keluarga'
            ],
            'trauma' => [
                'Carilah informasi tentang trauma recovery yang kredibel',
                'Fokus pada aktivitas yang memberikan rasa kontrol dan aman'
            ]
        ];

        if (isset($concernSpecific[$primaryConcern])) {
            $recommendations = array_merge($baseRecommendations, $concernSpecific[$primaryConcern]);
        } else {
            $recommendations = $baseRecommendations;
        }

        return $recommendations;
    }

    /**
     * Get PTSD category description
     */
    private function getPTSDCategoryDescription($category): string
    {
        $descriptions = [
            'A' => 'Merasa terbayang-bayang atau kembali mengalami kejadian traumatis melalui ingatan, mimpi, atau flashbacks',
            'B' => 'Pandangan negatif tentang masa depan, harapan, atau tujuan hidup yang terpengaruh oleh trauma',
            'C' => 'Pikiran negatif yang persisten tentang diri sendiri, orang lain, atau dunia sekitar',
            'D' => 'Perubahan emosi yang negatif atau tidak stabil seperti marah, kesedihan, atau kecemasan yang berlebihan',
            'E' => 'Menghindar atau menjauh orang, tempat, atau aktivitas yang mengingatkan pada trauma',
            'F' => 'Perasaan tidak berdaya, tidak mampu, atau kehilangan kendali atas hidup'
        ];

        return $descriptions[$category] ?? 'Gejala PTSD yang memerlukan perhatian';
    }

    /**
     * Determine severity level based on percentage
     */
    private function determineSeverityLevel($percentage): string
    {
        if ($percentage >= 70) return 'severe';
        if ($percentage >= 50) return 'moderate';
        if ($percentage >= 30) return 'mild';
        return 'minimal';
    }

    /**
     * Generate interpretation text
     */
    private function generateInterpretation($totalScore, $maxPossibleScore, $primaryConcern, $ranking): string
    {
        $percentage = ($totalScore / $maxPossibleScore) * 100;
        $categoryName = $ranking[$primaryConcern]['name'] ?? '';

        if ($percentage >= 70) {
            return "Menunjukkan gejala PTSD yang signifikan. Perhatian utama adalah pada kategori {$categoryName} dengan skor tinggi. Disarankan untuk segera berkonsultasi dengan profesional kesehatan mental.";
        } elseif ($percentage >= 50) {
            return "Menunjukkan gejala PTSD yang sedang hingga moderat. Kategori {$categoryName} menjadi area perhatian utama. Pertimbangkan untuk berkonsultasi dengan konselor atau psikolog.";
        } elseif ($percentage >= 30) {
            return "Menunjukkan beberapa gejala PTSD ringan. Kategori {$categoryName} teridentifikasi sebagai area yang perlu diperhatikan. Disarankan untuk melakukan self-care dan memantau perkembangan gejala.";
        } else {
            return "Menunjukkan gejala PTSD minimal. Pertahankan strategi coping yang sehat dan jaga kesehatan mental Anda.";
        }
    }

    /**
     * Show assessment history
     */
    public function history($assessmentId)
    {
        // Get assessment type based on ID
        $assessment = Assessment::findOrFail($assessmentId);

        $assessments = UserAssessment::where('user_id', Auth::id())
            ->where('assessment_type', $assessment->type)
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->get();

        return view('assessment.history', compact('assessments', 'assessment'));
    }

    public function demoHistoryWithId($assessmentId)
    {
        // Get demo user assessments for demonstration
        $demoUser = User::where('email', 'demo@example.com')->first();

        if (!$demoUser) {
            return redirect()->route('assessment.history', $assessmentId)->with('error', 'Demo data tidak tersedia');
        }

        // Get assessment by ID
        $assessment = Assessment::findOrFail($assessmentId);

        $assessments = UserAssessment::where('user_id', $demoUser->id)
            ->where('assessment_type', $assessment->type)
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->get();

        return view('assessment.history', compact('assessments', 'assessment'));
    }

    public function testHistory($assessmentId)
    {
        // Test method untuk debugging - tidak memerlukan authentication
        $testUser = User::where('email', 'test@example.com')->first();

        if (!$testUser) {
            return redirect()->route('assessment.demo-history', $assessmentId)->with('error', 'Test user tidak tersedia');
        }

        // Get assessment by ID
        $assessment = Assessment::findOrFail($assessmentId);

        $assessments = UserAssessment::where('user_id', $testUser->id)
            ->where('assessment_type', $assessment->type)
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->get();

        return view('assessment.history', compact('assessments', 'assessment'));
    }

    /**
     * Get questions for specific assessment type
     */
    private function getQuestionsForAssessment(Assessment $assessment): array
    {
        switch ($assessment->type) {
            case 'ptsd_diagnostic':
                return [
                    'questions' => PTSDDiagnosticQuestions::getAllQuestions(),
                    'scale' => PTSDDiagnosticQuestions::getScaleOptions(),
                    'instructions' => PTSDDiagnosticQuestions::INSTRUCTIONS,
                    'disclaimer' => PTSDDiagnosticQuestions::DISCLAIMER
                ];

            case 'checklist_masalah':
                return [
                    'questions' => \App\Models\ChecklistMasalahQuestion::getAllGroupedByCategory(),
                    'category_names' => \App\Models\ChecklistMasalahQuestion::getCategoryNames(),
                    'instructions' => $assessment->instructions,
                    'disclaimer' => $assessment->disclaimer_text
                ];

            default:
                return [];
        }
    }    /**
     * Calculate assessment results based on type
     */
    private function calculateAssessmentResults(UserAssessment $userAssessment, Assessment $assessment): array
    {
        switch ($assessment->type) {
            case 'ptsd_diagnostic':
                return $this->calculationService->calculatePTSDDiagnostic($userAssessment);

            case 'checklist_masalah':
                return $this->calculationService->calculateChecklistMasalah($userAssessment);

            default:
                return [];
        }
    }


    /**
     * Assessment page - show assessment options for all users
     */
    public function index()
    {
        // Fetch all assessments dynamically
        $assessments = Assessment::all();

        // Show assessment options page for both guest and authenticated users
        return view('assessment.options', compact('assessments'));
    }

    public function generatePDFReport(Request $request)
    {
        // Decode assessment data from request
        $assessmentData = $request->input('data');

        if ($assessmentData) {
            $assessmentData = json_decode($assessmentData, true);
        } else {
            // Fallback: try to get data from session or return error
            return response()->json(['error' => 'Assessment data not found'], 404);
        }

        // Process assessment data
        $answers = $assessmentData['answers'] ?? [];
        $totalQuestions = count($answers);
        $totalScore = array_sum($answers);
        $averageScore = $totalQuestions > 0 ? $totalScore / $totalQuestions : 0;

        // Determine status and recommendations
        $status = $this->determineStatus($averageScore);

        // Assessment sections data
        $sections = [
            [
                'id' => 1,
                'title' => 'Reaksi Emosional',
                'description' => 'Evaluasi respons emosional terhadap situasi darurat',
                'questions' => [
                    [
                        'id' => 1,
                        'text' => 'Bagaimana perasaan Anda ketika mendengar peringatan bencana?',
                        'options' => [
                            ['text' => 'Sangat tenang dan siap bertindak', 'value' => 4],
                            ['text' => 'Sedikit cemas tapi tetap terkendali', 'value' => 3],
                            ['text' => 'Cukup khawatir dan bingung', 'value' => 2],
                            ['text' => 'Sangat panik dan takut', 'value' => 1]
                        ]
                    ],
                    [
                        'id' => 2,
                        'text' => 'Bagaimana Anda mengelola stress dalam situasi darurat?',
                        'options' => [
                            ['text' => 'Menggunakan teknik relaksasi yang sudah dipelajari', 'value' => 4],
                            ['text' => 'Berusaha tetap tenang dengan cara sendiri', 'value' => 3],
                            ['text' => 'Kesulitan mengendalikan stress', 'value' => 2],
                            ['text' => 'Tidak bisa mengatasi stress sama sekali', 'value' => 1]
                        ]
                    ],
                    [
                        'id' => 3,
                        'text' => 'Seberapa percaya diri Anda dalam mengambil keputusan cepat saat darurat?',
                        'options' => [
                            ['text' => 'Sangat percaya diri dan tegas', 'value' => 4],
                            ['text' => 'Cukup percaya diri', 'value' => 3],
                            ['text' => 'Ragu-ragu dalam mengambil keputusan', 'value' => 2],
                            ['text' => 'Tidak percaya diri sama sekali', 'value' => 1]
                        ]
                    ]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Persiapan Fisik',
                'description' => 'Evaluasi kesiapan peralatan dan rencana fisik',
                'questions' => [
                    [
                        'id' => 4,
                        'text' => 'Apakah Anda memiliki rencana evakuasi keluarga?',
                        'options' => [
                            ['text' => 'Ya, sudah tersusun lengkap dan dipraktikkan', 'value' => 4],
                            ['text' => 'Ya, sudah ada tapi belum dipraktikkan', 'value' => 3],
                            ['text' => 'Sedang dalam proses penyusunan', 'value' => 2],
                            ['text' => 'Belum ada sama sekali', 'value' => 1]
                        ]
                    ],
                    [
                        'id' => 5,
                        'text' => 'Apakah Anda memiliki tas siaga bencana?',
                        'options' => [
                            ['text' => 'Ya, lengkap dan selalu diperbarui', 'value' => 4],
                            ['text' => 'Ya, tapi perlu dilengkapi', 'value' => 3],
                            ['text' => 'Sedang menyiapkan', 'value' => 2],
                            ['text' => 'Belum memiliki', 'value' => 1]
                        ]
                    ]
                ]
            ],
            [
                'id' => 3,
                'title' => 'Pengetahuan & Keterampilan',
                'description' => 'Evaluasi pengetahuan dan pengalaman terkait bencana',
                'questions' => [
                    [
                        'id' => 6,
                        'text' => 'Seberapa sering Anda mengikuti simulasi tanggap bencana?',
                        'options' => [
                            ['text' => 'Rutin mengikuti (lebih dari 2x setahun)', 'value' => 4],
                            ['text' => 'Kadang-kadang (1-2x setahun)', 'value' => 3],
                            ['text' => 'Jarang (kurang dari 1x setahun)', 'value' => 2],
                            ['text' => 'Tidak pernah', 'value' => 1]
                        ]
                    ],
                    [
                        'id' => 7,
                        'text' => 'Seberapa baik pengetahuan Anda tentang tanda-tanda bencana alam di daerah Anda?',
                        'options' => [
                            ['text' => 'Sangat baik dan selalu update', 'value' => 4],
                            ['text' => 'Cukup baik', 'value' => 3],
                            ['text' => 'Terbatas', 'value' => 2],
                            ['text' => 'Sangat minim', 'value' => 1]
                        ]
                    ]
                ]
            ]
        ];

        $data = [
            'timestamp' => Carbon::now(),
            'participantName' => $assessmentData['participantName'] ?? 'Peserta Assessment',
            'totalQuestions' => $totalQuestions,
            'totalScore' => $totalScore,
            'averageScore' => $averageScore,
            'answers' => $answers,
            'sections' => $sections,
            'status' => $status
        ];

        // Generate PDF
        $pdf = Pdf::loadView('assessment-pdf-template', $data);
        $pdf->setPaper('A4', 'portrait');

        $filename = 'Laporan_Assessment_' . Carbon::now()->format('Y-m-d_H-i-s') . '.pdf';

        return $pdf->download($filename);
    }

    private function determineStatus($averageScore)
    {
        if ($averageScore >= 2.5) {
            return [
                'level' => 'AMAN',
                'class' => 'status-aman',
                'icon' => '🛡️',
                'title' => 'Kesiapan Mental Sangat Baik',
                'description' => 'Hasil assessment menunjukkan bahwa mental Anda dalam kondisi prima dan siap menghadapi situasi darurat. Anda memiliki kesiapan yang baik dalam mengelola stress dan mengambil keputusan dalam situasi sulit. Pertahankan kondisi ini dengan terus berlatih dan membantu orang lain dalam persiapan tanggap bencana.',
                'needsCounseling' => false
            ];
        } elseif ($averageScore >= 1.5) {
            return [
                'level' => 'WASPADA',
                'class' => 'status-waspada',
                'icon' => '⚠️',
                'title' => 'Perlu Peningkatan Kesiapan Mental',
                'description' => 'Hasil assessment menunjukkan bahwa Anda perlu meningkatkan beberapa aspek kesiapan mental. Disarankan untuk berkonsultasi dengan konselor profesional guna mengidentifikasi dan memperbaiki area yang perlu diperkuat. Fokus pada pembelajaran teknik manajemen stress dan pengembangan rencana tanggap darurat.',
                'needsCounseling' => true
            ];
        } else {
            return [
                'level' => 'KRITIS',
                'class' => 'status-kritis',
                'icon' => '🚨',
                'title' => 'Memerlukan Bantuan Segera',
                'description' => 'Hasil assessment menunjukkan kondisi mental Anda memerlukan perhatian khusus dan bantuan profesional. Sangat disarankan untuk segera berkonsultasi dengan konselor profesional untuk mendapatkan dukungan yang tepat. Jangan ragu untuk mencari bantuan dari komunitas dan keluarga dalam mempersiapkan diri menghadapi situasi darurat.',
                'needsCounseling' => true
            ];
        }
    }

    /**
     * Submit DCM Checklist assessment
     */
    public function submitDcm(Request $request, Assessment $assessment)
    {
        // For DCM, we don't require answers field since it uses 'responses'
        // No validation needed - let submitDcmChecklist handle it
        return $this->submitDcmChecklist($request, $assessment);
    }

    /**
     * Submit DCM Checklist assessment with checkbox format
     */
    public function submitDcmChecklist(Request $request, Assessment $assessment)
    {
        try {
            // Debug: Log all incoming data
            Log::info('DCM Checklist submission - Raw data:', [
                'all_input' => $request->all(),
                'responses' => $request->responses,
                'answers' => $request->answers,
                'has_responses' => $request->has('responses'),
                'user_id' => Auth::id()
            ]);

            DB::beginTransaction();

            // Get responses/answers from request (DCM uses 'problems', PTSD uses 'answers')
            $responses = $request->problems ?? $request->responses ?? $request->answers ?? [];

            // Create user assessment record
            $userAssessment = $this->createDcmUserAssessment($assessment);

            // Save DCM answers
            $this->saveDcmAnswers($userAssessment, $responses, $assessment);

            // Calculate and update results
            $this->calculateAndUpdateDcmResults($userAssessment);

            DB::commit();

            Log::info('DCM Transaction committed, redirecting to start-new page...');

            return redirect()->route('assessment.start-new', $assessment)
                ->with('success', 'Assessment DCM Checklist berhasil diselesaikan. Anda dapat melihat hasil pada panel riwayat.');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('DCM submission error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan hasil assessment: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Create DCM User Assessment record
     */
    private function createDcmUserAssessment(Assessment $assessment)
    {
        $userAssessment = UserAssessment::create([
            'user_id' => Auth::id(),
            'assessment_type' => $assessment->type,
            'started_at' => now(),
            'completed_at' => now(),
            'status' => 'completed'
        ]);

        Log::info('DCM User assessment created with ID: ' . $userAssessment->id);

        return $userAssessment;
    }

    /**
     * Save DCM answers to database
     */
    private function saveDcmAnswers(UserAssessment $userAssessment, array $responses, Assessment $assessment)
    {
        // Get the total number of problems from assessment
        $totalProblems = $assessment->total_questions ?? 69; // Default 69 if not set

        // Save individual answers for all problems
        for ($problemId = 1; $problemId <= $totalProblems; $problemId++) {
            // Check if checkbox is checked (value = 1) or not (value = 0)
            // DCM sends responses[id], need to check if id matches
            $answerValue = 0;
            foreach ($responses as $responseId => $responseValue) {
                // Fix: Use strict comparison to ensure correct ID matching
                if ((string)$responseId === (string)$problemId && $responseValue == 1) {
                    $answerValue = 1;
                    break;
                }
            }

            UserAnswer::create([
                'user_assessment_id' => $userAssessment->id,
                'question_number' => $problemId,
                'answer_value' => $answerValue,
                'answered_at' => now()
            ]);
        }

        Log::info('DCM Answers saved successfully');
    }

    /**
     * Calculate and update DCM results
     */
    private function calculateAndUpdateDcmResults(UserAssessment $userAssessment)
    {
        // Calculate DCM results using the service
        $calculationResults = $this->calculationService->calculateChecklistMasalah($userAssessment);

        // For DCM, we don't use overall_risk_level enum
        // Set to 'low' as default and use null for recommendations (convert array to null)
        $recommendationsArray = $calculationResults['recommendations'] ?? [];
        $recommendationsJson = empty($recommendationsArray) ? null : json_encode($recommendationsArray);

        // Update user assessment with DCM results
        $userAssessment->update([
            'results' => $calculationResults,
            'overall_risk_level' => 'low', // Default value for DCM
            'interpretation_text' => 'DCM Assessment - ' . ($calculationResults['dominant_category_name'] ?? 'Complete'),
            'recommendations' => $recommendationsJson,
            'requires_followup' => false // DCM doesn't use followup flag
        ]);

        Log::info('DCM Results calculated and updated');
    }

    /**
     * Show DCM assessment results
     */
    public function dcmResult(\App\Models\DcmAssessmentResult $result)
    {
        // Check ownership
        if ($result->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to assessment result.');
        }

        return view('assessment.dcm-result', compact('result'));
    }
}
