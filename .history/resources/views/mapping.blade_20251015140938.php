@extends('layouts.app')

@section('title', 'Pemetaan Potensi Desa - Desa Kaana')

@section('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

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
<section class="py-20 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium mb-4">
                🗺️ Peta Interaktif
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Lokasi <span class="text-gradient">Desa Kaana</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Peta interaktif menunjukkan lokasi geografis Desa Kaana di Pulau Enggano, Kabupaten Bengkulu Utara
            </p>
        </div>

        <!-- Map Container -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Map -->
            <div class="lg:col-span-2" data-aos="fade-right">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Peta Desa Kaana</h3>
                                    <p class="text-sm text-gray-600">Pulau Enggano, Bengkulu Utara</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button id="satellite-btn" class="px-4 py-2 text-sm bg-white border border-blue-200 text-blue-700 rounded-lg hover:bg-blue-50 transition-all shadow-sm font-medium">
                                    📡 Satelit
                                </button>
                                <button id="street-btn" class="px-4 py-2 text-sm bg-blue-100 border border-blue-200 text-blue-700 rounded-lg hover:bg-blue-200 transition-all shadow-sm font-medium">
                                    🗺️ Peta
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div id="map" class="w-full h-96"></div>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 text-xs text-gray-700 shadow-lg">
                            <strong>Koordinat:</strong> 5°21'S, 102°16'E
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Info -->
            <div class="space-y-6" data-aos="fade-left">
                <!-- Location Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-4 border-b border-gray-100">
                        <h4 class="text-lg font-bold text-gray-900 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            Informasi Lokasi
                        </h4>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex items-center justify-between py-2">
                            <span class="text-gray-600 text-sm">Koordinat</span>
                            <span class="font-semibold text-gray-900 text-sm">5°21'S, 102°16'E</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-gray-50">
                            <span class="text-gray-600 text-sm">Ketinggian</span>
                            <span class="font-semibold text-gray-900 text-sm">15-25 mdpl</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-gray-50">
                            <span class="text-gray-600 text-sm">Luas Area</span>
                            <span class="font-semibold text-gray-900 text-sm">12.5 km²</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-gray-50">
                            <span class="text-gray-600 text-sm">Kecamatan</span>
                            <span class="font-semibold text-indigo-600 text-sm">Enggano</span>
                        </div>
                    </div>
                </div>

                <!-- Weather Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 p-4 border-b border-gray-100">
                        <h4 class="text-lg font-bold text-gray-900 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                </svg>
                            </div>
                            Kondisi Iklim
                        </h4>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex items-center justify-between py-2">
                            <span class="text-gray-600 text-sm">Suhu Rata-rata</span>
                            <span class="font-semibold text-gray-900 text-sm">26-28°C</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-gray-50">
                            <span class="text-gray-600 text-sm">Curah Hujan</span>
                            <span class="font-semibold text-gray-900 text-sm">2.500mm/tahun</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-gray-50">
                            <span class="text-gray-600 text-sm">Kelembaban</span>
                            <span class="font-semibold text-gray-900 text-sm">80-85%</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-t border-gray-50">
                            <span class="text-gray-600 text-sm">Musim Kering</span>
                            <span class="font-semibold text-emerald-600 text-sm">Jun-Sep</span>
                        </div>
                    </div>
                </div>

                <!-- Access Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 border-b border-gray-100">
                        <h4 class="text-lg font-bold text-gray-900 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-amber-500 to-orange-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </div>
                            Akses Transportasi
                        </h4>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex items-center p-3 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-100">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center mr-3">🚢</div>
                            <div class="flex-1">
                                <div class="font-semibold text-blue-900 text-sm">Kapal Laut</div>
                                <div class="text-xs text-blue-700">2x seminggu dari Bengkulu</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl border border-emerald-100">
                            <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">⚡</div>
                            <div class="flex-1">
                                <div class="font-semibold text-emerald-900 text-sm">Speedboat</div>
                                <div class="text-xs text-emerald-700">3-4 jam perjalanan</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-xl border border-amber-100">
                            <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-yellow-600 rounded-lg flex items-center justify-center mr-3">✈️</div>
                            <div class="flex-1">
                                <div class="font-semibold text-amber-900 text-sm">Pesawat Kecil</div>
                                <div class="text-xs text-amber-700">Insidental (cuaca baik)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center glass rounded-xl p-6">
                <div class="text-3xl mb-2">🏝️</div>
                <div class="text-2xl font-bold text-blue-600" data-counter="1">0</div>
                <div class="text-sm text-gray-600">Pulau Utama</div>
            </div>
            <div class="text-center glass rounded-xl p-6">
                <div class="text-3xl mb-2">🏘️</div>
                <div class="text-2xl font-bold text-green-600" data-counter="15">0</div>
                <div class="text-sm text-gray-600">Dusun</div>
            </div>
            <div class="text-center glass rounded-xl p-6">
                <div class="text-3xl mb-2">🌊</div>
                <div class="text-2xl font-bold text-indigo-600" data-counter="8">0</div>
                <div class="text-sm text-gray-600">Km Pantai</div>
            </div>
            <div class="text-center glass rounded-xl p-6">
                <div class="text-3xl mb-2">🌴</div>
                <div class="text-2xl font-bold text-yellow-600" data-counter="65">0</div>
                <div class="text-sm text-gray-600">% Hutan</div>
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
    // Mapbox Access Token (gunakan token yang valid)
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGVzYWthYW5hIiwiYSI6ImNsMDEyM3h4eDAweHozaW8wcGd6djZ3Z2cifQ.example'; // Ganti dengan token yang valid

    // Initialize map
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12', // Default to satellite
        center: [102.2615, -5.3502], // Longitude, Latitude of Desa Kaana, Enggano
        zoom: 12,
        pitch: 45,
        bearing: 0
    });

    // Add navigation controls
    map.addControl(new mapboxgl.NavigationControl());

    // Add fullscreen control
    map.addControl(new mapboxgl.FullscreenControl());

    // Add scale control
    map.addControl(new mapboxgl.ScaleControl({
        maxWidth: 80,
        unit: 'metric'
    }));

    // Add marker for Desa Kaana
    const marker = new mapboxgl.Marker({
        color: '#3b82f6',
        scale: 1.2
    })
    .setLngLat([102.2615, -5.3502])
    .setPopup(new mapboxgl.Popup({
        offset: 25,
        closeButton: false
    }).setHTML(`
        <div class="p-3 text-center">
            <h3 class="font-bold text-lg text-gray-900">Desa Kaana</h3>
            <p class="text-sm text-gray-600">Pulau Enggano</p>
            <p class="text-xs text-gray-500 mt-1">Bengkulu Utara</p>
        </div>
    `))
    .addTo(map);

    // Add markers for important locations
    const locations = [
        {
            coordinates: [102.2620, -5.3505],
            title: "Kantor Desa",
            description: "Pusat Pemerintahan Desa",
            color: "#ef4444"
        },
        {
            coordinates: [102.2610, -5.3500],
            title: "Puskesmas",
            description: "Fasilitas Kesehatan Utama",
            color: "#10b981"
        },
        {
            coordinates: [102.2625, -5.3510],
            title: "SDN Kaana",
            description: "Sekolah Dasar Negeri",
            color: "#f59e0b"
        },
        {
            coordinates: [102.2605, -5.3495],
            title: "Pelabuhan",
            description: "Akses Transportasi Laut",
            color: "#3b82f6"
        }
    ];

    locations.forEach(location => {
        new mapboxgl.Marker({
            color: location.color,
            scale: 0.8
        })
        .setLngLat(location.coordinates)
        .setPopup(new mapboxgl.Popup({
            offset: 25,
            closeButton: false
        }).setHTML(`
            <div class="p-3">
                <h4 class="font-bold text-gray-900">${location.title}</h4>
                <p class="text-sm text-gray-600">${location.description}</p>
            </div>
        `))
        .addTo(map);
    });

    // Style toggle buttons
    const satelliteBtn = document.getElementById('satellite-btn');
    const streetBtn = document.getElementById('street-btn');

    satelliteBtn.addEventListener('click', function() {
        map.setStyle('mapbox://styles/mapbox/satellite-streets-v12');
        satelliteBtn.classList.remove('bg-gray-100', 'text-gray-700');
        satelliteBtn.classList.add('bg-blue-100', 'text-blue-700');
        streetBtn.classList.remove('bg-blue-100', 'text-blue-700');
        streetBtn.classList.add('bg-gray-100', 'text-gray-700');
    });

    streetBtn.addEventListener('click', function() {
        map.setStyle('mapbox://styles/mapbox/streets-v12');
        streetBtn.classList.remove('bg-gray-100', 'text-gray-700');
        streetBtn.classList.add('bg-blue-100', 'text-blue-700');
        satelliteBtn.classList.remove('bg-blue-100', 'text-blue-700');
        satelliteBtn.classList.add('bg-gray-100', 'text-gray-700');
    });

    // Show popup on load
    setTimeout(() => {
        marker.getPopup().addTo(map);
    }, 1000);

    console.log('🗺️ Mapbox initialized for Desa Kaana, Enggano');
});
</script>
@endsection
