<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DcmAssessmentResult extends Model
{
    protected $fillable = [
        'user_id',
        'responses',
        'category_scores',
        'dominant_category',
        'dominant_category_name',
        'total_checked'
    ];

    protected $casts = [
        'responses' => 'array',
        'category_scores' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function calculateResults($responses)
    {
        $categoryNames = ChecklistMasalahQuestion::getCategoryNames();
        $categoryScores = [
            1 => 0, // Fisik
            2 => 0, // Emosi
            3 => 0, // Mental
            4 => 0, // Perilaku
            5 => 0  // Spiritual
        ];

        $totalChecked = 0;

        // Count checked items per category
        foreach ($responses as $questionId => $isChecked) {
            if ($isChecked) {
                $question = ChecklistMasalahQuestion::find($questionId);
                if ($question) {
                    $categoryScores[$question->category]++;
                    $totalChecked++;
                }
            }
        }

        // Find dominant category (highest score)
        $dominantCategory = array_keys($categoryScores, max($categoryScores))[0];
        $dominantCategoryName = $categoryNames[$dominantCategory];

        return [
            'category_scores' => $categoryScores,
            'dominant_category' => $dominantCategory,
            'dominant_category_name' => $dominantCategoryName,
            'total_checked' => $totalChecked
        ];
    }

    public function getCategoryPercentage($category)
    {
        $categoryQuestions = ChecklistMasalahQuestion::where('category', $category)->count();
        $categoryScore = $this->category_scores[$category] ?? 0;
        
        return $categoryQuestions > 0 ? round(($categoryScore / $categoryQuestions) * 100, 1) : 0;
    }

    public function getInterpretation()
    {
        $interpretations = [
            1 => [
                'title' => 'Masalah Fisik Dominan',
                'description' => 'Anda mengalami kecenderungan memiliki masalah fisik yang dominan. Gejala fisik yang dialami mungkin berkaitan dengan stres atau trauma yang pernah dialami.',
                'recommendations' => [
                    'Konsultasi dengan dokter untuk pemeriksaan kesehatan fisik',
                    'Lakukan relaksasi dan teknik pernapasan',
                    'Olahraga ringan dan teratur',
                    'Istirahat yang cukup dan pola tidur yang baik'
                ]
            ],
            2 => [
                'title' => 'Masalah Emosi Dominan',
                'description' => 'Anda mengalami kecenderungan memiliki masalah emosional yang dominan. Hal ini menunjukkan adanya dampak emosional dari pengalaman trauma atau bencana.',
                'recommendations' => [
                    'Konsultasi dengan psikolog atau konselor',
                    'Bergabung dengan support group',
                    'Ekspresikan perasaan melalui jurnal atau seni',
                    'Lakukan aktivitas yang menenangkan dan menyenangkan'
                ]
            ],
            3 => [
                'title' => 'Masalah Mental Dominan',
                'description' => 'Anda mengalami kecenderungan memiliki masalah mental yang dominan. Ini berkaitan dengan proses berpikir, konsentrasi, dan fungsi kognitif.',
                'recommendations' => [
                    'Konsultasi dengan psikiater atau psikolog',
                    'Latihan mindfulness dan meditasi',
                    'Hindari pengambilan keputusan penting saat ini',
                    'Fokus pada satu tugas dalam satu waktu'
                ]
            ],
            4 => [
                'title' => 'Masalah Perilaku Dominan',
                'description' => 'Anda mengalami kecenderungan memiliki masalah perilaku yang dominan. Hal ini berkaitan dengan perubahan pola perilaku sehari-hari.',
                'recommendations' => [
                    'Konsultasi dengan terapis perilaku',
                    'Buat rutinitas harian yang sehat',
                    'Hindari alkohol dan substansi berbahaya',
                    'Cari dukungan dari keluarga dan teman'
                ]
            ],
            5 => [
                'title' => 'Masalah Spiritual Dominan',
                'description' => 'Anda mengalami kecenderungan memiliki masalah spiritual yang dominan. Hal ini berkaitan dengan krisis makna dan keyakinan spiritual.',
                'recommendations' => [
                    'Konsultasi dengan konselor spiritual atau pemuka agama',
                    'Refleksi dan introspeksi diri',
                    'Bergabung dengan komunitas spiritual',
                    'Lakukan kegiatan yang bermakna dan membantu orang lain'
                ]
            ]
        ];

        return $interpretations[$this->dominant_category] ?? null;
    }
}
