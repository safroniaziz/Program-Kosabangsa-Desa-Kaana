<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\UserAssessment;
use App\Models\UserAnswer;
use App\Models\MentalHealthAlert;
use App\Services\AssessmentQuestions\PTSDDiagnosticQuestions;
use Illuminate\Support\Facades\Log;

class AssessmentCalculationService
{

    /**
     * Create mental health alert if needed
     */
    private function createMentalHealthAlert(UserAssessment $userAssessment, string $assessmentType, string $riskLevel, array $results): void
    {
        try {
            MentalHealthAlert::create([
                'user_assessment_id' => $userAssessment->id,
                'user_id' => $userAssessment->user_id,
                'assessment_type' => $assessmentType,
                'risk_level' => $riskLevel,
                'alert_data' => $results,
                'is_resolved' => false,
                'alert_date' => now()
            ]);

            Log::info("Mental health alert created for user {$userAssessment->user_id}, assessment {$assessmentType}, risk level {$riskLevel}");
        } catch (\Exception $e) {
            Log::error("Failed to create mental health alert: " . $e->getMessage());
        }
    }

    /**
     * Calculate PTSD Diagnostic assessment scores and generate results
     */
    public function calculatePTSDDiagnostic(UserAssessment $userAssessment): array
    {
        $answers = $userAssessment->userAnswers()->get();

        // Prepare responses array
        $responses = [];
        foreach ($answers as $answer) {
            $responses[$answer->question_number] = $answer->answer_value;
        }

        // Get assessment summary from PTSDDiagnosticQuestions
        $summary = PTSDDiagnosticQuestions::getAssessmentSummary($responses);

        $results = [
            'total_score' => $summary['total_score'],
            'max_possible_score' => $summary['max_possible_score'],
            'category_scores' => $summary['category_scores'],
            'ranking' => $summary['ranking'],
            'primary_concern' => $summary['primary_concern'],
            'responses_count' => $summary['responses_count']
        ];

        return $results;
    }

    /**
     * Calculate Checklist Masalah assessment scores and generate results using database
     */
    public function calculateChecklistMasalah(UserAssessment $userAssessment): array
    {
        $answers = $userAssessment->userAnswers()->get();

        // Get all questions from database
        $allQuestions = \App\Models\ChecklistMasalahQuestion::all();

        // Prepare responses array and map question_number to category
        $responses = [];
        $questionToCategory = [];
        foreach ($answers as $answer) {
            $responses[$answer->question_number] = $answer->answer_value;

            // Find the corresponding question in database to get its category
            $question = $allQuestions->where('id', $answer->question_number)->first();
            if ($question) {
                $questionToCategory[$answer->question_number] = $question->category;
            }
        }

        // Calculate category scores using database questions
        $categoryScores = [];
        for ($i = 1; $i <= 5; $i++) {
            $categoryScores[$i] = 0;
        }

        foreach ($responses as $questionId => $value) {
            if ($value == 1 && isset($questionToCategory[$questionId])) {
                $category = $questionToCategory[$questionId];
                $categoryScores[$category] = ($categoryScores[$category] ?? 0) + 1;
            }
        }

        // Get dominant category
        $dominantCategory = array_keys($categoryScores, max($categoryScores))[0];
        $categoryNames = [
            1 => 'Gejala Fisik',
            2 => 'Gejala Emosi',
            3 => 'Gejala Mental',
            4 => 'Gejala Perilaku',
            5 => 'Gejala Spiritual'
        ];
        $dominantCategoryName = $categoryNames[$dominantCategory];

        // Calculate total problems
        $totalProblems = array_sum($categoryScores);
        $totalPossibleProblems = $allQuestions->count();

        // Calculate percentage
        $percentage = $totalPossibleProblems > 0 ? round(($totalProblems / $totalPossibleProblems) * 100, 1) : 0;

        // Generate interpretation based on percentage
        $interpretation = [
            'percentage' => $percentage,
            'severity_color' => $this->getSeverityColor($percentage),
            'bg_color' => $this->getBgColor($percentage),
            'icon' => $this->getIcon($dominantCategory),
            'category_info' => $categoryNames[$dominantCategory],
            'interpretation_text' => $this->getInterpretationText($dominantCategory, $totalProblems)
        ];

        // Generate recommendations
        $recommendations = $this->generateRecommendations($dominantCategory, $totalProblems, $totalPossibleProblems);

        $results = [
            'total_problems' => $totalProblems,
            'total_possible_problems' => $totalPossibleProblems,
            'percentage' => $percentage,
            'dominant_category' => $dominantCategory,
            'dominant_category_name' => $dominantCategoryName,
            'category_scores' => $categoryScores,
            'severity_color' => $interpretation['severity_color'],
            'bg_color' => $interpretation['bg_color'],
            'icon' => $interpretation['icon'],
            'category_info' => $interpretation['category_info'],
            'symptom_responses' => $responses,
            'recommendations' => $recommendations,
            'interpretation' => $interpretation
        ];

        return $results;
    }


