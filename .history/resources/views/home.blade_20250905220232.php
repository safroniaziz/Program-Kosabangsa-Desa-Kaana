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
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 animate-shimmer">
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
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">15</h4>
                    <p class="text-gray-600 font-medium">Dusun</p>
                </div>

                <div class="text-center p-8 glass-card rounded-2xl shadow-xl card-hover group">
                    <div class="bg-gradient-to-br from-purple-400 to-pink-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">25</h4>
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
<section id="features" class="py-20 bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50 relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200/30 to-purple-300/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-pink-200/30 to-orange-300/30 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-block mb-4">
                <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 tracking-wider uppercase">Layanan Digital</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                Platform Digital
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Terintegrasi</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Eksplorasi layanan digital yang dirancang khusus untuk meningkatkan kualitas hidup masyarakat Desa Kaana
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Assessment Card -->
            <div class="glass-card rounded-2xl p-8 shadow-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Assessment Konseling</h3>
                <p class="text-gray-600 text-center mb-6">
                    Evaluasi kesiapan mental untuk tanggap bencana dengan indikator hijau, kuning, dan merah
                </p>
                <a href="{{ route('assessment') }}" class="group relative px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold w-full text-center block overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <span class="relative z-10">Mulai Assessment</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>

            <!-- LMS Card -->
            <div class="glass-card rounded-2xl p-8 shadow-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Learning Management</h3>
                <p class="text-gray-600 text-center mb-6">
                    Platform pembelajaran online dengan kursus berkualitas untuk pengembangan skill digital
                </p>
                <a href="{{ route('lms') }}" class="group relative px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl font-semibold w-full text-center block overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <span class="relative z-10">Akses Pembelajaran</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-green-700 to-emerald-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>

            <!-- Mapping Card -->
            <div class="glass-card rounded-2xl p-8 shadow-xl" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-gradient-to-br from-purple-500 to-pink-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Pemetaan Potensi</h3>
                <p class="text-gray-600 text-center mb-6">
                    Dashboard infografik statistik potensi desa untuk analisis dan pengambilan keputusan
                </p>
                <a href="{{ route('mapping') }}" class="group relative px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-semibold w-full text-center block overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <span class="relative z-10">Lihat Dashboard</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-700 to-pink-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Professional CTA Section -->
<section class="cta-section">
    <div class="cta-pattern"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6" data-aos="fade-up">
                Bergabung dengan Transformasi Digital Desa Kaana
            </h2>
            <p class="text-xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                Mulai perjalanan Anda menuju pengembangan diri dan berkontribusi dalam kemajuan desa
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-purple-700 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 hover:scale-105">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Daftar Sekarang
                    </span>
                </a>
                <a href="#about" class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-xl font-semibold hover:bg-white/10 transition-all duration-300">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Pelajari Lebih Lanjut
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
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
});
</script>
@endsection
