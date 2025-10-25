<?php

namespace App\Services\AssessmentQuestions;

class ChecklistMasalahQuestions
{
    const SYMPTOMS = [
        'fisik' => [
            'Pening',
            'Tenggorokan kering',
            'Perut serasa tertekan',
            'Dada sesak / nyeri',
            'Jantung berdebar',
            'Sakit kepala',
            'Nyeri lambung',
            'Diare / mencret',
            'Alergi / gatal-gatal',
            'Otot tegang',
            'Kejang',
            'Tidak bertenaga',
            'Rahang terkatup ketat',
            'Duduk tidak tenang',
            'Banyak berkeringat',
            'Denyut nadi cepat',
            'Menggemeretakan gigi'
        ],
        'emosi' => [
            'Rasa takut',
            'Mati rasa',
            'Terguncang',
            'Mengingkari',
            'Marah',
            'Putus asa',
            'Menyerah',
            'Pasrah',
            'Menyalahkan',
            'Sinis',
            'Menyesal',
            'Merasa tidak berdaya',
            'Hilang kepercayaan',
            'Khawatir',
            'Bosan',
            'Merasa terasing',
            'Murung',
            'Tidak percaya'
        ],
        'mental' => [
            'Tidak konsentrasi',
            'Mudah lupa',
            'Banyak pikiran',
            'Sulit mengambil keputusan',
            'Curiga',
            'Lelah berpikir',
            'Merasa terbebani',
            'Merasa banyak melayani orang'
        ],
        'perilaku' => [
            'Sulit tidur',
            'Kehilangan selera',
            'Makan berlebihan',
            'Banyak merokok',
            'Minum alkohol dan narkoba',
            'Menghindar',
            'Menangis',
            'Tidak mampu berbicara',
            'Tidak bergerak',
            'Gelisah',
            'Terlalu banyak gerak',
            'Mudah marah',
            'Ingin bunuh diri',
            'Menggerakan anggota tubuh berulang-ulang'
        ],
        'spiritual' => [
            'Menyalahkan Tuhan',
            'Berhenti beribadah',
            'Tidak berdaya',
            'Marah kepada Tuhan',
            'Meragukan keyakinan',
            'Tidak tulus',
            'Merasa terancam',
            'Merasa jadi korban orang',
            'Bersibuk dengan diri sendiri',
            'Merasa kecewa',
            'Menyesali diri',
            'Menggerutu'
        ]
    ];

    const SCALE_OPTIONS = [
        0 => "Tidak Ada",
        1 => "Ada"
    ];

    const SYMPTOM_CATEGORIES = [
        'fisik' => 'Gejala Fisik',
        'emosi' => 'Gejala Emosi',
        'mental' => 'Gejala Mental',
        'perilaku' => 'Gejala Perilaku',
        'spiritual' => 'Gejala Spiritual'
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
