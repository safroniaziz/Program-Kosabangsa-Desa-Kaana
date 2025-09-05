@extends('layouts.app')

@section('title', 'Beranda - Desa Kaana')

@section('content')
<!-- Hero Section - Ultra Modern Design like LMS -->
<section class="relative min-h-screen overflow-hidden">
    <!-- Dynamic gradient background matching LMS -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-indigo-900 to-purple-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-600/10 via-purple-600/10 to-pink-600/10"></div>
    </div>

    <!-- Enhanced floating elements with electric effects -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-element absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-indigo-400/30 to-purple-600/30 rounded-full blur-2xl animate-float" data-aos="zoom-in" data-aos-delay="1000"></div>
        <div class="floating-element absolute bottom-32 left-1/4 w-40 h-40 bg-gradient-to-br from-blue-400/20 to-cyan-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -3s;" data-aos="zoom-in" data-aos-delay="1200"></div>
        <div class="floating-element absolute top-1/2 right-1/3 w-48 h-48 bg-gradient-to-br from-purple-400/20 to-pink-600/20 rounded-full blur-2xl animate-float" style="animation-delay: -5s;" data-aos="zoom-in" data-aos-delay="1400"></div>

        <!-- Electric bolt effect -->
        <div class="absolute top-1/3 left-1/4 w-24 h-24 animate-electric-glow">
            <div class="w-full h-full bg-gradient-to-br from-cyan-400/40 to-blue-600/40 rounded-lg blur-xl transform rotate-45"></div>
        </div>
    </div>

    <!-- Grid pattern overlay -->
    <div class="absolute inset-0 opacity-10">
        <div class="w-full h-full" style="background-image: radial-gradient(circle at 20% 80%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 30px 30px;"></div>
    </div>

    <!-- Subtle overlay -->
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 min-h-screen flex items-center max-w-7xl">
        <div class="mx-auto w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left content with stunning animations -->
                <div class="space-y-8">
                    <!-- Badge with pulse effect -->
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full text-white border border-white/20">
                            <div class="w-3 h-3 bg-gradient-to-r from-green-400 to-blue-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-semibold">Portal Digital • Transformasi Desa Modern</span>
                        </div>
                    </div>

                    <!-- Main heading with gradient -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <h1 class="text-5xl lg:text-7xl font-black text-white mb-6 leading-tight">
                            Desa Digital
                            <span class="block bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 bg-clip-text text-transparent animate-pulse font-black" style="animation-duration: 2s;">
                                Kaana Modern
                            </span>
                        </h1>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="300">
                        <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                            Platform terintegrasi dengan <span class="text-cyan-400 font-semibold">teknologi AI</span>,
                            <span class="text-blue-400 font-semibold">data analytics</span>, dan
                            <span class="text-purple-400 font-semibold">smart solutions</span> untuk desa masa depan.
                        </p>
                    </div>

                    <!-- Stats with modern design -->
                    <div data-aos="fade-up" data-aos-delay="400">
                        <div class="grid grid-cols-3 gap-8 mb-8">
                            <div class="text-center glass border border-white/20 rounded-2xl p-4 hover:scale-105 transition-transform">
                                <div class="text-3xl font-bold text-cyan-400 mb-2" data-counter="1250">0</div>
                                <div class="text-sm text-gray-300">Penduduk</div>
                            </div>
                            <div class="text-center glass border border-white/20 rounded-2xl p-4 hover:scale-105 transition-transform">
                                <div class="text-3xl font-bold text-blue-400 mb-2" data-counter="25">0</div>
                                <div class="text-sm text-gray-300">UMKM Digital</div>
                            </div>
                            <div class="text-center glass border border-white/20 rounded-2xl p-4 hover:scale-105 transition-transform">
                                <div class="text-3xl font-bold text-purple-400 mb-2" data-counter="15">0</div>
                                <div class="text-sm text-gray-300">Smart Services</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA buttons with electric effects -->
                    <div data-aos="fade-up" data-aos-delay="500">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#features" class="group relative btn-primary text-white px-8 py-4 rounded-xl font-bold text-lg overflow-hidden animate-electric-glow">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform animate-electric-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    Explore Platform
                                </span>
                            </a>
                            <a href="#about" class="group glass border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/10 transition-all animate-bulb-glow">
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform animate-bulb-flicker" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                    Discover More
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right content - Interactive Dashboard Preview -->
                <div data-aos="fade-left" data-aos-delay="600">
                    <div class="relative">
                        <!-- Main preview card -->
                        <div class="glass border border-white/20 rounded-3xl overflow-hidden backdrop-blur-xl shadow-2xl animate-float">
                            <!-- Dashboard header -->
                            <div class="bg-gradient-to-r from-indigo-600/80 to-purple-600/80 p-6 border-b border-white/10">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-white text-lg">Smart Village Dashboard</h3>
                                        <p class="text-indigo-100 mt-1">Real-time Analytics</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                        <span class="text-sm font-medium text-white">Live</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Dashboard content -->
                            <div class="p-6 bg-white/5">
                                <!-- Mini charts grid -->
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="glass rounded-xl p-4 border border-white/10">
                                        <div class="text-xs text-gray-300 mb-2">Population Growth</div>
                                        <div class="flex items-end gap-1 h-12">
                                            <div class="flex-1 bg-gradient-to-t from-cyan-500 to-cyan-400 rounded-t animate-grow-bar" style="height: 40%; animation-delay: 0.1s;"></div>
                                            <div class="flex-1 bg-gradient-to-t from-cyan-500 to-cyan-400 rounded-t animate-grow-bar" style="height: 60%; animation-delay: 0.2s;"></div>
                                            <div class="flex-1 bg-gradient-to-t from-cyan-500 to-cyan-400 rounded-t animate-grow-bar" style="height: 80%; animation-delay: 0.3s;"></div>
                                            <div class="flex-1 bg-gradient-to-t from-cyan-500 to-cyan-400 rounded-t animate-grow-bar" style="height: 70%; animation-delay: 0.4s;"></div>
                                            <div class="flex-1 bg-gradient-to-t from-purple-500 to-purple-400 rounded-t animate-grow-bar" style="height: 90%; animation-delay: 0.5s;"></div>
                                        </div>
                                        <div class="text-lg font-bold text-white mt-2">+12.5%</div>
                                    </div>

                                    <div class="glass rounded-xl p-4 border border-white/10">
                                        <div class="text-xs text-gray-300 mb-2">Digital Services</div>
                                        <div class="relative w-full h-12">
                                            <svg viewBox="0 0 36 36" class="w-full h-full">
                                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                      fill="none" stroke="#334155" stroke-width="2"/>
                                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                      fill="none" stroke="url(#gradient)" stroke-width="2"
                                                      stroke-dasharray="75, 100"/>
                                                <defs>
                                                    <linearGradient id="gradient">
                                                        <stop offset="0%" stop-color="#06b6d4"/>
                                                        <stop offset="100%" stop-color="#8b5cf6"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <span class="text-lg font-bold text-white">75%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Service status list -->
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3 p-3 glass rounded-lg border border-white/10">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">E-Government Active</div>
                                            <div class="text-xs text-gray-300">324 transactions today</div>
                                        </div>
                                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    </div>

                                    <div class="flex items-center gap-3 p-3 glass rounded-lg border border-white/10">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">LMS Platform</div>
                                            <div class="text-xs text-gray-300">156 active learners</div>
                                        </div>
                                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    </div>

                                    <div class="flex items-center gap-3 p-3 glass rounded-lg border border-white/10">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-white">Data Analytics</div>
                                            <div class="text-xs text-gray-300">Real-time monitoring</div>
                                        </div>
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
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
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-fadeInUp">
        <div class="flex flex-col items-center text-white/70">
            <span class="text-sm mb-2">Scroll untuk melanjutkan</span>
            <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

