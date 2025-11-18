<?php

namespace App\Services\AssessmentQuestions;

class ChecklistMasalahQuestions
{
    // DCM Problems organized by categories
    const PROBLEMS = [
        // FISIK (Gejala 1) - Problems 1-20
        1 => [
            'category' => 1,
            'problem' => 'Pusing kepala',
            'description' => 'Merasa pusing atau berputar-putar'
        ],
        2 => [
            'category' => 1,
            'problem' => 'Mual',
            'description' => 'Merasa mual atau ingin muntah'
        ],
        3 => [
            'category' => 1,
            'problem' => 'Muntah',
            'description' => 'Muntah-muntah tanpa sebab jelas'
        ],
        4 => [
            'category' => 1,
            'problem' => 'Nyeri perut',
            'description' => 'Sakit atau nyeri pada bagian perut'
        ],
        5 => [
            'category' => 1,
            'problem' => 'Diare',
            'description' => 'Buang air besar encer dan terus-menerus'
        ],
        6 => [
            'category' => 1,
            'problem' => 'Tidak nafsu makan',
            'description' => 'Hilangnya keinginan untuk makan'
        ],
        7 => [
            'category' => 1,
            'problem' => 'Susah tidur',
            'description' => 'Kesulitan untuk memulai atau mempertahankan tidur'
        ],
        8 => [
            'category' => 1,
            'problem' => 'Sesak napas',
            'description' => 'Merasa sulit bernapas atau nafas pendek'
        ],
        9 => [
            'category' => 1,
            'problem' => 'Jantung berdebar',
            'description' => 'Jantung berdetak lebih kencang dari biasanya'
        ],
        10 => [
            'category' => 1,
            'problem' => 'Menggigil',
            'description' => 'Tubuh menggigil tanpa sebab yang jelas'
        ],
        11 => [
            'category' => 1,
            'problem' => 'Pingsan',
            'description' => 'Kehilangan kesadaran sesaat'
        ],
        12 => [
            'category' => 1,
            'problem' => 'Demam',
            'description' => 'Suhu tubuh meningkat'
        ],
        13 => [
            'category' => 1,
            'problem' => 'Lemah',
            'description' => 'Merasa tubuh tidak memiliki energi'
        ],
        14 => [
            'category' => 1,
            'problem' => 'Kelelahan',
            'description' => 'Merasa sangat lelah dan capek'
        ],
        15 => [
            'category' => 1,
            'problem' => 'Sakit badan',
            'description' => 'Nyeri atau sakit di berbagai bagian tubuh'
        ],
        16 => [
            'category' => 1,
            'problem' => 'Kedinginan',
            'description' => 'Merasa dingin berlebihan'
        ],
        17 => [
            'category' => 1,
            'problem' => 'Kebas',
            'description' => 'Bagian tubuh terasa kebas atau mati rasa'
        ],
        18 => [
            'category' => 1,
            'problem' => 'Gemetar',
            'description' => 'Tangan atau tubuh bergetar'
        ],
        19 => [
            'category' => 1,
            'problem' => 'Kaku otot',
            'description' => 'Otot terasa kaku dan tegang'
        ],
        20 => [
            'category' => 1,
            'problem' => 'Pandangan kabur',
            'description' => 'Penglihatan menjadi tidak fokus atau kabur'
        ],

        // EMOSI (Gejala 2) - Problems 21-40
        21 => [
            'category' => 2,
            'problem' => 'Cemas',
            'description' => 'Merasa cemas atau khawatir berlebihan'
        ],
        22 => [
            'category' => 2,
            'problem' => 'Takut',
            'description' => 'Merasa takut tanpa sebab yang jelas'
        ],
        23 => [
            'category' => 2,
            'problem' => 'Panik',
            'description' => 'Merasa panik atau ketakutan yang sangat intens'
        ],
        24 => [
            'category' => 2,
            'problem' => 'Hampa',
            'description' => 'Merasa kosong atau tidak ada apa-apa'
        ],
        25 => [
            'category' => 2,
            'problem' => 'Sedih',
            'description' => 'Merasa duka atau kesedihan yang mendalam'
        ],
        26 => [
            'category' => 2,
            'problem' => 'Marah',
            'description' => 'Merasa amarah atau kemarahan yang intens'
        ],
        27 => [
            'category' => 2,
            'problem' => 'Iri',
            'description' => 'Merasa iri atau cemburu pada orang lain'
        ],
        28 => [
            'category' => 2,
            'problem' => 'Benci',
            'description' => 'Merasa benci atau tidak suka yang kuat'
        ],
        29 => [
            'category' => 2,
            'problem' => 'Malu',
            'description' => 'Merasa malu atau rendah diri'
        ],
        30 => [
            'category' => 2,
            'problem' => 'Rasa bersalah',
            'description' => 'Merasa bersalah atas sesuatu yang terjadi'
        ],
        31 => [
            'category' => 2,
            'problem' => 'Mudah tersinggung',
            'description' => 'Mudah merasa tersakiti atau tersinggung'
        ],
        32 => [
            'category' => 2,
            'problem' => 'Mudah menangis',
            'description' => 'Mudah meneteskan air mata'
        ],
        33 => [
            'category' => 2,
            'problem' => 'Mudah tersenyum',
            'description' => 'Menjadi mudah tersenyum bahkan saat tidak sesuai'
        ],
        34 => [
            'category' => 2,
            'problem' => 'Mudah tertawa',
            'description' => 'Menjadi mudah tertawa tanpa alasan yang jelas'
        ],
        35 => [
            'category' => 2,
            'problem' => 'Rasa tidak berdaya',
            'description' => 'Merasa tidak mampu melakukan apa-apa'
        ],
        36 => [
            'category' => 2,
            'problem' => 'Rasa putus asa',
            'description' => 'Merasa tidak ada harapan lagi'
        ],
        37 => [
            'category' => 2,
            'problem' => 'Kehilangan harapan',
            'description' => 'Tidak lagi memiliki harapan untuk masa depan'
        ],
        38 => [
            'category' => 2,
            'problem' => 'Merasa tersisih',
            'description' => 'Merasa diabaikan atau ditinggalkan orang lain'
        ],
        39 => [
            'category' => 2,
            'problem' => 'Merasa sendirian',
            'description' => 'Merasa kesepian atau berdiri sendiri'
        ],
        40 => [
            'category' => 2,
            'problem' => 'Merasa dibenci',
            'description' => 'Merasa orang lain membenci kita'
        ],

        // MENTAL (Gejala 3) - Problems 41-60
        41 => [
            'category' => 3,
            'problem' => 'Lupa',
            'description' => 'Sulit mengingat hal-hal yang biasa diingat'
        ],
        42 => [
            'category' => 3,
            'problem' => 'Susah berkonsentrasi',
            'description' => 'Sulit fokus pada satu hal'
        ],
        43 => [
            'category' => 3,
            'problem' => 'Susah mengambil keputusan',
            'description' => 'Kesulitan dalam memutuskan sesuatu'
        ],
        44 => [
            'category' => 3,
            'problem' => 'Pikiran kacau',
            'description' => 'Pikiran menjadi tidak teratur'
        ],
        45 => [
            'category' => 3,
            'problem' => 'Bingung',
            'description' => 'Merasa bingung atau tidak mengerti'
        ],
        46 => [
            'category' => 3,
            'problem' => 'Waktu terasa lambat',
            'description' => 'Persepsi waktu menjadi lebih lambat'
        ],
        47 => [
            'category' => 3,
            'problem' => 'Waktu terasa cepat',
            'description' => 'Persepsi waktu menjadi lebih cepat'
        ],
        48 => [
            'category' => 3,
            'problem' => 'Hilang rasa',
            'description' => 'Tidak bisa merasakan emosi'
        ],
        49 => [
            'category' => 3,
            'problem' => 'Pikiran muncul tiba-tiba',
            'description' => 'Pikiran-pikiran tidak diinginkan muncul tiba-tiba'
        ],
        50 => [
            'category' => 3,
            'problem' => 'Dwelling',
            'description' => 'Terus memikirkan hal yang sama berulang kali'
        ],
        51 => [
            'category' => 3,
            'problem' => 'Ilusi',
            'description' => 'Melihat atau mendengar sesuatu yang tidak ada'
        ],
        52 => [
            'category' => 3,
            'problem' => 'Waham',
            'description' => 'Memiliki keyakinan yang tidak realistis'
        ],
        53 => [
            'category' => 3,
            'problem' => 'Kehilangan orientasi',
            'description' => 'Tidak tahu waktu, tempat, atau siapa diri sendiri'
        ],
        54 => [
            'category' => 3,
            'problem' => 'Depersonalisasi',
            'description' => 'Merasa terpisah dari tubuh atau diri sendiri'
        ],
        55 => [
            'category' => 3,
            'problem' => 'Derealisasi',
            'description' => 'Merasa dunia di sekitar tidak nyata'
        ],
        56 => [
            'category' => 3,
            'problem' => 'Pikiran untuk bunuh diri',
            'description' => 'Muncul pikiran untuk mengakhiri hidup'
        ],
        57 => [
            'category' => 3,
            'problem' => 'Hilang minat',
            'description' => 'Tidak lagi tertarik pada hal-hal yang disukai'
        ],
        58 => [
            'category' => 3,
            'problem' => 'Sulit berpikir positif',
            'description' => 'Kesulitan melihat sisi baik dari sesuatu'
        ],
        59 => [
            'category' => 3,
            'problem' => 'Ragu pada diri sendiri',
            'description' => 'Merasa ragu dengan kemampuan sendiri'
        ],
        60 => [
            'category' => 3,
            'problem' => 'Sulit menerima kenyataan',
            'description' => 'Kesulitan menerima apa yang terjadi'
        ],

        // PERILAKU (Gejala 4) - Problems 61-80
        61 => [
            'category' => 4,
            'problem' => 'Menghindar',
            'description' => 'Menghindari tempat atau orang yang mengingatkan pada peristiwa'
        ],
        62 => [
            'category' => 4,
            'problem' => 'Menyendiri',
            'description' => 'Lebih suka sendirian dan menghindar dari orang lain'
        ],
        63 => [
            'category' => 4,
            'problem' => 'Apatik',
            'description' => 'Tidak responsif atau tidak peduli pada lingkungan'
        ],
        64 => [
            'category' => 4,
            'problem' => 'Agresif',
            'description' => 'Menjadi mudah marah atau menyerang'
        ],
        65 => [
            'category' => 4,
            'problem' => 'Keras kepala',
            'description' => 'Sulit menerima pendapat orang lain'
        ],
        66 => [
            'category' => 4,
            'problem' => 'Kaku',
            'description' => 'Menjadi kaku dan tidak fleksibel'
        ],
        67 => [
            'category' => 4,
            'problem' => 'Impulsif',
            'description' => 'Melakukan hal tanpa berpikir panjang'
        ],
        68 => [
            'category' => 4,
            'problem' => 'Berteriak-teriak',
            'description' => 'Menjerit atau berbicara dengan suara keras'
        ],
        69 => [
            'category' => 4,
            'problem' => 'Menangis tiba-tiba',
            'description' => 'Menangis tanpa sebab yang jelas'
        ],
        70 => [
            'category' => 4,
            'problem' => 'Tertawa tidak wajar',
            'description' => 'Tertawa pada situasi yang tidak sesuai'
        ],
        71 => [
            'category' => 4,
            'problem' => 'Menggigil kaku',
            'description' => 'Tubuh menggigil dan kaku'
        ],
        72 => [
            'category' => 4,
            'problem' => 'Berjalan mondar-mandir',
            'description' => 'Berjalan bolak-balik tanpa tujuan'
        ],
        73 => [
            'category' => 4,
            'problem' => 'Menarik-narik rambut',
            'description' => 'Menarik rambut sebagai respons stress'
        ],
        74 => [
            'category' => 4,
            'problem' => 'Menggigit kuku',
            'description' => 'Menggigit kuku saat cemas'
        ],
        75 => [
            'category' => 4,
            'problem' => 'Menyakiti diri',
            'description' => 'Melakukan tindakan yang menyakiti diri sendiri'
        ],
        76 => [
            'category' => 4,
            'problem' => 'Berkurang aktivitas',
            'description' => 'Menjadi kurang aktif dari biasanya'
        ],
        77 => [
            'category' => 4,
            'problem' => 'Bertambah aktivitas',
            'description' => 'Menjadi terlalu aktif atau gelisah'
        ],
        78 => [
            'category' => 4,
            'problem' => 'Perubahan pola tidur',
            'description' => 'Pola tidur menjadi tidak teratur'
        ],
        79 => [
            'category' => 4,
            'problem' => 'Perubahan pola makan',
            'description' => 'Pola makan menjadi tidak teratur'
        ],
        80 => [
            'category' => 4,
            'problem' => 'Menghindar kontak mata',
            'description' => 'Sengaja menghindari kontak mata dengan orang lain'
        ],

        // SPIRITUAL (Gejala 5) - Problems 81-100
        81 => [
            'category' => 5,
            'problem' => 'Pertanyaan tentang Tuhan',
            'description' => 'Mempertanyakan keberadaan atau kekuasaan Tuhan'
        ],
        82 => [
            'category' => 5,
            'problem' => 'Pertanyaan tentang keadilan',
            'description' => 'Mempertanyakan mengapa peristiwa ini bisa terjadi'
        ],
        83 => [
            'category' => 5,
            'problem' => 'Menyalahkan Tuhan',
            'description' => 'Menyalahkan Tuhan atas apa yang terjadi'
        ],
        84 => [
            'category' => 5,
            'problem' => 'Marah pada Tuhan',
            'description' => 'Merasa marah pada Tuhan'
        ],
        85 => [
            'category' => 5,
            'problem' => 'Hilang kepercayaan',
            'description' => 'Kehilangan kepercayaan pada Tuhan'
        ],
        86 => [
            'category' => 5,
            'problem' => 'Berdosa',
            'description' => 'Merasa telah berbuat dosa'
        ],
        87 => [
            'category' => 5,
            'problem' => 'Dihukum Tuhan',
            'description' => 'Merasa ini adalah hukuman dari Tuhan'
        ],
        88 => [
            'category' => 5,
            'problem' => 'Gagal menjalankan agama',
            'description' => 'Merasa gagal dalam menjalankan praktik agama'
        ],
        89 => [
            'category' => 5,
            'problem' => 'Berhenti beribadah',
            'description' => 'Berhenti melakukan ibadah rutin'
        ],
        90 => [
            'category' => 5,
            'problem' => 'Berdoa lebih intens',
            'description' => 'Berdoa lebih sering dari biasanya'
        ],
        91 => [
            'category' => 5,
            'problem' => 'Mencari makna',
            'description' => 'Mencoba mencari makna dari peristiwa yang terjadi'
        ],
        92 => [
            'category' => 5,
            'problem' => 'Pendekatan spiritual',
            'description' => 'Mendekatkan diri pada praktik spiritual'
        ],
        93 => [
            'category' => 5,
            'problem' => 'Kehilangan makna hidup',
            'description' => 'Merasa hidup tidak memiliki makna lagi'
        ],
        94 => [
            'category' => 5,
            'problem' => 'Pertanyaan tentang hidup',
            'description' => 'Memunculkan pertanyaan tentang tujuan hidup'
        ],
        95 => [
            'category' => 5,
            'problem' => 'Pertanyaan tentang kematian',
            'description' => 'Banyak berpikir tentang kematian'
        ],
        96 => [
            'category' => 5,
            'problem' => 'Hubungan dengan keluarga',
            'description' => 'Pertanyaan tentang makna keluarga'
        ],
        97 => [
            'category' => 5,
            'problem' => 'Hubungan dengan masyarakat',
            'description' => 'Pertanyaan tentang peran dalam masyarakat'
        ],
        98 => [
            'category' => 5,
            'problem' => 'Perasaan bersalah spiritual',
            'description' => 'Merasa bersalah dalam konteks spiritual'
        ],
        99 => [
            'category' => 5,
            'problem' => 'Memaafkan diri',
            'description' => 'Kesulitan memaafkan diri sendiri'
        ],
        100 => [
            'category' => 5,
            'problem' => 'Memaafkan orang lain',
            'description' => 'Kesulitan memaafkan orang lain'
        ]
    ];

