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
            <!-- Demographics Chart -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Demografi Penduduk</h3>
                    <select class="text-sm border border-gray-300 rounded-lg px-3 py-2">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="h-64 flex items-end justify-center space-x-4 mb-6">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-32 bg-blue-500 rounded-t-lg mb-2"></div>
                        <span class="text-xs text-gray-600">0-17</span>
                        <span class="text-sm font-medium">300</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-40 bg-green-500 rounded-t-lg mb-2"></div>
                        <span class="text-xs text-gray-600">18-35</span>
                        <span class="text-sm font-medium">400</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-28 bg-purple-500 rounded-t-lg mb-2"></div>
                        <span class="text-xs text-gray-600">36-50</span>
                        <span class="text-sm font-medium">280</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-24 bg-orange-500 rounded-t-lg mb-2"></div>
                        <span class="text-xs text-gray-600">51-65</span>
                        <span class="text-sm font-medium">200</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-16 bg-pink-500 rounded-t-lg mb-2"></div>
                        <span class="text-xs text-gray-600">65+</span>
                        <span class="text-sm font-medium">70</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Laki-laki:</span>
                        <span class="font-semibold">652 (52%)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Perempuan:</span>
                        <span class="font-semibold">598 (48%)</span>
                    </div>
                </div>
            </div>

            <!-- Economic Sectors -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Sektor Ekonomi</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-700">Lihat Detail</button>
                </div>
                <div class="h-64 flex items-center justify-center mb-6">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 40%, #10b981 40% 70%, #f59e0b 70% 85%, #ef4444 85% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-xl font-bold text-gray-900">100%</div>
                                <div class="text-xs text-gray-600">Total Sektor</div>
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
                        <span class="text-sm font-semibold">40%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded mr-3"></div>
                            <span class="text-sm">UMKM & Perdagangan</span>
                        </div>
                        <span class="text-sm font-semibold">30%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded mr-3"></div>
                            <span class="text-sm">Pariwisata</span>
                        </div>
                        <span class="text-sm font-semibold">15%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded mr-3"></div>
                            <span class="text-sm">Lainnya</span>
                        </div>
                        <span class="text-sm font-semibold">15%</span>
                    </div>
                </div>
            </div>

            <!-- UMKM Growth -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Perkembangan UMKM</h3>
                    <div class="flex space-x-2">
                        <button class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">Tahun</button>
                        <button class="text-xs text-gray-500 px-3 py-1 rounded-full hover:bg-gray-100">Bulan</button>
                    </div>
                </div>
                <div class="h-64 flex items-end justify-center space-x-6 mb-6">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-16 bg-green-500 rounded-t mb-2"></div>
                        <span class="text-xs text-gray-600">2020</span>
                        <span class="text-sm font-medium">15</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-20 bg-green-500 rounded-t mb-2"></div>
                        <span class="text-xs text-gray-600">2021</span>
                        <span class="text-sm font-medium">18</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-24 bg-green-500 rounded-t mb-2"></div>
                        <span class="text-xs text-gray-600">2022</span>
                        <span class="text-sm font-medium">21</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-28 bg-green-500 rounded-t mb-2"></div>
                        <span class="text-xs text-gray-600">2023</span>
                        <span class="text-sm font-medium">23</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-32 bg-blue-500 rounded-t mb-2"></div>
                        <span class="text-xs text-gray-600">2024</span>
                        <span class="text-sm font-medium">25</span>
                    </div>
                </div>
                <div class="flex justify-between text-sm">
                    <div>
                        <span class="text-gray-600">Pertumbuhan:</span>
                        <span class="font-semibold text-green-600">+15%</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Target 2025:</span>
                        <span class="font-semibold">35 UMKM</span>
                    </div>
                </div>
            </div>

            <!-- Tourism Spots -->
            <div class="chart-container">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Objek Wisata</h3>
                    <button class="text-sm text-purple-600 hover:text-purple-700">Lihat Peta</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                            <div>
                                <div class="font-medium">Air Terjun Kaana</div>
                                <div class="text-sm text-gray-600">Rating: ⭐ 4.5</div>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">500 pengunjung/bulan</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <div>
                                <div class="font-medium">Bukit Hijau</div>
                                <div class="text-sm text-gray-600">Rating: ⭐ 4.2</div>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">300 pengunjung/bulan</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                            <div>
                                <div class="font-medium">Desa Budaya</div>
                                <div class="text-sm text-gray-600">Rating: ⭐ 4.7</div>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">800 pengunjung/bulan</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                            <div>
                                <div class="font-medium">Homestay Desa</div>
                                <div class="text-sm text-gray-600">12 unit tersedia</div>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">60% okupansi</span>
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
