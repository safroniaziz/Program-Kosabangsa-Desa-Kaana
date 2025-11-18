@extends('layouts_old.app')

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
                            <span class="block text-cyan-400 font-black animate-pulse drop-shadow-lg" style="text-shadow: 0 0 20px rgba(6, 182, 212, 0.6), 0 0 40px rgba(6, 182, 212, 0.4); animation-duration: 2s;">
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
                                <div class="text-3xl font-bold text-cyan-400 mb-2" data-counter="{{ $totalPenduduk ?? 0 }}">0</div>
                                <div class="text-sm text-gray-300">Penduduk</div>
                            </div>
                            <div class="text-center glass border border-white/20 rounded-2xl p-4 hover:scale-105 transition-transform">
                                <div class="text-3xl font-bold text-blue-400 mb-2" data-counter="{{ $totalUmkm ?? 0 }}">0</div>
                                <div class="text-sm text-gray-300">UMKM Digital</div>
                            </div>
                            <div class="text-center glass border border-white/20 rounded-2xl p-4 hover:scale-105 transition-transform">
                                <div class="text-3xl font-bold text-purple-400 mb-2" data-counter="{{ $totalSmartServices ?? 0 }}">0</div>
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
                                        <div class="text-lg font-bold text-white mt-2">{{ $populationGrowth >= 0 ? '+' : '' }}{{ number_format($populationGrowth ?? 0, 1) }}%</div>
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
                                                <span class="text-lg font-bold text-white">{{ $digitalServicesPercent ?? 0 }}%</span>
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
                                            <div class="text-sm font-medium text-white">Assessment Platform</div>
                                            <div class="text-xs text-gray-300">156 active assessments</div>
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

