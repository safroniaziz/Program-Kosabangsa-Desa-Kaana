@extends('layouts.app')

@section('title', 'Mulai Assessment DCM Baru - Desa Kaana')

@section('content')
<!-- Split Screen Layout -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50">
    <div class="container mx-auto px-6 py-8 max-w-7xl">
        <div class="grid lg:grid-cols-2 gap-8 h-full">

            <!-- Left Side - Riwayat DCM Assessment -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <div class="h-full flex flex-col">
                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Riwayat Assessment Terbaru</h2>
                                <p class="text-gray-600 text-sm">{{ $assessment->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat List -->
                    <div class="flex-1 overflow-y-auto">
                        @if(isset($recentAssessments) && $recentAssessments->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentAssessments as $index => $recentAssessment)
                                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:border-emerald-300 transition-colors cursor-pointer" onclick="viewResult({{ $assessment->id }})">
                                        <div class="flex items-start justify-between mb-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-emerald-600 font-bold text-sm">{{ $index + 1 }}</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900">Assessment #{{ $recentAssessment->id }}</h3>
                                                    <p class="text-sm text-gray-600">{{ $recentAssessment->completed_at->format('d F Y - H.i') }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                @if(isset($recentAssessment->results['dominant_category_name']))
                                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">{{ $recentAssessment->results['dominant_category_name'] }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Preview Score -->
                                        @if(isset($recentAssessment->results['total_score']))
                                            <div class="mt-3 pt-3 border-t border-gray-200">
                                                <div class="flex items-center justify-between text-sm">
                                                    <span class="text-gray-600">Skor Total:</span>
                                                    <span class="font-bold text-emerald-600">{{ $recentAssessment->results['total_score'] }}/69</span>
                                                </div>
                                                @if(isset($recentAssessment->results['dominant_category_name']))
                                                    <div class="mt-2">
                                                        <span class="text-xs text-gray-600">Fokus Utama: {{ $recentAssessment->results['dominant_category_name'] }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif

                                        <!-- Show Questions and Answers for DCM -->
                                        <div class="mt-3 pt-3 border-t border-gray-200">
                                            <h4 class="font-semibold text-gray-800 mb-2 text-sm">Hasil Assessment Terakhir:</h4>
                                            @if(isset($recentAssessment->results))
                                                @php
                                                    $results = json_decode($recentAssessment->results, true);
                                                    $dominantCategory = $results['dominant_category'] ?? 'Tidak ada';
                                                    $dominantCategoryName = $results['dominant_category_name'] ?? 'Tidak ada';
                                                    $totalProblems = $results['total_problems'] ?? 0;
                                                    $categoryScores = $results['category_scores'] ?? [];

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
                                                    <div class="flex items-center justify-between text-sm">
                                                        <span class="text-gray-600 font-medium">Jumlah Dijawab:</span>
                                                        <div class="text-right">
                                                            <span class="font-bold text-blue-600 text-lg">{{ $totalProblems }}/100</span>
                                                            <span class="text-xs text-gray-500 ml-2">({{ round(($totalProblems / 100) * 100, 1) }}%)</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between text-sm mt-2">
                                                        <span class="text-gray-600 font-medium">Kategori Dominan:</span>
                                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded">
                                                            {{ $dominantCategoryName }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- Interpretation -->
                                                <div class="mb-3 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded">
                                                    <div class="flex items-start">
                                                        <div class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center mr-2 flex-shrink-0">
                                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-semibold text-green-900 mb-1 text-xs">Interpretasi Hasil</h5>
                                                            @php
                                                                $highestScore = !empty($categoryScores) ? max($categoryScores) : 0;
                                                                $averageScore = count($categoryScores) > 0 ? round(array_sum($categoryScores) / count($categoryScores), 1) : 0;
                                                            @endphp
                                                            <p class="text-xs text-green-800 leading-relaxed">
                                                                Berdasarkan jawaban Anda, kategori <strong>{{ $dominantCategoryName }}</strong> memiliki skor tertinggi ({{ $highestScore }} dari 20 masalah).
                                                                Skor ini mengindikasikan gejala dominan yang perlu diperhatikan.
                                                                @if($averageScore >= 10)
                                                                    Secara keseluruhan, hasil menunjukkan gejola yang signifikan dan perlu penanganan khusus.
                                                                @elseif($averageScore >= 5)
                                                                    Secara keseluruhan, ada beberapa gejala yang perlu diperhatikan untuk penanganan lebih lanjut.
                                                                @else
                                                                    Secara keseluruhan, gejola yang muncul masih dalam batas yang dapat dikelola.
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Category Distribution Table -->
                                                @if(!empty($categoryScores))
                                                    <div class="mb-3">
                                                        <h5 class="text-sm font-semibold text-gray-700 mb-2">Distribusi Gejala:</h5>
                                                        <div class="overflow-x-auto">
                                                            <table class="w-full text-xs border border-gray-200 rounded">
                                                                <thead class="bg-gray-50">
                                                                    <tr>
                                                                        <th class="px-2 py-1 text-left font-medium text-gray-700">Kategori</th>
                                                                        <th class="px-2 py-1 text-center font-medium text-gray-700">Skor</th>
                                                                        <th class="px-2 py-1 text-center font-medium text-gray-700">Ranking</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $sortedScores = $categoryScores;
                                                                        arsort($sortedScores);
                                                                        $ranking = 1;
                                                                    @endphp
                                                                    @foreach($sortedScores as $category => $score)
                                                                        <tr class="border-b hover:bg-gray-50 {{ $category === $dominantCategory ? 'bg-blue-50' : '' }}">
                                                                            <td class="px-2 py-1 font-medium text-gray-900">{{ $categoryNames[$category] ?? $category }}</td>
                                                                            <td class="px-2 py-1 text-center font-medium text-blue-600">{{ $score }}</td>
                                                                            <td class="px-2 py-1 text-center font-medium text-gray-600">{{ $ranking }}</td>
                                                                        </tr>
                                                                        @php $ranking++; @endphp
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <p class="text-sm text-gray-500">Detail assessment tidak tersedia</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2 2v10a2 2 0 012-2h4a2 2 0 012-2v5a2 2 0 012-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Riwayat</h3>
                                <p class="text-gray-500 text-sm">Anda belum pernah mengerjakan assessment {{ $assessment->name }} sebelumnya.</p>
                            </div>
                        @endif

                    <!-- View All History Button -->
                    @if($recentAssessments && $recentAssessments->count() > 0)
                        <div class="mt-4">
                            <a href="{{ route('assessment.history', $assessment->id) }}"
                               class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-3 rounded-lg font-medium text-center hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <span>Lihat Semua Riwayat</span>
                            </a>
                        </div>
                    @endif
                    </div>
                </div>
            </div>

            <!-- Right Side - Form Assessment Baru -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <div class="h-full flex flex-col">
                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4m8 0l8 8-8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Assessment Baru</h2>
                                <p class="text-gray-600 text-sm">{{ $assessment->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Assessment Info -->
                    <div class="bg-emerald-50 rounded-xl p-6 mb-6 border border-emerald-200">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-emerald-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-emerald-800 mb-2">Petunjuk Pengisian</h3>
                                <p class="text-emerald-700 text-sm">Beri tanda centang (✓) hanya pada pernyataan yang <strong>tepat menggambarkan kondisi Anda</strong>. Jika pernyataan tidak tepat atau tidak sesuai dengan kondisi Anda, <strong>jangan dicentang</strong>.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Assessment Details -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Jumlah Pertanyaan:</span>
                            <span class="font-bold text-emerald-600">{{ $assessment->total_questions }} Pertanyaan</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-purple-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Estimasi Waktu:</span>
                            <span class="font-bold text-purple-600">{{ $assessment->time_limit_minutes }} Menit</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Format:</span>
                            <span class="font-bold text-amber-600">Checkbox (Ya)</span>
                        </div>
                    </div>

                    <!-- Start Button -->
                    <div class="mt-auto">
                        <a href="{{ route('assessment.start', $assessment->id) }}"
                           class="w-full flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <span class="text-lg">Mulai Assessment Baru</span>
                        </a>

                        <p class="text-center text-gray-500 text-sm mt-4">
                            Memulai assessment baru dengan sesi yang baru
                        </p>
                    </div>
                </div>
            </div>
</div>

<script>
function viewResult(assessmentId) {
    window.open('/assessment/history/' + assessmentId, '_blank');
}
</script>

@endsection
