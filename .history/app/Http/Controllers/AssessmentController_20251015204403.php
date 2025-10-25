<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Assessment;
use App\Models\UserAssessment;
use App\Models\UserAnswer;
use App\Services\AssessmentCalculationService;
use App\Services\AssessmentQuestions\PTSDDiagnosticQuestions;
use App\Services\AssessmentQuestions\ChecklistMasalahQuestions;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AssessmentController extends Controller
{
    protected $calculationService;

    public function __construct(AssessmentCalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    /**
     * Show assessment selection page (Mental Health Assessments)
     */
    public function mentalHealth()
    {
        $assessments = Assessment::where('is_active', true)->get();

        return view('assessment.mental-health', compact('assessments'));
    }

    /**
     * Start a specific mental health assessment
     */
    public function start(Assessment $assessment)
    {
        // Check if user has completed this assessment recently (within 30 days)
        $recentAssessment = UserAssessment::where('user_id', Auth::id())
            ->where('assessment_id', $assessment->id)
            ->where('completed_at', '>', now()->subDays(30))
            ->first();

        if ($recentAssessment) {
            return redirect()->route('assessment.result', $recentAssessment->id)
                ->with('info', 'Anda telah menyelesaikan asesmen ini dalam 30 hari terakhir.');
        }

        // Get questions based on assessment type
        $questions = $this->getQuestionsForAssessment($assessment);

        if (empty($questions)) {
            return redirect()->route('assessment.mental-health')
                ->with('error', 'Asesmen ini belum tersedia.');
        }

        return view('assessment.take', compact('assessment', 'questions'));
    }

    /**
     * Submit assessment answers
     */
    public function submit(Request $request, Assessment $assessment)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:0|max:4'
        ]);

        try {
            DB::beginTransaction();

            // Create user assessment record
            $userAssessment = UserAssessment::create([
                'user_id' => Auth::id(),
                'assessment_id' => $assessment->id,
                'started_at' => now(),
                'completed_at' => now(),
                'status' => 'completed'
            ]);

            // Save individual answers
            foreach ($request->answers as $questionNumber => $answerValue) {
                UserAnswer::create([
                    'user_assessment_id' => $userAssessment->id,
                    'question_number' => $questionNumber,
                    'answer_value' => $answerValue
                ]);
            }

            // Calculate results based on assessment type
            $results = $this->calculateAssessmentResults($userAssessment, $assessment);

            // Update user assessment with results
            $userAssessment->update([
                'results' => $results
            ]);

            DB::commit();

            return redirect()->route('assessment.result', $userAssessment->id)
                ->with('success', 'Asesmen berhasil diselesaikan.');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan hasil asesmen.')
                ->withInput();
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

        $assessment = $userAssessment->assessment;
        $results = $userAssessment->results;

        return view('assessment.result', compact('userAssessment', 'assessment', 'results'));
    }

    /**
     * Show assessment history
     */
    public function history()
    {
        $userAssessments = UserAssessment::with('assessment')
            ->where('user_id', Auth::id())
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->paginate(10);

        return view('assessment.history', compact('userAssessments'));
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
                    'symptoms' => ChecklistMasalahQuestions::getAllSymptoms(),
                    'scale' => ChecklistMasalahQuestions::getScaleOptions(),
                    'instructions' => ChecklistMasalahQuestions::INSTRUCTIONS,
                    'disclaimer' => ChecklistMasalahQuestions::DISCLAIMER
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

            // Legacy support
            case 'pcl5':
                return $this->calculationService->calculatePCL5($userAssessment);

            case 'dass21':
                return $this->calculationService->calculateDASS21($userAssessment);

            default:
                return [];
        }
    }

    /**
     * Assessment page - redirect to mental health assessment for authenticated users
     */
    public function index()
    {
        // If user is authenticated, redirect to mental health assessment
        if (Auth::check()) {
            return redirect()->route('assessment.mental-health');
        }
        
        // For guest users, show simple assessment options
        return view('assessment.options');
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
}
