@extends('layouts.dashboard.dashboard')

@section('title')
    Dashboard Kosabangsa
@endsection

@section('menu')
    Dashboard Kosabangsa
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

                        <!-- Welcome Section -->
            <div class="row mb-8">
                <div class="col-12">
                    <div class="card card-flush border-0 position-relative overflow-hidden shadow-lg">
                        <!-- Animated Background Pattern -->
                        <div class="position-absolute top-0 end-0 opacity-5">
                            <i class="ki-duotone ki-home-2 fs-20x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>

                        <!-- Modern Gradient Background -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%); opacity: 0.9;"></div>

                        <!-- Glass Effect Overlay -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);"></div>

                        <div class="card-body p-8 position-relative">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <!-- Main Title with Modern Design -->
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="bg-white bg-opacity-25 rounded-circle p-4 me-4 shadow-lg" style="backdrop-filter: blur(10px);">
                                            <i class="ki-duotone ki-home-2 fs-2x text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <div>
                                            <h1 class="text-white fw-bold fs-2hx mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Dashboard Kosabangsa</h1>
                                            <div class="d-flex align-items-center">
                                                <span class="badge fs-8 fw-bold me-2 px-3 py-2" style="background: linear-gradient(45deg, #00b894, #00cec9); color: white; border: none;">Desa Kaana</span>
                                                <span class="text-white fs-7 fw-semibold" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);">Sistem Kesiapan Mental</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Subtitle with Enhanced Styling -->
                                    <h2 class="text-white fs-4 fw-semibold mb-4" style="text-shadow: 0 1px 3px rgba(0,0,0,0.3);">Program Kesiapan Mental Desa Kaana</h2>

                                    <!-- Description with Better Typography -->
                                    <p class="text-white fs-6 mb-5 lh-base fw-medium" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2); opacity: 0.95;">
                                        Dashboard monitoring kesiapan mental yang menyediakan insight komprehensif
                                        untuk assessment PTSD, DCM, dan tracking kesehatan mental warga Desa Kaana
                                        dalam rangka peningkatan kesiapsiagaan menghadapi bencana.
                                    </p>

                                    <!-- Enhanced Quick Stats -->
                                    <div class="row g-4">
                                        <div class="col-auto">
                                            <div class="rounded-4 px-4 py-3 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                                <div class="text-white fs-8 fw-bold mb-1" style="opacity: 0.9;">PROGRAM AKTIF</div>
                                                <div class="text-white fs-5 fw-bold">{{ $programAktif ? $programAktif->nama_program : 'N/A' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="rounded-4 px-4 py-3 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                                <div class="text-white fs-8 fw-bold mb-1" style="opacity: 0.9;">TENAGA KESEHATAN</div>
                                                <div class="text-white fs-5 fw-bold">{{ $stats['total_tenaga_kesehatan'] ?? 0 }}</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="rounded-4 px-4 py-3 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                                <div class="text-white fs-8 fw-bold mb-1" style="opacity: 0.9;">DUSUN</div>
                                                <div class="text-white fs-5 fw-bold">{{ $stats['total_dusun'] ?? 0 }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="text-end">
                                        <!-- Enhanced Date and Time -->
                                        <div class="rounded-4 p-5 mb-4 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                            <div class="text-white fs-8 fw-bold mb-2" style="opacity: 0.9;">TANGGAL & WAKTU</div>
                                            <div class="text-white fs-1 fw-bold mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">{{ now()->format('d') }}</div>
                                            <div class="text-white fs-5 fw-semibold mb-2" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);">{{ now()->translatedFormat('F Y') }}</div>
                                            <div class="text-white fs-7 fw-medium" style="opacity: 0.9;">{{ now()->translatedFormat('l, H:i') }}</div>
                                        </div>

                                        <!-- Enhanced System Status -->
                                        <div class="rounded-4 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                            <div class="d-flex align-items-center justify-content-end mb-2">
                                                <div class="rounded-circle w-10px h-10px me-2" style="background: linear-gradient(45deg, #00b894, #00cec9); box-shadow: 0 0 10px rgba(0, 184, 148, 0.5);"></div>
                                                <span class="text-white fs-8 fw-bold">SISTEM AKTIF</span>
                                            </div>
                                            <div class="text-white fs-7 fw-medium" style="opacity: 0.9;">Real-time monitoring</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Total Users -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Total Warga"
                        :value="$stats['total_users']"
                        icon="ki-duotone ki-profile-user"
                        color="primary"
                        :percentage="$performanceMetrics['user_activity_rate']"
                        description="Warga terdaftar dalam sistem"
                    />
                </div>

                <!-- Total Assessment -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Total Assessment"
                        :value="$stats['total_assessments']"
                        icon="ki-duotone ki-clipboard-check"
                        color="success"
                        :percentage="$performanceMetrics['assessment_completion_rate']"
                        description="PTSD & DCM assessments"
                    />
                </div>

                <!-- Total Faskes -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Fasilitas Kesehatan"
                        :value="$stats['total_faskes']"
                        icon="ki-duotone ki-hospital"
                        color="warning"
                        :percentage="$performanceMetrics['coverage_rate']"
                        description="Puskesmas, Klinik & Posyandu"
                    />
                </div>

                <!-- Total PTSD Assessment -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="PTSD Assessment"
                        :value="$stats['total_ptsd']"
                        icon="ki-duotone ki-heart-pulse"
                        color="info"
                        :percentage="$performanceMetrics['response_rate']"
                        description="Screening PTSD terlaksana"
                    />
                </div>
            </div>

            <!-- Additional Stats Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Total DCM Assessment -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="DCM Assessment"
                        :value="$stats['total_dcm']"
                        icon="ki-duotone ki-clipboard-text"
                        color="danger"
                        :percentage="$stats['total_assessments'] > 0 ? round(($stats['total_dcm'] / $stats['total_assessments']) * 100, 1) : 0"
                        description="Checklist Masalah assessment"
                    />
                </div>

                <!-- Total Coordinates -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Lokasi Terdata"
                        :value="$stats['total_coordinates']"
                        icon="ki-duotone ki-geolocation"
                        color="info"
                        :percentage="$performanceMetrics['coverage_rate']"
                        description="Koordinat lokasi terdata"
                    />
                </div>

                <!-- Total Dusun -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Dusun"
                        :value="$stats['total_dusun']"
                        icon="ki-duotone ki-home-2"
                        color="success"
                        description="Jumlah dusun terdata"
                    />
                </div>

                <!-- Completed Assessments -->
                <div class="col-xl-3 col-md-6">
                    @php
                        $completedAssessments = \App\Models\UserAssessment::where('status', 'completed')->count();
                    @endphp
                    <x-dashboard-stats-card
                        title="Assessment Selesai"
                        :value="$completedAssessments"
                        icon="ki-duotone ki-check-circle"
                        color="primary"
                        :percentage="$performanceMetrics['assessment_completion_rate']"
                        description="Assessment yang telah diselesaikan"
                    />
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Unit Kerja Distribution Chart -->
                <div class="col-xl-8">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <h3 class="fw-bold text-dark">Distribusi Assessment</h3>
                                <span class="text-gray-600 fw-semibold fs-6">Distribusi assessment di Desa Kaana</span>
                            </div>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="dropdown">
                                    <i class="ki-duotone ki-gear fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="unitKerjaChart" style="height: 350px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Gender Distribution Chart -->
                <div class="col-xl-4">
                    <div class="card card-flush border-0 bg-white shadow-sm h-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Distribusi Gender</h3>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="genderChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Charts Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Religion Distribution Chart -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Distribusi Agama</h3>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="religionChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas Kesehatan Chart -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Fasilitas Kesehatan</h3>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="jenisUnitKerjaChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="row g-5 g-xl-8">
                <!-- Recent Activities -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Recent Activities</h3>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-light-primary">View All</button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="timeline">
                                @forelse($recentActivities as $activity)
                                <div class="timeline-item">
                                    <div class="timeline-badge bg-light-{{ $activity['color'] }}">
                                        <i class="{{ $activity['icon'] }} fs-2 text-{{ $activity['color'] }}">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="fw-bold text-gray-800">{{ $activity['title'] }}</div>
                                        <div class="text-gray-600 fs-7">{{ $activity['description'] }}</div>
                                        <div class="text-gray-500 fs-8 mt-1">{{ $activity['time'] }}</div>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-8">
                                    <i class="ki-duotone ki-information-5 fs-3x text-gray-400 mb-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <div class="text-gray-600">Belum ada aktivitas terbaru</div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Village -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Statistik Desa</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-4">
                                <!-- Partisipasi Dusun -->
                                <div>
                                    <h6 class="fw-bold text-gray-800 mb-3">Partisipasi Dusun</h6>
                                    @php
                                        $dusunData = App\Models\Coordinate::select('region', DB::raw('COUNT(*) as total'))
                                            ->groupBy('region')
                                            ->get()
                                            ->toArray();
                                    @endphp
                                    @forelse($dusunData as $index => $dusun)
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-home-2 fs-2 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">{{ $dusun['region'] }}</div>
                                            <div class="text-gray-600 fs-7">{{ $dusun['total'] }} lokasi terdata</div>
                                        </div>
                                        <span class="badge badge-light-primary fs-8 fw-bold">{{ $index + 1 }}</span>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <div class="text-gray-600">Belum ada data dusun</div>
                                    </div>
                                    @endforelse
                                </div>

                                <!-- Assessment Progress -->
                                <div>
                                    <h6 class="fw-bold text-gray-800 mb-3">Assessment Progress</h6>
                                    @forelse($assessmentProgress as $progress)
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-clipboard-check fs-2 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">{{ $progress['jenis'] }} - {{ $progress['bulan'] }}</div>
                                            <div class="text-gray-600 fs-7">{{ $progress['completed'] }}/{{ $progress['total'] }} selesai • {{ $progress['status'] }}</div>
                                        </div>
                                        <span class="badge badge-light-success fs-8 fw-bold">{{ $progress['persentase'] }}%</span>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <div class="text-gray-600">Belum ada assessment</div>
                                    </div>
                                    @endforelse

                                    <!-- Assessment Participation -->
                                    @if($assessmentProgress->isNotEmpty())
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-info">
                                                <i class="ki-duotone ki-profile-user fs-2 text-info">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Partisipasi Warga</div>
                                            <div class="text-gray-600 fs-7">
                                                @php
                                                    $totalCompleted = $assessmentProgress->sum('completed');
                                                    $totalAssessments = $assessmentProgress->sum('total');
                                                    $persentasePartisipasi = $totalAssessments > 0 ? round(($totalCompleted / $totalAssessments) * 100, 1) : 0;
                                                @endphp
                                                {{ $totalCompleted }}/{{ $totalAssessments }} assessment selesai
                                            </div>
                                        </div>
                                        <span class="badge badge-light-info fs-8 fw-bold">{{ $persentasePartisipasi }}%</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e1e3ea;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-badge {
    position: absolute;
    left: -22px;
    top: 0;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    margin-left: 10px;
}

.progress {
    background-color: #e1e3ea;
    border-radius: 10px;
}

.progress-bar {
    border-radius: 10px;
    transition: width 0.6s ease;
}

.symbol-label {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #3699FF 0%, #1BC5BD 100%);
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
        // Unit Kerja Distribution Chart
    const unitKerjaCtx = document.getElementById('unitKerjaChart').getContext('2d');

    const assessmentData = @json($chartData['assessmentStats']);
    console.log('Assessment Data:', assessmentData); // Debug log

    const chartLabels = assessmentData.map(item => item.jenis);
    const chartData = assessmentData.map(item => item.count);

    console.log('Chart Labels:', chartLabels); // Debug log
    console.log('Chart Data:', chartData); // Debug log

        // Check if we have data
    if (chartData.length === 0 || chartData.every(val => val === 0)) {
        document.getElementById('unitKerjaChart').parentElement.innerHTML =
            '<div class="text-center py-8"><i class="ki-duotone ki-chart-line fs-2hx text-muted mb-4"></i><p class="text-muted">Belum ada data assessment</p></div>';
    } else {

    new Chart(unitKerjaCtx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Assessment',
                data: chartData,
                backgroundColor: [
                    'rgba(54, 153, 255, 0.8)',
                    'rgba(28, 197, 189, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)',
                    'rgba(108, 117, 125, 0.8)',
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(255, 123, 0, 0.8)',
                    'rgba(111, 66, 193, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 153, 255, 1)',
                    'rgba(28, 197, 189, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(220, 53, 69, 1)',
                    'rgba(108, 117, 125, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(255, 123, 0, 1)',
                    'rgba(111, 66, 193, 1)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    },
                    ticks: {
                        color: '#6c757d',
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d',
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
        });
    }

        // Risk Level Distribution Chart
    const riskCtx = document.getElementById('pengajuanStatusChart').getContext('2d');
    const riskData = @json($chartData['riskLevelStats']);

    // Create arrays for labels and values
    const riskLabels = riskData.map(item => item.level);
    const riskValues = riskData.map(item => item.count);

    // Check if we have data and if all values are not zero
    if (riskValues.length === 0 || riskValues.every(val => val === 0)) {
        document.getElementById('pengajuanStatusChart').parentElement.innerHTML =
            '<div class="text-center py-8"><i class="ki-duotone ki-chart-pie fs-2hx text-muted mb-4"></i><p class="text-muted">Belum ada data tingkat risiko</p></div>';
    } else {

    new Chart(riskCtx, {
        type: 'doughnut',
        data: {
            labels: riskLabels,
            datasets: [{
                data: riskValues,
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',     // Hijau - Rendah
                    'rgba(255, 193, 7, 0.8)',     // Kuning - Sedang
                    'rgba(255, 99, 132, 0.8)'     // Merah - Tinggi
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
    }

    // Religion Distribution Chart
    const religionCtx = document.getElementById('religionChart');
    if (religionCtx) {
        const religionData = @json($chartData['religionStats']);
        const religionLabels = religionData.map(item => item.label);
        const religionValues = religionData.map(item => item.count);

        // Check if we have data
        if (religionValues.length === 0 || religionValues.every(val => val === 0)) {
            religionCtx.parentElement.innerHTML =
                '<div class="text-center py-8"><i class="ki-duotone ki-chart-pie fs-2x text-muted mb-4"></i><p class="text-muted">Belum ada data agama</p></div>';
        } else {
            new Chart(religionCtx.getContext('2d'), {
                type: 'pie',
                data: {
                    labels: religionLabels,
                    datasets: [{
                        data: religionValues,
                        backgroundColor: [
                            'rgba(54, 153, 255, 0.8)',
                            'rgba(28, 197, 189, 0.8)',
                            'rgba(255, 193, 7, 0.8)',
                            'rgba(220, 53, 69, 0.8)',
                            'rgba(111, 66, 193, 0.8)',
                            'rgba(255, 123, 0, 0.8)',
                            'rgba(108, 117, 125, 0.8)'
                        ],
                        borderColor: [
                            'rgba(54, 153, 255, 1)',
                            'rgba(28, 197, 189, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(220, 53, 69, 1)',
                            'rgba(111, 66, 193, 1)',
                            'rgba(255, 123, 0, 1)',
                            'rgba(108, 117, 125, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                font: {
                                    size: 11
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }
    }

    // Fasilitas Kesehatan Chart
    const fasilitasCtx = document.getElementById('jenisUnitKerjaChart');
    if (fasilitasCtx) {
        const fasilitasData = @json($chartData['fasilitasStats']);
        const fasilitasLabels = Object.keys(fasilitasData).map(key => {
            return key.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
        });
        const fasilitasValues = Object.values(fasilitasData);

        if (fasilitasValues.length === 0 || fasilitasValues.every(val => val === 0)) {
            fasilitasCtx.parentElement.innerHTML =
                '<div class="text-center py-8"><i class="ki-duotone ki-chart-pie fs-2x text-muted mb-4"></i><p class="text-muted">Belum ada data fasilitas kesehatan</p></div>';
        } else {
            new Chart(fasilitasCtx.getContext('2d'), {
                type: 'pie',
                data: {
                    labels: fasilitasLabels,
                    datasets: [{
                        data: fasilitasValues,
                        backgroundColor: [
                            'rgba(54, 153, 255, 0.8)',
                            'rgba(28, 197, 189, 0.8)',
                            'rgba(255, 193, 7, 0.8)',
                            'rgba(220, 53, 69, 0.8)'
                        ],
                        borderColor: [
                            'rgba(54, 153, 255, 1)',
                            'rgba(28, 197, 189, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(220, 53, 69, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });
        }
    }

    // Animate progress bars
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 500);
    });

    // Add hover effects to cards
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Show success message if exists (from login)
    @if(session('success'))
        // Check if Swal is available (from admin layout)
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        } else {
            // Fallback alert if SweetAlert2 is not loaded
            alert('{{ session('success') }}');
        }
    @endif
});
</script>
@endpush
