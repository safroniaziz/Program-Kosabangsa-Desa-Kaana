<?php

namespace App\Services\AssessmentQuestions;

class PTSDDiagnosticQuestions
{
    const QUESTIONS = [
        1 => "Bermimpi atau merasa terus dibayang-bayangi oleh peristiwa tragis yang terjadi",
        2 => "Merasa masa depan suram",
        3 => "Bersikap waspada di luar batas kewajaran terhadap keselamatan diri",
        4 => "Mudah marah",
        5 => "Menolak dikunjungi orang asing",
        6 => "Kehilangan minat untuk melakukan kembali aktivitas yang biasa dilakukan sebelum peristiwa tragis terjadi",
        7 => "Merasa seperti mengalami kembali peristiwa yang terjadi",
        8 => "Merasa tidak ada upaya yang dapat dilakukan untuk pulih dari peristiwa tragis yang telah terjadi",
        9 => "Sulit untuk berkonsentrasi dalam belajar atau berpikir",
        10 => "Tidak mau mengalah meskipun dalam posisi salah",
        11 => "Sulit berinteraksi dengan orang lain",
        12 => "Menunggu takdir Tuhan dalam menghadapi hidup",
        13 => "Mengalami sakit kepala / mual / alergi ketika dihadapkan pada simbol dari peristiwa tragis yang terjadi",
        14 => "Merasa tidak lagi memiliki kebanggaan terhadap diri sendiri",
        15 => "Merasa tidak nyaman dimanapun berada",
        16 => "Ngotot dalam berpendapat / berbicara",
        17 => "Lebih suka berdiam diri",
        18 => "Merasa keberadaan hidup tidak berarti lagi sejak mengalami peristiwa tragis",
        19 => "Mengalami gangguan tidur (banyak tidur atau sulit tidur)",
        20 => "Tidak ada harapan keadaan akan menjadi lebih baik",
        21 => "Merasa orang lain tidak peduli",
        22 => "Mudah menangis",
        23 => "Merasa diri terisolasi dari orang lain",
        24 => "Merasa tidak berdaya",
        25 => "Mudah cemas dan panik ketika terjadi peristiwa di luar dugaan",
        26 => "Merasa putus asa",
        27 => "Mencurigai orang baru secara berlebihan",
        28 => "Mudah tersinggung",
        29 => "Menarik diri dari bergaul dengan orang lain atau lingkungan",
        30 => "Merasa sangat kecewa dengan keadaan yang terjadi"
    ];

    const SCALE_OPTIONS = [
        0 => "Tidak Benar",
        1 => "Benar"
    ];

    const CATEGORIES = [
        'A' => [1, 7, 13, 19, 25],        // Terbayangi oleh Peristiwa Traumatis
        'B' => [2, 8, 14, 20, 26],        // Harapan Masa Depan Rendah
        'C' => [3, 9, 15, 21, 27],        // Berpikir Negatif
        'D' => [4, 10, 16, 22, 28],       // Emosional
        'E' => [5, 11, 17, 23, 29],       // Mengisolasi Diri
        'F' => [6, 12, 18, 24, 30]        // Merasa Tidak Berdaya
    ];

    const CATEGORY_NAMES = [
        'A' => 'Terbayangi oleh Peristiwa Traumatis',
        'B' => 'Harapan Masa Depan Rendah',
        'C' => 'Berpikir Negatif',
        'D' => 'Emosional',
        'E' => 'Mengisolasi Diri',
        'F' => 'Merasa Tidak Berdaya'
    ];

        const INSTRUCTIONS = "Petunjuk: Bacalah setiap pernyataan di bawah ini, kemudian berilah tanda silang (X) pada lembar jawaban yang sesuai dengan keadaan Anda. Jika pernyataan tersebut BENAR bagi Anda, beri tanda silang. Jika TIDAK BENAR, biarkan kosong.";

        const DISCLAIMER = "Penting: Instrumen ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik. Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualitas. Jika Anda mengalami distress yang signifikan atau memiliki kekhawatiran tentang kesehatan mental Anda, silakan berkonsultasi dengan profesional kesehatan mental.";

    public static function getQuestion(int $number): ?string
    {
        return self::QUESTIONS[$number] ?? null;
    }

    public static function getAllQuestions(): array
    {
        return self::QUESTIONS;
    }

    public static function getScaleOptions(): array
    {
        return self::SCALE_OPTIONS;
    }

    public static function getCategoryForQuestion(int $questionNumber): ?string
    {
        foreach (self::CATEGORIES as $category => $questions) {
            if (in_array($questionNumber, $questions)) {
                return $category;
            }
        }
        return null;
    }

    public static function getQuestionsForCategory(string $category): array
    {
        return self::CATEGORIES[$category] ?? [];
    }

    public static function getAllCategories(): array
    {
        return self::CATEGORIES;
    }

    public static function getCategoryNames(): array
    {
        return self::CATEGORY_NAMES;
    }

    public static function calculateCategoryScores(array $responses): array
    {
        $categoryScores = [];
        
        foreach (self::CATEGORIES as $category => $questions) {
            $score = 0;
            foreach ($questions as $questionNumber) {
                if (isset($responses[$questionNumber]) && $responses[$questionNumber] == 1) {
                    $score++;
                }
            }
            $categoryScores[$category] = $score;
        }
        
        return $categoryScores;
    }

    public static function getCategoryRanking(array $categoryScores): array
    {
        // Sort categories by score in descending order
        arsort($categoryScores);
        
        $ranking = [];
        $rank = 1;
        
        foreach ($categoryScores as $category => $score) {
            $ranking[$category] = [
                'rank' => $rank,
                'score' => $score,
                'name' => self::CATEGORY_NAMES[$category],
                'description' => self::getCategoryDescription($category)
            ];
            $rank++;
        }
        
        return $ranking;
    }

    public static function getCategoryDescription(string $category): string
    {
        $descriptions = [
            'A' => 'Mengalami bayangan berulang dari peristiwa traumatis yang dialami',
            'B' => 'Memiliki pandangan pesimis terhadap masa depan dan kemampuan recovery',
            'C' => 'Cenderung berpikir negatif dan waspada berlebihan terhadap lingkungan',
            'D' => 'Mengalami ketidakstabilan emosi dan mudah terpicu secara emosional',
            'E' => 'Menarik diri dari interaksi sosial dan menghindari orang lain',
            'F' => 'Merasa tidak memiliki kontrol dan kemampuan untuk menghadapi situasi'
        ];
        
        return $descriptions[$category] ?? '';
    }

    public static function getAssessmentSummary(array $responses): array
    {
        $categoryScores = self::calculateCategoryScores($responses);
        $ranking = self::getCategoryRanking($categoryScores);
        $totalScore = array_sum($categoryScores);
        
        return [
            'total_score' => $totalScore,
            'max_possible_score' => 30,
            'category_scores' => $categoryScores,
            'ranking' => $ranking,
            'primary_concern' => array_key_first($ranking),
            'responses_count' => count(array_filter($responses, function($value) { return $value == 1; }))
        ];
    }
}
