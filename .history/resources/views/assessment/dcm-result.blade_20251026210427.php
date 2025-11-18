@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6">
                <i class="fas fa-clipboard-check text-green-600 text-3xl"></i>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Hasil Assessment DCM</h1>
            <p class="text-xl text-gray-600">Daftar Cek Masalah - Analisis Kondisi Kesehatan Mental</p>
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
            <!-- Dominant Category -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full mb-6 shadow-lg">
                    <i class="{{ $results['interpretation']['icon'] ?? 'fa-check-circle' }} text-white text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-3">
                    Gejala Dominan: {{ $results['dominant_category_name'] ?? 'Tidak Diketahui' }}
                </h2>
                <div class="inline-flex items-center px-6 py-3 rounded-full {{ $results['interpretation']['bg_color'] ?? 'bg-gray-100' }} mb-4">
                    <i class="{{ $results['interpretation']['icon'] ?? 'fa-info-circle' }} {{ $results['interpretation']['severity_color'] ?? 'text-gray-600' }} mr-2"></i>
                    <span class="text-lg font-bold {{ $results['interpretation']['severity_color'] ?? 'text-gray-600' }}">
                        Tingkat Risiko: {{ $results['risk_level'] ?? 'Rendah' }}
                    </span>
                </div>
                <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    Anda mengalami <strong>{{ $results['total_problems'] ?? 0 }}</strong> masalah dari <strong>{{ $results['total_possible_problems'] ?? 100 }}</strong> total masalah
                    ({{ $results['percentage'] ?? 0 }}%)
                </p>
            </div>

            <!-- Category Scores -->
            <div class="mb-10">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Distribusi Gejala per Kategori</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                    @php
                        $categories = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getAllCategories();
                        $categoryScores = $results['category_scores'] ?? [];
                    @endphp

                    @foreach($categories as $categoryKey => $categoryInfo)
                        @php
                            $score = $categoryScores[$categoryKey] ?? 0;
                            $maxScore = count(\App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory($categoryKey));
                            $percentage = $maxScore > 0 ? ($score / $maxScore) * 100 : 0;
                        @endphp

                        <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 border-2 border-transparent {{ $categoryKey === ($results['dominant_category'] ?? '') ? 'ring-2 ring-offset-2 ring-' . str_replace('#', '', $categoryInfo['color']) . ' bg-' . str_replace('#', '', $categoryInfo['color']) . '-50' : '' }}">
                            <div class="w-12 h-12 mx-auto mb-4 rounded-lg flex items-center justify-center" style="background-color: {{ $categoryInfo['color'] }}20;">
                                <i class="fas {{ $categoryInfo['icon'] }} text-2xl" style="color: {{ $categoryInfo['color'] }};"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">{{ $categoryInfo['name'] }}</h4>
                            <div class="text-3xl font-bold mb-2" style="color: {{ $categoryInfo['color'] }};">{{ $score }}</div>
                            <div class="text-sm text-gray-600 mb-3">dari {{ $maxScore }} masalah</div>

                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="h-2 rounded-full transition-all duration-1000" style="width: {{ $percentage }}%; background-color: {{ $categoryInfo['color'] }};"></div>
                            </div>
                            <div class="text-sm font-medium" style="color: {{ $categoryInfo['color'] }};">{{ round($percentage, 1) }}%</div>

                            @if($categoryKey === ($results['dominant_category'] ?? ''))
                                <div class="mt-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium" style="background-color: {{ $categoryInfo['color'] }}20; color: {{ $categoryInfo['color'] }};">
                                        <i class="fas fa-crown mr-1"></i> Dominan
                                    </span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Interpretation -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-clipboard-list text-blue-600 mr-3"></i>
                    Interpretasi Hasil
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Gejala Utama:</h4>
                        <p class="text-gray-600">{{ $results['dominant_category_name'] ?? 'Tidak Diketahui' }}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Tingkat Keparahan:</h4>
                        <p class="text-gray-600">{{ $results['risk_level'] ?? 'Rendah' }}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Total Masalah:</h4>
                        <p class="text-gray-600">{{ $results['total_problems'] ?? 0 }} dari {{ $results['total_possible_problems'] ?? 100 }}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Persentase:</h4>
                        <p class="text-gray-600">{{ $results['percentage'] ?? 0 }}%</p>
                    </div>
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