    const CATEGORIES = [
        1 => [
            'name' => 'Gejala Fisik',
            'description' => 'Gejala-gejala yang muncul pada tubuh fisik',
            'color' => '#ef4444', // Red
            'icon' => 'fa-heartbeat'
        ],
        2 => [
            'name' => 'Gejala Emosi',
            'description' => 'Gejala-gejala yang berhubungan dengan perasaan dan emosi',
            'color' => '#f59e0b', // Orange
            'icon' => 'fa-smile'
        ],
        3 => [
            'name' => 'Gejala Mental',
            'description' => 'Gejala-gejala yang berhubungan dengan pikiran dan kognitif',
            'color' => '#3b82f6', // Blue
            'icon' => 'fa-brain'
        ],
        4 => [
            'name' => 'Gejala Perilaku',
            'description' => 'Gejala-gejala yang terlihat dari perilaku dan tindakan',
            'color' => '#10b981', // Green
            'icon' => 'fa-user'
        ],
        5 => [
            'name' => 'Gejala Spiritual',
            'description' => 'Gejala-gejala yang berhubungan dengan keyakinan dan spiritualitas',
            'color' => '#8b5cf6', // Purple
            'icon' => 'fa-pray'
        ]
    ];

    const INSTRUCTIONS = "Petunjuk: Centang (✓) setiap masalah yang Anda alami setelah peristiwa traumatis/bencana. Pilih semua yang sesuai dengan kondisi Anda saat ini.";

