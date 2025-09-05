@extends('layouts.app')

@section('title', 'Beranda - Desa Kaana')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 z-0">
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500/20 rounded-full floating-element blur-xl"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-purple-500/20 rounded-full floating-element blur-xl"></div>
        <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-green-500/20 rounded-full floating-element blur-xl"></div>
        
        <!-- Hero Background with Advanced Overlay -->
        <div class="absolute inset-0 hero-gradient z-10"></div>
        <div class="absolute inset-0 bg-black/40 z-20"></div>
        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
             alt="Desa Kaana"
             class="w-full h-full object-cover opacity-60 scale-110 transition-transform duration-[10s] hover:scale-105">
    </div>

    <!-- Hero Content with Advanced Animations -->
    <div class="relative z-30 text-center text-white px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
        <div class="mb-8 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium mb-6 glass-effect">
                🏡 Portal Digital Desa Kaana
            </span>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold mb-8 animate-fade-in-up text-gradient leading-tight">
            Desa <span class="text-yellow-300">Kaana</span>
        </h1>
        
        <p class="text-xl md:text-3xl mb-12 text-gray-100 leading-relaxed animate-fade-in-up max-w-4xl mx-auto font-light">
            Transformasi Digital untuk <span class="text-yellow-300 font-semibold">Pelayanan Masyarakat</span> yang Lebih Efisien, Modern, dan Berkelanjutan
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center animate-fade-in-up">
            <a href="#features" class="group btn-primary text-white px-10 py-5 rounded-2xl font-semibold text-lg inline-flex items-center justify-center relative overflow-hidden morph-btn glow-border">
                <span class="relative z-10 flex items-center">
                    <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    Jelajahi Layanan
                </span>
            </a>
            <a href="#about" class="glass-effect text-white px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center hover:bg-white/20 transition-all">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Tentang Desa
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Tentang Desa Kaana</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Desa yang menggabungkan kearifan lokal dengan teknologi modern untuk menciptakan ekosistem digital yang mendukung kesejahteraan masyarakat.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll">
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <div class="bg-primary-500 p-3 rounded-xl mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Visi Desa</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi desa wisata yang mandiri, berkelanjutan, dan berdaya saing dengan memanfaatkan teknologi digital untuk meningkatkan kualitas hidup masyarakat dan pelestarian budaya lokal.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6 animate-on-scroll">
                <div class="text-center p-6 bg-white rounded-xl shadow-lg card-hover">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">1,250</h4>
                    <p class="text-sm text-gray-600">Penduduk</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-lg card-hover">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">15</h4>
                    <p class="text-sm text-gray-600">Dusun</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-lg card-hover">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">25</h4>
                    <p class="text-sm text-gray-600">UMKM</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-lg card-hover">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">5</h4>
                    <p class="text-sm text-gray-600">Objek Wisata</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Layanan Digital</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Platform terintegrasi untuk mendukung pengembangan diri dan kemajuan desa melalui teknologi modern.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Assessment Konseling Mandiri -->
            <div class="feature-card bg-white rounded-2xl p-8 shadow-lg card-hover animate-on-scroll">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Assessment Konseling Mandiri</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Platform asesmen digital untuk mengevaluasi kemampuan diri dan mendapat rekomendasi pengembangan personal yang tepat.
                </p>
                <div class="space-y-3 mb-8">
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Tes Kepribadian & Minat
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Analisis Potensi Diri
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Rekomendasi Karir
                    </div>
                </div>
                <a href="{{ route('assessment') }}" class="btn-primary w-full text-white py-3 rounded-xl font-semibold text-center block hover:scale-105 transition-transform">
                    Mulai Assessment
                </a>
            </div>

            <!-- Learning Management System -->
            <div class="feature-card bg-white rounded-2xl p-8 shadow-lg card-hover animate-on-scroll">
                <div class="bg-gradient-to-br from-green-500 to-green-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Learning Management System</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Platform pembelajaran online dengan berbagai kursus dan pelatihan untuk mengembangkan keterampilan masyarakat desa.
                </p>
                <div class="space-y-3 mb-8">
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Kursus Digital Marketing
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Pelatihan UMKM
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Sertifikat Digital
                    </div>
                </div>
                <a href="{{ route('lms') }}" class="btn-primary w-full text-white py-3 rounded-xl font-semibold text-center block hover:scale-105 transition-transform">
                    Akses Pembelajaran
                </a>
            </div>

            <!-- Pemetaan Informasi Potensi Desa -->
            <div class="feature-card bg-white rounded-2xl p-8 shadow-lg card-hover animate-on-scroll">
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Pemetaan Potensi Desa</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">
                    Dashboard interaktif yang menampilkan data statistik dan infografik potensi desa untuk mendukung pengambilan keputusan.
                </p>
                <div class="space-y-3 mb-8">
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Statistik Demografi
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Peta Interaktif
                    </div>
                    <div class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Analisis Ekonomi
                    </div>
                </div>
                <a href="{{ route('mapping') }}" class="btn-primary w-full text-white py-3 rounded-xl font-semibold text-center block hover:scale-105 transition-transform">
                    Lihat Dashboard
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-bg">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-white mb-6 animate-on-scroll">
            Bergabung dengan Transformasi Digital Desa Kaana
        </h2>
        <p class="text-xl text-gray-200 mb-8 animate-on-scroll">
            Mulai perjalanan Anda menuju pengembangan diri dan berkontribusi dalam kemajuan desa melalui platform digital kami.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll">
            <a href="{{ route('assessment') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-colors inline-flex items-center justify-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
                Mulai Sekarang
            </a>
            <a href="#about" class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white hover:text-blue-600 transition-colors inline-flex items-center justify-center">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>
@endsection
