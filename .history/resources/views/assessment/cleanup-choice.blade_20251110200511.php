@extends('layouts_old.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-orange-50 py-12">
    <div class="container mx-auto px-6 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl shadow-lg mb-6">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 6v6h4m6 6v6a4 4 0 01h-4m0 0h6a4 4 0z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Pilih Aksi Assessment</h1>
            <p class="text-lg text-gray-600">Temukan assessment yang belum selesai</p>
        </div>

        <!-- Choices -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-8" data-aos="fade-up" data-aos-delay="100">
            @if($incompleteAssessments->count() > 0)
                <!-- Incomplete Assessments Found -->
                <div class="space-y-6">
                    <!-- Incomplete Assessment Cards -->
                    @foreach($incompleteAssessments as $index => $incompleteAssessment)
                        <div class="bg-red-50 border-l-4 border-red-200 rounded-xl p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-lg font-bold text-red-800">
                                    Assessment #{{ $index + 1 }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    Dimulai: {{ $incompleteAssessment->started_at->format('d M Y') }}
                                </div>
                            </div>

                            <div class="text-gray-700">
                                <p class="font-semibold mb-2">Status:</p>
                                <p class="text-red-600 font-medium">Belum Selesai</p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 mt-6">
                                <form action="{{ route('assessment.process-cleanup', $assessment->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="assessment_id" value="{{ $incompleteAssessment->id }}">
                                    <button type="submit" class="w-full bg-red-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-red-700 transition-colors duration-300">
                                        Hapus Assessment Ini
                                    </button>
                                </form>

                                <form action="{{ route('assessment.process-cleanup', $assessment->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="action" value="continue">
                                    <input type="hidden" name="assessment_id" value="{{ $incompleteAssessment->id }}">
                                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                        Lanjutkan Assessment Ini
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- No Incomplete Assessments -->
                <div class="text-center">
                    <div class="bg-green-100 border-l-4 border-green-200 rounded-xl p-8 mb-6">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-green-800 mb-2">Tidak Ada Assessment Belum Selesai</h3>
                        <p class="text-gray-600">Anda tidak memiliki assessment yang belum selesai.</p>
                    </div>

                    <!-- Start New Assessment Button -->
                    <div class="mt-8">
                        <a href="{{ route('assessment.start', $assessment->id) }}"
                           class="inline-flex items-center px-8 py-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 6v6a4 4 0 6h4l4-4 4 0z"></path>
                            </svg>
                            <span>Mulai Assessment Baru</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Back Button -->
        <div class="text-center mt-8">
            <a href="{{ route('assessment') }}"
               class="inline-flex items-center px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7 7 7 7-5 4h6M4 4z"></path>
                </svg>
                <span>Kembali ke Daftar Assessment</span>
            </a>
        </div>
    </div>
</div>

<script>
// Remove auto-redirect - user should choose action explicitly
document.addEventListener('DOMContentLoaded', function() {
    console.log('Cleanup choice page loaded for assessment ID: {{ $assessment->id }}');
    console.log('Incomplete assessments count: {{ $incompleteAssessments->count() }}');

    // No auto-redirect - let user make conscious choice
});
</script>
@endsection