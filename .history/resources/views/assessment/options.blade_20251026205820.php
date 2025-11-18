@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/assessment-animations.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-800/30"></div>
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse morph-bg" data-parallax="0.2"></div>
        <div class="absolute top-40 right-20 w-32 h-32 bg-pink-400/20 rounded-full blur-2xl animate-float" data-parallax="0.3"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-blue-400/15 rounded-full blur-xl animate-pulse animate-float-delay" data-parallax="0.15"></div>
        <div class="absolute bottom-40 right-10 w-16 h-16 bg-purple-400/25 rounded-full blur-lg animate-bounce" data-parallax="0.25"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 py-16 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent mb-6">
                Assessment Kesehatan Mental
            </h1>
            <p class="text-xl md:text-2xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                Mulai perjalanan menuju pemahaman diri yang lebih baik dengan assessment komprehensif kami
            </p>
            <div class="mt-8 inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full text-white/90">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                <span class="text-sm font-medium">Data Anda Terlindungi & Confidential</span>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('warning'))
            <div class="mb-8" data-aos="fade-down">
                <div class="bg-amber-50 border-l-4 border-amber-400 p-6 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-medium text-amber-800">{{ session('warning') }}</p>
                            <div class="mt-2 flex flex-wrap gap-3">
                                <a href="{{ route('assessment.history', 1) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    Lihat Riwayat
                                </a>
                                <span class="text-amber-700 text-sm">atau klik tombol di bawah untuk assessment baru</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8" data-aos="fade-down">
                <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Assessment Options -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            @foreach($assessments as $index => $assessment)
            <!-- {{ $assessment->name }} -->
            <div class="group relative" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                @if($assessment->type === 'ptsd_diagnostic')
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                @else
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                @endif
                <div class="relative bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover:bg-white transition-all duration-300 transform hover:-translate-y-2">
                    <!-- Card Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            @if($assessment->type === 'ptsd_diagnostic')
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-100 px-3 py-1 rounded-full">
                                Diagnostik
                            </div>
                            @else
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div class="text-xs font-bold text-emerald-600 uppercase tracking-wider bg-emerald-100 px-3 py-1 rounded-full">
                                Diagnostik
                            </div>
                            @endif
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold text-gray-800">{{ str_pad($assessment->id, 2, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-4 leading-tight">
                        {{ $assessment->name }}
                    </h3>

                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ $assessment->description ?? 'Assessment untuk mengevaluasi gejala-gejala terkait kesehatan mental berdasarkan kriteria diagnostik yang terstandar.' }}
                    </p>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        @if($assessment->type === 'ptsd_diagnostic')
                        <div class="bg-blue-50 rounded-lg p-4 text-center group hover:bg-blue-100 transition-colors duration-300">
                            <div class="text-2xl font-bold text-blue-600 mb-1 counter-animate" data-count="6">0</div>
                            <div class="text-xs text-blue-600 font-medium uppercase tracking-wide">Dimensi</div>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4 text-center group hover:bg-blue-100 transition-colors duration-300">
                            <div class="text-2xl font-bold text-blue-600 mb-1 counter-animate" data-count="30">0</div>
                            <div class="text-xs text-blue-600 font-medium uppercase tracking-wide">Pertanyaan</div>
                        </div>
                        @else
                        <div class="bg-emerald-50 rounded-lg p-4 text-center group hover:bg-emerald-100 transition-colors duration-300">
                            <div class="text-2xl font-bold text-emerald-600 mb-1 counter-animate" data-count="5">0</div>
                            <div class="text-xs text-emerald-600 font-medium uppercase tracking-wide">Kategori</div>
                        </div>
                        <div class="bg-emerald-50 rounded-lg p-4 text-center group hover:bg-emerald-100 transition-colors duration-300">
                            <div class="text-2xl font-bold text-emerald-600 mb-1 counter-animate" data-count="69">0</div>
                            <div class="text-xs text-emerald-600 font-medium uppercase tracking-wide">Gejala</div>
                        </div>
                        @endif
                    </div>

                    <!-- Format Info -->
                    @if($assessment->type === 'ptsd_diagnostic')
                    <div class="bg-gradient-to-r from-blue-500/10 to-cyan-500/10 border border-blue-200/50 p-4 rounded-xl mb-6">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-blue-800 font-medium">Format Checkbox</p>
                                <p class="text-xs text-blue-600 mt-1">Beri tanda centang (✓) pada pernyataan yang BENAR bagi Anda</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border border-emerald-200/50 p-4 rounded-xl mb-6">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-emerald-800 font-medium">Format Radio Button</p>
                                <p class="text-xs text-emerald-600 mt-1">Pilih "Ada" atau "Tidak Ada" untuk setiap kriteria diagnostik DCM</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Button -->
                    @auth
                        @if($assessment->type === 'ptsd_diagnostic')
                        <a href="{{ route('assessment.start-new', $assessment->id) }}" class="btn-assessment w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-200 icon-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <span>Mulai Assessment {{ $assessment->name }}</span>
                        </a>
                        @else
                        <a href="{{ route('assessment.start', $assessment->id) }}" class="btn-assessment w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-200 icon-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <span>Mulai Assessment {{ $assessment->name }}</span>
                        </a>
                        @endif
                    @else
                        @if($assessment->type === 'ptsd_diagnostic')
                        <a href="{{ route('login') }}" class="btn-assessment w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                        @else
                        <a href="{{ route('login') }}" class="btn-assessment w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                        @endif
                            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-200 icon-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Login untuk Mulai</span>
                        </a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>

        <!-- Information Section -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <!-- Feature 1 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.012-3H20l-3.766-3.766a1.991 1.991 0 00-2.828 0L10.5 8.5a1.991 1.991 0 000 2.828L13.328 14M18 12v7a2 2 0 01-2 2H8a2 2 0 01-2-2V5a2 2 0 012-2h2m8 0V2a1 1 0 011-1h1a1 1 0 011 1v1m0 0V3a1 1 0 01-1 1h-1a1 1 0 01-1-1V2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Terstandar Internasional</h3>
                <p class="text-white/70 text-sm leading-relaxed">Assessment berbasis kriteria diagnostik yang diakui secara global</p>
            </div>

            <!-- Feature 2 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Data Terlindungi</h3>
                <p class="text-white/70 text-sm leading-relaxed">Informasi pribadi Anda dijamin kerahasiaan dan keamanannya</p>
            </div>

            <!-- Feature 3 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Hasil Instan</h3>
                <p class="text-white/70 text-sm leading-relaxed">Dapatkan hasil dan rekomendasi langsung setelah menyelesaikan assessment</p>
            </div>
        </div>

        <!-- Important Information -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Informasi Penting</h3>
                </div>

                <div class="grid md:grid-cols-2 gap-6 text-white/90">
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Alat Skrining Profesional</h4>
                                <p class="text-sm text-white/75">Assessment ini adalah alat skrining untuk membantu mendeteksi gejala-gejala terkait kondisi kesehatan mental pasca trauma.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Hasil & Rekomendasi</h4>
                                <p class="text-sm text-white/75">Hasil assessment dapat membantu Anda memahami kondisi kesehatan mental dan memberikan rekomendasi langkah selanjutnya.</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Kejujuran Diperlukan</h4>
                                <p class="text-sm text-white/75">Jawablah pertanyaan dengan jujur sesuai kondisi yang Anda alami untuk mendapatkan hasil yang akurat.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-gradient-to-r from-orange-400 to-red-400 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Konsultasi Profesional</h4>
                                <p class="text-sm text-white/75">Jika hasil menunjukkan level risiko tinggi, sangat disarankan untuk berkonsultasi dengan profesional kesehatan mental.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/assessment-interactions.js') }}"></script>
@endsection