<!-- About Section with Modern Cards -->
<section id="about" class="py-20 bg-white relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-100/40 to-purple-200/40 rounded-full blur-2xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-gradient-to-br from-pink-100/40 to-orange-200/40 rounded-full blur-2xl animate-float" style="animation-delay: -2s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-7xl">
        <div class="mx-auto text-center mb-16">
            <div data-aos="fade-up">
                <div class="inline-block mb-4">
                    <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 tracking-wider uppercase animate-shimmer">Tentang Kami</span>
                </div>
                <h2 data-aos="fade-right" data-aos-delay="100" class="text-4xl lg:text-5xl font-black text-slate-900 mb-6">
                    Transformasi Digital
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Desa Kaana</span>
                </h2>
                <p data-aos="fade-left" data-aos-delay="200" class="text-xl text-slate-600 leading-relaxed max-w-3xl mx-auto">
                    Membangun ekosistem digital yang terintegrasi untuk meningkatkan kualitas hidup masyarakat
                    dan mewujudkan <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">smart village</span> yang berkelanjutan
                </p>
            </div>
        </div>

        <!-- Stats Grid with Modern Design -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            @php
            $stats = [
                ['number' => '1,250', 'label' => 'Total Penduduk', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'gradient' => 'from-blue-500 to-cyan-600', 'delay' => 100],
                ['number' => '25', 'label' => 'UMKM Digital', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'gradient' => 'from-green-500 to-emerald-600', 'delay' => 200],
                ['number' => '15', 'label' => 'Layanan Digital', 'icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z', 'gradient' => 'from-purple-500 to-pink-600', 'delay' => 300],
                ['number' => '5', 'label' => 'Smart Solutions', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'gradient' => 'from-orange-500 to-red-600', 'delay' => 400]
            ];
            @endphp

            @foreach($stats as $stat)
            <div class="group" data-aos="zoom-in" data-aos-delay="{{ $stat['delay'] }}">
                <div class="bg-white border border-slate-200 rounded-xl p-6 h-full transition-all duration-500 hover:border-blue-300 hover:shadow-2xl hover:bg-gradient-to-br hover:from-white hover:to-blue-50 interactive-card transform hover:-translate-y-2 hover:scale-105 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br {{ $stat['gradient'] }} opacity-0 transition-opacity duration-300 group-hover:opacity-5"></div>

                    <div class="relative z-10">
                        <div class="bg-gradient-to-br {{ $stat['gradient'] }} w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                            </svg>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-black text-slate-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:{{ $stat['gradient'] }} transition-all duration-300">{{ $stat['number'] }}</div>
                            <div class="text-slate-600 font-medium">{{ $stat['label'] }}</div>
                        </div>
                    </div>

                    <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section with Spectacular Design -->
