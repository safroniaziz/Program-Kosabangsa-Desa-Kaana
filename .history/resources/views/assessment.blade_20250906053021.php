@extends('layouts.app')

@section('title', 'Assessment Konseling Mandiri - Desa Kaana')

@section('content')
<!-- Custom CSS -->
<style>
.glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.step-active {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white;
}

.step-completed {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.step-inactive {
    background: #f1f5f9;
    color: #64748b;
}

.radio-option {
    background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.radio-option:hover {
    border-color: #3b82f6;
    background: linear-gradient(145deg, #f8fafc 0%, #e0f2fe 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
}

.radio-option.selected {
    border-color: #3b82f6;
    background: linear-gradient(145deg, #eff6ff 0%, #dbeafe 100%);
    box-shadow: 0 4px 20px rgba(59, 130, 246, 0.2);
}

.floating-element {
    animation: float 8s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    25% { transform: translateY(-10px) rotate(1deg); }
    50% { transform: translateY(-20px) rotate(0deg); }
    75% { transform: translateY(-10px) rotate(-1deg); }
}

.step-indicator {
    transition: all 0.3s ease;
}

.question-slide {
    display: none;
    opacity: 0;
    transform: translateX(30px);
    transition: all 0.4s ease;
}

.question-slide.active {
    display: block;
    opacity: 1;
    transform: translateX(0);
}

.navigation-sidebar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-right: 1px solid rgba(226, 232, 240, 0.3);
    height: calc(100vh - 64px);
    position: sticky;
    top: 64px;
}

.question-nav-item {
    transition: all 0.2s ease;
    cursor: pointer;
}

.question-nav-item:hover {
    background: rgba(59, 130, 246, 0.1);
    transform: translateX(4px);
}

.question-nav-item.completed {
    background: rgba(16, 185, 129, 0.1);
    border-left: 3px solid #10b981;
}

.question-nav-item.active {
    background: rgba(59, 130, 246, 0.1);
    border-left: 3px solid #3b82f6;
}
</style>

<!-- Hero Section - Compact Version -->
<section class="relative py-20 overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900">
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

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Badge -->
            <div data-aos="fade-up" data-aos-delay="100" class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md rounded-full px-6 py-3 mb-8">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm font-medium text-white">Assessment Konseling Mandiri</span>
            </div>

            <!-- Title -->
            <h1 data-aos="fade-up" data-aos-delay="200" class="text-4xl md:text-6xl font-black text-white mb-6">
                Assessment
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">
                    Kesiapan Mental
                </span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="300" class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Evaluasi komprehensif kesiapan mental Anda dalam menghadapi situasi darurat dan bencana
            </p>
        </div>
    </div>
</section>

<!-- Assessment Wizard Section -->
<section class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50 relative min-h-screen">
    <!-- Background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200/30 to-purple-300/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-pink-200/30 to-orange-300/30 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-7xl">
        <!-- User Info Card -->
        <div class="mb-8" data-aos="fade-up">
            <div class="glass-card rounded-2xl p-6 max-w-md mx-auto lg:max-w-none">
                <div class="flex items-center justify-center lg:justify-start">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-center lg:text-left">
                        <h3 class="text-xl font-semibold text-gray-900">Ahmad Wijaya</h3>
                        <p class="text-gray-600">32 tahun • Kepala Keluarga</p>
                        <p class="text-gray-500 text-sm">Desa Kaana, Kecamatan Tombatu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assessment Layout -->
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Navigation Sidebar -->
            <div class="lg:col-span-1">
                <div class="navigation-sidebar rounded-2xl p-6 shadow-xl">
                    <!-- Progress Overview -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Progress Assessment</h3>
                        <div class="space-y-4">
                            <!-- Overall Progress -->
                            <div>
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>Keseluruhan</span>
                                    <span id="overall-progress">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div id="overall-progress-bar" class="bg-gradient-to-r from-blue-600 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <!-- Section Progress -->
                            <div>
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>Bagian Saat Ini</span>
                                    <span id="section-progress">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div id="section-progress-bar" class="bg-gradient-to-r from-emerald-500 to-green-500 h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Navigation -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Bagian Assessment</h4>
                        <div class="space-y-2" id="section-nav">
                            <!-- Will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Quick Navigation -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Navigasi Cepat</h4>
                        <div class="space-y-1" id="question-nav">
                            <!-- Will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Assessment Area -->
            <div class="lg:col-span-3">
                <form id="assessmentForm">
                    <!-- Question Container -->
                    <div id="question-container" class="glass-card rounded-3xl p-8 shadow-xl min-h-[600px] relative">
                        <!-- Question slides will be inserted here -->
                    </div>

                    <!-- Navigation Controls -->
                    <div class="flex justify-between items-center mt-8">
                        <button type="button" id="prev-btn" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Sebelumnya
                        </button>

                        <!-- Question Counter -->
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Pertanyaan</span>
                            <span id="current-question" class="text-lg font-bold text-blue-600">1</span>
                            <span class="text-sm text-gray-600">dari</span>
                            <span id="total-questions" class="text-lg font-bold text-gray-900">20</span>
                        </div>

                        <button type="button" id="next-btn" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                            Selanjutnya
                            <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <button type="submit" id="submit-btn" class="hidden px-8 py-3 bg-gradient-to-r from-emerald-600 to-green-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            Lihat Hasil
                        </button>
                    </div>

                    <!-- Save Progress Button -->
                    <div class="text-center mt-6">
                        <button type="button" id="save-progress" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-lg font-medium hover:bg-gray-200 transition-colors text-sm">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Simpan Progress
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Results Modal -->
<div id="resultsModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50 overflow-y-auto">
    <div class="min-h-screen px-4 flex items-center justify-center py-8">
        <div class="bg-white rounded-3xl max-w-3xl w-full p-8 shadow-2xl transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
            <!-- Results will be populated by JavaScript -->
        </div>
    </div>
</div>

<!-- Professional CTA Section -->
<section class="py-20 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
    <!-- ...existing CTA content... -->
</section>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Assessment Data Structure
    const assessmentData = {
        sections: [
            {
                id: 1,
                title: "Reaksi Emosional",
                description: "Evaluasi respons emosional terhadap situasi darurat",
                questions: [
                    {
                        id: 1,
                        text: "Bagaimana perasaan Anda ketika mendengar peringatan bencana?",
                        options: [
                            { value: 3, text: "Tenang dan siap menghadapi situasi", desc: "Saya memiliki rencana yang jelas dan merasa percaya diri" },
                            { value: 2, text: "Sedikit cemas tapi masih terkontrol", desc: "Ada kekhawatiran namun masih bisa berpikir jernih" },
                            { value: 1, text: "Sangat panik dan tidak tahu harus berbuat apa", desc: "Merasa kewalahan dan kesulitan mengambil keputusan" }
                        ]
                    },
                    {
                        id: 2,
                        text: "Bagaimana Anda mengelola stress dalam situasi darurat?",
                        options: [
                            { value: 3, text: "Memiliki teknik relaksasi yang efektif", desc: "Menguasai teknik pernapasan, meditasi, atau cara lain untuk tetap tenang" },
                            { value: 2, text: "Berusaha tetap tenang meski sulit", desc: "Masih bisa mengontrol diri dengan usaha keras" },
                            { value: 1, text: "Mudah panik dan kehilangan kontrol", desc: "Sulit mengelola emosi dan stress saat situasi darurat" }
                        ]
                    },
                    {
                        id: 3,
                        text: "Seberapa percaya diri Anda dalam mengambil keputusan cepat saat darurat?",
                        options: [
                            { value: 3, text: "Sangat percaya diri", desc: "Dapat mengambil keputusan dengan cepat dan tepat" },
                            { value: 2, text: "Cukup percaya diri", desc: "Kadang ragu tapi masih bisa memutuskan" },
                            { value: 1, text: "Tidak percaya diri", desc: "Sering bingung dan sulit memutuskan" }
                        ]
                    }
                ]
            },
            {
                id: 2,
                title: "Persiapan Fisik",
                description: "Evaluasi kesiapan peralatan dan rencana fisik",
                questions: [
                    {
                        id: 4,
                        text: "Apakah Anda memiliki rencana evakuasi keluarga?",
                        options: [
                            { value: 3, text: "Ya, lengkap dengan jalur dan titik kumpul", desc: "Rencana detail dengan lokasi berkumpul yang disepakati keluarga" },
                            { value: 2, text: "Ada rencana sederhana", desc: "Sudah dibahas tapi belum detail dan lengkap" },
                            { value: 1, text: "Belum memiliki rencana", desc: "Belum pernah membahas rencana evakuasi dengan keluarga" }
                        ]
                    },
                    {
                        id: 5,
                        text: "Apakah Anda memiliki tas siaga bencana?",
                        options: [
                            { value: 3, text: "Ya, lengkap dan siap digunakan", desc: "Tas berisi makanan, air, obat-obatan, dokumen penting, dan perlengkapan darurat" },
                            { value: 2, text: "Ada beberapa perlengkapan darurat", desc: "Sudah menyiapkan sebagian tapi belum lengkap dan terorganisir" },
                            { value: 1, text: "Belum memiliki persiapan", desc: "Belum menyiapkan tas darurat atau perlengkapan khusus" }
                        ]
                    }
                ]
            },
            {
                id: 3,
                title: "Pengetahuan & Keterampilan",
                description: "Evaluasi pengetahuan dan pengalaman terkait bencana",
                questions: [
                    {
                        id: 6,
                        text: "Seberapa sering Anda mengikuti simulasi tanggap bencana?",
                        options: [
                            { value: 3, text: "Rutin mengikuti setiap ada kesempatan", desc: "Aktif berpartisipasi dalam pelatihan dan simulasi di desa/kelurahan" },
                            { value: 2, text: "Pernah beberapa kali", desc: "Sudah pernah ikut serta namun tidak rutin" },
                            { value: 1, text: "Belum pernah mengikuti", desc: "Belum pernah berpartisipasi dalam pelatihan tanggap bencana" }
                        ]
                    },
                    {
                        id: 7,
                        text: "Seberapa baik pengetahuan Anda tentang tanda-tanda bencana alam di daerah Anda?",
                        options: [
                            { value: 3, text: "Sangat baik, mengetahui semua tanda", desc: "Familiar dengan berbagai indikator dan peringatan dini" },
                            { value: 2, text: "Cukup baik, tahu beberapa tanda", desc: "Mengetahui tanda-tanda umum tapi belum detail" },
                            { value: 1, text: "Kurang baik, tidak tahu banyak", desc: "Pengetahuan terbatas tentang tanda-tanda bencana" }
                        ]
                    }
                ]
            }
        ]
    };

    // Application State
    let currentSection = 0;
    let currentQuestion = 0;
    let answers = {};
    let totalQuestions = 0;

    // Calculate total questions
    assessmentData.sections.forEach(section => {
        totalQuestions += section.questions.length;
    });

    // Initialize Assessment
    function initializeAssessment() {
        $('#total-questions').text(totalQuestions);
        buildNavigation();
        renderCurrentQuestion();
        updateProgress();
        loadSavedProgress();
    }

    // Build Navigation Sidebar
    function buildNavigation() {
        // Build section navigation
        const sectionNav = $('#section-nav');
        assessmentData.sections.forEach((section, index) => {
            const sectionItem = $(`
                <div class="section-nav-item p-3 rounded-lg cursor-pointer transition-all duration-200 ${index === 0 ? 'bg-blue-50 border-l-3 border-blue-500' : 'hover:bg-gray-50'}" data-section="${index}">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 ${index === 0 ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'}">
                            ${index + 1}
                        </div>
                        <div>
                            <div class="font-medium text-sm text-gray-900">${section.title}</div>
                            <div class="text-xs text-gray-600">${section.questions.length} pertanyaan</div>
                        </div>
                    </div>
                </div>
            `);
            sectionNav.append(sectionItem);
        });

        // Build question navigation
        const questionNav = $('#question-nav');
        let questionIndex = 1;
        assessmentData.sections.forEach((section, sectionIndex) => {
            section.questions.forEach((question, qIndex) => {
                const questionItem = $(`
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Cetak Hasil
                    </button>
                    <button onclick="location.reload()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
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

    // Close modal when clicking outside
    $('#resultsModal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
        }
    });

    // Keyboard navigation
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && !$('#resultsModal').hasClass('hidden')) {
            $('#resultsModal').addClass('hidden');
        }
    });
});
</script>
@endsection
