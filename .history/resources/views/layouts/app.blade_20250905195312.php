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
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-600 hover:text-primary-700 transition-colors">
                        Desa Kaana
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 transition-colors">Beranda</a>
                    <a href="{{ route('assessment') }}" class="text-gray-700 hover:text-primary-600 transition-colors">Assessment</a>
                    <a href="{{ route('lms') }}" class="text-gray-700 hover:text-primary-600 transition-colors">LMS</a>
                    <a href="{{ route('mapping') }}" class="text-gray-700 hover:text-primary-600 transition-colors">Pemetaan</a>
                    @auth
                        <div class="relative inline-block text-left">
                            <button id="userMenuButton" class="flex items-center text-gray-700 hover:text-primary-600 transition-colors">
                                <span class="mr-2">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">Login</a>
                    @endauth
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-primary-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-2 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 transition-colors">Beranda</a>
                <a href="{{ route('assessment') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 transition-colors">Assessment</a>
                <a href="{{ route('lms') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 transition-colors">LMS</a>
                <a href="{{ route('mapping') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 transition-colors">Pemetaan</a>
                @auth
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-gray-700 hover:text-primary-600 transition-colors">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-gray-700 hover:text-primary-600 transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-primary-600 font-medium">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-secondary-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Desa Kaana</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Desa yang berkembang dengan teknologi modern untuk pelayanan masyarakat yang lebih baik.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="{{ route('assessment') }}" class="hover:text-white transition-colors">Assessment Konseling</a></li>
                        <li><a href="{{ route('lms') }}" class="hover:text-white transition-colors">Learning Management</a></li>
                        <li><a href="{{ route('mapping') }}" class="hover:text-white transition-colors">Pemetaan Potensi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>📍 Desa Kaana, Indonesia</li>
                        <li>📞 +62 123 456 789</li>
                        <li>✉️ info@desakaana.id</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} Desa Kaana. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- jQuery Scripts -->
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
            // Mobile menu toggle
            $('#mobile-menu-btn').click(function() {
                $('#mobile-menu').toggleClass('hidden');
            });

            // User menu toggle
            $('#userMenuButton').click(function() {
                $('#userMenu').toggleClass('hidden');
            });

            // Close user menu when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('#userMenuButton').length && !$(event.target).closest('#userMenu').length) {
                    $('#userMenu').addClass('hidden');
                }
            });

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                }
            });

            // Scroll animations
            $(window).scroll(function() {
                $('.animate-on-scroll').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('animate-slide-up');
                    }
                });
            });

            // Card hover effects
            $('.feature-card').hover(
                function() {
                    $(this).addClass('transform scale-105 shadow-2xl');
                },
                function() {
                    $(this).removeClass('transform scale-105 shadow-2xl');
                }
            );
        });
    </script>

</body>
</html>
