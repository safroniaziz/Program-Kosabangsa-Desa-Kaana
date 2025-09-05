@extends('layouts.app')

@section('title', 'Full-Stack Web Development Course')

@section('styles')
<!-- AOS CSS -->
<!-- LMS Custom CSS -->
<link href="{{ asset('css/lms.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Hero Section - Cleaner Visual Design -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Subtle gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/10 via-purple-600/10 to-indigo-600/10"></div>
    </div>

    <!-- Reduced floating elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-element absolute top-20 right-20 w-24 h-24 bg-gradient-to-br from-blue-400/30 to-purple-600/30 rounded-full blur-2xl animate-float" data-aos="zoom-in" data-aos-delay="1000"></div>
        <div class="floating-element absolute bottom-32 left-1/4 w-32 h-32 bg-gradient-to-br from-indigo-400/20 to-blue-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -3s;" data-aos="zoom-in" data-aos-delay="1200"></div>
    </div>

    <!-- Subtle overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="container mx-auto px-4 relative z-10 min-h-screen flex items-center max-w-7xl">

        <div class="mx-auto w-full">
            <!-- Main content grid -->
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left content -->
                <div class="space-y-8">
                    <!-- Course badge with subtle glow -->
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full text-white border border-white/20">
                            <div class="w-3 h-3 bg-gradient-to-r from-green-400 to-blue-500 rounded-full"></div>
                            <span class="text-sm font-semibold">Kursus Terlengkap • 120+ Jam Pembelajaran</span>
                        </div>
                    </div>

                    <!-- Main heading with clean gradient -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <h1 class="text-5xl lg:text-6xl font-black text-white mb-6 leading-tight">
                            Full-Stack
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">
                                Web Development
                            </span>
                        </h1>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="300">
                        <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                            Kuasai pengembangan web modern dari <span class="text-blue-400 font-semibold">frontend</span> hingga
                            <span class="text-indigo-400 font-semibold">backend</span>. Belajar dengan pendekatan praktis
                            menggunakan teknologi terkini.
                        </p>
                    </div>

                    <!-- Course stats with cleaner design -->
                    <div data-aos="fade-up" data-aos-delay="400">
                        <div class="grid grid-cols-3 gap-8 mb-8">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-400 mb-2">24</div>
                                <div class="text-sm text-gray-300">Modul Pembelajaran</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-indigo-400 mb-2">180+</div>
                                <div class="text-sm text-gray-300">Materi Lengkap</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-purple-400 mb-2">15</div>
                                <div class="text-sm text-gray-300">Proyek Praktis</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA buttons with stunning effects -->
                    <div data-aos="fade-up" data-aos-delay="500">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button onclick="scrollToModules()" class="group relative btn-primary text-white px-8 py-4 rounded-xl font-bold text-lg overflow-hidden animate-electric-glow">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform animate-electric-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    Mulai Perjalanan Belajar
                                </span>
                            </button>
                            <button class="group glass border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/10 transition-all animate-bulb-glow">
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform animate-bulb-flicker" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                    Preview Kursus
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right content - Enhanced course preview -->
                <div data-aos="fade-left" data-aos-delay="600">
                    <div class="relative">
                        <!-- Main preview card with glass effect -->
                        <div class="glass border border-white/20 rounded-3xl overflow-hidden backdrop-blur-xl shadow-2xl animate-float">
                            <!-- Course header with gradient -->
                            <div class="bg-gradient-to-r from-indigo-600/80 to-purple-600/80 p-6 border-b border-white/10" data-aos="fade-down" data-aos-delay="650">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-lg">Full-Stack Web Development</h3>
                                        <p class="text-indigo-100 mt-1">Dari Pemula hingga Expert</p>
                                    </div>
                                    <div class="flex items-center gap-2" data-aos="zoom-in" data-aos-delay="750">
                                        <div class="flex text-yellow-400">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm font-bold text-white ml-2">4.9</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress section -->
                            <div class="p-6 bg-white/5" data-aos="fade-up" data-aos-delay="700">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm font-medium text-white">Progress Keseluruhan</span>
                                    <span class="text-sm font-bold text-white">0%</span>
                                </div>
                                <div class="w-full bg-white/10 rounded-full h-3 progress-bar">
                                    <div class="bg-gradient-to-r from-cyan-400 to-purple-500 h-3 rounded-full" style="width: 0%"></div>
                                </div>

                                <!-- Module preview with hover effects -->
                                <div class="space-y-3 mt-6">
                                    <div class="interactive-card flex items-center gap-3 p-3 glass rounded-lg border border-white/10" data-aos="slide-right" data-aos-delay="800">
                                        <div class="w-10 h-10 gradient-bg-1 rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold">1</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">HTML & CSS Fundamentals</div>
                                            <div class="text-xs text-gray-300">8 materi • 12 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-cyan-400 rounded-full bg-cyan-400/20"></div>
                                    </div>

                                    <div class="interactive-card flex items-center gap-3 p-3 glass rounded-lg border border-white/10 opacity-70" data-aos="slide-right" data-aos-delay="900">
                                        <div class="w-10 h-10 gradient-bg-2 rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold">2</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">JavaScript Essentials</div>
                                            <div class="text-xs text-gray-300">12 materi • 18 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-white/30 rounded-full"></div>
                                    </div>

                                    <div class="interactive-card flex items-center gap-3 p-3 glass rounded-lg border border-white/10 opacity-50" data-aos="slide-right" data-aos-delay="1000">
                                        <div class="w-10 h-10 gradient-bg-3 rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold">3</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">React Development</div>
                                            <div class="text-xs text-gray-300">15 materi • 25 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-white/20 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating decorative elements -->
                        <div class="absolute -top-6 -right-6 w-20 h-20 gradient-bg-4 rounded-2xl shadow-xl flex items-center justify-center animate-electric-glow animate-pulse">
                            <svg class="w-10 h-10 text-white animate-electric-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>

                        <div class="absolute -bottom-4 -left-4 w-16 h-16 gradient-bg-5 rounded-xl shadow-lg flex items-center justify-center animate-bulb-glow" style="animation-delay: -2s;">
                            <svg class="w-8 h-8 text-white animate-bulb-flicker" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-fadeInUp" style="animation-delay: 1s;">
        <div class="flex flex-col items-center text-white/70">
            <span class="text-sm mb-2">Scroll untuk melanjutkan</span>
            <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

