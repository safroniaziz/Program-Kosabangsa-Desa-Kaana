@extends('layouts.app')

@section('content')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Clean White Background -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-6 max-w-6xl">
        <!-- Hero Section - Enhanced -->
        <div class="relative mb-12" data-aos="fade-up">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-gradient-to-br from-green-400/20 to-emerald-600/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-20 -left-20 w-32 h-32 bg-gradient-to-br from-cyan-400/20 to-blue-600/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>

            <!-- Main Content -->
            <div class="relative z-10">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500/10 to-emerald-500/10 backdrop-blur-md rounded-full px-6 py-3 mb-8 border border-green-200/30">
                    <div class="w-2 h-2 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-medium text-gray-700">Daftar Cek Masalah (DCM)</span>
                </div>

                <!-- Title with Gradient -->
                <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600">
                        Checklist Masalah
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Identifikasi <span class="font-semibold text-green-600">masalah-masalah</span>
                    yang Anda alami setelah peristiwa traumatis
                </p>

                <!-- Stats Cards -->
                <div class="flex flex-wrap justify-center gap-6 mb-8">
                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg border border-gray-200/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium">Total Masalah</p>
                                <p class="text-2xl font-bold text-gray-900">100 Items</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg border border-gray-200/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium">Kategori</p>
                                <p class="text-2xl font-bold text-gray-900">5 Gejala</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg border border-gray-200/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium">Estimasi Waktu</p>
                                <p class="text-2xl font-bold text-gray-900">15 Menit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 mb-8 shadow-xl border border-gray-200/50" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Petunjuk Pengisian</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::INSTRUCTIONS }}
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <input type="checkbox" checked class="w-4 h-4 text-green-600 rounded focus:ring-green-500">
                            <span><strong>Centang (✓)</strong> = Anda mengalami masalah ini</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <input type="checkbox" class="w-4 h-4 text-gray-400 rounded focus:ring-gray-500">
                            <span><strong>Tidak dicentang</strong> = Anda tidak mengalami</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Disclaimer -->
        <div class="bg-yellow-50/80 backdrop-blur-sm rounded-2xl p-6 mb-8 border border-yellow-200/50" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-yellow-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.728-.833-2.498 0L3.316 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-yellow-800 leading-relaxed">
                        <strong>Penting:</strong> {{ \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::DISCLAIMER }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Assessment Form -->
        <form id="dcmForm" action="{{ route('assessment.submit', $assessment) }}" method="POST" class="space-y-8">
            @csrf

            <!-- Category: Fisik -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-heartbeat text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Gejala 1: Fisik</h2>
                            <p class="text-red-100">Gejala-gejala yang muncul pada tubuh fisik</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $fisikProblems = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory('Fisik');
                        @endphp
                        @foreach($fisikProblems as $id => $problem)
                            <div class="group bg-gray-50 rounded-xl p-4 hover:bg-red-50 hover:border-red-200 border-2 border-transparent transition-all duration-300 cursor-pointer">
                                <label class="flex items-start space-x-3 cursor-pointer">
                                    <input type="checkbox"
                                           name="problems[{{ $id }}]"
                                           value="1"
                                           class="mt-1 w-5 h-5 text-red-600 rounded focus:ring-red-500 focus:ring-2 cursor-pointer">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-1">
                                            <span class="text-sm font-bold text-red-600">{{ $id }}.</span>
                                            <span class="font-semibold text-gray-900">{{ $problem['problem'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600">{{ $problem['description'] }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Category: Emosi -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                <div class="bg-gradient-to-r from-orange-500 to-amber-600 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-smile text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Gejala 2: Emosi</h2>
                            <p class="text-orange-100">Gejala-gejala yang berhubungan dengan perasaan dan emosi</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $emosiProblems = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory('Emosi');
                        @endphp
                        @foreach($emosiProblems as $id => $problem)
                            <div class="group bg-gray-50 rounded-xl p-4 hover:bg-orange-50 hover:border-orange-200 border-2 border-transparent transition-all duration-300 cursor-pointer">
                                <label class="flex items-start space-x-3 cursor-pointer">
                                    <input type="checkbox"
                                           name="problems[{{ $id }}]"
                                           value="1"
                                           class="mt-1 w-5 h-5 text-orange-600 rounded focus:ring-orange-500 focus:ring-2 cursor-pointer">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-1">
                                            <span class="text-sm font-bold text-orange-600">{{ $id }}.</span>
                                            <span class="font-semibold text-gray-900">{{ $problem['problem'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600">{{ $problem['description'] }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Category: Mental -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-brain text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Gejala 3: Mental</h2>
                            <p class="text-blue-100">Gejala-gejala yang berhubungan dengan pikiran dan kognitif</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $mentalProblems = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory('Mental');
                        @endphp
                        @foreach($mentalProblems as $id => $problem)
                            <div class="group bg-gray-50 rounded-xl p-4 hover:bg-blue-50 hover:border-blue-200 border-2 border-transparent transition-all duration-300 cursor-pointer">
                                <label class="flex items-start space-x-3 cursor-pointer">
                                    <input type="checkbox"
                                           name="problems[{{ $id }}]"
                                           value="1"
                                           class="mt-1 w-5 h-5 text-blue-600 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-1">
                                            <span class="text-sm font-bold text-blue-600">{{ $id }}.</span>
                                            <span class="font-semibold text-gray-900">{{ $problem['problem'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600">{{ $problem['description'] }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Category: Perilaku -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden" data-aos="fade-up" data-aos-delay="700">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Gejala 4: Perilaku</h2>
                            <p class="text-green-100">Gejala-gejala yang terlihat dari perilaku dan tindakan</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $perilakuProblems = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory('Perilaku');
                        @endphp
                        @foreach($perilakuProblems as $id => $problem)
                            <div class="group bg-gray-50 rounded-xl p-4 hover:bg-green-50 hover:border-green-200 border-2 border-transparent transition-all duration-300 cursor-pointer">
                                <label class="flex items-start space-x-3 cursor-pointer">
                                    <input type="checkbox"
                                           name="problems[{{ $id }}]"
                                           value="1"
                                           class="mt-1 w-5 h-5 text-green-600 rounded focus:ring-green-500 focus:ring-2 cursor-pointer">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-1">
                                            <span class="text-sm font-bold text-green-600">{{ $id }}.</span>
                                            <span class="font-semibold text-gray-900">{{ $problem['problem'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600">{{ $problem['description'] }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Category: Spiritual -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden" data-aos="fade-up" data-aos-delay="800">
                <div class="bg-gradient-to-r from-purple-500 to-violet-600 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-pray text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Gejala 5: Spiritual</h2>
                            <p class="text-purple-100">Gejala-gejala yang berhubungan dengan keyakinan dan spiritualitas</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $spiritualProblems = \App\Services\AssessmentQuestions\ChecklistMasalahQuestions::getProblemsByCategory('Spiritual');
                        @endphp
                        @foreach($spiritualProblems as $id => $problem)
                            <div class="group bg-gray-50 rounded-xl p-4 hover:bg-purple-50 hover:border-purple-200 border-2 border-transparent transition-all duration-300 cursor-pointer">
                                <label class="flex items-start space-x-3 cursor-pointer">
                                    <input type="checkbox"
                                           name="problems[{{ $id }}]"
                                           value="1"
                                           class="mt-1 w-5 h-5 text-purple-600 rounded focus:ring-purple-500 focus:ring-2 cursor-pointer">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-1">
                                            <span class="text-sm font-bold text-purple-600">{{ $id }}.</span>
                                            <span class="font-semibold text-gray-900">{{ $problem['problem'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600">{{ $problem['description'] }}</p>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mt-12" data-aos="fade-up" data-aos-delay="900">
                <button type="submit"
                        class="group relative px-12 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-2xl shadow-2xl hover:shadow-green-500/25 transform hover:-translate-y-1 transition-all duration-300 text-lg">
                    <span class="relative z-10 flex items-center space-x-3">
                        <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Selesaikan Assessment</span>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-green-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>

                <a href="{{ route('assessment') }}"
                   class="group px-8 py-4 bg-white/80 backdrop-blur-sm text-gray-700 font-bold rounded-2xl shadow-lg hover:shadow-xl border-2 border-gray-200 hover:border-gray-300 transform hover:-translate-y-1 transition-all duration-300 text-lg">
                    <span class="flex items-center space-x-3">
                        <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Kembali</span>
                    </span>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add interactive checkbox effects
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const container = this.closest('.group');
            if (this.checked) {
                container.classList.add('ring-2', 'ring-offset-2', 'ring-green-500');
            } else {
                container.classList.remove('ring-2', 'ring-offset-2', 'ring-green-500');
            }
        });
    });

    // Form submission with confirmation
    document.getElementById('dcmForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const checkedBoxes = document.querySelectorAll('input[type="checkbox"]:checked');

        if (checkedBoxes.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Tidak Ada Masalah Dipilih',
                text: 'Apakah Anda yakin tidak mengalami masalah apa pun?',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Lanjutkan',
                cancelButtonText: 'Periksa Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Konfirmasi Pengiriman',
                html: `Anda telah memilih <strong>${checkedBoxes.length}</strong> masalah.<br>Apakah Anda yakin dengan jawaban Anda?`,
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Kirim',
                cancelButtonText: 'Periksa Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        }
    });

    // Auto-save functionality (optional)
    let autoSaveTimer;
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                // Save to localStorage
                const formData = new FormData(document.getElementById('dcmForm'));
                const data = {};
                for (let [key, value] of formData.entries()) {
                    data[key] = value;
                }
                localStorage.setItem('dcm_draft', JSON.stringify(data));

                // Show subtle notification
                console.log('Progress auto-saved');
            }, 2000);
        });
    });

    // Load draft on page load
    const savedDraft = localStorage.getItem('dcm_draft');
    if (savedDraft) {
        try {
            const data = JSON.parse(savedDraft);
            Object.keys(data).forEach(key => {
                const checkbox = document.querySelector(`input[name="${key}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                    checkbox.dispatchEvent(new Event('change'));
                }
            });
        } catch (e) {
            console.error('Error loading draft:', e);
        }
    }
});
</script>
@endsection
