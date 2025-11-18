@extends('layouts.app')

@section('content')
<!-- Clean White Background -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-6 max-w-5xl">
        <!-- Hero Section - Enhanced -->
        <div class="relative mb-16" data-aos="fade-up">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-20 -left-20 w-32 h-32 bg-gradient-to-br from-cyan-400/20 to-blue-600/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>

            <!-- Main Content -->
            <div class="relative z-10">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/10 to-purple-500/10 backdrop-blur-md rounded-full px-6 py-3 mb-8 border border-blue-200/30">
                    <div class="w-2 h-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-medium text-gray-700">Assessment Kesiapan Mental</span>
                </div>

                <!-- Title with Gradient -->
                <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600">
                        {{ $assessment->name }}
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Evaluasi komprehensif untuk mengukur tingkat
                    <span class="font-semibold text-blue-600">kesiapan mental</span>
                    dalam menghadapi situasi darurat
                </p>

                <!-- Stats Cards -->
                <div class="flex flex-wrap justify-center gap-6 mb-8">
                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg border border-gray-200/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium">Estimasi Waktu</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $assessment->time_limit_minutes }} Menit</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg border border-gray-200/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium">Jumlah Pertanyaan</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $assessment->total_questions }} Soal</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white/80 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-lg border border-gray-200/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-medium">Format</p>
                                <p class="text-2xl font-bold text-gray-900">Checkbox</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Indicator -->
                <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                    <span>Siap untuk memulai assessment</span>
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
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
                        <p class="mb-4">{{ $questions['instructions'] }}</p>
                        <div class="bg-amber-50 rounded-lg p-4 border border-amber-200">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-amber-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <div>
                                    <p class="text-amber-800 font-medium text-sm mb-1">Penting untuk Diingat:</p>
                                    <p class="text-amber-700 text-sm">Beri tanda centang (✓) hanya pada pernyataan yang <strong>tepat menggambarkan kondisi Anda</strong>. Jika pernyataan tidak sesuai dengan kondisi Anda, <strong>jangan dicentang</strong>.</p>
                                </div>
                            </div>
                        </div>
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
                            <span id="progressText" class="text-sm text-gray-600 bg-gray-100 px-3 py-1 rounded-lg">
                                0/@if($assessment->type === 'checklist_masalah'){{ $assessment->total_questions }}@else{{ count($questions['questions']) }}@endif
                            </span>

                            <!-- Animated Circular Progress -->
                            <div class="w-20 h-20 relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 to-blue-500/20 rounded-full blur-lg animate-pulse"></div>
                                <svg class="w-20 h-20 transform -rotate-90 relative z-10" viewBox="0 0 64 64">
                                    <circle cx="32" cy="32" r="28" fill="none" stroke="rgba(156,163,175,0.3)" stroke-width="3"/>
                                    <circle id="progressCircle" cx="32" cy="32" r="28" fill="none"
                                            stroke="url(#progressGradient)"
                                            stroke-width="3" stroke-linecap="round"
                                            stroke-dasharray="176" stroke-dashoffset="176"
                                            class="transition-all duration-700 ease-out drop-shadow-lg"/>
                                    <defs>
                                        <linearGradient id="progressGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                            @if($assessment->type === 'ptsd_diagnostic')
                                                <stop offset="0%" style="stop-color:#22d3ee;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                                            @elseif($assessment->type === 'checklist_masalah')
                                                <stop offset="0%" style="stop-color:#10b981;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                            @elseif($assessment->type === 'pcl5')
                                                <stop offset="0%" style="stop-color:#8b5cf6;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#a855f7;stop-opacity:1" />
                                            @else
                                                <stop offset="0%" style="stop-color:#6b7280;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#374151;stop-opacity:1" />
                                            @endif
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span id="progressPercent" class="text-sm font-bold text-gray-700">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Clean Linear Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="progressBar" class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-700 ease-out" style="width: 0%"></div>
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
                            <div class="question-block mb-8 last:mb-0" data-question="{{ $number }}"
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
                                                           id="checkbox_{{ $number }}"
                                                           name="answers[{{ $number }}]"
                                                           value="1"
                                                           class="sr-only"
                                                           onchange="updateProgress(); animateSelection(this); toggleCheckboxVisual(this)">

                                                    <div class="w-full p-6 bg-gradient-to-r from-slate-50 to-gray-50 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-300
                                                                peer-checked:from-blue-50 peer-checked:to-indigo-50 peer-checked:border-blue-300 peer-checked:shadow-lg peer-checked:shadow-blue-100/50
                                                                hover:border-blue-200 hover:shadow-md hover:scale-[1.01] transform">
                                                        <div class="flex items-center space-x-4">
                                                            <!-- Custom Checkbox -->
                                                            <div class="relative flex-shrink-0">
                                                                <div id="checkbox_visual_{{ $number }}" class="w-7 h-7 border-2 border-gray-300 rounded-lg bg-white transition-all duration-300 shadow-sm relative">
                                                                    <svg id="checkbox_check_{{ $number }}" class="w-5 h-5 text-white absolute top-0.5 left-0.5 opacity-0 transition-all duration-300 transform"
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
                            <div class="px-8 pb-4 mt-6">
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-2 question-check opacity-0 text-green-500 transition-opacity duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="question-status text-gray-500">Belum dijawab</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>

                <!-- Clean Submit Button -->
                <div class="text-center mt-12 pt-8 border-t border-gray-200">
                    <button type="submit"
                            id="submitButton"
                            class="inline-flex items-center justify-center px-8 py-3 bg-blue-600 hover:bg-blue-700
                            text-white font-medium rounded-xl border border-blue-600 hover:border-blue-700
                            transition-all duration-200 shadow-lg hover:shadow-xl
                            disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-blue-600"
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

                    </button>

                    <!-- Button Helper Text -->
                    <p class="text-sm text-gray-400 mt-4">
                        @if($assessment->type === 'ptsd_diagnostic')
                            Tombol akan aktif setelah Anda mulai menjawab pertanyaan
                        @else
                            Jawab semua pertanyaan untuk mengaktifkan tombol submit
                        @endif
                    </p>
                </div>
            </div>
        </form>

        <!-- Enhanced Disclaimer with Glass Effect -->
        <div class="mt-12 bg-amber-500/10 backdrop-blur-xl border border-amber-300/30 p-8 rounded-3xl relative overflow-hidden" data-aos="fade-up" data-aos-delay="300">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-r from-amber-400/5 to-orange-400/5"></div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-amber-300/10 to-transparent rounded-full blur-2xl"></div>

            <div class="relative z-10 flex items-start space-x-6">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-400/50 to-orange-500/50 rounded-2xl blur-lg animate-pulse"></div>
                        <svg class="h-6 w-6 text-white relative z-10" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-orange-600">Penting untuk Diketahui</span>
                        <div class="ml-2 w-2 h-2 bg-amber-500 rounded-full animate-ping"></div>
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p>{{ $assessment->disclaimer_text }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Animation Container (Hidden by default) -->
        <div id="successAnimation" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
            <div class="bg-white backdrop-blur-xl rounded-3xl p-12 text-center border border-gray-200 shadow-2xl">
                <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Assessment Selesai!</h3>
                <p class="text-gray-600 text-lg">Terima kasih atas partisipasi Anda</p>
                <div class="animate-pulse mt-4">
                    <div class="w-8 h-1 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for Enhanced Animations -->
<style>
@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

.animate-shimmer {
    animation: shimmer 2s infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% {
        box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
    }
    50% {
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.8), 0 0 30px rgba(59, 130, 246, 0.6);
    }
}

