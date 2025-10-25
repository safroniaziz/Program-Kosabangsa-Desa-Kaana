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
    display: flex;
    align-items: flex-start;
    flex-direction: row;
    gap: 16px;
    padding: 20px;
    border: 2px solid #e5e7eb;
    border-radius: 16px;
    transition: all 0.3s ease;
    background: white;
    position: relative;
    cursor: pointer;
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

.radio-option .radio-circle {
    margin-top: 4px;
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
    border-right: none;
    height: calc(100vh - 64px);
    position: sticky;
    top: 64px;
    overflow-y: auto;
    width: 100%;
    min-width: 280px;
}

.question-nav-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-weight: 600;
    font-size: 12px;
    border: 2px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
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
    gap: 6px;
    padding: 0;
    background: transparent;
    border-radius: 0;
    border: none;
    box-shadow: none;
    justify-items: center;
}

@media (max-width: 1280px) {
    .question-nav-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 5px;
        padding: 0;
    }

    .question-nav-item {
        width: 30px;
        height: 30px;
        font-size: 11px;
    }
}

@media (max-width: 1024px) {
    .question-nav-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 4px;
        padding: 0;
    }

    .question-nav-item {
        width: 28px;
        height: 28px;
        font-size: 10px;
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
    margin-top: 0;
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

.radio-content {
    flex: 1;
    min-width: 0;
}

.radio-content h4 {
    font-weight: 600;
    font-size: 16px;
    color: #1f2937;
    margin-bottom: 4px;
    line-height: 1.4;
}

.radio-content p {
    font-size: 14px;
    color: #6b7280;
    line-height: 1.5;
    margin: 0;
}

.navigation-sidebar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-right: none;
    height: calc(100vh - 64px);
    position: sticky;
    top: 64px;
    overflow-y: auto;
}

/* Results Modal Styles */
.result-card {
    background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 24px;
}

.status-indicator {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    position: relative;
    overflow: hidden;
    margin: 0 auto;
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
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
}

.status-waspada {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
}

.status-kritis {
    background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
    color: white;
    box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
}

.result-title {
    font-size: 1.75rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 0.5rem;
}

.result-subtitle {
    font-size: 1.125rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 1rem;
    color: #374151;
}

.result-description {
    font-size: 0.95rem;
    line-height: 1.6;
    text-align: center;
    color: #6b7280;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    padding: 16px;
    border-radius: 12px;
    border-left: 3px solid #3b82f6;
    margin-bottom: 1.5rem;
}

.recommendation-card {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border: 2px solid #f59e0b;
    border-radius: 12px;
    padding: 20px;
    margin-top: 16px;
    text-align: center;
}

.recommendation-card-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border: 2px solid #10b981;
    border-radius: 12px;
    padding: 20px;
    margin-top: 16px;
    text-align: center;
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 20px;
}

