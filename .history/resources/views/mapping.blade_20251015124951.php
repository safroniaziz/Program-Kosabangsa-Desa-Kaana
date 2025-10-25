@extends('layouts.app')

@section('title', 'Pemetaan Potensi Desa - Dashboard Analytics')

@section('styles')
<style>
.stat-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
<!-- Hero Section -->
<section class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="mb-6">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                    📊 Dashboard Analytics
            </span>
        </div>

            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                Pemetaan Potensi Desa
        </h1>

            <p class="text-xl text-gray-300 mb-12 max-w-4xl mx-auto">
                Dashboard interaktif dengan visualisasi data real-time untuk mendukung pengambilan keputusan strategis berbasis data.
            </p>

            <!-- Key Metrics Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                    <div class="text-3xl font-bold text-white mb-2">15</div>
                    <div class="text-blue-200">Dusun Aktif</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                    <div class="text-3xl font-bold text-white mb-2">1,250</div>
                    <div class="text-blue-200">Total Penduduk</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                    <div class="text-3xl font-bold text-white mb-2">25</div>
                    <div class="text-blue-200">UMKM Berkembang</div>
            </div>
        </div>

            <a href="#dashboard" class="inline-flex items-center px-8 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                Lihat Dashboard
            </a>
        </div>
    </div>
</section>

<!-- Statistics Overview -->
<section id="dashboard" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4">
                📈 Analytics Dashboard
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Statistik Utama
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Ringkasan data real-time mengenai demografi, ekonomi, dan potensi pengembangan Desa Kaana.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat Card 1 -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="metric-label">Total Penduduk</div>
                        <div class="metric-value text-blue-600">1,250</div>
                    </div>
                </div>
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span>+2.5% dari tahun lalu</span>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    </div>
                    <div class="text-right">
                        <div class="metric-label">Total UMKM</div>
                        <div class="metric-value text-green-600">25</div>
                    </div>
                </div>
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span>+15% dari tahun lalu</span>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="metric-label">Objek Wisata</div>
                        <div class="metric-value text-purple-600">5</div>
                    </div>
                </div>
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span>+25% potensi wisata</span>
                </div>
            </div>

            <!-- Stat Card 4 -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-orange-100 rounded-lg">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="metric-label">Lahan Pertanian</div>
                        <div class="metric-value text-orange-600">450</div>
                        <div class="text-xs text-gray-500">Hektar</div>
                    </div>
                </div>
                <div class="flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span>85% produktif</span>
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
