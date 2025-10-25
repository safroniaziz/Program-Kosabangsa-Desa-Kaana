@extends('layouts.app')

@section('title', 'Pemetaan Potensi Desa - Desa Kaana')

@section('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Mapbox CSS -->
<link href='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css' rel='stylesheet' />

<style>
/* Consistent with LMS template */
.text-gradient {
    background: linear-gradient(to right, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.text-gradient-2 {
    background: linear-gradient(to right, #10b981, #3b82f6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Glass effects - matching other templates */
.glass {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.18);
}

.glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Interactive cards - matching LMS style */
.interactive-card {
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
}

.interactive-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    z-index: 2;
}

/* Animations - consistent with other templates */
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-20px) rotate(5deg); }
    66% { transform: translateY(-10px) rotate(-5deg); }
}

.floating-element, .animate-float {
    animation: float 6s ease-in-out infinite;
}

/* Gradient backgrounds - matching LMS gradients */
.gradient-bg-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.gradient-bg-2 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
.gradient-bg-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
.gradient-bg-4 { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }

/* Stats cards */
.stat-card {
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

/* Charts */
.chart-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Map Section Enhancements */
.map-container {
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.map-glass {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.bg-grid-white {
    background-image: linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
}

/* Interactive Map Controls */
.map-control-active {
    background: linear-gradient(135deg, #10b981, #059669);
    box-shadow: 0 4px 20px rgba(16, 185, 129, 0.4);
    transform: translateY(-2px);
}

.map-control-inactive {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
}

.map-control-inactive:hover {
    background: rgba(255, 255, 255, 0.2);
    color: rgba(255, 255, 255, 0.9);
}

/* Animated Elements */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.float-animation {
    animation: float 3s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.5); }
    50% { box-shadow: 0 0 40px rgba(16, 185, 129, 0.8); }
}

.glow-animation {
    animation: glow 2s ease-in-out infinite;
}

/* Enhanced Mapbox Controls */
.mapboxgl-ctrl-group {
    background: rgba(15, 23, 42, 0.9) !important;
    backdrop-filter: blur(20px) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: 12px !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
}

.mapboxgl-ctrl-group button {
    background: transparent !important;
    color: white !important;
    border: none !important;
}

.mapboxgl-ctrl-group button:hover {
    background: rgba(255, 255, 255, 0.1) !important;
}

/* Custom Mapbox Popup */
.mapboxgl-popup-content {
    background: rgba(15, 23, 42, 0.95) !important;
    backdrop-filter: blur(20px) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: 16px !important;
    color: white !important;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5) !important;
}

.mapboxgl-popup-tip {
    border-top-color: rgba(15, 23, 42, 0.95) !important;
}
</style>
@endsection

@section('content')
<!-- Hero Section - Matching LMS/Home template style -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Dynamic gradient background matching LMS -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-indigo-900 to-purple-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-600/10 via-purple-600/10 to-pink-600/10"></div>
    </div>

    <!-- Enhanced floating elements matching Home template -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-element absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-indigo-400/30 to-purple-600/30 rounded-full blur-2xl animate-float" data-aos="zoom-in" data-aos-delay="1000"></div>
        <div class="floating-element absolute bottom-32 left-1/4 w-40 h-40 bg-gradient-to-br from-blue-400/20 to-cyan-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -3s;" data-aos="zoom-in" data-aos-delay="1200"></div>
        <div class="floating-element absolute top-1/2 right-1/3 w-48 h-48 bg-gradient-to-br from-purple-400/20 to-pink-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -5s;" data-aos="zoom-in" data-aos-delay="1400"></div>
    </div>

    <!-- Grid pattern overlay -->
    <div class="absolute inset-0 opacity-10">
        <div class="w-full h-full" style="background-image: radial-gradient(circle at 20% 80%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 30px 30px;"></div>
    </div>

    <!-- Subtle overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 min-h-screen flex items-center max-w-7xl">
        <div class="mx-auto w-full">
            <div class="text-center space-y-8">
                <!-- Badge matching Home template -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="inline-flex items-center gap-3 glass border border-white/20 px-6 py-3 rounded-full text-white">
                        <div class="w-3 h-3 bg-gradient-to-r from-green-400 to-blue-500 rounded-full animate-pulse"></div>
                        <span class="text-sm font-semibold">📊 Pemetaan Potensi Desa • Data Analytics</span>
                    </div>
                </div>

                <!-- Main heading with gradient matching LMS style -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h1 class="text-5xl lg:text-7xl font-black text-white mb-6 leading-tight">
                        <span class="text-gradient">Pemetaan Potensi</span>
                        <span class="block text-gradient-2 drop-shadow-lg">Desa Kaana</span>
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <p class="text-xl text-gray-200 mb-8 leading-relaxed max-w-4xl mx-auto">
                        Dashboard interaktif dengan <span class="text-cyan-400 font-semibold">visualisasi data real-time</span>,
                        <span class="text-blue-400 font-semibold">analisis demografis</span>, dan
                        <span class="text-purple-400 font-semibold">pemetaan potensi ekonomi</span> untuk pembangunan berkelanjutan.
                    </p>
                </div>

                <!-- Stats with modern design matching Home template -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8 max-w-4xl mx-auto">
                        <div class="text-center glass border border-white/20 rounded-2xl p-6 hover:scale-105 transition-transform interactive-card">
                            <div class="text-3xl font-bold text-cyan-400 mb-2" data-counter="1250">0</div>
                            <div class="text-sm text-gray-300">Total Penduduk</div>
                        </div>
                        <div class="text-center glass border border-white/20 rounded-2xl p-6 hover:scale-105 transition-transform interactive-card">
                            <div class="text-3xl font-bold text-blue-400 mb-2" data-counter="329">0</div>
                            <div class="text-sm text-gray-300">Kepala Keluarga</div>
                        </div>
                        <div class="text-center glass border border-white/20 rounded-2xl p-6 hover:scale-105 transition-transform interactive-card">
                            <div class="text-3xl font-bold text-purple-400 mb-2" data-counter="25">0</div>
                            <div class="text-sm text-gray-300">UMKM Aktif</div>
                        </div>
                        <div class="text-center glass border border-white/20 rounded-2xl p-6 hover:scale-105 transition-transform interactive-card">
                            <div class="text-3xl font-bold text-green-400 mb-2" data-counter="15">0</div>
                            <div class="text-sm text-gray-300">Dusun</div>
                        </div>
                    </div>
                </div>

                <!-- CTA buttons with style matching Home -->
                <div data-aos="fade-up" data-aos-delay="500">
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#statistics" class="group relative bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg overflow-hidden interactive-card">
                            <span class="relative z-10 flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Lihat Statistik
                            </span>
                        </a>
                        <a href="#charts" class="group glass border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/10 transition-all interactive-card">
                            <span class="flex items-center justify-center gap-3">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                </svg>
                                Analisis Data
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20"></div>
        <div class="absolute top-0 left-1/4 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>
    </div>

    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500/20 to-teal-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-300 rounded-2xl text-sm font-semibold mb-6 shadow-lg">
                <span class="w-2 h-2 bg-emerald-400 rounded-full mr-3 animate-pulse"></span>
                🗺️ Peta Interaktif Desa Kaana
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Eksplorasi <span class="bg-gradient-to-r from-emerald-400 via-teal-400 to-blue-400 bg-clip-text text-transparent">Geografis</span>
            </h2>
            <p class="text-xl text-blue-100 max-w-4xl mx-auto leading-relaxed">
                Jelajahi keindahan Desa Kaana melalui peta satelit interaktif dengan teknologi Mapbox. 
                Temukan fasilitas, lokasi strategis, dan pesona alam Pulau Enggano yang memukau.
            </p>
        </div>

        <!-- Main Map Container -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
            <!-- Interactive Map -->
            <div class="xl:col-span-3" data-aos="fade-right">
                <div class="group bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-500">
                    <!-- Map Header -->
                    <div class="relative bg-gradient-to-r from-slate-800/50 via-blue-800/50 to-indigo-800/50 backdrop-blur-sm p-8 border-b border-white/10">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                            <!-- Map Title -->
                            <div class="flex items-center space-x-4">
                                <div class="relative">
                                    <div class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full animate-pulse"></div>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-1">Peta Satelit Desa Kaana</h3>
                                    <p class="text-blue-200 flex items-center">
                                        📍 Pulau Enggano, Bengkulu Utara
                                        <span class="mx-2">•</span>
                                        🌊 Samudra Hindia
                                    </p>
                                </div>
                            </div>

                            <!-- Map Controls -->
                            <div class="flex items-center space-x-3">
                                <div class="flex bg-black/20 backdrop-blur-sm rounded-2xl p-1.5 border border-white/10">
                                    <button id="satellite-btn" class="px-6 py-3 text-sm bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl font-semibold shadow-lg hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 flex items-center space-x-2">
                                        <span>�️</span>
                                        <span>Satelit</span>
                                    </button>
                                    <button id="street-btn" class="px-6 py-3 text-sm text-white/70 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 flex items-center space-x-2">
                                        <span>🗺️</span>
                                        <span>Peta</span>
                                    </button>
                                </div>
                                
                                <!-- Live Status -->
                                <div class="flex items-center space-x-2 bg-green-500/20 backdrop-blur-sm border border-green-400/30 px-4 py-2 rounded-xl">
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    <span class="text-green-300 text-sm font-medium">Live</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map Display -->
                    <div class="relative bg-gray-900">
                        <div id="map" class="w-full h-[600px]"></div>
                        
                        <!-- Map Overlay Info -->
                        <div class="absolute top-6 left-6 bg-black/40 backdrop-blur-md rounded-2xl px-4 py-3 text-white shadow-xl border border-white/10">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                                <div>
                                    <p class="text-sm font-medium">Koordinat GPS</p>
                                    <p class="text-xs text-blue-200">5°21'S, 102°16'E</p>
                                </div>
                            </div>
                        </div>

                        <!-- Map Legend -->
                        <div class="absolute bottom-6 left-6 bg-black/40 backdrop-blur-md rounded-2xl px-4 py-3 text-white shadow-xl border border-white/10">
                            <p class="text-sm font-semibold mb-2">🏢 Fasilitas Desa</p>
                            <div class="space-y-1 text-xs">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                                    <span>Kantor Desa & Pemerintahan</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                    <span>Fasilitas Kesehatan & Pendidikan</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                    <span>Tempat Ibadah & Transportasi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Map Stats -->
                        <div class="absolute top-6 right-6 bg-black/40 backdrop-blur-md rounded-2xl px-4 py-3 text-white shadow-xl border border-white/10">
                            <div class="text-center">
                                <p class="text-2xl font-bold text-emerald-400" data-counter="12">0</p>
                                <p class="text-xs text-blue-200">Km² Luas Area</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Information -->
            <div class="space-y-8" data-aos="fade-left">
                <!-- Location Details -->
                <div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 overflow-hidden shadow-2xl">
                    <div class="bg-gradient-to-r from-indigo-500/20 to-purple-500/20 backdrop-blur-sm p-6 border-b border-white/10">
                        <h4 class="text-xl font-bold text-white flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            📍 Informasi Geografis
                        </h4>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between py-3 bg-white/5 rounded-xl px-4">
                            <span class="text-blue-200 font-medium">🗺️ Koordinat GPS</span>
                            <span class="font-bold text-white">5°21'S, 102°16'E</span>
                        </div>
                        <div class="flex items-center justify-between py-3 bg-white/5 rounded-xl px-4">
                            <span class="text-blue-200 font-medium">⛰️ Ketinggian</span>
                            <span class="font-bold text-emerald-400">15-25 mdpl</span>
                        </div>
                        <div class="flex items-center justify-between py-3 bg-white/5 rounded-xl px-4">
                            <span class="text-blue-200 font-medium">📏 Luas Wilayah</span>
                            <span class="font-bold text-white" data-counter="12">0</span>
                            <span class="font-bold text-white">.5 km²</span>
                        </div>
                        <div class="flex items-center justify-between py-3 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-xl px-4 border border-indigo-400/30">
                            <span class="text-indigo-200 font-medium">🏛️ Kecamatan</span>
                            <span class="font-bold text-indigo-300">Enggano</span>
                        </div>
                    </div>
                </div>

                <!-- Climate Information -->
                <div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 overflow-hidden shadow-2xl">
                    <div class="bg-gradient-to-r from-emerald-500/20 to-teal-500/20 backdrop-blur-sm p-6 border-b border-white/10">
                        <h4 class="text-xl font-bold text-white flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                </svg>
                            </div>
                            🌤️ Kondisi Iklim
                        </h4>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between py-3 bg-white/5 rounded-xl px-4">
                            <span class="text-blue-200 font-medium">🌡️ Suhu Rata-rata</span>
                            <span class="font-bold text-orange-400">26-28°C</span>
                        </div>
                        <div class="flex items-center justify-between py-3 bg-white/5 rounded-xl px-4">
                            <span class="text-blue-200 font-medium">🌧️ Curah Hujan</span>
                            <span class="font-bold text-blue-400">2.500mm/tahun</span>
                        </div>
                        <div class="flex items-center justify-between py-3 bg-white/5 rounded-xl px-4">
                            <span class="text-blue-200 font-medium">💧 Kelembaban</span>
                            <span class="font-bold text-cyan-400">80-85%</span>
                        </div>
                        <div class="flex items-center justify-between py-3 bg-gradient-to-r from-emerald-500/20 to-teal-500/20 rounded-xl px-4 border border-emerald-400/30">
                            <span class="text-emerald-200 font-medium">☀️ Musim Kering</span>
                            <span class="font-bold text-emerald-300">Jun-Sep</span>
                        </div>
                    </div>
                </div>

                <!-- Transportation Access -->
                <div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 overflow-hidden shadow-2xl">
                    <div class="bg-gradient-to-r from-amber-500/20 to-orange-500/20 backdrop-blur-sm p-6 border-b border-white/10">
                        <h4 class="text-xl font-bold text-white flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </div>
                            🚢 Akses Transportasi
                        </h4>
                    </div>
                    <div class="p-6 space-y-4">
                        <!-- Kapal Laut -->
                        <div class="flex items-center p-4 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-2xl border border-blue-400/30 hover:border-blue-300/50 transition-all duration-300 group">
                            <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">🚢</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-bold text-white text-lg">Kapal Laut Regular</div>
                                <div class="text-blue-200 text-sm">2x seminggu dari Bengkulu • 6-8 jam perjalanan</div>
                                <div class="text-xs text-blue-300 mt-1">📅 Selasa & Jumat</div>
                            </div>
                        </div>

                        <!-- Speedboat -->
                        <div class="flex items-center p-4 bg-gradient-to-r from-emerald-500/20 to-teal-500/20 rounded-2xl border border-emerald-400/30 hover:border-emerald-300/50 transition-all duration-300 group">
                            <div class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">⚡</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-bold text-white text-lg">Speedboat Express</div>
                                <div class="text-emerald-200 text-sm">Charter khusus • 3-4 jam perjalanan</div>
                                <div class="text-xs text-emerald-300 mt-1">💰 Biaya lebih tinggi</div>
                            </div>
                        </div>

                        <!-- Pesawat -->
                        <div class="flex items-center p-4 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-2xl border border-purple-400/30 hover:border-purple-300/50 transition-all duration-300 group">
                            <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">✈️</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-bold text-white text-lg">Pesawat Charter</div>
                                <div class="text-purple-200 text-sm">Landing strip kecil • 45 menit terbang</div>
                                <div class="text-xs text-purple-300 mt-1">🌤️ Tergantung cuaca</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live Map Statistics -->
                <div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 overflow-hidden shadow-2xl">
                    <div class="bg-gradient-to-r from-rose-500/20 to-pink-500/20 backdrop-blur-sm p-6 border-b border-white/10">
                        <h4 class="text-xl font-bold text-white flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-rose-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            📊 Statistik Wilayah
                        </h4>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center bg-white/5 rounded-2xl p-4">
                                <div class="text-3xl mb-2">🏝️</div>
                                <div class="text-2xl font-bold text-blue-400" data-counter="1">0</div>
                                <div class="text-xs text-blue-200">Pulau Utama</div>
                            </div>
                            <div class="text-center bg-white/5 rounded-2xl p-4">
                                <div class="text-3xl mb-2">🏘️</div>
                                <div class="text-2xl font-bold text-green-400" data-counter="15">0</div>
                                <div class="text-xs text-green-200">Dusun</div>
                            </div>
                            <div class="text-center bg-white/5 rounded-2xl p-4">
                                <div class="text-3xl mb-2">🌊</div>
                                <div class="text-2xl font-bold text-cyan-400" data-counter="8">0</div>
                                <div class="text-xs text-cyan-200">Km Pantai</div>
                            </div>
                            <div class="text-center bg-white/5 rounded-2xl p-4">
                                <div class="text-3xl mb-2">🌴</div>
                                <div class="text-2xl font-bold text-yellow-400" data-counter="65">0</div>
                                <div class="text-xs text-yellow-200">% Hutan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Highlights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16" data-aos="fade-up" data-aos-delay="400">
            <!-- Interactive Features -->
            <div class="text-center bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 group">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Peta Interaktif</h3>
                <p class="text-blue-200">Jelajahi setiap sudut desa dengan kontrol zoom, satelit, dan marker fasilitas</p>
            </div>

            <!-- Real-time Data -->
            <div class="text-center bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 group">
                <div class="w-20 h-20 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Data Real-time</h3>
                <p class="text-emerald-200">Informasi geografis dan iklim yang selalu ter-update dengan akurat</p>
            </div>

            <!-- Multi Platform -->
            <div class="text-center bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 group">
                <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Responsif</h3>
                <p class="text-orange-200">Optimal di semua perangkat - desktop, tablet, hingga smartphone</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section - Clean modern design -->
<section id="statistics" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4">
                📊 Data Statistik Desa
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                <span class="text-gradient">Gambaran Umum</span> Demografi
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Analisis mendalam tentang kondisi demografis, sosial, dan ekonomi masyarakat Desa Kaana
            </p>
        </div>

        <!-- Main Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16" data-aos="fade-up" data-aos-delay="200">
            <!-- Total Penduduk -->
            <div class="glass-card rounded-2xl p-8 text-center stat-card">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-blue-600 mb-2" data-counter="1250">0</div>
                <div class="text-lg font-semibold text-gray-900 mb-1">Total Penduduk</div>
                <div class="text-sm text-gray-500">201/km²</div>
            </div>

            <!-- Kartu Keluarga -->
            <div class="glass-card rounded-2xl p-8 text-center stat-card">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 4h4"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-green-600 mb-2" data-counter="329">0</div>
                <div class="text-lg font-semibold text-gray-900 mb-1">Kepala Keluarga</div>
                <div class="text-sm text-gray-500">3.8 orang/KK</div>
            </div>

            <!-- UMKM -->
            <div class="glass-card rounded-2xl p-8 text-center stat-card">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h1a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-purple-600 mb-2" data-counter="25">0</div>
                <div class="text-lg font-semibold text-gray-900 mb-1">UMKM Aktif</div>
                <div class="text-sm text-gray-500">Berkembang</div>
            </div>

            <!-- Dusun -->
            <div class="glass-card rounded-2xl p-8 text-center stat-card">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-orange-600 mb-2" data-counter="15">0</div>
                <div class="text-lg font-semibold text-gray-900 mb-1">Wilayah Dusun</div>
                <div class="text-sm text-gray-500">Area</div>
            </div>
        </div>

        <!-- Quick Insights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="400">
            <div class="glass-card rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-blue-600 text-xl">👥</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Demografi Seimbang</h3>
                        <p class="text-sm text-blue-600">52.2% : 47.8%</p>
                    </div>
                </div>
                <p class="text-gray-600">
                    Distribusi gender yang ideal mendukung pembangunan berkelanjutan dengan partisipasi yang seimbang.
                </p>
            </div>

            <div class="glass-card rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-green-600 text-xl">📈</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Usia Produktif</h3>
                        <p class="text-sm text-green-600">54.4% aktif</p>
                    </div>
                </div>
                <p class="text-gray-600">
                    Mayoritas penduduk dalam usia produktif siap mendukung pertumbuhan ekonomi desa.
                </p>
            </div>

            <div class="glass-card rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-purple-600 text-xl">🎓</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Pendidikan</h3>
                        <p class="text-sm text-purple-600">4.2% perguruan tinggi</p>
                    </div>
                </div>
                <p class="text-gray-600">
                    Tingkat pendidikan tinggi mendukung pengembangan SDM berkualitas untuk inovasi desa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Charts Section -->
<section id="charts" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium mb-4">
                📈 Analisis Visual Data
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                <span class="text-gradient-2">Data Visual</span> Interaktif
            </h2>
            <p class="text-xl text-gray-600">Grafik dan diagram untuk pemahaman data yang lebih mendalam</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Gender Distribution -->
            <div class="chart-container" data-aos="fade-right">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Distribusi Gender</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Real-time</span>
                </div>

                <div class="flex items-center justify-center mb-8">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 52%, #ec4899 52% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900" data-counter="1250">0</div>
                                <div class="text-sm text-gray-600">Total</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 text-center">
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <div class="flex items-center justify-center mb-2">
                            <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                            <span class="font-semibold">Laki-laki</span>
                        </div>
                        <div class="text-2xl font-bold text-blue-600" data-counter="652">0</div>
                        <div class="text-sm text-gray-500">52.2%</div>
                    </div>
                    <div class="bg-pink-50 p-4 rounded-xl">
                        <div class="flex items-center justify-center mb-2">
                            <div class="w-4 h-4 bg-pink-500 rounded mr-2"></div>
                            <span class="font-semibold">Perempuan</span>
                        </div>
                        <div class="text-2xl font-bold text-pink-600" data-counter="598">0</div>
                        <div class="text-sm text-gray-500">47.8%</div>
                    </div>
                </div>
            </div>

            <!-- Age Groups -->
            <div class="chart-container" data-aos="fade-left">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Kelompok Usia</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Distribusi</span>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-20">Balita</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 20%;">83</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">6.6%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-20">Anak</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 25%;">87</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">7.0%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-20">Remaja</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 35%;">121</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">9.7%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-20">Dewasa</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 70%;">680</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">54.4%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-20">Lansia</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 22%;">279</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">22.3%</span>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-orange-50 rounded-xl">
                    <div class="text-sm text-orange-800">
                        <strong>Bonus Demografi:</strong> Rasio ketergantungan yang ideal mendukung produktivitas tinggi
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Extended Demographics Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-medium mb-4">
                📋 Profil Sosial Ekonomi
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                <span class="text-gradient">Analisis</span> Demografis Lengkap
            </h2>
            <p class="text-xl text-gray-600">Data komprehensif tentang pendidikan, pekerjaan, agama, dan status sosial masyarakat</p>
        </div>

        <!-- Education & Employment Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Education Level Chart -->
            <div class="chart-container" data-aos="fade-right">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Tingkat Pendidikan</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Bar Chart</span>
                </div>

                <!-- Vertical Bar Chart -->
                <div class="flex items-end justify-between h-64 p-4 bg-gray-50 rounded-xl mb-6">
                    <div class="flex flex-col items-center group">
                        <div class="relative w-12 bg-gray-200 rounded-t h-6">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-red-500 to-red-400 rounded-t transition-all duration-500 group-hover:from-red-600 group-hover:to-red-500 h-full"></div>
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-700">150</div>
                        </div>
                        <div class="mt-2 text-xs text-gray-600 text-center leading-tight">Tidak<br>Sekolah</div>
                        <div class="mt-1 text-xs font-bold text-red-600">12%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-12 bg-gray-200 rounded-t h-12">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-orange-500 to-orange-400 rounded-t transition-all duration-500 group-hover:from-orange-600 group-hover:to-orange-500 h-full"></div>
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-700">300</div>
                        </div>
                        <div class="mt-2 text-xs text-gray-600 text-center leading-tight">SD/<br>Sederajat</div>
                        <div class="mt-1 text-xs font-bold text-orange-600">24%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-12 bg-gray-200 rounded-t h-16">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-yellow-500 to-yellow-400 rounded-t transition-all duration-500 group-hover:from-yellow-600 group-hover:to-yellow-500 h-full"></div>
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-700">400</div>
                        </div>
                        <div class="mt-2 text-xs text-gray-600 text-center leading-tight">SMP/<br>Sederajat</div>
                        <div class="mt-1 text-xs font-bold text-yellow-600">32%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-12 bg-gray-200 rounded-t h-12">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-green-500 to-green-400 rounded-t transition-all duration-500 group-hover:from-green-600 group-hover:to-green-500 h-full"></div>
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-700">300</div>
                        </div>
                        <div class="mt-2 text-xs text-gray-600 text-center leading-tight">SMA/<br>Sederajat</div>
                        <div class="mt-1 text-xs font-bold text-green-600">24%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-12 bg-gray-200 rounded-t h-3">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t transition-all duration-500 group-hover:from-blue-600 group-hover:to-blue-500 h-full"></div>
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-700">75</div>
                        </div>
                        <div class="mt-2 text-xs text-gray-600 text-center leading-tight">Diploma/<br>S1</div>
                        <div class="mt-1 text-xs font-bold text-blue-600">6%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-12 bg-gray-200 rounded-t h-1">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-purple-500 to-purple-400 rounded-t transition-all duration-500 group-hover:from-purple-600 group-hover:to-purple-500 h-full"></div>
                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-700">25</div>
                        </div>
                        <div class="mt-2 text-xs text-gray-600 text-center leading-tight">S2/<br>S3</div>
                        <div class="mt-1 text-xs font-bold text-purple-600">2%</div>
                    </div>
                </div>                <div class="mt-6 p-4 bg-green-50 rounded-xl">
                    <div class="text-sm text-green-800">
                        <strong>Angka Melek Huruf:</strong> 88% penduduk mampu baca tulis
                    </div>
                </div>
            </div>

            <!-- Employment Status Chart -->
            <div class="chart-container" data-aos="fade-left">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Jenis Pekerjaan</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Horizontal Bar</span>
                </div>

                <!-- Horizontal Bar Chart with Modern Style -->
                <div class="space-y-5 mb-6">
                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">Petani/Nelayan</span>
                            <span class="text-sm font-bold text-green-600">45% (562)</span>
                        </div>
                        <div class="h-6 bg-gray-100 rounded-lg overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-green-400 via-green-500 to-green-600 rounded-lg shadow-sm transition-all duration-700 group-hover:shadow-md" style="width: 45%;"></div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">Wiraswasta</span>
                            <span class="text-sm font-bold text-blue-600">25% (312)</span>
                        </div>
                        <div class="h-6 bg-gray-100 rounded-lg overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 rounded-lg shadow-sm transition-all duration-700 group-hover:shadow-md" style="width: 25%;"></div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">Buruh/Karyawan</span>
                            <span class="text-sm font-bold text-orange-600">15% (187)</span>
                        </div>
                        <div class="h-6 bg-gray-100 rounded-lg overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 rounded-lg shadow-sm transition-all duration-700 group-hover:shadow-md" style="width: 15%;"></div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">PNS/TNI/Polri</span>
                            <span class="text-sm font-bold text-purple-600">8% (100)</span>
                        </div>
                        <div class="h-6 bg-gray-100 rounded-lg overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 rounded-lg shadow-sm transition-all duration-700 group-hover:shadow-md" style="width: 8%;"></div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">Tidak Bekerja</span>
                            <span class="text-sm font-bold text-gray-600">7% (89)</span>
                        </div>
                        <div class="h-6 bg-gray-100 rounded-lg overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 rounded-lg shadow-sm transition-all duration-700 group-hover:shadow-md" style="width: 7%;"></div>
                        </div>
                    </div>
                </div>                <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                    <div class="text-sm text-blue-800">
                        <strong>Tingkat Partisipasi:</strong> 93% penduduk usia kerja aktif bekerja
                    </div>
                </div>
            </div>
        </div>

        <!-- Religion & Social Status Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Religion Distribution -->
            <div class="chart-container" data-aos="fade-right" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Distribusi Agama</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Keyakinan</span>
                </div>

                <div class="flex items-center justify-center mb-8">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#10b981 0% 85%, #f59e0b 85% 95%, #ef4444 95% 98%, #8b5cf6 98% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-xl font-bold text-gray-900">100%</div>
                                <div class="text-sm text-gray-600">Penduduk</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-500 rounded mr-3"></div>
                            <span class="font-medium">Islam</span>
                        </div>
                        <span class="text-sm font-semibold">1,062 (85%)</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-yellow-500 rounded mr-3"></div>
                            <span class="font-medium">Kristen Protestan</span>
                        </div>
                        <div class="text-sm font-semibold">125 (10%)</div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded mr-3"></div>
                            <span class="font-medium">Katolik</span>
                        </div>
                        <div class="text-sm font-semibold">38 (3%)</div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-purple-500 rounded mr-3"></div>
                            <span class="font-medium">Hindu/Buddha/Lainnya</span>
                        </div>
                        <div class="text-sm font-semibold">25 (2%)</div>
                    </div>
                </div>
            </div>

            <!-- Social Status Chart -->
            <div class="chart-container" data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Status Sosial Ekonomi</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Kategori</span>
                </div>

                <div class="space-y-4 mb-6">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Mampu</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 35%;">437</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">35%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Sedang</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 50%;">625</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">50%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Kurang Mampu</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 12%;">150</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">12%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Miskin</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 3%;">38</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">3%</span>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-orange-50 rounded-xl">
                    <div class="text-sm text-orange-800">
                        <strong>Program Bantuan:</strong> 74 KK menerima bantuan sosial pemerintah
                    </div>
                </div>
            </div>
        </div>

        <!-- Housing & Infrastructure Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Housing Status -->
            <div class="chart-container" data-aos="fade-right" data-aos-delay="400">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Status Kepemilikan Rumah</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Properti</span>
                </div>

                <div class="space-y-4 mb-6">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Milik Sendiri</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 78%;">257</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">78%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Kontrak/Sewa</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 15%;">49</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">15%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Menumpang</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 5%;">16</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">5%</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 w-32">Lainnya</span>
                        <div class="flex-1 mx-4">
                            <div class="h-8 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center text-white text-sm font-medium" style="width: 2%;">7</div>
                            </div>
                        </div>
                        <span class="text-sm font-semibold text-gray-600 w-12">2%</span>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-green-50 rounded-xl">
                    <div class="text-sm text-green-800">
                        <strong>Kelayakan Huni:</strong> 85% rumah dalam kondisi layak huni
                    </div>
                </div>
            </div>

            <!-- Infrastructure Access -->
            <div class="chart-container" data-aos="fade-left" data-aos-delay="400">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Akses Infrastruktur</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Fasilitas</span>
                </div>

                <div class="space-y-4 mb-6">
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-green-600 text-sm">💡</span>
                            </div>
                            <span class="font-medium">Listrik PLN</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-green-600">95%</div>
                            <div class="text-xs text-gray-500">312 KK</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-blue-600 text-sm">💧</span>
                            </div>
                            <span class="font-medium">Air Bersih</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-blue-600">78%</div>
                            <div class="text-xs text-gray-500">257 KK</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-purple-600 text-sm">📶</span>
                            </div>
                            <span class="font-medium">Internet/HP</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-purple-600">82%</div>
                            <div class="text-xs text-gray-500">270 KK</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                <span class="text-orange-600 text-sm">🚗</span>
                            </div>
                            <span class="font-medium">Jalan Aspal</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-orange-600">65%</div>
                            <div class="text-xs text-gray-500">Area</div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                    <div class="text-sm text-blue-800">
                        <strong>Indeks Pembangunan:</strong> Skor 7.2/10 kategori berkembang
                    </div>
                </div>
            </div>
        </div>

        <!-- Health & Transportation Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Health Facilities -->
            <div class="chart-container" data-aos="fade-right" data-aos-delay="600">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Fasilitas Kesehatan</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Akses</span>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="text-center p-4 bg-gradient-to-br from-red-50 to-pink-50 rounded-xl border border-red-100">
                        <div class="text-2xl mb-2">🏥</div>
                        <div class="text-2xl font-bold text-red-600 mb-1">1</div>
                        <div class="text-xs text-gray-600">Puskesmas</div>
                    </div>
                    <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl border border-blue-100">
                        <div class="text-2xl mb-2">💊</div>
                        <div class="text-2xl font-bold text-blue-600 mb-1">3</div>
                        <div class="text-xs text-gray-600">Posyandu</div>
                    </div>
                    <div class="text-center p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-100">
                        <div class="text-2xl mb-2">⚕️</div>
                        <div class="text-2xl font-bold text-green-600 mb-1">2</div>
                        <div class="text-xs text-gray-600">Bidan Desa</div>
                    </div>
                    <div class="text-center p-4 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-xl border border-yellow-100">
                        <div class="text-2xl mb-2">🚑</div>
                        <div class="text-2xl font-bold text-yellow-600 mb-1">85%</div>
                        <div class="text-xs text-gray-600">Cakupan BPJS</div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <span class="text-sm font-medium">Imunisasi Dasar</span>
                        <span class="text-sm font-bold text-green-600">92%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <span class="text-sm font-medium">KB Aktif</span>
                        <span class="text-sm font-bold text-blue-600">78%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                        <span class="text-sm font-medium">Gizi Balita Baik</span>
                        <span class="text-sm font-bold text-purple-600">89%</span>
                    </div>
                </div>
            </div>

            <!-- Transportation & Mobility -->
            <div class="chart-container" data-aos="fade-left" data-aos-delay="600">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Transportasi & Mobilitas</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Donut Chart</span>
                </div>

                <!-- Donut Chart for Vehicle Ownership -->
                <div class="flex items-center justify-center mb-6">
                    <div class="relative w-40 h-40">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 65%, #10b981 65% 85%, #f59e0b 85% 92%, #ef4444 92% 100%);"></div>
                        <div class="absolute inset-6 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-lg font-bold text-gray-900">329</div>
                                <div class="text-xs text-gray-600">Kendaraan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-3 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-sm font-medium">Sepeda Motor</span>
                        </div>
                        <span class="text-sm font-bold text-blue-600">214 (65%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-sm font-medium">Sepeda</span>
                        </div>
                        <span class="text-sm font-bold text-green-600">66 (20%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <span class="text-sm font-medium">Mobil</span>
                        </div>
                        <span class="text-sm font-bold text-yellow-600">23 (7%)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-sm font-medium">Truck/Angkutan</span>
                        </div>
                        <span class="text-sm font-bold text-red-600">26 (8%)</span>
                    </div>
                </div>

                <div class="p-4 bg-indigo-50 rounded-xl">
                    <div class="text-sm text-indigo-800">
                        <strong>Akses Transportasi:</strong> Angkutan umum tersedia 2x sehari ke kota
                    </div>
                </div>
            </div>
        </div>

        <!-- Education Participation & Digital Literacy -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Education Participation by Age -->
            <div class="chart-container" data-aos="fade-right" data-aos-delay="800">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Partisipasi Pendidikan</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Vertical Bar</span>
                </div>

                <!-- Vertical Bar Chart -->
                <div class="flex items-end justify-between h-56 p-4 bg-gray-50 rounded-xl mb-6">
                    <div class="flex flex-col items-center group">
                        <div class="relative w-16 bg-gray-200 rounded-t h-32">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-green-500 to-green-400 rounded-t transition-all duration-700 group-hover:from-green-600 group-hover:to-green-500 h-full"></div>
                            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 text-sm font-bold text-gray-700">45</div>
                        </div>
                        <div class="mt-3 text-sm text-gray-700 font-medium text-center">TK</div>
                        <div class="mt-1 text-sm font-bold text-green-600">95%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-16 bg-gray-200 rounded-t h-36">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t transition-all duration-700 group-hover:from-blue-600 group-hover:to-blue-500 h-full"></div>
                            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 text-sm font-bold text-gray-700">89</div>
                        </div>
                        <div class="mt-3 text-sm text-gray-700 font-medium text-center">SD</div>
                        <div class="mt-1 text-sm font-bold text-blue-600">98%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-16 bg-gray-200 rounded-t h-28">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-yellow-500 to-yellow-400 rounded-t transition-all duration-700 group-hover:from-yellow-600 group-hover:to-yellow-500 h-full"></div>
                            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 text-sm font-bold text-gray-700">69</div>
                        </div>
                        <div class="mt-3 text-sm text-gray-700 font-medium text-center">SMP</div>
                        <div class="mt-1 text-sm font-bold text-yellow-600">92%</div>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="relative w-16 bg-gray-200 rounded-t h-24">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-red-500 to-red-400 rounded-t transition-all duration-700 group-hover:from-red-600 group-hover:to-red-500 h-full"></div>
                            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 text-sm font-bold text-gray-700">52</div>
                        </div>
                        <div class="mt-3 text-sm text-gray-700 font-medium text-center">SMA</div>
                        <div class="mt-1 text-sm font-bold text-red-600">88%</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="text-center p-3 bg-green-50 rounded-lg">
                        <div class="text-lg font-bold text-green-600">255</div>
                        <div class="text-xs text-gray-600">Total Siswa Aktif</div>
                    </div>
                    <div class="text-center p-3 bg-blue-50 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">94%</div>
                        <div class="text-xs text-gray-600">Rata-rata Partisipasi</div>
                    </div>
                </div>
            </div>            <!-- Digital Literacy & Technology -->
            <div class="chart-container" data-aos="fade-left" data-aos-delay="800">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Literasi Digital</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Progress</span>
                </div>

                <div class="space-y-6 mb-6">
                    <!-- Internet Usage -->
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Penggunaan Internet</span>
                            <span class="text-sm font-bold text-blue-600">67%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-3 rounded-full transition-all duration-700" style="width: 67%"></div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Media Sosial Aktif</span>
                            <span class="text-sm font-bold text-green-600">73%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-3 rounded-full transition-all duration-700" style="width: 73%"></div>
                        </div>
                    </div>

                    <!-- E-commerce -->
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Belanja Online</span>
                            <span class="text-sm font-bold text-purple-600">45%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-purple-500 to-violet-500 h-3 rounded-full transition-all duration-700" style="width: 45%"></div>
                        </div>
                    </div>

                    <!-- Digital Banking -->
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Mobile Banking</span>
                            <span class="text-sm font-bold text-orange-600">38%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-orange-500 to-red-500 h-3 rounded-full transition-all duration-700" style="width: 38%"></div>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl">
                    <div class="text-sm text-indigo-800">
                        <strong>Indeks Digital:</strong> 5.8/10 - Kategori berkembang menuju digital
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Statistics -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-white" data-aos="fade-up" data-aos-delay="600">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold mb-2">Ringkasan Indeks Pembangunan Desa</h3>
                <p class="text-blue-100">Penilaian komprehensif berdasarkan berbagai indikator sosial ekonomi</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="72">0</div>
                    <div class="text-sm text-blue-100">Indeks Pembangunan</div>
                    <div class="text-xs text-blue-200">Skor /100</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="85">0</div>
                    <div class="text-sm text-blue-100">Kesejahteraan</div>
                    <div class="text-xs text-blue-200">Persentase</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="88">0</div>
                    <div class="text-sm text-blue-100">Melek Huruf</div>
                    <div class="text-xs text-blue-200">Persentase</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="93">0</div>
                    <div class="text-sm text-blue-100">Partisipasi Kerja</div>
                    <div class="text-xs text-blue-200">Persentase</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Counter Animation
    function animateCounter(element, target, duration = 2000) {
        const start = 0;
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function
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

    // Initialize counters with intersection observer
    const counters = document.querySelectorAll('[data-counter]');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-counter'));
                animateCounter(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));

    // Smooth scrolling for anchor links
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

    console.log('🎯 Mapping Dashboard initialized successfully!');
});
</script>

<!-- Mapbox JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mapbox Access Token - Token publik yang valid
    mapboxgl.accessToken = 'pk.eyJ1IjoianVydXNhbmtvZGluZyIsImEiOiJjbWNxcGYzM28wbGxtMm1vcjg1N3ptdDlmIn0.9oLmVq3VtghRi3MlaWFRyA';

    // Initialize map dengan satellite view hijau natural
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-v9', // Satelit natural dengan warna hijau
        center: [102.2615, -5.3502], // Longitude, Latitude Desa Kaana, Enggano
        zoom: 13,
        pitch: 0,
        bearing: 0
    });

    // Add navigation controls
    map.addControl(new mapboxgl.NavigationControl(), 'top-right');

    // Add fullscreen control
    map.addControl(new mapboxgl.FullscreenControl(), 'top-right');

    // Add scale control
    map.addControl(new mapboxgl.ScaleControl({
        maxWidth: 100,
        unit: 'metric'
    }), 'bottom-left');

    // Custom HTML marker untuk Desa Kaana
    const mainMarkerEl = document.createElement('div');
    mainMarkerEl.innerHTML = `
        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full flex items-center justify-center text-white shadow-xl border-4 border-white transform transition-all hover:scale-110" style="font-size: 20px;">
            🏘️
        </div>
    `;
    mainMarkerEl.style.cursor = 'pointer';

    const mainMarker = new mapboxgl.Marker(mainMarkerEl)
        .setLngLat([102.2615, -5.3502])
        .addTo(map);

    mainMarker.setPopup(new mapboxgl.Popup({
        offset: 30,
        closeButton: true,
        className: 'custom-popup'
    }).setHTML(`
        <div class="p-4 min-w-64">
            <div class="text-center border-b border-gray-200 pb-3 mb-3">
                <h3 class="font-bold text-xl text-gray-900 flex items-center justify-center">
                    <span class="mr-2">🏘️</span>Desa Kaana
                </h3>
                <p class="text-sm text-green-600 font-medium">Pulau Enggano, Bengkulu Utara</p>
            </div>
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div class="bg-green-50 p-2 rounded text-center">
                    <div class="text-green-700 font-bold">👥 1.250</div>
                    <div class="text-xs text-green-600">Jiwa</div>
                </div>
                <div class="bg-blue-50 p-2 rounded text-center">
                    <div class="text-blue-700 font-bold">🏠 329</div>
                    <div class="text-xs text-blue-600">Keluarga</div>
                </div>
                <div class="bg-purple-50 p-2 rounded text-center">
                    <div class="text-purple-700 font-bold">📏 12.5</div>
                    <div class="text-xs text-purple-600">km²</div>
                </div>
                <div class="bg-orange-50 p-2 rounded text-center">
                    <div class="text-orange-700 font-bold">🌊 8</div>
                    <div class="text-xs text-orange-600">km Pantai</div>
                </div>
            </div>
        </div>
    `));

    // Locations dengan marker custom hijau
    const locations = [
        {
            coords: [102.2620, -5.3505],
            title: "Kantor Desa",
            description: "Pusat Pemerintahan Desa",
            emoji: "🏛️",
            color: "from-red-500 to-red-600",
            details: "Melayani administrasi dan pelayanan publik"
        },
        {
            coords: [102.2610, -5.3500],
            title: "Puskesmas Kaana",
            description: "Fasilitas Kesehatan Utama",
            emoji: "🏥",
            color: "from-green-500 to-emerald-600",
            details: "Pelayanan kesehatan 24 jam"
        },
        {
            coords: [102.2625, -5.3510],
            title: "SDN Kaana",
            description: "Sekolah Dasar Negeri",
            emoji: "🏫",
            color: "from-yellow-500 to-amber-600",
            details: "156 siswa aktif"
        },
        {
            coords: [102.2605, -5.3495],
            title: "Pelabuhan Kaana",
            description: "Akses Transportasi Laut",
            emoji: "⚓",
            color: "from-blue-500 to-cyan-600",
            details: "Kapal 2x seminggu"
        },
        {
            coords: [102.2630, -5.3515],
            title: "Masjid Al-Ikhlas",
            description: "Tempat Ibadah Utama",
            emoji: "🕌",
            color: "from-emerald-500 to-teal-600",
            details: "Kapasitas 200 jamaah"
        }
    ];

    locations.forEach(location => {
        const markerEl = document.createElement('div');
        markerEl.innerHTML = `
            <div class="w-10 h-10 bg-gradient-to-br ${location.color} rounded-full flex items-center justify-center text-white shadow-lg border-2 border-white transform transition-all hover:scale-110" style="font-size: 14px;">
                ${location.emoji}
            </div>
        `;
        markerEl.style.cursor = 'pointer';

        new mapboxgl.Marker(markerEl)
            .setLngLat(location.coords)
            .setPopup(new mapboxgl.Popup({
                offset: 25,
                closeButton: true,
                className: 'custom-popup'
            }).setHTML(`
                <div class="p-4 min-w-48">
                    <h4 class="font-bold text-lg text-gray-900 flex items-center mb-2">
                        <span class="mr-2">${location.emoji}</span>
                        ${location.title}
                    </h4>
                    <p class="text-sm text-gray-600 mb-3">${location.description}</p>
                    <div class="bg-green-50 border border-green-200 p-2 rounded">
                        <div class="text-xs text-green-700">💡 ${location.details}</div>
                    </div>
                </div>
            `))
            .addTo(map);
    });

    // Enhanced Toggle buttons functionality with new styling
    const satelliteBtn = document.getElementById('satellite-btn');
    const streetBtn = document.getElementById('street-btn');

    function setActiveButton(activeBtn, inactiveBtn) {
        // Remove inactive classes from active button
        activeBtn.classList.remove('map-control-inactive');
        activeBtn.classList.add('map-control-active');
        
        // Add inactive classes to inactive button  
        inactiveBtn.classList.remove('map-control-active');
        inactiveBtn.classList.add('map-control-inactive');
    }

    satelliteBtn.addEventListener('click', function() {
        map.setStyle('mapbox://styles/mapbox/satellite-v9');
        setActiveButton(satelliteBtn, streetBtn);
        
        // Add glow effect
        satelliteBtn.classList.add('glow-animation');
        setTimeout(() => {
            satelliteBtn.classList.remove('glow-animation');
        }, 2000);
        
        console.log('🛰️ Switched to Satellite View');
    });

    streetBtn.addEventListener('click', function() {
        map.setStyle('mapbox://styles/mapbox/streets-v12');
        setActiveButton(streetBtn, satelliteBtn);
        
        console.log('🗺️ Switched to Street View');
    });

    // Show popup untuk marker utama setelah loading
    setTimeout(() => {
        mainMarker.getPopup().addTo(map);
    }, 1500);

    console.log('🗺️ Mapbox Satellite Map initialized for Desa Kaana, Enggano - Natural Green View');
});
</script>
@endsection
