@extends('layouts.app')

@section('content')
<!-- Enhanced Hero Section with Dynamic Background -->
<div class="relative min-h-screen overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500">
        <div class="absolute inset-0 bg-black/20"></div>
        <!-- Animated geometric shapes -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-white/10 rounded-full blur-lg animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-white/10 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 container mx-auto px-4 py-16 max-w-7xl">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Success Animation Container -->
            <div class="relative inline-block mb-8">
                <!-- Glowing Ring Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full w-24 h-24 mx-auto animate-ping opacity-75"></div>
                <!-- Success Icon -->
                <div class="relative w-24 h-24 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-2xl ring-8 ring-white/20">
                    <svg class="w-12 h-12 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Title with Gradient Effect -->
            <div class="space-y-4">
                <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight tracking-tight">
                    Hasil Assessment
                    <span class="block text-3xl md:text-4xl font-light opacity-90 mt-2">
                        {{ $assessment->name ?? 'Assessment Kesehatan Mental' }}
                    </span>
                </h1>

                <!-- Completion Badge -->
                <div class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-md rounded-full border border-white/30">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-white font-medium">
                        Selesai: {{ $userAssessment->completed_at->format('d F Y, H:i') }}
                    </span>
                </div>
            </div>
        </div>

        @if(($assessment->type ?? '') === 'ptsd_diagnostic')
            <!-- PTSD Diagnostic Results -->
            <div class="space-y-12">
                <!-- Enhanced Score Card -->
                <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 md:p-12 border border-white/20" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center mb-10">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            Hasil Diagnostik PTSD
                        </h2>

                        <!-- Enhanced Progress Circle -->
                        <div class="relative inline-flex items-center justify-center mb-8">
                            <!-- Animated Background Circle -->
                            <div class="absolute w-40 h-40 rounded-full bg-gradient-to-br from-blue-50 to-indigo-100 animate-pulse"></div>
                            <!-- Progress SVG -->
                            <div class="relative w-40 h-40">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                    <!-- Background Circle -->
                                    <circle cx="50" cy="50" r="38" stroke="#e5e7eb" stroke-width="6" fill="none" opacity="30"/>
                                    <!-- Progress Circle with Gradient -->
                                    <defs>
                                        <linearGradient id="progressGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                            <stop offset="50%" style="stop-color:#8b5cf6;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                                    <circle cx="50" cy="50" r="38"
                                            stroke="url(#progressGradient)"
                                            stroke-width="6"
                                            fill="none"
                                            stroke-dasharray="238.76"
                                            stroke-dashoffset="{{ 238.76 - (min($results['total_score'] ?? 0, 30) / 30) * 238.76 }}"
                                            class="transition-all duration-1500 ease-out drop-shadow-lg"/>
                                </svg>
                                <!-- Center Content -->
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                        {{ $results['total_score'] ?? 0 }}
                                    </span>
                                    <span class="text-sm text-gray-500 mt-1">dari {{ $results['max_possible_score'] ?? 120 }} poin</span>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                            <!-- Total Questions -->
                            <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/30">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-800">30</div>
                                <div class="text-sm text-gray-600">Total Gejala</div>
                            </div>

                            <!-- Symptom Percentage -->
                            <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/30">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-800">
                                    {{ round(($results['total_score'] ?? 0) / 120 * 100, 1) }}%
                                </div>
                                <div class="text-sm text-gray-600">Persentase Poin</div>
                            </div>

                            <!-- Yes Responses -->
                            <div class="text-center p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/30">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-800">{{ $results['total_score'] ?? 0 }}</div>
                                <div class="text-sm text-gray-600">Total Poin Terakumulasi</div>
                            </div>
                        </div>

                        <!-- Enhanced Risk Level Badge -->
                        <div class="flex justify-center mt-8">
                            <div class="inline-flex flex-col items-center px-8 py-4 rounded-2xl
                                {{ $results['risk_level'] === 'high' ? 'bg-gradient-to-r from-red-500 to-red-600' :
                                   ($results['risk_level'] === 'moderate' ? 'bg-gradient-to-r from-amber-500 to-orange-500' :
                                   ($results['risk_level'] === 'low' ? 'bg-gradient-to-r from-green-500 to-emerald-500' : 'bg-gradient-to-r from-gray-500 to-gray-600')) }}
                                text-white shadow-xl transform transition-all duration-300 hover:scale-105">
                                <span class="text-2xl font-bold mb-1">
                                    {{ ucfirst($results['risk_level'] ?? 'normal') }}
                                </span>
                                <span class="text-sm opacity-90">Level Risiko</span>
                            </div>
                        </div>
                    </div>

                    <!-- Category Breakdown -->
                    @if(isset($results['ranking']) && !empty($results['ranking']))
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Detail Kategori PTSD</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($results['ranking'] as $category => $data)
                            <div class="group relative overflow-hidden rounded-2xl bg-white/80 backdrop-blur-sm border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2"
                                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                    <!-- Gradient Background -->
                                    <div class="absolute inset-0 bg-gradient-to-br
                                        {{ $loop->first ? 'from-red-400/20 to-pink-500/20' :
                                           ($loop->iteration <= 2 ? 'from-amber-400/20 to-orange-500/20' : 'from-blue-400/20 to-indigo-500/20') }}">
                                    </div>

                                    <!-- Content -->
                                    <div class="relative p-6">
                                        <!-- Rank Badge -->
                                        <div class="absolute top-4 right-4 w-10 h-10 bg-gradient-to-br
                                            {{ $loop->first ? 'from-red-500 to-pink-500' :
                                               ($loop->iteration <= 2 ? 'from-amber-500 to-orange-500' : 'from-blue-500 to-indigo-500') }}
                                            rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                            #{{ $data['rank'] }}
                                        </div>

                                        <!-- Category Header -->
                                        <div class="mb-4">
                                            <div class="flex items-center space-x-3 mb-3">
                                                <div class="w-12 h-12 bg-gradient-to-br
                                                    {{ $loop->first ? 'from-red-500 to-pink-500' :
                                                       ($loop->iteration <= 2 ? 'from-amber-500 to-orange-500' : 'from-blue-500 to-indigo-500') }}
                                                    rounded-xl flex items-center justify-center">
                                                    <span class="text-white font-bold text-lg">{{ $category }}</span>
                                                </div>
                                                <div class="text-3xl font-bold bg-gradient-to-r
                                                    {{ $loop->first ? 'from-red-600 to-pink-600' :
                                                       ($loop->iteration <= 2 ? 'from-amber-600 to-orange-600' : 'from-blue-600 to-indigo-600') }}
                                                    bg-clip-text text-transparent">
                                                    {{ $data['score'] }}
                                                </div>
                                            </div>
                                            <h4 class="text-lg font-bold text-gray-800">{{ $data['name'] }}</h4>
                                        </div>

                                        <!-- Description -->
                                        <p class="text-gray-600 text-sm leading-relaxed">{{ $data['description'] }}</p>

                                        <!-- Progress Bar -->
                                        <div class="mt-4">
                                            <div class="w-full bg-gray-200/50 rounded-full h-2">
                                                <div class="bg-gradient-to-r
                                                    {{ $loop->first ? 'from-red-500 to-pink-500' :
                                                       ($loop->iteration <= 2 ? 'from-amber-500 to-orange-500' : 'from-blue-500 to-indigo-500') }}
                                                    h-2 rounded-full transition-all duration-1000 ease-out"
                                                     style="width: {{ min(($data['score'] / 10) * 100, 100) }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @else
                        <div class="mt-8 p-6 bg-gray-50 border-l-4 border-gray-400 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Data Kategori</h4>
                            <p class="text-gray-700">Detail kategori assessment belum tersedia.</p>
                        </div>
                    @endif

                    <!-- Primary Concern -->
                    @if(isset($results['primary_concern']) && isset($results['ranking'][$results['primary_concern']]))
                        <div class="mt-12 p-8 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 backdrop-blur-sm rounded-2xl border border-indigo-300/30 text-center"
                         data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-indigo-800 mb-3">Area Perhatian Utama</h4>
                        <p class="text-xl text-indigo-700 font-semibold mb-2">{{ $results['ranking'][$results['primary_concern']]['name'] }}</p>
                        <p class="text-indigo-600 max-w-2xl mx-auto">{{ $results['ranking'][$results['primary_concern']]['description'] }}</p>
                        </div>
                    @endif
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Rekomendasi</h3>
                    @if(isset($results['recommendations']) && is_array($results['recommendations']))
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
                    @else
                        <div class="text-gray-700">
                            <p>Berikut adalah rekomendasi berdasarkan hasil assessment Anda:</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Lanjutkan memantau kondisi mental Anda secara berkala</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Jangan ragu berkonsultasi dengan profesional kesehatan mental jika dibutuhkan</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Praktikkan teknik relaksasi dan manajemen stress secara teratur</span>
                                </li>
                            </ul>
                        </div>
                    @endif
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
                    @if(isset($results['recommendations']) && is_array($results['recommendations']))
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
                    @else
                        <div class="text-gray-700">
                            <p>Rekomendasi akan tersedia setelah assessment selesai diproses.</p>
                        </div>
                    @endif
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
            @if(isset($results['recommendations']) && is_array($results['recommendations']))
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
            @else
                <div class="text-gray-700 text-center">
                    <p>Rekomendasi akan tersedia setelah assessment selesai diproses.</p>
                </div>
            @endif
        </div>

        <!-- Assessment Explanation -->
        @if(isset($results['total_score']) && isset($results['answers_summary']))
            <div class="bg-amber-50 border border-amber-200 rounded-xl p-6" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-lg font-bold text-amber-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Penjelasan Hasil Assessment
                </h3>

                <div class="space-y-3">
                    <div class="bg-white rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Mengapa Hasil Anda Adalah Ini?</h4>
                        <div class="text-gray-700 text-sm space-y-2">
                            <p>Berdasarkan jawaban Anda pada setiap kategori pertanyaan, sistem menghitung skor total dan menentukan tingkat risiko kesehatan mental Anda.</p>
                            <p><strong>Skor {{ $results['total_score'] }}</strong> dari total <strong>{{ $assessment->type === 'ptsd_diagnostic' ? '30' : '69' }}</strong> pertanyaan menunjukkan bahwa {{ $results['overall_risk_level_text'] ?? $results['overall_risk_level'] }}.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Analisis Jawaban Anda:</h4>
                        <div class="text-gray-700 text-sm space-y-2">
                            <p>Hasil assessment mencerminkan bagaimana Anda merespons pada berbagai gejala yang terkait dengan {{ $assessment->type === 'ptsd_diagnostic' ? 'PTSD' : 'DCM' }}.</p>
                            <p>@foreach($results['answers_summary'] as $category => $answers)
                                @if(is_array($answers) && count($answers) > 0)
                                    <strong>{{ ucfirst($category) }}:</strong>
                                    @foreach($answers as $answer)
                                        {{ $answer['question'] }}: {{ $answer['answer'] }}{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                    <br>
                                @endif
                            @endforeach</p>
                            <p>Analisis ini membantu profesional kesehatan mental memahami kondisi Anda lebih baik dan memberikan rekomendasi yang tepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                <a href="{{ route('assessment') }}"
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
<!-- Call to Action -->
        <div class="mt-16 text-center" data-aos="fade-up" data-aos-delay="500">
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Langkah Selanjutnya</h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Konsultasikan hasil ini dengan profesional kesehatan mental untuk mendapatkan penanganan yang tepat dan komprehensif.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('assessment.history') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transform transition-all duration-300 hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Lihat Riwayat Assessment
                    </a>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center px-8 py-4 bg-white text-gray-700 font-semibold rounded-xl border-2 border-gray-300 hover:border-gray-400 transform transition-all duration-300 hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