    /**
     * Helper methods for DCM interpretation
     */
    private function getSeverityColor($percentage): string
    {
        if ($percentage >= 60) return '#ef4444'; // Red
        if ($percentage >= 40) return '#f59e0b'; // Orange
        if ($percentage >= 20) return '#3b82f6'; // Blue
        return '#10b981'; // Green
    }

    private function getBgColor($percentage): string
    {
        if ($percentage >= 60) return '#fef2f2'; // Red
        if ($percentage >= 40) return '#fef3c7'; // Orange
        if ($percentage >= 20) return '#eff6ff'; // Blue
        return '#f0fdf4'; // Green
    }

    private function getIcon($category): string
    {
        $icons = [
            1 => 'fa-heartbeat',
            2 => 'fa-smile',
            3 => 'fa-brain',
            4 => 'fa-user',
            5 => 'fa-pray'
        ];
        return $icons[$category] ?? 'fa-question';
    }

    private function getInterpretationText($category, $totalProblems): string
    {
        $categoryNames = [
            1 => 'Gejala Fisik',
            2 => 'Gejala Emosi',
            3 => 'Gejala Mental',
            4 => 'Gejala Perilaku',
            5 => 'Gejala Spiritual'
        ];

        $baseText = "Berdasarkan hasil assessment, Anda menunjukkan gejala dominan pada kategori {$categoryNames[$category]}.";

        if ($totalProblems >= 30) {
            return $baseText . " Jumlah gejala yang tinggi menunjukkan perlunya penanganan segera dari profesional.";
        } elseif ($totalProblems >= 20) {
            return $baseText . " Disarankan untuk mencari dukungan dan melakukan strategi penanganan gejala.";
        } else {
            return $baseText . " Gejala yang muncul masih dalam tingkat yang dapat dikelola.";
        }
    }

    private function generateRecommendations($dominantCategory, $totalProblems, $totalPossible): array
    {
        $recommendations = [
            "Fokus pada gejala yang Anda alami",
            "Carilah dukungan sosial dari teman atau keluarga"
        ];

        // Category-specific recommendations
        if ($dominantCategory === 5) { // Spiritual
            $recommendations[] = "Jika mengalami krisis spiritual, pertimbangkan untuk berkonsultasi dengan pemuka agama atau spiritual counselor";
        } elseif ($dominantCategory === 1) { // Fisik
            $recommendations[] = "Periksakan gejala fisik ke dokter untuk menyingkirkan kemungkinan kondisi medis lain";
        }

        // Severity-based recommendations
        if ($totalProblems >= $totalPossible * 0.6) {
            $recommendations[] = "Segera cari bantuan profesional kesehatan mental";
        } elseif ($totalProblems >= $totalPossible * 0.4) {
            $recommendations[] = "Pertimbangkan untuk konsultasi dengan konselor atau psikolog";
        }

        return $recommendations;
    }

    /**
     * Determine risk level for Checklist Masalah based on symptom count
     */
    private function getChecklistMasalahRisk(int $totalSymptoms, int $totalPossible): string
    {
        $percentage = ($totalSymptoms / $totalPossible) * 100;

        if ($percentage >= 60) {
            return 'high';
        }

        if ($percentage >= 40) {
            return 'moderate';
        }

        if ($percentage >= 20) {
            return 'mild';
        }

        return 'low';
    }


    /**
     * Get recommendations for Checklist Masalah results
     */
    private function getChecklistMasalahRecommendations(string $riskLevel, int $totalSymptoms): array
    {
        $recommendations = [];

        switch ($riskLevel) {
            case 'high':
                $recommendations[] = "Dengan {$totalSymptoms} gejala yang dialami, sangat disarankan untuk segera berkonsultasi dengan profesional";
                $recommendations[] = "Pertimbangkan untuk mencari bantuan psikologis atau medis";
                $recommendations[] = "Jangan ragu untuk meminta dukungan dari keluarga dan teman";
                break;

            case 'moderate':
                $recommendations[] = "Dengan {$totalSymptoms} gejala, disarankan untuk memantau kondisi lebih ketat";
                $recommendations[] = "Praktikkan teknik relaksasi dan manajemen stres";
                $recommendations[] = "Pertimbangkan konsultasi jika gejala bertambah";
                break;

            case 'mild':
                $recommendations[] = "Beberapa gejala yang dialami masih dalam batas normal pasca-trauma";
                $recommendations[] = "Lanjutkan aktivitas positif dan jaga pola hidup sehat";
                break;

            default:
                $recommendations[] = "Kondisi Anda menunjukkan resiliensi yang baik";
                $recommendations[] = "Terus jaga kesehatan mental dengan aktivitas positif";
                break;
        }

        return $recommendations;
    }
}
