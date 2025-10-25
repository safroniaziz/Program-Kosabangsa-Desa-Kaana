@extends('layouts.app')

@section('title', 'Statistik Desa Kaana')

@section('styles')
<style>
/* Professional Government Website Style */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    line-height: 1.6;
}

/* Header */
.header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    color: white;
    padding: 2rem 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.header h1 {
    font-size: 2.2rem;
    font-weight: 600;
    margin: 0;
    text-align: center;
}

.header p {
    font-size: 1rem;
    margin: 0.5rem 0 0 0;
    text-align: center;
    opacity: 0.9;
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.stat-box {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-left: 4px solid #3498db;
    transition: transform 0.2s ease;
}

.stat-box:hover {
    transform: translateY(-2px);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2c3e50;
    margin: 0;
}

.stat-label {
    font-size: 0.9rem;
    color: #7f8c8d;
    margin: 5px 0 0 0;
}

.stat-change {
    font-size: 0.8rem;
    color: #27ae60;
    margin: 10px 0 0 0;
}

/* Charts Section */
.charts-section {
    background: white;
    margin: 30px 0;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.charts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
    margin-top: 20px;
}

.chart-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0 0 10px 0;
    border-bottom: 2px solid #ecf0f1;
    padding-bottom: 10px;
}

.chart-subtitle {
    font-size: 0.9rem;
    color: #7f8c8d;
    margin: 0 0 20px 0;
}

/* Bar Chart */
.bar-chart {
    display: flex;
    align-items: end;
    height: 250px;
    gap: 15px;
    padding: 20px 0;
}

.bar-item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.bar {
    width: 100%;
    border-radius: 4px 4px 0 0;
    position: relative;
    transition: all 0.3s ease;
    cursor: pointer;
}

.bar:hover {
    opacity: 0.8;
    transform: scale(1.02);
}

.bar-label {
    font-size: 0.8rem;
    color: #7f8c8d;
    margin-top: 10px;
    text-align: center;
}

.bar-value {
    font-size: 0.9rem;
    font-weight: 600;
    color: #2c3e50;
    margin-top: 5px;
}

/* Pie Chart */
.pie-chart {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto 20px;
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
    width: 70px;
    height: 70px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.pie-legend {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.legend-item {
    display: flex;
    align-items: center;
    font-size: 0.85rem;
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 2px;
    margin-right: 8px;
}

/* Map */
.map-container {
    background: white;
    margin: 30px 0;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.map-svg {
    width: 100%;
    height: 350px;
    border-radius: 6px;
    background: linear-gradient(135deg, #e8f5e8 0%, #f0f8ff 100%);
    border: 1px solid #e0e0e0;
}

.map-marker {
    cursor: pointer;
    transition: all 0.2s ease;
}

.map-marker:hover {
    transform: scale(1.3);
}

.map-legend {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-top: 15px;
    font-size: 0.85rem;
}

.legend-item-map {
    display: flex;
    align-items: center;
}

.legend-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 8px;
}

/* Responsive */
@media (max-width: 768px) {
    .header h1 {
        font-size: 1.8rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .charts-grid {
        grid-template-columns: 1fr;
    }
    
    .bar-chart {
        height: 200px;
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
