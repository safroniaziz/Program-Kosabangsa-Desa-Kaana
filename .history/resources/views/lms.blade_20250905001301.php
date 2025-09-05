@extends('layouts.app')

@section('title', 'Learning Management System - Desa Kaana')

@section('content')
<!-- Hero Section with Modern Design -->
<section class="relative py-32 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-teal-900 to-emerald-900">
        <div class="absolute top-20 left-20 w-40 h-40 bg-green-500/20 rounded-full floating-element blur-xl"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-teal-500/20 rounded-full floating-element blur-xl"></div>
        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
    </div>
    
    <div class="relative z-10 max-w-6xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div class="mb-8 animate-fade-in-up">
            <span class="inline-block px-6 py-3 bg-white/10 backdrop-blur-md rounded-full text-sm font-medium mb-6 glass-effect text-white">
                📚 Learning Management System
            </span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-8 animate-fade-in-up">
            Learning <span class="text-gradient">Management System</span>
        </h1>
        
        <p class="text-xl md:text-2xl text-gray-200 mb-12 animate-fade-in-up max-w-4xl mx-auto leading-relaxed">
            Platform pembelajaran digital terdepan untuk mengembangkan keterampilan dan kompetensi masyarakat Desa Kaana melalui kurikulum yang disesuaikan dengan kebutuhan masa depan.
        </p>
        
        <!-- Enhanced Statistics -->
        <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto mb-12 animate-fade-in-up">
            <div class="text-center glass-effect p-6 rounded-2xl backdrop-blur-lg">
                <div class="text-4xl font-bold text-white mb-2">50+</div>
                <div class="text-green-200 font-medium">Kursus Premium</div>
            </div>
            <div class="text-center glass-effect p-6 rounded-2xl backdrop-blur-lg">
                <div class="text-4xl font-bold text-white mb-2">1,200+</div>
                <div class="text-green-200 font-medium">Peserta Aktif</div>
            </div>
            <div class="text-center glass-effect p-6 rounded-2xl backdrop-blur-lg">
                <div class="text-4xl font-bold text-white mb-2">95%</div>
                <div class="text-green-200 font-medium">Tingkat Kepuasan</div>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center animate-fade-in-up">
            <a href="#courses" class="btn-secondary text-white px-10 py-5 rounded-2xl font-semibold text-lg inline-flex items-center justify-center morph-btn glow-border relative overflow-hidden group">
                <span class="relative z-10 flex items-center">
                    <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Jelajahi Kursus
                </span>
            </a>
        </div>
    </div>
</section>

