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

        /* Global Styles for Consistency */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --dark-gradient: linear-gradient(to br, #0f172a, #1e293b);
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.6);
        }

        .back-to-top svg {
            width: 24px;
            height: 24px;
            color: white;
            transition: transform 0.3s ease;
        }

        .back-to-top:hover svg {
            transform: translateY(-2px);
        }

        /* Shimmer Effect */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        .shimmer {
            animation: shimmer 3s infinite linear;
            background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.3) 50%, transparent 100%);
            background-size: 1000px 100%;
        }

        /* Professional CTA Styles */
        .cta-section {
            position: relative;
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            overflow: hidden;
        }

        .cta-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.1;
            background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Floating animations */
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(5deg);
            }
            66% {
                transform: translateY(-10px) rotate(-5deg);
            }
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        /* Glass morphism card */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Section divider */
        .section-divider {
            height: 100px;
            position: relative;
            overflow: hidden;
        }

        .section-divider::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.3), transparent);
        }

        /* Enhanced Navbar Styles */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
        }

        .nav-item {
            position: relative;
            padding: 0.5rem 1rem;
            font-weight: 500;
            color: #475569;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-item::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
        }

        .nav-item:hover {
            color: #3b82f6;
        }

        .nav-item:hover::before {
            width: 80%;
        }

        .nav-item.active {
            color: #3b82f6;
            font-weight: 600;
        }

        .nav-item.active::before {
            width: 80%;
        }

        /* Footer Enhancements */
        .footer-gradient {
            background: linear-gradient(180deg, #0f172a 0%, #020617 100%);
        }

        .footer-link {
            position: relative;
            color: #94a3b8;
            transition: all 0.3s ease;
            padding-left: 0;
        }

        .footer-link::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transition: width 0.3s ease;
        }

        .footer-link:hover {
            color: #fff;
            padding-left: 0.5rem;
        }

        .footer-link:hover::before {
            width: 100%;
        }

        /* User Menu Enhancements */
        .user-menu-item {
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .user-menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(180deg, #3b82f6, #8b5cf6);
            transform: translateX(-3px);
            transition: transform 0.2s ease;
        }

        .user-menu-item:hover::before {
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <!-- Enhanced Navigation -->
    <nav class="navbar-glass fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo Section - Simplified and Modern -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="group flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <span class="text-xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                                Desa Kaana
                            </span>
                            <span class="text-[10px] text-gray-500 font-medium tracking-wide uppercase block">Smart Village</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation - Clean and Professional -->
                <div class="hidden md:flex items-center">
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            Beranda
                        </a>
                        <a href="{{ route('assessment') }}" class="nav-item {{ request()->routeIs('assessment') ? 'active' : '' }}">
                            Assessment
                        </a>
                        <a href="{{ route('lms') }}" class="nav-item {{ request()->routeIs('lms') ? 'active' : '' }}">
                            LMS
                        </a>
                        <a href="{{ route('mapping') }}" class="nav-item {{ request()->routeIs('mapping') ? 'active' : '' }}">
                            Pemetaan
                        </a>
                    </div>

                    <!-- User Section - Refined Design -->
                    @auth
                        <div class="relative ml-8">
                            <button id="userMenuButton" class="flex items-center space-x-2 px-4 py-2 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-200 border border-gray-200">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="text-sm font-medium text-gray-700 max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" id="userMenuArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu - Cleaner Design -->
                            <div id="userMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                                <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                                    <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="user-menu-item flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Profile Saya
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="user-menu-item w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-3 ml-8">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}" class="px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all duration-200 hover:scale-105">
                                Daftar
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button - Simplified -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="menu-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu - Clean Design -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-4 py-2 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg transition-colors">
                    Beranda
                </a>
                <a href="{{ route('assessment') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('assessment') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg transition-colors">
                    Assessment
                </a>
                <a href="{{ route('lms') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('lms') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg transition-colors">
                    LMS
                </a>
                <a href="{{ route('mapping') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('mapping') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg transition-colors">
                    Pemetaan
                </a>

                @auth
                    <div class="border-t border-gray-100 pt-2 mt-2">
                        <div class="px-3 py-2">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                            Profile Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="border-t border-gray-100 pt-2 mt-2 space-y-1">
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg">
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Modern Footer - Clean and Professional -->
    <footer class="footer-gradient relative">
        <!-- Subtle gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/20"></div>

        <div class="relative z-10">
            <!-- Main Footer Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Brand Section -->
                    <div class="lg:col-span-1">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Desa Kaana</h3>
                                <span class="text-xs text-blue-400 font-medium">Smart Village Platform</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-400 leading-relaxed mb-4">
                            Platform digital terintegrasi untuk transformasi desa menuju era digital.
                        </p>
                        <!-- Social Media - Minimal Design -->
                        <div class="flex space-x-2">
                            <a href="#" class="w-9 h-9 bg-white/5 hover:bg-white/10 rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition-all duration-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <span>All rights reserved.</span>
                        </div>
                        <div class="flex items-center gap-6">
                            <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                            <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                            <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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

    @yield('scripts')
</body>
</html>
