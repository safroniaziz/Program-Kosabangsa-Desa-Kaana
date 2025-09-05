@extends('layouts.app')

@section('title', 'Assessment Konseling Mandiri - Desa Kaana')

@section('content')
<!-- Hero Section - Matching LMS Style -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Background gradient matching LMS -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/10 via-purple-600/10 to-indigo-600/10"></div>
    </div>

    <!-- Floating elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-element absolute top-20 right-20 w-24 h-24 bg-gradient-to-br from-blue-400/30 to-purple-600/30 rounded-full blur-2xl animate-float" data-aos="zoom-in" data-aos-delay="1000"></div>
        <div class="floating-element absolute bottom-32 left-1/4 w-32 h-32 bg-gradient-to-br from-indigo-400/20 to-blue-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -3s;" data-aos="zoom-in" data-aos-delay="1200"></div>
        <div class="floating-element absolute top-1/2 right-1/3 w-40 h-40 bg-gradient-to-br from-purple-400/20 to-pink-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -5s;" data-aos="zoom-in" data-aos-delay="1400"></div>
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 min-h-screen flex items-center">
        <div class="w-full max-w-6xl mx-auto">
            <div class="text-center">
                <!-- Badge -->
                <div data-aos="fade-up" data-aos-delay="100" class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md rounded-full px-6 py-3 mb-8">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </span>
                    <span class="text-sm font-medium text-white">Assessment Konseling Mandiri</span>
                </div>

                <!-- Title -->
                <h1 data-aos="fade-up" data-aos-delay="200" class="text-5xl md:text-7xl font-black text-white mb-6">
                    Assessment
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">
                        Kesiapan Mental
                    </span>
                </h1>

                <p data-aos="fade-up" data-aos-delay="300" class="text-xl md:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Evaluasi kesiapan mental Anda dalam menghadapi situasi darurat dan bencana.
                    Dapatkan rekomendasi personal untuk meningkatkan ketangguhan mental.
                </p>

                <!-- Mental Health Indicators -->
                <div data-aos="fade-up" data-aos-delay="400" class="grid grid-cols-3 gap-6 max-w-2xl mx-auto mb-12">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full"></div>
                        </div>
                        <h3 class="text-white font-semibold mb-1">Aman</h3>
                        <p class="text-gray-300 text-sm">Mental stabil & siap</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="w-16 h-16 bg-yellow-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <div class="w-8 h-8 bg-yellow-500 rounded-full"></div>
                        </div>
                        <h3 class="text-white font-semibold mb-1">Waspada</h3>
                        <p class="text-gray-300 text-sm">Perlu perhatian</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <div class="w-8 h-8 bg-red-500 rounded-full"></div>
                        </div>
                        <h3 class="text-white font-semibold mb-1">Kritis</h3>
                        <p class="text-gray-300 text-sm">Butuh konseling</p>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div data-aos="fade-up" data-aos-delay="500" class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#assessment-form" class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                        <span class="relative z-10 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Mulai Assessment Pribadi
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <button class="group relative px-8 py-4 bg-white/10 backdrop-blur-md text-white rounded-xl font-semibold border border-white/20 overflow-hidden transition-all duration-300 hover:bg-white/20">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Assessment Kelompok
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="flex flex-col items-center text-white/70">
            <span class="text-sm mb-2">Scroll untuk melanjutkan</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