<!-- Course Overview Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-100/40 to-purple-200/40 rounded-full blur-2xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-gradient-to-br from-pink-100/40 to-orange-200/40 rounded-full blur-2xl animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute top-1/2 left-1/3 w-48 h-48 bg-gradient-to-br from-green-100/40 to-cyan-200/40 rounded-full blur-2xl animate-float" style="animation-delay: -4s;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10 max-w-7xl">
        <div class="mx-auto text-center mb-16">
            <div data-aos="fade-up">
                <div class="inline-block mb-4">
                    <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 tracking-wider uppercase animate-shimmer">Pembelajaran Komprehensif</span>
                </div>
                <h2 data-aos="fade-right" data-aos-delay="100" class="text-4xl lg:text-5xl font-black text-slate-900 mb-6">
                    Apa yang Akan Anda
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Pelajari?</span>
                </h2>
                <p data-aos="fade-left" data-aos-delay="200" class="text-xl text-slate-600 leading-relaxed">
                    Kursus komprehensif yang dirancang untuk membawa Anda dari pemula hingga menjadi
                    <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">full-stack developer</span> yang handal
                </p>
            </div>
        </div>

        <!-- Learning outcomes grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
            $outcomes = [
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>',
                    'title' => 'Frontend Development',
                    'description' => 'HTML5, CSS3, JavaScript ES6+, React.js, dan responsive design'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>',
                    'title' => 'Backend Development',
                    'description' => 'Node.js, Express.js, RESTful API, dan microservices architecture'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>',
                    'title' => 'Database Management',
                    'description' => 'MongoDB, MySQL, data modeling, dan database optimization'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                    'title' => 'Security & Authentication',
                    'description' => 'JWT, OAuth, HTTPS, dan best practices keamanan web'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/></svg>',
                    'title' => 'Deployment & DevOps',
                    'description' => 'Git, Docker, CI/CD, dan deployment ke cloud platform'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>',
                    'title' => 'Project Management',
                    'description' => 'Agile methodology, project planning, dan collaboration tools'
                ]
            ];
            @endphp

            @foreach($outcomes as $index => $outcome)
            <div class="group" data-aos="zoom-in" data-aos-delay="{{ ($index * 100) + 300 }}">
                <div class="bg-white border border-slate-200 rounded-xl p-6 h-full transition-all duration-500 hover:border-blue-300 hover:shadow-2xl hover:bg-gradient-to-br hover:from-white hover:to-blue-50 interactive-card transform hover:-translate-y-2 hover:scale-105 relative overflow-hidden">
                    <!-- Hover effect overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>

                    <div class="relative z-10">
                        <div class="text-blue-600 mb-4 group-hover:text-blue-700 transition-all duration-300 transform group-hover:scale-110 group-hover:rotate-3">
                            {!! $outcome['icon'] !!}
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 transition-all duration-300">{{ $outcome['title'] }}</h3>
                        <p class="text-slate-600 leading-relaxed group-hover:text-slate-700 transition-colors duration-300">{{ $outcome['description'] }}</p>
                    </div>

                    <!-- Shimmer effect on hover -->
                    <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Call to action dengan animasi -->
        <div class="max-w-7xl mx-auto text-center mt-16" data-aos="fade-up" data-aos-delay="800">
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 border border-blue-200/50 rounded-2xl p-8 relative overflow-hidden">
                <!-- Background decorative gradient -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5"></div>

                <div class="relative z-10">
                    <div class="text-2xl font-bold text-slate-900 mb-4" data-aos="fade-up" data-aos-delay="900">
                        Siap memulai perjalanan Anda menjadi
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Full-Stack Developer?</span>
                    </div>
                    <p class="text-slate-600 mb-6" data-aos="fade-up" data-aos-delay="1000">
                        Dengan kurikulum terstruktur dan mentor berpengalaman, Anda akan dikurun adalah menjadi developer handal dalam waktu singkat.
                    </p>
                    <div class="inline-flex items-center gap-2 text-sm font-semibold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600" data-aos="bounce-in" data-aos-delay="1100">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Mulai pembelajaran dari modul pertama di bawah
                    </div>
                </div>

                <!-- Floating particles -->
                <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full animate-bounce"></div>
                <div class="absolute bottom-4 left-4 w-3 h-3 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
                <div class="absolute top-1/2 right-8 w-1 h-1 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<!-- Modules Section - Spectacular Design -->