    const DISCLAIMER = "Penting: Instrumen ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik. Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualifikasi. Jika Anda mengalami distress yang signifikan atau memiliki kekhawatiran tentang kesehatan mental Anda, silakan berkonsultasi dengan profesional kesehatan mental.";

    public static function getAllProblems(): array
    {
        return self::PROBLEMS;
    }

    public static function getProblem(int $id): ?array
    {
        return self::PROBLEMS[$id] ?? null;
    }

    public static function getProblemsByCategory($category): array
    {
        return array_filter(self::PROBLEMS, function($problem) use ($category) {
            return $problem['category'] == $category;
        });
    }

    public static function getAllCategories(): array
    {
        return self::CATEGORIES;
    }

    public static function getCategoryName($categoryId): string
    {
        return self::CATEGORIES[$categoryId]['name'] ?? 'Unknown';
    }

    public static function getAllGroupedByCategory(): array
    {
        $grouped = [];
        foreach (self::CATEGORIES as $categoryId => $categoryInfo) {
            $grouped[$categoryId] = [];
            $problems = self::getProblemsByCategory($categoryId);

            foreach ($problems as $id => $problem) {
                $grouped[$categoryId][] = (object) [
                    'id' => $id,
                    'question' => $problem['problem'],
                    'description' => $problem['description'],
                    'category' => $problem['category']
                ];
            }
        }
        return $grouped;
    }

