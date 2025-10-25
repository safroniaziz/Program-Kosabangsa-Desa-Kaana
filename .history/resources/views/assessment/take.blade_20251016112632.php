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
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-10" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Petunjuk Pengisian</h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>{{ $questions['instructions'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assessment Form -->
        <form action="@if($assessment->type === 'checklist_masalah') {{ route('assessment.submit-dcm', $assessment) }} @else {{ route('assessment.submit', $assessment) }} @endif" method="POST" id="assessmentForm" data-aos="fade-up" data-aos-delay="200">
            @csrf

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-10">
                <!-- Progress Bar -->
                <div class="mb-10">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Progress Assessment</h3>
                        <div class="flex items-center space-x-3">
                            <span id="progressText" class="text-sm font-medium text-gray-700 bg-gray-50 px-3 py-1 rounded-full">
                                0/@if($assessment->type === 'checklist_masalah'){{ $assessment->total_questions }}@else{{ count($questions['questions']) }}@endif
                            </span>
                            <div class="w-16 h-16 relative">
                                <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 64 64">
                                    <circle cx="32" cy="32" r="28" fill="none" stroke="#f1f5f9" stroke-width="4"/>
                                    <circle id="progressCircle" cx="32" cy="32" r="28" fill="none"
                                            stroke="@if($assessment->type === 'ptsd_diagnostic')#3b82f6@elseif($assessment->type === 'checklist_masalah')#10b981@elseif($assessment->type === 'pcl5')#8b5cf6@else#6b7280@endif"
                                            stroke-width="4" stroke-linecap="round"
                                            stroke-dasharray="176" stroke-dashoffset="176"
                                            class="transition-all duration-500 ease-out"/>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span id="progressPercent" class="text-xs font-bold text-gray-700">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gradient-to-r from-gray-100 to-gray-50 rounded-full h-2 shadow-inner">
                        <div id="progressBar" class="bg-gradient-to-r
                            @if($assessment->type === 'ptsd_diagnostic')
                                from-blue-400 to-blue-600
                            @elseif($assessment->type === 'checklist_masalah')
                                from-emerald-400 to-emerald-600
                            @elseif($assessment->type === 'pcl5')
                                from-purple-400 to-purple-600
                            @else
                                from-gray-400 to-gray-600
                            @endif
                            h-2 rounded-full transition-all duration-700 ease-out shadow-sm" style="width: 0%"></div>
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
                        <!-- Modern Question Format -->
                        @foreach($questions['questions'] as $number => $question)
                            <div class="question-block mb-8 last:mb-0" data-question="{{ $number }}">
                                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                                    <!-- Question Header -->
                                    <div class="px-8 py-6 bg-gradient-to-r
                                        @php
                                            $color = 'gray';
                                            $bgGradient = 'from-gray-50 to-gray-100';
                                            $textColor = 'text-gray-700';
                                            $numberBg = 'bg-gray-500';
                                            if($assessment->type === 'ptsd_diagnostic') {
                                                $color = 'blue';
                                                $bgGradient = 'from-blue-50 to-indigo-50';
                                                $textColor = 'text-blue-700';
                                                $numberBg = 'bg-blue-500';
                                            }
                                            elseif($assessment->type === 'checklist_masalah') {
                                                $color = 'emerald';
                                                $bgGradient = 'from-emerald-50 to-green-50';
                                                $textColor = 'text-emerald-700';
                                                $numberBg = 'bg-emerald-500';
                                            }
                                            elseif($assessment->type === 'pcl5') {
                                                $color = 'purple';
                                                $bgGradient = 'from-purple-50 to-violet-50';
                                                $textColor = 'text-purple-700';
                                                $numberBg = 'bg-purple-500';
                                            }
                                        @endphp
                                        {{ $bgGradient }} border-b border-gray-100">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0 w-12 h-12 {{ $numberBg }} text-white rounded-xl flex items-center justify-center text-lg font-bold shadow-lg">
                                                {{ $number }}
                                            </div>
                                            <div class="flex-1 pt-2">
                                                <h3 class="text-xl font-semibold {{ $textColor }} leading-relaxed">
                                                    {{ $question }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Answer Options -->
                                    <div class="px-8 py-6">
                                        @if($assessment->type === 'ptsd_diagnostic')
                                            <!-- Modern PTSD Checkbox format -->
                                            <div class="space-y-4">
                                                <div class="flex items-center space-x-3 mb-6">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <p class="text-sm text-gray-600 font-medium">
                                                        Beri tanda centang jika pernyataan ini <span class="font-semibold text-blue-600">BENAR</span> bagi Anda
                                                    </p>
                                                </div>

                                                <label class="answer-option group block relative">
                                                    <input type="checkbox"
                                                           name="answers[{{ $number }}]"
                                                           value="1"
                                                           class="sr-only peer"
                                                           onchange="updateProgress(); animateSelection(this)">

                                                    <div class="w-full p-6 bg-gradient-to-r from-slate-50 to-gray-50 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-300
                                                                peer-checked:from-blue-50 peer-checked:to-indigo-50 peer-checked:border-blue-300 peer-checked:shadow-lg peer-checked:shadow-blue-100/50
                                                                hover:border-blue-200 hover:shadow-md hover:scale-[1.01] transform">
                                                        <div class="flex items-center space-x-4">
                                                            <!-- Custom Checkbox -->
                                                            <div class="relative flex-shrink-0">
                                                                <div class="w-7 h-7 border-2 border-gray-300 rounded-lg bg-white transition-all duration-300 peer-checked:border-blue-500 peer-checked:bg-blue-500 shadow-sm">
                                                                    <svg class="w-5 h-5 text-white absolute top-0 left-0 opacity-0 peer-checked:opacity-100 transition-all duration-300 transform peer-checked:scale-110"
                                                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>

                                                            <!-- Label Content -->
                                                            <div class="flex-1">
                                                                <div class="flex items-center space-x-3">
                                                                    <span class="text-lg font-semibold text-blue-700 peer-checked:text-blue-800">YA, BENAR</span>
                                                                    <span class="text-gray-600 text-sm">saya mengalami hal ini</span>
                                                                </div>
                                                                <p class="text-xs text-gray-500 mt-1">Pilih jika pernyataan di atas sesuai dengan kondisi Anda</p>
                                                            </div>

                                                            <!-- Status Icon -->
                                                            <div class="opacity-0 peer-checked:opacity-100 transition-opacity duration-300">
                                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
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
                @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-12 pt-8 border-t border-gray-100">
                    <button type="submit"
                            id="submitButton"
                            class="group relative inline-flex items-center justify-center px-12 py-4 bg-gradient-to-r
                            @if($assessment->type === 'ptsd_diagnostic')
                                from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:ring-blue-500
                            @elseif($assessment->type === 'checklist_masalah')
                                from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 focus:ring-emerald-500
                            @elseif($assessment->type === 'pcl5')
                                from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 focus:ring-purple-500
                            @else
                                from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 focus:ring-gray-500
                            @endif
                            text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-offset-2
                            transition-all duration-300 transform hover:-translate-y-0.5 hover:scale-[1.02]
                            disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none disabled:shadow-md"
                            disabled>
                        <!-- Loading Spinner (hidden by default) -->
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white hidden group-disabled:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>

                        <!-- Success Icon -->
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-3 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-lg">Selesaikan Assessment</span>
                        </div>

                        <!-- Glow Effect -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r
                            @if($assessment->type === 'ptsd_diagnostic')
                                from-blue-400 to-blue-500
                            @elseif($assessment->type === 'checklist_masalah')
                                from-emerald-400 to-emerald-500
                            @elseif($assessment->type === 'pcl5')
                                from-purple-400 to-purple-500
                            @else
                                from-gray-400 to-gray-500
                            @endif
                            opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur-xl -z-10"></div>
                    </button>

                    <!-- Button Helper Text -->
                    <p class="text-sm text-gray-500 mt-4">
                        @if($assessment->type === 'ptsd_diagnostic')
                            Tombol akan aktif setelah Anda mulai menjawab pertanyaan
                        @else
                            Jawab semua pertanyaan untuk mengaktifkan tombol submit
                        @endif
                    </p>
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
                        <p>{{ $assessment->disclaimer_text }}</p>
                    </div>
                </div>
            </div>
        </div>
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

            // Update circular progress
            updateCircularProgress(progressPercent);
        @endif

        // Update progress bar color based on completion
        if (progressPercent === 100) {
            progressBar.classList.add('animate-pulse');
            setTimeout(() => progressBar.classList.remove('animate-pulse'), 1000);
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

    document.getElementById('assessmentForm').addEventListener('submit', function(e) {
        const totalQuestions = {{ count($questions['questions']) }};

        @if($assessment->type === 'ptsd_diagnostic')
            const answeredQuestions = totalQuestions;
        @else
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

    @if($assessment->type === 'ptsd_diagnostic')
        // Initialize for PTSD assessment - checkbox interactions
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
    @else
        // Auto-scroll to next question after answering (for radio buttons)
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
    @endif

</script>
@endsection
