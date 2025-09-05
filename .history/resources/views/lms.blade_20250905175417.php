@extends('layouts.app')

@section('title', 'Full-Stack Web Development Course')

@section('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <div class="container mx-auto px-4 relative z-10 min-h-screen flex items-center">
        <!-- AOS Test Element -->
        <div data-aos="fade-in" class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded text-xs z-50">
            AOS Test
        </div>

        <!-- Additional AOS Test Elements -->
        <div data-aos="fade-up" data-aos-delay="50" class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded text-xs z-50">
            AOS Working
        </div>

        <div class="max-w-7xl mx-auto w-full">
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
                            <button onclick="scrollToModules()" class="group relative btn-primary text-white px-8 py-4 rounded-xl font-bold text-lg overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    Mulai Perjalanan Belajar
                                </span>
                            </button>
                            <button class="group glass border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/10 transition-all">
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h1m4 0h1m6-10V7a3 3 0 11-6 0V4h6zM6 20h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
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
                        <div class="absolute -top-6 -right-6 w-20 h-20 gradient-bg-4 rounded-2xl shadow-xl flex items-center justify-center animate-glow">
                            <svg class="w-10 h-10 text-white animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>

                        <div class="absolute -bottom-4 -left-4 w-16 h-16 gradient-bg-5 rounded-xl shadow-lg flex items-center justify-center animate-float" style="animation-delay: -2s;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center mb-16">
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
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
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
        <div class="max-w-3xl mx-auto text-center mt-16" data-aos="fade-up" data-aos-delay="800">
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

    <div class="container mx-auto px-4 relative z-10">
        <!-- Section header with animations -->
        <div class="max-w-4xl mx-auto text-center mb-20">
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
        <div class="max-w-3xl mx-auto mb-20" data-aos="flip-up" data-aos-delay="600">
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
                    'gradient' => 'gradient-bg-1',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>',
                    'materials_preview' => ['Pengenalan HTML5', 'Semantic Elements', 'CSS Selectors & Properties', 'Flexbox Layout']
                ],
                [
                    'number' => 2,
                    'title' => 'JavaScript Essentials',
                    'description' => 'Kuasai JavaScript dari dasar hingga advanced: ES6+, DOM manipulation, asynchronous programming, dan modern JavaScript features.',
                    'duration' => '18 jam',
                    'materials' => 12,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'gradient-bg-2',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
                    'materials_preview' => ['JavaScript Fundamentals', 'Variables & Data Types', 'Functions & Scope', 'DOM Manipulation']
                ],
                [
                    'number' => 3,
                    'title' => 'Git & Version Control',
                    'description' => 'Pelajari Git untuk version control, collaboration, dan workflow development yang profesional dalam tim developer.',
                    'duration' => '8 jam',
                    'materials' => 6,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'gradient-bg-3',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/></svg>',
                    'materials_preview' => ['Git Fundamentals', 'Repository Management', 'Branching & Merging', 'GitHub Collaboration']
                ],
                [
                    'number' => 4,
                    'title' => 'React.js Development',
                    'description' => 'Bangun aplikasi web modern dengan React: components, hooks, state management, dan ecosystem React terbaru.',
                    'duration' => '25 jam',
                    'materials' => 15,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'gradient-bg-4',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
                    'materials_preview' => ['React Introduction', 'JSX & Components', 'Props & State', 'React Hooks']
                ],
                [
                    'number' => 5,
                    'title' => 'Node.js & Express',
                    'description' => 'Backend development dengan Node.js dan Express: server, routing, middleware, RESTful API, dan arsitektur backend modern.',
                    'duration' => '20 jam',
                    'materials' => 12,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'gradient-bg-5',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>',
                    'materials_preview' => ['Node.js Introduction', 'Express.js Setup', 'RESTful API Design', 'Middleware & Authentication']
                ],
                [
                    'number' => 6,
                    'title' => 'Database & MongoDB',
                    'description' => 'Database design dan implementasi dengan MongoDB: CRUD operations, aggregation, indexing, dan optimasi database.',
                    'duration' => '15 jam',
                    'materials' => 10,
                    'status' => 'locked',
                    'progress' => 0,
                    'gradient' => 'gradient-bg-6',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>',
                    'materials_preview' => ['Database Fundamentals', 'MongoDB Introduction', 'CRUD Operations', 'Mongoose ODM']
                ]
            ];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($modules as $index => $module)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group module-card"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index * 100) + 100 }}"
                     data-aos-anchor-placement="top-bottom">
                    <!-- Card header dengan gradient background yang lebih readable -->
                    <div class="relative {{ $module['gradient'] }} p-6 text-white overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-4">
                                <!-- Module number -->
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                                    <span class="text-xl font-bold text-white">{{ $module['number'] }}</span>
                                </div>

                                <!-- Module status -->
                                @if($module['status'] === 'available')
                                <div class="flex items-center gap-2 bg-green-500/20 backdrop-blur-sm px-3 py-1 rounded-full border border-green-400/30">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <span class="text-xs font-semibold text-white">Tersedia</span>
                                </div>
                                @else
                                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span class="text-xs font-semibold text-white">Terkunci</span>
                                </div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <div class="text-white/90 mb-3">{!! $module['icon'] !!}</div>
                                <h3 class="text-xl font-bold mb-2 text-white">
                                    {{ $module['title'] }}
                                </h3>
                                <p class="text-white/95 leading-relaxed text-sm">{{ $module['description'] }}</p>
                            </div>

                            <div class="flex items-center gap-4 text-sm text-white/90">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="font-medium">{{ $module['duration'] }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span class="font-medium">{{ $module['materials'] }} materi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card content dengan background putih solid -->
                    <div class="p-6 bg-white">
                        <!-- Materials preview -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-slate-900 mb-3 flex items-center gap-2">
                                <span>Preview Materi</span>
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </h4>
                            <div class="space-y-2">
                                @foreach(array_slice($module['materials_preview'], 0, 3) as $preview)
                                <div class="flex items-center gap-3 p-2 rounded-lg bg-slate-50 border border-slate-100 hover:bg-slate-100 transition-colors">
                                    <div class="w-2 h-2 {{ $module['gradient'] }} rounded-full"></div>
                                    <span class="text-sm font-medium text-slate-800">{{ $preview }}</span>
                                </div>
                                @endforeach
                                <div class="text-xs text-slate-500 px-2">
                                    +{{ count($module['materials_preview']) - 3 }} materi lainnya
                                </div>
                            </div>
                        </div>

                        <!-- Action section -->
                        <div class="flex items-center justify-between">
                            @if($module['status'] === 'available')
                            <div class="flex-1">
                                <button onclick="openModule({{ $module['number'] }})" class="w-full btn-primary text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all group relative overflow-hidden">
                                    <span class="relative z-10 flex items-center justify-center gap-2">
                                        <span>{{ $module['progress'] > 0 ? 'Lanjutkan' : 'Mulai Belajar' }}</span>
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            @else
                            <div class="flex-1 flex items-center justify-center gap-2 p-3 bg-slate-100 rounded-xl text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span class="font-medium text-sm">Selesaikan modul sebelumnya</span>
                            </div>
                            @endif
                        </div>                        <!-- Progress bar -->
                        @if($module['progress'] > 0)
                        <div class="mt-4">
                            <div class="flex justify-between text-sm text-slate-600 mb-2">
                                <span>Progress</span>
                                <span class="font-bold">{{ $module['progress'] }}%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2 progress-bar">
                                <div class="bg-gradient-to-r {{ $module['gradient'] }} h-2 rounded-full transition-all duration-1000" style="width: {{ $module['progress'] }}%"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Call to action -->
        <div class="text-center mt-20 animate-fadeInUp" style="animation-delay: 1s;">
            <div class="glass border border-white/20 rounded-2xl p-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Siap Memulai Perjalanan Anda?</h3>
                <p class="text-slate-600 mb-6">Bergabunglah dengan ribuan developer yang telah memulai karir mereka dengan kursus ini.</p>
                <button class="btn-primary text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all">
                    Mulai Sekarang - Gratis!
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Learning Path Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-6">
                Path Pembelajaran Terstruktur
            </h2>
            <p class="text-xl text-slate-600 leading-relaxed">
                Ikuti jalur pembelajaran yang telah dirancang khusus untuk mengoptimalkan proses belajar Anda
            </p>
        </div>

        <!-- Learning timeline -->
        <div class="max-w-4xl mx-auto">
            <div class="relative">
                <!-- Vertical line -->
                <div class="absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-slate-200"></div>

                @php
                $learningPath = [
                    [
                        'phase' => 'Foundation',
                        'title' => 'Dasar-dasar Web Development',
                        'duration' => '4-6 minggu',
                        'modules' => ['HTML & CSS Fundamentals', 'JavaScript Essentials', 'Git & Version Control'],
                        'description' => 'Membangun fondasi yang kuat dengan mempelajari teknologi dasar web development.',
                        'position' => 'left'
                    ],
                    [
                        'phase' => 'Frontend',
                        'title' => 'Pengembangan Frontend Modern',
                        'duration' => '6-8 minggu',
                        'modules' => ['React.js Development', 'Advanced CSS', 'Frontend Tools'],
                        'description' => 'Kuasai pengembangan antarmuka pengguna yang interaktif dan responsif.',
                        'position' => 'right'
                    ],
                    [
                        'phase' => 'Backend',
                        'title' => 'Server-side Development',
                        'duration' => '6-8 minggu',
                        'modules' => ['Node.js & Express', 'Database & MongoDB', 'API Development'],
                        'description' => 'Pelajari pengembangan backend untuk membangun aplikasi yang scalable.',
                        'position' => 'left'
                    ],
                    [
                        'phase' => 'Integration',
                        'title' => 'Full-Stack Integration',
                        'duration' => '4-6 minggu',
                        'modules' => ['Authentication & Security', 'Deployment & DevOps', 'Final Projects'],
                        'description' => 'Integrasikan semua komponen menjadi aplikasi full-stack yang utuh.',
                        'position' => 'right'
                    ]
                ];
                @endphp

                @foreach($learningPath as $index => $path)
                <div class="relative flex items-center mb-16 last:mb-0">
                    <!-- Timeline dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-12 h-12 bg-blue-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center z-10">
                        <span class="text-white font-bold">{{ $index + 1 }}</span>
                    </div>

                    <!-- Content card -->
                    <div class="w-full {{ $path['position'] === 'left' ? 'pr-8 md:pr-12' : 'pl-8 md:pl-12' }} {{ $path['position'] === 'right' ? 'md:ml-auto' : '' }}">
                        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow {{ $path['position'] === 'left' ? 'md:text-right' : '' }} max-w-md {{ $path['position'] === 'right' ? 'md:ml-auto' : '' }}">
                            <!-- Phase badge -->
                            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm font-medium mb-4">
                                <span>{{ $path['phase'] }}</span>
                                <span>•</span>
                                <span>{{ $path['duration'] }}</span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $path['title'] }}</h3>
                            <p class="text-slate-600 mb-4 leading-relaxed">{{ $path['description'] }}</p>

                            <!-- Modules list -->
                            <div class="space-y-2">
                                @foreach($path['modules'] as $module)
                                <div class="flex items-center gap-2 text-sm {{ $path['position'] === 'left' ? 'md:justify-end' : '' }}">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-slate-700">{{ $module }}</span>
                                </div>
                                @endforeach
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
<!-- AOS JavaScript -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- LMS AOS Enhancement -->
<script src="{{ asset('js/lms-aos.js') }}"></script>
<script>
// Suppress Tailwind CDN warning in development
if (typeof tailwind !== 'undefined') {
    console.log('🎨 Tailwind CSS loaded via CDN (Development mode)');
}

