<?php

namespace App\Services\AssessmentQuestions;

class ChecklistMasalahQuestions
{
    const SYMPTOMS = [
        'fisik' => [
            'Pening',
            'Tenggorokan Kering',
            'Perut Serasa Tertekan',
            'Dada Sesak/ nyeri',
            'Jantung berdebar',
            'Sakit kepala',
            'Nyeri lambung',
            'Diare/ mencret',
            'Alergi/ gatal-gatal',
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
            'Murung'
        ],
                'mental' => [
            'Merasa bingung',
            'Tidak dapat berkonsentrasi',
            'Sulit mengingat',
            'Mudah terganggu',
            'Mimpi buruk',
            'Pikiran negatif',
            'Khayalan',
            'Berkhayal tidak wajar',
            'Hilang minat',
            'Kehilangan kepercayaan diri',
            'Ragu-ragu',
            'Tidak percaya'
        ],
        'perilaku' => [
            'Menarik diri',
            'Mudah tersinggung',
            'Agresif',
            'Menangis',
            'Menyendiri',
            'Apatis',
            'Mudah curiga',
            'Gelisah',
            'Tidak sabaran',
            'Mondar mandir',
            'Menggigit kuku',
            'Berteriak-teriak',
            'Suka meludah',
            'Berbicara kotor',
            'Sulit tidur',
            'Makan berlebihan',
            'Tidak mau makan',
            'Tidak percaya'
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

    const INSTRUCTIONS = "Petunjuk: Berilah tanda silang (X) pada setiap gejala yang terasa setelah musibah/bencana. Pilih 'Ada' jika Anda mengalami gejala tersebut, atau 'Tidak Ada' jika tidak mengalami.";

    const DISCLAIMER = "Penting: Instrumen ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik. Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualitas. Jika Anda mengalami distress yang signifikan atau memiliki kekhawatiran tentang kesehatan mental Anda, silakan berkonsultasi dengan profesional kesehatan mental.";

    public static function getAllSymptoms(): array
    {
        return self::SYMPTOMS;
    }

    public static function getSymptomsForCategory(string $category): array
    {
        return self::SYMPTOMS[$category] ?? [];
    }

    public static function getScaleOptions(): array
    {
        return self::SCALE_OPTIONS;
    }

    public static function getSymptomCategories(): array
    {
        return self::SYMPTOM_CATEGORIES;
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