<!-- Search and Filter Section with Glass Effect -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-green-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-green-200/30 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card rounded-3xl p-8 shadow-2xl">
            <div class="flex flex-col lg:flex-row gap-8 items-center justify-between">
                <!-- Search Bar -->
                <div class="flex-1 max-w-lg">
                    <div class="relative group">
                        <input type="text" id="searchCourses" placeholder="Cari kursus impian Anda..." class="w-full pl-14 pr-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all duration-300 text-lg group-hover:border-green-400">
                        <svg class="absolute left-5 top-5 w-6 h-6 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex gap-4">
                <select id="categoryFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    <option value="digital-marketing">Digital Marketing</option>
                    <option value="business">Bisnis & UMKM</option>
                    <option value="technology">Teknologi</option>
                    <option value="arts">Seni & Kreativitas</option>
                    <option value="agriculture">Pertanian</option>
                    <option value="tourism">Pariwisata</option>
                </select>
                <select id="levelFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">Semua Level</option>
                    <option value="beginner">Pemula</option>
                    <option value="intermediate">Menengah</option>
                    <option value="advanced">Lanjutan</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Courses Grid Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Kursus Populer</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Pilih dari berbagai kursus yang telah dirancang khusus untuk mengembangkan potensi masyarakat desa.
            </p>
        </div>

        <div id="coursesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Course Card 1 -->
            <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-on-scroll" data-category="digital-marketing" data-level="beginner">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Digital Marketing" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Pemula</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">⭐ 4.8</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="text-xs text-blue-600 font-semibold uppercase tracking-wide">Digital Marketing</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Dasar-Dasar Digital Marketing untuk UMKM</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        Pelajari strategi pemasaran digital yang efektif untuk mengembangkan bisnis UMKM di era digital.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            8 jam
                        </div>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            245 peserta
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-green-600">Gratis</div>
                        <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform course-btn" onclick="openCourseModal('digital-marketing-basic')">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-on-scroll" data-category="business" data-level="intermediate">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Manajemen Bisnis" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Menengah</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">⭐ 4.9</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="text-xs text-purple-600 font-semibold uppercase tracking-wide">Bisnis & UMKM</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Manajemen Keuangan UMKM</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        Pelajari cara mengelola keuangan bisnis dengan efektif, mulai dari pencatatan hingga analisis laporan keuangan.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            12 jam
                        </div>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            189 peserta
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-green-600">Gratis</div>
                        <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform course-btn" onclick="openCourseModal('business-finance')">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-on-scroll" data-category="technology" data-level="beginner">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Website Development" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Pemula</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">⭐ 4.7</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="text-xs text-green-600 font-semibold uppercase tracking-wide">Teknologi</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Membuat Website Sederhana</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        Belajar membuat website sederhana menggunakan HTML, CSS, dan JavaScript untuk keperluan bisnis atau personal.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            16 jam
                        </div>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            156 peserta
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-green-600">Gratis</div>
                        <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform course-btn" onclick="openCourseModal('web-development')">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 4 -->
            <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-on-scroll" data-category="arts" data-level="beginner">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Content Creation" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Pemula</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">⭐ 4.6</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="text-xs text-pink-600 font-semibold uppercase tracking-wide">Seni & Kreativitas</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Content Creation untuk Media Sosial</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        Pelajari cara membuat konten menarik untuk media sosial menggunakan tools desain gratis dan teknik storytelling.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            10 jam
                        </div>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            203 peserta
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-green-600">Gratis</div>
                        <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform course-btn" onclick="openCourseModal('content-creation')">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 5 -->
            <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-on-scroll" data-category="agriculture" data-level="intermediate">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Smart Farming" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Menengah</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">⭐ 4.8</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="text-xs text-green-600 font-semibold uppercase tracking-wide">Pertanian</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Smart Farming & Teknologi Pertanian</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        Implementasi teknologi modern dalam pertanian untuk meningkatkan produktivitas dan efisiensi.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            14 jam
                        </div>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            87 peserta
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-green-600">Gratis</div>
                        <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform course-btn" onclick="openCourseModal('smart-farming')">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 6 -->
            <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden card-hover animate-on-scroll" data-category="tourism" data-level="beginner">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Tourism Management" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Pemula</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white text-gray-800 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">⭐ 4.9</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-3">
                        <span class="text-xs text-orange-600 font-semibold uppercase tracking-wide">Pariwisata</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pengelolaan Wisata Desa</h3>
                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        Strategi pengembangan dan pengelolaan wisata desa yang berkelanjutan dan menguntungkan masyarakat.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            12 jam
                        </div>
                        <div class="flex items-center text-gray-500 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            124 peserta
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-green-600">Gratis</div>
                        <button class="btn-primary text-white px-6 py-2 rounded-lg font-semibold hover:scale-105 transition-transform course-btn" onclick="openCourseModal('tourism-management')">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button id="loadMoreBtn" class="btn-primary text-white px-8 py-3 rounded-xl font-semibold hover:scale-105 transition-transform">
                Muat Lebih Banyak Kursus
            </button>
        </div>
    </div>
</section>

<!-- Course Detail Modal -->
<div id="courseModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-90vh overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-start mb-6">
                <h3 id="modalTitle" class="text-3xl font-bold text-gray-900"></h3>
                <button onclick="closeCourseModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            </div>

            <div id="modalContent" class="space-y-6">
                <!-- Content will be populated by JavaScript -->
            </div>

            <div class="text-center mt-8 space-x-4">
                <button onclick="closeCourseModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-xl font-semibold transition-colors">
                    Tutup
                </button>
                <button class="btn-primary text-white px-8 py-3 rounded-xl font-semibold hover:scale-105 transition-transform">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Search functionality
    $('#searchCourses').on('input', function() {
        filterCourses();
    });

    // Filter functionality
    $('#categoryFilter, #levelFilter').on('change', function() {
        filterCourses();
    });

    // Load more courses
    $('#loadMoreBtn').click(function() {
        // Simulate loading more courses
        $(this).html('<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memuat...');

        setTimeout(() => {
            $(this).html('Semua Kursus Telah Dimuat');
            $(this).prop('disabled', true);
        }, 1500);
    });

    // Smooth animations on scroll
    $(window).scroll(function() {
        $('.animate-on-scroll').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-slide-up opacity-100');
            }
        });
    });
});

function filterCourses() {
    const searchTerm = $('#searchCourses').val().toLowerCase();
    const categoryFilter = $('#categoryFilter').val();
    const levelFilter = $('#levelFilter').val();

    $('.course-card').each(function() {
        const courseTitle = $(this).find('h3').text().toLowerCase();
        const courseCategory = $(this).data('category');
        const courseLevel = $(this).data('level');

        const matchesSearch = courseTitle.includes(searchTerm);
        const matchesCategory = !categoryFilter || courseCategory === categoryFilter;
        const matchesLevel = !levelFilter || courseLevel === levelFilter;

        if (matchesSearch && matchesCategory && matchesLevel) {
            $(this).show().addClass('animate-fade-in');
        } else {
            $(this).hide();
        }
    });
}

