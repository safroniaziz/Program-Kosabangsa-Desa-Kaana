@extends('layouts.app')

@section('title', 'Full-Stack Web Development Course')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    
    * {
        font-family: 'Inter', sans-serif;
    }

    /* Stunning background gradients */
    .gradient-bg-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .gradient-bg-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .gradient-bg-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .gradient-bg-4 {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .gradient-bg-5 {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .gradient-bg-6 {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    }

    /* Advanced animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes glow {
        0%, 100% {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }
        50% {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.6);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotateY(-90deg);
        }
        to {
            opacity: 1;
            transform: rotateY(0deg);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 1s ease-out forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 1s ease-out forwards;
    }

    .animate-slideInRight {
        animation: slideInRight 1s ease-out forwards;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }

    .animate-scaleIn {
        animation: scaleIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }

    .animate-rotateIn {
        animation: rotateIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }

    /* Shimmer effect */
    .shimmer {
        background: linear-gradient(
            90deg,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.2) 20%,
            rgba(255, 255, 255, 0.5) 60%,
            rgba(255, 255, 255, 0)
        );
        background-size: 200% auto;
        animation: shimmer 2s linear infinite;
    }

    /* Custom scrollbar with gradient */
    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        background: linear-gradient(to bottom, #f1f5f9, #e2e8f0);
        border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #6366f1, #8b5cf6, #ec4899);
        border-radius: 6px;
        border: 2px solid transparent;
        background-clip: content-box;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #4f46e5, #7c3aed, #db2777);
        background-clip: content-box;
    }

    /* Glass morphism with better effects */
    .glass {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .glass-dark {
        background: rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Advanced module card effects */
    .module-card {
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .module-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.1),
            transparent
        );
        transition: left 0.5s;
    }

    .module-card:hover::before {
        left: 100%;
    }

    .module-card:hover {
        transform: translateY(-12px) rotateX(5deg);
        box-shadow: 
            0 35px 80px -12px rgba(0, 0, 0, 0.25),
            0 0 50px rgba(99, 102, 241, 0.1);
    }

    /* Stunning button effects */
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent
        );
        transition: left 0.5s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 
            0 15px 35px rgba(99, 102, 241, 0.4),
            0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Progress animations */
    .progress-bar {
        position: relative;
        overflow: hidden;
    }

    .progress-bar::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background-image: linear-gradient(
            -45deg,
            rgba(255, 255, 255, 0.2) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, 0.2) 50%,
            rgba(255, 255, 255, 0.2) 75%,
            transparent 75%,
            transparent
        );
        background-size: 50px 50px;
        animation: move 2s linear infinite;
    }

    @keyframes move {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 50px 50px;
        }
    }

    /* Floating elements */
    .floating-element {
        position: absolute;
        opacity: 0.1;
        animation: float 8s ease-in-out infinite;
    }

    .floating-element:nth-child(2) {
        animation-delay: -2s;
    }

    .floating-element:nth-child(3) {
        animation-delay: -4s;
    }

    /* Text gradient effects */
    .text-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .text-gradient-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .text-gradient-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Interactive hover states */
    .interactive-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
    }

    .interactive-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    /* Elegant section dividers */
    .section-divider {
        background: linear-gradient(90deg, transparent 0%, #667eea 50%, transparent 100%);
        height: 2px;
        position: relative;
    }

    .section-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 12px;
        height: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
    }

    /* Parallax backgrounds */
    .parallax-bg {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('content')
<!-- Hero Section - Stunning Visual Impact -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Animated gradient background -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/20 via-purple-600/20 to-pink-600/20"></div>
    </div>

    <!-- Floating geometric shapes -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-element absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full blur-xl animate-float"></div>
        <div class="floating-element absolute top-40 right-20 w-24 h-24 bg-gradient-to-br from-pink-400 to-red-600 rounded-full blur-xl animate-float"></div>
        <div class="floating-element absolute bottom-32 left-1/4 w-40 h-40 bg-gradient-to-br from-green-400 to-blue-600 rounded-full blur-xl animate-float"></div>
        <div class="floating-element absolute top-1/3 right-1/3 w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-600 rounded-full blur-xl animate-float"></div>
    </div>

    <!-- Glass morphism overlay -->
    <div class="absolute inset-0 glass-dark"></div>

    <div class="container mx-auto px-4 relative z-10 min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto w-full">
            <!-- Main content grid -->
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left content -->
                <div class="space-y-8">
                    <!-- Course badge with glow -->
                    <div class="animate-fadeInUp" style="animation-delay: 0.1s;">
                        <div class="inline-flex items-center gap-3 glass px-6 py-3 rounded-full text-white border border-white/20 animate-glow">
                            <div class="w-3 h-3 bg-gradient-to-r from-green-400 to-blue-500 rounded-full animate-pulse-gentle"></div>
                            <span class="text-sm font-semibold">Kursus Terlengkap • 120+ Jam Pembelajaran</span>
                        </div>
                    </div>

                    <!-- Main heading with gradient text -->
                    <div class="animate-fadeInUp" style="animation-delay: 0.2s;">
                        <h1 class="text-6xl lg:text-7xl font-black text-white mb-6 leading-tight">
                            Full-Stack
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 shimmer">
                                Web Development
                            </span>
                        </h1>
                    </div>

                    <div class="animate-fadeInUp" style="animation-delay: 0.3s;">
                        <p class="text-xl lg:text-2xl text-gray-200 mb-8 leading-relaxed font-medium">
                            Kuasai pengembangan web modern dari <span class="text-gradient-3 font-bold">frontend</span> hingga 
                            <span class="text-gradient-2 font-bold">backend</span>. Belajar dengan pendekatan praktis 
                            menggunakan teknologi terkini.
                        </p>
                    </div>

                    <!-- Course stats with animations -->
                    <div class="animate-fadeInUp" style="animation-delay: 0.4s;">
                        <div class="grid grid-cols-3 gap-8 mb-8">
                            <div class="text-center group">
                                <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-2 group-hover:scale-110 transition-transform">24</div>
                                <div class="text-sm text-gray-300 font-medium">Modul Pembelajaran</div>
                            </div>
                            <div class="text-center group">
                                <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 mb-2 group-hover:scale-110 transition-transform">180+</div>
                                <div class="text-sm text-gray-300 font-medium">Materi Lengkap</div>
                            </div>
                            <div class="text-center group">
                                <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-cyan-500 mb-2 group-hover:scale-110 transition-transform">15</div>
                                <div class="text-sm text-gray-300 font-medium">Proyek Praktis</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA buttons with stunning effects -->
                    <div class="animate-fadeInUp" style="animation-delay: 0.5s;">
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
                <div class="animate-slideInRight" style="animation-delay: 0.6s;">
                    <div class="relative">
                        <!-- Main preview card with glass effect -->
                        <div class="glass border border-white/20 rounded-3xl overflow-hidden backdrop-blur-xl shadow-2xl animate-float">
                            <!-- Course header with gradient -->
                            <div class="bg-gradient-to-r from-indigo-600/80 to-purple-600/80 p-6 border-b border-white/10">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-lg">Full-Stack Web Development</h3>
                                        <p class="text-indigo-100 mt-1">Dari Pemula hingga Expert</p>
                                    </div>
                                    <div class="flex items-center gap-2">
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
                            <div class="p-6 bg-white/5">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm font-medium text-white">Progress Keseluruhan</span>
                                    <span class="text-sm font-bold text-white">0%</span>
                                </div>
                                <div class="w-full bg-white/10 rounded-full h-3 progress-bar">
                                    <div class="bg-gradient-to-r from-cyan-400 to-purple-500 h-3 rounded-full" style="width: 0%"></div>
                                </div>

                                <!-- Module preview with hover effects -->
                                <div class="space-y-3 mt-6">
                                    <div class="interactive-card flex items-center gap-3 p-3 glass rounded-lg border border-white/10">
                                        <div class="w-10 h-10 gradient-bg-1 rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold">1</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">HTML & CSS Fundamentals</div>
                                            <div class="text-xs text-gray-300">8 materi • 12 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-cyan-400 rounded-full bg-cyan-400/20"></div>
                                    </div>
                                    
                                    <div class="interactive-card flex items-center gap-3 p-3 glass rounded-lg border border-white/10 opacity-70">
                                        <div class="w-10 h-10 gradient-bg-2 rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold">2</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">JavaScript Essentials</div>
                                            <div class="text-xs text-gray-300">12 materi • 18 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-white/30 rounded-full"></div>
                                    </div>

                                    <div class="interactive-card flex items-center gap-3 p-3 glass rounded-lg border border-white/10 opacity-50">
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
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-6">
                Apa yang Akan Anda Pelajari?
            </h2>
            <p class="text-xl text-slate-600 leading-relaxed">
                Kursus komprehensif yang dirancang untuk membawa Anda dari pemula hingga menjadi full-stack developer yang handal
            </p>
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

            @foreach($outcomes as $outcome)
            <div class="group">
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 h-full transition-all duration-300 hover:border-blue-300 hover:shadow-lg hover:bg-white">
                    <div class="text-blue-600 mb-4 group-hover:text-blue-700 transition-colors">
                        {!! $outcome['icon'] !!}
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3">{{ $outcome['title'] }}</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $outcome['description'] }}</p>
                </div>
            </div>
            @endforeach
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
            <div class="animate-fadeInUp">
                <div class="inline-block mb-6">
                    <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 tracking-wider uppercase">Kurikulum Terbaik</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-black mb-8">
                    <span class="text-slate-900">Kurikulum</span>
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-blue-600 to-cyan-500 shimmer">
                        Pembelajaran
                    </span>
                </h2>
                <p class="text-xl lg:text-2xl text-slate-600 leading-relaxed font-medium">
                    <span class="text-gradient font-bold">24 modul</span> terstruktur dengan 
                    <span class="text-gradient-2 font-bold">180+ materi</span> pembelajaran yang akan membawa Anda 
                    menjadi <span class="text-gradient-3 font-bold">full-stack developer</span> handal
                </p>
            </div>
        </div>

        <!-- Progress overview dengan glass effect -->
        <div class="max-w-3xl mx-auto mb-20 animate-scaleIn" style="animation-delay: 0.3s;">
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

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($modules as $index => $module)
                <div class="module-card glass border border-white/20 rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl group animate-scaleIn" style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                    <!-- Card header dengan gradient background -->
                    <div class="relative {{ $module['gradient'] }} p-8 text-white overflow-hidden">
                        <!-- Background pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 30px 30px;"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="flex items-start justify-between mb-6">
                                <!-- Module number -->
                                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30 group-hover:scale-110 transition-transform">
                                    <span class="text-2xl font-black">{{ $module['number'] }}</span>
                                </div>
                                
                                <!-- Module status -->
                                @if($module['status'] === 'available')
                                <div class="flex items-center gap-2 bg-green-500/20 backdrop-blur-sm px-3 py-1 rounded-full border border-green-400/30">
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    <span class="text-xs font-bold">Tersedia</span>
                                </div>
                                @else
                                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span class="text-xs font-bold">Terkunci</span>
                                </div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <div class="text-white/80 mb-2">{!! $module['icon'] !!}</div>
                                <h3 class="text-2xl lg:text-3xl font-black mb-3 group-hover:scale-105 transition-transform origin-left">
                                    {{ $module['title'] }}
                                </h3>
                                <p class="text-white/90 leading-relaxed">{{ $module['description'] }}</p>
                            </div>

                            <div class="flex items-center gap-6 text-sm">
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

                    <!-- Card content -->
                    <div class="p-8 bg-white/70 backdrop-blur-sm">
                        <!-- Materials preview -->
                        <div class="mb-6">
                            <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <span>Preview Materi</span>
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </h4>
                            <div class="grid grid-cols-1 gap-2">
                                @foreach(array_slice($module['materials_preview'], 0, 4) as $preview)
                                <div class="flex items-center gap-3 p-2 rounded-lg bg-slate-50/80 border border-slate-200/50 hover:bg-slate-100/80 transition-colors">
                                    <div class="w-2 h-2 bg-gradient-to-r {{ $module['gradient'] }} rounded-full"></div>
                                    <span class="text-sm font-medium text-slate-700">{{ $preview }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Action section -->
                        <div class="flex items-center justify-between">
                            @if($module['status'] === 'available')
                            <div class="flex-1">
                                <button onclick="openModule({{ $module['number'] }})" class="w-full btn-primary text-white px-6 py-4 rounded-xl font-bold hover:shadow-xl transition-all group relative overflow-hidden">
                                    <span class="relative z-10 flex items-center justify-center gap-3">
                                        <span>{{ $module['progress'] > 0 ? 'Lanjutkan Belajar' : 'Mulai Pembelajaran' }}</span>
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            @else
                            <div class="flex-1 flex items-center justify-center gap-3 p-4 bg-slate-100 rounded-xl text-slate-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span class="font-medium">Selesaikan modul sebelumnya</span>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Progress bar -->
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

<!-- Learning Modal - Modern Design -->
<div id="learningModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl max-w-6xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
            <!-- Modal Header -->
            <div class="bg-slate-50 border-b border-slate-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 id="modalTitle" class="text-2xl font-bold text-slate-900">HTML & CSS Fundamentals</h2>
                        <p id="modalSubtitle" class="text-slate-600 mt-1">Modul 1 • 8 Materi</p>
                    </div>
                    <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 transition-colors p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex h-[calc(90vh-140px)]">
                <!-- Sidebar - Materials List -->
                <div class="w-1/3 bg-slate-50 border-r border-slate-200 overflow-y-auto">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-slate-900">Materi Pembelajaran</h3>
                            <div class="text-sm text-slate-500">
                                <span id="currentProgress">0/8</span>
                            </div>
                        </div>
                        
                        <!-- Progress bar -->
                        <div class="mb-6">
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div id="modalProgressBar" class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                            </div>
                        </div>

                        <div id="materialsList" class="space-y-2">
                            <!-- Materials will be populated by JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="flex-1 flex flex-col">
                    <!-- Content Display Area -->
                    <div class="flex-1 bg-slate-100 relative">
                        <div id="contentArea" class="w-full h-full flex items-center justify-center">
                            <!-- Default state -->
                            <div class="text-center">
                                <div class="w-16 h-16 bg-slate-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-700 mb-2">Pilih Materi untuk Memulai</h3>
                                <p class="text-slate-500">Klik pada salah satu materi di sidebar untuk memulai pembelajaran</p>
                            </div>
                        </div>
                    </div>

                    <!-- Material Info & Navigation -->
                    <div class="bg-white border-t border-slate-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 id="currentMaterialTitle" class="text-xl font-bold text-slate-900 mb-1">Pilih materi untuk memulai</h4>
                                <div class="flex items-center gap-4 text-sm text-slate-600">
                                    <span id="currentMaterialDuration">Durasi akan ditampilkan di sini</span>
                                    <span id="currentMaterialType" class="hidden px-2 py-1 bg-slate-100 rounded text-xs font-medium"></span>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <button id="prevBtn" onclick="previousMaterial()" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-lg font-medium hover:bg-slate-200 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </button>
                                
                                <button id="nextBtn" onclick="nextMaterial()" class="btn-primary text-white px-4 py-2 rounded-lg font-medium transition-all">
                                    Selanjutnya
                                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

// Open module function
function openModule(moduleNumber) {
    currentModule = modulesData.find(m => m.number === moduleNumber);
    if (!currentModule) return;
    
    currentMaterials = currentModule.materials_list;
    currentMaterialIndex = 0;

    // Update modal title
    document.getElementById('modalTitle').textContent = currentModule.title;
    document.getElementById('modalSubtitle').textContent = `Modul ${moduleNumber} • ${currentMaterials.length} Materi`;

    // Populate materials list
    populateMaterialsList();

    // Show modal
    document.getElementById('learningModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Load first material
    loadMaterial(0);
}

// Close modal function
function closeModal() {
    document.getElementById('learningModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
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

// Load material content
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

    // Load content based on type
    if (material.type === 'text') {
        contentArea.innerHTML = `
            <div class="w-full h-full bg-white overflow-y-auto">
                <div class="max-w-4xl mx-auto p-8">
                    <div class="prose prose-lg max-w-none">
                        <h1 class="text-3xl font-bold text-slate-900 mb-6">${material.title}</h1>
                        <div class="text-slate-700 leading-relaxed text-lg mb-8">
                            ${material.content}
                        </div>
                        
                        <!-- Additional resources -->
                        <div class="border-t pt-6 mt-8">
                            <h3 class="text-xl font-semibold text-slate-900 mb-4">Sumber Tambahan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                ${material.optional_video ? `
                                    <div class="border border-slate-200 rounded-lg p-4">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-slate-900">Video Penjelasan</h4>
                                                <p class="text-sm text-slate-600">Tonton untuk pemahaman lebih dalam</p>
                                            </div>
                                        </div>
                                        <button onclick="showVideo('${material.optional_video}')" class="w-full bg-red-50 text-red-700 py-2 px-4 rounded-lg font-medium hover:bg-red-100 transition-colors">
                                            Tonton Video
                                        </button>
                                    </div>
                                ` : ''}
                                
                                ${material.optional_file ? `
                                    <div class="border border-slate-200 rounded-lg p-4">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-slate-900">File Pendukung</h4>
                                                <p class="text-sm text-slate-600">${material.optional_file}</p>
                                            </div>
                                        </div>
                                        <button onclick="downloadFile('${material.optional_file}')" class="w-full bg-blue-50 text-blue-700 py-2 px-4 rounded-lg font-medium hover:bg-blue-100 transition-colors">
                                            Download File
                                        </button>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Update materials list UI
    populateMaterialsList();
}

// Show video in modal
function showVideo(videoUrl) {
    const contentArea = document.getElementById('contentArea');
    contentArea.innerHTML = `
        <div class="w-full h-full bg-black">
            <iframe
                src="${videoUrl}?autoplay=1&rel=0"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                class="w-full h-full">
            </iframe>
        </div>
    `;
}

// Download file function
function downloadFile(filename) {
    // Simulate file download
    alert(`Mengunduh file: ${filename}`);
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

    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all module cards for animation
    document.querySelectorAll('.module-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endsection
