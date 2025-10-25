@extends('layouts.app')

@section('title', 'Assessment Konseling Mandiri - Desa Kaana')

@section('styles')
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
    display: flex;
    align-items: flex-start;
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
    overflow-y: auto;
}

.question-nav-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    border: 2px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.question-nav-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.3s ease;
}

.question-nav-item:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
    border-color: #3b82f6;
    color: #3b82f6;
    background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
}

.question-nav-item:hover::before {
    left: 100%;
}

.question-nav-item.completed {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border-color: #10b981;
    color: white;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    transform: scale(1.1);
}

.question-nav-item.completed:hover {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
}

.question-nav-item.active {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-color: #3b82f6;
    color: white;
    box-shadow: 0 4px 20px rgba(59, 130, 246, 0.5);
    animation: pulse-blue 2s infinite;
    transform: scale(1.15);
}

.question-nav-item.active:hover {
    background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 16px rgba(59, 130, 246, 0.4);
}

@keyframes pulse-blue {
    0%, 100% {
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    }
    50% {
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.5);
    }
}

.question-nav-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 8px;
    padding: 12px;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 16px;
    border: 1px solid #e2e8f0;
}

@media (max-width: 1280px) {
    .question-nav-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 6px;
        padding: 10px;
    }

    .question-nav-item {
        width: 36px;
        height: 36px;
        font-size: 13px;
    }
}

@media (max-width: 1024px) {
    .question-nav-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 6px;
        padding: 8px;
    }

    .question-nav-item {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }
}

@media (max-width: 768px) {
    .navigation-sidebar {
        height: auto;
        position: relative;
        top: 0;
    }
}

/* Radio button fix */
.radio-option input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.radio-option .radio-circle {
    position: relative;
    width: 24px;
    height: 24px;
    border: 2px solid #e5e7eb;
    border-radius: 50%;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
}

.radio-option input[type="radio"]:checked ~ .radio-circle {
    border-color: #3b82f6;
    background-color: #3b82f6;
}

.radio-option input[type="radio"]:checked ~ .radio-circle::after {
    content: '';
    width: 8px;
    height: 8px;
    background-color: white;
    border-radius: 50%;
}

.radio-option:hover .radio-circle {
    border-color: #3b82f6;
}

.navigation-sidebar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-right: 1px solid rgba(226, 232, 240, 0.3);
    height: calc(100vh - 64px);
    position: sticky;
    top: 64px;
    overflow-y: auto;
}

/* Results Modal Styles */
.result-card {
    background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.status-indicator {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.status-indicator::before {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 50%;
    padding: 2px;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.5), transparent);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
    animation: rotate 3s linear infinite;
}

@keyframes rotate {
    to { transform: rotate(360deg); }
}