.animate-glow {
    animation: glow 2s ease-in-out infinite;
}

/* Enhanced hover effects */
.question-block {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.question-block:hover {
    transform: translateY(-2px);
}

/* Progress bar enhanced styling */
#progressBar {
    position: relative;
    overflow: hidden;
}

#progressBar::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: shimmer 2s infinite;
}

/* Floating particles animation */
@keyframes particles {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 1;
    }
    50% {
        transform: translateY(-100px) rotate(180deg);
        opacity: 0.5;
    }
}

.animate-particles {
    animation: particles 8s ease-in-out infinite;
}
</style>

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
            updateCircularProgress(progressPercent, answeredQuestions, totalQuestions);
        @endif

        // Update progress bar color based on completion
        if (progressPercent === 100) {
            progressBar.classList.add('animate-pulse');
            setTimeout(() => progressBar.classList.remove('animate-pulse'), 1000);
        }
    }

    function updateCircularProgress(percent, answeredQuestions = 0, totalQuestions = 0) {
        const circle = document.getElementById('progressCircle');
        const progressPercent = document.getElementById('progressPercent');

        if (circle && progressPercent) {
            // Circle circumference = 2 * π * radius = 2 * π * 28 = 176
            const circumference = 176;
            const offset = circumference - (percent / 100) * circumference;

            circle.style.strokeDashoffset = offset;
            progressPercent.textContent = Math.round(percent) + '%';
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
        if (answeredQuestions === totalQuestions && totalQuestions > 0) {
            showCompletionMessage();
        }
    }

    function toggleCheckboxVisual(checkbox) {
        const questionNumber = checkbox.id.replace('checkbox_', '');
        const visual = document.getElementById('checkbox_visual_' + questionNumber);
        const checkmark = document.getElementById('checkbox_check_' + questionNumber);

        if (checkbox.checked) {
            // Checked state
            visual.classList.remove('border-gray-300', 'bg-white');
            visual.classList.add('border-blue-500', 'bg-blue-500');
            checkmark.classList.remove('opacity-0');
            checkmark.classList.add('opacity-100', 'scale-110');
        } else {
            // Unchecked state
            visual.classList.remove('border-blue-500', 'bg-blue-500');
            visual.classList.add('border-gray-300', 'bg-white');
            checkmark.classList.remove('opacity-100', 'scale-110');
            checkmark.classList.add('opacity-0');
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

// Enhanced UI Interactions and Animations
document.addEventListener('DOMContentLoaded', function() {
    // Add parallax effect to floating elements
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        document.querySelectorAll('.animate-float').forEach(element => {
            element.style.transform = `translateY(${rate}px)`;
        });
    });

    // Questions are now visible by default - no animations needed

    // Enhanced submit button animation
    const submitButton = document.getElementById('submitButton');
    submitButton.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px) scale(1.02)';
    });

    submitButton.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });

    // Add sparkle effect to progress completion
    function addSparkleEffect() {
        const sparkleContainer = document.createElement('div');
        sparkleContainer.className = 'fixed inset-0 pointer-events-none z-40';

        for (let i = 0; i < 20; i++) {
            const sparkle = document.createElement('div');
            sparkle.className = 'absolute w-2 h-2 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full animate-ping';
            sparkle.style.left = Math.random() * 100 + '%';
            sparkle.style.top = Math.random() * 100 + '%';
            sparkle.style.animationDelay = Math.random() * 2 + 's';
            sparkle.style.animationDuration = (Math.random() * 1 + 1) + 's';
            sparkleContainer.appendChild(sparkle);
        }

        document.body.appendChild(sparkleContainer);

        setTimeout(() => {
            sparkleContainer.remove();
        }, 3000);
    }

    // Trigger sparkle effect on 100% completion
    const originalUpdateProgress = window.updateProgress;
    window.updateProgress = function() {
        if (originalUpdateProgress) originalUpdateProgress.call(this);

        const progressPercent = parseInt(document.getElementById('progressPercent').textContent);
        if (progressPercent === 100) {
            addSparkleEffect();
        }
    };
});

// Add dynamic background color shifts
setInterval(() => {
    const hue = Math.floor(Math.random() * 60) + 200; // Blue to purple range
    document.documentElement.style.setProperty('--dynamic-hue', hue);
}, 10000);

</script>
@endsection
