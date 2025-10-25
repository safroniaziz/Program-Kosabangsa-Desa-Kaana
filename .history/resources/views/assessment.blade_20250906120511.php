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
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    border: 2px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    position: relative;
    overflow: hidden;
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
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    border-color: #3b82f6;
    color: #3b82f6;
}

.question-nav-item:hover::before {
    left: 100%;
}

.question-nav-item.completed {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border-color: #10b981;
    color: white;
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
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
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    animation: pulse-blue 2s infinite;
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
}

@media (max-width: 1024px) {
    .question-nav-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 768px) {
    .question-nav-grid {
        grid-template-columns: repeat(3, 1fr);
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
                <div class="navigation-sidebar rounded-2xl p-6 shadow-xl">
                    <!-- Progress Overview -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Progress Assessment</h3>
                        <div class="space-y-4">
                            <!-- Overall Progress -->
                            <div>
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>Keseluruhan</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                                    <div id="overall-progress-bar" class="bg-gradient-to-r from-blue-600 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                                <div class="text-right">
                                    <span id="overall-progress" class="text-sm font-medium text-gray-700">0%</span>
                                </div>
                            </div>

                            <!-- Section Progress -->
                            <div>
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>Bagian Saat Ini</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                    <div id="section-progress-bar" class="bg-gradient-to-r from-emerald-500 to-green-500 h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                                <div class="text-right">
                                    <span id="section-progress" class="text-sm font-medium text-gray-700">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Navigation -->
                    <div class="mb-8">
                        <h4 class="text-sm font-semibold text-gray-700 mb-4">Bagian Assessment</h4>
                        <div class="space-y-2" id="section-nav">
                            <!-- Will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Quick Navigation with Grid -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-semibold text-gray-700">Navigasi Cepat</h4>
                            <!-- Enhanced Legend -->
                            <div class="relative group">
                                <button class="flex items-center text-xs text-gray-500 hover:text-gray-700 transition-colors">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Petunjuk
                                </button>

                                <!-- Enhanced Tooltip -->
                                <div class="hidden group-hover:block absolute right-0 top-6 z-50 w-56 bg-white rounded-xl shadow-xl border border-gray-200 p-4">
                                    <!-- Arrow -->
                                    <div class="absolute -top-2 right-4 w-4 h-4 bg-white border-l border-t border-gray-200 transform rotate-45"></div>

                                    <h5 class="font-semibold text-gray-900 mb-3 text-sm">Status Pertanyaan</h5>
                                    <div class="space-y-3">
                                        <!-- Belum Dijawab -->
                                        <div class="flex items-center group/item">
                                            <div class="w-6 h-6 border-2 border-gray-300 bg-white rounded-lg mr-3 flex items-center justify-center transition-all group-hover/item:border-gray-400">
                                                <span class="text-xs font-medium text-gray-500">?</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Belum Dijawab</div>
                                                <div class="text-xs text-gray-500">Menunggu respons Anda</div>
                                            </div>
                                        </div>

                                        <!-- Sedang Aktif -->
                                        <div class="flex items-center group/item">
                                            <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg mr-3 flex items-center justify-center shadow-sm transition-all group-hover/item:shadow-md">
                                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Sedang Aktif</div>
                                                <div class="text-xs text-gray-500">Pertanyaan saat ini</div>
                                            </div>
                                        </div>

                                        <!-- Sudah Selesai -->
                                        <div class="flex items-center group/item">
                                            <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-green-600 rounded-lg mr-3 flex items-center justify-center shadow-sm transition-all group-hover/item:shadow-md">
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Sudah Dijawab</div>
                                                <div class="text-xs text-gray-500">Pertanyaan terjawab</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quick Tip -->
                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                        <div class="flex items-start">
                                            <div class="w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center mr-2 mt-0.5">
                                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-blue-900">Tips</div>
                                                <div class="text-xs text-blue-700">Klik nomor untuk melompat ke pertanyaan</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question-nav-grid" id="question-nav">
                            <!-- Will be populated by JavaScript -->
                        </div>

                        <!-- Enhanced Navigation Stats -->
                        <div class="mt-4 p-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl border border-gray-200">
                            <div class="flex items-center justify-between">
                                <!-- Progress Stats -->
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                        <span class="text-xs text-gray-600">Selesai:</span>
                                        <span id="answered-count" class="ml-1 text-sm font-bold text-green-600">0</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                        <span class="text-xs text-gray-600">Sisa:</span>
                                        <span id="remaining-count" class="ml-1 text-sm font-bold text-blue-600">0</span>
                                    </div>
                                </div>

                                <!-- Progress Percentage -->
                                <div class="text-right">
                                    <div class="text-xs text-gray-500">Progress</div>
                                    <div id="nav-progress-percent" class="text-sm font-bold text-indigo-600">0%</div>
                                </div>
                            </div>

                            <!-- Mini Progress Bar -->
                            <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
                                <div id="nav-progress-bar" class="bg-gradient-to-r from-green-400 to-blue-500 h-1.5 rounded-full transition-all duration-500" style="width: 0%"></div>
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
                </div>
                <div class="bg-white rounded-2xl rounded-tl-sm p-4 shadow-sm max-w-xs">
                    <p class="text-sm text-gray-800">Halo! Saya Dr. Sarah, konselor profesional. Saya melihat hasil assessment Anda dan siap membantu. Bagaimana perasaan Anda saat ini?</p>
                    <span class="text-xs text-gray-500 mt-2 block">Baru saja</span>
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

<!-- Additional CSS for better positioning -->
<style>
/* Ensure chat button has higher z-index than back to top */
#floatingChatBtn {
    z-index: 999 !important;
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
                <div class="navigation-sidebar rounded-2xl p-6 shadow-xl">
                    <!-- Progress Overview -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Progress Assessment</h3>
                        <div class="space-y-4">
                            <!-- Overall Progress -->
                            <div>
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>Keseluruhan</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                                    <div id="overall-progress-bar" class="bg-gradient-to-r from-blue-600 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                                <div class="text-right">
                                    <span id="overall-progress" class="text-sm font-medium text-gray-700">0%</span>
                                </div>
                            </div>

                            <!-- Section Progress -->
                            <div>
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>Bagian Saat Ini</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                    <div id="section-progress-bar" class="bg-gradient-to-r from-emerald-500 to-green-500 h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                                <div class="text-right">
                                    <span id="section-progress" class="text-sm font-medium text-gray-700">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Navigation -->
                    <div class="mb-8">
                        <h4 class="text-sm font-semibold text-gray-700 mb-4">Bagian Assessment</h4>
                        <div class="space-y-2" id="section-nav">
                            <!-- Will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Quick Navigation with Grid -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-sm font-semibold text-gray-700">Navigasi Cepat</h4>
                            <!-- Enhanced Legend -->
                            <div class="relative group">
                                <button class="flex items-center text-xs text-gray-500 hover:text-gray-700 transition-colors">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Petunjuk
                                </button>

                                <!-- Enhanced Tooltip -->
                                <div class="hidden group-hover:block absolute right-0 top-6 z-50 w-56 bg-white rounded-xl shadow-xl border border-gray-200 p-4">
                                    <!-- Arrow -->
                                    <div class="absolute -top-2 right-4 w-4 h-4 bg-white border-l border-t border-gray-200 transform rotate-45"></div>

                                    <h5 class="font-semibold text-gray-900 mb-3 text-sm">Status Pertanyaan</h5>
                                    <div class="space-y-3">
                                        <!-- Belum Dijawab -->
                                        <div class="flex items-center group/item">
                                            <div class="w-6 h-6 border-2 border-gray-300 bg-white rounded-lg mr-3 flex items-center justify-center transition-all group-hover/item:border-gray-400">
                                                <span class="text-xs font-medium text-gray-500">?</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Belum Dijawab</div>
                                                <div class="text-xs text-gray-500">Menunggu respons Anda</div>
                                            </div>
                                        </div>

                                        <!-- Sedang Aktif -->
                                        <div class="flex items-center group/item">
                                            <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg mr-3 flex items-center justify-center shadow-sm transition-all group-hover/item:shadow-md">
                                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Sedang Aktif</div>
                                                <div class="text-xs text-gray-500">Pertanyaan saat ini</div>
                                            </div>
                                        </div>

                                        <!-- Sudah Selesai -->
                                        <div class="flex items-center group/item">
                                            <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-green-600 rounded-lg mr-3 flex items-center justify-center shadow-sm transition-all group-hover/item:shadow-md">
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Sudah Dijawab</div>
                                                <div class="text-xs text-gray-500">Pertanyaan terjawab</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quick Tip -->
                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                        <div class="flex items-start">
                                            <div class="w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center mr-2 mt-0.5">
                                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-blue-900">Tips</div>
                                                <div class="text-xs text-blue-700">Klik nomor untuk melompat ke pertanyaan</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="question-nav-grid" id="question-nav">
                            <!-- Will be populated by JavaScript -->
                        </div>

                        <!-- Enhanced Navigation Stats -->
                        <div class="mt-4 p-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl border border-gray-200">
                            <div class="flex items-center justify-between">
                                <!-- Progress Stats -->
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                        <span class="text-xs text-gray-600">Selesai:</span>
                                        <span id="answered-count" class="ml-1 text-sm font-bold text-green-600">0</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                        <span class="text-xs text-gray-600">Sisa:</span>
                                        <span id="remaining-count" class="ml-1 text-sm font-bold text-blue-600">0</span>
                                    </div>
                                </div>

                                <!-- Progress Percentage -->
                                <div class="text-right">
                                    <div class="text-xs text-gray-500">Progress</div>
                                    <div id="nav-progress-percent" class="text-sm font-bold text-indigo-600">0%</div>
                                </div>
                            </div>

                            <!-- Mini Progress Bar -->
                            <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
                                <div id="nav-progress-bar" class="bg-gradient-to-r from-green-400 to-blue-500 h-1.5 rounded-full transition-all duration-500" style="width: 0%"></div>
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
                    </div>
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

<!-- Additional CSS for better positioning -->
<style>
/* Ensure chat button has higher z-index than back to top */
#floatingChatBtn {
    z-index: 999 !important;
}

</style>
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
                            { value: 3, text: "Sangat baik, mengetahui semua tanda", desc: "Familiar dengan berbagai indikator and peringatan dini" },
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
                        <label class="radio-option flex items-start p-6 rounded-2xl cursor-pointer group">
                            <div class="w-6 h-6 border-2 border-gray-300 rounded-full mr-4 mt-1 relative group-hover:border-blue-500 flex-shrink-0">
                                <input type="radio" name="q${question.id}" value="${option.value}" class="absolute opacity-0">
                                <div class="hidden w-3 h-3 bg-blue-600 rounded-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                            </div>
                            <div class="flex-1">
                                <span class="text-lg font-medium text-gray-800 block mb-2">${option.text}</span>
                                <p class="text-gray-600">${option.desc}</p>
                            </div>
                            <div class="text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity ml-4">
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
            $(`input[name="q${question.id}"][value="${savedAnswer}"]`).siblings('div').removeClass('hidden');
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

        // Removed automatic scroll to top - let user stay in their current position
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

        // Removed automatic scroll to top - let user stay in their current position
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
        // Removed notification for auto-save
    }

    // Load Saved Progress
    function loadSavedProgress() {
        const savedData = localStorage.getItem('assessmentProgress');
        if (savedData) {
            const progress = JSON.parse(savedData);

            // Show restore option
            if (Object.keys(progress.answers).length > 0) {
                const confirmRestore = confirm('Ditemukan progress assessment sebelumnya. Apakah Anda ingin melanjutkan?');
                if (confirmRestore) {
                    currentSection = progress.currentSection;
                    currentQuestion = progress.currentQuestion;
                    answers = progress.answers;
                    renderCurrentQuestion();
                    updateProgress();
                }
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

    // Radio button selection
    $(document).on('change', 'input[type="radio"]', function() {
        const questionId = parseInt($(this).attr('name').replace('q', ''));
        const value = parseInt($(this).val());

        answers[questionId] = value;

        // Update UI
        $('.radio-option').removeClass('selected');
        $('.radio-option input:checked').closest('.radio-option').addClass('selected');
        $('.radio-option div div').addClass('hidden');
        $('.radio-option input:checked').siblings('div').removeClass('hidden');

        updateProgress();
        saveProgress();

        // Add visual feedback to navigation
        const currentQuestionNumber = getGlobalQuestionNumber();
        $(`.question-nav-item:nth-child(${currentQuestionNumber})`).addClass('completed').removeClass('active');

        // Small celebration animation for completed question
        setTimeout(() => {
            $(`.question-nav-item:nth-child(${currentQuestionNumber})`).addClass('animate-bounce');
            setTimeout(() => {
                $(`.question-nav-item:nth-child(${currentQuestionNumber})`).removeClass('animate-bounce');
            }, 600);
        }, 100);
    });

    // Navigation clicks for question grid
    $(document).on('click', '.question-nav-item', function() {
        const sectionIndex = $(this).data('section');
        const questionIndex = $(this).data('question');

        // Add ripple effect
        const ripple = $('<div class="absolute inset-0 bg-white/30 rounded-full transform scale-0 animate-ping"></div>');
        $(this).append(ripple);
        setTimeout(() => ripple.remove(), 600);

        jumpToQuestion(sectionIndex, questionIndex);
    });

    // Add hover tooltips for better UX
    $(document).on('mouseenter', '.question-nav-item', function() {
        const sectionIndex = $(this).data('section');
        const questionIndex = $(this).data('question');

        if (sectionIndex !== undefined && questionIndex !== undefined) {
            const question = assessmentData.sections[sectionIndex].questions[questionIndex];
            const isAnswered = answers[question.id];

            // Create tooltip
            const tooltip = $(`
                <div class="absolute z-50 bg-gray-900 text-white text-xs rounded-lg py-2 px-3 -top-12 left-1/2 transform -translate-x-1/2 whitespace-nowrap pointer-events-none">
                    <div class="font-medium">${assessmentData.sections[sectionIndex].title}</div>
                    <div class="opacity-75">${isAnswered ? 'Sudah dijawab' : 'Belum dijawab'}</div>
                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
                </div>
            `);
            $(this).append(tooltip);
        }
    });

    $(document).on('mouseleave', '.question-nav-item', function() {
        $(this).find('.absolute.z-50').remove();
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

    // Enhanced Show Results with better UI
    function showResults(score) {
        let status, statusClass, statusIcon, recommendation, additionalInfo, needsCounseling;

        if (score >= 2.5) {
            status = 'AMAN';
            statusClass = 'bg-gradient-to-br from-green-500 to-emerald-600';
            statusIcon = '✓';
            recommendation = 'Mental Anda dalam kondisi baik dan siap menghadapi situasi darurat. Tetap pertahankan kesiapan ini dengan latihan rutin.';
            additionalInfo = 'Kondisi mental Anda menunjukkan kesiapan yang baik dalam menghadapi bencana.';
            needsCounseling = false;
        } else if (score >= 1.5) {
            status = 'WASPADA';
            statusClass = 'bg-gradient-to-br from-yellow-500 to-orange-600';
            statusIcon = '⚠';
            recommendation = 'Anda perlu meningkatkan kesiapan mental. Sangat disarankan untuk mengikuti pelatihan tanggap darurat dan konsultasi dengan konselor.';
            additionalInfo = 'Diperlukan perhatian khusus untuk meningkatkan kesiapan mental Anda.';
            needsCounseling = true;
        } else {
            status = 'KRITIS';
            statusClass = 'bg-gradient-to-br from-red-500 to-pink-600';
            statusIcon = '🚨';
            recommendation = 'Segera hubungi konselor profesional untuk mendapatkan bantuan. Kondisi mental Anda memerlukan intervensi khusus segera.';
            additionalInfo = 'Kondisi mental Anda memerlukan intervensi profesional segera.';
            needsCounseling = true;
        }

        // Enhanced results modal with modern UI
        const resultsHTML = `
            <div class="relative">
                <!-- Close Button -->
                <button onclick="$('#resultsModal').addClass('hidden')" class="absolute -top-2 -right-2 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-400 hover:text-gray-600 transition-colors z-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Header Section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Assessment Selesai
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-black text-gray-900 mb-3">
                        Hasil Assessment
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Kesiapan Mental</span>
                    </h2>
                    <p class="text-gray-600 text-lg">Evaluasi komprehensif telah selesai dilakukan</p>
                </div>

                <!-- User Info Card -->
                <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-2xl p-6 mb-8 border border-slate-200">
                    <div class="flex items-center justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-900">Ahmad Wijaya</h3>
                            <p class="text-gray-600">32 tahun • Kepala Keluarga</p>
                            <p class="text-gray-500 text-sm">${new Date().toLocaleDateString('id-ID', {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            })}</p>
                        </div>
                    </div>
                </div>

                <!-- Result Status - Enhanced Design -->
                <div class="text-center mb-8">
                    <div class="relative mx-auto mb-6" style="width: 220px; height: 220px;">
                        <!-- Animated Progress Ring -->
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            <!-- Background Circle -->
                            <circle cx="50" cy="50" r="40" stroke="#f3f4f6" stroke-width="6" fill="none"/>
                            <!-- Progress Circle -->
                            <circle cx="50" cy="50" r="40" stroke="url(#gradient-${status.toLowerCase()})" stroke-width="6" fill="none"
                                    stroke-dasharray="251.2" stroke-dashoffset="${251.2 - (score/3) * 251.2}"
                                    stroke-linecap="round" class="transition-all duration-2000 ease-out"/>
                            <defs>
                                <linearGradient id="gradient-aman" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#10b981"/>
                                    <stop offset="100%" style="stop-color:#059669"/>
                                </linearGradient>
                                <linearGradient id="gradient-waspada" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#f59e0b"/>
                                    <stop offset="100%" style="stop-color:#d97706"/>
                                </linearGradient>
                                <linearGradient id="gradient-kritis" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#ef4444"/>
                                    <stop offset="100%" style="stop-color:#dc2626"/>
                                </linearGradient>
                            </defs>
                        </svg>

                        <!-- Center Content -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="${statusClass} w-24 h-24 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-2xl transform hover:scale-110 transition-transform duration-300">
                                ${statusIcon}
                            </div>
                        </div>

                        <!-- Floating Percentage -->
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-white rounded-full px-4 py-2 shadow-lg border border-gray-200">
                            <span class="text-lg font-bold text-gray-900">${Math.round((score/3)*100)}%</span>
                        </div>
                    </div>

                    <h3 class="text-4xl font-black text-gray-900 mb-2">Status: ${status}</h3>
                    <p class="text-lg text-gray-600 max-w-lg mx-auto">${additionalInfo}</p>
                </div>

                <!-- Score Details - Enhanced Grid -->
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 text-center border border-blue-200">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div class="text-2xl font-bold text-blue-600 mb-1">${score.toFixed(1)}</div>
                        <div class="text-sm text-gray-600">Skor Rata-rata</div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 text-center border border-green-200">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="text-2xl font-bold text-green-600 mb-1">${Math.round((score/3)*100)}%</div>
                        <div class="text-sm text-gray-600">Tingkat Kesiapan</div>
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 text-center border border-purple-200">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </div>
                        <div class="text-2xl font-bold text-purple-600 mb-1">${totalQuestions}</div>
                        <div class="text-sm text-gray-600">Total Pertanyaan</div>
                    </div>
                </div>

                <!-- Recommendation Section -->
                <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-2xl p-6 mb-6 border border-slate-200">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2 text-lg">🎯 Rekomendasi Personal</h4>
                            <p class="text-gray-700 leading-relaxed">${recommendation}</p>
                        </div>
                    </div>
                </div>

                ${needsCounseling ? `
                    <!-- Counseling Recommendation -->
                    <div class="bg-gradient-to-r from-orange-50 to-red-50 border-2 border-orange-200 rounded-2xl p-6 mb-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </div>
                            <h4 class="font-bold text-orange-900 text-xl mb-2">⚠️ Konseling Direkomendasikan</h4>
                            <p class="text-orange-800 mb-4">Tim konselor profesional kami siap membantu Anda dalam meningkatkan kesiapan mental</p>
                            <a href="#" onclick="openChatConseling(); return false;" class="inline-block w-full bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-4 rounded-xl font-bold text-lg hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                💬 Mulai Chat Konseling Sekarang
                            </a>
                        </div>
                    </div>
                ` : `
                    <!-- Positive Status -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-6 mb-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </div>
                            <h4 class="font-bold text-green-900 text-xl mb-2">✅ Status Mental Baik</h4>
                            <p class="text-green-800">Tetap jaga kondisi mental Anda dan lakukan pelatihan rutin untuk mempertahankan kesiapan.</p>
                        </div>
                    </div>
                `}

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <button onclick="window.print()" class="flex items-center px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Cetak Hasil
                    </button>
                    <button onclick="location.reload()" class="flex items-center px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Ulangi Assessment
                    </button>
                    <button onclick="window.location.href='{{ route('home') }}'" class="flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Beranda
                    </button>
                </div>
            </div>
        `;

        $('#modalContent').html(resultsHTML);
        $('#resultsModal').removeClass('hidden');

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

    // Keyboard shortcuts
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && !$('#resultsModal').hasClass('hidden')) {
            $('#resultsModal').addClass('hidden');
        } else if (e.key === 'ArrowRight' && !$('#next-btn').is(':disabled')) {
            goToNext();
        } else if (e.key === 'ArrowLeft' && !$('#prev-btn').is(':disabled')) {
            goToPrevious();
        }
    });

    // Chat Konseling Functions
    window.openChatConseling = function() {
        $('#chatOverlay').removeClass('hidden');
        $('#chatConseling').removeClass('translate-x-full');

        // Hide floating button when chat is open
        $('#floatingChatBtn').addClass('hidden');

        // Auto scroll to latest message - with null check
        setTimeout(() => {
            const chatMessages = document.getElementById('chatMessages');
            if (chatMessages) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }, 300);

        // Focus on input - with null check
        setTimeout(() => {
            const chatInput = document.getElementById('chatInput');
            if (chatInput) {
                chatInput.focus();
            }
        }, 500);
    };

    window.closeChatConseling = function() {
        $('#chatOverlay').addClass('hidden');
        $('#chatConseling').addClass('translate-x-full');

        // Show floating button when chat is closed
        $('#floatingChatBtn').removeClass('hidden');
    };

    window.sendMessage = function() {
        const input = $('#chatInput');
        const message = input.val().trim();

        if (message) {
            addUserMessage(message);
            input.val('');

            // Simulate counselor response
            setTimeout(() => {
                addCounselorResponse(message);
            }, 1000 + Math.random() * 2000);
        }
    };

    window.sendQuickMessage = function(message) {
        addUserMessage(message);

        // Simulate counselor response
        setTimeout(() => {
            addCounselorResponse(message);
        }, 1000 + Math.random() * 2000);
    };

    function addUserMessage(message) {
        const timestamp = new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        const messageHTML = `
            <div class="mb-4 flex justify-end">
                <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-2xl rounded-tr-sm p-4 shadow-sm max-w-xs">
                    <p class="text-sm">${message}</p>
                    <span class="text-xs opacity-75 mt-2 block">${timestamp}</span>
                </div>
            </div>
        `;

        $('#chatMessages').append(messageHTML);
        scrollChatToBottom();
    }

    function addCounselorResponse(userMessage) {
        const responses = {
            'Saya merasa cemas dan butuh bantuan': 'Saya memahami perasaan cemas yang Anda alami. Ini adalah respons normal terhadap situasi yang menantang. Mari kita coba teknik pernapasan sederhana: tarik napas dalam selama 4 detik, tahan 4 detik, lalu hembuskan perlahan selama 6 detik. Apakah Anda ingin mencobanya sekarang?',
            'Bagaimana cara mengelola stress?': 'Ada beberapa teknik efektif untuk mengelola stress: 1) Latihan pernapasan dalam, 2) Meditasi mindfulness 5-10 menit sehari, 3) Olahraga ringan seperti jalan kaki, 4) Menulis jurnal perasaan. Mana yang paling menarik untuk Anda coba terlebih dahulu?',
            'Saya ingin konsultasi lebih lanjut': 'Tentu saja! Saya sangat senang Anda terbuka untuk konsultasi lebih lanjut. Berdasarkan hasil assessment Anda, kita bisa fokus pada strategi koping yang lebih personal. Apakah Anda lebih nyaman dengan sesi video call atau chat seperti ini?'
        };

        let response = responses[userMessage] || 'Terima kasih telah berbagi. Saya mendengar Anda dan ingin membantu. Bisakah Anda ceritakan lebih detail tentang apa yang Anda rasakan saat ini? Saya di sini untuk mendengarkan tanpa menghakimi.';

        const timestamp = new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        // Show typing indicator
        showTypingIndicator();

        setTimeout(() => {
            hideTypingIndicator();

            const messageHTML = `
                <div class="mb-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </div>
                        <div class="bg-white rounded-2xl rounded-tl-sm p-4 shadow-sm max-w-xs">
                            <p class="text-sm text-gray-800">${response}</p>
                            <span class="text-xs text-gray-500 mt-2 block">${timestamp}</span>
                        </div>
                    </div>
                </div>
            `;

            $('#chatMessages').append(messageHTML);
            scrollChatToBottom();
        }, 1500);
    }

    function showTypingIndicator() {
        const typingHTML = `
            <div id="typingIndicator" class="mb-4">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </div>
                    <div class="bg-white rounded-2xl rounded-tl-sm p-4 shadow-sm">
                        <div class="flex space-x-1">
                            <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                            <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                            <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#chatMessages').append(typingHTML);
        scrollChatToBottom();
    }

    function hideTypingIndicator() {
        $('#typingIndicator').remove();
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

    // Close chat with Escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && !$('#chatConseling').hasClass('translate-x-full')) {
            closeChatConseling();
        } else if (e.key === 'Escape' && !$('#resultsModal').hasClass('hidden')) {
            $('#resultsModal').addClass('hidden');
        }
    });

    // Floating chat button animation on page load
    setTimeout(() => {
        $('#floatingChatBtn').css('opacity', '1');
        setTimeout(() => {
            $('#floatingChatBtn').addClass('animate-bounce');
            setTimeout(() => {
                $('#floatingChatBtn').removeClass('animate-bounce');
            }, 2000);
        }, 500);
    }, 2000);


    // Initialize
    initializeAssessment();
});
</script>
@endsection
