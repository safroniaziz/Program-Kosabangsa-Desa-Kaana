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

    /* Elegant Course Cards */
    .course-card {
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.1),
            0 2px 8px rgba(0, 0, 0, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .course-card:hover {
        transform: translateY(-24px) scale(1.02);
        box-shadow:
            0 32px 64px rgba(0, 0, 0, 0.15),
            0 8px 16px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        border-color: rgba(99, 102, 241, 0.3);
    }

    .course-image {
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        filter: brightness(1.05) contrast(1.1);
    }

    .course-card:hover .course-image {
        transform: scale(1.08);
        filter: brightness(1.1) contrast(1.15) saturate(1.1);
    }

    /* Elegant Typography */
    .elegant-title {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.1;
        background: linear-gradient(135deg, #1e293b 0%, #475569 50%, #64748b 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .elegant-subtitle {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        font-weight: 500;
        letter-spacing: -0.01em;
        line-height: 1.4;
        color: #64748b;
    }

    /* Glassmorphism Effects */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .glass-button {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .glass-button:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-2px);
    }

    /* Elegant Animations */
    @keyframes elegantFadeIn {
        from {
        opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
        opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes elegantSlideUp {
        from {
        opacity: 0;
            transform: translateY(40px);
    }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes elegantScale {
        from {
        opacity: 0;
            transform: scale(0.8);
    }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-elegant-fade {
        animation: elegantFadeIn 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .animate-elegant-slide {
        animation: elegantSlideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .animate-elegant-scale {
        animation: elegantScale 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }

    /* Elegant Gradients */
    .gradient-elegant {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
        background-size: 400% 400%;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* Elegant Shadows */
    .shadow-elegant {
        box-shadow: 
            0 4px 6px -1px rgba(0, 0, 0, 0.1),
            0 2px 4px -1px rgba(0, 0, 0, 0.06),
            0 0 0 1px rgba(255, 255, 255, 0.05);
    }

    .shadow-elegant-lg {
        box-shadow: 
            0 20px 25px -5px rgba(0, 0, 0, 0.1),
            0 10px 10px -5px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(255, 255, 255, 0.05);
    }

    /* Elegant Borders */
    .border-elegant {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
    }

    /* Elegant Text Effects */
    .text-elegant-glow {
        text-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden gradient-elegant">
    <div class="hero-pattern"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <!-- Elegant Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center text-white">
            <div class="animate-elegant-fade" style="animation-delay: 0.1s;">
                <span class="inline-block px-8 py-4 glass-card rounded-2xl text-sm font-semibold mb-12 text-white/90 border border-white/20 shadow-elegant">
                    ✨ Platform Pembelajaran Digital Masa Depan
                </span>
            </div>

            <h1 class="text-7xl md:text-9xl font-black mb-12 animate-elegant-slide text-elegant-glow" style="animation-delay: 0.2s; letter-spacing: -0.03em; line-height: 0.85;">
                Full-Stack Web
                <span class="block text-6xl md:text-8xl mt-6 opacity-95 bg-gradient-to-r from-white via-blue-100 to-purple-200 bg-clip-text text-transparent">
                    Development
                </span>
            </h1>

            <p class="text-xl md:text-2xl mb-16 max-w-5xl mx-auto opacity-90 animate-elegant-fade font-medium leading-relaxed" style="animation-delay: 0.3s; line-height: 1.6;">
                Kuasai teknologi web modern dari dasar hingga advanced. Belajar HTML, CSS, JavaScript, 
                React, Node.js, dan database dengan project-based learning yang praktis dan interaktif.
            </p>

            <div class="max-w-3xl mx-auto mb-16 animate-elegant-scale" style="animation-delay: 0.4s;">
                <div class="relative">
                    <input type="text" 
                           class="w-full px-10 py-8 text-xl rounded-3xl glass-card border border-white/20 shadow-elegant-lg focus:outline-none focus:ring-4 focus:ring-white/30 transition-all duration-500 text-white placeholder-white/70"
                           placeholder="Cari materi pembelajaran...">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 glass-button text-white px-10 py-6 rounded-2xl font-bold hover:scale-105 transition-all duration-300 shadow-elegant">
                        <svg class="w-6 h-6 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="hidden md:inline">Cari</span>
                    </button>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-8 justify-center animate-elegant-fade" style="animation-delay: 0.5s;">
                <a href="#modules" class="group inline-flex items-center gap-4 px-12 py-6 bg-white/95 backdrop-blur-xl text-gray-900 rounded-3xl font-bold text-xl hover:bg-white transition-all duration-500 transform hover:scale-105 hover:shadow-elegant-lg border border-white/20">
                    <svg class="w-7 h-7 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Mulai Belajar Sekarang
                </a>
                <a href="#curriculum" class="group inline-flex items-center gap-4 px-12 py-6 glass-button text-white rounded-3xl font-bold text-xl hover:bg-white/20 transition-all duration-500 transform hover:scale-105 shadow-elegant border border-white/30">
                    <svg class="w-7 h-7 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Lihat Kurikulum
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-32 bg-gradient-to-b from-white to-gray-50 relative -mt-20 z-10">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="group text-center p-10 glass-card rounded-3xl shadow-elegant hover:shadow-elegant-lg transition-all duration-500 transform hover:-translate-y-4 border border-white/20">
                <div class="w-24 h-24 gradient-elegant rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-500 shadow-elegant">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="text-5xl font-black elegant-title mb-3">24</div>
                <div class="elegant-subtitle text-lg">Modul Pembelajaran</div>
            </div>

            <div class="group text-center p-10 glass-card rounded-3xl shadow-elegant hover:shadow-elegant-lg transition-all duration-500 transform hover:-translate-y-4 border border-white/20">
                <div class="w-24 h-24 gradient-elegant rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-500 shadow-elegant">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-5xl font-black elegant-title mb-3">120</div>
                <div class="elegant-subtitle text-lg">Jam Pembelajaran</div>
            </div>

            <div class="group text-center p-10 glass-card rounded-3xl shadow-elegant hover:shadow-elegant-lg transition-all duration-500 transform hover:-translate-y-4 border border-white/20">
                <div class="w-24 h-24 gradient-elegant rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-500 shadow-elegant">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-5xl font-black elegant-title mb-3">15</div>
                <div class="elegant-subtitle text-lg">Project Praktis</div>
            </div>

            <div class="group text-center p-10 glass-card rounded-3xl shadow-elegant hover:shadow-elegant-lg transition-all duration-500 transform hover:-translate-y-4 border border-white/20">
                <div class="w-24 h-24 gradient-elegant rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-500 shadow-elegant">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="text-5xl font-black elegant-title mb-3">4.9</div>
                <div class="elegant-subtitle text-lg">Rating Kursus</div>
            </div>
        </div>
    </div>
</section>

<!-- Modules Section -->
<section id="modules" class="py-32 bg-gradient-to-b from-gray-50 via-white to-gray-50">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-block px-6 py-3 glass-card rounded-2xl mb-8 border border-white/20 shadow-elegant">
                <span class="text-sm font-semibold text-gray-600">📚 KURIKULUM LENGKAP</span>
            </div>
            <h2 class="text-6xl md:text-7xl font-black mb-8 elegant-title">
                Modul Pembelajaran
            </h2>
            <p class="text-xl md:text-2xl elegant-subtitle max-w-4xl mx-auto leading-relaxed">
                Pelajari step-by-step dari dasar hingga advanced dengan kurikulum yang terstruktur dan interaktif
            </p>
        </div>

        <!-- Filter Pills -->
        <div class="flex flex-wrap justify-center gap-6 mb-20">
            <button class="group px-10 py-5 gradient-elegant text-white rounded-2xl font-bold transition-all duration-500 transform hover:-translate-y-2 hover:shadow-elegant-lg border border-white/20">
                <span class="group-hover:scale-110 transition-transform duration-300 inline-block">🌟</span>
                <span class="ml-2">Semua Modul</span>
            </button>
            <button class="group px-10 py-5 glass-card text-gray-700 rounded-2xl font-bold transition-all duration-500 transform hover:-translate-y-2 hover:shadow-elegant-lg border border-white/20 hover:bg-white/30">
                <span class="group-hover:scale-110 transition-transform duration-300 inline-block">🎯</span>
                <span class="ml-2">Fundamental</span>
            </button>
            <button class="group px-10 py-5 glass-card text-gray-700 rounded-2xl font-bold transition-all duration-500 transform hover:-translate-y-2 hover:shadow-elegant-lg border border-white/20 hover:bg-white/30">
                <span class="group-hover:scale-110 transition-transform duration-300 inline-block">💻</span>
                <span class="ml-2">Frontend</span>
            </button>
            <button class="group px-10 py-5 glass-card text-gray-700 rounded-2xl font-bold transition-all duration-500 transform hover:-translate-y-2 hover:shadow-elegant-lg border border-white/20 hover:bg-white/30">
                <span class="group-hover:scale-110 transition-transform duration-300 inline-block">⚙️</span>
                <span class="ml-2">Backend</span>
            </button>
            <button class="group px-10 py-5 glass-card text-gray-700 rounded-2xl font-bold transition-all duration-500 transform hover:-translate-y-2 hover:shadow-elegant-lg border border-white/20 hover:bg-white/30">
                <span class="group-hover:scale-110 transition-transform duration-300 inline-block">🗄️</span>
                <span class="ml-2">Database</span>
            </button>
            <button class="group px-10 py-5 glass-card text-gray-700 rounded-2xl font-bold transition-all duration-500 transform hover:-translate-y-2 hover:shadow-elegant-lg border border-white/20 hover:bg-white/30">
                <span class="group-hover:scale-110 transition-transform duration-300 inline-block">🚀</span>
                <span class="ml-2">Advanced</span>
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
                    'image' => '1516321318423',
                    'lessons_list' => [
                        ['type' => 'video', 'title' => 'Pengenalan HTML', 'duration' => '15:30', 'youtube_id' => 'qz0aGYrrlhU'],
                        ['type' => 'video', 'title' => 'Struktur HTML Document', 'duration' => '22:15', 'youtube_id' => 'qz0aGYrrlhU'],
                        ['type' => 'pdf', 'title' => 'HTML Cheat Sheet', 'duration' => 'PDF', 'file' => 'html-cheatsheet.pdf'],
                        ['type' => 'video', 'title' => 'CSS Selectors & Properties', 'duration' => '28:45', 'youtube_id' => 'qz0aGYrrlhU'],
                        ['type' => 'video', 'title' => 'Flexbox Layout', 'duration' => '35:20', 'youtube_id' => 'qz0aGYrrlhU'],
                        ['type' => 'pdf', 'title' => 'CSS Flexbox Guide', 'duration' => 'PDF', 'file' => 'flexbox-guide.pdf']
                    ]
                ],
                [
                    'title' => 'JavaScript Essentials',
                    'description' => 'Kuasai JavaScript dari dasar hingga advanced dengan ES6+, DOM manipulation, dan async programming.',
                    'category' => '💻 Frontend',
                    'duration' => '15 jam',
                    'lessons' => '18 Video',
                    'level' => 'Intermediate',
                    'progress' => 85,
                    'image' => '1551434678',
                    'lessons_list' => [
                        ['type' => 'video', 'title' => 'JavaScript Fundamentals', 'duration' => '25:10', 'youtube_id' => 'W6NZfCO5SIk'],
                        ['type' => 'video', 'title' => 'Variables & Data Types', 'duration' => '18:30', 'youtube_id' => 'W6NZfCO5SIk'],
                        ['type' => 'video', 'title' => 'Functions & Scope', 'duration' => '32:45', 'youtube_id' => 'W6NZfCO5SIk'],
                        ['type' => 'pdf', 'title' => 'JavaScript Reference', 'duration' => 'PDF', 'file' => 'javascript-reference.pdf'],
                        ['type' => 'video', 'title' => 'ES6+ Features', 'duration' => '40:15', 'youtube_id' => 'W6NZfCO5SIk'],
                        ['type' => 'video', 'title' => 'DOM Manipulation', 'duration' => '35:20', 'youtube_id' => 'W6NZfCO5SIk']
                    ]
                ],
                [
                    'title' => 'React.js Development',
                    'description' => 'Belajar React.js untuk membangun aplikasi web modern dengan component-based architecture.',
                    'category' => '💻 Frontend',
                    'duration' => '20 jam',
                    'lessons' => '25 Video',
                    'level' => 'Intermediate',
                    'progress' => 60,
                    'image' => '1559056199',
                    'lessons_list' => [
                        ['type' => 'video', 'title' => 'React Introduction', 'duration' => '20:30', 'youtube_id' => 'DLX62G4lc44'],
                        ['type' => 'video', 'title' => 'Components & JSX', 'duration' => '28:15', 'youtube_id' => 'DLX62G4lc44'],
                        ['type' => 'pdf', 'title' => 'React Quick Start', 'duration' => 'PDF', 'file' => 'react-quickstart.pdf'],
                        ['type' => 'video', 'title' => 'State & Props', 'duration' => '35:45', 'youtube_id' => 'DLX62G4lc44'],
                        ['type' => 'video', 'title' => 'Hooks & Lifecycle', 'duration' => '42:20', 'youtube_id' => 'DLX62G4lc44'],
                        ['type' => 'video', 'title' => 'Event Handling', 'duration' => '25:10', 'youtube_id' => 'DLX62G4lc44']
                    ]
                ],
                [
                    'title' => 'Node.js & Express',
                    'description' => 'Pelajari backend development dengan Node.js dan Express untuk membangun RESTful API.',
                    'category' => '⚙️ Backend',
                    'duration' => '18 jam',
                    'lessons' => '22 Video',
                    'level' => 'Advanced',
                    'progress' => 30,
                    'image' => '1552664688',
                    'lessons_list' => [
                        ['type' => 'video', 'title' => 'Node.js Introduction', 'duration' => '22:30', 'youtube_id' => 'fBNz5xF-Kx4'],
                        ['type' => 'video', 'title' => 'NPM & Package Management', 'duration' => '18:45', 'youtube_id' => 'fBNz5xF-Kx4'],
                        ['type' => 'pdf', 'title' => 'Node.js Best Practices', 'duration' => 'PDF', 'file' => 'nodejs-best-practices.pdf'],
                        ['type' => 'video', 'title' => 'Express.js Setup', 'duration' => '25:20', 'youtube_id' => 'fBNz5xF-Kx4'],
                        ['type' => 'video', 'title' => 'RESTful API Design', 'duration' => '38:15', 'youtube_id' => 'fBNz5xF-Kx4'],
                        ['type' => 'video', 'title' => 'Middleware & Authentication', 'duration' => '32:40', 'youtube_id' => 'fBNz5xF-Kx4']
                    ]
                ],
                [
                    'title' => 'Database & MongoDB',
                    'description' => 'Kuasai database design dan implementasi dengan MongoDB untuk aplikasi web modern.',
                    'category' => '🗄️ Database',
                    'duration' => '12 jam',
                    'lessons' => '15 Video',
                    'level' => 'Intermediate',
                    'progress' => 0,
                    'image' => '1504384308',
                    'lessons_list' => [
                        ['type' => 'video', 'title' => 'MongoDB Introduction', 'duration' => '20:15', 'youtube_id' => 'rPq7fBo5JVs'],
                        ['type' => 'video', 'title' => 'Database Design', 'duration' => '28:30', 'youtube_id' => 'rPq7fBo5JVs'],
                        ['type' => 'pdf', 'title' => 'MongoDB Cheat Sheet', 'duration' => 'PDF', 'file' => 'mongodb-cheatsheet.pdf'],
                        ['type' => 'video', 'title' => 'CRUD Operations', 'duration' => '35:20', 'youtube_id' => 'rPq7fBo5JVs'],
                        ['type' => 'video', 'title' => 'Mongoose ODM', 'duration' => '30:45', 'youtube_id' => 'rPq7fBo5JVs'],
                        ['type' => 'video', 'title' => 'Data Validation', 'duration' => '25:10', 'youtube_id' => 'rPq7fBo5JVs']
                    ]
                ],
                [
                    'title' => 'Full-Stack Project',
                    'description' => 'Implementasikan semua yang dipelajari dalam project full-stack yang komprehensif.',
                    'category' => '🚀 Advanced',
                    'duration' => '25 jam',
                    'lessons' => '30 Video',
                    'level' => 'Expert',
                    'progress' => 0,
                    'image' => '1498050108',
                    'lessons_list' => [
                        ['type' => 'video', 'title' => 'Project Planning', 'duration' => '25:30', 'youtube_id' => '7nafaH9SddU'],
                        ['type' => 'video', 'title' => 'Frontend Setup', 'duration' => '32:15', 'youtube_id' => '7nafaH9SddU'],
                        ['type' => 'pdf', 'title' => 'Project Requirements', 'duration' => 'PDF', 'file' => 'project-requirements.pdf'],
                        ['type' => 'video', 'title' => 'Backend API Development', 'duration' => '45:20', 'youtube_id' => '7nafaH9SddU'],
                        ['type' => 'video', 'title' => 'Database Integration', 'duration' => '38:45', 'youtube_id' => '7nafaH9SddU'],
                        ['type' => 'video', 'title' => 'Deployment & Testing', 'duration' => '42:30', 'youtube_id' => '7nafaH9SddU']
                    ]
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

                    <!-- Lessons Preview -->
                    <div class="mb-6">
                        <h4 class="font-bold text-gray-900 mb-3">Materi Pembelajaran:</h4>
                        <div class="space-y-2">
                            @foreach(array_slice($module['lessons_list'], 0, 3) as $lesson)
                            <div class="flex items-center gap-3 p-2 bg-gray-50 rounded-lg">
                                @if($lesson['type'] === 'video')
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                                @else
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                    </svg>
                                </div>
                                @endif
                                <div class="flex-1">
                                    <div class="text-sm font-medium text-gray-900">{{ $lesson['title'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $lesson['duration'] }}</div>
                                </div>
                            </div>
                            @endforeach
                            @if(count($module['lessons_list']) > 3)
                            <div class="text-sm text-indigo-600 font-medium text-center py-2">
                                +{{ count($module['lessons_list']) - 3 }} materi lainnya
                            </div>
                            @endif
                        </div>
                    </div>

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

                        <button onclick="openModule({{ $index + 1 }})" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-bold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center gap-2">
                            <span>{{ $module['progress'] > 0 ? 'Lanjutkan' : 'Mulai' }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </button>
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

<!-- Learning Modal -->
<div id="learningModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl max-w-6xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 id="modalTitle" class="text-2xl font-bold">HTML & CSS Fundamentals</h2>
                        <p id="modalSubtitle" class="text-indigo-100 mt-1">Modul 1 - 6 Materi</p>
                    </div>
                    <button onclick="closeModal()" class="text-white hover:text-gray-200 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                    </button>
                </div>
                    </div>

            <div class="flex h-[calc(90vh-120px)]">
                <!-- Sidebar - Lessons List -->
                <div class="w-1/3 bg-gray-50 border-r border-gray-200 overflow-y-auto">
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 mb-4">Daftar Materi</h3>
                        <div id="lessonsList" class="space-y-2">
                            <!-- Lessons will be populated by JavaScript -->
                    </div>
                </div>
            </div>

                <!-- Main Content Area -->
                <div class="flex-1 flex flex-col">
                    <!-- Video/Content Area -->
                    <div class="flex-1 bg-black">
                        <div id="contentArea" class="w-full h-full flex items-center justify-center">
                            <!-- Content will be loaded here -->
                        </div>
        </div>

                    <!-- Lesson Info -->
                    <div class="bg-white border-t border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 id="currentLessonTitle" class="text-xl font-bold text-gray-900">Pilih materi untuk memulai</h4>
                                <p id="currentLessonDuration" class="text-gray-600 mt-1">Durasi akan ditampilkan di sini</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <button id="prevBtn" onclick="previousLesson()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </button>
                                <button id="nextBtn" onclick="nextLesson()" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all">
                                    Selanjutnya
                                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
// Global variables for learning modal
let currentModule = null;
let currentLessonIndex = 0;
let currentLessons = [];

// Module data (same as PHP array)
const modulesData = [
    {
        title: 'HTML & CSS Fundamentals',
        description: 'Pelajari dasar-dasar HTML dan CSS untuk membangun struktur dan styling website yang responsive.',
        category: '🎯 Fundamental',
        duration: '8 jam',
        lessons: '12 Video',
        level: 'Beginner',
        progress: 100,
        lessons_list: [
            {type: 'video', title: 'Pengenalan HTML', duration: '15:30', youtube_id: 'qz0aGYrrlhU'},
            {type: 'video', title: 'Struktur HTML Document', duration: '22:15', youtube_id: 'qz0aGYrrlhU'},
            {type: 'pdf', title: 'HTML Cheat Sheet', duration: 'PDF', file: 'html-cheatsheet.pdf'},
            {type: 'video', title: 'CSS Selectors & Properties', duration: '28:45', youtube_id: 'qz0aGYrrlhU'},
            {type: 'video', title: 'Flexbox Layout', duration: '35:20', youtube_id: 'qz0aGYrrlhU'},
            {type: 'pdf', title: 'CSS Flexbox Guide', duration: 'PDF', file: 'flexbox-guide.pdf'}
        ]
    },
    {
        title: 'JavaScript Essentials',
        description: 'Kuasai JavaScript dari dasar hingga advanced dengan ES6+, DOM manipulation, dan async programming.',
        category: '💻 Frontend',
        duration: '15 jam',
        lessons: '18 Video',
        level: 'Intermediate',
        progress: 85,
        lessons_list: [
            {type: 'video', title: 'JavaScript Fundamentals', duration: '25:10', youtube_id: 'W6NZfCO5SIk'},
            {type: 'video', title: 'Variables & Data Types', duration: '18:30', youtube_id: 'W6NZfCO5SIk'},
            {type: 'video', title: 'Functions & Scope', duration: '32:45', youtube_id: 'W6NZfCO5SIk'},
            {type: 'pdf', title: 'JavaScript Reference', duration: 'PDF', file: 'javascript-reference.pdf'},
            {type: 'video', title: 'ES6+ Features', duration: '40:15', youtube_id: 'W6NZfCO5SIk'},
            {type: 'video', title: 'DOM Manipulation', duration: '35:20', youtube_id: 'W6NZfCO5SIk'}
        ]
    },
    {
        title: 'React.js Development',
        description: 'Belajar React.js untuk membangun aplikasi web modern dengan component-based architecture.',
        category: '💻 Frontend',
        duration: '20 jam',
        lessons: '25 Video',
        level: 'Intermediate',
        progress: 60,
        lessons_list: [
            {type: 'video', title: 'React Introduction', duration: '20:30', youtube_id: 'DLX62G4lc44'},
            {type: 'video', title: 'Components & JSX', duration: '28:15', youtube_id: 'DLX62G4lc44'},
            {type: 'pdf', title: 'React Quick Start', duration: 'PDF', file: 'react-quickstart.pdf'},
            {type: 'video', title: 'State & Props', duration: '35:45', youtube_id: 'DLX62G4lc44'},
            {type: 'video', title: 'Hooks & Lifecycle', duration: '42:20', youtube_id: 'DLX62G4lc44'},
            {type: 'video', title: 'Event Handling', duration: '25:10', youtube_id: 'DLX62G4lc44'}
        ]
    },
    {
        title: 'Node.js & Express',
        description: 'Pelajari backend development dengan Node.js dan Express untuk membangun RESTful API.',
        category: '⚙️ Backend',
        duration: '18 jam',
        lessons: '22 Video',
        level: 'Advanced',
        progress: 30,
        lessons_list: [
            {type: 'video', title: 'Node.js Introduction', duration: '22:30', youtube_id: 'fBNz5xF-Kx4'},
            {type: 'video', title: 'NPM & Package Management', duration: '18:45', youtube_id: 'fBNz5xF-Kx4'},
            {type: 'pdf', title: 'Node.js Best Practices', duration: 'PDF', file: 'nodejs-best-practices.pdf'},
            {type: 'video', title: 'Express.js Setup', duration: '25:20', youtube_id: 'fBNz5xF-Kx4'},
            {type: 'video', title: 'RESTful API Design', duration: '38:15', youtube_id: 'fBNz5xF-Kx4'},
            {type: 'video', title: 'Middleware & Authentication', duration: '32:40', youtube_id: 'fBNz5xF-Kx4'}
        ]
    },
    {
        title: 'Database & MongoDB',
        description: 'Kuasai database design dan implementasi dengan MongoDB untuk aplikasi web modern.',
        category: '🗄️ Database',
        duration: '12 jam',
        lessons: '15 Video',
        level: 'Intermediate',
        progress: 0,
        lessons_list: [
            {type: 'video', title: 'MongoDB Introduction', duration: '20:15', youtube_id: 'rPq7fBo5JVs'},
            {type: 'video', title: 'Database Design', duration: '28:30', youtube_id: 'rPq7fBo5JVs'},
            {type: 'pdf', title: 'MongoDB Cheat Sheet', duration: 'PDF', file: 'mongodb-cheatsheet.pdf'},
            {type: 'video', title: 'CRUD Operations', duration: '35:20', youtube_id: 'rPq7fBo5JVs'},
            {type: 'video', title: 'Mongoose ODM', duration: '30:45', youtube_id: 'rPq7fBo5JVs'},
            {type: 'video', title: 'Data Validation', duration: '25:10', youtube_id: 'rPq7fBo5JVs'}
        ]
    },
    {
        title: 'Full-Stack Project',
        description: 'Implementasikan semua yang dipelajari dalam project full-stack yang komprehensif.',
        category: '🚀 Advanced',
        duration: '25 jam',
        lessons: '30 Video',
        level: 'Expert',
        progress: 0,
        lessons_list: [
            {type: 'video', title: 'Project Planning', duration: '25:30', youtube_id: '7nafaH9SddU'},
            {type: 'video', title: 'Frontend Setup', duration: '32:15', youtube_id: '7nafaH9SddU'},
            {type: 'pdf', title: 'Project Requirements', duration: 'PDF', file: 'project-requirements.pdf'},
            {type: 'video', title: 'Backend API Development', duration: '45:20', youtube_id: '7nafaH9SddU'},
            {type: 'video', title: 'Database Integration', duration: '38:45', youtube_id: '7nafaH9SddU'},
            {type: 'video', title: 'Deployment & Testing', duration: '42:30', youtube_id: '7nafaH9SddU'}
        ]
    }
];

// Open module function
function openModule(moduleIndex) {
    currentModule = modulesData[moduleIndex - 1];
    currentLessons = currentModule.lessons_list;
    currentLessonIndex = 0;

    // Update modal title
    document.getElementById('modalTitle').textContent = currentModule.title;
    document.getElementById('modalSubtitle').textContent = `Modul ${moduleIndex} - ${currentLessons.length} Materi`;

    // Populate lessons list
    populateLessonsList();

    // Show modal
    document.getElementById('learningModal').classList.remove('hidden');

    // Load first lesson
    loadLesson(0);
}

// Close modal function
function closeModal() {
    document.getElementById('learningModal').classList.add('hidden');
}

// Populate lessons list in sidebar
function populateLessonsList() {
    const lessonsList = document.getElementById('lessonsList');
    lessonsList.innerHTML = '';

    currentLessons.forEach((lesson, index) => {
        const lessonItem = document.createElement('div');
        lessonItem.className = `flex items-center gap-3 p-3 rounded-lg cursor-pointer transition-colors ${index === currentLessonIndex ? 'bg-indigo-100 border border-indigo-200' : 'hover:bg-gray-100'}`;
        lessonItem.onclick = () => loadLesson(index);

        const icon = lesson.type === 'video'
            ? '<div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>'
            : '<div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/></svg></div>';

        lessonItem.innerHTML = `
            ${icon}
            <div class="flex-1">
                <div class="text-sm font-medium text-gray-900">${lesson.title}</div>
                <div class="text-xs text-gray-500">${lesson.duration}</div>
            </div>
            ${index === currentLessonIndex ? '<div class="w-2 h-2 bg-indigo-600 rounded-full"></div>' : ''}
        `;

        lessonsList.appendChild(lessonItem);
    });
}

// Load lesson content
function loadLesson(index) {
    currentLessonIndex = index;
    const lesson = currentLessons[index];
    const contentArea = document.getElementById('contentArea');

    // Update lesson info
    document.getElementById('currentLessonTitle').textContent = lesson.title;
    document.getElementById('currentLessonDuration').textContent = lesson.duration;

    // Update navigation buttons
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    prevBtn.disabled = index === 0;
    nextBtn.disabled = index === currentLessons.length - 1;

    // Load content based on type
    if (lesson.type === 'video') {
        contentArea.innerHTML = `
            <div class="w-full h-full">
                <iframe
                    src="https://www.youtube.com/embed/${lesson.youtube_id}?autoplay=1&rel=0"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="w-full h-full">
                </iframe>
            </div>
        `;
    } else if (lesson.type === 'pdf') {
        contentArea.innerHTML = `
            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                <div class="text-center">
                    <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">${lesson.title}</h3>
                    <p class="text-gray-600 mb-4">File PDF akan ditampilkan di sini</p>
                    <button class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Download PDF
                    </button>
                </div>
            </div>
        `;
    }

    // Update lessons list UI
    populateLessonsList();
}

// Navigation functions
function previousLesson() {
    if (currentLessonIndex > 0) {
        loadLesson(currentLessonIndex - 1);
    }
}

function nextLesson() {
    if (currentLessonIndex < currentLessons.length - 1) {
        loadLesson(currentLessonIndex + 1);
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (document.getElementById('learningModal').classList.contains('hidden')) return;

    if (e.key === 'ArrowLeft') {
        previousLesson();
    } else if (e.key === 'ArrowRight') {
        nextLesson();
    } else if (e.key === 'Escape') {
        closeModal();
    }
});

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
