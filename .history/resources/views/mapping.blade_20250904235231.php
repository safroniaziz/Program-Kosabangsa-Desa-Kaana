@extends('layouts.app')

@section('title', 'Pemetaan Potensi Desa Kaana - Dashboard Statistik')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-purple-600 to-indigo-700">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 animate-fade-in">
            Pemetaan Potensi Desa Kaana
        </h1>
        <p class="text-xl text-purple-100 mb-8 animate-slide-up">
            Dashboard interaktif dengan visualisasi data statistik dan infografik potensi desa untuk mendukung pengambilan keputusan strategis.
        </p>
        <div class="flex justify-center space-x-8 text-purple-100 animate-slide-up">
            <div class="text-center">
                <div class="text-3xl font-bold">15</div>
                <div class="text-sm">Dusun</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold">1,250</div>
                <div class="text-sm">Penduduk</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold">25</div>
                <div class="text-sm">UMKM</div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Overview -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Statistik Utama</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Ringkasan data terkini mengenai demografi, ekonomi, dan potensi pengembangan Desa Kaana.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Stat Card 1 -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white card-hover animate-on-scroll">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm opacity-90">Total Penduduk</div>
                        <div class="text-3xl font-bold" id="totalPopulation">1,250</div>
                    </div>
                </div>
                <div class="flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span class="text-green-200">+2.5% dari tahun lalu</span>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white card-hover animate-on-scroll">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm opacity-90">Total UMKM</div>
                        <div class="text-3xl font-bold" id="totalUMKM">25</div>
                    </div>
                </div>
                <div class="flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span class="text-green-200">+15% dari tahun lalu</span>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white card-hover animate-on-scroll">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm opacity-90">Objek Wisata</div>
                        <div class="text-3xl font-bold" id="totalTourism">5</div>
                    </div>
                </div>
                <div class="flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span class="text-green-200">+25% potensi wisata</span>
                </div>
            </div>

            <!-- Stat Card 4 -->
            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white card-hover animate-on-scroll">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-sm opacity-90">Lahan Pertanian</div>
                        <div class="text-3xl font-bold" id="totalFarm">450</div>
                        <div class="text-xs opacity-75">Hektar</div>
                    </div>
                </div>
                <div class="flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    <span class="text-green-200">85% produktif</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Charts Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Population Demographics Chart -->
            <div class="bg-white rounded-2xl p-8 shadow-lg animate-on-scroll">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Demografi Penduduk</h3>
                    <select class="text-sm border border-gray-300 rounded-lg px-3 py-1">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="h-80 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl flex items-center justify-center relative overflow-hidden">
                    <!-- Chart placeholder with animated bars -->
                    <div class="absolute inset-4 flex items-end justify-around">
                        <div class="bg-blue-500 rounded-t-lg animate-grow-bar" style="width: 40px; height: 60%; animation-delay: 0.1s;"></div>
                        <div class="bg-green-500 rounded-t-lg animate-grow-bar" style="width: 40px; height: 80%; animation-delay: 0.2s;"></div>
                        <div class="bg-purple-500 rounded-t-lg animate-grow-bar" style="width: 40px; height: 45%; animation-delay: 0.3s;"></div>
                        <div class="bg-orange-500 rounded-t-lg animate-grow-bar" style="width: 40px; height: 70%; animation-delay: 0.4s;"></div>
                        <div class="bg-pink-500 rounded-t-lg animate-grow-bar" style="width: 40px; height: 35%; animation-delay: 0.5s;"></div>
                    </div>
                    <div class="text-center z-10">
                        <div class="text-sm text-gray-500 mb-2">Distribusi Usia Penduduk</div>
                        <div class="grid grid-cols-5 gap-2 text-xs">
                            <div><div class="w-3 h-3 bg-blue-500 rounded mx-auto mb-1"></div>0-17</div>
                            <div><div class="w-3 h-3 bg-green-500 rounded mx-auto mb-1"></div>18-35</div>
                            <div><div class="w-3 h-3 bg-purple-500 rounded mx-auto mb-1"></div>36-50</div>
                            <div><div class="w-3 h-3 bg-orange-500 rounded mx-auto mb-1"></div>51-65</div>
                            <div><div class="w-3 h-3 bg-pink-500 rounded mx-auto mb-1"></div>65+</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
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

            <!-- Economic Chart -->
            <div class="bg-white rounded-2xl p-8 shadow-lg animate-on-scroll">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Sektor Ekonomi</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-700">Lihat Detail</button>
                </div>
                <div class="h-80 bg-gradient-to-br from-green-50 to-blue-50 rounded-xl flex items-center justify-center relative">
                    <!-- Pie chart placeholder -->
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#3b82f6 0% 40%, #10b981 40% 70%, #f59e0b 70% 85%, #ef4444 85% 100%);"></div>
                        <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">100%</div>
                                <div class="text-sm text-gray-600">Total Sektor</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                            <span class="text-sm">Pertanian</span>
                        </div>
                        <span class="text-sm font-semibold">40%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                            <span class="text-sm">UMKM & Perdagangan</span>
                        </div>
                        <span class="text-sm font-semibold">30%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded mr-2"></div>
                            <span class="text-sm">Pariwisata</span>
                        </div>
                        <span class="text-sm font-semibold">15%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded mr-2"></div>
                            <span class="text-sm">Lainnya</span>
                        </div>
                        <span class="text-sm font-semibold">15%</span>
                    </div>
                </div>
            </div>

            <!-- UMKM Development Chart -->
            <div class="bg-white rounded-2xl p-8 shadow-lg animate-on-scroll">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Perkembangan UMKM</h3>
                    <div class="flex space-x-2">
                        <button class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">Tahun</button>
                        <button class="text-xs text-gray-500 px-3 py-1 rounded-full hover:bg-gray-100">Bulan</button>
                    </div>
                </div>
                <div class="h-80 bg-gradient-to-br from-green-50 to-yellow-50 rounded-xl flex items-end justify-center relative p-4">
                    <!-- Line chart placeholder -->
                    <div class="absolute inset-4 flex items-end justify-between">
                        <div class="flex flex-col items-center">
                            <div class="bg-green-500 rounded-full w-3 h-3 mb-2"></div>
                            <div class="h-16 w-2 bg-green-500 rounded-t"></div>
                            <div class="text-xs text-gray-600 mt-2">2020</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-green-500 rounded-full w-3 h-3 mb-2"></div>
                            <div class="h-20 w-2 bg-green-500 rounded-t"></div>
                            <div class="text-xs text-gray-600 mt-2">2021</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-green-500 rounded-full w-3 h-3 mb-2"></div>
                            <div class="h-24 w-2 bg-green-500 rounded-t"></div>
                            <div class="text-xs text-gray-600 mt-2">2022</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-green-500 rounded-full w-3 h-3 mb-2"></div>
                            <div class="h-28 w-2 bg-green-500 rounded-t"></div>
                            <div class="text-xs text-gray-600 mt-2">2023</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-blue-500 rounded-full w-3 h-3 mb-2"></div>
                            <div class="h-32 w-2 bg-blue-500 rounded-t"></div>
                            <div class="text-xs text-gray-600 mt-2">2024</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
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

            <!-- Tourism Potential Map -->
            <div class="bg-white rounded-2xl p-8 shadow-lg animate-on-scroll">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Peta Potensi Wisata</h3>
                    <button class="text-sm text-purple-600 hover:text-purple-700">Peta Interaktif</button>
                </div>
                <div class="h-80 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl flex items-center justify-center relative overflow-hidden">
                    <!-- Map placeholder -->
                    <div class="absolute inset-0 opacity-10">
                        <svg viewBox="0 0 400 300" class="w-full h-full">
                            <path d="M50 50 Q200 30 350 50 Q370 150 350 250 Q200 270 50 250 Q30 150 50 50" fill="#8b5cf6" stroke="#7c3aed" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="relative z-10 grid grid-cols-2 gap-4 w-full max-w-sm">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex items-center mb-2">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-sm font-semibold">Air Terjun Kaana</span>
                            </div>
                            <div class="text-xs text-gray-600">Rating: ⭐ 4.5</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex items-center mb-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-sm font-semibold">Bukit Hijau</span>
                            </div>
                            <div class="text-xs text-gray-600">Rating: ⭐ 4.2</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex items-center mb-2">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                <span class="text-sm font-semibold">Desa Budaya</span>
                            </div>
                            <div class="text-xs text-gray-600">Rating: ⭐ 4.7</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class="flex items-center mb-2">
                                <div class="w-3 h-3 bg-purple-500 rounded-full mr-2"></div>
                                <span class="text-sm font-semibold">Homestay Desa</span>
                            </div>
                            <div class="text-xs text-gray-600">12 unit tersedia</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform">
                        Jelajahi Semua Wisata
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Insights & Recommendations -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Analisis & Rekomendasi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Berdasarkan data yang terkumpul, berikut adalah insight dan rekomendasi untuk pengembangan desa.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Insight Card 1 -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 animate-on-scroll">
                <div class="bg-blue-600 w-12 h-12 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Potensi Demografi</h3>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Populasi usia produktif (18-50 tahun) mencapai 65%, menunjukkan potensi SDM yang besar untuk pengembangan ekonomi desa.
                </p>
                <div class="space-y-2">
                    <div class="text-sm"><strong>Rekomendasi:</strong></div>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Pelatihan keterampilan digital</li>
                        <li>• Program kewirausahaan muda</li>
                        <li>• Pemberdayaan perempuan</li>
                    </ul>
                </div>
            </div>

            <!-- Insight Card 2 -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 animate-on-scroll">
                <div class="bg-green-600 w-12 h-12 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Pengembangan UMKM</h3>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Pertumbuhan UMKM 15% per tahun dengan sektor unggulan pertanian dan kerajinan. Potensi ekspansi ke sektor digital.
                </p>
                <div class="space-y-2">
                    <div class="text-sm"><strong>Rekomendasi:</strong></div>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Digitalisasi produk UMKM</li>
                        <li>• Pelatihan manajemen bisnis</li>
                        <li>• Akses permodalan mikro</li>
                    </ul>
                </div>
            </div>

            <!-- Insight Card 3 -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 animate-on-scroll">
                <div class="bg-purple-600 w-12 h-12 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Potensi Wisata</h3>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    5 objek wisata dengan rating tinggi, namun infrastruktur dan promosi masih perlu ditingkatkan untuk maksimalkan potensi.
                </p>
                <div class="space-y-2">
                    <div class="text-sm"><strong>Rekomendasi:</strong></div>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Pengembangan infrastruktur</li>
                        <li>• Pelatihan guide wisata</li>
                        <li>• Digital marketing pariwisata</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="text-center mt-12 space-x-4 animate-on-scroll">
            <button class="btn-primary text-white px-8 py-3 rounded-xl font-semibold hover:scale-105 transition-transform">
                Download Laporan Lengkap
            </button>
            <button class="border-2 border-gray-300 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                Bagikan Insights
            </button>
        </div>
    </div>