<!-- Assessment Form Section -->
<section id="assessment-form" class="py-20 bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50 relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200/30 to-purple-300/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-pink-200/30 to-orange-300/30 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-6xl">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-block mb-4">
                <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 tracking-wider uppercase">Assessment Mental</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                Evaluasi Kesiapan
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Mental Bencana</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Jawab pertanyaan berikut untuk mengetahui tingkat kesiapan mental Anda dalam menghadapi situasi darurat
            </p>
        </div>

        <!-- Progress Bar -->
        <div class="mb-8" data-aos="fade-up" data-aos-delay="50">
            <div class="max-w-2xl mx-auto">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-600">Progress Assessment</span>
                    <span class="text-sm font-medium text-gray-600" id="progress-text">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div id="progress-bar" class="bg-gradient-to-r from-blue-600 to-indigo-600 h-3 rounded-full transition-all duration-500 ease-out" style="width: 0%"></div>
                </div>
            </div>
        </div>

        <!-- Assessment Form -->
        <form id="disasterAssessmentForm" class="space-y-8">
            <!-- Personal Info -->
            <div class="glass-card rounded-2xl p-8 shadow-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-3 rounded-xl mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Informasi Dasar</h3>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="nama" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300" required>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="nama-error"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Usia</label>
                        <select id="usia" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white" required>
                            <option value="">Pilih rentang usia</option>
                            <option value="<18">Dibawah 18 tahun</option>
                            <option value="18-25">18-25 tahun</option>
                            <option value="26-35">26-35 tahun</option>
                            <option value="36-45">36-45 tahun</option>
                            <option value="46-55">46-55 tahun</option>
                            <option value=">55">Diatas 55 tahun</option>
                        </select>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="usia-error"></div>
                    </div>
                </div>
            </div>

            <!-- Mental Preparedness Questions -->
            <div class="glass-card rounded-2xl p-8 shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-br from-purple-500 to-pink-600 p-3 rounded-xl mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Kesiapan Mental Bencana</h3>
                </div>

                <div class="space-y-6">
                    <!-- Question 1 -->
                    <div class="question-group" data-question="1">
                        <p class="text-gray-700 font-medium mb-4">1. Bagaimana perasaan Anda ketika mendengar peringatan bencana?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q1" value="3" class="mr-3 text-blue-600" required>
                                <span>Tenang dan siap menghadapi situasi</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q1" value="2" class="mr-3 text-blue-600">
                                <span>Sedikit cemas tapi masih terkontrol</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q1" value="1" class="mr-3 text-blue-600">
                                <span>Sangat panik dan tidak tahu harus berbuat apa</span>
                            </label>
                        </div>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="q1-error"></div>
                    </div>

                    <!-- Question 2 -->
                    <div class="question-group" data-question="2">
                        <p class="text-gray-700 font-medium mb-4">2. Apakah Anda memiliki rencana evakuasi keluarga?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q2" value="3" class="mr-3 text-blue-600" required>
                                <span>Ya, lengkap dengan jalur dan titik kumpul</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q2" value="2" class="mr-3 text-blue-600">
                                <span>Ada rencana sederhana</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q2" value="1" class="mr-3 text-blue-600">
                                <span>Belum memiliki rencana</span>
                            </label>
                        </div>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="q2-error"></div>
                    </div>

                    <!-- Question 3 -->
                    <div class="question-group" data-question="3">
                        <p class="text-gray-700 font-medium mb-4">3. Bagaimana Anda mengelola stress dalam situasi darurat?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q3" value="3" class="mr-3 text-blue-600" required>
                                <span>Memiliki teknik relaksasi yang efektif</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q3" value="2" class="mr-3 text-blue-600">
                                <span>Berusaha tetap tenang meski sulit</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q3" value="1" class="mr-3 text-blue-600">
                                <span>Mudah panik dan kehilangan kontrol</span>
                            </label>
                        </div>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="q3-error"></div>
                    </div>

                    <!-- Question 4 -->
                    <div class="question-group" data-question="4">
                        <p class="text-gray-700 font-medium mb-4">4. Apakah Anda memiliki tas siaga bencana?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q4" value="3" class="mr-3 text-blue-600" required>
                                <span>Ya, lengkap dan siap digunakan</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q4" value="2" class="mr-3 text-blue-600">
                                <span>Ada beberapa perlengkapan darurat</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q4" value="1" class="mr-3 text-blue-600">
                                <span>Belum memiliki persiapan</span>
                            </label>
                        </div>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="q4-error"></div>
                    </div>

                    <!-- Question 5 -->
                    <div class="question-group" data-question="5">
                        <p class="text-gray-700 font-medium mb-4">5. Seberapa sering Anda mengikuti simulasi tanggap bencana?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q5" value="3" class="mr-3 text-blue-600" required>
                                <span>Rutin mengikuti setiap ada kesempatan</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q5" value="2" class="mr-3 text-blue-600">
                                <span>Pernah beberapa kali</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer radio-option">
                                <input type="radio" name="q5" value="1" class="mr-3 text-blue-600">
                                <span>Belum pernah mengikuti</span>
                            </label>
                        </div>
                        <div class="error-message hidden mt-2 text-red-600 text-sm" id="q5-error"></div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <button type="submit" id="submit-btn" class="group relative px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold text-lg overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl disabled:opacity-50 disabled:cursor-not-allowed">
                    <span class="relative z-10 flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2 loading-icon hidden animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <svg class="w-6 h-6 mr-2 submit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        <span class="button-text">Lihat Hasil Assessment</span>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Results Modal -->