<section id="modules" class="py-20 relative overflow-hidden">
    <!-- Dynamic background with gradients -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50">
        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/50 to-transparent"></div>
    </div>

    <!-- Floating background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200/30 to-purple-300/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-pink-200/30 to-orange-300/30 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-green-200/30 to-cyan-300/30 rounded-full blur-3xl animate-float" style="animation-delay: -6s;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10 max-w-7xl">
        <!-- Section header with animations -->
        <div class="mx-auto text-center mb-20">
            <div data-aos="fade-up">
                <div class="inline-block mb-6">
                    <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 tracking-wider uppercase">Kurikulum Terbaik</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-black mb-8" data-aos="zoom-in" data-aos-delay="200">
                    <span class="text-slate-900">Kurikulum</span>
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-blue-600 to-cyan-500 shimmer">
                        Pembelajaran
                    </span>
                </h2>
                <p class="text-xl lg:text-2xl text-slate-600 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="400">
                    <span class="text-gradient font-bold">24 modul</span> terstruktur dengan
                    <span class="text-gradient-2 font-bold">180+ materi</span> pembelajaran yang akan membawa Anda
                    menjadi <span class="text-gradient-3 font-bold">full-stack developer</span> handal
                </p>
            </div>
        </div>

        <!-- Progress overview dengan glass effect -->
        <div class="max-w-7xl mx-auto mb-20" data-aos="flip-up" data-aos-delay="600">
            <div class="glass border border-white/20 rounded-2xl p-8 text-center shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-lg font-bold text-slate-800">Progress Keseluruhan</span>
                    <span class="text-lg font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600">0 dari 24 modul</span>
                </div>
                <div class="relative w-full bg-slate-200 rounded-full h-4 mb-6 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-blue-500 to-cyan-500 h-4 rounded-full progress-bar transition-all duration-1000" style="width: 0%"></div>
                </div>
                <div class="flex items-center justify-center gap-8 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-slate-600">Selesai: <strong class="text-slate-900">0</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span class="text-slate-600">Aktif: <strong class="text-slate-900">1</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-slate-300 rounded-full"></div>
                        <span class="text-slate-600">Terkunci: <strong class="text-slate-900">23</strong></span>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-slate-600 italic">
                        ✨ Mulai perjalanan belajar Anda menuju menjadi Full-Stack Developer profesional!
                    </p>
                </div>
            </div>
        </div>

        <!-- Modules grid dengan stunning cards -->
        <div class="max-w-7xl mx-auto">
            @php
            $modules = [
                [
                    'number' => 1,
                    'title' => 'HTML & CSS Fundamentals',
                    'description' => 'Pelajari dasar-dasar HTML5 dan CSS3, semantic elements, flexbox, grid, dan responsive design untuk membangun foundation yang kuat.',
                    'duration' => '12 jam',
                    'materials' => 8,
                    'status' => 'available',
                    'progress' => 0,
                    'gradient' => 'from-blue-500 to-purple-600',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>',
                    'materials_preview' => ['Pengenalan HTML5', 'Semantic Elements', 'CSS Selectors & Properties', 'Flexbox Layout'],
                    'materials_list' => [
                        [
                            'type' => 'text',
                            'title' => 'Pengenalan HTML5',
                            'duration' => '30 min',
                            'content' => 'HTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur dan konten halaman web...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU',
                            'optional_file' => 'html-guide.pdf'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'Semantic Elements',
                            'duration' => '45 min',
                            'content' => 'Semantic elements memberikan makna yang jelas pada struktur dokumen HTML...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'CSS Selectors & Properties',
                            'duration' => '60 min',
                            'content' => 'CSS (Cascading Style Sheets) digunakan untuk mengatur tampilan dan layout halaman web...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU',
                            'optional_file' => 'css-cheatsheet.pdf'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'Flexbox Layout',
                            'duration' => '90 min',
                            'content' => 'Flexbox adalah sistem layout CSS yang memungkinkan pengaturan elemen secara fleksibel...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'CSS Grid System',
                            'duration' => '75 min',
                            'content' => 'CSS Grid adalah sistem layout dua dimensi yang powerful untuk mengatur layout website...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'Responsive Design',
                            'duration' => '120 min',
                            'content' => 'Responsive design memastikan website tampil optimal di berbagai ukuran layar...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU',
                            'optional_file' => 'responsive-examples.zip'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'CSS Animations',
                            'duration' => '60 min',
                            'content' => 'CSS animations memungkinkan pembuatan efek visual yang menarik tanpa JavaScript...',
                            'optional_video' => 'https://www.youtube.com/embed/qz0aGYrrlhU'
                        ],
                        [
                            'type' => 'text',
                            'title' => 'Project: Landing Page',
                            'duration' => '180 min',
                            'content' => 'Dalam project ini, Anda akan membuat landing page yang responsive menggunakan HTML dan CSS...',
                            'optional_file' => 'project-assets.zip'
                        ]
                    ]
                ],
                [
                    'number' => 2,
                    'title' => 'JavaScript Essentials',
                    'description' => 'Kuasai JavaScript dari dasar hingga advanced: ES6+, DOM manipulation, asynchronous programming, dan modern JavaScript features.',
                    'duration' => '18 jam',
                    'materials' => 12,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'from-yellow-500 to-orange-600',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
                    'materials_preview' => ['JavaScript Fundamentals', 'Variables & Data Types', 'Functions & Scope', 'DOM Manipulation'],
                    'materials_list' => []
                ],
                [
                    'number' => 3,
                    'title' => 'Git & Version Control',
                    'description' => 'Pelajari Git untuk version control, collaboration, dan workflow development yang profesional dalam tim developer.',
                    'duration' => '8 jam',
                    'materials' => 6,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'from-green-500 to-emerald-600',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/></svg>',
                    'materials_preview' => ['Git Fundamentals', 'Repository Management', 'Branching & Merging', 'GitHub Collaboration'],
                    'materials_list' => []
                ],
                [
                    'number' => 4,
                    'title' => 'React.js Development',
                    'description' => 'Bangun aplikasi web modern dengan React: components, hooks, state management, dan ecosystem React terbaru.',
                    'duration' => '25 jam',
                    'materials' => 15,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'from-cyan-500 to-blue-600',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
                    'materials_preview' => ['React Introduction', 'JSX & Components', 'Props & State', 'React Hooks'],
                    'materials_list' => []
                ],
                [
                    'number' => 5,
                    'title' => 'Node.js & Express',
                    'description' => 'Backend development dengan Node.js dan Express: server, routing, middleware, RESTful API, dan arsitektur backend modern.',
                    'duration' => '20 jam',
                    'materials' => 12,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'from-purple-500 to-pink-600',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>',
                    'materials_preview' => ['Node.js Introduction', 'Express.js Setup', 'RESTful API Design', 'Middleware & Authentication'],
                    'materials_list' => []
                ],
                [
                    'number' => 6,
                    'title' => 'Database & MongoDB',
                    'description' => 'Database design dan implementasi dengan MongoDB: CRUD operations, aggregation, indexing, dan optimasi database.',
                    'duration' => '15 jam',
                    'materials' => 10,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'from-indigo-500 to-purple-600',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>',
                    'materials_preview' => ['Database Fundamentals', 'MongoDB Introduction', 'CRUD Operations', 'Mongoose ODM'],
                    'materials_list' => []
                ]
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($modules as $index => $module)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group module-card"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index * 100) + 100 }}"
                     data-aos-anchor-placement="top-bottom">
                    <!-- Card header dengan gradient background yang lebih readable -->
                    <div class="relative bg-gradient-to-br {{ $module['gradient'] }} p-4 text-white overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-3">
                                <!-- Module number -->
                                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                                    <span class="text-lg font-bold text-white">{{ $module['number'] }}</span>
                                </div>

                                <!-- Module status -->
                                @if($module['status'] === 'available')
                                <div class="flex items-center gap-1 bg-green-500/20 backdrop-blur-sm px-2 py-1 rounded-full border border-green-400/30">
                                    <div class="w-1.5 h-1.5 bg-green-400 rounded-full"></div>
                                    <span class="text-xs font-semibold text-green-100">Tersedia</span>
                                </div>
                                @else
                                <div class="flex items-center gap-1 bg-white/10 backdrop-blur-sm px-2 py-1 rounded-full border border-white/20">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span class="text-xs font-semibold text-white/90">Terkunci</span>
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <div class="text-white/90 mb-2">{!! $module['icon'] !!}</div>
                                <h3 class="text-lg font-bold mb-2 text-white leading-tight">
                                    {{ $module['title'] }}
                                </h3>
                                <p class="text-white/95 leading-relaxed text-sm line-clamp-2">{{ $module['description'] }}</p>
                            </div>

                            <div class="flex items-center gap-3 text-xs text-white/90">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="font-medium">{{ $module['duration'] }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span class="font-medium">{{ $module['materials'] }} materi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card content dengan background putih solid -->
                    <div class="p-4 bg-white">
                        <!-- Materials preview -->
                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-900 mb-2 flex items-center gap-2 text-sm">
                                <span>Preview Materi</span>
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </h4>
                            <div class="space-y-1">
                                @foreach(array_slice($module['materials_preview'], 0, 2) as $preview)
                                <div class="flex items-center gap-2 p-2 rounded-lg bg-gray-50 border border-gray-100 hover:bg-gray-100 transition-colors">
                                    <div class="w-1.5 h-1.5 bg-blue-500 rounded-full flex-shrink-0"></div>
                                    <span class="text-xs font-medium text-gray-800 line-clamp-1">{{ $preview }}</span>
                                </div>
                                @endforeach
                                <div class="text-xs text-gray-500 px-2">
                                    +{{ count($module['materials_preview']) - 2 }} materi lainnya
                                </div>
                            </div>
                        </div>

                        <!-- Action section -->
                        <div class="space-y-3">
                            @if($module['status'] === 'available')
                            <button onclick="openModule({{ $module['number'] }}, @json($module))" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl font-semibold text-sm hover:shadow-lg transition-all group relative overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <span>{{ $module['progress'] > 0 ? 'Lanjutkan' : 'Mulai Belajar' }}</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                            </button>
                            @else
                            <div class="w-full flex items-center justify-center gap-2 p-2.5 bg-gray-100 rounded-xl text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span class="font-medium text-sm">Selesaikan modul sebelumnya</span>
                            </div>
                            @endif

                            <!-- Progress bar -->
                            @if($module['progress'] > 0)
                            <div class="pt-2">
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Progress</span>
                                    <span class="font-bold">{{ $module['progress'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: {{ $module['progress'] }}%"></div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Call to action -->
        <div class="text-center mt-20" data-aos="fade-up" data-aos-delay="600">
            <div class="glass border border-white/20 rounded-2xl p-8 max-w-2xl mx-auto hover:shadow-2xl transition-all duration-300 group">
                <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-blue-700 transition-colors duration-300" data-aos="fade-up" data-aos-delay="700">
                    Siap Memulai Perjalanan Anda?
                </h3>
                <p class="text-slate-600 mb-6" data-aos="fade-up" data-aos-delay="800">
                    Bergabunglah dengan ribuan developer yang telah memulai karir mereka dengan kursus ini.
                </p>
                <button class="btn-primary text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all group-hover:scale-105 animate-electric-glow" data-aos="zoom-in" data-aos-delay="900">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 animate-electric-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Mulai Sekarang - Gratis!
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Learning Path Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-400/20 to-purple-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-indigo-400/15 to-cyan-500/15 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-gradient-to-br from-purple-400/10 to-pink-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10 max-w-7xl">
        <div class="mx-auto text-center mb-20" data-aos="fade-up" data-aos-duration="600">
            <div class="inline-block mb-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="flex items-center gap-3 bg-white/80 backdrop-blur-sm border border-blue-200/50 rounded-full px-6 py-3 shadow-lg">
                    <div class="w-2 h-2 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full animate-pulse"></div>
                    <span class="text-sm font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent tracking-wider uppercase">Roadmap Pembelajaran</span>
                    <div class="w-2 h-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                </div>
            </div>
            <h2 class="text-5xl lg:text-6xl font-black text-slate-900 mb-8 leading-tight" data-aos="fade-up" data-aos-delay="150">
                Path Pembelajaran
                <span class="block bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Terstruktur
                </span>
            </h2>
            <p class="text-xl lg:text-2xl text-slate-600 leading-relaxed max-w-7xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Ikuti jalur pembelajaran yang telah dirancang khusus untuk mengoptimalkan proses belajar Anda
                <span class="block mt-2 text-lg text-blue-600 font-semibold">dari pemula hingga expert developer</span>
            </p>
        </div>

        <!-- Learning timeline -->
        <div class="max-w-7xl mx-auto">
            <div class="relative roadmap-timeline">
                <!-- Modern vertical line with glow effect -->
                <div class="absolute left-1/2 transform -translate-x-px h-full w-1 bg-gradient-to-b from-blue-400 via-indigo-500 to-purple-600 rounded-full shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-400 via-indigo-500 to-purple-600 rounded-full blur-sm opacity-50"></div>
                </div>

                @php
                $learningPath = [
                    [
                        'phase' => 'Foundation',
                        'title' => 'Dasar-dasar Web Development',
                        'duration' => '4-6 minggu',
                        'modules' => ['HTML & CSS Fundamentals', 'JavaScript Essentials', 'Git & Version Control'],
                        'description' => 'Membangun fondasi yang kuat dengan mempelajari teknologi dasar web development yang solid dan modern.',
                        'position' => 'left',
                        'color' => 'from-blue-500 to-indigo-600',
                        'bgColor' => 'from-blue-50 to-indigo-50',
                        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'progress' => 85
                    ],
                    [
                        'phase' => 'Frontend',
                        'title' => 'Pengembangan Frontend Modern',
                        'duration' => '6-8 minggu',
                        'modules' => ['React.js Development', 'Advanced CSS', 'Frontend Tools'],
                        'description' => 'Kuasai pengembangan antarmuka pengguna yang interaktif, responsif, dan mengikuti best practices terkini.',
                        'position' => 'right',
                        'color' => 'from-emerald-500 to-teal-600',
                        'bgColor' => 'from-emerald-50 to-teal-50',
                        'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                        'progress' => 60
                    ],
                    [
                        'phase' => 'Backend',
                        'title' => 'Server-side Development',
                        'duration' => '6-8 minggu',
                        'modules' => ['Node.js & Express', 'Database & MongoDB', 'API Development'],
                        'description' => 'Pelajari pengembangan backend yang robust untuk membangun aplikasi yang scalable dan secure.',
                        'position' => 'left',
                        'color' => 'from-orange-500 to-red-600',
                        'bgColor' => 'from-orange-50 to-red-50',
                        'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                        'progress' => 35
                    ],
                    [
                        'phase' => 'Integration',
                        'title' => 'Full-Stack Integration',
                        'duration' => '4-6 minggu',
                        'modules' => ['Authentication & Security', 'Deployment & DevOps', 'Final Projects'],
                        'description' => 'Integrasikan semua komponen menjadi aplikasi full-stack yang production-ready dan professional.',
                        'position' => 'right',
                        'color' => 'from-purple-500 to-pink-600',
                        'bgColor' => 'from-purple-50 to-pink-50',
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        'progress' => 0
                    ]
                ];
                @endphp

                @foreach($learningPath as $index => $path)
                <div class="relative flex items-center mb-14 last:mb-0" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <!-- Enhanced Timeline dot with number and glow -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 z-20 timeline-dot">
                        <div class="relative">
                            <!-- Outer glow ring -->
                            <div class="w-16 h-16 bg-gradient-to-br {{ $path['color'] }} rounded-full absolute inset-0 blur-lg opacity-30 animate-pulse float-animation"></div>
                            <!-- Main circle -->
                            <div class="w-12 h-12 bg-gradient-to-br {{ $path['color'] }} rounded-full border-4 border-white shadow-2xl flex items-center justify-center relative transform hover:scale-110 transition-all duration-500 glow-blue">
                                <span class="text-white font-black text-lg">{{ $index + 1 }}</span>
                                <!-- Inner highlight -->
                                <div class="absolute inset-2 bg-white/20 rounded-full"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Content card -->
                    <div class="w-full {{ $path['position'] === 'left' ? 'pr-1 md:pr-2' : 'pl-1 md:pl-2' }} {{ $path['position'] === 'right' ? 'md:ml-auto' : '' }}">
                        <div class="roadmap-card bg-gradient-to-br {{ $path['bgColor'] }} backdrop-blur-sm border border-white/50 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 {{ $path['position'] === 'left' ? 'md:text-right' : '' }} max-w-sm {{ $path['position'] === 'right' ? 'md:ml-auto' : '' }} group hover:border-white/80 relative overflow-hidden">

                            <!-- Background decoration -->
                            <div class="absolute top-0 {{ $path['position'] === 'left' ? 'left-0' : 'right-0' }} w-24 h-24 bg-gradient-to-br {{ $path['color'] }} opacity-10 rounded-full blur-3xl transform {{ $path['position'] === 'left' ? '-translate-x-6' : 'translate-x-6' }} -translate-y-6 float-animation-reverse"></div>

                            <div class="relative z-10">
                                <!-- Enhanced Phase badge with icon -->
                                <div class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-sm text-slate-700 px-4 py-2 rounded-full text-xs font-bold mb-4 shadow-lg border border-white/50 group-hover:scale-105 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path['icon'] }}"/>
                                    </svg>
                                    <span class="bg-gradient-to-r {{ $path['color'] }} bg-clip-text text-transparent">{{ $path['phase'] }}</span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-slate-600">{{ $path['duration'] }}</span>
                                </div>

                                <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:bg-gradient-to-r group-hover:{{ $path['color'] }} group-hover:bg-clip-text group-hover:text-transparent transition-all duration-300 leading-tight">
                                    {{ $path['title'] }}
                                </h3>
                                <p class="text-sm text-slate-600 mb-4 leading-relaxed">{{ $path['description'] }}</p>

                                <!-- Progress bar -->
                                <div class="mb-4">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-xs font-semibold text-slate-700">Progress</span>
                                        <span class="text-xs font-bold bg-gradient-to-r {{ $path['color'] }} bg-clip-text text-transparent">{{ $path['progress'] }}%</span>
                                    </div>
                                    <div class="w-full bg-white/60 rounded-full h-2 overflow-hidden shadow-inner progress-bar">
                                        <div class="bg-gradient-to-r {{ $path['color'] }} h-2 rounded-full transition-all duration-1000 shadow-lg" style="width: {{ $path['progress'] }}%"></div>
                                    </div>
                                </div>

                                <!-- Enhanced Modules list -->
                                <div class="space-y-2">
                                    <h4 class="text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Modul</h4>
                                    @foreach($path['modules'] as $moduleIndex => $module)
                                    <div class="flex items-center gap-2 text-xs {{ $path['position'] === 'left' ? 'md:justify-end' : '' }} module-item transition-transform duration-300" style="animation-delay: {{ $moduleIndex * 100 }}ms;">
                                        <div class="w-2 h-2 bg-gradient-to-r {{ $path['color'] }} rounded-full shadow-lg"></div>
                                        <span class="text-slate-700 font-medium group-hover:bg-gradient-to-r group-hover:{{ $path['color'] }} group-hover:bg-clip-text group-hover:text-transparent transition-all duration-300">{{ $module }}</span>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- CTA Button -->
                                <div class="mt-6 {{ $path['position'] === 'left' ? 'md:text-right' : '' }}">
                                    <button class="btn-roadmap inline-flex items-center gap-2 bg-gradient-to-r {{ $path['color'] }} text-white px-4 py-2 rounded-full font-bold text-xs shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                                        @if($path['progress'] > 0)
                                            <span>Lanjutkan Belajar</span>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8m-2-9a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        @else
                                            <span>Mulai Belajar</span>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                            </svg>
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Learning Modal - Ultra Modern Design -->
<div id="learningModal" class="fixed inset-0 bg-black/70 backdrop-blur-xl z-50 hidden opacity-0 transition-all duration-500">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="modal-content bg-white/95 backdrop-blur-sm rounded-3xl max-w-6xl w-full max-h-[90vh] overflow-hidden shadow-2xl border border-white/20 transform scale-95 transition-all duration-500">
            <!-- Modal header with glass effect -->
            <div class="relative gradient-bg-1 text-white p-8 overflow-hidden">
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 30px 30px;"></div>
                </div>

                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <h2 id="modalTitle" class="text-3xl font-black mb-2">HTML & CSS Fundamentals</h2>
                        <div class="flex items-center gap-6 text-white/90">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-medium">12 jam pembelajaran</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="font-medium">8 materi</span>
                            </div>
                        </div>
                    </div>
                    <button onclick="closeModal()" class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30 hover:bg-white/30 transition-all group">
                        <svg class="w-6 h-6 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Progress bar dengan gradient -->
                <div class="mt-6">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="font-medium">Progress Modul</span>
                        <span id="currentProgress" class="font-bold">0 dari 8 materi</span>
                    </div>
                    <div class="w-full bg-white/20 rounded-full h-3 overflow-hidden">
                        <div id="modalProgressBar" class="bg-gradient-to-r from-white via-white/80 to-white/60 h-3 rounded-full transition-all duration-1000 shadow-lg" style="width: 0%"></div>
                    </div>
                </div>
            </div>

            <!-- Modal content with improved design -->
            <div class="flex h-[calc(90vh-180px)]">
                <!-- Materials sidebar dengan glass effect -->
                <div class="w-80 bg-slate-50/80 backdrop-blur-sm border-r border-slate-200/50 overflow-y-auto">
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                </svg>
                            </div>
                            <span>Daftar Materi</span>
                        </h3>

                        <div id="materialsList" class="space-y-3">
                            <!-- Materials akan diisi oleh JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Content area dengan design modern -->
                <div class="flex-1 flex flex-col">
                    <!-- Content Display Area -->
                    <div class="flex-1 bg-white/70 backdrop-blur-sm relative overflow-y-auto">
                        <div id="contentArea" class="w-full h-full">
                            <!-- Default state dengan design yang lebih menarik -->
                            <div class="flex items-center justify-center h-full">
                                <div class="text-center max-w-md mx-auto p-8">
                                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Mulai Pembelajaran Anda</h3>
                                    <p class="text-slate-600 leading-relaxed">
                                        Pilih salah satu materi di sidebar untuk memulai perjalanan belajar yang menakjubkan!
                                    </p>
                                    <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-200/50">
                                        <p class="text-sm text-slate-700">
                                            💡 <strong>Tips:</strong> Selesaikan materi secara berurutan untuk hasil pembelajaran yang optimal
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Template untuk text content -->
                    <template id="textContentTemplate">
                        <div class="w-full h-full bg-white/70 backdrop-blur-sm overflow-y-auto">
                            <div class="max-w-7xl mx-auto p-8">
                                <!-- Material Header -->
                                <div class="mb-8">
                                    <div class="flex items-center gap-4 mb-6">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                            <span class="material-number text-white font-bold text-lg"></span>
                                        </div>
                                        <div>
                                            <h1 class="material-title text-3xl font-black text-slate-900 mb-2"></h1>
                                            <div class="flex items-center gap-4 text-slate-600">
                                                <span class="flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span class="material-duration"></span>
                                                </span>
                                                <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                                                    📖 Teks
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Progress indicator -->
                                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 border border-blue-200/50 rounded-xl p-4 mb-8">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-sm font-medium text-slate-700">Progress Materi</span>
                                            <span class="material-progress text-sm font-bold text-blue-600"></span>
                                        </div>
                                        <div class="w-full bg-white/80 rounded-full h-2">
                                            <div class="material-progress-bar bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full transition-all duration-500"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content Body -->
                                <div class="prose prose-lg max-w-none">
                                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border-l-4 border-blue-500 p-6 rounded-r-xl mb-8">
                                        <h4 class="text-xl font-bold text-blue-900 mb-3 flex items-center gap-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Tentang Materi Ini
                                        </h4>
                                        <p class="material-description text-blue-800 leading-relaxed"></p>
                                    </div>

                                    <div class="material-content text-slate-700 leading-relaxed text-lg mb-8 space-y-6"></div>

                                    <!-- Additional resources section -->
                                    <div class="border-t pt-8 mt-8">
                                        <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                            Sumber Belajar Tambahan
                                        </h3>
                                        <div class="additional-resources grid grid-cols-1 md:grid-cols-2 gap-6"></div>

                                        <!-- Tips section -->
                                        <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-6">
                                            <h5 class="font-bold text-green-900 mb-3 flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                                </svg>
                                                💡 Tips Belajar
                                            </h5>
                                            <p class="learning-tips text-green-800 leading-relaxed"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Template untuk video resource -->
                    <template id="videoResourceTemplate">
                        <div class="glass border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all group">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">Video Pembelajaran</h4>
                                    <p class="text-sm text-slate-600">Tonton untuk pemahaman lebih dalam</p>
                                </div>
                            </div>
                            <button class="video-btn w-full bg-gradient-to-r from-red-500 to-pink-600 text-white py-3 px-4 rounded-xl font-medium hover:shadow-lg transition-all group-hover:scale-105">
                                ▶️ Tonton Video
                            </button>
                        </div>
                    </template>

                    <!-- Template untuk file resource -->
                    <template id="fileResourceTemplate">
                        <div class="glass border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all group">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">File Pendukung</h4>
                                    <p class="file-name text-sm text-slate-600"></p>
                                </div>
                            </div>
                            <button class="download-btn w-full bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-3 px-4 rounded-xl font-medium hover:shadow-lg transition-all group-hover:scale-105">
                                📥 Download File
                            </button>
                        </div>
                    </template>

                    <!-- Template untuk video player -->
                    <template id="videoPlayerTemplate">
                        <div class="video-player-container">
                            <div class="video-wrapper">
                                <div class="video-frame">
                                    <iframe class="video-iframe" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="video-controls">
                                <p class="video-message">Tonton video dengan seksama dan jangan ragu untuk pause jika diperlukan</p>
                                <button class="back-to-material-btn">← Kembali ke Materi</button>
                            </div>
                        </div>
                    </template>

                    <!-- Template untuk toast notification -->
                    <template id="toastTemplate">
                        <div class="toast success">
                            <div class="toast-content">
                                <svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path class="toast-icon-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                </svg>
                                <span class="toast-message"></span>
                            </div>
                        </div>
                    </template>

                    <!-- Template untuk material item -->
                    <template id="materialItemTemplate">
                        <div class="material-item">
                            <div class="material-icon">
                                <svg class="material-svg w-4 h-4" viewBox="0 0 24 24">
                                    <path class="material-svg-path"></path>
                                </svg>
                            </div>
                            <div class="material-info">
                                <div class="material-title"></div>
                                <div class="material-duration"></div>
                                <div class="material-badges"></div>
                            </div>
                            <div class="active-indicator hidden"></div>
                        </div>
                    </template>

                    <!-- Material Info & Navigation dengan design yang lebih menarik -->
                    <div class="bg-white/90 backdrop-blur-sm border-t border-slate-200/50 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 id="currentMaterialTitle" class="text-xl font-bold text-slate-900 mb-2">Pilih materi untuk memulai</h4>
                                <div class="flex items-center gap-4 text-sm">
                                    <span id="currentMaterialDuration" class="text-slate-600">Durasi akan ditampilkan di sini</span>
                                    <span id="currentMaterialType" class="hidden px-3 py-1 bg-gradient-to-r from-blue-100 to-purple-100 text-slate-700 rounded-full text-xs font-medium border border-blue-200"></span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <button id="prevBtn" onclick="previousMaterial()" class="flex items-center gap-2 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-medium transition-all disabled:opacity-50 disabled:cursor-not-allowed group" disabled>
                                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    <span>Sebelumnya</span>
                                </button>

                                <button id="nextBtn" onclick="nextMaterial()" class="flex items-center gap-2 btn-primary text-white px-6 py-3 rounded-xl font-medium transition-all shadow-lg group">
                                    <span>Selanjutnya</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variables for learning modal
let currentModule = null;
let currentMaterialIndex = 0;
let currentMaterials = [];

// Function to scroll to modules section
function scrollToModules() {
    document.getElementById('modules').scrollIntoView({
        behavior: 'smooth'
    });
}

// Toggle materials visibility
function toggleMaterials(moduleNumber) {
    const materialsDiv = document.getElementById(`materials-${moduleNumber}`);
    const arrow = document.getElementById(`arrow-${moduleNumber}`);

    if (materialsDiv.classList.contains('hidden')) {
        materialsDiv.classList.remove('hidden');
        arrow.style.transform = 'rotate(180deg)';
    } else {
        materialsDiv.classList.add('hidden');
        arrow.style.transform = 'rotate(0deg)';
    }
}

// Open module function with enhanced animations - now receives module data from PHP
function openModule(moduleNumber, moduleData) {
    currentModule = moduleData;
    if (!currentModule) return;

    currentMaterials = currentModule.materials_list || [];
    currentMaterialIndex = 0;

    // Update modal title
    document.getElementById('modalTitle').textContent = currentModule.title;

    // Populate materials list
    populateMaterialsList();

    // Show modal with stunning animation
    const modal = document.getElementById('learningModal');
    const modalContent = modal.querySelector('.modal-content');

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Trigger animations
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('show');
    }, 10);

    // Load first material if available
    if (currentMaterials.length > 0) {
        loadMaterial(0);
    }

    // Add keyboard event listener
    document.addEventListener('keydown', handleModalKeyboard);
}

// Close modal function with smooth animation
function closeModal() {
    const modal = document.getElementById('learningModal');
    const modalContent = modal.querySelector('.modal-content');

    // Animate modal disappearance
    modal.classList.add('opacity-0');
    modalContent.classList.add('scale-95');
    modalContent.classList.remove('show');

    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
        document.removeEventListener('keydown', handleModalKeyboard);
    }, 300);
}