.action-buttons button {
    width: 100%;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

@media (min-width: 640px) {
    .action-buttons {
        flex-direction: row;
        justify-content: center;
    }

    .action-buttons button {
        width: auto;
        min-width: 200px;
    }
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
                        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                            <div class="question-nav-grid" id="question-nav">
                                <!-- Question navigation items will be populated by JavaScript -->
                            </div>
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
        <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
            <!-- Results will be populated by JavaScript -->
        </div>
    </div>
</div>


<!-- Chat Konseling Sidebar -->
<div id="chatConseling" class="fixed top-0 right-0 h-full w-96 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50 border-l border-gray-200 flex flex-col">
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
    <div id="chatMessages" class="flex-1 overflow-y-auto p-3 bg-gray-50" style="min-height: 350px; max-height: 450px;">
        <!-- Welcome Message -->
        <div class="mb-3">
            <div class="flex items-start">
                <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-sm p-2 shadow-sm max-w-xs">
                    <p class="text-xs text-gray-800">Halo! Saya Dr. Sarah, konselor profesional. Saya melihat hasil assessment Anda dan siap membantu. Bagaimana perasaan Anda saat ini?</p>
                    <span class="text-xs text-gray-500 mt-1 block">Baru saja</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Response Buttons -->
    <div class="p-2 bg-gray-100 border-t">
        <p class="text-xs text-gray-600 mb-1 font-medium">Respon Cepat:</p>
        <div class="grid grid-cols-1 gap-1" id="quickResponseContainer">
            <!-- Buttons will be populated by JavaScript -->
        </div>
    </div>
            <button onclick="sendQuickMessage('Saya merasa cemas dan butuh bantuan untuk mengatasinya')" class="w-full text-left p-1.5 bg-white rounded text-xs hover:bg-blue-50 transition-colors border border-gray-200">
                😰 Saya merasa cemas
            </button>
            <button onclick="sendQuickMessage('Bagaimana cara mengelola stress dan emosi negatif?')" class="w-full text-left p-1.5 bg-white rounded text-xs hover:bg-blue-50 transition-colors border border-gray-200">
                🧘 Cara mengelola stress?
            </button>
            <button onclick="sendQuickMessage('Saya ingin tips untuk persiapan mental menghadapi bencana')" class="w-full text-left p-1.5 bg-white rounded text-xs hover:bg-blue-50 transition-colors border border-gray-200">
                �️ Tips persiapan mental
            </button>
            <button onclick="sendQuickMessage('Bagaimana membangun dukungan sosial yang kuat?')" class="w-full text-left p-1.5 bg-white rounded text-xs hover:bg-blue-50 transition-colors border border-gray-200">
                👥 Dukungan sosial
            </button>
        </div>
    </div>

    <!-- Chat Input -->
    <div class="p-2 bg-white border-t">
        <div class="flex items-center space-x-1">
            <input type="text" id="chatInput" placeholder="Ketik pesan..." class="flex-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-transparent text-xs">
            <button onclick="sendMessage()" class="p-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded hover:from-orange-600 hover:to-red-600 transition-all">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Chat Overlay -->
<div id="chatOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="closeChatConseling()"></div>

<!-- Floating Chat Button -->
<div id="floatingChatBtn" class="fixed bottom-6 right-6 z-50 opacity-100 transition-opacity duration-300">
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

        // Check for saved progress
        const savedData = localStorage.getItem('assessmentProgress');
        if (savedData) {
            const progress = JSON.parse(savedData);
            if (Object.keys(progress.answers).length > 0) {
                Swal.fire({
                    title: 'Progress Assessment Ditemukan',
                    text: 'Ditemukan progress assessment sebelumnya. Apakah Anda ingin melanjutkan dari posisi terakhir?',
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
                        loadSavedProgress();
                        Swal.fire({
                            icon: 'success',
                            title: 'Progress Berhasil Dimuat',
                            text: 'Anda dapat melanjutkan assessment dari pertanyaan terakhir',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
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
                        <label class="radio-option">
                            <input type="radio" name="q${question.id}" value="${option.value}">
                            <div class="radio-circle"></div>
                            <div class="radio-content">
                                <h4>${option.text}</h4>
                                <p>${option.description}</p>
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
            if (Object.keys(progress.answers).length > 0) {
                currentSection = progress.currentSection;
                currentQuestion = progress.currentQuestion;
                answers = progress.answers;
                renderCurrentQuestion();
                updateProgress();
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

        // Simpan hasil assessment untuk digunakan oleh AI chat
        localStorage.setItem('assessmentAnswers', JSON.stringify(answers));

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
            statusIcon = '🛡️';
            recommendation = 'Kesiapan Mental Anda Sangat Baik';
            detailRecommendation = 'Hasil assessment menunjukkan bahwa mental Anda dalam kondisi prima dan siap menghadapi situasi darurat. Anda memiliki kesiapan yang baik dalam mengelola stress dan mengambil keputusan dalam situasi sulit.';
            needsCounseling = false;
        } else if (score >= 1.5) {
            status = 'WASPADA';
            statusClass = 'status-waspada';
            statusIcon = '⚠️';
            recommendation = 'Perlu Peningkatan Kesiapan Mental';
            detailRecommendation = 'Hasil assessment menunjukkan bahwa Anda perlu meningkatkan beberapa aspek kesiapan mental. Disarankan untuk berkonsultasi dengan konselor profesional guna mengidentifikasi dan memperbaiki area yang perlu diperkuat.';
            needsCounseling = true;
        } else {
            status = 'KRITIS';
            statusClass = 'status-kritis';
            statusIcon = '🚨';
            recommendation = 'Memerlukan Bantuan Segera';
            detailRecommendation = 'Hasil assessment menunjukkan kondisi mental Anda memerlukan perhatian khusus dan bantuan profesional. Sangat disarankan untuk segera berkonsultasi dengan konselor profesional untuk mendapatkan dukungan yang tepat.';
            needsCounseling = true;
        }

        const resultsHTML = `
            <div class="result-card">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Hasil Assessment</h2>
                    <p class="text-lg text-gray-600">Evaluasi Kesiapan Mental Menghadapi Bencana</p>
                </div>

                <!-- Status Indicator -->
                <div class="text-center mb-8">
                    <div class="status-indicator ${statusClass} mb-6">
                        <span>${statusIcon}</span>
                    </div>
                    <h3 class="result-title text-${statusClass === 'status-aman' ? 'green' : statusClass === 'status-waspada' ? 'yellow' : 'red'}-600">${status}</h3>
                    <h4 class="result-subtitle">${recommendation}</h4>
                </div>

                <!-- Description -->
                <div class="result-description">
                    ${detailRecommendation}
                </div>

                <!-- Score Details -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200">
                        <div class="text-3xl font-bold text-blue-600 mb-2">${Math.round((score/3) * 100)}%</div>
                        <div class="text-sm font-medium text-blue-800">Skor Keseluruhan</div>
                        <div class="text-xs text-blue-600 mt-1">dari ${totalQuestions} pertanyaan</div>
                    </div>
                    <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border border-green-200">
                        <div class="text-3xl font-bold text-green-600 mb-2">${Object.keys(answers).length}</div>
                        <div class="text-sm font-medium text-green-800">Pertanyaan Dijawab</div>
                        <div class="text-xs text-green-600 mt-1">100% completed</div>
                    </div>
                    <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border border-purple-200">
                        <div class="text-3xl font-bold text-purple-600 mb-2">${assessmentData.sections.length}</div>
                        <div class="text-sm font-medium text-purple-800">Bagian Assessment</div>
                        <div class="text-xs text-purple-600 mt-1">semua selesai</div>
                    </div>
                </div>

                ${needsCounseling ? `
                    <div class="recommendation-card">
                        <div class="mb-4">
                            <div class="flex items-center justify-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-orange-900 mb-3 text-center">💬 Konsultasi Virtual Tersedia</h3>
                            <p class="text-orange-800 text-center mb-4">
                                Berdasarkan hasil assessment, kami menyarankan Anda untuk berkonsultasi dengan konselor profesional melalui chat virtual.
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                <div class="flex items-center justify-center p-3 bg-white bg-opacity-50 rounded-lg">
                                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="font-medium">Gratis & Rahasia</span>
                                </div>
                                <div class="flex items-center justify-center p-3 bg-white bg-opacity-50 rounded-lg">
                                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="font-medium">Konselor Bersertifikat</span>
                                </div>
                                <div class="flex items-center justify-center p-3 bg-white bg-opacity-50 rounded-lg">
                                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="font-medium">Tersedia 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                ` : `
                    <div class="recommendation-card-success">
                        <div class="flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-green-900 mb-3 text-center">🎉 Luar Biasa!</h3>
                        <p class="text-green-800 text-center">
                            Kesiapan mental Anda sudah sangat baik untuk menghadapi situasi darurat. Tetap pertahankan dan tingkatkan terus dengan mengikuti pelatihan kebencanaan secara rutin.
                        </p>
                    </div>
                `}

                <!-- Action Buttons -->
                <div class="action-buttons">
                    ${needsCounseling ? `
                        <button onclick="openChatConseling(); closeModal();" class="bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Mulai Konsultasi Virtual
                        </button>
                    ` : ''}
                    <button onclick="window.location.href='/'" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Beranda
                    </button>
                    <button onclick="location.reload()" class="bg-white border-2 border-gray-300 text-gray-700 hover:bg-gray-50 hover:border-gray-400 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            $('#floatingChatBtn').css('opacity', '1');
        }

        // Update quick response buttons based on assessment results
        updateQuickResponses();
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

        // Update quick responses buttons when opening chat
        updateQuickResponses();

        // Kirim pesan pembuka berdasarkan konteks assessment jika belum ada pesan
        if ($('#chatMessages').children().length === 0) {
            setTimeout(() => {
                sendWelcomeMessage();
            }, 1000);
        }
    };

    // Fungsi untuk mengirim pesan selamat datang yang kontekstual
    function sendWelcomeMessage() {
        const assessmentContext = getAssessmentContext();
        let welcomeMessage;

        if (assessmentContext) {
            if (assessmentContext.averageScore < 2) {
                welcomeMessage = `Halo! Saya melihat dari hasil assessment bahwa Anda mungkin sedang mengalami tantangan dalam kesiapan mental (kategori: ${assessmentContext.category}). Saya di sini untuk membantu dan mendengarkan Anda. Jangan khawatir, kita akan melewati ini bersama. Apa yang paling ingin Anda bicarakan saat ini?`;
            } else if (assessmentContext.averageScore < 3) {
                welcomeMessage = `Selamat datang! Berdasarkan assessment Anda (kategori: ${assessmentContext.category}), saya dapat membantu meningkatkan kesiapan mental Anda lebih lanjut. ${assessmentContext.advice} Mari kita diskusikan strategi yang tepat untuk Anda.`;
            } else {
                welcomeMessage = `Halo! Senang melihat hasil assessment Anda menunjukkan kesiapan mental yang baik (kategori: ${assessmentContext.category}). Meskipun demikian, saya tetap di sini untuk membantu mempertahankan dan meningkatkan kesiapan Anda. Ada yang ingin Anda diskusikan?`;
            }
        } else {
            welcomeMessage = `Halo! Selamat datang di layanan konseling virtual. Saya di sini untuk membantu dan mendengarkan Anda. Untuk memberikan bantuan yang lebih tepat, silakan selesaikan assessment terlebih dahulu. Sementara itu, jangan ragu untuk berbagi apa yang Anda rasakan.`;
        }

        addCounselorResponse(welcomeMessage);
    }

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

            // AI akan menganalisis pesan pengguna untuk memberikan respons yang relevan
            setTimeout(() => {
                addCounselorResponse(message);
            }, 1500);
        }
    };

    window.sendQuickMessage = function(message) {
        addUserMessage(message);
        setTimeout(() => {
            addCounselorResponse(message);
        }, 1500);
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

    function addCounselorResponse(userMessage = '') {
        // Show typing indicator
        showTypingIndicator();

        // AI Response System berdasarkan analisis pesan pengguna
        setTimeout(() => {
            hideTypingIndicator();
            const aiResponse = generateAIResponse(userMessage);
            const timestamp = new Date().toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });

            const messageHTML = `
                <div class="mb-3 flex justify-start">
                    <div class="flex items-start">
                        <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-sm p-2 shadow-sm max-w-xs">
                            <p class="text-xs text-gray-800">${aiResponse}</p>
                            <span class="text-xs text-gray-500 mt-1 block">${timestamp}</span>
                        </div>
                    </div>
                </div>
            `;

            $('#chatMessages').append(messageHTML);
            scrollChatToBottom();
        }, Math.random() * 2000 + 1000); // Random delay between 1-3 seconds for natural feel
    }

    // Show typing indicator
    function showTypingIndicator() {
        const typingHTML = `
            <div id="typingIndicator" class="mb-3 flex justify-start">
                <div class="flex items-start">
                    <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="bg-white rounded-2xl rounded-tl-sm p-2 shadow-sm">
                        <div class="flex space-x-1">
                            <div class="w-1 h-1 bg-gray-400 rounded-full animate-bounce"></div>
                            <div class="w-1 h-1 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                            <div class="w-1 h-1 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#chatMessages').append(typingHTML);
        scrollChatToBottom();
    }

    // Hide typing indicator
    function hideTypingIndicator() {
        $('#typingIndicator').remove();
    }

    // AI Response Generator - Menganalisis pesan dan memberikan respons yang relevan
    function generateAIResponse(userMessage) {
        const message = userMessage.toLowerCase();

        // Ambil konteks dari hasil assessment jika tersedia
        const assessmentContext = getAssessmentContext();

        // Analisis kata kunci dan konteks untuk respons yang lebih cerdas
        const responsePatterns = {
            // Kata kunci kecemasan dan stress
            anxiety: {
                keywords: ['cemas', 'khawatir', 'takut', 'panik', 'stress', 'tertekan', 'gugup'],
                responses: [
                    'Saya memahami perasaan cemas yang Anda alami. Ini adalah respons alami tubuh terhadap situasi yang menantang. Mari kita coba teknik pernapasan: tarik napas dalam-dalam selama 4 detik, tahan 4 detik, lalu hembuskan perlahan selama 6 detik.',
                    'Kecemasan yang Anda rasakan sangat wajar, terutama dalam situasi darurat. Cobalah untuk fokus pada hal-hal yang bisa Anda kontrol saat ini. Apa yang paling membuat Anda khawatir?',
                    'Terima kasih telah membagikan perasaan Anda. Untuk mengelola kecemasan, cobalah teknik grounding 5-4-3-2-1: sebutkan 5 hal yang bisa Anda lihat, 4 yang bisa disentuh, 3 yang bisa didengar, 2 yang bisa dicium, dan 1 yang bisa dirasa.'
                ]
            },

            // Kata kunci tentang persiapan darurat
            preparation: {
                keywords: ['persiapan', 'rencana', 'tas siaga', 'evakuasi', 'bencana', 'darurat'],
                responses: [
                    'Persiapan yang baik adalah kunci menghadapi situasi darurat. Untuk tas siaga bencana, pastikan berisi: air minum, makanan tahan lama, obat-obatan, senter, radio, dan dokumen penting. Apakah Anda sudah memiliki rencana evakuasi keluarga?',
                    'Sangat baik bahwa Anda memikirkan persiapan. Rencana evakuasi sebaiknya dibahas dan dipraktikkan bersama keluarga secara rutin. Tentukan titik kumpul yang aman dan pastikan semua anggota keluarga mengetahuinya.',
                    'Persiapan mental sama pentingnya dengan persiapan fisik. Berlatihlah tetap tenang, ikuti simulasi bencana di komunitas, dan pelajari tanda-tanda bahaya di daerah Anda.'
                ]
            },

            // Kata kunci dukungan sosial
            support: {
                keywords: ['keluarga', 'teman', 'dukungan', 'sendirian', 'bantuan', 'komunitas'],
                responses: [
                    'Dukungan dari keluarga dan teman sangat penting untuk kesehatan mental. Jangan ragu untuk berbagi perasaan Anda dengan orang-orang terdekat. Mereka bisa menjadi sumber kekuatan saat menghadapi tantangan.',
                    'Membangun jaringan dukungan sosial yang kuat akan membantu Anda lebih siap menghadapi situasi sulit. Apakah Anda memiliki seseorang yang bisa dihubungi saat membutuhkan bantuan?',
                    'Komunitas yang solid dapat menjadi pilar kekuatan saat menghadapi bencana. Cobalah aktif dalam kegiatan RT/RW atau grup siaga bencana di lingkungan Anda.'
                ]
            },

            // Kata kunci teknik coping
            coping: {
                keywords: ['mengatasi', 'cara', 'tips', 'teknik', 'metode', 'strategi', 'menghadapi'],
                responses: [
                    'Ada beberapa teknik coping yang efektif: 1) Teknik pernapasan dalam, 2) Mindfulness atau meditasi sederhana, 3) Olahraga ringan, 4) Journaling atau menulis perasaan, 5) Berbicara dengan orang terpercaya.',
                    'Untuk mengembangkan resiliensi mental, cobalah: tetapkan rutinitas harian, jaga kesehatan fisik, praktikkan rasa syukur, dan fokus pada solusi bukan masalah. Mana yang ingin Anda coba terlebih dahulu?',
                    'Strategi yang paling efektif adalah yang sesuai dengan kepribadian Anda. Beberapa orang lebih cocok dengan aktivitas fisik, yang lain dengan meditasi atau seni. Apa yang biasanya membuat Anda merasa lebih tenang?'
                ]
            },

            // Kata kunci tentang perasaan
            emotions: {
                keywords: ['sedih', 'marah', 'frustasi', 'bingung', 'putus asa', 'lelah', 'kesal'],
                responses: [
                    'Perasaan yang Anda alami sangat manusiawi dan valid. Penting untuk mengakui dan menerima emosi ini tanpa menghakimi diri sendiri. Emosi adalah sinyal dari tubuh dan pikiran kita.',
                    'Ketika emosi terasa overwhelming, cobalah teknik STOP: Stop (berhenti sejenak), Take a breath (tarik napas), Observe (amati perasaan tanpa menilai), Proceed (lanjutkan dengan lebih tenang).',
                    'Mengekspresikan emosi dengan cara yang sehat sangat penting. Bisa melalui berbicara, menulis, menggambar, atau aktivitas fisik. Apa cara yang paling nyaman untuk Anda?'
                ]
            },

            // Kata kunci tentang hasil assessment
            assessment: {
                keywords: ['hasil', 'tes', 'assessment', 'skor', 'nilai', 'evaluasi'],
                responses: assessmentContext ? [
                    `Berdasarkan hasil assessment Anda (${assessmentContext.category}), saya dapat memberikan saran yang lebih spesifik. ${assessmentContext.advice}`,
                    `Melihat hasil assessment Anda, ${assessmentContext.feedback} Mari kita diskusikan langkah-langkah yang bisa diambil untuk meningkatkan kesiapan Anda.`,
                    `Assessment menunjukkan ${assessmentContext.summary} Apakah ada area tertentu yang ingin Anda tingkatkan lebih lanjut?`
                ] : [
                    'Untuk memberikan saran yang lebih personal, silakan selesaikan assessment terlebih dahulu. Hasil assessment akan membantu saya memahami kondisi dan kebutuhan Anda.',
                    'Assessment adalah langkah awal yang penting untuk mengetahui tingkat kesiapan mental Anda. Mari selesaikan assessment untuk mendapatkan rekomendasi yang tepat.'
                ]
            },

            // Kata kunci tentang konseling mandiri
            selfCounseling: {
                keywords: ['konseling mandiri', 'mandiri', 'sendiri', 'otodidak', 'belajar sendiri'],
                responses: [
                    'Konseling mandiri adalah langkah yang bagus untuk mengembangkan keterampilan mengelola mental secara independen. Mulailah dengan refleksi diri rutin, journaling, dan praktik mindfulness sederhana.',
                    'Dalam konseling mandiri untuk persiapan bencana, fokuslah pada: mengenali pemicu stress pribadi, mengembangkan strategi coping yang efektif, dan membangun jaringan support system yang kuat.',
                    'Kunci sukses konseling mandiri adalah konsistensi dan kejujuran pada diri sendiri. Buatlah jadwal rutin untuk evaluasi diri dan jangan ragu mencari bantuan profesional jika diperlukan.'
                ]
            },

            // Kata kunci tentang kelompok dan komunitas
            groupCounseling: {
                keywords: ['kelompok', 'grup', 'bersama', 'komunitas', 'tim', 'organisasi'],
                responses: [
                    'Konseling kelompok untuk persiapan tanggap bencana sangat efektif karena memungkinkan sharing pengalaman dan saling support. Buatlah kelompok kecil 5-8 orang untuk diskusi rutin.',
                    'Dalam setting kelompok, setiap anggota bisa menjadi sumber kekuatan bagi yang lain. Praktikkan simulasi stress management bersama dan berbagi strategi coping yang berhasil.',
                    'Untuk memfasilitasi kelompok, pastikan ada aturan dasar: menghormati privasi, tidak menghakimi, dan fokus pada solusi konstruktif. Rotasi kepemimpinan akan memperkuat keterlibatan semua anggota.'
                ]
            },

            // Kata kunci tentang trauma dan pemulihan
            trauma: {
                keywords: ['trauma', 'masa lalu', 'kejadian buruk', 'flashback', 'nightmare', 'mimpi buruk'],
                responses: [
                    'Trauma dari pengalaman bencana sebelumnya bisa mempengaruhi kesiapan mental saat ini. Teknik grounding, breathing exercises, dan professional therapy bisa membantu proses penyembuhan.',
                    'Menghadapi trauma memerlukan waktu dan kesabaran. Mulailah dengan langkah kecil: akui perasaan Anda, jangan menyalahkan diri sendiri, dan cari dukungan dari orang terpercaya.',
                    'Jika trauma masih sangat mempengaruhi kehidupan sehari-hari, sangat disarankan untuk berkonsultasi dengan psikolog atau psikiater yang berpengalaman menangani trauma bencana.'
                ]
            },

            // Kata kunci tentang kepemimpinan dalam bencana
            leadership: {
                keywords: ['pemimpin', 'memimpin', 'koordinator', 'tanggung jawab', 'mengatur', 'mentor'],
                responses: [
                    'Kepemimpinan dalam situasi darurat memerlukan ketenangan, pengambilan keputusan cepat, dan kemampuan komunikasi yang baik. Latihan simulasi regular akan mengasah kemampuan ini.',
                    'Sebagai pemimpin dalam persiapan bencana, fokus pada: membangun kepercayaan tim, delegasi tugas yang efektif, dan menjadi contoh ketenangan dalam menghadapi stress.',
                    'Kualitas pemimpin yang efektif dalam tanggap bencana: empati tinggi, fleksibilitas dalam strategi, kemampuan problem-solving, dan mental yang resilient. Terus kembangkan soft skills ini.'
                ]
            }
        };        // Cari pattern yang cocok dengan pesan user
        for (const [category, pattern] of Object.entries(responsePatterns)) {
            for (const keyword of pattern.keywords) {
                if (message.includes(keyword)) {
                    const responses = pattern.responses;
                    return responses[Math.floor(Math.random() * responses.length)];
                }
            }
        }

        // Respons default dengan konteks assessment jika tersedia
        let defaultResponses;
        if (assessmentContext) {
            defaultResponses = [
                `Terima kasih telah berbagi dengan saya. Berdasarkan assessment Anda (${assessmentContext.category}), saya di sini untuk membantu meningkatkan kesiapan mental Anda. Apa yang ingin kita diskusikan?`,
                `Saya memahami bahwa setiap orang memiliki pengalaman yang unik. Dengan hasil assessment ${assessmentContext.category}, bagaimana saya bisa membantu Anda hari ini?`,
                `Melihat profil kesiapan mental Anda, saya akan membantu memberikan strategi yang sesuai. ${assessmentContext.advice}`,
                `Assessment menunjukkan ${assessmentContext.summary} Mari kita jelajahi bersama cara untuk meningkatkan resiliensi mental Anda.`
            ];
        } else {
            defaultResponses = [
                'Terima kasih telah berbagi dengan saya. Saya di sini untuk mendengarkan dan membantu Anda. Bisa ceritakan lebih detail tentang apa yang Anda rasakan?',
                'Saya memahami bahwa setiap orang memiliki pengalaman yang unik. Bagaimana saya bisa membantu Anda hari ini?',
                'Langkah pertama untuk mendapatkan bantuan adalah berbicara, dan Anda sudah melakukannya dengan baik. Apa yang paling ingin Anda diskusikan saat ini?',
                'Setiap perasaan dan pengalaman Anda valid. Mari kita jelajahi bersama cara terbaik untuk membantu Anda merasa lebih baik.',
                'Saya menghargai kepercayaan Anda untuk berbagi. Sebagai konselor, saya akan membantu Anda menemukan strategi yang tepat untuk situasi Anda.'
            ];
        }

        return defaultResponses[Math.floor(Math.random() * defaultResponses.length)];
    }

    // Fungsi untuk mendapatkan konteks dari hasil assessment
    function getAssessmentContext() {
        const savedAnswers = localStorage.getItem('assessmentAnswers');
        if (!savedAnswers) return null;

        try {
            const answers = JSON.parse(savedAnswers);
            const totalQuestions = Object.keys(answers).length;
            const totalScore = Object.values(answers).reduce((sum, value) => sum + value, 0);
            const averageScore = totalScore / totalQuestions;

            let category, advice, feedback, summary;

            if (averageScore >= 4) {
                category = "Sangat Siap";
                advice = "Pertahankan kesiapan mental yang excellent ini dengan terus berlatih dan membantu orang lain.";
                feedback = "Anda menunjukkan tingkat kesiapan mental yang sangat baik.";
                summary = "kesiapan mental yang sangat baik dalam menghadapi situasi darurat.";
            } else if (averageScore >= 3) {
                category = "Siap";
                advice = "Tingkatkan beberapa area tertentu untuk mencapai kesiapan yang optimal.";
                feedback = "Anda sudah cukup siap, namun masih ada ruang untuk perbaikan.";
                summary = "tingkat kesiapan yang baik dengan beberapa area yang bisa ditingkatkan.";
            } else if (averageScore >= 2) {
                category = "Cukup Siap";
                advice = "Fokus pada pengembangan strategi coping dan peningkatan pengetahuan tentang manajemen stress.";
                feedback = "Anda perlu lebih mempersiapkan diri secara mental.";
                summary = "kesiapan mental yang masih perlu ditingkatkan secara signifikan.";
            } else {
                category = "Perlu Peningkatan";
                advice = "Penting untuk segera membangun keterampilan dasar kesiapan mental dan mencari dukungan profesional.";
                feedback = "Anda sangat perlu meningkatkan kesiapan mental.";
                summary = "kebutuhan mendesak untuk membangun keterampilan kesiapan mental dasar.";
            }

            return { category, advice, feedback, summary, averageScore, totalScore };
        } catch (error) {
            return null;
        }
    }

    // Fungsi untuk memperbarui quick response buttons berdasarkan konteks assessment
    window.updateQuickResponses = function() {
        const assessmentContext = getAssessmentContext();
        const container = $('#quickResponseContainer');

        let quickResponses = [];

        if (assessmentContext) {
            if (assessmentContext.averageScore < 1.5) {
                // Tingkat kesiapan sangat rendah - Fokus pada intervensi darurat dan stabilisasi
                quickResponses = [
                    { text: '🚨 Merasa kewalahan', message: 'Saya merasa sangat kewalahan dan tidak tahu harus mulai dari mana untuk mempersiapkan diri' },
                    { text: '😱 Takut panik saat bencana', message: 'Saya takut akan panik total jika terjadi bencana. Bagaimana mengatasi ketakutan ini?' },
                    { text: '🆘 Butuh bantuan mendesak', message: 'Saya butuh bantuan segera untuk menstabilkan kondisi mental saya' },
                    { text: '💔 Trauma masa lalu', message: 'Saya memiliki trauma dari bencana sebelumnya yang masih mempengaruhi saya' },
                    { text: '🏥 Konsultasi profesional', message: 'Apakah saya perlu berkonsultasi dengan psikolog atau psikiater?' }
                ];
            } else if (assessmentContext.averageScore < 2.5) {
                // Tingkat kesiapan rendah - Fokus pada dasar-dasar dan stabilisasi
                quickResponses = [
                    { text: '😰 Mengelola kecemasan', message: 'Saya sering merasa cemas memikirkan kemungkinan bencana. Bagaimana cara mengatasinya?' },
                    { text: '�️ Takut kehilangan kontrol', message: 'Saya takut tidak bisa mengendalikan diri saat situasi darurat terjadi' },
                    { text: '🧘 Teknik pernapasan dasar', message: 'Ajari saya teknik pernapasan sederhana untuk menenangkan diri saat panik' },
                    { text: '👨‍👩‍👧‍� Melindungi keluarga', message: 'Bagaimana caranya agar saya bisa melindungi dan menenangkan keluarga saat darurat?' },
                    { text: '📖 Belajar dari dasar', message: 'Saya ingin belajar dari dasar tentang persiapan mental tanggap bencana' }
                ];
            } else if (assessmentContext.averageScore < 3.5) {
                // Tingkat kesiapan menengah - Fokus pada pengembangan dan peningkatan
                quickResponses = [
                    { text: '💪 Meningkatkan resiliensi', message: 'Bagaimana cara meningkatkan daya tahan mental saya untuk menghadapi bencana?' },
                    { text: '🎯 Rencana aksi personal', message: 'Bantu saya membuat rencana aksi personal untuk kesiapan mental tanggap bencana' },
                    { text: '🧠 Latihan mental harian', message: 'Apa saja latihan mental harian yang bisa saya lakukan untuk mempersiapkan diri?' },
                    { text: '🤝 Koordinasi dengan tetangga', message: 'Bagaimana cara berkoordinasi dengan tetangga untuk kesiapan bersama?' },
                    { text: '📋 Evaluasi kesiapan', message: 'Bagaimana cara mengevaluasi tingkat kesiapan mental saya secara berkala?' }
                ];
            } else {
                // Tingkat kesiapan tinggi - Fokus pada kepemimpinan dan mentoring
                quickResponses = [
                    { text: '🎯 Mempertahankan kesiapan', message: 'Bagaimana cara mempertahankan tingkat kesiapan mental yang sudah baik ini?' },
                    { text: '👨‍🏫 Melatih orang lain', message: 'Saya ingin membantu melatih orang lain untuk siap mental menghadapi bencana' },
                    { text: '🌐 Membangun komunitas tangguh', message: 'Bagaimana membangun komunitas yang tangguh secara mental dalam menghadapi bencana?' },
                    { text: '� Asesmen komunitas', message: 'Bagaimana cara melakukan asesmen kesiapan mental untuk komunitas/kelompok?' },
                    { text: '🔄 Program berkelanjutan', message: 'Apa saja program berkelanjutan yang bisa diterapkan untuk menjaga kesiapan mental komunitas?' }
                ];
            }
        } else {
            // Default responses jika belum ada assessment
            quickResponses = [
                { text: '🤔 Apa itu kesiapan mental?', message: 'Bisa dijelaskan apa yang dimaksud dengan kesiapan mental untuk tanggap bencana?' },
                { text: '📊 Pentingnya assessment', message: 'Mengapa penting melakukan assessment kesiapan mental sebelum menghadapi bencana?' },
                { text: '🏠 Kesiapan keluarga', message: 'Bagaimana mempersiapkan mental seluruh anggota keluarga untuk tanggap bencana?' },
                { text: '�️ Kesiapan komunitas', message: 'Apa peran komunitas dalam mempersiapkan mental warga untuk tanggap bencana?' },
                { text: '🎯 Mulai dari mana?', message: 'Saya bingung harus mulai dari mana untuk mempersiapkan mental tanggap bencana' }
            ];
        }

        // Tambahkan quick responses umum yang selalu ada
        const universalResponses = [
            { text: '📞 Kontak darurat', message: 'Bagaimana menyiapkan dan menghafal kontak darurat yang penting?' },
            { text: '🎒 Tas siaga mental', message: 'Apa saja yang perlu disiapkan dalam "tas siaga mental" untuk menghadapi bencana?' },
            { text: '🧘‍♀️ Mindfulness untuk bencana', message: 'Ajari saya teknik mindfulness yang bisa diterapkan saat situasi darurat' },
            { text: '💬 Komunikasi efektif', message: 'Bagaimana berkomunikasi secara efektif dengan keluarga saat terjadi bencana?' }
        ];

        // Gabungkan responses dengan universal responses (acak 4 dari total)
        const allResponses = [...quickResponses, ...universalResponses];
        const selectedResponses = shuffleArray(allResponses).slice(0, 4);

        // Update button container
        container.empty(); // Clear existing buttons first
        let buttonsHTML = '';
        selectedResponses.forEach(response => {
            buttonsHTML += `
                <button onclick="sendQuickMessage('${response.message}')" class="w-full text-left p-1.5 bg-white rounded text-xs hover:bg-blue-50 transition-colors border border-gray-200 mb-1">
                    ${response.text}
                </button>
            `;
        });

        container.html(buttonsHTML);
    };

    // Fungsi untuk mengacak array
    window.shuffleArray = function(array) {
        const shuffled = [...array];
        for (let i = shuffled.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
        }
        return shuffled;
    };

    // Panggil updateQuickResponses saat halaman dimuat dan setelah assessment selesai
    $(document).ready(function() {
        updateQuickResponses();
    });

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
});
</script>
@endsection