function openCourseModal(courseId) {
    const courseData = getCourseData(courseId);
    $('#modalTitle').text(courseData.title);
    $('#modalContent').html(courseData.content);
    $('#courseModal').removeClass('hidden').addClass('flex');
}

function closeCourseModal() {
    $('#courseModal').addClass('hidden').removeClass('flex');
}

function getCourseData(courseId) {
    const courses = {
        'digital-marketing-basic': {
            title: 'Dasar-Dasar Digital Marketing untuk UMKM',
            content: `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Digital Marketing" class="w-full h-64 object-cover rounded-xl mb-6">

                        <h4 class="text-xl font-semibold mb-4">Deskripsi Kursus</h4>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Kursus ini dirancang khusus untuk pelaku UMKM yang ingin memanfaatkan digital marketing untuk mengembangkan bisnis mereka. Anda akan mempelajari strategi pemasaran digital yang efektif dan dapat diterapkan langsung.
                        </p>

                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h5 class="font-semibold text-blue-900 mb-2">Yang Akan Anda Pelajari:</h5>
                            <ul class="space-y-2 text-blue-800">
                                <li>• Konsep dasar digital marketing</li>
                                <li>• Strategi media sosial untuk bisnis</li>
                                <li>• Optimasi konten untuk engagement</li>
                                <li>• Analisis performa kampanye</li>
                                <li>• Tools gratis untuk digital marketing</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="bg-gray-50 p-6 rounded-xl mb-6">
                            <h4 class="text-xl font-semibold mb-4">Detail Kursus</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Durasi:</span>
                                    <span class="font-semibold">8 jam</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Level:</span>
                                    <span class="font-semibold">Pemula</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Peserta:</span>
                                    <span class="font-semibold">245 orang</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Rating:</span>
                                    <span class="font-semibold">⭐ 4.8/5</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sertifikat:</span>
                                    <span class="font-semibold">✅ Ya</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-50 p-6 rounded-xl">
                            <h4 class="text-xl font-semibold mb-4">Materi Pembelajaran</h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">1</div>
                                    <span>Pengenalan Digital Marketing</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">2</div>
                                    <span>Strategi Media Sosial</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">3</div>
                                    <span>Content Marketing</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">4</div>
                                    <span>Email Marketing</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">5</div>
                                    <span>Analisis & Optimasi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        },
        'business-finance': {
            title: 'Manajemen Keuangan UMKM',
            content: `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Manajemen Bisnis" class="w-full h-64 object-cover rounded-xl mb-6">

                        <h4 class="text-xl font-semibold mb-4">Deskripsi Kursus</h4>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Pelajari cara mengelola keuangan bisnis UMKM dengan efektif. Kursus ini mencakup pencatatan keuangan, analisis laporan, dan strategi perencanaan keuangan.
                        </p>

                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h5 class="font-semibold text-purple-900 mb-2">Yang Akan Anda Pelajari:</h5>
                            <ul class="space-y-2 text-purple-800">
                                <li>• Sistem pencatatan keuangan</li>
                                <li>• Analisis laporan keuangan</li>
                                <li>• Budgeting dan forecasting</li>
                                <li>• Manajemen cash flow</li>
                                <li>• Strategi investasi UMKM</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="bg-gray-50 p-6 rounded-xl mb-6">
                            <h4 class="text-xl font-semibold mb-4">Detail Kursus</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Durasi:</span>
                                    <span class="font-semibold">12 jam</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Level:</span>
                                    <span class="font-semibold">Menengah</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Peserta:</span>
                                    <span class="font-semibold">189 orang</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Rating:</span>
                                    <span class="font-semibold">⭐ 4.9/5</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sertifikat:</span>
                                    <span class="font-semibold">✅ Ya</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-purple-50 p-6 rounded-xl">
                            <h4 class="text-xl font-semibold mb-4">Materi Pembelajaran</h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">1</div>
                                    <span>Dasar-dasar Akuntansi</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">2</div>
                                    <span>Pencatatan Transaksi</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">3</div>
                                    <span>Laporan Keuangan</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">4</div>
                                    <span>Analisis Rasio Keuangan</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-purple-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm mr-3">5</div>
                                    <span>Perencanaan Keuangan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
        // Add more course data as needed
    };

    return courses[courseId] || { title: 'Kursus Tidak Ditemukan', content: '<p>Data kursus tidak tersedia.</p>' };
}
</script>
@endsection