// Direct AOS initialization as backup
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Direct AOS initialization starting...');
    
    // Wait a bit for all scripts to load
    setTimeout(function() {
        if (typeof AOS !== 'undefined') {
            console.log('✅ AOS available, initializing directly...');
            
            AOS.init({
                duration: 800,
                once: true,
                offset: 50,
                disable: false
            });
            
            console.log('🎉 Direct AOS initialization complete!');
            
            // Force refresh
            setTimeout(function() {
                AOS.refresh();
                console.log('🔄 Direct AOS refresh complete');
                
                // Test elements
                const elements = document.querySelectorAll('[data-aos]');
                console.log(`📊 Direct init found ${elements.length} AOS elements`);
                
            }, 200);
            
        } else {
            console.log('❌ AOS not available for direct initialization');
        }
    }, 500);
});
</script>
<script>
// Global variables for learning modal
let currentModule = null;
let currentMaterialIndex = 0;
let currentMaterials = [];

// Module data - Updated structure with text-based content
const modulesData = [
    {
        number: 1,
        title: 'HTML & CSS Fundamentals',
        description: 'Pelajari dasar-dasar HTML5 dan CSS3, semantic elements, flexbox, grid, dan responsive design.',
        duration: '12 jam',
        materials: 8,
        materials_list: [
            {
                type: 'text',
                title: 'Pengenalan HTML5',
                duration: '30 min',
                content: 'HTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur dan konten halaman web...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                optional_file: 'html-guide.pdf'
            },
            {
                type: 'text',
                title: 'Semantic Elements',
                duration: '45 min',
                content: 'Semantic elements memberikan makna yang jelas pada struktur dokumen HTML...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'CSS Selectors & Properties',
                duration: '60 min',
                content: 'CSS (Cascading Style Sheets) digunakan untuk mengatur tampilan dan layout halaman web...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                optional_file: 'css-cheatsheet.pdf'
            },
            {
                type: 'text',
                title: 'Flexbox Layout',
                duration: '90 min',
                content: 'Flexbox adalah sistem layout CSS yang memungkinkan pengaturan elemen secara fleksibel...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'CSS Grid System',
                duration: '75 min',
                content: 'CSS Grid adalah sistem layout dua dimensi yang powerful untuk mengatur layout website...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'Responsive Design',
                duration: '120 min',
                content: 'Responsive design memastikan website tampil optimal di berbagai ukuran layar...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                optional_file: 'responsive-examples.zip'
            },
            {
                type: 'text',
                title: 'CSS Animations',
                duration: '60 min',
                content: 'CSS animations memungkinkan pembuatan efek visual yang menarik tanpa JavaScript...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'Project: Landing Page',
                duration: '180 min',
                content: 'Dalam project ini, Anda akan membuat landing page yang responsive menggunakan HTML dan CSS...',
                optional_file: 'project-assets.zip'
            }
        ]
    }
];

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

