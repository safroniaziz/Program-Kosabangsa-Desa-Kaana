@extends('layouts.app')

@section('title', 'Assessment Konseling Mandiri - Desa Kaana')

@section('content')
<!-- Hero Section with Enhanced Design -->
<section class="relative py-32 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500/20 rounded-full floating-element blur-xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-purple-500/20 rounded-full floating-element blur-xl"></div>
        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
    </div>
    
    <div class="relative z-10 max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div class="mb-8 animate-fade-in-up">
            <span class="inline-block px-6 py-3 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium mb-6 glass-effect text-white">
                🧠 Assessment Konseling Digital
            </span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-8 animate-fade-in-up">
            Assessment <span class="text-gradient">Konseling Mandiri</span>
        </h1>
        
        <p class="text-xl md:text-2xl text-gray-200 mb-12 animate-fade-in-up max-w-4xl mx-auto leading-relaxed">
            Temukan potensi tersembunyi Anda melalui asesmen komprehensif yang dirancang khusus untuk pengembangan karir dan personal yang optimal.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center animate-fade-in-up">
            <a href="#assessment-form" class="btn-primary text-white px-10 py-5 rounded-2xl font-semibold text-lg inline-flex items-center justify-center morph-btn glow-border relative overflow-hidden group">
                <span class="relative z-10 flex items-center">
                    <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    Mulai Assessment
                </span>
            </a>
        </div>
    </div>
</section>

