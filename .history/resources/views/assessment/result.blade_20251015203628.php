@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="mb-6">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Hasil Assessment</h1>
                <p class="text-xl text-gray-600">{{ $assessment->name }}</p>
            </div>

            <div class="flex justify-center items-center space-x-6 text-gray-600">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ $userAssessment->completed_at->format('d M Y, H:i') }}
                </span>
            </div>
        </div>

        @if($assessment->type === 'ptsd_diagnostic')
            <!-- PTSD Diagnostic Results -->
            <div class="space-y-8">
                <!-- Overall Score -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Hasil Diagnostik PTSD</h2>
                        <div class="relative">
                            <div class="w-32 h-32 mx-auto mb-6">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"/>
                                    <circle cx="50" cy="50" r="40"
                                            stroke="{{ $results['risk_level'] === 'high' ? '#dc2626' : ($results['risk_level'] === 'moderate' ? '#f59e0b' : ($results['risk_level'] === 'mild' ? '#10b981' : '#6b7280')) }}"
                                            stroke-width="8"
                                            fill="none"
                                            stroke-dasharray="251.2"
                                            stroke-dashoffset="{{ 251.2 - (($results['total_score'] / 30) * 251.2) }}"
                                            class="transition-all duration-1000 ease-out"/>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-gray-800">{{ $results['total_score'] }}</span>
                                </div>
                            </div>
                            <p class="text-lg text-gray-600">dari {{ $results['max_possible_score'] }} pertanyaan</p>
                            <p class="text-sm text-gray-500 mt-2">Level Risiko: <span class="font-semibold capitalize">{{ ucfirst($results['risk_level']) }}</span></p>
                        </div>
                    </div>

                    <!-- Category Breakdown -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                        @foreach($results['ranking'] as $category => $data)
                            <div class="bg-gradient-to-br {{ $loop->first ? 'from-red-50 to-red-100 border-red-200' : ($loop->iteration <= 2 ? 'from-orange-50 to-orange-100 border-orange-200' : 'from-gray-50 to-gray-100 border-gray-200') }} border-2 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-bold text-gray-800">Kategori {{ $category }}</h4>
                                    <span class="text-2xl font-bold {{ $loop->first ? 'text-red-600' : ($loop->iteration <= 2 ? 'text-orange-600' : 'text-gray-600') }}">{{ $data['score'] }}</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700 mb-1">{{ $data['name'] }}</p>
                                <p class="text-xs text-gray-600">{{ $data['description'] }}</p>
                                <div class="mt-2 text-xs text-gray-500">
                                    Ranking: #{{ $data['rank'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Primary Concern -->
                    @if(isset($results['primary_concern']))
                        <div class="mt-8 p-6 bg-blue-50 border-l-4 border-blue-400 rounded-lg">
                            <h4 class="text-lg font-semibold text-blue-800 mb-2">Area Perhatian Utama</h4>
                            <p class="text-blue-700">{{ $results['ranking'][$results['primary_concern']]['name'] }}</p>
                            <p class="text-sm text-blue-600 mt-1">{{ $results['ranking'][$results['primary_concern']]['description'] }}</p>
                        </div>
                    @endif
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Rekomendasi</h3>
                    <ul class="space-y-4">
                        @foreach($results['recommendations'] as $recommendation)
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">{{ $recommendation }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        @elseif($assessment->type === 'checklist_masalah')
            <!-- Checklist Masalah Results -->
            <div class="space-y-8">
                <!-- Overall Score -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Hasil Checklist Masalah</h2>
                        <div class="relative">
                            <div class="w-32 h-32 mx-auto mb-6">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"/>
                                    <circle cx="50" cy="50" r="40"
                                            stroke="{{ $results['risk_level'] === 'high' ? '#dc2626' : ($results['risk_level'] === 'moderate' ? '#f59e0b' : ($results['risk_level'] === 'mild' ? '#10b981' : '#6b7280')) }}"
                                            stroke-width="8"
                                            fill="none"
                                            stroke-dasharray="251.2"
                                            stroke-dashoffset="{{ 251.2 - (($results['total_symptoms'] / $results['total_possible_symptoms']) * 251.2) }}"
                                            class="transition-all duration-1000 ease-out"/>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-gray-800">{{ $results['total_symptoms'] }}</span>
                                </div>
                            </div>
                            <p class="text-lg text-gray-600">dari {{ $results['total_possible_symptoms'] }} gejala</p>
                            <p class="text-sm text-gray-500 mt-2">{{ $results['percentage'] }}% gejala dialami</p>
                            <p class="text-sm text-gray-500">Level Risiko: <span class="font-semibold capitalize">{{ ucfirst($results['risk_level']) }}</span></p>
                        </div>
                    </div>
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Rekomendasi</h3>
                    <ul class="space-y-4">
                        @foreach($results['recommendations'] as $recommendation)
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">{{ $recommendation }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        @elseif($assessment->type === 'pcl5')
            <!-- PCL-5 Results (Legacy) -->
            <div class="space-y-8">
                <!-- Overall Score -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Skor Total PCL-5</h2>
                        <div class="relative">
                            <div class="w-32 h-32 mx-auto mb-6">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"/>
                                    <circle cx="50" cy="50" r="40"
                                            stroke="{{ $results['severity'] === 'severe' ? '#dc2626' : ($results['severity'] === 'moderate' ? '#f59e0b' : ($results['severity'] === 'mild' ? '#10b981' : '#6b7280')) }}"
                                            stroke-width="8"
                                            fill="none"
                                            stroke-dasharray="251.2"
                                            stroke-dashoffset="{{ 251.2 - (($results['total_score'] / 80) * 251.2) }}"
                                            class="transition-all duration-1000 ease-out"/>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-gray-800">{{ $results['total_score'] }}</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 mb-4">dari 80 total skor</p>
                        </div>

                        <div class="inline-flex items-center px-6 py-3 rounded-full text-white font-semibold text-lg
                                    {{ $results['severity'] === 'severe' ? 'bg-gradient-to-r from-red-500 to-red-600' :
                                       ($results['severity'] === 'moderate' ? 'bg-gradient-to-r from-yellow-500 to-orange-500' :
                                        ($results['severity'] === 'mild' ? 'bg-gradient-to-r from-green-500 to-green-600' :
                                         'bg-gradient-to-r from-gray-500 to-gray-600')) }}">
                            Tingkat: {{ ucfirst($results['severity']) }}
                            @if($results['clinically_significant'])
                                <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-sm">Signifikan Klinis</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Cluster Scores -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Analisis per Kluster Gejala</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        @php
                            $clusterNames = [
                                'intrusion' => 'Intrusi/Pengulangan',
                                'avoidance' => 'Penghindaran',
                                'cognition_mood' => 'Kognisi & Mood',
                                'arousal_reactivity' => 'Kewaspadaan & Reaktivitas'
                            ];
                            $maxScores = [
                                'intrusion' => 20,
                                'avoidance' => 8,
                                'cognition_mood' => 28,
                                'arousal_reactivity' => 24
                            ];
                        @endphp

                        @foreach($results['cluster_scores'] as $cluster => $score)
                            <div class="border border-gray-200 rounded-lg p-6">
                                <h4 class="font-semibold text-gray-800 mb-3">{{ $clusterNames[$cluster] }}</h4>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-2xl font-bold text-gray-800">{{ $score }}</span>
                                    <span class="text-sm text-gray-600">dari {{ $maxScores[$cluster] }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-3 rounded-full transition-all duration-1000"
                                         style="width: {{ ($score / $maxScores[$cluster]) * 100 }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- PTSD Criteria -->
                @if($results['probable_ptsd'])
                    <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Kemungkinan PTSD Terdeteksi</h3>
                                <p class="text-sm text-red-700 mt-1">
                                    Hasil menunjukkan pola gejala yang konsisten dengan kriteria PTSD. Sangat disarankan untuk berkonsultasi dengan profesional kesehatan mental.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        @elseif($assessment->type === 'dass21')
            <!-- DASS-21 Results -->
            <div class="space-y-8">
                <!-- Subscale Scores -->
                <div class="grid md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="100">
                    @php
                        $subscaleInfo = [
                            'depression' => ['name' => 'Depresi', 'color' => 'blue', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            'anxiety' => ['name' => 'Kecemasan', 'color' => 'yellow', 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z'],
                            'stress' => ['name' => 'Stres', 'color' => 'red', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z']
                        ];
                        $severityColors = [
                            'normal' => 'green',
                            'mild' => 'blue',
                            'moderate' => 'yellow',
                            'severe' => 'orange',
                            'extremely_severe' => 'red'
                        ];
                    @endphp

                    @foreach($results['subscale_scores'] as $subscale => $score)
                        @php
                            $info = $subscaleInfo[$subscale];
                            $severity = $results['severity_levels'][$subscale];
                            $color = $severityColors[$severity];
                        @endphp

                        <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                            <div class="w-16 h-16 bg-{{ $color }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-{{ $color }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $info['icon'] }}"></path>
                                </svg>
                            </div>

                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $info['name'] }}</h3>
                            <div class="text-3xl font-bold text-{{ $color }}-600 mb-2">{{ $score }}</div>

                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-{{ $color }}-800 bg-{{ $color }}-100">
                                {{ ucfirst(str_replace('_', ' ', $severity)) }}
                            </div>

                            <!-- Progress Bar -->
                            <div class="mt-4 w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-{{ $color }}-500 h-2 rounded-full transition-all duration-1000"
                                     style="width: {{ min(($score / 42) * 100, 100) }}%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">dari 42 maksimal</p>
                        </div>
                    @endforeach
                </div>

                <!-- Overall Risk Assessment -->
                <div class="bg-white rounded-xl shadow-lg p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Tingkat Risiko Keseluruhan</h3>

                    @php
                        $riskColors = [
                            'low' => ['bg' => 'green', 'text' => 'Rendah'],
                            'moderate' => ['bg' => 'yellow', 'text' => 'Sedang'],
                            'high' => ['bg' => 'red', 'text' => 'Tinggi']
                        ];
                        $riskColor = $riskColors[$results['overall_risk']];
                    @endphp

                    <div class="inline-flex items-center px-8 py-4 rounded-full text-white font-bold text-xl bg-gradient-to-r from-{{ $riskColor['bg'] }}-500 to-{{ $riskColor['bg'] }}-600">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Risiko {{ $riskColor['text'] }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Recommendations -->
        <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Rekomendasi</h3>
            <div class="space-y-4">
                @foreach($results['recommendations'] as $index => $recommendation)
                    <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg">
                        <div class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0 mt-0.5">
                            {{ $index + 1 }}
                        </div>
                        <p class="text-gray-700 leading-relaxed">{{ $recommendation }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Emergency Contacts -->
        <div class="bg-red-50 border border-red-200 rounded-xl p-6" data-aos="fade-up" data-aos-delay="400">
            <h3 class="text-lg font-bold text-red-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Kontak Darurat Kesehatan Mental
            </h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="font-semibold text-red-800">Hotline Crisis Center</p>
                    <p class="text-red-700">500-454 (24 jam)</p>
                </div>
                <div>
                    <p class="font-semibold text-red-800">Into The Light Indonesia</p>
                    <p class="text-red-700">021-78842580</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center space-y-4" data-aos="fade-up" data-aos-delay="500">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('assessment.mental-health') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Assessment Lainnya
                </a>

                <a href="{{ route('assessment.history') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Riwayat Assessment
                </a>

                <button onclick="window.print()"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Hasil
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .no-print { display: none !important; }
    body { background: white !important; }
    .bg-gradient-to-br { background: white !important; }
    .shadow-lg { box-shadow: none !important; }
}
</style>
@endsection
