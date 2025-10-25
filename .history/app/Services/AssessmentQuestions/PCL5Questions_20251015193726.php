<?php

namespace App\Services\AssessmentQuestions;

class PCL5Questions
{
    const QUESTIONS = [
        1 => "Kenangan berulang, pikiran yang mengganggu, atau bayangan tentang pengalaman yang penuh tekanan?",
        2 => "Mimpi berulang tentang pengalaman yang penuh tekanan?", 
        3 => "Tiba-tiba bertindak atau merasa seolah-olah pengalaman yang penuh tekanan itu terjadi lagi (seolah-olah Anda menghidupkannya kembali)?",
        4 => "Merasa sangat kesal saat sesuatu mengingatkan Anda pada pengalaman yang penuh tekanan?",
        5 => "Mengalami reaksi fisik yang kuat saat sesuatu mengingatkan Anda pada pengalaman yang penuh tekanan (misalnya, jantung berdebar, kesulitan bernapas, berkeringat)?",
        6 => "Menghindari kenangan, pikiran, atau perasaan yang berkaitan dengan pengalaman yang penuh tekanan?",
        7 => "Menghindari pengingat eksternal tentang pengalaman yang penuh tekanan (misalnya, orang, tempat, percakapan, aktivitas, objek, situasi)?",
        8 => "Kesulitan mengingat bagian penting dari pengalaman yang penuh tekanan?",
        9 => "Memiliki keyakinan negatif yang kuat tentang diri sendiri, orang lain, atau dunia (misalnya, berpikir: Saya buruk, ada yang sangat salah dengan saya, dunia benar-benar berbahaya, saya tidak bisa mempercayai siapa pun)?",
        10 => "Menyalahkan diri sendiri atau orang lain atas pengalaman yang penuh tekanan atau akibatnya?",
        11 => "Memiliki perasaan negatif yang kuat seperti takut, ngeri, marah, bersalah, atau malu?",
        12 => "Kehilangan minat pada aktivitas yang sebelumnya Anda nikmati?",
        13 => "Merasa terlepas atau terputus dari orang lain?",
        14 => "Kesulitan mengalami perasaan positif (misalnya, tidak mampu merasakan kebahagiaan, kepuasan, cinta, kegembiraan)?",
        15 => "Perilaku yang mudah marah, amarah, atau agresif?",
        16 => "Mengambil terlalu banyak risiko atau melakukan hal-hal yang bisa membahayakan Anda?",
        17 => "Menjadi \"super-waspada\" atau waspada atau berjaga-jaga?",
        18 => "Merasa tegang atau mudah terkejut?",
        19 => "Kesulitan berkonsentrasi?",
        20 => "Kesulitan tidur atau tetap tertidur?"
    ];

    const SCALE_OPTIONS = [
        0 => "Tidak sama sekali",
        1 => "Sedikit",
        2 => "Sedang",
        3 => "Cukup banyak",
        4 => "Sangat banyak"
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
