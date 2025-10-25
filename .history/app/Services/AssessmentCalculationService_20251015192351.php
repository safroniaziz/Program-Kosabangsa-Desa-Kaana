<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\UserAssessment;
use App\Models\UserAnswer;
use App\Models\MentalHealthAlert;
use App\Services\AssessmentQuestions\PCL5Questions;
use App\Services\AssessmentQuestions\DASS21Questions;
use Illuminate\Support\Facades\Log;

class AssessmentCalculationService
{
    /**
     * Calculate PCL-5 assessment scores and generate results
     */
    public function calculatePCL5(UserAssessment $userAssessment): array
    {
        $answers = $userAssessment->userAnswers()->get();

        $totalScore = 0;
        $clusterScores = [
            'intrusion' => 0,
            'avoidance' => 0,
            'cognition_mood' => 0,
            'arousal_reactivity' => 0
        ];
        $symptomCount = 0;

        foreach ($answers as $answer) {
            $score = $answer->answer_value;
            $totalScore += $score;

            // Count symptom if score >= 2 (moderate or higher)
            if ($score >= 2) {
                $symptomCount++;
            }

            // Add to cluster score
            $cluster = PCL5Questions::getClusterForQuestion($answer->question_number);
            if ($cluster && isset($clusterScores[$cluster])) {
                $clusterScores[$cluster] += $score;
            }
        }

        // Determine severity level
        $severity = $this->getPCL5Severity($totalScore);

        // Check for clinical significance (cutoff score ≥ 33)
        $clinicallySignificant = $totalScore >= 33;

        // Check for probable PTSD (symptom criteria)
        $probablePTSD = $this->checkPTSDCriteria($answers);

        $results = [
            'total_score' => $totalScore,
            'severity' => $severity,
            'cluster_scores' => $clusterScores,
            'symptom_count' => $symptomCount,
            'clinically_significant' => $clinicallySignificant,
            'probable_ptsd' => $probablePTSD,
            'recommendations' => $this->getPCL5Recommendations($severity, $clinicallySignificant, $probablePTSD)
        ];

        // Create alert if high risk
        if ($clinicallySignificant || $probablePTSD) {
            $this->createMentalHealthAlert($userAssessment, 'pcl5', 'high', $results);
        }

        return $results;
    }

    /**
     * Calculate DASS-21 assessment scores and generate results
     */
    public function calculateDASS21(UserAssessment $userAssessment): array
    {
        $answers = $userAssessment->userAnswers()->get();

        $subscaleScores = [
            'depression' => 0,
            'anxiety' => 0,
            'stress' => 0
        ];

        foreach ($answers as $answer) {
            $subscale = DASS21Questions::getSubscaleForQuestion($answer->question_number);
            if ($subscale && isset($subscaleScores[$subscale])) {
                $subscaleScores[$subscale] += $answer->answer_value;
            }
        }

        // Multiply by 2 (DASS-21 to DASS-42 conversion)
        $finalScores = [];
        $severityLevels = [];

        foreach ($subscaleScores as $subscale => $rawScore) {
            $finalScore = $rawScore * 2;
            $finalScores[$subscale] = $finalScore;
            $severityLevels[$subscale] = DASS21Questions::getSeverityLevel($subscale, $finalScore);
        }

        // Determine overall risk level
        $overallRisk = $this->getDASS21OverallRisk($severityLevels);

        $results = [
            'subscale_scores' => $finalScores,
            'raw_scores' => $subscaleScores,
            'severity_levels' => $severityLevels,
            'overall_risk' => $overallRisk,
            'recommendations' => $this->getDASS21Recommendations($severityLevels, $overallRisk)
        ];

        // Create alert if moderate or higher risk in any subscale
        if ($overallRisk === 'high' || $this->hasModerateOrHigherRisk($severityLevels)) {
            $this->createMentalHealthAlert($userAssessment, 'dass21', $overallRisk, $results);
        }

        return $results;
    }

    /**
     * Check PTSD symptom criteria for PCL-5
     */
    private function checkPTSDCriteria(array $answers): bool
    {
        $clusterCounts = [
            'intrusion' => 0,
            'avoidance' => 0,
            'cognition_mood' => 0,
            'arousal_reactivity' => 0
        ];

        foreach ($answers as $answer) {
            if ($answer->answer_value >= 2) { // Moderate or higher
                $cluster = PCL5Questions::getClusterForQuestion($answer->question_number);
                if ($cluster && isset($clusterCounts[$cluster])) {
                    $clusterCounts[$cluster]++;
                }
            }
        }

        // DSM-5 criteria: ≥1 intrusion, ≥1 avoidance, ≥2 cognition/mood, ≥2 arousal/reactivity
        return $clusterCounts['intrusion'] >= 1 &&
               $clusterCounts['avoidance'] >= 1 &&
               $clusterCounts['cognition_mood'] >= 2 &&
               $clusterCounts['arousal_reactivity'] >= 2;
    }