</section>

<style>
@keyframes grow-bar {
    from {
        height: 0;
    }
    to {
        height: var(--final-height);
    }
}

.animate-grow-bar {
    --final-height: 100%;
    height: 0;
    animation: grow-bar 1s ease-out forwards;
}
</style>

<script>
$(document).ready(function() {
    // Animate numbers on scroll
    function animateNumbers() {
        $('.animate-on-scroll').each(function() {
            if ($(this).hasClass('animate-slide-up')) {
                return; // Already animated
            }
            
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-slide-up');
                
                // Animate stat numbers
                $(this).find('#totalPopulation, #totalUMKM, #totalTourism, #totalFarm').each(function() {
                    var $this = $(this);
                    var target = parseInt($this.text());
                    var current = 0;
                    var increment = target / 50;
                    
                    var timer = setInterval(function() {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        $this.text(Math.floor(current));
                    }, 30);
                });
            }
        });
    }
    
    // Initial check
    animateNumbers();
    
    // Check on scroll
    $(window).scroll(function() {
        animateNumbers();
    });
    
    // Simulate real-time data updates
    setInterval(function() {
        updateRealTimeData();
    }, 10000); // Update every 10 seconds
    
    function updateRealTimeData() {
        // Simulate small random changes in statistics
        var population = parseInt($('#totalPopulation').text());
        var umkm = parseInt($('#totalUMKM').text());
        
        // Small random variations
        if (Math.random() > 0.7) {
            $('#totalPopulation').text(population + Math.floor(Math.random() * 3));
        }
        
        if (Math.random() > 0.8) {
            $('#totalUMKM').text(umkm + (Math.random() > 0.5 ? 1 : 0));
        }
    }
    
    // Interactive chart hover effects
    $('.bg-white.rounded-2xl').hover(
        function() {
            $(this).addClass('transform scale-105 shadow-2xl');
        },
        function() {
            $(this).removeClass('transform scale-105 shadow-2xl');
        }
    );
});
</script>
@endsection