<!-- Assessment Form Section with Modern Design -->
<section id="assessment-form" class="py-32 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-200/30 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-purple-200/30 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card rounded-3xl shadow-2xl p-12 md:p-16 animate-fade-in-up">
            <div class="text-center mb-16">
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 w-24 h-24 rounded-2xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 text-gradient">Mulai Assessment Anda</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Jawab pertanyaan-pertanyaan berikut dengan jujur untuk mendapatkan hasil yang akurat dan rekomendasi yang tepat untuk pengembangan diri Anda.</p>
            </div>

            <!-- Form Sections with Enhanced Design -->
            <form id="assessmentForm" class="space-y-12">
                <!-- Personal Information Section -->
                <div class="glass-card p-10 rounded-3xl shadow-xl border border-white/20 animate-fade-in-up">
                    <div class="flex items-center mb-8">
                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-2xl mr-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Informasi Personal</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Nama Lengkap</label>
                            <input type="text" id="fullName" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-lg hover:border-blue-400" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Usia</label>
                            <select id="age" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-lg hover:border-blue-400 bg-white">
                                <option value="">Pilih rentang usia</option>
                                <option value="15-20">15-20 tahun</option>
                                <option value="21-25">21-25 tahun</option>
                                <option value="26-30">26-30 tahun</option>
                                <option value="31-35">31-35 tahun</option>
                                <option value="36-40">36-40 tahun</option>
                                <option value="40+">40+ tahun</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Pendidikan Terakhir</label>
                            <select id="education" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-lg hover:border-blue-400 bg-white">
                                <option value="">Pilih pendidikan terakhir</option>
                                <option value="SD">Sekolah Dasar (SD)</option>
                                <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                                <option value="SMA/SMK">SMA/SMK/Sederajat</option>
                                <option value="Diploma">Diploma (D1/D2/D3)</option>
                                <option value="S1">Sarjana (S1)</option>
                                <option value="S2">Magister (S2)</option>
                                <option value="S3">Doktor (S3)</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Saat Ini</label>
                            <input type="text" id="currentJob" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="Masukkan pekerjaan saat ini">
                        </div>
                    </div>
                </div>

                <!-- Personality Assessment -->
                <div class="bg-blue-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Tes Kepribadian
                    </h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-gray-700 mb-4 font-medium">1. Bagaimana cara Anda mengambil keputusan penting?</p>
                            <div class="space-y-3">
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="decision_making" value="analytical" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Menganalisis data dan fakta secara mendalam</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="decision_making" value="intuitive" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Mengikuti intuisi dan perasaan</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="decision_making" value="collaborative" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Bermusyawarah dengan orang lain</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="decision_making" value="quick" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Mengambil keputusan cepat berdasarkan pengalaman</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="text-gray-700 mb-4 font-medium">2. Dalam situasi sosial, Anda lebih suka:</p>
                            <div class="space-y-3">
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="social_preference" value="large_group" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Berinteraksi dalam kelompok besar</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="social_preference" value="small_group" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Bergaul dalam kelompok kecil</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="social_preference" value="one_on_one" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Berbicara empat mata</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="social_preference" value="alone" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Menghabiskan waktu sendiri</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="text-gray-700 mb-4 font-medium">3. Ketika menghadapi masalah, pendekatan Anda adalah:</p>
                            <div class="space-y-3">
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="problem_solving" value="systematic" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Memecah masalah secara sistematis</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="problem_solving" value="creative" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Mencari solusi kreatif dan unik</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="problem_solving" value="practical" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Fokus pada solusi praktis</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-blue-50 transition-colors cursor-pointer">
                                    <input type="radio" name="problem_solving" value="collaborative" class="mr-3 text-blue-600">
                                    <span class="text-gray-700">Bekerja sama dengan tim</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Interest Assessment -->
                <div class="bg-green-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Minat dan Hobi
                    </h3>
                    <div class="space-y-4">
                        <p class="text-gray-700 font-medium">Pilih bidang yang paling menarik bagi Anda (boleh lebih dari satu):</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="technology" class="mr-3 text-green-600">
                                <span class="text-gray-700">Teknologi & IT</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="business" class="mr-3 text-green-600">
                                <span class="text-gray-700">Bisnis & Kewirausahaan</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="arts" class="mr-3 text-green-600">
                                <span class="text-gray-700">Seni & Kreativitas</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="education" class="mr-3 text-green-600">
                                <span class="text-gray-700">Pendidikan & Pelatihan</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="agriculture" class="mr-3 text-green-600">
                                <span class="text-gray-700">Pertanian & Lingkungan</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="healthcare" class="mr-3 text-green-600">
                                <span class="text-gray-700">Kesehatan & Wellness</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="tourism" class="mr-3 text-green-600">
                                <span class="text-gray-700">Pariwisata & Budaya</span>
                            </label>
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-green-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="interests" value="social" class="mr-3 text-green-600">
                                <span class="text-gray-700">Sosial & Kemasyarakatan</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Goals Assessment -->
                <div class="bg-purple-50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                        Tujuan Karir
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Apa tujuan karir utama Anda dalam 5 tahun ke depan?</label>
                            <textarea id="career_goals" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors" placeholder="Jelaskan tujuan karir Anda..."></textarea>
                        </div>

                        <div>
                            <p class="text-gray-700 mb-4 font-medium">Lingkungan kerja yang Anda inginkan:</p>
                            <div class="space-y-3">
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-purple-50 transition-colors cursor-pointer">
                                    <input type="radio" name="work_environment" value="office" class="mr-3 text-purple-600">
                                    <span class="text-gray-700">Kantor dengan tim yang solid</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-purple-50 transition-colors cursor-pointer">
                                    <input type="radio" name="work_environment" value="remote" class="mr-3 text-purple-600">
                                    <span class="text-gray-700">Kerja jarak jauh (remote)</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-purple-50 transition-colors cursor-pointer">
                                    <input type="radio" name="work_environment" value="field" class="mr-3 text-purple-600">
                                    <span class="text-gray-700">Lapangan atau outdoor</span>
                                </label>
                                <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-purple-50 transition-colors cursor-pointer">
                                    <input type="radio" name="work_environment" value="entrepreneur" class="mr-3 text-purple-600">
                                    <span class="text-gray-700">Wirausaha mandiri</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-8">
                    <button type="submit" class="btn-primary text-white px-12 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center hover:scale-105 transition-transform">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Kirim Assessment
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Results Modal -->
<div id="resultsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-90vh overflow-y-auto">
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Hasil Assessment Anda</h3>
                <p class="text-gray-600">Berikut adalah analisis dan rekomendasi berdasarkan jawaban Anda</p>
            </div>

            <div id="resultsContent" class="space-y-6">
                <!-- Results will be populated by JavaScript -->
            </div>

            <div class="text-center mt-8">
                <button onclick="closeModal()" class="btn-primary text-white px-8 py-3 rounded-xl font-semibold mr-4">
                    Tutup
                </button>
                <a href="{{ route('lms') }}" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl font-semibold transition-colors">
                    Lihat Kursus Rekomendasi
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Form submission
    $('#assessmentForm').on('submit', function(e) {
        e.preventDefault();

        // Validate form
        if (!validateForm()) {
            return;
        }

        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...');
        submitBtn.prop('disabled', true);

        // Simulate processing time
        setTimeout(() => {
            generateResults();
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);
            $('#resultsModal').removeClass('hidden').addClass('flex');
        }, 2000);
    });

    // Smooth animations on scroll
    $(window).scroll(function() {
        $('.animate-on-scroll').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-slide-up opacity-100');
            }
        });
    });
});

function validateForm() {
    const requiredFields = ['#fullName', '#age', '#education', '#currentJob'];
    const requiredRadios = ['decision_making', 'social_preference', 'problem_solving', 'work_environment'];

    // Check required text fields
    for (let field of requiredFields) {
        if (!$(field).val().trim()) {
            alert('Mohon lengkapi semua field yang diperlukan.');
            $(field).focus();
            return false;
        }
    }

    // Check required radio buttons
    for (let radioName of requiredRadios) {
        if (!$(`input[name="${radioName}"]:checked`).length) {
            alert('Mohon jawab semua pertanyaan yang diperlukan.');
            $(`input[name="${radioName}"]`).first().focus();
            return false;
        }
    }

    // Check interests (at least one)
    if (!$('input[name="interests"]:checked').length) {
        alert('Mohon pilih minimal satu bidang minat.');
        $('input[name="interests"]').first().focus();
        return false;
    }

    // Check career goals
    if (!$('#career_goals').val().trim()) {
        alert('Mohon jelaskan tujuan karir Anda.');
        $('#career_goals').focus();
        return false;
    }

    return true;
}

