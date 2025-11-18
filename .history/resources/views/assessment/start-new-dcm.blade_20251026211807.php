@extends('layouts.app')

@section('title', 'Mulai Assessment DCM Baru - Desa Kaana')

@section('content')
<!-- Split Screen Layout -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50">
    <div class="container mx-auto px-6 py-8 max-w-7xl">
        <div class="grid lg:grid-cols-2 gap-8 h-full">

            <!-- Left Side - Riwayat DCM Assessment -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <div class="h-full flex flex-col">
                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Riwayat Assessment Terbaru</h2>
                                <p class="text-gray-600 text-sm">{{ $assessment->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat List -->
                    <div class="flex-1 overflow-y-auto">
                        @if(isset($recentAssessments) && $recentAssessments->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentAssessments as $index => $recentAssessment)
                                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:border-emerald-300 transition-colors cursor-pointer" onclick="viewResult({{ $recentAssessment->id }})">
                                        <div class="flex items-start justify-between mb-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-emerald-600 font-bold text-sm">{{ $index + 1 }}</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900">Assessment #{{ $recentAssessment->id }}</h3>
                                                    <p class="text-sm text-gray-600">{{ $recentAssessment->completed_at->format('d F Y - H.i') }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                @if($recentAssessment->overall_risk_level === 'high' || $recentAssessment->overall_risk_level === 'critical')
                                                    <span class="px-2 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Tinggi</span>
                                                @elseif($recentAssessment->overall_risk_level === 'moderate')
                                                    <span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Sedang</span>
                                                @else
                                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Rendah</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Preview Score -->
                                        @if(isset($recentAssessment->results['total_score']))
                                            <div class="mt-3 pt-3 border-t border-gray-200">
                                                <div class="flex items-center justify-between text-sm">
                                                    <span class="text-gray-600">Skor Total:</span>
                                                    <span class="font-bold text-emerald-600">{{ $recentAssessment->results['total_score'] }}/69</span>
                                                </div>
                                                @if(isset($recentAssessment->results['dominant_category_name']))
                                                    <div class="mt-2">
                                                        <span class="text-xs text-gray-600">Fokus Utama: {{ $recentAssessment->results['dominant_category_name'] }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif

                                        <!-- Show Questions and Answers -->
                                        <div class="mt-3 pt-3 border-t border-gray-200">
                                            <h4 class="font-semibold text-gray-800 mb-2 text-sm">Pertanyaan & Jawaban:</h4>
                                            @if(isset($recentAssessment->results['answers_summary']) && is_array($recentAssessment->results['answers_summary']))
                                                @foreach($recentAssessment->results['answers_summary'] as $answer)
                                                    <div class="mb-2 p-2 bg-gray-50 rounded">
                                                        <p class="text-sm text-gray-700">
                                                            <strong>{{ $answer['question'] ?? 'Pertanyaan' }}:</strong>
                                                            <span class="text-emerald-600">{{ $answer['answer'] ?? 'Tidak ada jawaban' }}</span>
                                                        </p>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-sm text-gray-500">Detail jawaban tidak tersedia</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2 2v10a2 2 0 012-2h4a2 2 0 012-2v5a2 2 0 012-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Riwayat</h3>
                                <p class="text-gray-500 text-sm">Anda belum pernah mengerjakan assessment {{ $assessment->name }} sebelumnya.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Side - Form Assessment Baru -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                <div class="h-full flex flex-col">
                    <!-- Header -->
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4m8 0l8 8-8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Assessment Baru</h2>
                                <p class="text-gray-600 text-sm">{{ $assessment->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Assessment Info -->
                    <div class="bg-emerald-50 rounded-xl p-6 mb-6 border border-emerald-200">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-emerald-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-emerald-800 mb-2">Siap Memulai Assessment?</h3>
                                <p class="text-emerald-700 text-sm">Anda dapat memulai assessment baru atau melihat hasil assessment sebelumnya di panel kiri.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Assessment Details -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Jumlah Pertanyaan:</span>
                            <span class="font-bold text-emerald-600">{{ $assessment->total_questions }} Pertanyaan</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-purple-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Estimasi Waktu:</span>
                            <span class="font-bold text-purple-600">{{ $assessment->time_limit_minutes }} Menit</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg">
                            <span class="text-gray-700 font-medium">Format:</span>
                            <span class="font-bold text-amber-600">Radio Button (Ada/Tidak Ada)</span>
                        </div>
                    </div>

                    <!-- Start Button -->
                    <div class="mt-auto">
                        <a href="{{ route('assessment.start', $assessment->id) }}"
                           class="w-full flex items-center justify-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <span class="text-lg">Mulai Assessment Baru</span>
                        </a>

                        <p class="text-center text-gray-500 text-sm mt-4">
                            Memulai assessment baru dengan sesi yang baru
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function viewResult(assessmentId) {
    window.open('/assessment/result/' + assessmentId, '_blank');
}
</script>

@endsection