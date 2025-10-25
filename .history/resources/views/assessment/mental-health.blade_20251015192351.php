@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Asesmen Kesehatan Mental</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Evaluasi kondisi kesehatan mental Anda melalui asesmen yang telah terstandarisasi secara klinis
            </p>
        </div>

        <!-- Assessment Cards -->
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            @forelse($assessments as $assessment)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <!-- Assessment Header -->
                    <div class="bg-gradient-to-r {{ $assessment->type === 'pcl5' ? 'from-purple-500 to-purple-600' : 'from-green-500 to-green-600' }} px-6 py-4">
                        <h2 class="text-2xl font-bold text-white">{{ $assessment->name }}</h2>
                        <p class="text-purple-100 mt-1">
                            @if($assessment->type === 'pcl5')
                                Asesmen untuk mendeteksi gejala PTSD berdasarkan kriteria DSM-5
                            @elseif($assessment->type === 'dass21')
                                Asesmen tingkat depresi, kecemasan, dan stres
                            @endif
                        </p>
                    </div>

                    <!-- Assessment Details -->
                    <div class="p-6">
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Estimasi waktu: {{ $assessment->time_limit_minutes }} menit</span>
                            </div>

                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Jumlah pertanyaan: {{ $assessment->total_questions }}</span>
                            </div>

                            @if($assessment->type === 'pcl5')
                                <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-purple-800">PCL-5 (PTSD Checklist)</h3>
                                            <p class="text-sm text-purple-700 mt-1">Asesmen untuk mendeteksi gejala PTSD berdasarkan DSM-5</p>
                                        </div>
                                    </div>
                                </div>
                            @elseif($assessment->type === 'dass21')
                                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-green-800">DASS-21</h3>
                                            <p class="text-sm text-green-700 mt-1">Asesmen tingkat depresi, kecemasan, dan stres</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Action Button -->
                        <div class="flex justify-center">
                            <a href="{{ route('assessment.start', $assessment) }}"
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r {{ $assessment->type === 'pcl5' ? 'from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700' : 'from-green-500 to-green-600 hover:from-green-600 hover:to-green-700' }} text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                Mulai Asesmen
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-medium text-gray-500 mb-2">Tidak Ada Asesmen Tersedia</h3>
                    <p class="text-gray-400">Asesmen kesehatan mental belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Information Section -->
        <div class="mt-16 bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="300">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Informasi Penting</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Tentang Asesmen
                    </h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            Asesmen ini menggunakan standar klinis internasional
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            Hasil bersifat screening, bukan diagnosis medis
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            Data Anda tersimpan dengan aman dan rahasia
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        Penting untuk Diketahui
                    </h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            Jika merasa dalam krisis, hubungi hotline kesehatan mental
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            Konsultasikan hasil dengan tenaga kesehatan mental
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            Asesmen dapat diulang setelah 30 hari
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- History Link -->
        @auth
            <div class="text-center mt-8">
                <a href="{{ route('assessment.history') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Lihat Riwayat Asesmen
                </a>
            </div>
        @endauth
    </div>
</div>
@endsection
