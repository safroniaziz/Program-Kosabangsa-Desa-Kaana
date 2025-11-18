<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PTSDQuestion;

class PTSDQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use questions from PTSDDiagnosticQuestions
        $questions = [
            ['question_text' => 'Bermimpi atau merasa terus dibayang-bayangi oleh peristiwa tragis yang terjadi', 'order' => 1, 'is_active' => true],
            ['question_text' => 'Merasa masa depan suram', 'order' => 2, 'is_active' => true],
            ['question_text' => 'Bersikap waspada di luar batas kewajaran terhadap keselamatan diri', 'order' => 3, 'is_active' => true],
            ['question_text' => 'Mudah marah', 'order' => 4, 'is_active' => true],
            ['question_text' => 'Menolak dikunjungi orang asing', 'order' => 5, 'is_active' => true],
            ['question_text' => 'Kehilangan minat untuk melakukan kembali aktivitas yang biasa dilakukan sebelum peristiwa tragis terjadi', 'order' => 6, 'is_active' => true],
            ['question_text' => 'Merasa seperti mengalami kembali peristiwa yang terjadi', 'order' => 7, 'is_active' => true],
            ['question_text' => 'Merasa tidak ada upaya yang dapat dilakukan untuk pulih dari peristiwa tragis yang telah terjadi', 'order' => 8, 'is_active' => true],
            ['question_text' => 'Sulit untuk berkonsentrasi dalam belajar atau berpikir', 'order' => 9, 'is_active' => true],
            ['question_text' => 'Tidak mau mengalah meskipun dalam posisi salah', 'order' => 10, 'is_active' => true],
            ['question_text' => 'Sulit berinteraksi dengan orang lain', 'order' => 11, 'is_active' => true],
            ['question_text' => 'Menunggu takdir Tuhan dalam menghadapi hidup', 'order' => 12, 'is_active' => true],
            ['question_text' => 'Mengalami sakit kepala / mual / alergi ketika dihadapkan pada simbol dari peristiwa tragis yang terjadi', 'order' => 13, 'is_active' => true],
            ['question_text' => 'Merasa tidak lagi memiliki kebanggaan terhadap diri sendiri', 'order' => 14, 'is_active' => true],
            ['question_text' => 'Merasa tidak nyaman dimanapun berada', 'order' => 15, 'is_active' => true],
            ['question_text' => 'Ngotot dalam berpendapat / berbicara', 'order' => 16, 'is_active' => true],
            ['question_text' => 'Lebih suka berdiam diri', 'order' => 17, 'is_active' => true],
            ['question_text' => 'Merasa keberadaan hidup tidak berarti lagi sejak mengalami peristiwa tragis', 'order' => 18, 'is_active' => true],
            ['question_text' => 'Mengalami gangguan tidur (banyak tidur atau sulit tidur)', 'order' => 19, 'is_active' => true],
            ['question_text' => 'Tidak ada harapan keadaan akan menjadi lebih baik', 'order' => 20, 'is_active' => true],
            ['question_text' => 'Merasa orang lain tidak peduli', 'order' => 21, 'is_active' => true],
            ['question_text' => 'Mudah menangis', 'order' => 22, 'is_active' => true],
            ['question_text' => 'Merasa diri terisolasi dari orang lain', 'order' => 23, 'is_active' => true],
            ['question_text' => 'Merasa tidak berdaya', 'order' => 24, 'is_active' => true],
            ['question_text' => 'Mudah cemas dan panik ketika terjadi peristiwa di luar dugaan', 'order' => 25, 'is_active' => true],
            ['question_text' => 'Merasa putus asa', 'order' => 26, 'is_active' => true],
            ['question_text' => 'Mencurigai orang baru secara berlebihan', 'order' => 27, 'is_active' => true],
            ['question_text' => 'Mudah tersinggung', 'order' => 28, 'is_active' => true],
            ['question_text' => 'Menarik diri dari bergaul dengan orang lain atau lingkungan', 'order' => 29, 'is_active' => true],
            ['question_text' => 'Merasa sangat kecewa dengan keadaan yang terjadi', 'order' => 30, 'is_active' => true]
        ];

        foreach ($questions as $question) {
            PTSDQuestion::create($question);
        }
    }
}
