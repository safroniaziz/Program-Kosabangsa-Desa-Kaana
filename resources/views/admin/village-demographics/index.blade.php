@extends('layouts.dashboard.dashboard')

@section('title', 'Demografi Desa - Admin')

@section('menu')
    Demografi Desa
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Demografi Desa</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- Header Info -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="alert alert-info d-flex align-items-center">
                    <i class="fas fa-info-circle fs-2 me-3"></i>
                    <div>
                        <strong>Data Demografi Otomatis</strong><br>
                        Statistik ini dihitung secara otomatis dari data warga yang terdaftar di sistem. 
                        Untuk mengubah data, silakan edit profil masing-masing warga di menu <a href="{{ route('admin.users.index') }}">Data Warga</a>.
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Population Card -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-primary">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-users fs-3x text-white mb-3"></i>
                        <h1 class="text-white display-4 fw-bold">{{ number_format($totalUsers) }}</h1>
                        <span class="text-white fs-4">Total Warga Terdaftar</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Statistics -->
        <div class="row g-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-venus-mars me-2 text-primary"></i>Jenis Kelamin</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-light-primary border-0">
                                    <div class="card-body text-center">
                                        <i class="fas fa-male fs-3x text-primary mb-3"></i>
                                        <h2 class="text-primary fw-bold">{{ number_format($genderStats['male']) }}</h2>
                                        <span class="text-gray-600">Laki-laki</span>
                                        @if($totalUsers > 0)
                                        <div class="text-muted small mt-1">{{ round(($genderStats['male'] / $totalUsers) * 100, 1) }}%</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light-danger border-0">
                                    <div class="card-body text-center">
                                        <i class="fas fa-female fs-3x text-danger mb-3"></i>
                                        <h2 class="text-danger fw-bold">{{ number_format($genderStats['female']) }}</h2>
                                        <span class="text-gray-600">Perempuan</span>
                                        @if($totalUsers > 0)
                                        <div class="text-muted small mt-1">{{ round(($genderStats['female'] / $totalUsers) * 100, 1) }}%</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light-secondary border-0">
                                    <div class="card-body text-center">
                                        <i class="fas fa-question-circle fs-3x text-secondary mb-3"></i>
                                        <h2 class="text-secondary fw-bold">{{ number_format($genderStats['unknown']) }}</h2>
                                        <span class="text-gray-600">Belum Diisi</span>
                                        @if($totalUsers > 0)
                                        <div class="text-muted small mt-1">{{ round(($genderStats['unknown'] / $totalUsers) * 100, 1) }}%</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Age Distribution -->
        <div class="row g-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-birthday-cake me-2 text-warning"></i>Kelompok Usia</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($ageStats as $key => $age)
                            @if($key !== 'unknown' || $age['count'] > 0)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="card h-100 {{ $key === 'unknown' ? 'bg-light-secondary' : 'bg-light-warning' }} border-0">
                                    <div class="card-body text-center py-4">
                                        <h3 class="fw-bold {{ $key === 'unknown' ? 'text-secondary' : 'text-warning' }}">{{ number_format($age['count']) }}</h3>
                                        <span class="text-gray-700 small">{{ $age['label'] }}</span>
                                        <div class="text-muted small">{{ $age['percentage'] }}%</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Religion Statistics -->
        <div class="row g-5 mb-5">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-pray me-2 text-success"></i>Agama</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-row-bordered">
                                <thead>
                                    <tr class="fw-bold text-gray-700">
                                        <th>Agama</th>
                                        <th class="text-end">Jumlah</th>
                                        <th class="text-end">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($religionStats as $key => $religion)
                                    @if($religion['count'] > 0)
                                    <tr>
                                        <td>
                                            @if($key === 'unknown')
                                            <span class="text-muted">{{ $religion['label'] }}</span>
                                            @else
                                            {{ $religion['label'] }}
                                            @endif
                                        </td>
                                        <td class="text-end fw-bold">{{ number_format($religion['count']) }}</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-success">{{ $religion['percentage'] }}%</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education Statistics -->
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-graduation-cap me-2 text-info"></i>Tingkat Pendidikan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-row-bordered">
                                <thead>
                                    <tr class="fw-bold text-gray-700">
                                        <th>Pendidikan</th>
                                        <th class="text-end">Jumlah</th>
                                        <th class="text-end">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($educationStats as $key => $education)
                                    @if($education['count'] > 0)
                                    <tr>
                                        <td>
                                            @if($key === 'unknown')
                                            <span class="text-muted">{{ $education['label'] }}</span>
                                            @else
                                            {{ $education['label'] }}
                                            @endif
                                        </td>
                                        <td class="text-end fw-bold">{{ number_format($education['count']) }}</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-info">{{ $education['percentage'] }}%</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Socioeconomic Statistics -->
        <div class="row g-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-pie me-2 text-primary"></i>Status Sosial Ekonomi</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @php
                            $socioColors = [
                                'sangat_miskin' => 'danger',
                                'miskin' => 'warning',
                                'menengah_bawah' => 'info',
                                'menengah' => 'primary',
                                'menengah_atas' => 'success',
                                'kaya' => 'dark',
                                'unknown' => 'secondary'
                            ];
                            @endphp
                            @foreach($socioeconomicStats as $key => $socio)
                            @if($socio['count'] > 0)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="d-flex align-items-center p-4 rounded bg-light-{{ $socioColors[$key] ?? 'secondary' }}">
                                    <div class="flex-grow-1">
                                        <span class="text-gray-700 fw-bold">{{ $socio['label'] }}</span>
                                        <div class="d-flex align-items-center mt-1">
                                            <span class="fs-3 fw-bolder text-{{ $socioColors[$key] ?? 'secondary' }}">{{ number_format($socio['count']) }}</span>
                                            <span class="badge badge-{{ $socioColors[$key] ?? 'secondary' }} ms-2">{{ $socio['percentage'] }}%</span>
                                        </div>
                                    </div>
                                    <div>
                                        @if($key === 'sangat_miskin' || $key === 'miskin')
                                        <i class="fas fa-frown fs-2x text-{{ $socioColors[$key] }}"></i>
                                        @elseif($key === 'menengah_bawah' || $key === 'menengah')
                                        <i class="fas fa-meh fs-2x text-{{ $socioColors[$key] }}"></i>
                                        @elseif($key === 'menengah_atas' || $key === 'kaya')
                                        <i class="fas fa-smile fs-2x text-{{ $socioColors[$key] }}"></i>
                                        @else
                                        <i class="fas fa-question-circle fs-2x text-{{ $socioColors[$key] }}"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
