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
                        <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Usia</label>
                        <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white" required>
                            <option value="">Pilih rentang usia</option>
                            <option value="<18">Dibawah 18 tahun</option>
                            <option value="18-25">18-25 tahun</option>
                            <option value="26-35">26-35 tahun</option>
                            <option value="36-45">36-45 tahun</option>
                            <option value="46-55">46-55 tahun</option>
                            <option value=">55">Diatas 55 tahun</option>
                        </select>
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
                    <div>
                        <p class="text-gray-700 font-medium mb-4">1. Bagaimana perasaan Anda ketika mendengar peringatan bencana?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q1" value="3" class="mr-3 text-blue-600" required>
                                <span>Tenang dan siap menghadapi situasi</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q1" value="2" class="mr-3 text-blue-600">
                                <span>Sedikit cemas tapi masih terkontrol</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q1" value="1" class="mr-3 text-blue-600">
                                <span>Sangat panik dan tidak tahu harus berbuat apa</span>
                            </label>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div>
                        <p class="text-gray-700 font-medium mb-4">2. Apakah Anda memiliki rencana evakuasi keluarga?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q2" value="3" class="mr-3 text-blue-600" required>
                                <span>Ya, lengkap dengan jalur dan titik kumpul</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q2" value="2" class="mr-3 text-blue-600">
                                <span>Ada rencana sederhana</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q2" value="1" class="mr-3 text-blue-600">
                                <span>Belum memiliki rencana</span>
                            </label>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div>
                        <p class="text-gray-700 font-medium mb-4">3. Bagaimana Anda mengelola stress dalam situasi darurat?</p>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q3" value="3" class="mr-3 text-blue-600" required>
                                <span>Memiliki teknik relaksasi yang efektif</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q3" value="2" class="mr-3 text-blue-600">
                                <span>Berusaha tetap tenang meski sulit</span>
                            </label>
                            <label class="flex items-center p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <input type="radio" name="q3" value="1" class="mr-3 text-blue-600">
                                <span>Mudah panik dan kehilangan kontrol</span>
                            </label>
                        </div>
                    </div>

                    <!-- More questions can be added here -->
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <button type="submit" class="group relative px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold text-lg overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="relative z-10 flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        Lihat Hasil Assessment
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
    // Form submission
    $('#disasterAssessmentForm').on('submit', function(e) {
        e.preventDefault();

        // Calculate score
        let totalScore = 0;
        let questionCount = 0;

        $(this).find('input[type="radio"]:checked').each(function() {
            totalScore += parseInt($(this).val());
            questionCount++;
        });

        const averageScore = totalScore / questionCount;

        // Show results
        showResults(averageScore);
    });

    function showResults(score) {
        let status, statusClass, statusIcon, recommendation;

        if (score >= 2.5) {
            status = 'AMAN';
            statusClass = 'bg-green-500';
            statusIcon = '✓';
            recommendation = 'Mental Anda dalam kondisi baik dan siap menghadapi situasi darurat. Tetap pertahankan kesiapan ini dengan latihan rutin.';
        } else if (score >= 1.5) {
            status = 'WASPADA';
            statusClass = 'bg-yellow-500';
            statusIcon = '!';
            recommendation = 'Anda perlu meningkatkan kesiapan mental. Ikuti pelatihan tanggap darurat dan konsultasi dengan konselor jika diperlukan.';
        } else {
            status = 'KRITIS';
            statusClass = 'bg-red-500';
            statusIcon = '✕';
            recommendation = 'Segera hubungi konselor profesional untuk mendapatkan bantuan. Kondisi mental Anda memerlukan perhatian khusus.';
        }

        const resultsHTML = `
            <div class="text-center">
                <div class="${statusClass} w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-4xl font-bold">
                    ${statusIcon}
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">Status Mental: ${status}</h3>
                <div class="w-full bg-gray-200 rounded-full h-4 mb-6">
                    <div class="${statusClass} h-4 rounded-full transition-all duration-1000" style="width: ${(score/3)*100}%"></div>
                </div>
                <p class="text-gray-600 mb-8">${recommendation}</p>

                ${score < 2.5 ? `
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-6">
                        <h4 class="font-semibold text-blue-900 mb-3">Konseling Virtual Tersedia</h4>
                        <p class="text-blue-700 mb-4">Tim konselor profesional kami siap membantu Anda</p>
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Mulai Chat Konseling
                        </button>
                    </div>
                ` : ''}

                <div class="flex gap-4 justify-center">
                    <button onclick="location.reload()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        Ulangi Assessment
                    </button>
                    <button onclick="$('#resultsModal').addClass('hidden')" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all">
                        Selesai
                    </button>
                </div>
            </div>
        `;

        $('#modalContent').html(resultsHTML);
        $('#resultsModal').removeClass('hidden');

        // Animate modal
        setTimeout(() => {
            $('#modalContent').removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
        }, 100);
    }
});
</script>
@endsection
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