<div id="resultsModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 overflow-y-auto">
    <div class="min-h-screen px-4 flex items-center justify-center">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-8 shadow-2xl transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
            <!-- Results will be populated by JavaScript -->
        </div>
    </div>
</div>

<!-- Professional CTA Section -->
<section class="cta-section">
    <div class="cta-pattern"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6" data-aos="fade-up">
                Butuh Bantuan Konseling Profesional?
            </h2>
            <p class="text-xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                Tim konselor profesional kami siap membantu Anda melalui sesi konseling virtual
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
                <button class="px-8 py-4 bg-white text-purple-700 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 hover:scale-105">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Chat dengan Konselor
                    </span>
                </button>
                <button class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-xl font-semibold hover:bg-white/10 transition-all duration-300">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Panduan Kesiapan Mental
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    let totalQuestions = 5;
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $($(this).attr('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 800);
        }
    });

    // Progress tracking
    function updateProgress() {
        let answered = 0;
        for (let i = 1; i <= totalQuestions; i++) {
            if ($(`input[name="q${i}"]:checked`).length > 0) {
                answered++;
            }
        }
        
        // Include personal info
        if ($('#nama').val().trim() !== '') answered += 0.5;
        if ($('#usia').val() !== '') answered += 0.5;
        
        const totalItems = totalQuestions + 1; // 5 questions + personal info
        const progress = Math.round((answered / totalItems) * 100);
        
        $('#progress-bar').css('width', progress + '%');
        $('#progress-text').text(progress + '%');
    }

    // Real-time progress update
    $('input[type="radio"], #nama, #usia').on('change input', function() {
        updateProgress();
        
        // Clear error for this field
        const name = $(this).attr('name') || $(this).attr('id');
        $(`#${name}-error`).addClass('hidden');
        $(this).closest('.radio-option').removeClass('border-red-300');
    });

    // Enhanced radio button styling
    $('.radio-option').on('click', function() {
        const radio = $(this).find('input[type="radio"]');
        const questionGroup = $(this).closest('.question-group');
        
        // Remove selection from siblings
        questionGroup.find('.radio-option').removeClass('border-blue-500 bg-blue-50');
        
        // Add selection to current
        if (radio.prop('checked')) {
            $(this).addClass('border-blue-500 bg-blue-50');
        }
    });

    // Form validation
    function validateForm() {
        let isValid = true;
        
        // Validate personal info
        if ($('#nama').val().trim() === '') {
            $('#nama-error').text('Nama lengkap harus diisi').removeClass('hidden');
            isValid = false;
        }
        
        if ($('#usia').val() === '') {
            $('#usia-error').text('Usia harus dipilih').removeClass('hidden');
            isValid = false;
        }
        
        // Validate questions
        for (let i = 1; i <= totalQuestions; i++) {
            if ($(`input[name="q${i}"]:checked`).length === 0) {
                $(`#q${i}-error`).text('Pertanyaan ini harus dijawab').removeClass('hidden');
                isValid = false;
            }
        }
        
        return isValid;
    }

    // Form submission
    $('#disasterAssessmentForm').on('submit', function(e) {
        e.preventDefault();
        
        // Clear previous errors
        $('.error-message').addClass('hidden');
        
        if (!validateForm()) {
            // Scroll to first error
            const firstError = $('.error-message:not(.hidden)').first();
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }
            return;
        }

        // Show loading state
        const submitBtn = $('#submit-btn');
        const buttonText = $('.button-text');
        const loadingIcon = $('.loading-icon');
        const submitIcon = $('.submit-icon');
        
        submitBtn.prop('disabled', true);
        buttonText.text('Memproses...');
        loadingIcon.removeClass('hidden');
        submitIcon.addClass('hidden');

        // Simulate processing time
        setTimeout(() => {
            // Calculate score
            let totalScore = 0;
            let questionCount = 0;

            $(this).find('input[type="radio"]:checked').each(function() {
                totalScore += parseInt($(this).val());
                questionCount++;
            });

            const averageScore = totalScore / questionCount;
            const nama = $('#nama').val();
            const usia = $('#usia').val();

            // Show results
            showResults(averageScore, nama, usia);
            
            // Reset button
            submitBtn.prop('disabled', false);
            buttonText.text('Lihat Hasil Assessment');
            loadingIcon.addClass('hidden');
            submitIcon.removeClass('hidden');
        }, 2000);
    });

    function showResults(score, nama, usia) {
        let status, statusClass, statusIcon, recommendation, additionalInfo;

        if (score >= 2.5) {
            status = 'AMAN';
            statusClass = 'bg-green-500';
            statusIcon = '✓';
            recommendation = 'Mental Anda dalam kondisi baik dan siap menghadapi situasi darurat. Tetap pertahankan kesiapan ini dengan latihan rutin.';
            additionalInfo = 'Kondisi mental Anda menunjukkan kesiapan yang baik dalam menghadapi bencana.';
        } else if (score >= 1.5) {
            status = 'WASPADA';
            statusClass = 'bg-yellow-500';
            statusIcon = '!';
            recommendation = 'Anda perlu meningkatkan kesiapan mental. Ikuti pelatihan tanggap darurat dan konsultasi dengan konselor jika diperlukan.';
            additionalInfo = 'Diperlukan perhatian khusus untuk meningkatkan kesiapan mental Anda.';
        } else {
            status = 'KRITIS';
            statusClass = 'bg-red-500';
            statusIcon = '✕';
            recommendation = 'Segera hubungi konselor profesional untuk mendapatkan bantuan. Kondisi mental Anda memerlukan perhatian khusus.';
            additionalInfo = 'Kondisi mental Anda memerlukan intervensi profesional segera.';
        }

        const resultsHTML = `
            <div class="text-center">
                <button onclick="$('#resultsModal').addClass('hidden')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Hasil Assessment</h3>
                    <p class="text-gray-600">Nama: ${nama} | Usia: ${usia}</p>
                </div>
                
                <div class="${statusClass} w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-4xl font-bold shadow-lg animate-pulse">
                    ${statusIcon}
                </div>
                
                <h3 class="text-3xl font-bold text-gray-900 mb-2">Status Mental: ${status}</h3>
                <p class="text-gray-600 mb-4">${additionalInfo}</p>
                
                <div class="w-full bg-gray-200 rounded-full h-4 mb-6">
                    <div class="${statusClass} h-4 rounded-full transition-all duration-1000 ease-out" style="width: ${(score/3)*100}%"></div>
                </div>
                
                <div class="text-left bg-gray-50 rounded-xl p-6 mb-6">
                    <h4 class="font-semibold text-gray-900 mb-3">Rekomendasi</h4>
                    <p class="text-gray-700">${recommendation}</p>
                </div>

                ${score < 2.5 ? `
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-6">
                        <h4 class="font-semibold text-blue-900 mb-3">Konseling Virtual Tersedia</h4>
                        <p class="text-blue-700 mb-4">Tim konselor profesional kami siap membantu Anda</p>
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Mulai Chat Konseling
                        </button>
                    </div>
                ` : ''}

                <div class="bg-gray-50 rounded-xl p-6 mb-6">
                    <h4 class="font-semibold text-gray-900 mb-3">Tips Meningkatkan Kesiapan Mental</h4>
                    <ul class="text-left text-gray-700 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Ikuti pelatihan tanggap darurat secara rutin</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Siapkan tas siaga bencana untuk keluarga</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Pelajari teknik relaksasi dan manajemen stress</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Komunikasi dengan keluarga tentang rencana darurat</span>
                        </li>
                    </ul>
                </div>

                <div class="flex gap-4 justify-center">
                    <button onclick="window.print()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">