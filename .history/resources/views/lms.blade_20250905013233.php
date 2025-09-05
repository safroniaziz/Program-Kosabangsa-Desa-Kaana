@extends('layouts.app')

@section('title', 'Learning Management System')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    /* Custom animations yang tidak ada di Tailwind */
    @keyframes heroFloat {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-20px, -30px) rotate(1deg); }
        66% { transform: translate(20px, -15px) rotate(-1deg); }
    }

    @keyframes shapeFloat {
        0%, 100% {
            transform: translateY(0) rotate(0deg) scale(1);
            opacity: 0.1;
        }
        33% {
            transform: translateY(-40px) rotate(120deg) scale(1.1);
            opacity: 0.2;
        }
        66% {
            transform: translateY(40px) rotate(240deg) scale(0.9);
            opacity: 0.15;
        }
    }

    .hero-pattern {
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        background-image:
            radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(255,255,255,0.05) 0%, transparent 50%);
        animation: heroFloat 20s ease-in-out infinite;
    }

    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.1;
        animation: shapeFloat 15s ease-in-out infinite;
    }

    .shape-1 {
        width: 120px;
        height: 120px;
        background: linear-gradient(45deg, #00d4ff, rgba(0,212,255,0.3));
        border-radius: 50% 40% 60% 30%;
        top: 15%;
        left: 10%;
        animation-duration: 20s;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, rgba(255,255,255,0.2), #00d4ff);
        border-radius: 30% 70% 40% 60%;
        bottom: 15%;
        right: 10%;
        animation-duration: 25s;
        animation-delay: -5s;
    }

    .shape-3 {
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        top: 60%;
        left: 60%;
        animation-duration: 18s;
        animation-delay: -10s;
    }

    /* Custom hover effects untuk course cards */
    .course-card {
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .course-card:hover {
        transform: translateY(-20px) rotateX(3deg) rotateY(3deg) scale(1.03);
    }

    .course-image {
        transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .course-card:hover .course-image {
        transform: scale(1.15) rotate(2deg);
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600">
    <div class="hero-pattern"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white">
            <div class="animate-fade-in-up" style="animation-delay: 0.1s;">
                <span class="inline-block px-8 py-3 bg-white/20 backdrop-blur-xl rounded-full text-sm font-bold mb-8 border border-white/30">
                    🚀 Platform Pembelajaran Digital Masa Depan
                </span>
            </div>

            <h1 class="text-6xl md:text-8xl font-black mb-8 animate-fade-in-up" style="animation-delay: 0.2s; letter-spacing: -0.05em; line-height: 0.9;">
                Full-Stack Web
                <span class="block text-5xl md:text-7xl mt-4 opacity-90 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                    Development
                </span>
            </h1>

            <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto opacity-95 animate-fade-in-up font-medium leading-relaxed" style="animation-delay: 0.3s;">
                Kuasai teknologi web modern dari dasar hingga advanced. Belajar HTML, CSS, JavaScript,
                React, Node.js, dan database dengan project-based learning yang praktis.
            </p>

            <div class="max-w-2xl mx-auto mb-12 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="relative">
                    <input type="text"
                           class="w-full px-8 py-6 text-lg rounded-full bg-white/95 backdrop-blur-xl border-0 shadow-2xl focus:outline-none focus:ring-4 focus:ring-white/30 transition-all duration-300"
                           placeholder="Cari materi pembelajaran...">
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-full font-bold hover:scale-105 transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="hidden md:inline">Cari</span>
                    </button>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center animate-fade-in-up" style="animation-delay: 0.5s;">
                <a href="#modules" class="inline-flex items-center gap-3 px-10 py-4 bg-white text-gray-900 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Mulai Belajar Sekarang
                </a>
                <a href="#curriculum" class="inline-flex items-center gap-3 px-10 py-4 border-2 border-white/30 text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition-all duration-300 backdrop-blur-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Lihat Kurikulum
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-white relative -mt-20 z-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="text-4xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">24</div>
                <div class="text-gray-600 font-semibold">Modul Pembelajaran</div>
            </div>

            <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-4xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">120</div>
                <div class="text-gray-600 font-semibold">Jam Pembelajaran</div>
            </div>

            <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-4xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">15</div>
                <div class="text-gray-600 font-semibold">Project Praktis</div>
            </div>

            <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="text-4xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">4.9</div>
                <div class="text-gray-600 font-semibold">Rating Kursus</div>
            </div>
        </div>
    </div>
</section>

<!-- Modules Section -->
<section id="modules" class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="w-24 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-8"></div>
            <h2 class="text-5xl font-black mb-6">
                <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Modul Pembelajaran</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto font-medium">
                Pelajari step-by-step dari dasar hingga advanced dengan kurikulum yang terstruktur
            </p>
        </div>

        <!-- Filter Pills -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button class="px-8 py-4 bg-indigo-600 text-white rounded-full font-bold border-2 border-indigo-600 hover:bg-indigo-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                🌟 Semua Modul
            </button>
            <button class="px-8 py-4 bg-white text-gray-600 rounded-full font-bold border-2 border-indigo-100 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                🎯 Fundamental
            </button>
            <button class="px-8 py-4 bg-white text-gray-600 rounded-full font-bold border-2 border-indigo-100 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                💻 Frontend
            </button>
            <button class="px-8 py-4 bg-white text-gray-600 rounded-full font-bold border-2 border-indigo-100 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                ⚙️ Backend
            </button>
            <button class="px-8 py-4 bg-white text-gray-600 rounded-full font-bold border-2 border-indigo-100 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                🗄️ Database
            </button>
            <button class="px-8 py-4 bg-white text-gray-600 rounded-full font-bold border-2 border-indigo-100 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                🚀 Advanced
            </button>
        </div>

        <!-- Modules Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $modules = [
                [
                    'title' => 'HTML & CSS Fundamentals',
                    'description' => 'Pelajari dasar-dasar HTML dan CSS untuk membangun struktur dan styling website yang responsive.',
                    'category' => '🎯 Fundamental',
                    'duration' => '8 jam',
                    'lessons' => '12 Video',
                    'level' => 'Beginner',
                    'progress' => 100,
                    'image' => '1516321318423'
                ],
                [
                    'title' => 'JavaScript Essentials',
                    'description' => 'Kuasai JavaScript dari dasar hingga advanced dengan ES6+, DOM manipulation, dan async programming.',
                    'category' => '💻 Frontend',
                    'duration' => '15 jam',
                    'lessons' => '18 Video',
                    'level' => 'Intermediate',
                    'progress' => 85,
                    'image' => '1551434678'
                ],
                [
                    'title' => 'React.js Development',
                    'description' => 'Belajar React.js untuk membangun aplikasi web modern dengan component-based architecture.',
                    'category' => '💻 Frontend',
                    'duration' => '20 jam',
                    'lessons' => '25 Video',
                    'level' => 'Intermediate',
                    'progress' => 60,
                    'image' => '1559056199'
                ],
                [
                    'title' => 'Node.js & Express',
                    'description' => 'Pelajari backend development dengan Node.js dan Express untuk membangun RESTful API.',
                    'category' => '⚙️ Backend',
                    'duration' => '18 jam',
                    'lessons' => '22 Video',
                    'level' => 'Advanced',
                    'progress' => 30,
                    'image' => '1552664688'
                ],
                [
                    'title' => 'Database & MongoDB',
                    'description' => 'Kuasai database design dan implementasi dengan MongoDB untuk aplikasi web modern.',
                    'category' => '🗄️ Database',
                    'duration' => '12 jam',
                    'lessons' => '15 Video',
                    'level' => 'Intermediate',
                    'progress' => 0,
                    'image' => '1504384308'
                ],
                [
                    'title' => 'Full-Stack Project',
                    'description' => 'Implementasikan semua yang dipelajari dalam project full-stack yang komprehensif.',
                    'category' => '🚀 Advanced',
                    'duration' => '25 jam',
                    'lessons' => '30 Video',
                    'level' => 'Expert',
                    'progress' => 0,
                    'image' => '1498050108'
                ]
            ];
            @endphp

            @foreach($modules as $index => $module)
            <div class="course-card bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-{{ $module['image'] }}-f06f85e504b3?w=800&h=600&fit=crop&crop=entropy&auto=format&q=80"
                         alt="{{ $module['title'] }}"
                         class="course-image w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <span class="absolute top-6 left-6 bg-white/95 backdrop-blur-xl px-4 py-2 rounded-xl text-sm font-bold text-indigo-600 shadow-lg">
                        {{ $module['level'] }}
                    </span>
                    <div class="absolute top-6 right-6 bg-white/95 backdrop-blur-xl px-3 py-2 rounded-xl flex items-center gap-1 text-sm font-bold text-yellow-600 shadow-lg">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span>4.8</span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm font-bold">
                            {{ $module['category'] }}
                        </span>
                        <div class="flex items-center gap-2 text-gray-500 text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $module['duration'] }}</span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ $module['title'] }}
                    </h3>

                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ $module['description'] }}
                    </p>

                    <div class="flex items-center gap-4 mb-6 py-4 border-t border-b border-gray-100">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Modul {{ $index + 1 }}</div>
                            <div class="text-sm text-gray-500">{{ $module['lessons'] }}</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 text-gray-500 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $module['lessons'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-500 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span>{{ $module['duration'] }}</span>
                            </div>
                        </div>

                        <a href="{{ url('/lms/module/' . ($index + 1)) }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-bold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center gap-2">
                            <span>{{ $module['progress'] > 0 ? 'Lanjutkan' : 'Mulai' }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>

                    @if($module['progress'] > 0)
                    <div class="mt-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Progress</span>
                            <span>{{ $module['progress'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 h-2 rounded-full transition-all duration-1000" style="width: {{ $module['progress'] }}%"></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-16">
            <button class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-12 py-4 rounded-2xl font-bold text-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                Lihat Semua Modul
            </button>
        </div>
    </div>
</section>

<!-- Curriculum Section -->
<section id="curriculum" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="w-24 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-8"></div>
            <h2 class="text-5xl font-black mb-6">
                <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Kurikulum Lengkap</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto font-medium">
                Struktur pembelajaran yang terorganisir dari dasar hingga advanced
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                @php
                $curriculum = [
                    [
                        'phase' => 'Phase 1',
                        'title' => 'Fundamentals',
                        'duration' => '4 Minggu',
                        'modules' => [
                            'HTML5 & Semantic Elements',
                            'CSS3 & Flexbox/Grid',
                            'Responsive Design',
                            'Git & Version Control'
                        ],
                        'color' => 'from-green-500 to-emerald-600'
                    ],
                    [
                        'phase' => 'Phase 2',
                        'title' => 'Frontend Development',
                        'duration' => '6 Minggu',
                        'modules' => [
                            'JavaScript ES6+',
                            'DOM Manipulation',
                            'React.js Fundamentals',
                            'State Management',
                            'API Integration',
                            'Testing & Debugging'
                        ],
                        'color' => 'from-blue-500 to-cyan-600'
                    ],
                    [
                        'phase' => 'Phase 3',
                        'title' => 'Backend Development',
                        'duration' => '5 Minggu',
                        'modules' => [
                            'Node.js & NPM',
                            'Express.js Framework',
                            'RESTful API Design',
                            'Authentication & Security',
                            'File Upload & Storage'
                        ],
                        'color' => 'from-purple-500 to-violet-600'
                    ],
                    [
                        'phase' => 'Phase 4',
                        'title' => 'Database & Deployment',
                        'duration' => '4 Minggu',
                        'modules' => [
                            'MongoDB & Mongoose',
                            'Database Design',
                            'Cloud Deployment',
                            'Performance Optimization',
                            'Final Project'
                        ],
                        'color' => 'from-orange-500 to-red-600'
                    ]
                ];
                @endphp

                @foreach($curriculum as $index => $phase)
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r {{ $phase['color'] }} p-8 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-sm font-bold opacity-90">{{ $phase['phase'] }}</span>
                                <h3 class="text-3xl font-black mt-2">{{ $phase['title'] }}</h3>
                                <p class="text-lg opacity-90 mt-2">{{ $phase['duration'] }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-4xl font-black opacity-20">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($phase['modules'] as $module)
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-300">
                                <div class="w-8 h-8 bg-gradient-to-r {{ $phase['color'] }} rounded-full flex items-center justify-center text-white font-bold text-sm">
                                    {{ array_search($module, $phase['modules']) + 1 }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $module }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1200,
        once: true,
        offset: 120,
        easing: 'ease-out-cubic'
    });

    // Enhanced Course card hover effects with magnetic interaction
    const courseCards = document.querySelectorAll('.course-card');

    courseCards.forEach(card => {
        let isHovered = false;

        // Magnetic effect
        card.addEventListener('mousemove', (e) => {
            if (!isHovered) return;

            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            const distance = Math.sqrt(x * x + y * y);
            const maxDistance = Math.max(rect.width, rect.height) / 2;
            const strength = Math.min(distance / maxDistance, 1);

            const rotateX = (y / rect.height) * 10 * strength;
            const rotateY = (x / rect.width) * -10 * strength;

            card.style.transform = `translateY(-20px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.03)`;
        });

        card.addEventListener('mouseenter', () => {
            isHovered = true;

            // Add subtle scale and glow to other cards
            courseCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.style.transform = 'scale(0.97)';
                    otherCard.style.opacity = '0.6';
                    otherCard.style.filter = 'blur(1px)';
                }
            });
        });

        card.addEventListener('mouseleave', () => {
            isHovered = false;

            // Reset all cards with smooth transition
            courseCards.forEach(otherCard => {
                otherCard.style.transform = 'scale(1)';
                otherCard.style.opacity = '1';
                otherCard.style.filter = 'blur(0)';
            });
        });
    });

    // Filter functionality
    const filterButtons = document.querySelectorAll('button');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-indigo-600', 'text-white');
                btn.classList.add('bg-white', 'text-gray-600');
            });

            // Add active class to clicked button
            button.classList.add('bg-indigo-600', 'text-white');
            button.classList.remove('bg-white', 'text-gray-600');
        });
    });

    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    const searchBtn = document.querySelector('button');

    if (searchInput && searchBtn) {
        const performSearch = () => {
            const searchTerm = searchInput.value.toLowerCase().trim();

            courseCards.forEach((card, index) => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();

                if (!searchTerm || title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    card.style.display = 'none';
                }
            });
        };

        searchInput.addEventListener('input', performSearch);
        searchBtn.addEventListener('click', performSearch);
    }

    console.log('🚀 LMS Revolution initialized successfully!');
});
</script>
@endsection
