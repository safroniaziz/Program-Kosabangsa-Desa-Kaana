@extends('layouts.app')

@section('title', 'Smart Village Dashboard - Pemetaan Potensi Desa Kaana')

@section('styles')
<style>
/* Modern CSS Variables */
:root {
    --primary-blue: #2563eb;
    --secondary-purple: #7c3aed;
    --accent-cyan: #06b6d4;
    --success-green: #10b981;
    --warning-orange: #f59e0b;
    --danger-red: #ef4444;
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
}

/* Glassmorphism Effects */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.glass-card-white {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 24px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

/* Advanced Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(2deg); }
}

@keyframes pulse-glow {
    0%, 100% {
        box-shadow: 0 0 20px rgba(37, 99, 235, 0.3);
        transform: scale(1);
    }
    50% {
        box-shadow: 0 0 30px rgba(37, 99, 235, 0.6);
        transform: scale(1.02);
    }
}

@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes counter-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.float-animation { animation: float 6s ease-in-out infinite; }
.pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
.gradient-animate { animation: gradient-shift 8s ease infinite; }
.counter-animate { animation: counter-up 1s ease-out forwards; }

/* Enhanced Stat Cards */
.stat-card {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.stat-card:hover::before {
    left: 100%;
}

.stat-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

/* Interactive Charts */
.chart-container {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}

.chart-container:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

/* Hero Background with Particles */
.hero-bg {
    background: linear-gradient(135deg,
        #0f172a 0%,
        #1e293b 25%,
        #334155 50%,
        #1e293b 75%,
        #0f172a 100%
    );
    background-size: 400% 400%;
    animation: gradient-shift 15s ease infinite;
    position: relative;
    overflow: hidden;
}

.hero-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
        radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(124, 58, 237, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.1) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
}

/* Metric Values with Count Animation */
.metric-value {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-purple));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.metric-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.chart-container {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 12px;
    padding: 1.5rem;
    border: 1px solid #e2e8f0;
}

.metric-value {
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1;
}

.metric-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 500;
}

/* Advanced Chart Styles */
.advanced-chart {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border: 1px solid #e5e7eb;
}

.chart-header {
    display: flex;
    justify-content: between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f3f4f6;
}

.chart-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
}

