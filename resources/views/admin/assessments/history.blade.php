@extends('layouts.dashboard.dashboard')

@section('title', 'Riwayat Assessment - Admin')

@section('menu')
    Riwayat Assessment
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.assessments.index') }}" class="text-muted text-hover-primary">Assessments</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Riwayat</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- Header -->
        <div class="card shadow-sm mb-5">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="fw-bold m-0">
                        Riwayat Assessment 
                        @if($type === 'ptsd')
                            <span class="badge bg-primary text-white ms-2">PTSD</span>
                        @elseif($type === 'dcm' || $type === 'checklist_masalah')
                            <span class="badge bg-purple text-white ms-2">DCM</span>
                        @endif
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.assessments.index') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="symbol symbol-50px me-3">
                        <div class="symbol-label bg-light-primary">
                            <i class="fas fa-user text-primary fs-2"></i>
                        </div>
                    </div>
                    <div>
                        <div class="fw-bold text-gray-800">{{ $user->name }}</div>
                        <div class="text-muted">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assessments List -->
        @if($assessments->count() > 0)
            <div class="row g-5">
                @foreach($assessments as $index => $userAssessment)
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px me-3">
                                            <div class="symbol-label bg-light-primary">
                                                <span class="text-primary fw-bold">{{ $index + 1 }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="fw-bold m-0">Assessment #{{ $userAssessment->id }}</h4>
                                            <p class="text-muted mb-0 small">
                                                {{ $userAssessment->completed_at ? $userAssessment->completed_at->format('d F Y - H:i') : $userAssessment->created_at->format('d F Y - H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(isset($userAssessment->results))
                                    @php
                                        // results is already an array due to model casting
                                        $results = $userAssessment->results;

                                        // Check if this is DCM assessment
                                        $isDCM = $userAssessment->assessment_type === 'checklist_masalah' || $userAssessment->assessment_type === 'dcm';

                                        if ($isDCM) {
                                            // DCM specific logic
                                            $scores = $results['category_scores'] ?? [];
                                            
                                            // Calculate total_problems from category_scores if not available
                                            // First try to get from results, if not exists or null, calculate from category_scores
                                            $totalScore = isset($results['total_problems']) ? $results['total_problems'] : null;
                                            if (is_null($totalScore) && !empty($scores)) {
                                                $totalScore = array_sum($scores);
                                            } elseif (empty($totalScore) && !empty($scores)) {
                                                // If total_problems is 0 but we have scores, recalculate
                                                $totalScore = array_sum($scores);
                                            }
                                            // Fallback to 0 if still no value
                                            $totalScore = $totalScore ?? 0;
                                            
                                            // Get total_possible_problems, default to 100 if not available
                                            $totalPossible = $results['total_possible_problems'] ?? 100;
                                            
                                            // Recalculate percentage if needed
                                            $percentage = $results['percentage'] ?? 0;
                                            if (($percentage == 0 || empty($percentage)) && $totalPossible > 0 && $totalScore > 0) {
                                                $percentage = round(($totalScore / $totalPossible) * 100, 1);
                                            }
                                            
                                            $highestScore = !empty($scores) ? max($scores) : 0;
                                            $highestCategory = !empty($scores) ? array_search($highestScore, $scores) : 1;
                                            $averageScore = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : 0;

                                            // DCM category names
                                            $categoryNames = [
                                                1 => 'Gejala Fisik',
                                                2 => 'Gejala Emosi',
                                                3 => 'Gejala Mental',
                                                4 => 'Gejala Perilaku',
                                                5 => 'Gejala Spiritual'
                                            ];
                                        } else {
                                            // PTSD logic
                                            $totalScore = $results['total_score'] ?? 0;
                                            $percentage = $totalScore > 0 ? round(($totalScore / 30) * 100, 1) : 0;
                                            $scores = $results['category_scores'] ?? [];
                                            $highestScore = !empty($scores) ? max($scores) : 0;
                                            $highestCategory = !empty($scores) ? array_search($highestScore, $scores) : 'A';
                                            $averageScore = count($scores) > 0 ? round(array_sum($scores) / count($scores), 1) : 0;

                                            // PTSD category names
                                            $categoryNames = [
                                                'A' => 'Terbayangi oleh Peristiwa Traumatis',
                                                'B' => 'Harapan Masa Depan Rendah',
                                                'C' => 'Berpikir Negatif',
                                                'D' => 'Emosional',
                                                'E' => 'Mengisolasi Diri',
                                                'F' => 'Merasa Tidak Berdaya'
                                            ];
                                        }
                                    @endphp

                                    <!-- Score Summary -->
                                    <div class="alert alert-primary d-flex align-items-center p-5 mb-5">
                                        <i class="fas fa-chart-line fs-2hx text-primary me-4"></i>
                                        <div class="d-flex flex-column">
                                            @if($isDCM)
                                                <h4 class="mb-1 text-dark">Total Masalah</h4>
                                                <span class="text-gray-700 fw-semibold">
                                                    <span class="fs-2x fw-bold text-primary">{{ $totalScore }}</span>
                                                    <span class="text-muted">/{{ $totalPossible }}</span>
                                                    <span class="text-muted ms-2">({{ $percentage }}%)</span>
                                                </span>
                                            @else
                                                <h4 class="mb-1 text-dark">Jumlah Dijawab</h4>
                                                <span class="text-gray-700 fw-semibold">
                                                    <span class="fs-2x fw-bold text-primary">{{ $totalScore }}</span>
                                                    <span class="text-muted">/30</span>
                                                    <span class="text-muted ms-2">({{ $percentage }}%)</span>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Interpretation -->
                                    <div class="alert alert-success d-flex align-items-center p-5 mb-5">
                                        <i class="fas fa-lightbulb fs-2hx text-success me-4"></i>
                                        <div class="d-flex flex-column">
                                            <h4 class="mb-1 text-dark">Interpretasi Hasil</h4>
                                            @if($isDCM)
                                                <p class="text-gray-700 mb-0">
                                                    Berdasarkan jawaban, <strong>{{ $categoryNames[$highestCategory] ?? $highestCategory }}</strong> adalah gejala dominan dengan skor tertinggi ({{ $highestScore }} dari 20 masalah).
                                                    Fokus pada gejala yang paling dialami untuk penanganan yang lebih tepat.
                                                </p>
                                            @else
                                                <p class="text-gray-700 mb-0">
                                                    Berdasarkan jawaban, kategori <strong>{{ $categoryNames[$highestCategory] ?? $highestCategory }}</strong> memiliki skor tertinggi ({{ $highestScore }}).
                                                    Skor ini mengindikasikan tingkat hambatan traumatik yang perlu diperhatikan.
                                                    @if($averageScore >= 3)
                                                        Secara keseluruhan, hasil menunjukkan tingkat hambatan yang perlu ditangani dengan segera.
                                                    @elseif($averageScore >= 2)
                                                        Secara keseluruhan, ada beberapa area yang perlu diperhatikan untuk perbaikan.
                                                    @else
                                                        Secara keseluruhan, hasil menunjukkan tingkat hambatan yang relatif rendah namun tetap perlu perhatian.
                                                    @endif
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Results Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover align-middle">
                                            @if($isDCM)
                                                <!-- DCM Table Format -->
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="text-start">Kategori</th>
                                                        <th class="text-center">Skor</th>
                                                        <th class="text-center">Ranking</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $scores = $results['category_scores'] ?? [];
                                                        $sortedScores = $scores;
                                                        arsort($sortedScores);
                                                        $ranking = 1;
                                                    @endphp
                                                    @foreach($sortedScores as $category => $score)
                                                        <tr class="{{ $category === ($results['dominant_category'] ?? 0) ? 'table-primary' : '' }}">
                                                            <td class="fw-semibold">{{ $categoryNames[$category] ?? $category }}</td>
                                                            <td class="text-center fw-bold text-primary">{{ $score }}</td>
                                                            <td class="text-center">{{ $ranking }}</td>
                                                        </tr>
                                                        @php $ranking++; @endphp
                                                    @endforeach
                                                </tbody>
                                            @else
                                                <!-- PTSD Table Format -->
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="text-start">Kolom</th>
                                                        <th class="text-center">Skor</th>
                                                        <th class="text-center">Ranking</th>
                                                        <th class="text-start">Jenis Hambatan Traumatik</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $scores = $results['category_scores'] ?? [];
                                                        $sortedScores = $scores;
                                                        arsort($sortedScores);
                                                        $ranking = 1;
                                                    @endphp
                                                    @foreach($sortedScores as $category => $score)
                                                        <tr>
                                                            <td class="fw-semibold">{{ $category }}</td>
                                                            <td class="text-center fw-bold text-primary">{{ $score }}</td>
                                                            <td class="text-center">{{ $ranking }}</td>
                                                            <td>{{ $categoryNames[$category] ?? $category }}</td>
                                                        </tr>
                                                        @php $ranking++; @endphp
                                                    @endforeach
                                                </tbody>
                                            @endif
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4 text-muted">
                                        <i class="fas fa-info-circle fs-2x mb-3"></i>
                                        <p>Data hasil assessment tidak tersedia</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card shadow-sm">
                <div class="card-body text-center py-12">
                    <div class="symbol symbol-100px mb-5">
                        <div class="symbol-label bg-light">
                            <i class="fas fa-history fs-2x text-muted"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold text-gray-700 mb-2">Belum Ada Riwayat</h3>
                    <p class="text-muted mb-6">User ini belum pernah menyelesaikan assessment {{ strtoupper($type) }}.</p>
                    <a href="{{ route('admin.assessments.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Assessment
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