    public static function getCategoryInfo($category): ?array
    {
        return self::CATEGORIES[$category] ?? null;
    }

    public static function getTotalProblems(): int
    {
        return count(self::PROBLEMS);
    }

    public static function calculateCategoryScores(array $responses): array
    {
        $categoryScores = [];

        // Initialize all categories with 0
        foreach (array_keys(self::CATEGORIES) as $categoryId) {
            $categoryScores[$categoryId] = 0;
        }

        // Calculate scores for each category
        foreach ($responses as $problemId => $value) {
            $problem = self::getProblem($problemId);
            if ($problem && $value == 1) {
                $categoryId = $problem['category'];
                if (isset($categoryScores[$categoryId])) {
                    $categoryScores[$categoryId]++;
                }
            }
        }

        return $categoryScores;
    }

    public static function getDominantCategory(array $responses): string
    {
        $categoryScores = self::calculateCategoryScores($responses);

        if (empty($categoryScores)) {
            return 'Tidak ada';
        }

        // Sort by score (descending) and get the top category
        arsort($categoryScores);
        $topCategories = array_keys($categoryScores, max($categoryScores));

        // Return the first category with highest score
        return $topCategories[0] ?? 'Tidak ada';
    }

    public static function calculateTotalProblems(array $responses): int
    {
        return array_sum($responses);
    }