    /**
     * Get PCL-5 severity level based on total score
     */
    private function getPCL5Severity(int $totalScore): string
    {
        if ($totalScore >= 50) return 'severe';
        if ($totalScore >= 38) return 'moderate';
        if ($totalScore >= 31) return 'mild';
        return 'minimal';
    }

    /**
     * Get overall risk level for DASS-21
     */
    private function getDASS21OverallRisk(array $severityLevels): string
    {
        $highRisk = ['severe', 'extremely_severe'];
        $moderateRisk = ['moderate'];

        foreach ($severityLevels as $level) {
            if (in_array($level, $highRisk)) {
                return 'high';
            }
        }

        foreach ($severityLevels as $level) {
            if (in_array($level, $moderateRisk)) {
                return 'moderate';
            }
        }

        return 'low';
    }

    /**
     * Check if any subscale has moderate or higher risk
     */
    private function hasModerateOrHigherRisk(array $severityLevels): bool
    {
        $riskLevels = ['moderate', 'severe', 'extremely_severe'];

        foreach ($severityLevels as $level) {
            if (in_array($level, $riskLevels)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get PCL-5 recommendations
     */
    private function getPCL5Recommendations(string $severity, bool $clinicallySignificant, bool $probablePTSD): array
    {
        $recommendations = [];

        if ($probablePTSD || $severity === 'severe') {
            $recommendations[] = "Sangat disarankan untuk segera berkonsultasi dengan psikolog atau psikiater";
            $recommendations[] = "Pertimbangkan untuk mencari terapi trauma seperti EMDR atau CPT";
            $recommendations[] = "Hindari alkohol dan zat adiktif sebagai pelarian";
        } elseif ($clinicallySignificant || $severity === 'moderate') {
            $recommendations[] = "Disarankan berkonsultasi dengan profesional kesehatan mental";
            $recommendations[] = "Praktikkan teknik relaksasi dan mindfulness";
            $recommendations[] = "Jaga rutinitas tidur dan olahraga teratur";
        } elseif ($severity === 'mild') {
            $recommendations[] = "Monitor gejala secara berkala";
            $recommendations[] = "Praktikkan self-care dan teknik manajemen stres";
            $recommendations[] = "Berbicara dengan orang terpercaya jika diperlukan";
        } else {
            $recommendations[] = "Terus jaga kesehatan mental dengan pola hidup sehat";
            $recommendations[] = "Tetap waspada terhadap perubahan gejala";
        }

        return $recommendations;
    }

    /**
     * Get DASS-21 recommendations
     */
    private function getDASS21Recommendations(array $severityLevels, string $overallRisk): array
    {
        $recommendations = [];

        if ($overallRisk === 'high') {
            $recommendations[] = "Sangat disarankan untuk segera berkonsultasi dengan psikolog atau psikiater";
            $recommendations[] = "Pertimbangkan terapi kognitif-behavioral (CBT)";
            $recommendations[] = "Jaga pola makan, tidur, dan olahraga secara teratur";
        } elseif ($overallRisk === 'moderate') {
            $recommendations[] = "Disarankan berkonsultasi dengan profesional kesehatan mental";
            $recommendations[] = "Praktikkan teknik relaksasi dan manajemen stres";
            $recommendations[] = "Pertahankan aktivitas sosial yang positif";
        } else {
            $recommendations[] = "Terus jaga keseimbangan hidup";
            $recommendations[] = "Monitor perubahan mood dan tingkat stres";
            $recommendations[] = "Praktikkan aktivitas yang menyenangkan";
        }

        // Specific recommendations based on subscales
        if (in_array($severityLevels['depression'], ['moderate', 'severe', 'extremely_severe'])) {
            $recommendations[] = "Khusus depresi: Tetap aktif dan jangan isolasi diri";
        }

        if (in_array($severityLevels['anxiety'], ['moderate', 'severe', 'extremely_severe'])) {
            $recommendations[] = "Khusus kecemasan: Praktikkan teknik pernapasan dan grounding";
        }

        if (in_array($severityLevels['stress'], ['moderate', 'severe', 'extremely_severe'])) {
            $recommendations[] = "Khusus stres: Identifikasi dan kelola sumber stres";
        }

        return array_unique($recommendations);
    }

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
}
