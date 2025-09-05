<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Kaana')</title>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Custom CSS -->
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        /* Navigation Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-brand:hover {
            color: #5a67d8;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #667eea;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        /* Main Content */
        .main-content {
            padding-top: 4rem;
            min-height: 100vh;
        }

        /* Footer */
        .footer {
            background: #1e293b;
            color: white;
            padding: 3rem 0;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f1f5f9;
        }

        .footer-section h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #f1f5f9;
        }

        .footer-section p {
            color: #cbd5e1;
            line-height: 1.6;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #334155;
            padding-top: 2rem;
            text-align: center;
            color: #94a3b8;
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 0.5rem;
        }

        .mobile-menu {
            display: none;
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 1rem;
        }

        .mobile-menu.show {
            display: block;
        }

        .mobile-menu a {
            display: block;
            padding: 0.75rem 0;
            color: #64748b;
            text-decoration: none;
            border-bottom: 1px solid #f1f5f9;
        }

        .mobile-menu a:hover {
            color: #667eea;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .nav-container {
                padding: 0 1rem;
            }
        }

        /* Utility Classes */
        .hidden {
            display: none !important;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-white {
            color: white;
        }

        .text-gray-700 {
            color: #374151;
        }

        .text-gray-300 {
            color: #d1d5db;
        }

        .bg-white {
            background-color: white;
        }

        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .border-b {
            border-bottom: 1px solid;
        }

        .border-gray-200 {
            border-color: #e5e7eb;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .pt-8 {
            padding-top: 2rem;
        }

        .space-y-2 > * + * {
            margin-top: 0.5rem;
        }

        .space-y-1 > * + * {
            margin-top: 0.25rem;
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .gap-8 {
            gap: 2rem;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .md\:flex {
            display: flex;
        }

        .md\:hidden {
            display: none;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .h-16 {
            height: 4rem;
        }

        .w-4 {
            width: 1rem;
        }

        .h-4 {
            height: 1rem;
        }

        .w-6 {
            width: 1.5rem;
        }

        .h-6 {
            height: 1.5rem;
        }

        .transition-colors {
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .hover\:text-primary-600:hover {
            color: #2563eb;
        }

        .hover\:text-primary-700:hover {
            color: #1d4ed8;
        }

        .hover\:text-white:hover {
            color: white;
        }

        .hover\:bg-gray-100:hover {
            background-color: #f3f4f6;
        }

        .block {
            display: block;
        }

        .w-full {
            width: 100%;
        }

        .text-left {
            text-align: left;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .border-t {
            border-top: 1px solid;
        }

        .border-gray-200 {
            border-color: #e5e7eb;
        }

        .text-primary-600 {
            color: #2563eb;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .leading-relaxed {
            line-height: 1.625;
        }

        .text-gray-300 {
            color: #d1d5db;
        }

        .border-gray-800 {
            border-color: #1f2937;
        }

        .text-gray-300 {
            color: #d1d5db;
        }

        .pt-16 {
            padding-top: 4rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .bg-secondary-900 {
            background-color: #0f172a;
        }

        .text-white {
            color: white;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .gap-8 {
            gap: 2rem;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-gray-300 {
            color: #d1d5db;
        }

        .leading-relaxed {
            line-height: 1.625;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .space-y-2 > * + * {
            margin-top: 0.5rem;
        }

        .text-gray-300 {
            color: #d1d5db;
        }

        .hover\:text-white:hover {
            color: white;
        }

        .transition-colors {
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .border-t {
            border-top: 1px solid;
        }

        .border-gray-800 {
            border-color: #1f2937;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .pt-8 {
            padding-top: 2rem;
        }

        .text-center {
            text-align: center;
        }

        .text-gray-300 {
            color: #d1d5db;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
            40%, 43% { transform: translate3d(0,-30px,0); }
            70% { transform: translate3d(0,-15px,0); }
            90% { transform: translate3d(0,-4px,0); }
        }

        @keyframes glow {
            0% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.5); }
            100% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.8); }
        }

        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Animation Classes */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-out;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-bounce {
            animation: bounce 0.6s ease-in-out;
        }

        .animate-glow {
            animation: glow 2s ease-in-out infinite alternate;
        }

        .animate-gradient {
            background-size: 300% 300%;
            animation: gradient 6s ease infinite;
        }

        /* Utility Classes */
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

        .text-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2, #ec4899);
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 2px;
            border-radius: 12px;
        }

        .glow-border::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 2px;
            background: linear-gradient(135deg, #667eea, #764ba2, #ec4899, #f59e0b);
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
    <script>
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
