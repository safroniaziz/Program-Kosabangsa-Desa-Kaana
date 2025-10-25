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
<!-- Header -->
<div class="header">
    <div class="container">
        <h1>Statistik Desa Kaana</h1>
        <p>Data Demografi dan Potensi Desa Tahun 2024</p>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <!-- Key Statistics -->
    <div class="stats-grid">
        <div class="stat-box">
            <div class="stat-number">1,250</div>
            <div class="stat-label">Total Penduduk</div>
            <div class="stat-change">+2.5% dari tahun lalu</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">680</div>
            <div class="stat-label">Usia Produktif (18-65)</div>
            <div class="stat-change">54% dari total penduduk</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">88%</div>
            <div class="stat-label">Angka Melek Huruf</div>
            <div class="stat-change">Di atas rata-rata nasional</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">2.8</div>
            <div class="stat-label">Pendapatan Rata-rata (Juta)</div>
            <div class="stat-change">Per bulan per KK</div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-section">
        <h2 style="font-size: 1.8rem; font-weight: 600; color: #2c3e50; margin: 0 0 30px 0; text-align: center;">Data Demografi Desa Kaana</h2>

        <div class="charts-grid">
            <!-- Population by Age Group -->
            <div>
                <h3 class="chart-title">Distribusi Usia Penduduk</h3>
                <p class="chart-subtitle">Berdasarkan kelompok usia (2024)</p>

                <div class="bar-chart">
                    <div class="bar-item">
                        <div class="bar" style="height: 60%; background: #3498db;" title="300 orang (24%)"></div>
                        <div class="bar-label">0-17</div>
                        <div class="bar-value">300</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 80%; background: #2ecc71;" title="400 orang (32%)"></div>
                        <div class="bar-label">18-35</div>
                        <div class="bar-value">400</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 70%; background: #9b59b6;" title="280 orang (22%)"></div>
                        <div class="bar-label">36-50</div>
                        <div class="bar-value">280</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 50%; background: #f39c12;" title="200 orang (16%)"></div>
                        <div class="bar-label">51-65</div>
                        <div class="bar-value">200</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 35%; background: #e74c3c;" title="70 orang (6%)"></div>
                        <div class="bar-label">65+</div>
                        <div class="bar-value">70</div>
                    </div>
                </div>
            </div>

            <!-- Gender Distribution -->
            <div>
                <h3 class="chart-title">Perbandingan Jenis Kelamin</h3>
                <p class="chart-subtitle">Rasio laki-laki dan perempuan (2024)</p>

                <div class="pie-chart">
                    <div class="pie-slice" style="background: conic-gradient(#3498db 0deg 187deg, #e74c3c 187deg 360deg);"></div>
                    <div class="pie-center">
                        <div style="text-align: center;">
                            <div style="font-size: 1.2rem; font-weight: bold; color: #2c3e50;">1,250</div>
                            <div style="font-size: 0.7rem; color: #7f8c8d;">Total</div>
                        </div>
                    </div>
                </div>

                <div class="pie-legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background: #3498db;"></div>
                        <span>Laki-laki: 652 (52%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #e74c3c;"></div>
                        <span>Perempuan: 598 (48%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Charts -->
    <div class="charts-section">
        <div class="charts-grid">
            <!-- Religion Distribution -->
            <div>
                <h3 class="chart-title">Distribusi Agama</h3>
                <p class="chart-subtitle">Berdasarkan kepercayaan (2024)</p>

                <div class="pie-chart">
                    <div class="pie-slice" style="background: conic-gradient(#2ecc71 0deg 306deg, #f39c12 306deg 324deg, #e74c3c 324deg 360deg);"></div>
                    <div class="pie-center">
                        <div style="text-align: center;">
                            <div style="font-size: 1.2rem; font-weight: bold; color: #2c3e50;">100%</div>
                            <div style="font-size: 0.7rem; color: #7f8c8d;">Total</div>
                        </div>
                    </div>
                </div>

                <div class="pie-legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background: #2ecc71;"></div>
                        <span>Islam: 1,063 (85%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #f39c12;"></div>
                        <span>Kristen: 125 (10%)</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #e74c3c;"></div>
                        <span>Katolik: 62 (5%)</span>
                    </div>
                </div>
            </div>

            <!-- Education Level -->
            <div>
                <h3 class="chart-title">Tingkat Pendidikan</h3>
                <p class="chart-subtitle">Berdasarkan jenjang pendidikan (2024)</p>

                <div class="bar-chart">
                    <div class="bar-item">
                        <div class="bar" style="height: 30%; background: #e74c3c;" title="150 orang (12%)"></div>
                        <div class="bar-label">Tidak Sekolah</div>
                        <div class="bar-value">150</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 50%; background: #f39c12;" title="300 orang (24%)"></div>
                        <div class="bar-label">SD</div>
                        <div class="bar-value">300</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 65%; background: #f1c40f;" title="400 orang (32%)"></div>
                        <div class="bar-label">SMP</div>
                        <div class="bar-value">400</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 60%; background: #2ecc71;" title="300 orang (24%)"></div>
                        <div class="bar-label">SMA</div>
                        <div class="bar-value">300</div>
                    </div>

                    <div class="bar-item">
                        <div class="bar" style="height: 40%; background: #3498db;" title="100 orang (8%)"></div>
                        <div class="bar-label">Perguruan Tinggi</div>
                        <div class="bar-value">100</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <h3 class="chart-title">Peta Desa Kaana</h3>
        <p class="chart-subtitle">Lokasi strategis dan fasilitas umum</p>

        <div class="map-svg">
            <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                <!-- Desa outline -->
                <path d="M50 50 Q200 30 350 50 Q370 150 350 250 Q200 270 50 250 Q30 150 50 50"
                      fill="#2ecc71" stroke="#27ae60" stroke-width="2" opacity="0.3"/>

                <!-- Roads -->
                <path d="M80 80 Q200 100 320 80" stroke="#7f8c8d" stroke-width="3" fill="none"/>
                <path d="M80 120 Q200 140 320 120" stroke="#95a5a6" stroke-width="2" fill="none"/>
                <path d="M80 160 Q200 180 320 160" stroke="#95a5a6" stroke-width="2" fill="none"/>
                <path d="M80 200 Q200 220 320 200" stroke="#95a5a6" stroke-width="2" fill="none"/>

                <!-- Vertical roads -->
                <path d="M120 50 Q140 150 120 250" stroke="#95a5a6" stroke-width="2" fill="none"/>
                <path d="M200 50 Q220 150 200 250" stroke="#95a5a6" stroke-width="2" fill="none"/>
                <path d="M280 50 Q300 150 280 250" stroke="#95a5a6" stroke-width="2" fill="none"/>
            </svg>

            <!-- Map Markers -->
            <div style="position: absolute; top: 20px; left: 30px;">
                <div class="map-marker" style="width: 12px; height: 12px; background: #e74c3c; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);" title="Balai Desa"></div>
            </div>

            <div style="position: absolute; top: 40px; right: 50px;">
                <div class="map-marker" style="width: 12px; height: 12px; background: #3498db; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);" title="Air Terjun"></div>
            </div>

            <div style="position: absolute; bottom: 60px; left: 50px;">
                <div class="map-marker" style="width: 12px; height: 12px; background: #2ecc71; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);" title="Sawah"></div>
            </div>

            <div style="position: absolute; bottom: 40px; right: 40px;">
                <div class="map-marker" style="width: 12px; height: 12px; background: #f39c12; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);" title="Bukit"></div>
            </div>

            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="map-marker" style="width: 12px; height: 12px; background: #9b59b6; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);" title="Pusat Desa"></div>
            </div>
        </div>

        <!-- Map Legend -->
        <div class="map-legend">
            <div class="legend-item-map">
                <div class="legend-dot" style="background: #e74c3c;"></div>
                <span>Fasilitas Umum</span>
            </div>
            <div class="legend-item-map">
                <div class="legend-dot" style="background: #3498db;"></div>
                <span>Objek Wisata</span>
            </div>
            <div class="legend-item-map">
                <div class="legend-dot" style="background: #2ecc71;"></div>
                <span>Area Pertanian</span>
            </div>
            <div class="legend-item-map">
                <div class="legend-dot" style="background: #f39c12;"></div>
                <span>Area Konservasi</span>
            </div>
        </div>
    </div>
</div>
@endsection
