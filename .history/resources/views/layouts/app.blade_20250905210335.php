<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Kaana')</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 25%, #8b5cf6 50%, #ec4899 75%, #f59e0b 100%);
            background-size: 300% 300%;
            animation: gradient 8s ease infinite;
        }

        .glass-effect {
            backdrop-filter: blur(20px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-card {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        .card-hover:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.25),
                        0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(59, 130, 246, 0.5);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(16, 185, 129, 0.5);
        }

        .floating-element {
            animation: float 4s ease-in-out infinite;
        }

        .floating-element:nth-child(2) {
            animation-delay: -1s;
        }

        .floating-element:nth-child(3) {
            animation-delay: -2s;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .text-gradient {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-size: 300% 300%;
            animation: gradient 6s ease infinite;
        }

        .icon-bounce:hover {
            animation: bounce 0.6s ease-in-out;
        }

        .smooth-scroll {
            scroll-behavior: smooth;
        }

        .morph-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .morph-btn:hover {
            border-radius: 25px;
        }

        .glow-border {
            position: relative;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            padding: 2px;
            border-radius: 12px;
        }

        .glow-border::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 2px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899, #f59e0b);
            border-radius: inherit;
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: xor;
            animation: glow 2s ease-in-out infinite alternate;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-2xl bg-white/80 border-b border-white/20 shadow-2xl shadow-black/10">
        <!-- Gradient border effect -->
        <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-blue-500/50 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo dengan efek premium -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="group flex items-center space-x-4">
                        <div class="relative">
                            <!-- Main logo -->
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 rounded-2xl shadow-xl group-hover:shadow-2xl transition-all duration-500 flex items-center justify-center group-hover:scale-110 group-hover:rotate-6">
                                <svg class="w-7 h-7 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <!-- Glow effect -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-500 to-indigo-600 rounded-2xl opacity-20 blur-lg group-hover:opacity-40 transition-opacity duration-500 scale-150"></div>
                            <!-- Floating particles effect -->
                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-pulse opacity-75"></div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-black bg-gradient-to-r from-slate-800 via-blue-700 to-purple-700 bg-clip-text text-transparent group-hover:from-blue-600 group-hover:to-purple-600 transition-all duration-500">
                                Desa Kaana
                            </span>
                            <span class="text-xs text-slate-500 font-semibold tracking-wider uppercase opacity-75 group-hover:text-blue-600 transition-colors duration-300">Smart Village</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation dengan Glass Morphism -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-link relative group px-5 py-3 text-slate-700 hover:text-white font-semibold transition-all duration-400 rounded-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <span class="relative flex items-center gap-2 z-10">
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Beranda
                        </span>
                    </a>
                    <a href="{{ route('assessment') }}" class="nav-link relative group px-5 py-3 text-slate-700 hover:text-white font-semibold transition-all duration-400 rounded-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <span class="relative flex items-center gap-2 z-10">
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            Assessment
                        </span>
                    </a>
                    <a href="{{ route('lms') }}" class="nav-link relative group px-5 py-3 text-slate-700 hover:text-white font-semibold transition-all duration-400 rounded-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-cyan-600 opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <span class="relative flex items-center gap-2 z-10">
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            LMS
                        </span>
                    </a>
                    <a href="{{ route('mapping') }}" class="nav-link relative group px-5 py-3 text-slate-700 hover:text-white font-semibold transition-all duration-400 rounded-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-600 opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-400 rounded-2xl"></div>
                        <span class="relative flex items-center gap-2 z-10">
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                            Pemetaan
                        </span>
                    </a>

                    @auth
                        <div class="relative ml-6">
                            <button id="userMenuButton" class="group flex items-center space-x-3 px-6 py-3 bg-gradient-to-r from-slate-800 via-slate-700 to-slate-800 text-white rounded-2xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 border border-white/10">
                                <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <span class="max-w-32 truncate font-medium">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="userMenuArrow">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="userMenu" class="hidden absolute right-0 mt-4 w-64 bg-white/95 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/20 py-3 z-50 overflow-hidden">
                                <!-- Premium header -->
                                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-purple-50 border-b border-gray-100/50">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                            <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-6 py-4 text-sm font-medium text-slate-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 transition-all duration-300 group">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Profile Saya
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50/80 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-3 ml-4">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-slate-700 hover:text-blue-600 font-medium transition-all duration-300 rounded-xl hover:bg-slate-100">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                Daftar
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="menu-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-lg border-t border-gray-100/50">
            <div class="px-6 py-4 space-y-2">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Beranda
                </a>
                <a href="{{ route('assessment') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    Assessment
                </a>
                <a href="{{ route('lms') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    LMS
                </a>
                <a href="{{ route('mapping') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    Pemetaan
                </a>

                @auth
                    <div class="border-t border-gray-100 pt-4 mt-4">
                        <div class="px-4 py-2 mb-3">
                            <p class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300 font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Profile Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-red-600 hover:bg-red-50/80 rounded-xl transition-all duration-300 font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="border-t border-gray-100 pt-4 mt-4">
                        <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:text-blue-600 hover:bg-blue-50/80 rounded-xl transition-all duration-300 font-medium mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl transition-all duration-300 font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Daftar Sekarang
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer Premium Design -->
    <footer class="relative bg-gradient-to-br from-slate-950 via-slate-900 to-black text-white overflow-hidden">
        <!-- Advanced Background Effects -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Animated gradient blobs -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-blue-600/25 to-cyan-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-gradient-to-br from-purple-600/20 to-pink-500/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-0 w-64 h-64 bg-gradient-to-br from-indigo-600/15 to-violet-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
            <!-- Grid pattern overlay -->
            <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 20px 20px;"></div>
        </div>

        <!-- Top gradient border -->
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-blue-500/50 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Premium Header Section -->
            <div class="pt-20 pb-16 border-b border-white/10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Company Branding -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 via-purple-600 to-indigo-700 rounded-3xl shadow-2xl flex items-center justify-center transform hover:scale-110 transition-transform duration-500">
                                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl opacity-30 blur-lg scale-150"></div>
                            </div>
                            <div>
                                <h3 class="text-3xl font-black bg-gradient-to-r from-white via-blue-100 to-purple-200 bg-clip-text text-transparent">
                                    Desa Kaana
                                </h3>
                                <span class="text-blue-300 font-semibold tracking-wider text-sm uppercase">Smart Village Platform</span>
                            </div>
                        </div>
                        <p class="text-slate-300 text-lg leading-relaxed max-w-lg">
                            Menghadirkan solusi digital terintegrasi untuk transformasi desa menuju era digital yang berkelanjutan dan inovatif.
                        </p>
                        <!-- Premium Social Media -->
                        <div class="flex space-x-4">
                            <a href="#" class="group w-12 h-12 bg-gradient-to-br from-blue-600/20 to-purple-600/20 backdrop-blur-sm border border-white/10 rounded-2xl flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-blue-500 hover:to-purple-600 hover:scale-110 hover:rotate-12 transition-all duration-500">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="group w-12 h-12 bg-gradient-to-br from-indigo-600/20 to-blue-600/20 backdrop-blur-sm border border-white/10 rounded-2xl flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-indigo-500 hover:to-blue-600 hover:scale-110 hover:rotate-12 transition-all duration-500">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                            <a href="#" class="group w-12 h-12 bg-gradient-to-br from-emerald-600/20 to-cyan-600/20 backdrop-blur-sm border border-white/10 rounded-2xl flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-emerald-500 hover:to-cyan-600 hover:scale-110 hover:rotate-12 transition-all duration-500">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"/>
                                </svg>
                            </a>
                            <a href="#" class="group w-12 h-12 bg-gradient-to-br from-pink-600/20 to-rose-600/20 backdrop-blur-sm border border-white/10 rounded-2xl flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-pink-500 hover:to-rose-600 hover:scale-110 hover:rotate-12 transition-all duration-500">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.404-5.965 1.404-5.965s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.728-1.378l-.742 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.989C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Newsletter Subscription -->
                    <div class="bg-gradient-to-br from-white/5 to-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/10">
                        <div class="space-y-6">
                            <div>
                                <h4 class="text-2xl font-bold text-white mb-2">Stay Connected</h4>
                                <p class="text-slate-300">Dapatkan update terbaru tentang program dan inovasi desa digital</p>
                            </div>
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <input type="email" placeholder="Email address"
                                           class="flex-1 px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                    <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-2xl hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                        Subscribe
                                    </button>
                                </div>
                                <p class="text-xs text-slate-400">
                                    Dengan berlangganan, Anda menyetujui
                                    <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Terms of Service</a>
                                    dan
                                    <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">Privacy Policy</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Links Section -->
            <div class="py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-white">Desa Kaana</h3>
                            <span class="text-sm text-blue-300 font-medium">Smart Village Platform</span>
                        </div>
                    </div>
                    <p class="text-slate-300 leading-relaxed mb-6 max-w-md">
                        Platform digital terintegrasi untuk pengembangan desa cerdas yang berkelanjutan,
                        menghubungkan teknologi modern dengan kebutuhan masyarakat lokal.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                        Navigasi Cepat
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="text-slate-300 hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-blue-400 group-hover:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('assessment') }}" class="text-slate-300 hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-blue-400 group-hover:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Assessment Konseling
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('lms') }}" class="text-slate-300 hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-blue-400 group-hover:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Learning Management
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mapping') }}" class="text-slate-300 hover:text-white hover:translate-x-2 transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-blue-400 group-hover:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                Pemetaan Potensi
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Kontak Kami
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-blue-600/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-medium">Alamat</p>
                                <p class="text-slate-300 text-sm">Jl. Desa Kaana No. 123<br>Kecamatan Xyz, Kabupaten Abc<br>Indonesia</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-600/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-medium">Telepon</p>
                                <p class="text-slate-300 text-sm">+62 123 456 789</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-purple-600/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-medium">Email</p>
                                <p class="text-slate-300 text-sm">info@desakaana.id</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter Subscription -->
            <div class="border-t border-slate-700/50 pt-8 mb-8">
                <div class="max-w-2xl mx-auto text-center">
                    <h4 class="text-xl font-bold text-white mb-3">Tetap Terhubung</h4>
                    <p class="text-slate-300 mb-6">Dapatkan update terbaru tentang program dan layanan desa kami</p>
                    <div class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                        <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl font-medium hover:shadow-lg hover:scale-105 transition-all duration-300">
                            Berlangganan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-slate-700/50 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-6">
                        <p class="text-slate-300 text-sm">
                            &copy; {{ date('Y') }} Desa Kaana. All rights reserved.
                        </p>
                        <div class="hidden md:flex items-center gap-4 text-sm">
                            <a href="#" class="text-slate-400 hover:text-white transition-colors">Kebijakan Privasi</a>
                            <span class="text-slate-600">•</span>
                            <a href="#" class="text-slate-400 hover:text-white transition-colors">Syarat & Ketentuan</a>
                            <span class="text-slate-600">•</span>
                            <a href="#" class="text-slate-400 hover:text-white transition-colors">Bantuan</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-slate-400 text-sm">
                        <span>Dibuat dengan</span>
                        <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        <span>untuk kemajuan desa</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- TailwindCSS CDN -->

    <!-- jQuery CDN -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS with settings compatible with all pages
            AOS.init({
                duration: 1000,
                once: false,
                offset: 100,
                easing: 'ease-out-cubic',
                delay: 100,
                disable: false,
                startEvent: 'DOMContentLoaded',
                initClassName: 'aos-init',
                animatedClassName: 'aos-animate',
                useClassNames: false,
                disableMutationObserver: false,
                debounceDelay: 50,
                throttleDelay: 99
            });

            // Refresh AOS on window resize
            window.addEventListener('resize', function() {
                AOS.refresh();
            });
        });

        $(document).ready(function() {
            // Mobile menu toggle with animation
            $('#mobile-menu-btn').click(function() {
                const mobileMenu = $('#mobile-menu');
                const menuIcon = $('#menu-icon');
                const closeIcon = $('#close-icon');

                mobileMenu.toggleClass('hidden');
                menuIcon.toggleClass('hidden');
                closeIcon.toggleClass('hidden');

                // Add animation class
                if (!mobileMenu.hasClass('hidden')) {
                    mobileMenu.addClass('animate-fade-in-down');
                } else {
                    mobileMenu.removeClass('animate-fade-in-down');
                }
            });

            // User menu toggle with enhanced animation
            $('#userMenuButton').click(function(e) {
                e.stopPropagation();
                const userMenu = $('#userMenu');
                const arrow = $('#userMenuArrow');

                userMenu.toggleClass('hidden');
                arrow.toggleClass('rotate-180');

                if (!userMenu.hasClass('hidden')) {
                    userMenu.addClass('animate-fade-in-down');
                } else {
                    userMenu.removeClass('animate-fade-in-down');
                }
            });

            // Close user menu when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('#userMenuButton, #userMenu').length) {
                    $('#userMenu').addClass('hidden').removeClass('animate-fade-in-down');
                    $('#userMenuArrow').removeClass('rotate-180');
                }
            });

            // Enhanced smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 100
                    }, 800, 'easeInOutCubic');
                }
            });

            // Navbar scroll effect
            $(window).scroll(function() {
                const scroll = $(window).scrollTop();
                const navbar = $('nav');

                if (scroll >= 50) {
                    navbar.addClass('shadow-xl').removeClass('shadow-lg');
                } else {
                    navbar.addClass('shadow-lg').removeClass('shadow-xl');
                }
            });

            // Enhanced scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-up');
                    }
                });
            }, observerOptions);

            $('.animate-on-scroll').each(function() {
                observer.observe(this);
            });

            // Card hover effects with enhanced animations
            $('.feature-card, .card-hover').hover(
                function() {
                    $(this).addClass('transform scale-105 shadow-2xl -translate-y-2');
                },
                function() {
                    $(this).removeClass('transform scale-105 shadow-2xl -translate-y-2');
                }
            );

            // Newsletter subscription
            $('form').on('submit', function(e) {
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.text();

                submitBtn.html('<svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>')
                          .prop('disabled', true);

                setTimeout(() => {
                    submitBtn.text(originalText).prop('disabled', false);
                }, 2000);
            });

            // Add loading states for buttons
            $('.btn-primary, .btn-secondary').click(function() {
                const $this = $(this);
                const originalText = $this.text();

                $this.html('<svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>')
                     .prop('disabled', true);

                setTimeout(() => {
                    $this.text(originalText).prop('disabled', false);
                }, 1000);
            });

            // Add parallax effect to background elements
            $(window).scroll(function() {
                const scroll = $(window).scrollTop();
                $('.floating-element').each(function() {
                    const rate = scroll * -0.5;
                    $(this).css('transform', `translateY(${rate}px)`);
                });
            });

            // Add typing effect for dynamic text
            function typeWriter(element, text, speed = 50) {
                let i = 0;
                function type() {
                    if (i < text.length) {
                        element.innerHTML += text.charAt(i);
                        i++;
                        setTimeout(type, speed);
                    }
                }
                type();
            }

            // Initialize typing effect for hero text
            $('.typing-effect').each(function() {
                const text = $(this).text();
                $(this).text('');
                typeWriter(this, text, 100);
            });
        });
    </script>

</body>
</html>
