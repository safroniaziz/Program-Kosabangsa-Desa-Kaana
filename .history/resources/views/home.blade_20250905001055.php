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
            <a href="#about" class="group glass-effect text-white px-10 py-5 rounded-2xl font-semibold text-lg inline-flex items-center justify-center hover:bg-white/30 transition-all duration-300 morph-btn backdrop-blur-lg">
                <span class="relative z-10 flex items-center">
                    <svg class="w-6 h-6 mr-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Tentang Desa
                </span>
            </a>
        </div>
    </div>

    <!-- Scroll Indicator with Enhanced Animation -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30">
        <div class="flex flex-col items-center animate-bounce">
            <span class="text-white/70 text-sm mb-2 font-medium">Scroll untuk melanjutkan</span>
            <div class="w-8 h-12 border-2 border-white/30 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/70 rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </div>
</section>

<!-- About Section with Glass Cards -->
<section id="about" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-200/30 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-200/30 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20 animate-fade-in-up">
            <span class="inline-block px-6 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-4">
                🌟 Tentang Kami
            </span>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 text-gradient">
                Desa Kaana
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Vision Card -->
            <div class="animate-fade-in-up">
                <div class="glass-card p-10 rounded-3xl shadow-2xl card-hover relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 group-hover:from-blue-500/10 group-hover:to-purple-500/10 transition-all duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-8">
                            <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-4 rounded-2xl mr-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Visi Desa Kaana
                            </h3>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            Menjadi desa wisata yang mandiri, berkelanjutan, dan berdaya saing dengan memanfaatkan teknologi digital untuk meningkatkan kualitas hidup masyarakat dan pelestarian budaya lokal.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Statistics Grid -->
            <div class="grid grid-cols-2 gap-8 animate-fade-in-up">
                <div class="text-center p-8 glass-card rounded-2xl shadow-xl card-hover group">
                    <div class="bg-gradient-to-br from-green-400 to-emerald-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">1,250</h4>
                    <p class="text-gray-600 font-medium">Penduduk Aktif</p>
                </div>

                <div class="text-center p-8 glass-card rounded-2xl shadow-xl card-hover group">
                    <div class="bg-gradient-to-br from-blue-400 to-indigo-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-2">15</h4>
                    <p class="text-sm text-gray-600">Dusun</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-lg card-hover">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">25</h4>
                    <p class="text-gray-600 font-medium">UMKM Lokal</p>
                </div>

                <div class="text-center p-8 glass-card rounded-2xl shadow-xl card-hover group">
                    <div class="bg-gradient-to-br from-yellow-400 to-orange-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900 mb-3 group-hover:text-yellow-600 transition-colors">5</h4>
                    <p class="text-gray-600 font-medium">Objek Wisata</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section with Modern Design -->
<section id="features" class="py-32 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative overflow-hidden">
    <!-- Background Animation -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20 animate-fade-in-up">
            <span class="inline-block px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full text-sm font-semibold mb-6">
                ⚡ Layanan Digital Terdepan
            </span>
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-8">
                Layanan <span class="text-gradient">Digital</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto leading-relaxed">
                Eksplorasi layanan digital yang dirancang khusus untuk meningkatkan kualitas hidup dan produktivitas masyarakat Desa Kaana
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Assessment Konseling Mandiri -->
            <div class="group relative glass-card p-10 rounded-3xl shadow-2xl card-hover animate-fade-in-up border border-white/10">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-3xl group-hover:from-blue-500/10 group-hover:to-purple-500/10 transition-all duration-500"></div>
                
                <div class="relative z-10">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 w-20 h-20 rounded-2xl flex items-center justify-center mb-8 mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
