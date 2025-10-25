@extends('layouts.app')

@section('title', 'Statistik Desa Kaana - Dashboard Demografi')

@section('styles')
<style>
/* Modern Professional Styles */
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8fafc;
}

/* Header Styles */
.page-header {
    background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    color: white;
    padding: 3rem 0;
    margin-bottom: 2rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.page-subtitle {
    font-size: 1.125rem;
    opacity: 0.9;
    font-weight: 400;
}

/* Card Styles */
.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.2s ease;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.875rem;
    color: #6b7280;
    font-weight: 500;
    margin-bottom: 0.75rem;
}

.stat-change {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0.25rem 0.5rem;
    border-radius: 6px;
}

.stat-change.positive {
    background: #dcfce7;
    color: #166534;
}

.stat-change.negative {
    background: #fef2f2;
    color: #dc2626;
}

/* Chart Container */
.chart-container {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    margin-bottom: 1.5rem;
}

.chart-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.chart-subtitle {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 1.5rem;
}

/* Bar Chart Styles */
.bar-chart {
    display: flex;
    align-items: end;
    justify-content: space-between;
    height: 200px;
    padding: 1rem 0;
    gap: 0.5rem;
}

.bar-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.bar-item:hover {
    transform: scale(1.05);
}

.bar {
    width: 100%;
    border-radius: 4px 4px 0 0;
    transition: all 0.2s ease;
    position: relative;
}

.bar:hover {
    filter: brightness(1.1);
}

.bar-label {
    font-size: 0.75rem;
    color: #6b7280;
    margin-top: 0.5rem;
    text-align: center;
}

.bar-value {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1f2937;
    margin-top: 0.25rem;
}

/* Pie Chart Styles */
.pie-chart {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto 1rem;
}

.pie-slice {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    clip-path: polygon(50% 50%, 50% 0%, 100% 0%, 100% 100%, 0% 100%, 0% 0%);
    transform-origin: 50% 50%;
}

.pie-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.pie-legend {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
}

.legend-item {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 2px;
    margin-right: 0.5rem;
}

/* Map Styles */
.map-container {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
}

.map-svg {
    width: 100%;
    height: 300px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
}

.map-marker {
    cursor: pointer;
    transition: all 0.2s ease;
}

.map-marker:hover {
    transform: scale(1.2);
}