function generateResults() {
    const formData = {
        name: $('#fullName').val(),
        age: $('#age').val(),
        education: $('#education').val(),
        currentJob: $('#currentJob').val(),
        decisionMaking: $('input[name="decision_making"]:checked').val(),
        socialPreference: $('input[name="social_preference"]:checked').val(),
        problemSolving: $('input[name="problem_solving"]:checked').val(),
        interests: $('input[name="interests"]:checked').map(function() { return this.value; }).get(),
        careerGoals: $('#career_goals').val(),
        workEnvironment: $('input[name="work_environment"]:checked').val()
    };

    // Generate personality type
    let personalityType = "Strategis";
    if (formData.decisionMaking === "intuitive" && formData.socialPreference === "large_group") {
        personalityType = "Inspiratif";
    } else if (formData.problemSolving === "creative" && formData.socialPreference === "small_group") {
        personalityType = "Kreatif";
    } else if (formData.decisionMaking === "analytical" && formData.problemSolving === "systematic") {
        personalityType = "Analitis";
    } else if (formData.socialPreference === "one_on_one" || formData.socialPreference === "alone") {
        personalityType = "Reflektif";
    }

    // Generate career recommendations based on interests
    const careerRecommendations = [];
    formData.interests.forEach(interest => {
        switch(interest) {
            case 'technology':
                careerRecommendations.push('Pengembang Website', 'Digital Marketing Specialist');
                break;
            case 'business':
                careerRecommendations.push('Konsultan UMKM', 'Manajer Bisnis Desa');
                break;
            case 'arts':
                careerRecommendations.push('Desainer Grafis', 'Content Creator');
                break;
            case 'education':
                careerRecommendations.push('Fasilitator Pelatihan', 'Guru/Instruktur');
                break;
            case 'agriculture':
                careerRecommendations.push('Ahli Pertanian Modern', 'Pengelola Agrowisata');
                break;
            case 'healthcare':
                careerRecommendations.push('Konselor Kesehatan', 'Koordinator Posyandu');
                break;
            case 'tourism':
                careerRecommendations.push('Pemandu Wisata', 'Pengelola Homestay');
                break;
            case 'social':
                careerRecommendations.push('Fasilitator Masyarakat', 'Koordinator Program Sosial');
                break;
        }
    });

    // Remove duplicates and limit to 3
    const uniqueRecommendations = [...new Set(careerRecommendations)].slice(0, 3);

    // Generate results HTML
    const resultsHTML = `
        <div class="bg-blue-50 rounded-xl p-6 mb-6">
            <h4 class="text-lg font-semibold text-blue-900 mb-3">Profil Kepribadian</h4>
            <div class="flex items-center">
                <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">${personalityType.charAt(0)}</span>
                </div>
                <div>
                    <p class="font-semibold text-gray-900">Tipe ${personalityType}</p>
                    <p class="text-gray-600 text-sm">Berdasarkan pola jawaban Anda</p>
                </div>
            </div>
        </div>

        <div class="bg-green-50 rounded-xl p-6 mb-6">
            <h4 class="text-lg font-semibold text-green-900 mb-3">Rekomendasi Karir</h4>
            <div class="space-y-3">
                ${uniqueRecommendations.map(career => `
                    <div class="flex items-center p-3 bg-white rounded-lg">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">${career}</span>
                    </div>
                `).join('')}
            </div>
        </div>

        <div class="bg-purple-50 rounded-xl p-6 mb-6">
            <h4 class="text-lg font-semibold text-purple-900 mb-3">Area Pengembangan</h4>
            <div class="space-y-2">
                <p class="text-gray-700">• Tingkatkan keterampilan ${formData.interests.includes('technology') ? 'digital' : 'komunikasi'}</p>
                <p class="text-gray-700">• Kembangkan kemampuan ${formData.problemSolving === 'systematic' ? 'analitis' : 'kreatif'}</p>
                <p class="text-gray-700">• Perkuat jaringan ${formData.socialPreference === 'large_group' ? 'profesional' : 'personal'}</p>
            </div>
        </div>

        <div class="bg-yellow-50 rounded-xl p-6">
            <h4 class="text-lg font-semibold text-yellow-900 mb-3">Langkah Selanjutnya</h4>
            <div class="space-y-2">
                <p class="text-gray-700">1. Ikuti kursus yang relevan di platform LMS kami</p>
                <p class="text-gray-700">2. Bergabung dengan komunitas sesuai minat Anda</p>
                <p class="text-gray-700">3. Konsultasi lebih lanjut dengan mentor karir</p>
            </div>
        </div>
    `;

    $('#resultsContent').html(resultsHTML);
}

function closeModal() {
    $('#resultsModal').addClass('hidden').removeClass('flex');
}
</script>
@endsection
