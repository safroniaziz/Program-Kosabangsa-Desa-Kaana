@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Riwayat Assessment</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Lihat semua hasil assessment kesehatan mental yang pernah Anda lakukan
            </p>
        </div>

        @if($userAssessments->count() > 0)
            <!-- Assessment History Cards -->
            <div class="space-y-6">
                @foreach($userAssessments as $userAssessment)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="p-6">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <!-- Assessment Info -->
                                <div class="flex-1">
                                    <div class="flex items-center space-x-4 mb-4">
                                        <!-- Assessment Type Icon -->
                                        <div class="w-12 h-12 rounded-lg flex items-center justify-center
                                                    {{ in_array($userAssessment->assessment_info->type ?? '', ['ptsd_diagnostic', 'pcl5']) ? 'bg-blue-100' : 'bg-green-100' }}">
                                            @if(in_array($userAssessment->assessment_info->type ?? '', ['ptsd_diagnostic', 'pcl5']))
                                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                            @endif
                                        </div>

                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">{{ $userAssessment->assessment_info->name ?? 'Assessment' }}</h3>
                                            <p class="text-gray-600">
                                                @if(($userAssessment->assessment_info->type ?? '') === 'ptsd_diagnostic')
                                                    Instrumen Kriteria Diagnostik PTSD
                                                @elseif(($userAssessment->assessment_info->type ?? '') === 'pcl5')
                                                    Asesmen PTSD berdasarkan DSM-5
                                                @elseif(($userAssessment->assessment_info->type ?? '') === 'dass21')
                                                    Asesmen Depresi, Kecemasan, dan Stres
                                                @elseif(($userAssessment->assessment_info->type ?? '') === 'checklist_masalah')
                                                    Daftar Cek Masalah Pasca Bencana
                                                @else
                                                    Assessment Kesehatan Mental
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Assessment Details -->
                                    <div class="flex flex-wrap items-center text-sm text-gray-600 space-x-6 mb-4">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ $userAssessment->completed_at->format('d M Y') }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $userAssessment->completed_at->format('H:i') }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            {{ $userAssessment->assessment->total_questions }} pertanyaan
                                        </span>
                                    </div>
                                </div>

                                <!-- Results Summary -->
                                @if($userAssessment->results)
                                    <div class="lg:ml-6 lg:text-right">
                                        @if($userAssessment->assessment->type === 'pcl5')
                                            <div class="mb-2">
                                                <span class="text-2xl font-bold text-gray-800">{{ $userAssessment->results['total_score'] ?? 0 }}</span>
                                                <span class="text-gray-600">/80</span>
                                            </div>
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                        {{ ($userAssessment->results['severity'] ?? 'minimal') === 'severe' ? 'bg-red-100 text-red-800' :
                                                           (($userAssessment->results['severity'] ?? 'minimal') === 'moderate' ? 'bg-yellow-100 text-yellow-800' :
                                                            (($userAssessment->results['severity'] ?? 'minimal') === 'mild' ? 'bg-green-100 text-green-800' :
                                                             'bg-gray-100 text-gray-800')) }}">
                                                {{ ucfirst($userAssessment->results['severity'] ?? 'minimal') }}
                                            </div>

                                            @if(($userAssessment->results['probable_ptsd'] ?? false))
                                                <div class="mt-2">
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Kemungkinan PTSD
                                                    </span>
                                                </div>
                                            @endif

                                        @elseif($userAssessment->assessment->type === 'dass21')
                                            <div class="space-y-2">
                                                @php
                                                    $subscales = ['depression' => 'Depresi', 'anxiety' => 'Kecemasan', 'stress' => 'Stres'];
                                                    $severityLevels = $userAssessment->results['severity_levels'] ?? [];
                                                @endphp

                                                @foreach($subscales as $key => $name)
                                                    @php
                                                        $level = $severityLevels[$key] ?? 'normal';
                                                        $colorClass = match($level) {
                                                            'normal' => 'bg-green-100 text-green-800',
                                                            'mild' => 'bg-blue-100 text-blue-800',
                                                            'moderate' => 'bg-yellow-100 text-yellow-800',
                                                            'severe' => 'bg-orange-100 text-orange-800',
                                                            'extremely_severe' => 'bg-red-100 text-red-800',
                                                            default => 'bg-gray-100 text-gray-800'
                                                        };
                                                    @endphp
                                                    <div class="flex items-center justify-between text-sm">
                                                        <span class="text-gray-600">{{ $name }}:</span>
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $colorClass }}">
                                                            {{ ucfirst(str_replace('_', ' ', $level)) }}
                                                        </span>
                                                    </div>
                                                @endforeach

                                                <div class="mt-2 pt-2 border-t border-gray-200">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                                {{ ($userAssessment->results['overall_risk'] ?? 'low') === 'high' ? 'bg-red-100 text-red-800' :
                                                                   (($userAssessment->results['overall_risk'] ?? 'low') === 'moderate' ? 'bg-yellow-100 text-yellow-800' :
                                                                    'bg-green-100 text-green-800') }}">
                                                        Risiko {{ ucfirst($userAssessment->results['overall_risk'] ?? 'low') }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap gap-3 mt-6 pt-6 border-t border-gray-200">
                                <a href="{{ route('assessment.result', $userAssessment) }}"
                                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat Detail
                                </a>

                                <button onclick="shareResult('{{ $userAssessment->id }}')"
                                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                    Bagikan
                                </button>

                                <span class="text-xs text-gray-500 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $userAssessment->completed_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
                {{ $userAssessments->links() }}
            </div>

        @else
            <!-- Empty State -->
            <div class="text-center py-16" data-aos="fade-up">
                <svg class="w-32 h-32 mx-auto text-gray-300 mb-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-2xl font-medium text-gray-500 mb-4">Belum Ada Riwayat Assessment</h3>
                <p class="text-gray-400 mb-8 max-w-md mx-auto">
                    Anda belum pernah menyelesaikan assessment kesehatan mental. Mulai assessment pertama Anda sekarang.
                </p>
                <a href="{{ route('assessment') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Mulai Assessment Pertama
                </a>
            </div>
        @endif

        <!-- Quick Statistics -->
        @if($userAssessments->count() > 0)
            <div class="bg-white rounded-xl shadow-lg p-8 mt-12" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Statistik Assessment Anda</h3>

                <div class="grid md:grid-cols-4 gap-6 text-center">
                    <div>
                        <div class="text-3xl font-bold text-blue-600 mb-2">{{ $userAssessments->total() }}</div>
                        <p class="text-gray-600">Total Assessment</p>
                    </div>

                    <div>
                        <div class="text-3xl font-bold text-green-600 mb-2">
                            {{ $userAssessments->where('assessment.type', 'pcl5')->count() }}
                        </div>
                        <p class="text-gray-600">PCL-5</p>
                    </div>

                    <div>
                        <div class="text-3xl font-bold text-purple-600 mb-2">
                            {{ $userAssessments->where('assessment.type', 'dass21')->count() }}
                        </div>
                        <p class="text-gray-600">DASS-21</p>
                    </div>

                    <div>
                        <div class="text-3xl font-bold text-orange-600 mb-2">
                            {{ $userAssessments->first()?->completed_at?->format('M Y') ?? '-' }}
                        </div>
                        <p class="text-gray-600">Assessment Terakhir</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Back to Assessment -->
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="500">
            <a href="{{ route('assessment') }}"
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Assessment Baru
            </a>
        </div>
    </div>
</div>

<script>
function shareResult(assessmentId) {
    if (navigator.share) {
        navigator.share({
            title: 'Hasil Assessment Kesehatan Mental',
            text: 'Saya telah menyelesaikan assessment kesehatan mental di Kosabangsa Desa Kaana',
            url: `${window.location.origin}/assessment/result/${assessmentId}`
        }).then(() => {
            console.log('Successful share');
        }).catch((error) => {
            console.log('Error sharing', error);
            fallbackShare(assessmentId);
        });
    } else {
        fallbackShare(assessmentId);
    }
}

function fallbackShare(assessmentId) {
    const url = `${window.location.origin}/assessment/result/${assessmentId}`;
    navigator.clipboard.writeText(url).then(() => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Disalin!',
            text: 'Link hasil assessment telah disalin ke clipboard!',
            confirmButtonColor: '#10b981',
            confirmButtonText: 'OK',
            timer: 2000,
            timerProgressBar: true,
            backdrop: true,
            allowOutsideClick: false
        });
    }).catch(() => {
        prompt('Copy link hasil assessment:', url);
    });
}
</script>
@endsection