<!-- Modern Features Section with Light Theme -->
<section id="features" class="py-24 relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">
    <!-- Elegant background patterns -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-100/30 via-purple-100/40 to-pink-100/30"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%234F46E5" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="1.5"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    </div>

    <!-- Floating orbs with light theme -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-96 h-96 bg-gradient-to-br from-blue-200/40 to-cyan-200/40 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-gradient-to-br from-purple-200/40 to-pink-200/40 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-emerald-200/40 to-teal-200/40 rounded-full blur-3xl animate-float" style="animation-delay: -1.5s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-7xl">
        <!-- Elegant Header Section -->
        <div class="text-center mb-24">
            <div data-aos="fade-up">
                <!-- Modern badge -->
                <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-blue-200/50 rounded-full px-6 py-3 mb-8 shadow-lg">
                    <div class="w-2 h-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full animate-pulse"></div>
                    <span class="text-slate-700 font-semibold text-sm tracking-wider uppercase">Platform Digital</span>
                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                </div>

                <!-- Main title with elegant styling -->
                <h2 class="text-6xl lg:text-7xl font-black mb-8 leading-tight" data-aos="zoom-in" data-aos-delay="200">
                    <span class="block text-slate-900 mb-4">Layanan</span>
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 animate-shimmer">
                        Unggulan Kami
                    </span>
                </h2>

                <!-- Modern description -->
                <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-xl lg:text-2xl text-slate-600 leading-relaxed font-medium mb-6">
                        Dua platform revolusioner yang dirancang khusus untuk
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-600 font-bold">transformasi digital</span>
                        menuju masa depan yang lebih cerdas
                    </p>
                    <div class="flex flex-wrap justify-center gap-4 text-sm">
                        <div class="flex items-center gap-2 bg-blue-100/60 backdrop-blur-sm border border-blue-200/50 rounded-full px-4 py-2 shadow-sm">
                            <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                            <span class="text-blue-700">Web-Based</span>
                        </div>
                        <div class="flex items-center gap-2 bg-purple-100/60 backdrop-blur-sm border border-purple-200/50 rounded-full px-4 py-2 shadow-sm">
                            <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                            <span class="text-purple-700">Real-time Data</span>
                        </div>
                        <div class="flex items-center gap-2 bg-emerald-100/60 backdrop-blur-sm border border-emerald-200/50 rounded-full px-4 py-2 shadow-sm">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span class="text-emerald-700">Interactive Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Service Cards Grid -->
        <div class="grid lg:grid-cols-2 gap-8 mb-20">
            <!-- Assessment Card - Light Theme -->
            <div class="group relative h-full" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-3xl blur-xl opacity-10 group-hover:opacity-20 transition-all duration-500"></div>
                <div class="relative bg-white/80 backdrop-blur-xl border border-slate-200/50 rounded-3xl overflow-hidden hover:border-blue-300/50 transition-all duration-500 group-hover:transform group-hover:scale-105 shadow-lg hover:shadow-2xl h-full flex flex-col">
                    <!-- Glass overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-transparent"></div>

                    <!-- Card header with modern design -->
                    <div class="relative p-8 bg-gradient-to-br from-blue-500 to-indigo-600">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <!-- Modern icon container -->
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 border border-white/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414.414a2 2 0 00-2.828-2.828L11 14.172l-2.586-2.586a2 2 0 00-2.828 2.828l4 4a2 2 0 002.828 0l9-9z"/>
                                </svg>
                            </div>

                            <h3 class="text-3xl font-black text-white mb-3">Assessment Konseling</h3>
                            <p class="text-blue-100/90 text-lg leading-relaxed">Platform evaluasi kesiapan mental dengan sistem kuesioner terstruktur untuk tanggap bencana</p>
                        </div>

                        <!-- Floating particles -->
                        <div class="absolute top-4 right-4 w-3 h-3 bg-white/40 rounded-full animate-ping"></div>
                        <div class="absolute bottom-6 left-6 w-2 h-2 bg-blue-300/60 rounded-full animate-pulse"></div>
                    </div>

                    <!-- Card content -->
                    <div class="relative p-8 flex-1 flex flex-col">
                        <!-- Feature list -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 group-hover:translate-x-2 transition-transform duration-300">
                                <div class="w-3 h-3 bg-gradient-to-r from-emerald-500 to-green-500 rounded-full"></div>
                                <span class="text-slate-700 font-medium">Digital Mental Health Check</span>
                            </div>
                            <div class="flex items-center gap-3 group-hover:translate-x-2 transition-transform duration-300 delay-75">
                                <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"></div>
                                <span class="text-slate-700 font-medium">Disaster Preparedness Test</span>
                            </div>
                            <div class="flex items-center gap-3 group-hover:translate-x-2 transition-transform duration-300 delay-150">
                                <div class="w-3 h-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                                <span class="text-slate-700 font-medium">Automated Report System</span>
                            </div>
                        </div>

                        <!-- Assessment buttons -->
                        <div class="space-y-3 mt-auto">
                            <a href="{{ route('assessment') }}" class="group/btn relative w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-3 overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/25 hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10">Assessment Kesiapan Bencana</span>
                                <svg class="relative z-10 w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>

                            @auth
                            <a href="{{ route('assessment') }}" class="group/btn relative w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-3 overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/25 hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10">Assessment Kesehatan Mental</span>
                                <svg class="relative z-10 w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                            </a>
                            @else
                            <p class="text-sm text-gray-600 text-center">
                                <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700 font-medium">Login</a> untuk akses assessment kesehatan mental
                            </p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mapping Card - Light Theme -->
            <div class="group relative h-full" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl blur-xl opacity-10 group-hover:opacity-20 transition-all duration-500"></div>
                <div class="relative bg-white/80 backdrop-blur-xl border border-slate-200/50 rounded-3xl overflow-hidden hover:border-purple-300/50 transition-all duration-500 group-hover:transform group-hover:scale-105 shadow-lg hover:shadow-2xl h-full flex flex-col">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50/50 to-transparent"></div>

                    <div class="relative p-8 bg-gradient-to-br from-purple-500 to-pink-600">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 border border-white/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>

                            <h3 class="text-3xl font-black text-white mb-3">Pemetaan Potensi Desa</h3>
                            <p class="text-purple-100/90 text-lg leading-relaxed">Dashboard analytics dengan visualisasi data interaktif dan laporan komprehensif</p>
                        </div>

                        <div class="absolute top-4 right-4 w-3 h-3 bg-white/40 rounded-full animate-ping"></div>
                        <div class="absolute bottom-6 left-6 w-2 h-2 bg-purple-300/60 rounded-full animate-pulse"></div>
                    </div>

                    <div class="relative p-8 flex-1 flex flex-col">
                        <div class="space-y-4 mb-8 flex-1">
                            <div class="flex items-center gap-3 group-hover:translate-x-2 transition-transform duration-300">
                                <div class="w-3 h-3 bg-gradient-to-r from-emerald-500 to-green-500 rounded-full"></div>
                                <span class="text-slate-700 font-medium">Real-time Data</span>
                            </div>
                            <div class="flex items-center gap-3 group-hover:translate-x-2 transition-transform duration-300 delay-75">
                                <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"></div>
                                <span class="text-slate-700 font-medium">Interactive Charts</span>
                            </div>
                            <div class="flex items-center gap-3 group-hover:translate-x-2 transition-transform duration-300 delay-150">
                                <div class="w-3 h-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                                <span class="text-slate-700 font-medium">Data Analytics</span>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <a href="{{ route('mapping') }}" class="group/btn relative w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-3 overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/25 hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                        <span class="relative z-10">Lihat Dashboard</span>
                                <svg class="relative z-10 w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Elegant Call-to-Action -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="300">
            <div class="relative group max-w-4xl mx-auto">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl blur-xl opacity-10 group-hover:opacity-20 transition-all duration-500"></div>
                <div class="relative bg-white/80 backdrop-blur-xl border border-slate-200/50 rounded-3xl p-12 hover:border-blue-300/50 transition-all duration-500 shadow-lg hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-transparent rounded-3xl"></div>

                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-100/60 to-purple-100/60 backdrop-blur-sm border border-blue-200/50 rounded-full px-4 py-2 mb-6 shadow-sm">
                            <svg class="w-4 h-4 text-blue-600 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span class="text-blue-700 font-semibold text-sm">Transformasi Digital Dimulai Sekarang</span>
    </div>

                        <h3 class="text-4xl lg:text-5xl font-black text-slate-900 mb-6 leading-tight">
                            Siap Bergabung dengan
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Revolusi Digital?</span>
                        </h3>

                        <p class="text-xl text-slate-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                            Mulai perjalanan transformasi digital Anda dengan platform terintegrasi dan dashboard analytics modern
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <button class="group/cta relative bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-5 rounded-2xl font-bold text-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/25 hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/cta:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10 flex items-center gap-3">
                                    <svg class="w-6 h-6 animate-electric-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                                    Mulai Sekarang
                    </span>
                            </button>
                            <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-slate-900 transition-colors font-medium group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Pelajari Lebih Lanjut
                </a>
                        </div>
                    </div>
                </div>
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

