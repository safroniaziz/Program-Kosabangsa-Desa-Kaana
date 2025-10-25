@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Assessment Kesehatan Mental</h1>
            <p class="text-xl text-gray-600">
                Pilih jenis assessment yang ingin Anda ikuti
            </p>
        </div>

        <!-- Assessment Options -->
        <div class="space-y-6">
            <!-- PTSD Diagnostic -->
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Instrumen Kriteria Diagnostik PTSD</h3>
                        <p class="text-gray-600 mb-4">
                            Assessment untuk mengevaluasi gejala-gejala terkait PTSD (Post-Traumatic Stress Disorder) berdasarkan kriteria diagnostik yang terstandar.
                        </p>
                        <div class="flex items-center space-x-6 text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                20 menit
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                30 pertanyaan
                            </span>
                        </div>
                        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded mb-4">
                            <p class="text-sm text-blue-700">
                                <strong>Format:</strong> Beri tanda silang (X) pada pernyataan yang BENAR bagi Anda. Pernyataan yang tidak disilang dianggap TIDAK BENAR.
                            </p>
                        </div>
                    </div>
                    <div class="ml-8">
                        @auth
                            <a href="{{ route('assessment.mental-health') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                                Mulai Assessment
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Login untuk Mulai
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Checklist Masalah -->
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Daftar Cek Masalah Pasca Bencana</h3>
                        <p class="text-gray-600 mb-4">
                            Checklist untuk mengidentifikasi berbagai gejala dan masalah yang mungkin dialami setelah mengalami bencana atau trauma.
                        </p>
                        <div class="flex items-center space-x-6 text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                15 menit
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                69 gejala
                            </span>
                        </div>
                        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded mb-4">
                            <p class="text-sm text-green-700">
                                <strong>Format:</strong> Checklist gejala-gejala yang Anda alami. Pilih "Ada" atau "Tidak Ada" untuk setiap gejala.
                            </p>
                        </div>
                    </div>
                    <div class="ml-8">
                        @auth
                            <a href="{{ route('assessment.mental-health') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                                Mulai Assessment
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Login untuk Mulai
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Information Box -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg p-8 text-white" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-bold">Informasi Penting</h3>
                </div>
                <ul class="space-y-2 text-sm opacity-90">
                    <li class="flex items-start">
                        <span class="w-2 h-2 bg-white rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        <span>Assessment ini adalah alat skrining untuk membantu mendeteksi gejala-gejala terkait kondisi kesehatan mental pasca trauma atau bencana.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-2 h-2 bg-white rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        <span>Hasil assessment dapat membantu Anda memahami kondisi kesehatan mental dan memberikan rekomendasi langkah selanjutnya.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-2 h-2 bg-white rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        <span>Jawablah pertanyaan dengan jujur sesuai dengan kondisi yang Anda alami untuk mendapatkan hasil yang akurat.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="w-2 h-2 bg-white rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        <span>Jika hasil menunjukkan level risiko tinggi, sangat disarankan untuk berkonsultasi dengan profesional kesehatan mental.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
