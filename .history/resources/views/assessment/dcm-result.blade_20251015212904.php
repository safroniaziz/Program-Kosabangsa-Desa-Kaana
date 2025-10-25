@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 py-12">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-8" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Hasil Assessment DCM</h1>
            <p class="text-gray-600">Daftar Cek Masalah - Analisis Kondisi Kesehatan Mental</p>
        </div>

        <!-- Main Results -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8" data-aos="fade-up" data-aos-delay="100">
            <!-- Dominant Category -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full mb-4">
                    <span class="text-2xl font-bold text-white">{{ $result->dominant_category }}</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $result->getInterpretation()['title'] }}</h2>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    {{ $result->getInterpretation()['description'] }}
                </p>
            </div>

            <!-- Statistics -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="text-center p-6 bg-green-50 rounded-xl">
                    <div class="text-3xl font-bold text-green-600 mb-2">{{ $result->total_checked }}</div>
                    <div class="text-sm font-medium text-green-700">Total Gejala Dipilih</div>
                </div>
                <div class="text-center p-6 bg-emerald-50 rounded-xl">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">{{ $result->dominant_category_name }}</div>
                    <div class="text-sm font-medium text-emerald-700">Kategori Dominan</div>
                </div>
                <div class="text-center p-6 bg-teal-50 rounded-xl">
                    <div class="text-3xl font-bold text-teal-600 mb-2">{{ $result->getCategoryPercentage($result->dominant_category) }}%</div>
                    <div class="text-sm font-medium text-teal-700">Persentase Dominan</div>
                </div>
            </div>

            <!-- Category Breakdown -->
            <div class="space-y-4 mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Rincian Per Kategori Gejala</h3>
                @foreach(\App\Models\ChecklistMasalahQuestion::getCategoryNames() as $categoryId => $categoryName)
                    @php
                        $categoryScore = $result->category_scores[$categoryId] ?? 0;
                        $categoryQuestions = \App\Models\ChecklistMasalahQuestion::where('category', $categoryId)->count();
                        $percentage = $categoryQuestions > 0 ? round(($categoryScore / $categoryQuestions) * 100, 1) : 0;
                        $isDominant = $categoryId == $result->dominant_category;
                    @endphp
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg {{ $isDominant ? 'ring-2 ring-green-500 bg-green-50' : '' }}">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-sm font-bold {{ $isDominant ? 'bg-green-500 text-white' : 'text-gray-600' }}">
                                {{ $categoryId }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Gejala {{ $categoryName }}</h4>
                                <p class="text-sm text-gray-600">{{ $categoryScore }} dari {{ $categoryQuestions }} gejala</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-32 bg-gray-200 rounded-full h-3">
                                <div class="h-3 rounded-full {{ $isDominant ? 'bg-green-500' : 'bg-gray-400' }}" style="width: {{ $percentage }}%"></div>
                            </div>
                            <span class="text-lg font-bold {{ $isDominant ? 'text-green-600' : 'text-gray-600' }}">{{ $percentage }}%</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recommendations -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                Rekomendasi Tindak Lanjut
            </h3>
            <div class="space-y-4">
                @foreach($result->getInterpretation()['recommendations'] as $recommendation)
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-gray-700 leading-relaxed">{{ $recommendation }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Important Notice -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-lg mb-8" data-aos="fade-up" data-aos-delay="300">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Disclaimer Penting</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>Hasil assessment ini adalah alat bantu skrining dan tidak menggantikan diagnosis profesional. Jika Anda mengalami distress yang signifikan atau gejala yang mengganggu aktivitas sehari-hari, sangat disarankan untuk berkonsultasi dengan profesional kesehatan mental yang qualified.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('assessment.mental-health') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Assessment Lainnya
            </a>
            <a href="{{ route('assessment.history') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Riwayat Assessment
            </a>
            <button onclick="window.print()" class="inline-flex items-center justify-center px-6 py-3 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                Cetak Hasil
            </button>
        </div>
    </div>
</div>

<style>
@media print {
    .no-print { display: none !important; }
    body { background: white !important; }
    .bg-gradient-to-br { background: white !important; }
}
</style>
@endsection