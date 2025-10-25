<?php

namespace App\Services\AssessmentQuestions;

class DASS21Questions
{
    const QUESTIONS = [
        1 => "Saya mudah merasa kesal",
        2 => "Saya sadar mulut saya terasa kering",
        3 => "Saya tidak dapat merasakan perasaan positif sama sekali",
        4 => "Saya mengalami kesulitan bernapas",
        5 => "Saya merasa sulit untuk memulai mengerjakan sesuatu",
        6 => "Saya cenderung bereaksi berlebihan terhadap suatu situasi",
        7 => "Saya mengalami gemetar (misalnya di tangan)",
        8 => "Saya merasa bahwa saya menghabiskan banyak energi untuk cemas",
        9 => "Saya khawatir dengan situasi di mana saya mungkin panik dan mempermalukan diri sendiri",
        10 => "Saya merasa bahwa saya tidak punya hal yang dapat dinanti-nantikan",
        11 => "Saya merasa sulit untuk tenang setelah sesuatu membuat saya kesal",
        12 => "Saya merasa sulit untuk bersabar ketika ada penundaan",
        13 => "Saya merasa sedih dan depresi",
        14 => "Saya mudah merasa gelisah",
        15 => "Saya merasa saya hampir panik",
        16 => "Saya merasa tidak bersemangat untuk hal apapun",
        17 => "Saya merasa bahwa saya tidak berharga sebagai seorang manusia",
        18 => "Saya merasa bahwa saya mudah tersinggung",
        19 => "Saya sadar akan denyut jantung saya walaupun saya tidak melakukan aktivitas fisik",
        20 => "Saya merasa takut tanpa alasan yang jelas",
        21 => "Saya merasa bahwa hidup ini tidak bermanfaat"
    ];

    const SCALE_OPTIONS = [
        0 => "Tidak pernah",
        1 => "Kadang-kadang",
        2 => "Sering",
        3 => "Hampir selalu"
    ];

    const SUBSCALES = [
        'depression' => [3, 5, 10, 13, 16, 17, 21],
        'anxiety' => [2, 4, 7, 9, 15, 19, 20],
        'stress' => [1, 6, 8, 11, 12, 14, 18]
    ];

    const SUBSCALE_NAMES = [
        'depression' => 'Depresi',
        'anxiety' => 'Kecemasan',
        'stress' => 'Stres'
    ];

    // Severity cut-off scores (after multiplying by 2)
    const SEVERITY_RANGES = [
        'depression' => [
            'normal' => [0, 9],
            'mild' => [10, 13],
            'moderate' => [14, 20],
            'severe' => [21, 27],
            'extremely_severe' => [28, 42]
        ],
        'anxiety' => [
            'normal' => [0, 7],
            'mild' => [8, 9],
            'moderate' => [10, 14],
            'severe' => [15, 19],
            'extremely_severe' => [20, 42]
        ],
        'stress' => [
            'normal' => [0, 14],
            'mild' => [15, 18],
            'moderate' => [19, 25],
            'severe' => [26, 33],
            'extremely_severe' => [34, 42]
        ]
    ];

    const INSTRUCTIONS = "Silakan baca setiap pernyataan dan pilih angka 0, 1, 2 atau 3 yang menunjukkan seberapa banyak pernyataan itu berlaku untuk Anda selama SEMINGGU YANG LALU. Tidak ada jawaban yang benar atau salah. Jangan menghabiskan terlalu banyak waktu untuk setiap pernyataan.";

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

    public static function getSubscaleForQuestion(int $questionNumber): ?string
    {
        foreach (self::SUBSCALES as $subscale => $questions) {
            if (in_array($questionNumber, $questions)) {
                return $subscale;
            }
        }
        return null;
    }

    public static function getQuestionsForSubscale(string $subscale): array
    {
        return self::SUBSCALES[$subscale] ?? [];
    }

    public static function getSeverityLevel(string $subscale, int $score): string
    {
        $ranges = self::SEVERITY_RANGES[$subscale] ?? [];

        foreach ($ranges as $level => $range) {
            if ($score >= $range[0] && $score <= $range[1]) {
                return $level;
            }
        }

        return 'unknown';
    }
}
