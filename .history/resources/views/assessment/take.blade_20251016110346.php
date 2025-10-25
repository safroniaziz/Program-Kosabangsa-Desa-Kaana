@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-6 max-w-5xl">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl shadow-lg mb-6">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $assessment->name }}</h1>
            <div class="flex justify-center items-center space-x-8 text-gray-600">
                <div class="flex items-center bg-white rounded-full px-4 py-2 shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ $assessment->time_limit_minutes }} menit</span>
                </div>
                <div class="flex items-center bg-white rounded-full px-4 py-2 shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ $assessment->total_questions }} pertanyaan</span>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-6 mb-8 rounded-lg" data-aos="fade-up" data-aos-delay="100">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Petunjuk Pengisian</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <p>{{ $questions['instructions'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assessment Form -->
        <form action="@if($assessment->type === 'checklist_masalah') {{ route('assessment.submit-dcm', $assessment) }} @else {{ route('assessment.submit', $assessment) }} @endif" method="POST" id="assessmentForm" data-aos="fade-up" data-aos-delay="200">
            @csrf

            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Progress Assessment</span>
                        <span id="progressText">0/@if($assessment->type === 'checklist_masalah'){{ $assessment->total_questions }}@else{{ count($questions['questions']) }}@endif</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div id="progressBar" class="bg-gradient-to-r
                            @if($assessment->type === 'ptsd_diagnostic')
                                from-blue-500 to-blue-600
                            @elseif($assessment->type === 'checklist_masalah')
                                from-green-500 to-green-600
                            @elseif($assessment->type === 'pcl5')
                                from-purple-500 to-purple-600
                            @else
                                from-gray-500 to-gray-600
                            @endif
                            h-3 rounded-full transition-all duration-500 ease-out" style="width: 0%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                        <span>Mulai</span>
                        <span>Selesai</span>
                    </div>
                </div>

                <!-- Questions Container -->
                <div class="questions-container space-y-8">
                    @if($assessment->type === 'checklist_masalah')
                        <!-- DCM Format - Group by Category -->
                        @foreach($questions['questions'] as $category => $categoryQuestions)
                            <div class="category-section bg-gray-50 rounded-xl p-6 border-2 border-gray-200">
                                <div class="mb-6">
                                    <h2 class="text-xl font-bold text-green-700 mb-2">
                                        Gejala {{ $category }}: {{ $questions['category_names'][$category] }}
                                    </h2>
                                    <p class="text-sm text-gray-600">
                                        Beri tanda centang (✓) pada setiap gejala yang terasa setelah musibah/bencana
                                    </p>
                                </div>

                                <div class="grid md:grid-cols-2 gap-4">
                                    @foreach($categoryQuestions as $questionObj)
                                        <div class="question-item bg-white rounded-lg p-4 border border-gray-200 hover:border-green-300 transition-colors duration-200">
                                            <label class="flex items-center cursor-pointer group">
                                                <input type="checkbox"
                                                       name="responses[{{ $questionObj->id }}]"
                                                       value="1"
                                                       class="w-5 h-5 text-green-600 bg-white border-2 border-gray-300 rounded focus:ring-green-500 focus:ring-2 mr-3"
                                                       onchange="updateDcmProgress()">
                                                <span class="text-gray-700 group-hover:text-green-700 transition-colors duration-200">
                                                    {{ $questionObj->question }}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Original Format for PTSD and others -->
                        @foreach($questions['questions'] as $number => $question)
                            <div class="question-block p-6 bg-gray-50 rounded-xl border-2 border-transparent transition-all duration-300 hover:border-
                                @if($assessment->type === 'ptsd_diagnostic') blue @elseif($assessment->type === 'checklist_masalah') green @elseif($assessment->type === 'pcl5') purple @else gray @endif
                                -200" data-question="{{ $number }}">
                                <!-- Question Header -->
                                <div class="mb-6">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0 w-10 h-10
                                            @php
                                                $color = 'gray';
                                                if($assessment->type === 'ptsd_diagnostic') $color = 'blue';
                                                elseif($assessment->type === 'checklist_masalah') $color = 'green';
                                                elseif($assessment->type === 'pcl5') $color = 'purple';
                                            @endphp
                                            bg-{{ $color }}-100 text-{{ $color }}-700
                                            rounded-full flex items-center justify-center text-sm font-bold shadow-sm">
                                            {{ $number }}
                                        </div>
                                        <div class="flex-1 pt-1">
                                            <h3 class="text-lg font-semibold text-gray-800 leading-relaxed">
                                                {{ $question }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                            <!-- Answer Options -->
                            <div class="ml-14 space-y-3">
                                @if($assessment->type === 'checklist_masalah' && isset($questions['symptoms']))
                                    <!-- Checklist format for symptoms -->
                                    @foreach($questions['scale'] as $value => $label)
                                        <label class="answer-option group flex items-center p-4 bg-white border-2 border-gray-200 rounded-xl hover:border-{{ $color }}-300 hover:shadow-md cursor-pointer transition-all duration-200 relative">
                                            <input type="radio"
                                                   name="answers[{{ $number }}]"
                                                   value="{{ $value }}"
                                                   class="w-5 h-5 text-{{ $color }}-600 bg-white border-2 border-gray-300 focus:ring-{{ $color }}-500 focus:ring-2 focus:ring-offset-2"
                                                   onchange="updateProgress(); animateSelection(this)"
                                                   required>

                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center">
                                                    <span class="text-gray-700 font-medium">{{ $label }}</span>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                @elseif($assessment->type === 'ptsd_diagnostic')
                                    <!-- PTSD Checkbox format - centang jika BENAR -->
                                    <div class="space-y-4">
                                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                            <p class="text-sm text-blue-700 font-medium">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Beri tanda centang (✓) jika pernyataan ini BENAR bagi Anda. Biarkan kosong jika TIDAK BENAR.
                                            </p>
                                        </div>

                                        <label class="answer-option group flex items-center p-6 bg-white border-2 border-gray-200 rounded-xl hover:border-{{ $color }}-300 hover:shadow-md cursor-pointer transition-all duration-200 relative">
                                            <input type="checkbox"
                                                   name="answers[{{ $number }}]"
                                                   value="1"
                                                   class="w-6 h-6 text-{{ $color }}-600 bg-white border-2 border-gray-300 rounded focus:ring-{{ $color }}-500 focus:ring-2 focus:ring-offset-2"
                                                   onchange="updateProgress(); animateSelection(this)">

                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center space-x-3">
                                                    <span class="text-lg font-semibold text-{{ $color }}-700">BENAR</span>
                                                    <span class="text-gray-600">- Saya mengalami hal ini</span>
                                                </div>
                                                <p class="text-sm text-gray-500 mt-1">Centang jika pernyataan di atas sesuai dengan kondisi Anda</p>
                                            </div>
                                        </label>

                                        <!-- Hidden input untuk ensure form submission -->
                                        <input type="hidden" name="answers[{{ $number }}]" value="0">
                                    </div>
                                @else
                                    <!-- Standard radio format for other assessments -->
                                    @foreach($questions['scale'] as $value => $label)
                                        <label class="answer-option group flex items-center p-4 bg-white border-2 border-gray-200 rounded-xl hover:border-{{ $color }}-300 hover:shadow-md cursor-pointer transition-all duration-200 relative">
                                            <input type="radio"
                                                   name="answers[{{ $number }}]"
                                                   value="{{ $value }}"
                                                   class="w-5 h-5 text-{{ $color }}-600 bg-white border-2 border-gray-300 focus:ring-{{ $color }}-500 focus:ring-2 focus:ring-offset-2"
                                                   onchange="updateProgress(); animateSelection(this)"
                                                   required>

                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center space-x-3">
                                                    <span class="text-xl font-bold text-{{ $color }}-600">{{ $value }}</span>
                                                    <span class="text-gray-700 font-medium">{{ $label }}</span>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Question Status -->
                            <div class="ml-14 mt-4 flex items-center text-sm">
                                <svg class="w-4 h-4 mr-2 question-check opacity-0 text-green-500 transition-opacity duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="question-status text-gray-500">Belum dijawab</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-8">
                    <button type="submit"
                            id="submitButton"
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r
                            @if($assessment->type === 'ptsd_diagnostic')
                                from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700
                            @elseif($assessment->type === 'checklist_masalah')
                                from-green-500 to-green-600 hover:from-green-600 hover:to-green-700
                            @elseif($assessment->type === 'pcl5')
                                from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700
                            @else
                                from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700
                            @endif
                            text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Selesaikan Asesmen
                    </button>
                </div>
            </div>
        </form>

        <!-- Disclaimer -->
        <div class="mt-8 bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-lg" data-aos="fade-up" data-aos-delay="300">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Penting untuk Diketahui</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>{{ $questions['disclaimer'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>

<script>
function updateDcmProgress() {
    // Count checked checkboxes
    const checkedBoxes = document.querySelectorAll('input[type="checkbox"]:checked').length;
    const totalQuestions = {{ $assessment->total_questions }};

    // Update progress
    const progressPercent = Math.min(100, (checkedBoxes / totalQuestions) * 100);
    const progressBar = document.getElementById('progressBar');
    progressBar.style.width = progressPercent + '%';
    document.getElementById('progressText').textContent = checkedBoxes + '/' + totalQuestions;

    // Always enable submit button for DCM since it's optional
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = false;
    submitButton.classList.remove('opacity-50', 'cursor-not-allowed');

    // Add pulse animation if significant progress
    if (progressPercent > 50) {
        progressBar.classList.add('animate-pulse');
        setTimeout(() => progressBar.classList.remove('animate-pulse'), 500);
    }
}

function updateProgress() {
    @if($assessment->type === 'checklist_masalah')
        // For DCM: enable submit button immediately since it's optional checkboxes
        const submitButton = document.getElementById('submitButton');
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-50', 'cursor-not-allowed');

        // Update progress based on categories answered
        const totalCategories = {{ count($questions['questions']) }};
        let categoriesWithAnswers = 0;

        for (let category = 1; category <= totalCategories; category++) {
            const categoryCheckboxes = document.querySelectorAll(`input[name^="responses["]:checked`);
            if (categoryCheckboxes.length > 0) {
                categoriesWithAnswers = Math.min(totalCategories, Math.ceil(categoryCheckboxes.length / 10));
                break;
            }
        }

        const progressPercent = Math.min(100, (categoryCheckboxes.length / {{ $assessment->total_questions }}) * 100);
        const progressBar = document.getElementById('progressBar');
        progressBar.style.width = progressPercent + '%';
        document.getElementById('progressText').textContent = categoryCheckboxes.length + '/{{ $assessment->total_questions }}';

    @else
        const totalQuestions = {{ count($questions['questions']) }};
        let answeredQuestions = 0;

        @if($assessment->type === 'ptsd_diagnostic')
            // For PTSD: count actually answered questions (checked checkboxes)
            answeredQuestions = document.querySelectorAll('input[type="checkbox"]:checked').length;
        @else
            // For other assessments: count radio buttons checked
            answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;
        @endif

        const progressPercent = (answeredQuestions / totalQuestions) * 100;

        // Update progress bar with animation
        const progressBar = document.getElementById('progressBar');
        progressBar.style.width = progressPercent + '%';
        document.getElementById('progressText').textContent = answeredQuestions + '/' + totalQuestions;
    @endif

    // Update progress bar color based on completion
    if (progressPercent === 100) {
        progressBar.classList.add('animate-pulse');
        setTimeout(() => progressBar.classList.remove('animate-pulse'), 1000);
    }

    // Enable/disable submit button with animation
    const submitButton = document.getElementById('submitButton');

    @if($assessment->type === 'ptsd_diagnostic')
        // For PTSD: always enable submit since all questions are optional
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
    @else
        // For other assessments: require all questions to be answered
        if (answeredQuestions === totalQuestions) {
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
            submitButton.classList.add('animate-bounce');
            setTimeout(() => submitButton.classList.remove('animate-bounce'), 1000);
        } else {
            submitButton.disabled = true;
            submitButton.classList.add('opacity-50', 'cursor-not-allowed');
        }
    @endif

    // Update question status indicators
    document.querySelectorAll('.question-block').forEach((block, index) => {
        const questionNumber = index + 1;
        const isAnswered = document.querySelector(`input[name="answers[${questionNumber}]"]:checked`);
        const checkIcon = block.querySelector('.question-check');
        const statusText = block.querySelector('.question-status');

        if (isAnswered) {
            // Mark as completed
            block.classList.add('border-green-300', 'bg-green-50');
            block.classList.remove('border-transparent');
            checkIcon.classList.remove('opacity-0');
            checkIcon.classList.add('opacity-100');
            statusText.textContent = 'Sudah dijawab';
            statusText.classList.add('text-green-600');
            statusText.classList.remove('text-gray-500');
        } else {
            // Mark as incomplete
            block.classList.remove('border-green-300', 'bg-green-50');
            block.classList.add('border-transparent');
            checkIcon.classList.add('opacity-0');
            checkIcon.classList.remove('opacity-100');
            statusText.textContent = 'Belum dijawab';
            statusText.classList.remove('text-green-600');
            statusText.classList.add('text-gray-500');
        }
    });

    // Show completion message
    if (answeredQuestions === totalQuestions) {
        showCompletionMessage();
    }
}

function animateSelection(radio) {
    // Animate the selected option
    const label = radio.closest('.answer-option');
    label.classList.add('scale-105', 'shadow-lg');
    setTimeout(() => {
        label.classList.remove('scale-105');
    }, 200);

    // Remove animation from other options in the same question
    const questionBlock = radio.closest('.question-block');
    const otherOptions = questionBlock.querySelectorAll('.answer-option');
    otherOptions.forEach(option => {
        if (option !== label) {
            option.classList.remove('shadow-lg');
        }
    });
}

function showCompletionMessage() {
    // Create and show completion toast
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    toast.innerHTML = `
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span>Semua pertanyaan telah dijawab!</span>
        </div>
    `;

    document.body.appendChild(toast);

    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
    }, 100);

    // Remove after 3 seconds
    setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }, 3000);
}

// Form validation before submit
document.getElementById('assessmentForm').addEventListener('submit', function(e) {
    const totalQuestions = {{ count($questions['questions']) }};

    @if($assessment->type === 'ptsd_diagnostic')
        // For PTSD: no validation needed, all questions are optional
        const answeredQuestions = totalQuestions;
    @else
        // For other assessments: count radio buttons checked
        const answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;

        if (answeredQuestions < totalQuestions) {
            e.preventDefault();
            alert('Mohon jawab semua pertanyaan sebelum menyelesaikan asesmen.');
            return false;
        }
    @endif

    // Show loading state
    const submitButton = document.getElementById('submitButton');
    submitButton.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...';
    submitButton.disabled = true;
});

// Auto-scroll to next question after answering
document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const currentQuestion = this.closest('.question-block');
        const nextQuestion = currentQuestion.nextElementSibling;

        // Delay scroll to allow for smooth transition
        setTimeout(() => {
            if (nextQuestion && nextQuestion.classList.contains('question-block')) {
                nextQuestion.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }, 300);
    });
});

// Initialize for PTSD assessment
@if($assessment->type === 'ptsd_diagnostic')
document.addEventListener('DOMContentLoaded', function() {
    // Enable submit button immediately for PTSD (questions are optional)
    const submitButton = document.getElementById('submitButton');
    submitButton.disabled = false;
    submitButton.classList.remove('opacity-50', 'cursor-not-allowed');

    // Initialize progress bar (will show 0% until user starts answering)
    updateProgress();

    // Handle checkbox interactions for smooth UX
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            animateSelection(this);

            // Update progress bar
            updateProgress();

            // Auto-scroll to next question
            const currentQuestion = this.closest('.question-block');
            const nextQuestion = currentQuestion.nextElementSibling;

            setTimeout(() => {
                if (nextQuestion && nextQuestion.classList.contains('question-block')) {
                    nextQuestion.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }, 300);
        });
    });
});
@endif

</script>
@endsection