.status-aman {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.status-waspada {
    background: linear-gradient(135deg, #f59e0b 0%, #dc2626 100%);
    color: white;
}

.status-kritis {
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    color: white;
}

.recommendation-card {
    background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
    border: 1px solid #bfdbfe;
    border-radius: 16px;
    padding: 24px;
    margin-top: 24px;
}
</style>
@endsection

@section('content')
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
                <div class="navigation-sidebar rounded-2xl p-4 lg:p-5 shadow-xl">
                    <!-- Progress Overview -->
                    <div class="mb-5">
                        <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-3">Progress Assessment</h3>
                        <div class="space-y-3">
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-3 border border-blue-200">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs lg:text-sm font-medium text-blue-800">Keseluruhan</span>
                                    <span id="overall-progress" class="text-xs lg:text-sm font-bold text-blue-600">0%</span>
                                </div>
                                <div class="w-full bg-blue-200 rounded-full h-2">
                                    <div id="overall-progress-bar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-3 border border-green-200">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs lg:text-sm font-medium text-green-800">Bagian Saat Ini</span>
                                    <span id="section-progress" class="text-xs lg:text-sm font-bold text-green-600">0%</span>
                                </div>
                                <div class="w-full bg-green-200 rounded-full h-2">
                                    <div id="section-progress-bar" class="bg-green-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Navigation -->
                    <div class="mb-5">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Bagian Assessment</h4>
                        <div class="space-y-2" id="section-nav">
                            <!-- Section items will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Quick Navigation with Grid -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-sm font-semibold text-gray-700">Navigasi Cepat</h4>
                            <span class="text-xs text-gray-500 hidden lg:inline">
                                <span id="current-question">1</span>/<span id="total-questions">7</span>
                            </span>
                        </div>
                        <div class="question-nav-grid" id="question-nav">
                            <!-- Question navigation items will be populated by JavaScript -->
                        </div>

                        <!-- Enhanced Navigation Stats -->
                        <div class="mt-4 p-3 bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl border border-gray-200">
                            <div class="grid grid-cols-2 gap-3 text-xs">
                                <div class="text-center">
                                    <div class="text-sm lg:text-base font-bold text-green-600" id="answered-count">0</div>
                                    <div class="text-gray-600 text-xs">Dijawab</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-sm lg:text-base font-bold text-orange-600" id="remaining-count">7</div>
                                    <div class="text-gray-600 text-xs">Tersisa</div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <div class="text-xs font-medium text-gray-700">
                                    Progress: <span id="nav-progress-percent" class="font-bold text-blue-600">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                    <div id="nav-progress-bar" class="bg-blue-600 h-1.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                            </div>
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
                            <div class="bg-white rounded-full px-4 py-2 shadow-md border border-gray-200">
                                <span class="text-sm font-medium text-gray-600">
                                    Pertanyaan <span id="current-question-2">1</span> dari <span id="total-questions-2">7</span>
                                </span>
                            </div>
                        </div>

                        <button type="button" id="next-btn" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                            Selanjutnya
                            <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <button type="submit" id="submit-btn" class="hidden px-8 py-3 bg-gradient-to-r from-emerald-600 to-green-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Selesaikan Assessment
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


<!-- Chat Konseling Sidebar -->
<div id="chatConseling" class="fixed top-0 right-0 h-full w-96 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50 border-l border-gray-200">
    <!-- Chat Header -->
    <div class="bg-gradient-to-r from-orange-500 to-red-500 p-4 text-white">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold">Konseling Professional</h3>
                    <p class="text-sm opacity-90">Dr. Sarah Wijaya, M.Psi</p>
                </div>
            </div>
            <button onclick="closeChatConseling()" class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Online Status -->
        <div class="flex items-center mt-2">
            <div class="w-3 h-3 bg-green-400 rounded-full mr-2 animate-pulse"></div>
            <span class="text-sm">Online - Siap Membantu</span>
        </div>
    </div>

    <!-- Chat Messages Area -->
    <div id="chatMessages" class="flex-1 overflow-y-auto p-4 bg-gray-50" style="height: calc(100vh - 280px);">
        <!-- Welcome Message -->
        <div class="mb-4">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <div class="bg-white rounded-2xl rounded-tl-sm p-4 shadow-sm max-w-xs">
                        <p class="text-sm text-gray-800">Halo! Saya Dr. Sarah, konselor profesional. Saya melihat hasil assessment Anda dan siap membantu. Bagaimana perasaan Anda saat ini?</p>
                        <span class="text-xs text-gray-500 mt-2 block">Baru saja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Response Buttons -->
    <div class="p-4 bg-gray-100 border-t">
        <p class="text-xs text-gray-600 mb-3">Respon Cepat:</p>
        <div class="space-y-2">
            <button onclick="sendQuickMessage('Saya merasa cemas dan butuh bantuan')" class="w-full text-left p-3 bg-white rounded-lg text-sm hover:bg-blue-50 transition-colors border border-gray-200">
                😰 Saya merasa cemas dan butuh bantuan
            </button>
            <button onclick="sendQuickMessage('Bagaimana cara mengelola stress?')" class="w-full text-left p-3 bg-white rounded-lg text-sm hover:bg-blue-50 transition-colors border border-gray-200">
                🧘 Bagaimana cara mengelola stress?
            </button>
            <button onclick="sendQuickMessage('Saya ingin konsultasi lebih lanjut')" class="w-full text-left p-3 bg-white rounded-lg text-sm hover:bg-blue-50 transition-colors border border-gray-200">
                💬 Saya ingin konsultasi lebih lanjut
            </button>
        </div>
    </div>

    <!-- Chat Input -->
    <div class="p-4 bg-white border-t">
        <div class="flex items-center space-x-2">
            <input type="text" id="chatInput" placeholder="Ketik pesan Anda..." class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            <button onclick="sendMessage()" class="p-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:from-orange-600 hover:to-red-600 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </div>
        <p class="text-xs text-gray-500 mt-2">Tekan Enter untuk mengirim pesan</p>
    </div>
</div>

<!-- Chat Overlay -->
<div id="chatOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="closeChatConseling()"></div>

<!-- Floating Chat Button -->
<div id="floatingChatBtn" class="fixed bottom-6 right-6 z-50 opacity-0 transition-opacity duration-500">
    <button onclick="openChatConseling()" class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-110 transition-all duration-300 flex items-center justify-center group relative">
        <svg class="w-8 h-8 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>

        <!-- Notification Badge -->
        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
            <span class="text-xs font-bold text-white">!</span>
        </div>

        <!-- Pulse Animation -->
        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-orange-500 to-red-500 animate-ping opacity-20"></div>

        <!-- Tooltip -->
        <div class="absolute bottom-20 right-0 bg-gray-900 text-white text-sm rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
            Chat dengan Konselor Profesional
            <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
        </div>
    </button>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            { value: 3, text: "Tenang dan siap bertindak", description: "Saya merasa terkendali dan tahu apa yang harus dilakukan" },
                            { value: 2, text: "Sedikit cemas tapi masih bisa berpikir jernih", description: "Ada kekhawatiran namun masih bisa mengambil keputusan" },
                            { value: 1, text: "Panik dan bingung", description: "Merasa kewalahan dan tidak tahu harus berbuat apa" }
                        ]
                    },
                    {
                        id: 2,
                        text: "Bagaimana Anda mengelola stress dalam situasi darurat?",
                        options: [
                            { value: 3, text: "Menggunakan teknik pernapasan dan tetap fokus", description: "Saya memiliki strategi khusus untuk menenangkan diri" },
                            { value: 2, text: "Berusaha tetap tenang meski kadang terbawa emosi", description: "Mencoba mengendalikan diri dengan berbagai cara" },
                            { value: 1, text: "Sulit mengendalikan stress dan emosi", description: "Merasa terbawa arus dan sulit menenangkan diri" }
                        ]
                    },
                    {
                        id: 3,
                        text: "Seberapa percaya diri Anda dalam mengambil keputusan cepat saat darurat?",
                        options: [
                            { value: 3, text: "Sangat percaya diri dan tegas", description: "Saya bisa mengambil keputusan dengan cepat dan yakin" },
                            { value: 2, text: "Cukup percaya diri dengan sedikit ragu", description: "Bisa memutuskan tapi kadang masih mempertimbangkan ulang" },
                            { value: 1, text: "Tidak percaya diri dan sering ragu", description: "Sulit memutuskan dan takut salah langkah" }
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
                            { value: 3, text: "Ya, sudah direncanakan dan dipraktikkan", description: "Keluarga tahu persis apa yang harus dilakukan dan ke mana harus pergi" },
                            { value: 2, text: "Ada rencana tapi belum pernah dipraktikkan", description: "Sudah ada rencana tertulis namun belum diuji coba" },
                            { value: 1, text: "Belum ada rencana sama sekali", description: "Belum memikirkan rencana evakuasi secara serius" }
                        ]
                    },
                    {
                        id: 5,
                        text: "Apakah Anda memiliki tas siaga bencana?",
                        options: [
                            { value: 3, text: "Ya, lengkap dan selalu siap", description: "Tas berisi semua kebutuhan darurat dan mudah dijangkau" },
                            { value: 2, text: "Ada tapi belum lengkap", description: "Sudah ada persiapan namun masih perlu dilengkapi" },
                            { value: 1, text: "Belum ada persiapan", description: "Belum menyiapkan tas atau peralatan darurat" }
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
                            { value: 3, text: "Rutin mengikuti dan aktif berpartisipasi", description: "Selalu hadir dalam simulasi dan pelatihan kebencanaan" },
                            { value: 2, text: "Kadang-kadang ikut jika ada kesempatan", description: "Sesekali ikut serta dalam kegiatan simulasi" },
                            { value: 1, text: "Jarang atau tidak pernah", description: "Belum pernah atau sangat jarang mengikuti simulasi" }
                        ]
                    },
                    {
                        id: 7,
                        text: "Seberapa baik pengetahuan Anda tentang tanda-tanda bencana alam di daerah Anda?",
                        options: [
                            { value: 3, text: "Sangat paham dan selalu waspada", description: "Mengetahui dengan detail tanda-tanda bahaya di sekitar" },
                            { value: 2, text: "Cukup tahu tapi tidak detail", description: "Tahu secara umum namun tidak begitu detail" },
                            { value: 1, text: "Kurang tahu atau tidak paham", description: "Tidak terlalu memahami tanda-tanda bahaya alam" }
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
        $('#total-questions-2').text(totalQuestions);
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
                            <div class="text-xs text-gray-500">${section.questions.length} pertanyaan</div>
                        </div>
                    </div>
                </div>
            `);
            sectionNav.append(sectionItem);
        });

        // Build question navigation grid
        const questionNav = $('#question-nav');
        let questionIndex = 1;
        assessmentData.sections.forEach((section, sectionIndex) => {
            section.questions.forEach((question, qIndex) => {
                const questionItem = $(`
                    <div class="question-nav-item ${questionIndex === 1 ? 'active' : ''}"
                         data-section="${sectionIndex}"
                         data-question="${qIndex}"
                         title="Pertanyaan ${questionIndex}: ${question.text.substring(0, 50)}...">
                        ${questionIndex}
                    </div>
                `);
                questionNav.append(questionItem);
                questionIndex++;
            });
        });

        // Update navigation stats
        updateNavigationStats();
    }

    // Update Navigation Stats
    function updateNavigationStats() {
        const answeredCount = Object.keys(answers).length;
        const remainingCount = totalQuestions - answeredCount;
        const progressPercent = Math.round((answeredCount / totalQuestions) * 100);

        $('#answered-count').text(answeredCount);
        $('#remaining-count').text(remainingCount);
        $('#nav-progress-percent').text(progressPercent + '%');
        $('#nav-progress-bar').css('width', progressPercent + '%');
    }

    // Update Navigation States
    function updateNavigationStates() {
        // Update section navigation
        $('.section-nav-item').each(function() {
            const sectionIndex = $(this).data('section');
            const section = assessmentData.sections[sectionIndex];
            const sectionAnswered = section.questions.filter(q => answers[q.id]).length;
            const isCompleted = sectionAnswered === section.questions.length;
            const isActive = sectionIndex === currentSection;

            $(this).removeClass('bg-blue-50 border-l-3 border-blue-500 bg-green-50 border-green-500');
            $(this).find('.w-8').removeClass('bg-blue-500 bg-green-500 bg-gray-200 text-white text-gray-600');

            if (isCompleted) {
                $(this).addClass('bg-green-50 border-l-3 border-green-500');
                $(this).find('.w-8').addClass('bg-green-500 text-white');
            } else if (isActive) {
                $(this).addClass('bg-blue-50 border-l-3 border-blue-500');
                $(this).find('.w-8').addClass('bg-blue-500 text-white');
            } else {
                $(this).find('.w-8').addClass('bg-gray-200 text-gray-600');
            }
        });

        // Update question navigation grid
        $('.question-nav-item').each(function() {
            const sectionIndex = $(this).data('section');
            const questionIndex = $(this).data('question');
            const question = assessmentData.sections[sectionIndex].questions[questionIndex];
            const isAnswered = answers[question.id];
            const isActive = sectionIndex === currentSection && questionIndex === currentQuestion;

            $(this).removeClass('active completed');

            if (isAnswered) {
                $(this).addClass('completed');
            } else if (isActive) {
                $(this).addClass('active');
            }
        });

        // Update navigation stats
        updateNavigationStats();
    }

    // Update Progress
    function updateProgress() {
        const answeredQuestions = Object.keys(answers).length;
        const overallProgress = Math.round((answeredQuestions / totalQuestions) * 100);

        $('#overall-progress').text(overallProgress + '%');
        $('#overall-progress-bar').css('width', overallProgress + '%');

        // Section progress
        const currentSectionAnswered = assessmentData.sections[currentSection].questions.filter(q => answers[q.id]).length;
        const sectionProgress = Math.round((currentSectionAnswered / assessmentData.sections[currentSection].questions.length) * 100);

        $('#section-progress').text(sectionProgress + '%');
        $('#section-progress-bar').css('width', sectionProgress + '%');

        // Update navigation items
        updateNavigationStates();
    }

    // Render Current Question
    function renderCurrentQuestion() {
        const section = assessmentData.sections[currentSection];
        const question = section.questions[currentQuestion];
        const questionNumber = getGlobalQuestionNumber();

        const questionHTML = `
            <div class="question-slide active">
                <!-- Section Badge -->
                <div class="flex items-center justify-between mb-6">
                    <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                        <span>${section.title}</span>
                        <span class="text-blue-600">•</span>
                        <span>${currentQuestion + 1}/${section.questions.length}</span>
                    </div>
                    <div class="text-sm text-gray-500">
                        Pertanyaan ${questionNumber} dari ${totalQuestions}
                    </div>
                </div>

                <!-- Question -->
                <div class="mb-8">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                        ${question.text}
                    </h2>
                    <p class="text-gray-600">${section.description}</p>
                </div>

                <!-- Options -->
                <div class="space-y-4" id="options-container">
                    ${question.options.map((option, index) => `
                        <label class="radio-option p-6 rounded-2xl cursor-pointer group relative">
                            <input type="radio" name="q${question.id}" value="${option.value}">
                            <div class="radio-circle"></div>
                            <div class="flex-1 ml-4">
                                <span class="text-lg font-medium text-gray-800 block mb-1">${option.text}</span>
                                <p class="text-gray-600 text-sm leading-relaxed">${option.description}</p>
                            </div>
                            <div class="text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity ml-4 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </label>
                    `).join('')}
                </div>

                <!-- Question Help -->
                <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-200">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm text-blue-800 font-medium mb-1">Tips Menjawab</p>
                            <p class="text-sm text-blue-700">Pilih jawaban yang paling menggambarkan kondisi Anda saat ini. Tidak ada jawaban benar atau salah.</p>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#question-container').html(questionHTML);

        // Restore previous answer if exists
        const savedAnswer = answers[question.id];
        if (savedAnswer) {
            $(`input[name="q${question.id}"][value="${savedAnswer}"]`).prop('checked', true);
            $(`input[name="q${question.id}"][value="${savedAnswer}"]`).closest('.radio-option').addClass('selected');
        }

        updateNavigationButtons();
        updateQuestionCounter();
    }

    // Get Global Question Number
    function getGlobalQuestionNumber() {
        let questionNum = 1;
        for (let i = 0; i < currentSection; i++) {
            questionNum += assessmentData.sections[i].questions.length;
        }
        return questionNum + currentQuestion;
    }

    // Update Navigation Buttons
    function updateNavigationButtons() {
        // Previous button
        const isFirstQuestion = currentSection === 0 && currentQuestion === 0;
        $('#prev-btn').prop('disabled', isFirstQuestion);

        // Next/Submit button
        const isLastQuestion = currentSection === assessmentData.sections.length - 1 &&
                              currentQuestion === assessmentData.sections[currentSection].questions.length - 1;

        if (isLastQuestion) {
            $('#next-btn').hide();
            $('#submit-btn').show();
        } else {
            $('#next-btn').show();
            $('#submit-btn').hide();
        }
    }

    // Update Question Counter
    function updateQuestionCounter() {
        const questionNumber = getGlobalQuestionNumber();
        $('#current-question').text(questionNumber);
        $('#current-question-2').text(questionNumber);
    }

    // Navigation Functions
    function goToNext() {
        const currentQuestionObj = assessmentData.sections[currentSection].questions[currentQuestion];
        const isAnswered = answers[currentQuestionObj.id];

        if (!isAnswered) {
            showNotification('Mohon jawab pertanyaan ini sebelum melanjutkan', 'warning');
            return;
        }

        if (currentQuestion < assessmentData.sections[currentSection].questions.length - 1) {
            currentQuestion++;
        } else if (currentSection < assessmentData.sections.length - 1) {
            currentSection++;
            currentQuestion = 0;
        }

        renderCurrentQuestion();
        updateProgress();
    }

    function goToPrevious() {
        if (currentQuestion > 0) {
            currentQuestion--;
        } else if (currentSection > 0) {
            currentSection--;
            currentQuestion = assessmentData.sections[currentSection].questions.length - 1;
        }

        renderCurrentQuestion();
        updateProgress();
    }

    // Jump to specific question
    function jumpToQuestion(sectionIndex, questionIndex) {
        currentSection = sectionIndex;
        currentQuestion = questionIndex;
        renderCurrentQuestion();
        updateProgress();

        // Use native scrollTo instead of jQuery animate
        const questionContainer = document.getElementById('question-container');
        if (questionContainer) {
            const offsetTop = questionContainer.offsetTop - 100;
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    }

    // Save Progress - Auto save functionality
    function saveProgress() {
        const progressData = {
            currentSection,
            currentQuestion,
            answers,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('assessmentProgress', JSON.stringify(progressData));
    }

    // Load Saved Progress
    function loadSavedProgress() {
        const savedData = localStorage.getItem('assessmentProgress');
        if (savedData) {
            const progress = JSON.parse(savedData);

            // Show restore option with SweetAlert2
            if (Object.keys(progress.answers).length > 0) {
                Swal.fire({
                    title: 'Progress Assessment Tersimpan',
                    text: 'Ditemukan progress assessment sebelumnya. Apakah Anda ingin melanjutkan?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3b82f6',
                    cancelButtonColor: '#ef4444',
                    confirmButtonText: 'Ya, Lanjutkan',
                    cancelButtonText: 'Tidak, Mulai Baru',
                    reverseButtons: true,
                    backdrop: true,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        currentSection = progress.currentSection;
                        currentQuestion = progress.currentQuestion;
                        answers = progress.answers;
                        renderCurrentQuestion();
                        updateProgress();

                        Swal.fire({
                            icon: 'success',
                            title: 'Progress Berhasil Dimuat',
                            text: 'Anda dapat melanjutkan assessment dari pertanyaan terakhir',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        // Reset localStorage if user chooses not to continue
                        localStorage.removeItem('assessmentProgress');

                        Swal.fire({
                            icon: 'info',
                            title: 'Memulai Assessment Baru',
                            text: 'Progress sebelumnya telah dihapus',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            }
        }
    }

    // Show Notification
    function showNotification(message, type = 'info') {
        const notification = $(`
            <div class="fixed top-20 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-white' :
                'bg-blue-500 text-white'
            }">
                ${message}
            </div>
        `);

        $('body').append(notification);

        setTimeout(() => {
            notification.removeClass('translate-x-full');
        }, 100);

        setTimeout(() => {
            notification.addClass('translate-x-full');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Event Handlers
    $('#next-btn').click(goToNext);
    $('#prev-btn').click(goToPrevious);

    // Radio button selection - Updated
    $(document).on('change', 'input[type="radio"]', function() {
        const questionId = parseInt($(this).attr('name').replace('q', ''));
        const value = parseInt($(this).val());

        answers[questionId] = value;

        // Update UI
        $(this).closest('#options-container').find('.radio-option').removeClass('selected');
        $(this).closest('.radio-option').addClass('selected');

        updateProgress();
        saveProgress();

        // Add visual feedback to navigation
        const currentQuestionNumber = getGlobalQuestionNumber();
        $(`.question-nav-item:nth-child(${currentQuestionNumber})`).addClass('completed').removeClass('active');
    });

    // Navigation clicks for question grid
    $(document).on('click', '.question-nav-item', function() {
        const sectionIndex = $(this).data('section');
        const questionIndex = $(this).data('question');

        jumpToQuestion(sectionIndex, questionIndex);
    });

    // Form submission
    $('#assessmentForm').submit(function(e) {
        e.preventDefault();

        // Check if all questions are answered
        if (Object.keys(answers).length < totalQuestions) {
            showNotification('Mohon jawab semua pertanyaan sebelum menyelesaikan assessment', 'warning');
            return;
        }

        // Calculate results and show modal
        calculateAndShowResults();
    });

    // Calculate and Show Results
    function calculateAndShowResults() {
        const totalScore = Object.values(answers).reduce((sum, value) => sum + value, 0);
        const averageScore = totalScore / totalQuestions;

        // Clear saved progress
        localStorage.removeItem('assessmentProgress');

        showResults(averageScore);
    }

    // Show Results
    function showResults(score) {
        let status, statusClass, statusIcon, recommendation, detailRecommendation, needsCounseling;

        if (score >= 2.5) {
            status = 'AMAN';
            statusClass = 'status-aman';
            statusIcon = '✓';
            recommendation = 'Kesiapan Mental Anda Sangat Baik';
            detailRecommendation = 'Mental Anda dalam kondisi prima dan siap menghadapi situasi darurat. Tetap pertahankan kesiapan ini dengan terus berlatih dan mengikuti pelatihan kebencanaan.';
            needsCounseling = false;
        } else if (score >= 1.5) {
            status = 'WASPADA';
            statusClass = 'status-waspada';
            statusIcon = '⚠';
            recommendation = 'Perlu Peningkatan Kesiapan Mental';
            detailRecommendation = 'Anda perlu meningkatkan beberapa aspek kesiapan mental. Konsultasi dengan konselor profesional dapat membantu Anda mengidentifikasi area yang perlu diperbaiki.';
            needsCounseling = true;
        } else {
            status = 'KRITIS';
            statusClass = 'status-kritis';
            statusIcon = '!';
            recommendation = 'Memerlukan Bantuan Segera';
            detailRecommendation = 'Kondisi mental Anda memerlukan perhatian khusus. Sangat disarankan untuk segera berkonsultasi dengan konselor profesional untuk mendapatkan bantuan dan dukungan yang tepat.';
            needsCounseling = true;
        }

        const resultsHTML = `
            <div class="result-card p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Hasil Assessment</h2>
                    <p class="text-gray-600">Evaluasi Kesiapan Mental Menghadapi Bencana</p>
                </div>

                <!-- Status Indicator -->
                <div class="flex flex-col items-center mb-8">
                    <div class="status-indicator ${statusClass} mb-6">
                        <span class="font-bold">${statusIcon}</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">${status}</h3>
                    <h4 class="text-xl font-semibold text-gray-700">${recommendation}</h4>
                </div>

                <!-- Detail Recommendation -->
                <div class="bg-gray-50 rounded-xl p-6 mb-6">
                    <p class="text-gray-700 leading-relaxed text-center">${detailRecommendation}</p>
                </div>

                <!-- Score Details -->
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="text-center p-4 bg-blue-50 rounded-xl">
                        <div class="text-2xl font-bold text-blue-600">${Math.round((score/3) * 100)}%</div>
                        <div class="text-sm text-gray-600">Skor Total</div>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-xl">
                        <div class="text-2xl font-bold text-green-600">${Object.keys(answers).length}</div>
                        <div class="text-sm text-gray-600">Pertanyaan Dijawab</div>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-xl">
                        <div class="text-2xl font-bold text-purple-600">${assessmentData.sections.length}</div>
                        <div class="text-sm text-gray-600">Bagian Selesai</div>
                    </div>
                </div>

                ${needsCounseling ? `
                    <div class="recommendation-card">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Rekomendasi Konseling Virtual</h3>
                                <p class="text-gray-700 text-sm mb-3">
                                    Berdasarkan hasil assessment, kami sangat menyarankan Anda untuk berkonsultasi dengan konselor profesional kami melalui chat virtual.
                                </p>
                                <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Konsultasi gratis dan rahasia
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Konselor bersertifikat profesional
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Tersedia 24/7 untuk keadaan darurat
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                ` : `
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h3 class="font-bold text-green-900">Selamat!</h3>
                                <p class="text-green-800 text-sm mb-3">Kesiapan mental Anda sudah sangat baik. Tetap pertahankan dan tingkatkan terus!</p>
                            </div>
                        </div>
                    </div>
                `}

                <!-- Action Buttons -->
                <div class="action-buttons">
                    ${needsCounseling ? `
                        <button onclick="openChatConseling(); closeModal();" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Mulai Konsultasi Virtual
                        </button>
                    ` : ''}
                    <button onclick="window.location.href='/'" class="px-8 py-3 bg-gray-600 text-white rounded-xl font-semibold hover:bg-gray-700 transition-all duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Beranda
                    </button>
                    <button onclick="location.reload()" class="px-8 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Ulangi Assessment
                    </button>
                </div>
            </div>
        `;

        $('#modalContent').html(resultsHTML);
        $('#resultsModal').removeClass('hidden');

        setTimeout(() => {
            $('#modalContent').removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
        }, 100);

        // Show floating chat button if counseling is needed
        if (needsCounseling) {
            setTimeout(() => {
                $('#floatingChatBtn').css('opacity', '1');
            }, 1000);
        }
    }

    // Close modal when clicking outside
    $('#resultsModal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
        }
    });

    // Chat Functions
    window.openChatConseling = function() {
        $('#chatOverlay').removeClass('hidden');
        $('#chatConseling').removeClass('translate-x-full');
        $('#floatingChatBtn').addClass('hidden');
    };

    window.closeChatConseling = function() {
        $('#chatOverlay').addClass('hidden');
        $('#chatConseling').addClass('translate-x-full');
        $('#floatingChatBtn').removeClass('hidden');
    };

    window.sendMessage = function() {
        const messageInput = $('#chatInput');
        const message = messageInput.val().trim();

        if (message) {
            addUserMessage(message);
            messageInput.val('');

            setTimeout(() => {
                addCounselorResponse();
            }, 1000);
        }
    };

    window.sendQuickMessage = function(message) {
        addUserMessage(message);
        setTimeout(() => {
            addCounselorResponse();
        }, 1000);
    };

    function addUserMessage(message) {
        const timestamp = new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        const messageHTML = `
            <div class="mb-4 flex justify-end">
                <div class="bg-blue-500 text-white p-3 rounded-lg max-w-xs">
                    <p class="text-sm">${message}</p>
                    <span class="text-xs opacity-75">${timestamp}</span>
                </div>
            </div>
        `;

        $('#chatMessages').append(messageHTML);
        scrollChatToBottom();
    }

    function addCounselorResponse() {
        const responses = [
            'Terima kasih telah berbagi. Saya di sini untuk mendengarkan dan membantu Anda.',
            'Saya memahami perasaan Anda. Mari kita bicarakan lebih lanjut tentang hal ini.',
            'Itu langkah yang baik untuk mencari bantuan. Bagaimana perasaan Anda saat ini?'
        ];

        const response = responses[Math.floor(Math.random() * responses.length)];
        const timestamp = new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        const messageHTML = `
            <div class="mb-4 flex justify-start">
                <div class="bg-gray-200 text-gray-800 p-3 rounded-lg max-w-xs">
                    <p class="text-sm">${response}</p>
                    <span class="text-xs opacity-75">${timestamp}</span>
                </div>
            </div>
        `;

        $('#chatMessages').append(messageHTML);
        scrollChatToBottom();
    }

    function scrollChatToBottom() {
        const chatMessages = document.getElementById('chatMessages');
        if (chatMessages) {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }

    // Enter key to send message
    $(document).on('keypress', '#chatInput', function(e) {
        if (e.which === 13) {
            sendMessage();
        }
    });

    // Close modal function
    window.closeModal = function() {
        $('#resultsModal').addClass('hidden');
    };

    // Initialize - Add floating chat button fade in
    initializeAssessment();

    // Show floating chat button after delay
    setTimeout(() => {
        $('#floatingChatBtn').css('opacity', '1');
    }, 2000);
});
</script>
@endsection