// Open module function with enhanced animations
function openModule(moduleNumber) {
    currentModule = modulesData.find(m => m.number === moduleNumber);
    if (!currentModule) return;

    currentMaterials = currentModule.materials_list;
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

    // Load first material
    loadMaterial(0);

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

// Populate materials list in sidebar
function populateMaterialsList() {
    const materialsList = document.getElementById('materialsList');
    materialsList.innerHTML = '';

    currentMaterials.forEach((material, index) => {
        const materialItem = document.createElement('div');
        materialItem.className = `flex items-start gap-3 p-3 rounded-lg cursor-pointer transition-all duration-200 ${
            index === currentMaterialIndex ? 'bg-blue-50 border border-blue-200' : 'hover:bg-slate-100'
        }`;
        materialItem.onclick = () => loadMaterial(index);

        // Material type icon
        const icon = material.type === 'text'
            ? '<div class="w-8 h-8 bg-slate-500 rounded-lg flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>'
            : '<div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>';

        materialItem.innerHTML = `
            ${icon}
            <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-900 mb-1">${material.title}</div>
                <div class="text-xs text-slate-500 mb-2">${material.duration}</div>
                <div class="flex flex-wrap gap-1">
                    ${material.optional_video ? '<span class="text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded">Video</span>' : ''}
                    ${material.optional_file ? '<span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded">File</span>' : ''}
                </div>
            </div>
            ${index === currentMaterialIndex ? '<div class="w-3 h-3 bg-blue-500 rounded-full flex-shrink-0 mt-1"></div>' : ''}
        `;

        materialsList.appendChild(materialItem);
    });

    // Update progress
    updateProgress();
}

// Load material content with enhanced presentation
function loadMaterial(index) {
    currentMaterialIndex = index;
    const material = currentMaterials[index];
    const contentArea = document.getElementById('contentArea');

    // Update material info with animations
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

    // Enhanced content presentation
    if (material.type === 'text') {
        contentArea.innerHTML = `
            <div class="w-full h-full bg-white/70 backdrop-blur-sm overflow-y-auto">
                <div class="max-w-4xl mx-auto p-8">
                    <!-- Material Header -->
                    <div class="mb-8">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold text-lg">${index + 1}</span>
                            </div>
                            <div>
                                <h1 class="text-3xl font-black text-slate-900 mb-2">${material.title}</h1>
                                <div class="flex items-center gap-4 text-slate-600">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        ${material.duration}
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
                                <span class="text-sm font-bold text-blue-600">${index + 1} dari ${currentMaterials.length}</span>
                            </div>
                            <div class="w-full bg-white/80 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full transition-all duration-500" style="width: ${((index + 1) / currentMaterials.length) * 100}%"></div>
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
                            <p class="text-blue-800 leading-relaxed">
                                ${getMaterialDescription(material.title)}
                            </p>
                        </div>

                        <div class="text-slate-700 leading-relaxed text-lg mb-8 space-y-6">
                            ${getEnhancedContent(material.title)}
                        </div>

                        <!-- Additional resources with enhanced design -->
                        <div class="border-t pt-8 mt-8">
                            <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                Sumber Belajar Tambahan
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                ${material.optional_video ? `
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
                                        <button onclick="showVideo('${material.optional_video}')" class="w-full bg-gradient-to-r from-red-500 to-pink-600 text-white py-3 px-4 rounded-xl font-medium hover:shadow-lg transition-all group-hover:scale-105">
                                            ▶️ Tonton Video
                                        </button>
                                    </div>
                                ` : ''}

                                ${material.optional_file ? `
                                    <div class="glass border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all group">
                                        <div class="flex items-center gap-4 mb-4">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-slate-900">File Pendukung</h4>
                                                <p class="text-sm text-slate-600">${material.optional_file}</p>
                                            </div>
                                        </div>
                                        <button onclick="downloadFile('${material.optional_file}')" class="w-full bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-3 px-4 rounded-xl font-medium hover:shadow-lg transition-all group-hover:scale-105">
                                            📥 Download File
                                        </button>
                                    </div>
                                ` : ''}
                            </div>

                            <!-- Tips section -->
                            <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-6">
                                <h5 class="font-bold text-green-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                    💡 Tips Belajar
                                </h5>
                                <p class="text-green-800 leading-relaxed">
                                    ${getLearningTips(material.title)}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Update materials list UI with animation
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

function getEnhancedContent(title) {
    const contents = {
        'Pengenalan HTML5': `
            <h4 class="text-xl font-bold text-slate-900 mb-4">Apa itu HTML5?</h4>
            <p class="mb-6">
                HTML5 adalah versi terbaru dari HyperText Markup Language, yang merupakan bahasa markup
                standar untuk membuat halaman web. HTML5 memperkenalkan banyak fitur baru yang
                memungkinkan developer untuk membuat aplikasi web yang lebih interaktif dan semantik.
            </p>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 mb-6">
                <h5 class="font-bold text-slate-900 mb-3">Fitur Utama HTML5:</h5>
                <ul class="space-y-2 text-slate-700">
                    <li class="flex items-start gap-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <span>Semantic Elements (header, nav, main, section, article, footer)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <span>Form Controls (input types baru seperti email, date, number)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <span>Media Elements (audio, video tanpa plugin)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <span>Canvas untuk graphics dan animasi</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                        <span>Local Storage untuk penyimpanan data lokal</span>
                    </li>
                </ul>
            </div>

            <h4 class="text-xl font-bold text-slate-900 mb-4">Struktur Dasar HTML5</h4>
            <div class="bg-slate-900 rounded-xl p-6 overflow-x-auto mb-6">
                <pre class="text-green-400 text-sm leading-relaxed"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Judul Halaman&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;header&gt;
        &lt;h1&gt;Header Website&lt;/h1&gt;
        &lt;nav&gt;Navigation&lt;/nav&gt;
    &lt;/header&gt;

    &lt;main&gt;
        &lt;section&gt;
            &lt;h2&gt;Section Title&lt;/h2&gt;
            &lt;p&gt;Content here...&lt;/p&gt;
        &lt;/section&gt;
    &lt;/main&gt;

    &lt;footer&gt;
        &lt;p&gt;Footer content&lt;/p&gt;
    &lt;/footer&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
            </div>

            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-6">
                <h5 class="font-bold text-green-900 mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Poin Penting
                </h5>
                <p class="text-green-800">
                    Selalu gunakan DOCTYPE html untuk memberitahu browser bahwa dokumen menggunakan HTML5.
                    Ini memastikan konsistensi rendering di berbagai browser.
                </p>
            </div>
        `,
        'Semantic Elements': `
            <h4 class="text-xl font-bold text-slate-900 mb-4">Mengapa Semantic Elements Penting?</h4>
            <p class="mb-6">
                Semantic elements memberikan makna yang jelas pada struktur halaman web, membuatnya lebih mudah
                dipahami oleh browser, search engine, dan screen reader. Ini meningkatkan SEO dan accessibility website Anda.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                    <h5 class="font-bold text-blue-900 mb-2">&lt;header&gt;</h5>
                    <p class="text-blue-700 text-sm">Untuk header halaman atau section, biasanya berisi logo, navigasi utama, atau judul.</p>
                </div>
                <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
                    <h5 class="font-bold text-green-900 mb-2">&lt;nav&gt;</h5>
                    <p class="text-green-700 text-sm">Untuk menu navigasi website, membantu user dan search engine memahami struktur.</p>
                </div>
                <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg">
                    <h5 class="font-bold text-yellow-900 mb-2">&lt;main&gt;</h5>
                    <p class="text-yellow-700 text-sm">Untuk konten utama halaman, hanya boleh ada satu per halaman.</p>
                </div>
                <div class="bg-purple-50 border border-purple-200 p-4 rounded-lg">
                    <h5 class="font-bold text-purple-900 mb-2">&lt;section&gt;</h5>
                    <p class="text-purple-700 text-sm">Untuk bagian-bagian konten yang memiliki tema tertentu.</p>
                </div>
            </div>

            <h4 class="text-xl font-bold text-slate-900 mb-4">Contoh Penggunaan</h4>
            <div class="bg-slate-900 rounded-xl p-6 overflow-x-auto">
                <pre class="text-green-400 text-sm leading-relaxed"><code>&lt;article&gt;
    &lt;header&gt;
        &lt;h1&gt;Judul Artikel&lt;/h1&gt;
        &lt;time datetime="2024-01-15"&gt;15 Januari 2024&lt;/time&gt;
    &lt;/header&gt;

    &lt;section&gt;
        &lt;h2&gt;Pendahuluan&lt;/h2&gt;
        &lt;p&gt;Isi pendahuluan...&lt;/p&gt;
    &lt;/section&gt;

    &lt;section&gt;
        &lt;h2&gt;Pembahasan&lt;/h2&gt;
        &lt;p&gt;Isi pembahasan...&lt;/p&gt;
    &lt;/section&gt;

    &lt;footer&gt;
        &lt;p&gt;Ditulis oleh: Nama Penulis&lt;/p&gt;
    &lt;/footer&gt;
&lt;/article&gt;</code></pre>
            </div>
        `
    };
    return contents[title] || '<p>Konten pembelajaran akan ditampilkan di sini...</p>';
}

function getLearningTips(title) {
    const tips = {
        'Pengenalan HTML5': 'Praktikkan langsung setiap elemen HTML5 yang dipelajari. Buat dokumen HTML sederhana dan coba berbagai tag untuk memahami fungsinya.',
        'Semantic Elements': 'Biasakan menggunakan semantic elements sejak awal. Ini akan membuat kode lebih mudah dibaca dan dipelihara di masa depan.',
        'CSS Selectors & Properties': 'Gunakan browser developer tools untuk bereksperimen dengan selector dan properti CSS secara real-time.',
        'Flexbox Layout': 'Mainkan game Flexbox Froggy untuk memahami konsep flexbox dengan cara yang menyenangkan dan interaktif.',
        'CSS Grid System': 'Mulai dengan layout sederhana, kemudian tingkatkan kompleksitas secara bertahap untuk menguasai CSS Grid.',
        'Responsive Design': 'Selalu test website di berbagai ukuran layar menggunakan browser developer tools atau device fisik.',
        'CSS Animations': 'Mulai dengan animasi sederhana seperti hover effects, kemudian lanjut ke animasi yang lebih kompleks.',
        'Project: Landing Page': 'Rencanakan design terlebih dahulu, buat wireframe, lalu implementasikan step by step.'
    };
    return tips[title] || 'Ikuti setiap langkah dengan seksama dan jangan ragu untuk mengulang bagian yang belum dipahami. Praktik langsung akan membantu pemahaman Anda.';
}

// Show video in modal with enhanced player
function showVideo(videoUrl) {
    const contentArea = document.getElementById('contentArea');
    contentArea.innerHTML = `
        <div class="w-full h-full bg-gradient-to-br from-slate-900 to-black flex items-center justify-center">
            <div class="w-full max-w-5xl mx-auto p-8">
                <div class="bg-black rounded-2xl overflow-hidden shadow-2xl">
                    <div class="relative" style="padding-bottom: 56.25%; height: 0;">
                        <iframe
                            src="${videoUrl}?autoplay=1&rel=0&modestbranding=1&showinfo=0"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            class="absolute top-0 left-0 w-full h-full">
                        </iframe>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <button onclick="loadMaterial(${currentMaterialIndex})" class="px-6 py-3 bg-white/10 backdrop-blur-sm text-white rounded-xl border border-white/20 hover:bg-white/20 transition-all">
                        ← Kembali ke Materi
                    </button>
                </div>
            </div>
        </div>
    `;
}

// Download file function with better UX
function downloadFile(filename) {
    // Create a more realistic download experience
    const toast = document.createElement('div');
    toast.className = 'fixed bottom-6 right-6 bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg z-50 transform translate-y-full opacity-0 transition-all duration-300';
    toast.innerHTML = `
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span class="font-medium">Mengunduh ${filename}...</span>
        </div>
    `;

    document.body.appendChild(toast);

    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-y-full', 'opacity-0');
    }, 100);

    // Simulate download process
    setTimeout(() => {
        toast.innerHTML = `
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="font-medium">File berhasil diunduh!</span>
            </div>
        `;

        // Remove toast after delay
        setTimeout(() => {
            toast.classList.add('translate-y-full', 'opacity-0');
            setTimeout(() => document.body.removeChild(toast), 300);
        }, 2000);
    }, 1500);
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

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (document.getElementById('learningModal').classList.contains('hidden')) return;

    if (e.key === 'ArrowLeft') {
        previousMaterial();
    } else if (e.key === 'ArrowRight') {
        nextMaterial();
    } else if (e.key === 'Escape') {
        closeModal();
    }
});

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎓 Modern LMS Interface loaded successfully!');

    // Add smooth scrolling to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // AOS refresh when needed
    window.addEventListener('resize', function() {
        AOS.refresh();
    });
});
</script>
@endsection