/* Responsive */
@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .stat-card {
        padding: 1rem;
    }
    
    .chart-container {
        padding: 1rem;
    }
    
    .bar-chart {
        height: 150px;
    }
    
    .pie-chart {
        width: 150px;
        height: 150px;
    }
}
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="page-title">Statistik Desa Kaana</h1>
            <p class="page-subtitle">Data Demografi dan Potensi Desa Tahun 2024</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Key Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="stat-card">
            <div class="stat-number text-blue-600">1,250</div>
            <div class="stat-label">Total Penduduk</div>
            <div class="stat-change positive">+2.5% dari tahun lalu</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number text-green-600">680</div>
            <div class="stat-label">Usia Produktif (18-65)</div>
            <div class="stat-change positive">54% dari total</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number text-purple-600">88%</div>
            <div class="stat-label">Angka Melek Huruf</div>
            <div class="stat-change positive">Di atas rata-rata nasional</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number text-orange-600">2.8</div>
            <div class="stat-label">Pendapatan Rata-rata (Juta)</div>
            <div class="stat-change positive">Per bulan per KK</div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Population by Age Group -->
        <div class="chart-container">
            <h3 class="chart-title">Distribusi Usia Penduduk</h3>
            <p class="chart-subtitle">Berdasarkan kelompok usia (2024)</p>
            
            <div class="bar-chart">
                <div class="bar-item">
                    <div class="bar" style="height: 60%; background: #3b82f6;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            300 (24%)
                        </div>
                    </div>
                    <div class="bar-label">0-17</div>
                    <div class="bar-value">300</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 80%; background: #10b981;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            400 (32%)
                        </div>
                    </div>
                    <div class="bar-label">18-35</div>
                    <div class="bar-value">400</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 70%; background: #8b5cf6;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            280 (22%)
                        </div>
                    </div>
                    <div class="bar-label">36-50</div>
                    <div class="bar-value">280</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 50%; background: #f59e0b;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            200 (16%)
                        </div>
                    </div>
                    <div class="bar-label">51-65</div>
                    <div class="bar-value">200</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 35%; background: #ef4444;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            70 (6%)
                        </div>
                    </div>
                    <div class="bar-label">65+</div>
                    <div class="bar-value">70</div>
                </div>
            </div>
        </div>

        <!-- Gender Distribution -->
        <div class="chart-container">
            <h3 class="chart-title">Perbandingan Jenis Kelamin</h3>
            <p class="chart-subtitle">Rasio laki-laki dan perempuan (2024)</p>
            
            <div class="pie-chart">
                <div class="pie-slice" style="background: conic-gradient(#3b82f6 0deg 187deg, #ec4899 187deg 360deg);"></div>
                <div class="pie-center">
                    <div class="text-center">
                        <div class="text-lg font-bold text-gray-900">1,250</div>
                        <div class="text-xs text-gray-600">Total</div>
                    </div>
                </div>
            </div>
            
            <div class="pie-legend">
                <div class="legend-item">
                    <div class="legend-color" style="background: #3b82f6;"></div>
                    <span>Laki-laki: 652 (52%)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #ec4899;"></div>
                    <span>Perempuan: 598 (48%)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Religion Distribution -->
        <div class="chart-container">
            <h3 class="chart-title">Distribusi Agama</h3>
            <p class="chart-subtitle">Berdasarkan kepercayaan (2024)</p>
            
            <div class="pie-chart">
                <div class="pie-slice" style="background: conic-gradient(#10b981 0deg 306deg, #f59e0b 306deg 324deg, #ef4444 324deg 360deg);"></div>
                <div class="pie-center">
                    <div class="text-center">
                        <div class="text-lg font-bold text-gray-900">100%</div>
                        <div class="text-xs text-gray-600">Total</div>
                    </div>
                </div>
            </div>
            
            <div class="pie-legend">
                <div class="legend-item">
                    <div class="legend-color" style="background: #10b981;"></div>
                    <span>Islam: 1,063 (85%)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #f59e0b;"></div>
                    <span>Kristen: 125 (10%)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #ef4444;"></div>
                    <span>Katolik: 62 (5%)</span>
                </div>
            </div>
        </div>

        <!-- Education Level -->
        <div class="chart-container">
            <h3 class="chart-title">Tingkat Pendidikan</h3>
            <p class="chart-subtitle">Berdasarkan jenjang pendidikan (2024)</p>
            
            <div class="bar-chart">
                <div class="bar-item">
                    <div class="bar" style="height: 30%; background: #ef4444;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            150 (12%)
                        </div>
                    </div>
                    <div class="bar-label">Tidak Sekolah</div>
                    <div class="bar-value">150</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 50%; background: #f59e0b;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            300 (24%)
                        </div>
                    </div>
                    <div class="bar-label">SD</div>
                    <div class="bar-value">300</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 65%; background: #eab308;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            400 (32%)
                        </div>
                    </div>
                    <div class="bar-label">SMP</div>
                    <div class="bar-value">400</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 60%; background: #10b981;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            300 (24%)
                        </div>
                    </div>
                    <div class="bar-label">SMA</div>
                    <div class="bar-value">300</div>
                </div>
                
                <div class="bar-item">
                    <div class="bar" style="height: 40%; background: #3b82f6;">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            100 (8%)
                        </div>
                    </div>
                    <div class="bar-label">Perguruan Tinggi</div>
                    <div class="bar-value">100</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container mb-8">
        <h3 class="chart-title">Peta Desa Kaana</h3>
        <p class="chart-subtitle">Lokasi strategis dan fasilitas umum</p>
        
        <div class="map-svg">
            <svg viewBox="0 0 400 300" class="w-full h-full">
                <!-- Desa outline -->
                <path d="M50 50 Q200 30 350 50 Q370 150 350 250 Q200 270 50 250 Q30 150 50 50" 
                      fill="#10b981" stroke="#059669" stroke-width="2" opacity="0.3"/>
                
                <!-- Roads -->
                <path d="M80 80 Q200 100 320 80" stroke="#6b7280" stroke-width="3" fill="none"/>
                <path d="M80 120 Q200 140 320 120" stroke="#6b7280" stroke-width="2" fill="none"/>
                <path d="M80 160 Q200 180 320 160" stroke="#6b7280" stroke-width="2" fill="none"/>
                <path d="M80 200 Q200 220 320 200" stroke="#6b7280" stroke-width="2" fill="none"/>
                
                <!-- Vertical roads -->
                <path d="M120 50 Q140 150 120 250" stroke="#6b7280" stroke-width="2" fill="none"/>
                <path d="M200 50 Q220 150 200 250" stroke="#6b7280" stroke-width="2" fill="none"/>
                <path d="M280 50 Q300 150 280 250" stroke="#6b7280" stroke-width="2" fill="none"/>
            </svg>
            
            <!-- Map Markers -->
            <div class="absolute top-8 left-12">
                <div class="w-4 h-4 bg-red-500 rounded-full border-2 border-white shadow-lg map-marker"></div>
                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                    Balai Desa
                </div>
            </div>
            
            <div class="absolute top-16 right-20">
                <div class="w-4 h-4 bg-blue-500 rounded-full border-2 border-white shadow-lg map-marker"></div>
                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                    Air Terjun
                </div>
            </div>
            
            <div class="absolute bottom-20 left-20">
                <div class="w-4 h-4 bg-green-500 rounded-full border-2 border-white shadow-lg map-marker"></div>
                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                    Sawah
                </div>
            </div>
            
            <div class="absolute bottom-12 right-16">
                <div class="w-4 h-4 bg-yellow-500 rounded-full border-2 border-white shadow-lg map-marker"></div>
                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                    Bukit
                </div>
            </div>
            
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="w-4 h-4 bg-purple-500 rounded-full border-2 border-white shadow-lg map-marker"></div>
                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                    Pusat Desa
                </div>
            </div>
        </div>
        
        <!-- Map Legend -->
        <div class="mt-4 grid grid-cols-2 gap-2 text-xs">
            <div class="flex items-center">
                <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                <span>Fasilitas Umum</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                <span>Objek Wisata</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                <span>Area Pertanian</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                <span>Area Konservasi</span>
            </div>
        </div>
    </div>
</div>
@endsection