.chart-subtitle {
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

.chart-controls {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.chart-filter {
    padding: 0.5rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background: white;
    font-size: 0.875rem;
    color: #374151;
}

.chart-filter:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Interactive Elements */
.interactive-bar {
    transition: all 0.3s ease;
    cursor: pointer;
}

.interactive-bar:hover {
    transform: scale(1.05);
    filter: brightness(1.1);
}

.tooltip {
    position: absolute;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
    font-size: 0.75rem;
    pointer-events: none;
    z-index: 1000;
    white-space: nowrap;
}

/* Progress Bars */
.progress-bar {
    width: 100%;
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #3b82f6, #1d4ed8);
    border-radius: 4px;
    transition: width 0.3s ease;
}

/* Pyramid Chart */
.pyramid-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
    position: relative;
}

.pyramid-bar {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 0.5rem;
}

.pyramid-segment {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.75rem;
    border-radius: 4px;
    margin: 1px 0;
}

/* Line Chart */
.line-chart {
    position: relative;
    height: 250px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 8px;
    padding: 1rem;
}

.line-path {
    fill: none;
    stroke-width: 3;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.line-point {
    r: 4;
    fill: white;
    stroke-width: 2;
    cursor: pointer;
    transition: r 0.2s ease;
}

.line-point:hover {
    r: 6;
}

/* Grid Lines */
.grid-line {
    stroke: #e5e7eb;
    stroke-width: 1;
    opacity: 0.5;
}

/* Animation */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-in {
    animation: slideInUp 0.6s ease-out;
}

/* Responsive */
@media (max-width: 768px) {
    .chart-container {
        padding: 1rem;
    }

    .chart-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .chart-controls {
        width: 100%;
        justify-content: space-between;
    }
}
</style>
@endsection

@section('content')
<!-- Spectacular Hero Section -->
<section class="hero-bg min-h-screen flex items-center relative">
    <!-- Animated Particles Background -->
    <div class="absolute inset-0">
        <div class="particle" style="position: absolute; top: 20%; left: 10%; width: 4px; height: 4px; background: rgba(59, 130, 246, 0.6); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>
        <div class="particle" style="position: absolute; top: 40%; left: 80%; width: 6px; height: 6px; background: rgba(124, 58, 237, 0.4); border-radius: 50%; animation: float 12s ease-in-out infinite reverse;"></div>
        <div class="particle" style="position: absolute; top: 60%; left: 20%; width: 3px; height: 3px; background: rgba(16, 185, 129, 0.5); border-radius: 50%; animation: float 10s ease-in-out infinite;"></div>
        <div class="particle" style="position: absolute; top: 80%; left: 70%; width: 5px; height: 5px; background: rgba(245, 158, 11, 0.4); border-radius: 50%; animation: float 14s ease-in-out infinite reverse;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="text-center">
            <!-- Animated Badge -->
            <div class="mb-8 float-animation">
                <span class="inline-flex items-center px-6 py-3 glass-card text-white text-sm font-medium">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-3 animate-pulse"></span>
                    � Smart Village Dashboard 2024
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-xs">LIVE</span>
                </span>
            </div>

            <!-- Main Title with Gradient -->
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-8">
                <span class="block text-white">Smart</span>
                <span class="block bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 bg-clip-text text-transparent">
                    Village
                </span>
                <span class="block text-white">Analytics</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed">
                Dashboard interaktif berbasis AI dengan visualisasi data real-time untuk
                <span class="text-cyan-400 font-semibold">transformasi digital</span>
                Desa Kaana menuju smart village yang berkelanjutan.
            </p>

            <!-- Hero Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 max-w-6xl mx-auto mb-16">
                <!-- Stat 1 -->
                <div class="glass-card p-8 text-center pulse-glow" style="animation-delay: 0s;">
                    <div class="text-5xl mb-4">🏘️</div>
                    <div class="text-4xl font-bold text-white mb-2 counter-animate" data-target="15">0</div>
                    <div class="text-blue-300 font-medium">Dusun Digital</div>
                    <div class="mt-3 w-full bg-white/20 rounded-full h-2">
                        <div class="bg-gradient-to-r from-blue-400 to-cyan-400 h-2 rounded-full" style="width: 95%; animation: pulse 2s infinite;"></div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="glass-card p-8 text-center pulse-glow" style="animation-delay: 0.5s;">
                    <div class="text-5xl mb-4">👥</div>
                    <div class="text-4xl font-bold text-white mb-2 counter-animate" data-target="1250">0</div>
                    <div class="text-purple-300 font-medium">Smart Citizens</div>
                    <div class="mt-3 w-full bg-white/20 rounded-full h-2">
                        <div class="bg-gradient-to-r from-purple-400 to-pink-400 h-2 rounded-full" style="width: 88%; animation: pulse 2s infinite;"></div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="glass-card p-8 text-center pulse-glow" style="animation-delay: 1s;">
                    <div class="text-5xl mb-4">🏢</div>
                    <div class="text-4xl font-bold text-white mb-2 counter-animate" data-target="25">0</div>
                    <div class="text-green-300 font-medium">Digital UMKM</div>
                    <div class="mt-3 w-full bg-white/20 rounded-full h-2">
                        <div class="bg-gradient-to-r from-green-400 to-teal-400 h-2 rounded-full" style="width: 78%; animation: pulse 2s infinite;"></div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="glass-card p-8 text-center pulse-glow" style="animation-delay: 1.5s;">
                    <div class="text-5xl mb-4">📊</div>
                    <div class="text-4xl font-bold text-white mb-2 counter-animate" data-target="98">0</div>
                    <div class="text-yellow-300 font-medium">AI Insights</div>
                    <div class="mt-3 w-full bg-white/20 rounded-full h-2">
                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 h-2 rounded-full" style="width: 92%; animation: pulse 2s infinite;"></div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#dashboard" class="group inline-flex items-center px-10 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                    <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Explore Dashboard
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-lg text-xs">AI Powered</span>
                </a>

                <a href="#analytics" class="group inline-flex items-center px-10 py-4 glass-card text-white rounded-2xl font-semibold hover:bg-white/20 transition-all duration-300">
                    <svg class="w-6 h-6 mr-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    View Analytics
                </a>
            </div>

            <!-- Live Status Indicator -->
            <div class="mt-12 flex justify-center items-center space-x-6 text-sm text-gray-400">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse mr-2"></div>
                    <span>System Online</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-blue-400 rounded-full animate-pulse mr-2"></div>
                    <span>Real-time Data</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-purple-400 rounded-full animate-pulse mr-2"></div>
                    <span>AI Analytics Active</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="flex flex-col items-center text-white/60">
            <span class="text-sm mb-2">Scroll to explore</span>
            <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-bounce"></div>
            </div>
        </div>
    </div>
</section>

<!-- Data Statistik Overview -->
<section id="dashboard" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4">
                📊 Data Terkini & Akurat
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">DATA STATISTIK</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Analisis mendalam tentang demografi, sosial, dan ekonomi masyarakat desa untuk perencanaan pembangunan yang tepat sasaran
            </p>
        </div>

        <!-- Main Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <!-- Total Penduduk -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2 counter-animate" data-target="1250">0</div>
                    <div class="text-lg font-semibold text-gray-900 mb-1">Total Penduduk</div>
                    <div class="text-sm text-gray-500">201/km²</div>
                </div>
            </div>

            <!-- Kartu Keluarga -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-green-600 mb-2 counter-animate" data-target="329">0</div>
                    <div class="text-lg font-semibold text-gray-900 mb-1">Kartu Keluarga</div>
                    <div class="text-sm text-gray-500">3.8 orang/KK</div>
                </div>
            </div>

            <!-- Rata-rata Usia -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-purple-600 mb-2">44.9</div>
                    <div class="text-lg font-semibold text-gray-900 mb-1">Rata-rata Usia</div>
                    <div class="text-sm text-gray-500">tahun</div>
                </div>
            </div>

            <!-- Pendidikan Tinggi -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">4.2%</div>
                    <div class="text-lg font-semibold text-gray-900 mb-1">Pendidikan Tinggi</div>
                    <div class="text-sm text-gray-500">Diploma, S1, S2, S3</div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center space-x-4">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Lihat Grafik
                </button>
                <button class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                    Profil Desa
                </button>
            </div>
            <div class="text-sm text-gray-500 mt-3">
                Data terakhir diperbarui: <span class="font-medium" id="last-updated"></span>
            </div>
        </div>
    </div>
</section>

<!-- Gambaran Umum Demografi -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Gambaran Umum Demografi</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Data statistik terkini tentang perkembangan dan kondisi Desa Kaana
            </p>
        </div>

        <!-- Demografi Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Demografi Seimbang -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <div class="text-center mb-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Demografi Seimbang</h3>
                </div>
                <p class="text-gray-600 text-center">
                    Distribusi gender 52.2% laki-laki vs 47.8% perempuan menunjukkan komposisi yang ideal untuk pembangunan berkelanjutan.
                </p>
            </div>

            <!-- Usia Produktif -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <div class="text-center mb-4">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Usia Produktif</h3>
                </div>
                <p class="text-gray-600 text-center">
                    54.4% penduduk dalam usia produktif (15-64 tahun) siap mendukung pertumbuhan ekonomi desa.
                </p>
            </div>

            <!-- Pendidikan -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                <div class="text-center mb-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pendidikan</h3>
                </div>
                <p class="text-gray-600 text-center">
                    4.2% penduduk memiliki pendidikan tinggi, mendukung pengembangan SDM berkualitas untuk masa depan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Charts Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium mb-4">
                📊 Grafik Interaktif
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Data Visual</h2>
            <p class="text-lg text-gray-600">Interactive Charts • Data Real-time</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Distribusi Gender Chart -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Distribusi Gender</h3>
                    <span class="text-sm text-gray-500">Perbandingan Laki-laki & Perempuan</span>
                </div>
                
                <div class="flex items-center justify-center mb-8">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 52%, #ec4899 52% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900 counter-animate" data-target="1250">0</div>
                                <div class="text-sm text-gray-600">Total</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div>
                        <div class="flex items-center justify-center mb-2">
                            <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                            <span class="font-medium">Laki-laki</span>
                        </div>
                        <div class="text-2xl font-bold text-blue-600 counter-animate" data-target="652">0</div>
                        <div class="text-sm text-gray-500">52.2%</div>
                    </div>
                    <div>
                        <div class="flex items-center justify-center mb-2">
                            <div class="w-4 h-4 bg-pink-500 rounded mr-2"></div>
                            <span class="font-medium">Perempuan</span>
                        </div>
                        <div class="text-2xl font-bold text-pink-600 counter-animate" data-target="598">0</div>
                        <div class="text-sm text-gray-500">47.8%</div>
                    </div>
                </div>
                
                <div class="mt-6 p-3 bg-blue-50 rounded-lg">
                    <div class="text-sm text-blue-800">
                        <strong>Rasio Jenis Kelamin:</strong> 109 laki-laki per 100 perempuan
                    </div>
                </div>
            </div>

            <!-- Kelompok Umur Chart -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Kelompok Umur</h3>
                    <span class="text-sm text-gray-500">Distribusi berdasarkan usia</span>
                </div>
                
                <div class="space-y-4 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 text-center text-sm font-medium text-gray-600">Balita</div>
                        </div>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 20%;">83</div>
                            </div>
                        </div>
                        <div class="w-16 text-right text-sm font-medium">6.6%</div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 text-center text-sm font-medium text-gray-600">Anak</div>
                        </div>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 25%;">87</div>
                            </div>
                        </div>
                        <div class="w-16 text-right text-sm font-medium">7.0%</div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 text-center text-sm font-medium text-gray-600">Remaja</div>
                        </div>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-purple-500 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 35%;">121</div>
                            </div>
                        </div>
                        <div class="w-16 text-right text-sm font-medium">9.7%</div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 text-center text-sm font-medium text-gray-600">Dewasa</div>
                        </div>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 70%;">680</div>
                            </div>
                        </div>
                        <div class="w-16 text-right text-sm font-medium">54.4%</div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 text-center text-sm font-medium text-gray-600">Lansia</div>
                        </div>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-red-500 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 22%;">279</div>
                            </div>
                        </div>
                        <div class="w-16 text-right text-sm font-medium">22.3%</div>
                    </div>
                </div>
                
                <div class="p-3 bg-orange-50 rounded-lg">
                    <div class="text-sm text-orange-800">
                        <strong>Bonus Demografi:</strong> Rasio ketergantungan 84:100 menunjukkan potensi produktivitas tinggi
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Data per Dusun Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Analisis Data Per Wilayah Dusun</h2>
            <p class="text-lg text-gray-600">Data detail penduduk per dusun di Desa Kaana</p>
        </div>

        <!-- Dusun Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Dusun 1 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center mb-6">
                    <div class="text-4xl font-bold text-blue-600 mb-2">1</div>
                    <div class="text-2xl font-bold text-gray-900 counter-animate" data-target="402">0</div>
                    <div class="text-gray-600">penduduk</div>
                    <div class="text-sm text-blue-600 font-medium">40% dari total</div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Laki-laki</span>
                        <span class="font-semibold">228 (56.7%)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Perempuan</span>
                        <span class="font-semibold">174 (43.3%)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Kepala KK</span>
                        <span class="font-semibold">101 KK</span>
                    </div>
                </div>
                
                <div class="mt-4 bg-blue-50 p-3 rounded-lg">
                    <div class="text-sm text-blue-800">
                        <strong>Rasio Gender:</strong> 1.31:1
                    </div>
                </div>
            </div>

            <!-- Dusun 2 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center mb-6">
                    <div class="text-4xl font-bold text-green-600 mb-2">2</div>
                    <div class="text-2xl font-bold text-gray-900 counter-animate" data-target="271">0</div>
                    <div class="text-gray-600">penduduk</div>
                    <div class="text-sm text-green-600 font-medium">26.9% dari total</div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Laki-laki</span>
                        <span class="font-semibold">144 (53.1%)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Perempuan</span>
                        <span class="font-semibold">127 (46.9%)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Kepala KK</span>
                        <span class="font-semibold">68 KK</span>
                    </div>
                </div>
                
                <div class="mt-4 bg-green-50 p-3 rounded-lg">
                    <div class="text-sm text-green-800">
                        <strong>Rasio Gender:</strong> 1.13:1
                    </div>
                </div>
            </div>

            <!-- Dusun 3 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow">
                <div class="text-center mb-6">
                    <div class="text-4xl font-bold text-purple-600 mb-2">3</div>
                    <div class="text-2xl font-bold text-gray-900 counter-animate" data-target="333">0</div>
                    <div class="text-gray-600">penduduk</div>
                    <div class="text-sm text-purple-600 font-medium">33.1% dari total</div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Laki-laki</span>
                        <span class="font-semibold">182 (54.7%)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Perempuan</span>
                        <span class="font-semibold">151 (45.3%)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Kepala KK</span>
                        <span class="font-semibold">83 KK</span>
                    </div>
                </div>
                
                <div class="mt-4 bg-purple-50 p-3 rounded-lg">
                    <div class="text-sm text-purple-800">
                        <strong>Rasio Gender:</strong> 1.21:1
                    </div>
                </div>
            </div>
        </div>

        <!-- Comparison Table -->
        <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Matriks Perbandingan Antar Dusun</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dusun</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Populasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KK</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rasio Gender</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">402</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">101</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.31:1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">40%</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">271</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">68</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.13:1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">26.9%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">333</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">83</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.21:1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 font-medium">33.1%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4 text-center bg-gray-50 p-4 rounded-lg">
                <div>
                    <div class="text-2xl font-bold text-gray-900 counter-animate" data-target="1006">0</div>
                    <div class="text-sm text-gray-600">Total Populasi</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900 counter-animate" data-target="252">0</div>
                    <div class="text-sm text-gray-600">Total KK</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-green-600">1.22</div>
                    <div class="text-sm text-gray-600">Rata-rata Rasio</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-blue-600">4.0</div>
                    <div class="text-sm text-gray-600">Rata-rata per KK</div>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full text-sm font-medium mb-6 shadow-lg">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-3 animate-pulse"></span>
                � Real-Time Analytics Dashboard
                <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-xs">LIVE</span>
            </div>

            <h2 class="text-5xl md:text-7xl font-black mb-8">
                <span class="bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent">
                    Smart Village
                </span>
                <br>
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                    Intelligence
                </span>
            </h2>

            <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Teknologi AI terdepan menganalisis data real-time untuk
                <span class="font-bold text-blue-600">transformasi digital</span> yang berkelanjutan
            </p>
        </div>

        <!-- Revolutionary Stat Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Enhanced Stat Card 1 - Population -->
            <div class="stat-card glass-card-white group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-cyan-500/10 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="relative z-10 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="metric-label mb-2">Smart Citizens</div>
                            <div class="metric-value counter-animate" data-target="1250">0</div>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-green-600 mb-4">
                        <div class="flex items-center bg-green-100 px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            <span class="font-semibold">+2.5%</span>
                        </div>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full animate-pulse" style="width: 82%;"></div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stat Card 2 - UMKM -->
            <div class="stat-card glass-card-white group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-teal-500/10 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="relative z-10 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h1a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="metric-label mb-2">Digital UMKM</div>
                            <div class="metric-value counter-animate" data-target="25">0</div>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-green-600 mb-4">
                        <div class="flex items-center bg-green-100 px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            <span class="font-semibold">+15%</span>
                        </div>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-green-500 to-teal-500 rounded-full animate-pulse" style="width: 68%;"></div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stat Card 3 - Tourism -->
            <div class="stat-card glass-card-white group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="relative z-10 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="metric-label mb-2">Smart Tourism</div>
                            <div class="metric-value counter-animate" data-target="5">0</div>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-green-600 mb-4">
                        <div class="flex items-center bg-purple-100 px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            <span class="font-semibold text-purple-600">+25%</span>
                        </div>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full animate-pulse" style="width: 75%;"></div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stat Card 4 - Agriculture -->
            <div class="stat-card glass-card-white group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-yellow-500/10 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                <div class="relative z-10 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="metric-label mb-2">Smart Farming</div>
                            <div class="metric-value counter-animate" data-target="450">0</div>
                            <div class="text-xs text-gray-500 font-medium">Hektar</div>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-green-600 mb-4">
                        <div class="flex items-center bg-orange-100 px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            <span class="font-semibold text-orange-600">85%</span>
                        </div>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full animate-pulse" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AI Insights Panel -->
        <div class="glass-card-white p-8 mb-16">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">🤖 AI Smart Insights</h3>
                    <p class="text-gray-600">Analisis prediktif berbasis machine learning</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-green-600">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse mr-2"></div>
                        <span class="text-sm font-medium">AI Active</span>
                    </div>
                    <button class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-colors">
                        View Details
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-2xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">📈</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Population Growth</h4>
                            <p class="text-blue-600 font-bold">+2.8% YoY</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Proyeksi pertumbuhan penduduk stabil dengan kualitas hidup meningkat</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-teal-50 p-6 rounded-2xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">💰</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Economic Index</h4>
                            <p class="text-green-600 font-bold">87.5/100</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Indeks ekonomi desa menunjukkan tren positif dengan diversifikasi UMKM</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">🎯</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Development Score</h4>
                            <p class="text-purple-600 font-bold">92.3/100</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Skor pembangunan berkelanjutan mencapai level excellent</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Data Visualization Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Visualisasi Data</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Analisis mendalam mengenai demografi, ekonomi, dan potensi pengembangan desa.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Population by Age Group -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Distribusi Usia Penduduk</h3>
                    <select class="text-sm border border-gray-300 rounded-lg px-3 py-2">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="h-64 flex items-end justify-center space-x-3 mb-6">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-32 bg-blue-500 rounded-t-lg mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                300 orang (24%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">0-17</span>
                        <span class="text-sm font-medium">300</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-40 bg-green-500 rounded-t-lg mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                400 orang (32%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">18-35</span>
                        <span class="text-sm font-medium">400</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-28 bg-purple-500 rounded-t-lg mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                280 orang (22%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">36-50</span>
                        <span class="text-sm font-medium">280</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-24 bg-orange-500 rounded-t-lg mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                200 orang (16%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">51-65</span>
                        <span class="text-sm font-medium">200</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-16 bg-pink-500 rounded-t-lg mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                70 orang (6%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">65+</span>
                        <span class="text-sm font-medium">70</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Penduduk:</span>
                        <span class="font-semibold">1,250</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Usia Produktif:</span>
                        <span class="font-semibold text-green-600">680 (54%)</span>
                    </div>
                </div>
            </div>

            <!-- Gender Distribution -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Perbandingan Jenis Kelamin</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-700">Lihat Detail</button>
                </div>
                <div class="h-64 flex items-center justify-center mb-6">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 52%, #ec4899 52% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-xl font-bold text-gray-900">1,250</div>
                                <div class="text-xs text-gray-600">Total Penduduk</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded mr-3"></div>
                            <span class="text-sm">Laki-laki</span>
                        </div>
                        <span class="text-sm font-semibold">652 (52%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-pink-500 rounded mr-3"></div>
                            <span class="text-sm">Perempuan</span>
                        </div>
                        <span class="text-sm font-semibold">598 (48%)</span>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                    <div class="text-xs text-blue-800">
                        <strong>Rasio Jenis Kelamin:</strong> 109 laki-laki per 100 perempuan
                    </div>
                </div>
            </div>

            <!-- Religion Distribution -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Distribusi Agama</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-700">Lihat Detail</button>
                </div>
                <div class="h-64 flex items-center justify-center mb-6">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#10b981 0% 85%, #f59e0b 85% 95%, #ef4444 95% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-xl font-bold text-gray-900">100%</div>
                                <div class="text-xs text-gray-600">Total Penduduk</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded mr-3"></div>
                            <span class="text-sm">Islam</span>
                        </div>
                        <span class="text-sm font-semibold">1,063 (85%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded mr-3"></div>
                            <span class="text-sm">Kristen</span>
                        </div>
                        <span class="text-sm font-semibold">125 (10%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded mr-3"></div>
                            <span class="text-sm">Katolik</span>
                        </div>
                        <span class="text-sm font-semibold">62 (5%)</span>
                    </div>
                </div>
            </div>

            <!-- Education Level -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Tingkat Pendidikan</h3>
                    <div class="flex space-x-2">
                        <button class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">2024</button>
                        <button class="text-xs text-gray-500 px-3 py-1 rounded-full hover:bg-gray-100">2023</button>
                    </div>
                </div>
                <div class="h-64 flex items-end justify-center space-x-4 mb-6">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-20 bg-red-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                150 orang (12%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">Tidak Sekolah</span>
                        <span class="text-sm font-medium">150</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-32 bg-orange-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                300 orang (24%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">SD</span>
                        <span class="text-sm font-medium">300</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-40 bg-yellow-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                400 orang (32%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">SMP</span>
                        <span class="text-sm font-medium">400</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-36 bg-green-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                300 orang (24%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">SMA</span>
                        <span class="text-sm font-medium">300</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-24 bg-blue-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                100 orang (8%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">Perguruan Tinggi</span>
                        <span class="text-sm font-medium">100</span>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-green-50 rounded-lg">
                    <div class="text-xs text-green-800">
                        <strong>Angka Melek Huruf:</strong> 88% (1,100 dari 1,250 penduduk)
                    </div>
                </div>
            </div>

            <!-- Employment Status -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Status Pekerjaan</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-700">Lihat Detail</button>
                </div>
                <div class="h-64 flex items-center justify-center mb-6">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 45%, #10b981 45% 70%, #f59e0b 70% 85%, #ef4444 85% 95%, #8b5cf6 95% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-xl font-bold text-gray-900">680</div>
                                <div class="text-xs text-gray-600">Usia Produktif</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded mr-3"></div>
                            <span class="text-sm">Pertanian</span>
                        </div>
                        <span class="text-sm font-semibold">306 (45%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded mr-3"></div>
                            <span class="text-sm">UMKM & Perdagangan</span>
                        </div>
                        <span class="text-sm font-semibold">170 (25%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded mr-3"></div>
                            <span class="text-sm">Pariwisata</span>
                        </div>
                        <span class="text-sm font-semibold">102 (15%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded mr-3"></div>
                            <span class="text-sm">PNS/TNI/Polri</span>
                        </div>
                        <span class="text-sm font-semibold">68 (10%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-purple-500 rounded mr-3"></div>
                            <span class="text-sm">Lainnya</span>
                        </div>
                        <span class="text-sm font-semibold">34 (5%)</span>
                    </div>
                </div>
            </div>

            <!-- Income Distribution -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Distribusi Pendapatan</h3>
                    <div class="flex space-x-2">
                        <button class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">2024</button>
                        <button class="text-xs text-gray-500 px-3 py-1 rounded-full hover:bg-gray-100">2023</button>
                    </div>
                </div>
                <div class="h-64 flex items-end justify-center space-x-4 mb-6">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-16 bg-red-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                200 KK (25%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">< 1.5 Juta</span>
                        <span class="text-sm font-medium">200</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-24 bg-orange-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                300 KK (37.5%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">1.5-3 Juta</span>
                        <span class="text-sm font-medium">300</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-32 bg-yellow-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                200 KK (25%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">3-5 Juta</span>
                        <span class="text-sm font-medium">200</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-20 bg-green-500 rounded-t mb-2 relative group">
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                100 KK (12.5%)
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">> 5 Juta</span>
                        <span class="text-sm font-medium">100</span>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-yellow-50 rounded-lg">
                    <div class="text-xs text-yellow-800">
                        <strong>Pendapatan Rata-rata:</strong> Rp 2.8 juta per bulan per KK
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Advanced Demographics Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Analisis Demografi Mendalam</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Visualisasi data demografi yang komprehensif dengan piramida penduduk dan tren pertumbuhan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Population Pyramid -->
            <div class="advanced-chart animate-slide-in">
                <div class="chart-header">
                    <div>
                        <h3 class="chart-title">Piramida Penduduk Desa Kaana</h3>
                        <p class="chart-subtitle">Distribusi penduduk berdasarkan usia dan jenis kelamin (2024)</p>
                    </div>
                    <div class="chart-controls">
                        <select class="chart-filter">
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                        </select>
                    </div>
                </div>

                <div class="pyramid-container">
                    <!-- Male Side -->
                    <div class="pyramid-bar" style="width: 200px;">
                        <div class="pyramid-segment" style="height: 20px; background: #3b82f6; width: 80%;">
                            <span>0-4</span>
                        </div>
                        <div class="pyramid-segment" style="height: 25px; background: #3b82f6; width: 85%;">
                            <span>5-9</span>
                        </div>
                        <div class="pyramid-segment" style="height: 30px; background: #3b82f6; width: 90%;">
                            <span>10-14</span>
                        </div>
                        <div class="pyramid-segment" style="height: 35px; background: #3b82f6; width: 95%;">
                            <span>15-19</span>
                        </div>
                        <div class="pyramid-segment" style="height: 40px; background: #3b82f6; width: 100%;">
                            <span>20-24</span>
                        </div>
                        <div class="pyramid-segment" style="height: 45px; background: #3b82f6; width: 100%;">
                            <span>25-29</span>
                        </div>
                        <div class="pyramid-segment" style="height: 40px; background: #3b82f6; width: 95%;">
                            <span>30-34</span>
                        </div>
                        <div class="pyramid-segment" style="height: 35px; background: #3b82f6; width: 90%;">
                            <span>35-39</span>
                        </div>
                        <div class="pyramid-segment" style="height: 30px; background: #3b82f6; width: 85%;">
                            <span>40-44</span>
                        </div>
                        <div class="pyramid-segment" style="height: 25px; background: #3b82f6; width: 80%;">
                            <span>45-49</span>
                        </div>
                        <div class="pyramid-segment" style="height: 20px; background: #3b82f6; width: 75%;">
                            <span>50-54</span>
                        </div>
                        <div class="pyramid-segment" style="height: 15px; background: #3b82f6; width: 70%;">
                            <span>55-59</span>
                        </div>
                        <div class="pyramid-segment" style="height: 10px; background: #3b82f6; width: 60%;">
                            <span>60+</span>
                        </div>
                    </div>

                    <!-- Center Line -->
                    <div class="w-px h-full bg-gray-300 mx-4"></div>

                    <!-- Female Side -->
                    <div class="pyramid-bar" style="width: 200px;">
                        <div class="pyramid-segment" style="height: 20px; background: #ec4899; width: 80%;">
                            <span>0-4</span>
                        </div>
                        <div class="pyramid-segment" style="height: 25px; background: #ec4899; width: 85%;">
                            <span>5-9</span>
                        </div>
                        <div class="pyramid-segment" style="height: 30px; background: #ec4899; width: 90%;">
                            <span>10-14</span>
                        </div>
                        <div class="pyramid-segment" style="height: 35px; background: #ec4899; width: 95%;">
                            <span>15-19</span>
                        </div>
                        <div class="pyramid-segment" style="height: 40px; background: #ec4899; width: 100%;">
                            <span>20-24</span>
                        </div>
                        <div class="pyramid-segment" style="height: 45px; background: #ec4899; width: 100%;">
                            <span>25-29</span>
                        </div>
                        <div class="pyramid-segment" style="height: 40px; background: #ec4899; width: 95%;">
                            <span>30-34</span>
                        </div>
                        <div class="pyramid-segment" style="height: 35px; background: #ec4899; width: 90%;">
                            <span>35-39</span>
                        </div>
                        <div class="pyramid-segment" style="height: 30px; background: #ec4899; width: 85%;">
                            <span>40-44</span>
                        </div>
                        <div class="pyramid-segment" style="height: 25px; background: #ec4899; width: 80%;">
                            <span>45-49</span>
                        </div>
                        <div class="pyramid-segment" style="height: 20px; background: #ec4899; width: 75%;">
                            <span>50-54</span>
                        </div>
                        <div class="pyramid-segment" style="height: 15px; background: #ec4899; width: 70%;">
                            <span>55-59</span>
                        </div>
                        <div class="pyramid-segment" style="height: 10px; background: #ec4899; width: 60%;">
                            <span>60+</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-center space-x-8">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Laki-laki</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-pink-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Perempuan</span>
                    </div>
                </div>
            </div>

            <!-- Population Growth Trend -->
            <div class="advanced-chart animate-slide-in">
                <div class="chart-header">
                    <div>
                        <h3 class="chart-title">Tren Pertumbuhan Penduduk</h3>
                        <p class="chart-subtitle">Perkembangan jumlah penduduk 5 tahun terakhir</p>
                    </div>
                    <div class="chart-controls">
                        <button class="chart-filter">Tahun</button>
                        <button class="chart-filter">Bulan</button>
                    </div>
                </div>

                <div class="line-chart">
                    <svg viewBox="0 0 400 200" class="w-full h-full">
                        <!-- Grid Lines -->
                        <line x1="50" y1="20" x2="50" y2="180" class="grid-line"/>
                        <line x1="50" y1="180" x2="350" y2="180" class="grid-line"/>
                        <line x1="50" y1="140" x2="350" y2="140" class="grid-line"/>
                        <line x1="50" y1="100" x2="350" y2="100" class="grid-line"/>
                        <line x1="50" y1="60" x2="350" y2="60" class="grid-line"/>
                        <line x1="50" y1="20" x2="350" y2="20" class="grid-line"/>

                        <!-- Y-axis labels -->
                        <text x="40" y="185" class="text-xs fill-gray-500">0</text>
                        <text x="40" y="145" class="text-xs fill-gray-500">500</text>
                        <text x="40" y="105" class="text-xs fill-gray-500">1000</text>
                        <text x="40" y="65" class="text-xs fill-gray-500">1500</text>
                        <text x="40" y="25" class="text-xs fill-gray-500">2000</text>

                        <!-- X-axis labels -->
                        <text x="100" y="195" class="text-xs fill-gray-500">2020</text>
                        <text x="150" y="195" class="text-xs fill-gray-500">2021</text>
                        <text x="200" y="195" class="text-xs fill-gray-500">2022</text>
                        <text x="250" y="195" class="text-xs fill-gray-500">2023</text>
                        <text x="300" y="195" class="text-xs fill-gray-500">2024</text>

                        <!-- Population Growth Line -->
                        <path d="M100 160 L150 150 L200 140 L250 130 L300 120"
                              class="line-path"
                              stroke="#3b82f6"
                              fill="none"/>

                        <!-- Data Points -->
                        <circle cx="100" cy="160" r="4" class="line-point" fill="#3b82f6" stroke="white" stroke-width="2"/>
                        <circle cx="150" cy="150" r="4" class="line-point" fill="#3b82f6" stroke="white" stroke-width="2"/>
                        <circle cx="200" cy="140" r="4" class="line-point" fill="#3b82f6" stroke="white" stroke-width="2"/>
                        <circle cx="250" cy="130" r="4" class="line-point" fill="#3b82f6" stroke="white" stroke-width="2"/>
                        <circle cx="300" cy="120" r="4" class="line-point" fill="#3b82f6" stroke="white" stroke-width="2"/>
                    </svg>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Pertumbuhan Tahunan:</span>
                        <span class="font-semibold text-green-600">+2.5%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Target 2025:</span>
                        <span class="font-semibold">1,300</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="advanced-chart animate-slide-in">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">1,250</div>
                    <div class="text-sm text-gray-600 mb-4">Total Penduduk</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 85%;"></div>
                    </div>
                    <div class="text-xs text-gray-500 mt-2">85% dari target desa</div>
                </div>
            </div>

            <div class="advanced-chart animate-slide-in">
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600 mb-2">680</div>
                    <div class="text-sm text-gray-600 mb-4">Usia Produktif</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 90%; background: linear-gradient(90deg, #10b981, #059669);"></div>
                    </div>
                    <div class="text-xs text-gray-500 mt-2">54% dari total penduduk</div>
                </div>
            </div>

            <div class="advanced-chart animate-slide-in">
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-600 mb-2">88%</div>
                    <div class="text-sm text-gray-600 mb-4">Angka Melek Huruf</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 88%; background: linear-gradient(90deg, #8b5cf6, #7c3aed);"></div>
                    </div>
                    <div class="text-xs text-gray-500 mt-2">Di atas rata-rata nasional</div>
                </div>
            </div>

            <div class="advanced-chart animate-slide-in">
                <div class="text-center">
                    <div class="text-3xl font-bold text-orange-600 mb-2">2.8</div>
                    <div class="text-sm text-gray-600 mb-4">Pendapatan Rata-rata (Juta)</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 70%; background: linear-gradient(90deg, #f59e0b, #d97706);"></div>
                    </div>
                    <div class="text-xs text-gray-500 mt-2">Per bulan per KK</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Peta Interaktif Desa Kaana</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Eksplorasi wilayah desa dengan detail fasilitas, infrastruktur, dan potensi pengembangan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Map Container -->
            <div class="lg:col-span-2">
                <div class="bg-gray-100 rounded-xl p-6 h-96 relative overflow-hidden">
                    <!-- Interactive Map -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-100 to-blue-100 rounded-lg">
                        <svg viewBox="0 0 600 400" class="w-full h-full">
                            <!-- Desa Boundary -->
                            <path d="M50 50 Q300 30 550 50 Q570 200 550 350 Q300 370 50 350 Q30 200 50 50"
                                  fill="#10b981" stroke="#059669" stroke-width="3" opacity="0.8"/>

                            <!-- Main Roads -->
                            <path d="M100 100 Q300 120 500 100" stroke="#374151" stroke-width="4" fill="none"/>
                            <path d="M100 150 Q300 170 500 150" stroke="#6b7280" stroke-width="3" fill="none"/>
                            <path d="M100 200 Q300 220 500 200" stroke="#6b7280" stroke-width="3" fill="none"/>
                            <path d="M100 250 Q300 270 500 250" stroke="#6b7280" stroke-width="3" fill="none"/>
                            <path d="M100 300 Q300 320 500 300" stroke="#6b7280" stroke-width="3" fill="none"/>

                            <!-- Vertical Roads -->
                            <path d="M150 80 Q170 200 150 320" stroke="#6b7280" stroke-width="2" fill="none"/>
                            <path d="M300 80 Q320 200 300 320" stroke="#6b7280" stroke-width="2" fill="none"/>
                            <path d="M450 80 Q470 200 450 320" stroke="#6b7280" stroke-width="2" fill="none"/>

                            <!-- Water Bodies -->
                            <path d="M80 180 Q120 200 80 220 Q120 200 80 180" fill="#3b82f6" opacity="0.6"/>
                            <path d="M520 160 Q560 180 520 200 Q560 180 520 160" fill="#3b82f6" opacity="0.6"/>

                            <!-- Agricultural Areas -->
                            <rect x="120" y="120" width="80" height="60" fill="#22c55e" opacity="0.4"/>
                            <rect x="220" y="140" width="100" height="80" fill="#22c55e" opacity="0.4"/>
                            <rect x="340" y="160" width="90" height="70" fill="#22c55e" opacity="0.4"/>

                            <!-- Forest/Conservation Areas -->
                            <path d="M100 80 Q150 60 200 80 Q180 120 100 100 Q100 80 100 80" fill="#16a34a" opacity="0.5"/>
                            <path d="M400 60 Q450 40 500 60 Q480 100 400 80 Q400 60 400 60" fill="#16a34a" opacity="0.5"/>
                        </svg>

                        <!-- Interactive Markers -->
                        <!-- Balai Desa -->
                        <div class="absolute top-16 left-24 group cursor-pointer">
                            <div class="w-6 h-6 bg-red-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Balai Desa Kaana
                            </div>
                        </div>

                        <!-- Air Terjun -->
                        <div class="absolute top-20 right-20 group cursor-pointer">
                            <div class="w-6 h-6 bg-blue-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Air Terjun Kaana
                            </div>
                        </div>

                        <!-- Sekolah -->
                        <div class="absolute top-32 left-32 group cursor-pointer">
                            <div class="w-6 h-6 bg-yellow-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                SD Kaana
                            </div>
                        </div>

                        <!-- Puskesmas -->
                        <div class="absolute top-40 right-32 group cursor-pointer">
                            <div class="w-6 h-6 bg-green-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Puskesmas
                            </div>
                        </div>

                        <!-- Masjid -->
                        <div class="absolute top-48 left-48 group cursor-pointer">
                            <div class="w-6 h-6 bg-purple-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Masjid Al-Ikhlas
                            </div>
                        </div>

                        <!-- Pasar -->
                        <div class="absolute top-56 right-40 group cursor-pointer">
                            <div class="w-6 h-6 bg-orange-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Pasar Desa
                            </div>
                        </div>

                        <!-- Homestay -->
                        <div class="absolute top-64 left-40 group cursor-pointer">
                            <div class="w-6 h-6 bg-pink-500 rounded-full border-3 border-white shadow-lg hover:scale-110 transition-transform"></div>
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                Homestay Desa
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Info Panel -->
            <div class="space-y-6">
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Desa</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Luas Wilayah:</span>
                            <span class="font-semibold">1,250 Ha</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Dusun:</span>
                            <span class="font-semibold">15 Dusun</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah RT:</span>
                            <span class="font-semibold">45 RT</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah RW:</span>
                            <span class="font-semibold">15 RW</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Fasilitas Umum</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-sm">Balai Desa</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                            <span class="text-sm">Sekolah (3 unit)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm">Puskesmas</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                            <span class="text-sm">Masjid (8 unit)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-orange-500 rounded-full mr-3"></div>
                            <span class="text-sm">Pasar Desa</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Potensi Wisata</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                            <span class="text-sm">Air Terjun Kaana</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-pink-500 rounded-full mr-3"></div>
                            <span class="text-sm">Homestay (12 unit)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <span class="text-sm">Agrowisata</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Insights & Recommendations -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Analisis & Rekomendasi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Berdasarkan data yang terkumpul, berikut adalah insight dan rekomendasi untuk pengembangan desa.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Insight Card 1 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Potensi Demografi</h3>
                </div>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Populasi usia produktif (18-50 tahun) mencapai 65%, menunjukkan potensi SDM yang besar untuk pengembangan ekonomi desa.
                </p>
                <div class="space-y-2">
                    <div class="text-sm font-medium text-gray-900">Rekomendasi:</div>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Pelatihan keterampilan digital</li>
                        <li>• Program kewirausahaan muda</li>
                        <li>• Pemberdayaan perempuan</li>
                    </ul>
                </div>
            </div>

            <!-- Insight Card 2 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-green-100 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Pengembangan UMKM</h3>
                </div>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Pertumbuhan UMKM 15% per tahun dengan sektor unggulan pertanian dan kerajinan. Potensi ekspansi ke sektor digital.
                </p>
                <div class="space-y-2">
                    <div class="text-sm font-medium text-gray-900">Rekomendasi:</div>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Digitalisasi produk UMKM</li>
                        <li>• Pelatihan manajemen bisnis</li>
                        <li>• Akses permodalan mikro</li>
                    </ul>
                </div>
            </div>

            <!-- Insight Card 3 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-purple-100 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Potensi Wisata</h3>
                </div>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    5 objek wisata dengan rating tinggi, namun infrastruktur dan promosi masih perlu ditingkatkan untuk maksimalkan potensi.
                </p>
                <div class="space-y-2">
                    <div class="text-sm font-medium text-gray-900">Rekomendasi:</div>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Pengembangan infrastruktur</li>
                        <li>• Pelatihan guide wisata</li>
                        <li>• Digital marketing pariwisata</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mt-12 space-x-4">
            <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Download Laporan Lengkap
            </button>
            <button class="border border-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                Bagikan Insights
            </button>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-slate-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">
                Butuh Data Lebih Detail?
            </h2>
        <p class="text-xl text-gray-300 mb-8">
                Dapatkan akses penuh ke dashboard analytics dengan data real-time dan laporan komprehensif
            </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-3 bg-white text-slate-900 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                        Download Laporan PDF
                    </span>
                </button>
            <button class="px-8 py-3 border border-white text-white rounded-lg font-semibold hover:bg-white/10 transition-colors">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Request Custom Report
                    </span>
                </button>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Counter Animation
    function animateCounter(element, target, duration = 2000) {
        const start = 0;
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function for smooth animation
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = Math.floor(start + (target - start) * easeOutQuart);

            element.textContent = current.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
            }
        }

        requestAnimationFrame(updateCounter);
    }

    // Initialize counter animations
    const counters = document.querySelectorAll('.counter-animate');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-target'));
                animateCounter(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));

    // Interactive Cards Tilt Effect
    const cards = document.querySelectorAll('.stat-card, .glass-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;

            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateZ(0px)';
        });
    });

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Parallax Effect
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        const heroElements = document.querySelectorAll('.hero-bg');
        heroElements.forEach(element => {
            element.style.transform = `translateY(${rate}px)`;
        });
    });

    // Progressive Loading Animation
    function animateOnScroll() {
        const elements = document.querySelectorAll('.animate-on-scroll');

        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('opacity-100', 'translate-y-0');
                element.classList.remove('opacity-0', 'translate-y-10');
            }
        });
    }

    window.addEventListener('scroll', animateOnScroll);

    console.log('🚀 Smart Village Dashboard initialized successfully!');
});
</script>
@endsection
