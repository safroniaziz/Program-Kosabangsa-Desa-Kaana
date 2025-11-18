@extends('layouts.app')

@section('title', 'Mulai Assessment PTSD Baru - Desa Kaana')

@section('content')
<!-- Split Screen Layout -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50">
    <div class="container mx-auto px-6 py-8 max-w-7xl">
        <div class="grid lg:grid-cols-2 gap-8 h-full">

            <!-- Left Side - Riwayat PTSD -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <div class="h-full flex flex-col">
                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:border-blue-300 transition-colors cursor-pointer" onclick="viewResult({{ $recentAssessment->id }})">
                                        <div class="flex items-start justify-between mb-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-blue-600 font-bold text-sm">{{ $index + 1 }}</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900">Assessment #{{ $recentAssessment->id }}</h3>
                                                    <p class="text-sm text-gray-600">{{ $recentAssessment->completed_at->format('d F Y - H.i') }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">{{ $assessment->name }}</span>
                                            </div>
                                        </div>

                                        <!-- Preview Score -->
                                        <div class="mt-3 pt-3 border-t border-gray-200">
                                            @php
                                                $results = json_decode($recentAssessment->results, true);
                                                
                                                // Determine category names based on assessment type
                                                if ($assessment->type === 'checklist_masalah') {
                                                    // DCM Categories
                                                    $categoryNames = [
                                                        'Fisik' => 'Gejala 1: Fisik',
                                                        'Emosi' => 'Gejala 2: Emosi',
                                                        'Mental' => 'Gejala 3: Mental',
                                                        'Perilaku' => 'Gejala 4: Perilaku',
                                                        'Spiritual' => 'Gejala 5: Spiritual'
                                                    ];
                                                    $totalQuestions = 100;
                                                    $tableTitle = 'Laporan Assessment DCM';
                                                } else {
                                                    // PTSD Categories
                                                    $categoryNames = [
                                                        'A' => 'Terbayangi oleh Peristiwa Traumatis',
                                                        'B' => 'Harapan Masa Depan Rendah',
                                                        'C' => 'Berpikir Negatif',
                                                        'D' => 'Emosional',
                                                        'E' => 'Mengisolasi Diri',
                                                        'F' => 'Merasa Tidak Berdaya'
                                                    ];
                                                    $totalQuestions = 30;
                                                    $tableTitle = 'Laporan Assessment PTSD';
                                                }
                                                
                                                $totalScore = $results['total_score'] ?? 0;
                                                $percentage = $totalScore > 0 ? round(($totalScore / $totalQuestions) * 100, 1) : 0;
                                                $scores = $results['category_scores'] ?? [];
                                                
                                                if (!empty($scores)) {
                                                    $highestScore = max($scores);
                                                    $highestCategory = array_search($highestScore, $scores);
                                                    $averageScore = round(array_sum($scores) / count($scores), 1);
                                                } else {
                                                    $highestScore = 0;
                                                    $highestCategory = '';
                                                    $averageScore = 0;
                                                }
                                            @endphp

                                            <!-- Score Summary -->
                                            <div class="mb-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                                                <div class="flex items-center justify-between text-sm">
                                                    <span class="text-gray-600 font-medium">Jumlah Dijawab:</span>
                                                    <div class="text-right">
                                                        <span class="font-bold text-blue-600 text-lg">{{ $totalScore }}/{{ $totalQuestions }}</span>
                                                        <span class="text-xs text-gray-500 ml-2">({{ $percentage }}%)</span>
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
                                                            Berdasarkan jawaban Anda, kategori <strong>{{ $categoryNames[$highestCategory] ?? $highestCategory }}</strong> memiliki skor tertinggi ({{ $highestScore }}).
                                                            Skor ini mengindikasikan tingkat hambatan traumatik yang perlu diperhatikan.
                                                            @if($averageScore >= 3)
                                                                Secara keseluruhan, hasil menunjukkan tingkat hambatan yang perlu ditangani dengan segera.
                                                            @elseif($averageScore >= 2)
                                                                Secara keseluruhan, ada beberapa area yang perlu diperhatikan untuk perbaikan.
                                                            @else
                                                                Secara keseluruhan, hasil menunjukkan tingkat hambatan yang relatif rendah namun tetap perlu perhatian.
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <div class="font-medium text-gray-700 mb-3 text-sm">{{ $tableTitle }}</div>
                                                <div class="overflow-x-auto">
                                                    <table class="w-full text-xs border border-gray-200 rounded-lg">
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th class="px-3 py-2 text-left font-medium text-gray-700 border-b">Kategori</th>
                                                                <th class="px-3 py-2 text-center font-medium text-gray-700 border-b">Skor (dari 5 pertanyaan)</th>
                                                                <th class="px-3 py-2 text-center font-medium text-gray-700 border-b">Ranking</th>
                                                                <th class="px-3 py-2 text-left font-medium text-gray-700 border-b">Jenis Hambatan Traumatik</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $categoryNames = [
                                                                    'A' => 'Terbayangi oleh Peristiwa Traumatis',
                                                                    'B' => 'Harapan Masa Depan Rendah',
                                                                    'C' => 'Berpikir Negatif',
                                                                    'D' => 'Emosional',
                                                                    'E' => 'Mengisolasi Diri',
                                                                    'F' => 'Merasa Tidak Berdaya'
                                                                ];

                                                                // Try to get scores from results, fallback to 0
                                                                $scores = $results['category_scores'] ?? [
                                                                    'A' => 0, 'B' => 0, 'C' => 0,
                                                                    'D' => 0, 'E' => 0, 'F' => 0
                                                                ];

                                                                $sortedScores = $scores;
                                                                arsort($sortedScores); // Sort by score descending
                                                                $ranking = 1;
                                                            @endphp
                                                            @foreach($sortedScores as $category => $score)
                                                                <tr class="border-b hover:bg-gray-50">
                                                                    <td class="px-3 py-2 font-medium text-gray-900">{{ $category }}</td>
                                                                    <td class="px-3 py-2 text-center font-medium text-blue-600">{{ $score }}</td>
                                                                    <td class="px-3 py-2 text-center font-medium text-gray-600">{{ $ranking }}</td>
                                                                    <td class="px-3 py-2 text-gray-700">{{ $categoryNames[$category] }}</td>
                                                                </tr>
                                                                @php $ranking++; @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Riwayat</h3>
                                <p class="text-gray-500 text-sm">Anda belum pernah mengerjakan assessment PTSD sebelumnya.</p>
                            </div>
                        @endif

                        <!-- View All History Button -->
                        @if(isset($recentAssessments) && $recentAssessments->count() > 0)
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <a href="{{ route('assessment.history', 1) }}"
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
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4m8 0l8 8-8-8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Assessment Baru</h2>
                                <p class="text-gray-600 text-sm">Evaluasi komprehensif untuk mengukur tingkat kesiapan mental</p>
                            </div>
                        </div>
                    </div>

                    <!-- Assessment Info -->
                    <div class="bg-blue-50 rounded-xl p-6 mb-6 border border-blue-200">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-blue-800 mb-2">Pilih Opsi Berikut</h3>
                                <p class="text-blue-700 text-sm">Anda dapat memulai assessment baru dengan sesi yang baru, atau melihat hasil assessment sebelumnya pada panel riwayat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-amber-50 rounded-xl p-6 mb-6 border border-amber-200">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-amber-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-amber-800 mb-2">Petunjuk Pengisian</h3>
                                <p class="text-amber-700 text-sm">Beri tanda centang (✓) hanya pada pernyataan yang <strong>tepat menggambarkan kondisi Anda</strong>. Jika pernyataan tidak tepat atau tidak sesuai dengan kondisi Anda, <strong>jangan dicentang</strong>.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Assessment Details -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Jumlah Pertanyaan:</span>
                            <span class="font-bold text-blue-600">{{ $assessment->total_questions }} Pertanyaan</span>
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
                           class="w-full flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
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
    </div>
</div>

<!-- Success Alert -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                confirmButtonColor: '#10b981',
                confirmButtonText: 'OK',
                timer: 4000,
                timerProgressBar: true,
                backdrop: true,
                allowOutsideClick: false
            });
        });
    </script>
@endif

<script>
function viewResult(assessmentId) {
    window.open('/assessment/result/' + assessmentId, '_blank');
}
</script>

@endsection
