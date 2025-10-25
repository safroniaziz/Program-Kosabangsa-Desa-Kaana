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

    const CLUSTERS = [
        'B' => [1, 2, 3, 4, 5],           // Re-experiencing (Intrusion)
        'C' => [6, 7],                    // Avoidance
        'D' => [8, 9, 10, 11, 12, 13, 14], // Negative alterations in cognitions and mood
        'E' => [15, 16, 17, 18, 19, 20]  // Arousal and reactivity
    ];

    const CLUSTER_NAMES = [
        'B' => 'Re-experiencing',
        'C' => 'Avoidance',
        'D' => 'Negative Alterations',
        'E' => 'Arousal and Reactivity'
    ];

        const INSTRUCTIONS = "Petunjuk: Di bawah ini adalah daftar masalah dan keluhan yang kadang-kadang dialami orang sebagai respons terhadap peristiwa hidup yang penuh tekanan. Mohon baca setiap item dengan cermat, kemudian lingkari salah satu angka di sebelah kanan untuk menunjukkan seberapa banyak Anda terganggu oleh masalah tersebut dalam sebulan terakhir.";

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

    public static function getClusterForQuestion(int $questionNumber): ?string
    {
        foreach (self::CLUSTERS as $cluster => $questions) {
            if (in_array($questionNumber, $questions)) {
                return $cluster;
            }
        }
        return null;
    }

    public static function getQuestionsForCluster(string $cluster): array
    {
        return self::CLUSTERS[$cluster] ?? [];
    }
}