// Enhanced keyboard navigation
function handleModalKeyboard(e) {
    if (document.getElementById('learningModal').classList.contains('hidden')) return;

    switch(e.key) {
        case 'ArrowLeft':
            e.preventDefault();
            previousMaterial();
            break;
        case 'ArrowRight':
            e.preventDefault();
            nextMaterial();
            break;
        case 'Escape':
            e.preventDefault();
            closeModal();
            break;
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
            e.preventDefault();
            const materialIndex = parseInt(e.key) - 1;
            if (materialIndex < currentMaterials.length) {
                loadMaterial(materialIndex);
            }
            break;
    }
}

// Populate materials list - cleaned up, using template
function populateMaterialsList() {
    const materialsList = document.getElementById('materialsList');
    materialsList.innerHTML = '';

    currentMaterials.forEach((material, index) => {
        const template = document.getElementById('materialItemTemplate');
        const content = template.content.cloneNode(true);
        const materialItem = content.querySelector('.material-item');

        // Set active state
        if (index === currentMaterialIndex) {
            materialItem.classList.add('active');
            content.querySelector('.active-indicator').classList.remove('hidden');
        }

        // Set click handler
        materialItem.onclick = () => loadMaterial(index);

        // Configure icon based on type
        const icon = content.querySelector('.material-icon');
        const svg = content.querySelector('.material-svg');
        const path = content.querySelector('.material-svg-path');

        if (material.type === 'text') {
            icon.classList.add('text-icon');
            svg.setAttribute('fill', 'none');
            svg.setAttribute('stroke', 'currentColor');
            path.setAttribute('stroke-linecap', 'round');
            path.setAttribute('stroke-linejoin', 'round');
            path.setAttribute('stroke-width', '2');
            path.setAttribute('d', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z');
        } else {
            icon.classList.add('video-icon');
            svg.setAttribute('fill', 'currentColor');
            path.setAttribute('d', 'M8 5v14l11-7z');
        }

        // Set material info
        content.querySelector('.material-title').textContent = material.title;
        content.querySelector('.material-duration').textContent = material.duration;

        // Set badges
        const badgesContainer = content.querySelector('.material-badges');
        if (material.optional_video) {
            const videoBadge = document.createElement('span');
            videoBadge.className = 'badge video-badge';
            videoBadge.textContent = 'Video';
            badgesContainer.appendChild(videoBadge);
        }
        if (material.optional_file) {
            const fileBadge = document.createElement('span');
            fileBadge.className = 'badge file-badge';
            fileBadge.textContent = 'File';
            badgesContainer.appendChild(fileBadge);
        }

        materialsList.appendChild(content);
    });

    // Update progress
    updateProgress();
}

// Load material content - use templates instead of complex innerHTML
function loadMaterial(index) {
    currentMaterialIndex = index;
    const material = currentMaterials[index];
    const contentArea = document.getElementById('contentArea');

    // Update material info
    document.getElementById('currentMaterialTitle').textContent = material.title;
    document.getElementById('currentMaterialDuration').textContent = material.duration;

    const typeSpan = document.getElementById('currentMaterialType');
    typeSpan.textContent = material.type === 'text' ? 'Materi Teks' : 'Video';
    typeSpan.classList.remove('hidden');

    // Update navigation buttons
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    prevBtn.disabled = index === 0;
    nextBtn.disabled = index === currentMaterials.length - 1;

    // Use template for content presentation
    if (material.type === 'text') {
        const template = document.getElementById('textContentTemplate');
        const content = template.content.cloneNode(true);

        // Populate template with data
        content.querySelector('.material-number').textContent = index + 1;
        content.querySelector('.material-title').textContent = material.title;
        content.querySelector('.material-duration').textContent = material.duration;
        content.querySelector('.material-progress').textContent = `${index + 1} dari ${currentMaterials.length}`;
        content.querySelector('.material-progress-bar').style.width = `${((index + 1) / currentMaterials.length) * 100}%`;
        content.querySelector('.material-description').textContent = getMaterialDescription(material.title);
        content.querySelector('.material-content').innerHTML = getEnhancedContent(material.title);
        content.querySelector('.learning-tips').textContent = getLearningTips(material.title);

        // Handle additional resources
        const resourcesContainer = content.querySelector('.additional-resources');
        if (material.optional_video) {
            const videoTemplate = document.getElementById('videoResourceTemplate');
            const videoContent = videoTemplate.content.cloneNode(true);
            videoContent.querySelector('.video-btn').onclick = () => showVideo(material.optional_video);
            resourcesContainer.appendChild(videoContent);
        }

        if (material.optional_file) {
            const fileTemplate = document.getElementById('fileResourceTemplate');
            const fileContent = fileTemplate.content.cloneNode(true);
            fileContent.querySelector('.file-name').textContent = material.optional_file;
            fileContent.querySelector('.download-btn').onclick = () => downloadFile(material.optional_file);
            resourcesContainer.appendChild(fileContent);
        }

        // Replace content
        contentArea.innerHTML = '';
        contentArea.appendChild(content);
    }

    // Update materials list UI
    populateMaterialsList();

    // Smooth scroll to top of content
    contentArea.scrollTop = 0;
}

// Helper functions for enhanced content
function getMaterialDescription(title) {
    const descriptions = {
        'Pengenalan HTML5': 'Dalam materi ini, Anda akan mempelajari dasar-dasar HTML5, struktur dokumen, dan elemen-elemen semantic yang akan menjadi foundation untuk pengembangan web modern.',
        'Semantic Elements': 'Pelajari elemen-elemen semantic HTML5 yang memberikan makna pada struktur halaman web, meningkatkan SEO dan accessibility.',
        'CSS Selectors & Properties': 'Kuasai berbagai selector CSS dan properti untuk mengatur tampilan elemen dengan presisi dan efisiensi.',
        'Flexbox Layout': 'Pelajari sistem layout Flexbox untuk mengatur tata letak elemen secara fleksibel dan responsif.',
        'CSS Grid System': 'Menguasai CSS Grid untuk membuat layout kompleks dengan kontrol penuh atas posisi elemen.',
        'Responsive Design': 'Teknik untuk membuat website yang tampil optimal di berbagai ukuran layar dan perangkat.',
        'CSS Animations': 'Buat animasi dan transisi menarik menggunakan CSS untuk meningkatkan user experience.',
        'Project: Landing Page': 'Aplikasikan semua pengetahuan yang telah dipelajari untuk membuat landing page yang responsive dan menarik.'
    };
    return descriptions[title] || 'Pelajari konsep penting dalam pengembangan web modern.';
}

// Update progress display
function updateProgress() {
    const completed = currentMaterialIndex + 1;
    const total = currentMaterials.length;
    const percentage = (completed / total) * 100;

    document.getElementById('currentProgress').textContent = `${completed}/${total}`;
    document.getElementById('modalProgressBar').style.width = `${percentage}%`;
}

// Navigation functions
function previousMaterial() {
    if (currentMaterialIndex > 0) {
        loadMaterial(currentMaterialIndex - 1);
    }
}

function nextMaterial() {
    if (currentMaterialIndex < currentMaterials.length - 1) {
        loadMaterial(currentMaterialIndex + 1);
    }
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // AOS refresh when needed
        window.addEventListener('resize', function() {
            AOS.refresh();
        });

        // Force AOS refresh after a delay
        setTimeout(function() {
            AOS.refresh();
        }, 1000);
    }
});
</script>
@endsection