<section id="features" class="py-20 relative overflow-hidden">
    <!-- Dynamic background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50">
        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/50 to-transparent"></div>
    </div>

    <!-- Floating background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200/30 to-purple-300/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-pink-200/30 to-orange-300/30 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-7xl">
        <!-- Section header -->
        <div class="mx-auto text-center mb-20">
            <div data-aos="fade-up">
                <div class="inline-block mb-6">
                    <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 tracking-wider uppercase">Platform Digital</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-black mb-8" data-aos="zoom-in" data-aos-delay="200">
                    <span class="text-slate-900">Layanan</span>
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-blue-600 to-cyan-500 shimmer">
                        Unggulan Kami
                    </span>
                </h2>
                <p class="text-xl lg:text-2xl text-slate-600 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="400">
                    <span class="text-gradient font-bold">3 platform</span> utama yang dirancang untuk
                    <span class="text-gradient-2 font-bold">transformasi digital</span> menuju
                    <span class="text-gradient-3 font-bold">smart village</span>
                </p>
            </div>
        </div>

        <!-- Features Grid with Stunning Cards -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Assessment Card -->
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <!-- Card header with gradient -->
                    <div class="relative bg-gradient-to-br from-blue-500 to-indigo-600 p-6 text-white overflow-hidden">
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 border border-white/30">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Assessment Konseling</h3>
                            <p class="text-white/90 text-sm">Evaluasi kesiapan mental untuk tanggap bencana</p>
                        </div>
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    </div>

                    <!-- Card content -->
                    <div class="p-6">
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Mental Health Check</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Disaster Preparedness</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Personal Guidance</span>
                            </div>
                        </div>

                        <a href="{{ route('assessment') }}" class="group relative btn-primary text-white px-6 py-3 rounded-xl font-semibold w-full text-center block overflow-hidden transition-all duration-300 hover:shadow-xl">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Mulai Assessment
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- LMS Card -->
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <!-- Card header with gradient -->
                    <div class="relative bg-gradient-to-br from-green-500 to-emerald-600 p-6 text-white overflow-hidden">
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 border border-white/30">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Learning Management</h3>
                            <p class="text-white/90 text-sm">Platform pembelajaran online terlengkap</p>
                        </div>
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    </div>

                    <!-- Card content -->
                    <div class="p-6">
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">24 Learning Modules</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">180+ Materials</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Certificate Available</span>
                            </div>
                        </div>

                        <a href="{{ route('lms') }}" class="group relative bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-xl font-semibold w-full text-center block overflow-hidden transition-all duration-300 hover:shadow-xl">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Akses Pembelajaran
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mapping Card -->
            <div class="group" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <!-- Card header with gradient -->
                    <div class="relative bg-gradient-to-br from-purple-500 to-pink-600 p-6 text-white overflow-hidden">
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 border border-white/30">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Pemetaan Potensi</h3>
                            <p class="text-white/90 text-sm">Dashboard analytics & infografik real-time</p>
                        </div>
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    </div>

                    <!-- Card content -->
                    <div class="p-6">
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Real-time Data</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Interactive Charts</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-sm text-slate-600">Smart Analytics</span>
                            </div>
                        </div>

                        <a href="{{ route('mapping') }}" class="group relative bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold w-full text-center block overflow-hidden transition-all duration-300 hover:shadow-xl">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Lihat Dashboard
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to action -->
        <div class="text-center mt-20" data-aos="fade-up" data-aos-delay="400">
            <div class="glass border border-white/20 rounded-2xl p-8 max-w-2xl mx-auto hover:shadow-2xl transition-all duration-300 group">
                <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-blue-700 transition-colors duration-300">
                    Siap Bergabung dengan Transformasi Digital?
                </h3>
                <p class="text-slate-600 mb-6">
                    Mulai perjalanan Anda menuju smart village dengan platform terintegrasi kami.
                </p>
                <button class="btn-primary text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all group-hover:scale-105 animate-electric-glow">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 animate-electric-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Get Started Now
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Additional CSS for animations -->
<style>
@keyframes electric-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.5), 0 0 40px rgba(139, 92, 246, 0.3); }
    50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.7), 0 0 60px rgba(139, 92, 246, 0.5); }
}

