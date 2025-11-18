@extends('layouts_old.app')

@section('title', 'Assessment DCM - ' . $assessment->name)

@section('content')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Clean White Background -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-6 max-w-6xl">
        <!-- Hero Section -->
        <div class="relative mb-12" data-aos="fade-up">
            <div class="relative z-10">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600">
                            {{ $assessment->name }}
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600">{{ $assessment->description ?? 'Daftar Cek Masalah Pasca Bencana' }}</p>
                </div>
            </div>
        </div>

        <!-- Assessment Form -->
        <form id="dcmForm" action="{{ route('assessment.submit', $assessment) }}" method="POST" class="space-y-8">
            @csrf

            <!-- DCM Questions from Database -->
            @foreach($questions['questions'] as $category => $categoryQuestions)
                <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden" data-aos="fade-up">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-heartbeat text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">{{ $questions['category_names'][$category] ?? 'Unknown' }}</h2>
                                <p class="text-green-100">Beri tanda centang (✓) pada setiap gejala yang terasa</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($categoryQuestions as $questionObj)
                                <div class="group bg-gray-50 rounded-xl p-4 hover:bg-green-50 hover:border-green-200 border-2 border-transparent transition-all duration-300 cursor-pointer">
                                    <label class="flex items-start space-x-3 cursor-pointer">
                                        <input type="checkbox"
                                               name="responses[{{ $questionObj->id }}]"
                                               value="1"
                                               class="mt-1 w-5 h-5 text-green-600 rounded focus:ring-green-500 focus:ring-2 cursor-pointer"
                                               onchange="updateDcmProgress()">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2 mb-1">
                                                <span class="text-sm font-bold text-green-600">{{ $questionObj->id }}.</span>
                                                <span class="font-semibold text-gray-900">{{ $questionObj->question }}</span>
                                            </div>
                                            @if($questionObj->description)
                                                <p class="text-sm text-gray-600">{{ $questionObj->description }}</p>
                                            @endif
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Clean Submit Button -->
                <div class="text-center mt-12 pt-8 border-t border-gray-200">
                    <button type="submit"
                            id="submitButton"
                            class="inline-flex items-center justify-center px-8 py-3 bg-emerald-500 hover:bg-emerald-600 border-emerald-500 hover:border-emerald-600
                            text-white font-medium rounded-xl border
                            transition-all duration-200 shadow-lg hover:shadow-xl
                            disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                        <!-- Loading Spinner (hidden by default) -->
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden group-disabled:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>

                        <!-- Success Icon -->
                        <svg class="w-5 h-5 mr-3 hidden group-disabled:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>

                        <span id="buttonText">Selesaikan Assessment</span>
                    </button>
                </div>

                <!-- Back Button -->
                <div class="text-center mt-4">
                    <a href="{{ route('assessment') }}"
                       class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
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

            // Enable/disable submit button based on checked boxes
            const checkedBoxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const submitButton = document.getElementById('submitButton');

            if (checkedBoxes.length > 0) {
                submitButton.disabled = false;
                submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                submitButton.classList.remove('bg-gray-400', 'hover:bg-gray-500', 'border-gray-400', 'hover:border-gray-500');
                submitButton.classList.add('bg-emerald-600', 'hover:bg-emerald-700', 'border-emerald-600', 'hover:border-emerald-700');
            } else {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-50', 'cursor-not-allowed', 'bg-gray-400', 'hover:bg-gray-500', 'border-gray-400', 'hover:border-gray-500');
                submitButton.classList.remove('bg-emerald-600', 'hover:bg-emerald-700', 'border-emerald-600', 'hover:border-emerald-700');
            }
        });
    });

    // Form submission
    document.getElementById('dcmForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

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
                    // Show loading state
                    const submitButton = document.getElementById('submitButton');
                    const buttonText = document.getElementById('buttonText');

                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.classList.add('group-disabled');

                        // Hide spinner by default, show when disabled
                        const spinner = submitButton.querySelector('.animate-spin');
                        if (spinner) {
                            spinner.classList.remove('hidden');
                        }

                        // Update button text
                        if (buttonText) {
                            buttonText.textContent = 'Memproses...';
                        }
                    }

                    // Submit form
                    this.submit();
                }
            });
        } else {
            // Show confirmation dialog
            Swal.fire({
                title: 'Konfirmasi Submit Assessment',
                html: `
                    <div class="text-left">
                        <p class="mb-3">Apakah Anda yakin ingin menyelesaikan assessment ini?</p>
                        <div class="bg-green-50 rounded-lg p-3 mb-3">
                            <p class="text-sm text-green-800"><strong>Masalah dipilih:</strong> ${checkedBoxes.length}</p>
                            <p class="text-sm text-green-800"><strong>Total soal:</strong> {{ $assessment->total_questions ?? 100 }}</p>
                        </div>
                        <p class="text-sm text-gray-600">Setelah submit, Anda akan melihat hasil assessment pada halaman riwayat.</p>
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Submit',
                cancelButtonText: 'Periksa Kembali',
                width: '500px'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    const submitButton = document.getElementById('submitButton');
                    const buttonText = document.getElementById('buttonText');

                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.classList.add('group-disabled');

                        // Hide spinner by default, show when disabled
                        const spinner = submitButton.querySelector('.animate-spin');
                        if (spinner) {
                            spinner.classList.remove('hidden');
                        }

                        // Update button text
                        if (buttonText) {
                            buttonText.textContent = 'Memproses...';
                        }
                    }

                    // Submit form via AJAX
                    const form = document.getElementById('dcmForm');
                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // Show success notification
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Assessment DCM berhasil disimpan. Anda dapat melihat hasil pada halaman riwayat.',
                                confirmButtonColor: '#10b981',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false,
                                allowEscapeKey: false
                            }).then((result) => {
                                // Redirect after user clicks OK
                                if (result.isConfirmed) {
                                    window.location.href = `/assessment/{{ $assessment->id }}/start-new`;
                                }
                            });
                        } else {
                            throw new Error('Gagal menyimpan assessment');
                        }
                    })
                    .catch(error => {
                        // Show error notification
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyimpan assessment. Silakan coba lagi.',
                            confirmButtonColor: '#ef4444',
                            confirmButtonText: 'OK'
                        });

                        // Reset button state
                        submitButton.disabled = true;
                        submitButton.classList.remove('group-disabled');
                        if (spinner) spinner.classList.add('hidden');
                        if (buttonText) buttonText.textContent = 'Submit Assessment';
                    });
                }
            });
        }
    });
});

    // Function for DCM progress update
    function updateDcmProgress() {
        // Count checked checkboxes
        const checkedBoxes = document.querySelectorAll('input[type="checkbox"]:checked').length;
        const totalQuestions = {{ $assessment->total_questions ?? 100 }};

        // Update progress
        const progressPercent = Math.min(100, (checkedBoxes / totalQuestions) * 100);

        // Enable/disable submit button
        const submitButton = document.getElementById('submitButton');
        if (checkedBoxes > 0) {
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
            submitButton.classList.remove('bg-gray-400', 'hover:bg-gray-500', 'border-gray-400', 'hover:border-gray-500');
            submitButton.classList.add('bg-emerald-600', 'hover:bg-emerald-700', 'border-emerald-600', 'hover:border-emerald-700');
        } else {
            submitButton.disabled = true;
            submitButton.classList.add('opacity-50', 'cursor-not-allowed', 'bg-gray-400', 'hover:bg-gray-500', 'border-gray-400', 'hover:border-gray-500');
            submitButton.classList.remove('bg-emerald-600', 'hover:bg-emerald-700', 'border-emerald-600', 'hover:border-emerald-700');
        }
    }
</script>

<!-- Add AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>
@endsection