/* Gradient text dengan fallback yang lebih baik */
.gradient-text {
    background: linear-gradient(45deg, #06b6d4, #3b82f6, #8b5cf6);
    background-size: 200% 200%;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
    animation: gradient-shift 3s ease-in-out infinite;
}

/* Fallback untuk Safari dan browser lama */
@supports not (background-clip: text) {
    .gradient-text {
        color: #3b82f6;
        background: none;
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
// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation - Fixed version
    function animateCounter(element, target) {
        if (!target || target <= 0) {
            element.textContent = 0;
            return;
        }

        const duration = 2000; // 2 seconds
        const start = 0;
        const steps = 60; // 60 frames for smooth animation
        const increment = target / steps;
        let current = start;
        let step = 0;

        const timer = setInterval(() => {
            step++;
            current = Math.min(start + (increment * step), target);
            
            // Format number with thousand separator
            const displayValue = Math.floor(current);
            element.textContent = displayValue.toLocaleString('id-ID');
            
            if (current >= target || step >= steps) {
                element.textContent = target.toLocaleString('id-ID');
                clearInterval(timer);
            }
        }, duration / steps);
    }

    // Animate counters when in viewport
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px'
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.hasAttribute('data-animated')) {
                const targetValue = parseInt(entry.target.getAttribute('data-counter'));
                
                if (targetValue && targetValue > 0) {
                    animateCounter(entry.target, targetValue);
                    entry.target.setAttribute('data-animated', 'true');
                }
            }
        });
    }, observerOptions);

    // Observe all elements with data-counter attribute
    document.querySelectorAll('[data-counter]').forEach(element => {
        counterObserver.observe(element);
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