@keyframes electric-bolt {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-5deg); }
    75% { transform: rotate(5deg); }
}

@keyframes bulb-glow {
    0%, 100% { opacity: 0.8; }
    50% { opacity: 1; }
}

@keyframes bulb-flicker {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

@keyframes grow-bar {
    from { height: 0; }
    to { height: inherit; }
}

@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

@keyframes gradient-shift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.animate-electric-glow {
    animation: electric-glow 2s ease-in-out infinite;
}

.animate-electric-bolt {
    animation: electric-bolt 1s ease-in-out infinite;
}

.animate-bulb-glow {
    animation: bulb-glow 3s ease-in-out infinite;
}

.animate-bulb-flicker {
    animation: bulb-flicker 2s ease-in-out infinite;
}

.animate-grow-bar {
    animation: grow-bar 1s ease-out forwards;
    animation-play-state: paused;
}

.animate-shimmer {
    background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
    background-size: 1000px 100%;
    animation: shimmer 3s infinite linear;
    -webkit-background-clip: text;
    background-clip: text;
}

/* Fallback untuk browser yang tidak support background-clip */
@supports not (-webkit-background-clip: text) {
    .animate-shimmer {
        color: #60a5fa; /* fallback blue color */
    }
}

.glass {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.gradient-bg-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.gradient-bg-2 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
.gradient-bg-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
.gradient-bg-4 { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
.gradient-bg-5 { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }

.text-gradient {
    background: linear-gradient(to right, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.text-gradient-2 {
    background: linear-gradient(to right, #10b981, #3b82f6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.text-gradient-3 {
    background: linear-gradient(to right, #8b5cf6, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
@endsection

@section('scripts')
<script>
// Counter animation
function animateValue(element, start, end, duration) {
    const range = end - start;
    const increment = end > start ? 1 : -1;
    const stepTime = Math.abs(Math.floor(duration / range));
    let current = start;

    const timer = setInterval(function() {
        current += increment;
        element.textContent = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}

// Animate statistics on scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.hasAttribute('data-animated')) {
            const target = entry.target;
            const endValue = parseInt(target.textContent);
            animateValue(target, 0, endValue, 2000);
            target.setAttribute('data-animated', 'true');
        }
    });
});

// Observe all statistics
document.querySelectorAll('.text-3xl.font-bold').forEach(stat => {
    observer.observe(stat);
});

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation
    function animateCounter(element, target) {
        const duration = 2000;
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 16);
    }

    // Animate counters when in viewport
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.hasAttribute('data-animated')) {
                const target = parseInt(entry.target.getAttribute('data-counter'));
                animateCounter(entry.target, target);
                entry.target.setAttribute('data-animated', 'true');
            }
        });
    }, observerOptions);

    document.querySelectorAll('[data-counter]').forEach(element => {
        observer.observe(element);
    });

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    }
});
</script>
@endsection
