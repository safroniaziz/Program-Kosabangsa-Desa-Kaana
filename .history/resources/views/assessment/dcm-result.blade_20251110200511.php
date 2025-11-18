@extends('layouts_old.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-8" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6">
                <i class="fas fa-clipboard-check text-green-600 text-3xl"></i>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Hasil Assessment DCM</h1>
            <p class="text-xl text-gray-600">Daftar Cek Masalah - Analisis Kondisi Kesehatan Mental</p>
        </div>

        <!-- Alert Information -->
        <div class="bg-yellow-50/80 backdrop-blur-sm rounded-xl p-6 mb-8 border border-yellow-200/50" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-yellow-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.728-.833-2.498 0L3.316 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-yellow-800 leading-relaxed">
                        <strong>Penting:</strong> Hasil assessment ini adalah untuk tujuan skrining awal dan bukan merupakan alat diagnostik.
                        Hasil tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualifikasi.
                        Jika Anda mengalami distress yang signifikan, segera berkonsultasi dengan profesional kesehatan mental.
                    </p>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-8" data-aos="fade-down">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 text-xl mr-3"></i>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Main Results -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8" data-aos="fade-up" data-aos-delay="100">
            @php
                $categoryScores = $results['category_scores'] ?? [];
                $totalProblems = $results['total_problems'] ?? 0;
                $dominantCategory = $results['dominant_category'] ?? '';
                $dominantCategoryName = $results['dominant_category_name'] ?? 'Tidak Diketahui';
                $highestScore = !empty($categoryScores) ? max($categoryScores) : 0;
                $averageScore = count($categoryScores) > 0 ? round(array_sum($categoryScores) / count($categoryScores), 1) : 0;

                // DCM category names
                $categoryNames = [
                    'Fisik' => 'Gejala Fisik',
                    'Emosi' => 'Gejala Emosi',
                    'Mental' => 'Gejala Mental',
                    'Perilaku' => 'Gejala Perilaku',
                    'Spiritual' => 'Gejala Spiritual'
                ];
            @endphp

            <!-- Score Summary -->
            <div class="mb-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600 font-medium">Total Masalah:</span>
                        <div class="text-right">
                            <span class="font-bold text-blue-600 text-lg">{{ $totalProblems }}/100</span>
                            <span class="text-xs text-gray-500 ml-2">({{ $results['percentage'] ?? 0 }}%)</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600 font-medium">Kategori Dominan:</span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded">
                            {{ $dominantCategoryName }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Interpretation -->
            <div class="mb-4 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-green-900 mb-1">Interpretasi Hasil</h4>
                        <p class="text-sm text-green-800 leading-relaxed">
                            Berdasarkan jawaban Anda, <strong>{{ $categoryNames[$dominantCategory] ?? $dominantCategoryName }}</strong> adalah gejala dominan dengan skor tertinggi ({{ $highestScore }} dari 20 masalah).
                            @if($averageScore >= 10)
                                Secara keseluruhan, hasil menunjukkan gejala yang signifikan dan perlu perhatian khusus.
                            @elseif($averageScore >= 5)
                                Secara keseluruhan, ada beberapa gejala yang perlu diperhatikan untuk penanganan lebih lanjut.
                            @else
                                Secara keseluruhan, gejala yang muncul masih dalam batas yang dapat dikelola.
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category Distribution Table -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Distribusi Gejala per Kategori</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-200 rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 border-b">Kategori</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700 border-b">Jumlah Checklist</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700 border-b">Total Masalah</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700 border-b">Persentase</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-700 border-b">Ranking</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 border-b">Jenis Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $allCategories = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getAllCategories();
                                $categoryData = [];

                                foreach($allCategories as $categoryKey => $categoryInfo) {
                                    $score = $categoryScores[$categoryKey] ?? 0;
                                    $maxScore = count(\App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory($categoryKey));
                                    $percentage = $maxScore > 0 ? round(($score / $maxScore) * 100, 1) : 0;

                                    $categoryData[$categoryKey] = [
                                        'score' => $score,
                                        'maxScore' => $maxScore,
                                        'percentage' => $percentage,
                                        'name' => $categoryInfo['name']
                                    ];
                                }

                                // Sort by score descending
                                uasort($categoryData, function($a, $b) {
                                    return $b['score'] - $a['score'];
                                });

                                $ranking = 1;
                            @endphp
                            @foreach($categoryData as $categoryKey => $data)
                                <tr class="border-b hover:bg-gray-50 {{ $categoryKey === $dominantCategory ? 'bg-blue-50' : '' }}">
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $categoryKey }}</td>
                                    <td class="px-4 py-3 text-center font-medium text-blue-600">{{ $data['score'] }}</td>
                                    <td class="px-4 py-3 text-center text-gray-600">{{ $data['maxScore'] }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <span class="font-medium">{{ $data['percentage'] }}%</span>
                                            <div class="w-16 bg-gray-200 rounded-full h-2">
                                                <div class="h-2 rounded-full bg-blue-500" style="width: {{ $data['percentage'] }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center font-medium text-gray-600">{{ $ranking }}</td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $categoryNames[$categoryKey] ?? $categoryKey }}
                                        @if($categoryKey === $dominantCategory)
                                            <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                                <i class="fas fa-crown mr-1"></i> Dominan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @php $ranking++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Selected Problems Detail -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Detail Masalah yang Dipilih</h3>
                <div class="bg-gray-50 rounded-xl p-6">
                    @php
                        $symptomResponses = $results['symptom_responses'] ?? [];
                        $selectedProblems = [];
                        foreach($symptomResponses as $problemId => $value) {
                            if ($value == 1) {
                                $selectedProblems[] = $problemId;
                            }
                        }
                    @endphp
                    @if(!empty($selectedProblems))
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($selectedProblems as $problemId)
                                @php
                                    $problem = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblem($problemId);
                                @endphp
                                @if($problem)
                                    <div class="flex items-start space-x-2 p-3 bg-white rounded-lg border border-gray-200">
                                        <span class="text-sm font-bold text-gray-600 mt-1">{{ $problemId }}.</span>
                                        <div>
                                            <span class="text-sm font-medium text-gray-900">{{ $problem['problem'] }}</span>
                                            <p class="text-xs text-gray-600 mt-1">{{ $problem['description'] }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500 py-4">Tidak ada masalah yang dicentang</p>
                    @endif
                </div>
            </div>

            <!-- Recommendations -->
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-lightbulb text-yellow-600 mr-3"></i>
                    Rekomendasi
                </h3>
                @if(isset($results['recommendations']) && !empty($results['recommendations']))
                    <div class="space-y-4">
                        @foreach($results['recommendations'] as $recommendation)
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <p class="text-gray-700 leading-relaxed">{{ $recommendation }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">Tidak ada rekomendasi khusus untuk kondisi Anda saat ini.</p>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('assessment.start-new', \App\Models\Assessment::where('type', 'checklist_masalah')->first()) }}"
               class="group px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-green-500/25 transform hover:-translate-y-1 transition-all duration-300 text-lg">
                <span class="flex items-center space-x-3">
                    <i class="fas fa-redo group-hover:rotate-180 transition-transform duration-500"></i>
                    <span>Assessment Ulang</span>
                </span>
            </a>

            <a href="{{ route('assessment') }}"
               class="group px-8 py-4 bg-white/80 backdrop-blur-sm text-gray-700 font-bold rounded-2xl shadow-lg hover:shadow-xl border-2 border-gray-200 hover:border-gray-300 transform hover:-translate-y-1 transition-all duration-300 text-lg">
                <span class="flex items-center space-x-3">
                    <i class="fas fa-home group-hover:scale-110 transition-transform duration-300"></i>
                    <span>Dashboard</span>
                </span>
            </a>

            <button onclick="window.print()"
                    class="group px-8 py-4 bg-white/80 backdrop-blur-sm text-gray-700 font-bold rounded-2xl shadow-lg hover:shadow-xl border-2 border-gray-200 hover:border-gray-300 transform hover:-translate-y-1 transition-all duration-300 text-lg">
                <span class="flex items-center space-x-3">
                    <i class="fas fa-print group-hover:scale-110 transition-transform duration-300"></i>
                    <span>Cetak Hasil</span>
                </span>
            </button>
        </div>

        <!-- Disclaimer -->
        <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-yellow-50/80 backdrop-blur-sm rounded-xl p-6 border border-yellow-200/50 max-w-3xl mx-auto">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1"></i>
                    <div class="text-left">
                        <p class="text-sm text-yellow-800 leading-relaxed">
                            <strong>Penting:</strong> Hasil assessment ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik.
                            Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualifikasi.
                            Jika Anda mengalami distress yang signifikan atau memiliki kekhawatiran tentang kesehatan mental Anda,
                            silakan berkonsultasi dengan profesional kesehatan mental.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Animate progress bars on page load
    document.addEventListener('DOMContentLoaded', function() {
        const progressBars = document.querySelectorAll('[style*="width"]');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 500);
        });
    });

    // Interactive category cards
    document.querySelectorAll('.grid > div').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>

<style>
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            background: white !important;
        }

        .container {
            max-width: 100% !important;
            padding: 20px !important;
        }
    }
</style>
@endsection
