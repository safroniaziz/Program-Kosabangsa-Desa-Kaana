@extends('layouts_old.app')

@section('title', 'Riwayat Assessment - ' . ($assessment->name ?? 'Assessment'))

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div>
                        <h1 class="text-3xl font-bold text-gray-900">Riwayat {{ $assessment->name ?? 'Assessment' }}</h1>
                        <p class="text-gray-600 mt-2">Semua assessment yang pernah Anda kerjakan</p>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mb-6">
                <a href="{{ route('assessment.start-new', $assessment->id) }}"
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Assessment
                </a>
        </div>

        <!-- Assessments List -->
        @if($assessments->count() > 0)
            <div class="grid gap-6">
                @foreach($assessments as $index => $userAssessment)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <div class="p-6">
                            <!-- Assessment Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                                        <span class="text-white font-bold text-lg">{{ $index + 1 }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900">Assessment #{{ $userAssessment->id }}</h3>
                                        <p class="text-sm text-gray-600">{{ $userAssessment->completed_at->format('d F Y - H.i') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm font-medium rounded-full">{{ $assessment->name ?? 'Assessment' }}</span>
                                </div>
                            </div>

                            <!-- Assessment Results -->
                            @if(isset($userAssessment->results))
                                @php
                                    $results = json_decode($userAssessment->results, true);

                                    // Check if this is DCM assessment
                                    $isDCM = $userAssessment->assessment_type === 'checklist_masalah';

                                    if ($isDCM) {
                                        // DCM specific logic
                                        $totalScore = $results['total_problems'] ?? 0;
                                        $totalPossible = $results['total_possible_problems'] ?? 100;
                                        $percentage = $results['percentage'] ?? 0;
                                        $scores = $results['category_scores'] ?? [];
                                        $highestScore = !empty($scores) ? max($scores) : 0;
                                        $highestCategory = !empty($scores) ? array_search($highestScore, $scores) : 1;
                                        $averageScore = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : 0;

                                        // DCM category names
                                        $categoryNames = [
                                            1 => 'Gejala Fisik',
                                            2 => 'Gejala Emosi',
                                            3 => 'Gejala Mental',
                                            4 => 'Gejala Perilaku',
                                            5 => 'Gejala Spiritual'
                                        ];

                                        $riskLevel = $results['risk_level'] ?? 'Rendah';
                                    } else {
                                        // PTSD logic (existing)
                                        $totalScore = $results['total_score'] ?? 0;
                                        $percentage = $totalScore > 0 ? round(($totalScore / 30) * 100, 1) : 0;
                                        $scores = $results['category_scores'] ?? [];
                                        $highestScore = !empty($scores) ? max($scores) : 0;
                                        $highestCategory = !empty($scores) ? array_search($highestScore, $scores) : 'A';
                                        $averageScore = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : 0;

                                        // PTSD category names
                                        $categoryNames = [
                                            'A' => 'Terbayangi oleh Peristiwa Traumatis',
                                            'B' => 'Harapan Masa Depan Rendah',
                                            'C' => 'Berpikir Negatif',
                                            'D' => 'Emosional',
                                            'E' => 'Mengisolasi Diri',
                                            'F' => 'Merasa Tidak Berdaya'
                                        ];
                                    }
                                @endphp

                                        <!-- Score Summary -->
                                        <div class="mb-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                                            @if($isDCM)
                                                <div class="space-y-2">
                                                    <div class="flex items-center justify-between text-sm">
                                                        <span class="text-gray-600 font-medium">Total Masalah:</span>
                                                        <div class="text-right">
                                                            <span class="font-bold text-blue-600 text-lg">{{ $totalScore }}/{{ $totalPossible }}</span>
                                                            <span class="text-xs text-gray-500 ml-2">({{ $percentage }}%)</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between text-sm">
                                                        <span class="text-gray-600 font-medium">Kategori Dominan:</span>
                                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded">
                                                            {{ $highestCategory }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="flex items-center justify-between text-sm">
                                                    <span class="text-gray-600 font-medium">Jumlah Dijawab:</span>
                                                    <div class="text-right">
                                                        <span class="font-bold text-blue-600 text-lg">{{ $totalScore }}/30</span>
                                                        <span class="text-xs text-gray-500 ml-2">({{ $percentage }}%)</span>
                                                    </div>
                                                </div>
                                            @endif
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
                                            @if($isDCM)
                                                <p class="text-sm text-green-800 leading-relaxed">
                                                    Berdasarkan jawaban Anda, <strong>{{ $categoryNames[$highestCategory] ?? $highestCategory }}</strong> adalah gejala dominan dengan skor tertinggi ({{ $highestScore }} dari 20 masalah).
                                                    Fokus pada gejala yang paling Anda alami untuk penanganan yang lebih tepat.
                                                </p>
                                            @else
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
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                    <!-- Results Table -->
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-200 rounded-lg">
                                            @if($isDCM)
                                                <!-- DCM Table Format - 3 columns -->
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-3 py-2 text-left font-medium text-gray-700 border-b">Kategori</th>
                                                        <th class="px-3 py-2 text-center font-medium text-gray-700 border-b">Skor</th>
                                                        <th class="px-3 py-2 text-center font-medium text-gray-700 border-b">Ranking</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $results = json_decode($userAssessment->results, true);
                                                        $scores = $results['category_scores'] ?? [];
                                                        $sortedScores = $scores;
                                                        arsort($sortedScores);
                                                        $ranking = 1;

                                                        // DCM category names
                                                        $categoryNames = [
                                                            1 => 'Gejala Fisik',
                                                            2 => 'Gejala Emosi',
                                                            3 => 'Gejala Mental',
                                                            4 => 'Gejala Perilaku',
                                                            5 => 'Gejala Spiritual'
                                                        ];
                                                    @endphp
                                                    @foreach($sortedScores as $category => $score)
                                                        <tr class="border-b hover:bg-gray-50 {{ $category === ($results['dominant_category'] ?? 0) ? 'bg-blue-50' : '' }}">
                                                            <td class="px-3 py-2 font-medium text-gray-900">{{ $categoryNames[$category] ?? $category }}</td>
                                                            <td class="px-3 py-2 text-center font-medium text-blue-600">{{ $score }}</td>
                                                            <td class="px-3 py-2 text-center font-medium text-gray-600">{{ $ranking }}</td>
                                                        </tr>
                                                        @php $ranking++; @endphp
                                                    @endforeach
                                                </tbody>
                                            @else
                                                <!-- PTSD Table Format - 4 columns -->
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-3 py-2 text-left font-medium text-gray-700 border-b">Kolom</th>
                                                        <th class="px-3 py-2 text-center font-medium text-gray-700 border-b">Skor</th>
                                                        <th class="px-3 py-2 text-center font-medium text-gray-700 border-b">Ranking</th>
                                                        <th class="px-3 py-2 text-left font-medium text-gray-700 border-b">Jenis Hambatan Traumatik</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $results = json_decode($userAssessment->results, true);
                                                        $scores = $results['category_scores'] ?? [];
                                                        $sortedScores = $scores;
                                                        arsort($sortedScores);
                                                        $ranking = 1;

                                                        // PTSD category names
                                                        $categoryNames = [
                                                            'A' => 'Terbayangi oleh Peristiwa Traumatis',
                                                            'B' => 'Harapan Masa Depan Rendah',
                                                            'C' => 'Berpikir Negatif',
                                                            'D' => 'Emosional',
                                                            'E' => 'Mengisolasi Diri',
                                                            'F' => 'Merasa Tidak Berdaya'
                                                        ];
                                                    @endphp
                                                    @foreach($sortedScores as $category => $score)
                                                        <tr class="border-b hover:bg-gray-50">
                                                            <td class="px-3 py-2 font-medium text-gray-900">{{ $category }}</td>
                                                            <td class="px-3 py-2 text-center font-medium text-blue-600">{{ $score }}</td>
                                                            <td class="px-3 py-2 text-center font-medium text-gray-600">{{ $ranking }}</td>
                                                            <td class="px-3 py-2 text-gray-700">{{ $categoryNames[$category] ?? $category }}</td>
                                                        </tr>
                                                        @php $ranking++; @endphp
                                                    @endforeach
                                                </tbody>
                                            @endif
                                        </table>
                                    </div>
                            @else
                                <div class="text-center py-4 text-gray-500">
                                    <p>Data hasil assessment tidak tersedia</p>
                                </div>
                            @endif
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
                <p class="text-gray-500 text-sm mb-6">Anda belum pernah mengerjakan assessment PTSD sebelumnya.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('assessment.start-new', $assessment->id ?? 1) }}"
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Mulai Assessment
                    </a>
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        Login untuk Melihat Riwayat
                    </a>
                    <a href="{{ route('assessment.demo-history') }}"
                       class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        Lihat Demo Riwayat
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