    public static function getInterpretation($dominantCategory, int $totalProblems): array
    {
        $totalPossible = self::getTotalProblems();
        $percentage = ($totalProblems / $totalPossible) * 100;

        $categoryInfo = self::getCategoryInfo($dominantCategory);
        $categoryName = $categoryInfo['name'] ?? 'Tidak diketahui';

        // Simple result - no risk level, just show dominant category
        $result = 'Dominan';
        $severityColor = $categoryInfo['color'] ?? '#6b7280';
        $bgColor = 'bg-gray-100';
        $icon = $categoryInfo['icon'] ?? 'fa-check-circle';

        return [
            'dominant_category' => $dominantCategory,
            'dominant_category_name' => $categoryName,
            'total_problems' => $totalProblems,
            'total_possible' => $totalPossible,
            'percentage' => round($percentage, 1),
            'result' => $result,
            'severity_color' => $severityColor,
            'bg_color' => $bgColor,
            'icon' => $icon,
            'category_info' => $categoryInfo
        ];
    }

    public static function getRecommendations($dominantCategory, int $totalProblems): array
    {
        $recommendations = [];

        // General recommendations based on dominant category
        $categoryInfo = self::getCategoryInfo($dominantCategory);
        $categoryName = $categoryInfo['name'] ?? 'Tidak diketahui';
        $recommendations[] = "Fokus pada gejala " . strtolower($categoryName) . " yang Anda alami";
        $recommendations[] = "Cari dukungan dari teman, keluarga, atau profesional jika needed";
        $recommendations[] = "Praktikkan self-care dan teknik relaksasi secara teratur";

        // Category-specific recommendations
        if ($dominantCategory === 5) { // Spiritual
            $recommendations[] = "Jika mengalami krisis spiritual, pertimbangkan untuk berkonsultasi dengan pemuka agama atau spiritual counselor";
        } elseif ($dominantCategory === 1) { // Fisik
            $recommendations[] = "Periksakan gejala fisik ke dokter untuk menyingkirkan kemungkinan kondisi medis lain";
        } elseif ($dominantCategory === 3 && $totalProblems > 50) { // Mental
            $recommendations[] = "Jika mengalami pikiran untuk bunuh diri, segera hubungi hotline krisis atau profesional kesehatan mental";
        }

        return $recommendations;
    }
}
