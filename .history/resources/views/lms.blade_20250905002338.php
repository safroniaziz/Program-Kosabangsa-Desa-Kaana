@extends('layouts.app')

@section('title', 'Learning Management System')

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    :root {
        --primary: #6366f1;
        --primary-dark: #4f46e5;
        --secondary: #8b5cf6;
        --success: #10b981;
        --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --gradient-4: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
        --shadow-md: 0 6px 20px rgba(0,0,0,0.08);
        --shadow-lg: 0 10px 40px rgba(0,0,0,0.12);
        --shadow-xl: 0 20px 60px rgba(0,0,0,0.15);
    }

    * {
        scroll-behavior: smooth;
    }

    body {
        background: linear-gradient(to bottom, #f9fafb, #f3f4f6);
    }

    /* Hero Section */
    .hero-wrapper {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        min-height: 600px;
    }

    .hero-pattern {
        position: absolute;
        width: 150%;
        height: 150%;
        top: -25%;
        left: -25%;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: drift 20s ease-in-out infinite;
    }

    @keyframes drift {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-30px, -30px) rotate(1deg); }
        66% { transform: translate(30px, -20px) rotate(-1deg); }
    }

    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .shape {
        position: absolute;
        opacity: 0.1;
        animation: float 15s ease-in-out infinite;
    }

    .shape-1 {
        width: 80px;
        height: 80px;
        background: linear-gradient(45deg, #fff, rgba(255,255,255,0.3));
        border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
        top: 10%;
        left: 10%;
        animation-duration: 20s;
    }

    .shape-2 {
        width: 120px;
        height: 120px;
        background: linear-gradient(45deg, rgba(255,255,255,0.3), #fff);
        border-radius: 38% 62% 63% 37% / 70% 30% 70% 30%;
        bottom: 10%;
        right: 10%;
        animation-duration: 25s;
        animation-delay: -5s;
    }

    .shape-3 {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        top: 50%;
        left: 50%;
        animation-duration: 18s;
        animation-delay: -10s;
    }

    @keyframes float {
        0%, 100% { 
            transform: translateY(0) rotate(0deg);
            opacity: 0.1;
        }
        33% { 
            transform: translateY(-30px) rotate(120deg);
            opacity: 0.15;
        }
        66% { 
            transform: translateY(30px) rotate(240deg);
            opacity: 0.1;
        }
    }

    /* Search Bar */
    .search-container {
        max-width: 700px;
        margin: 0 auto;
        position: relative;
    }

    .search-bar {
        width: 100%;
        padding: 20px 60px 20px 25px;
        border-radius: 60px;
        border: none;
        font-size: 1.1rem;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .search-bar:focus {
        outline: none;
        transform: translateY(-2px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    }

    .search-btn {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--gradient-1);
        border: none;
        border-radius: 50px;
        padding: 12px 24px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }

    .stat-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-1);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        transform: rotate(5deg) scale(1.1);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }

    /* Course Cards */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 40px;
        padding: 40px 0;
    }

    .course-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
    }

    .course-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 30px 60px rgba(0,0,0,0.15);
    }

    .course-card:hover::after {
        opacity: 1;
    }

    .course-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .course-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .course-card:hover .course-image {
        transform: scale(1.15);
    }

    .course-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #6366f1;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        z-index: 2;
    }

    .course-rating {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 8px 12px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 0.9rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        z-index: 2;
    }

    .course-content {
        padding: 30px;
        position: relative;
        z-index: 1;
    }

    .course-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 16px;
    }

    .course-category {
        display: inline-flex;
        align-items: center;
        padding: 6px 14px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
        border-radius: 20px;
        font-size: 0.85rem;
        color: #6366f1;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .course-duration {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.9rem;
        color: #6b7280;
    }

    .course-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 12px;
        line-height: 1.3;
        transition: all 0.3s ease;
    }

    .course-card:hover .course-title {
        background: var(--gradient-1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .course-description {
        color: #6b7280;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 24px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .course-instructor {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px 0;
        border-top: 1px solid #f3f4f6;
        border-bottom: 1px solid #f3f4f6;
        margin-bottom: 20px;
    }

    .instructor-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--gradient-1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .instructor-info {
        flex: 1;
    }

    .instructor-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 0.95rem;
    }

    .instructor-role {
        font-size: 0.85rem;
        color: #9ca3af;
    }

    .course-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .course-stats {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 0.9rem;
        color: #6b7280;
    }

    .course-action {
        background: var(--gradient-1);
        color: white;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        position: relative;
        overflow: hidden;
    }

    .course-action::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .course-action:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 12px 25px rgba(99, 102, 241, 0.3);
        text-decoration: none;
        color: white;
    }

    .course-action:hover::before {
        width: 300px;
        height: 300px;
    }

    .course-action svg {
        transition: transform 0.3s ease;
    }

    .course-action:hover svg {
        transform: translateX(4px);
    }

    /* Filter Pills */
    .filter-container {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 40px;
    }

    .filter-pill {
        padding: 12px 24px;
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 50px;
        font-weight: 600;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .filter-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-1);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
        z-index: -1;
    }

    .filter-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: transparent;
        color: #6366f1;
    }

    .filter-pill.active {
        background: var(--gradient-1);
        color: white;
        border-color: transparent;
        transform: scale(1.05);
    }

    .filter-pill.active::before {
        transform: scaleX(1);
    }

    /* Loading Animation */
    .skeleton-loader {
        background: linear-gradient(90deg, #f3f4f6 0%, #e5e7eb 50%, #f3f4f6 100%);
        background-size: 200% 100%;
        animation: skeleton 1.5s ease-in-out infinite;
    }

    @keyframes skeleton {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Fade In Animations */
    .fade-in {
        animation: fadeIn 0.6s ease-out forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .courses-grid {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 20px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .course-title {
            font-size: 1.25rem;
        }

        .hero-wrapper {
            min-height: 500px;
        }
    }

    /* Smooth Scroll */
    .smooth-scroll {
        scroll-behavior: smooth;
    }

    /* Progress Bar */
    .progress-bar {
        height: 8px;
        background: #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 12px;
    }

    .progress-fill {
        height: 100%;
        background: var(--gradient-1);
        border-radius: 10px;
        transition: width 1s ease-out;
    }

    /* Tooltip */
    .tooltip {
        position: relative;
    }

    .tooltip-content {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-8px);
        background: #1f2937;
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .tooltip:hover .tooltip-content {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-12px);
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-wrapper">
    <div class="hero-pattern"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    
    <div class="container mx-auto px-4 py-24 relative z-10">
        <div class="text-center text-white">
            <div class="fade-in-up" style="animation-delay: 0.1s;">
                <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-semibold mb-6">
                    🎓 Platform Pembelajaran Digital Terbaik
                </span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold mb-6 fade-in-up" style="animation-delay: 0.2s;">
                Learning Management
                <span class="block text-4xl md:text-6xl mt-2 opacity-90">System</span>
            </h1>
            
            <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto opacity-95 fade-in-up" style="animation-delay: 0.3s;">
                Tingkatkan skill Anda dengan kursus berkualitas dari instruktur berpengalaman. 
                Akses pembelajaran kapan saja, di mana saja.
            </p>
            
            <div class="search-container fade-in-up" style="animation-delay: 0.4s;">
                <input type="text" class="search-bar" placeholder="Cari kursus yang Anda inginkan...">
                <button class="search-btn">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="container mx-auto px-4 py-12">
    <div class="stats-grid">
        <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-icon">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                </svg>
            </div>
            <div class="stat-number" data-target="2500">0</div>
            <div class="text-gray-600 font-medium">Siswa Aktif</div>
        </div>
        
        <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-icon">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                </svg>
            </div>
            <div class="stat-number" data-target="150">0</div>
            <div class="text-gray-600 font-medium">Kursus Premium</div>
        </div>
        
        <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-icon">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            <div class="text-gray-600 font-medium">
                <div class="stat-number" data-target="98">0</div>
                <span class="text-2xl">%</span>
            </div>
            <div class="text-gray-600 font-medium">Tingkat Kepuasan</div>
        </div>
        
        <div class="stat-card" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-icon">
                <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                    <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                </svg>
            </div>
            <div class="stat-number" data-target="500">0</div>
            <div class="text-gray-600 font-medium">Sertifikat Terbit</div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="container mx-auto px-4 py-16">
    <!-- Section Header -->
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
            <span class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                Kursus Populer
            </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Pilih dari berbagai kursus berkualitas yang dirancang untuk mengembangkan skill Anda
        </p>
    </div>
    
    <!-- Filter Pills -->
    <div class="filter-container" data-aos="fade-up" data-aos-delay="100">
        <button class="filter-pill active" data-filter="all">Semua Kursus</button>
        <button class="filter-pill" data-filter="programming">Programming</button>
        <button class="filter-pill" data-filter="design">Design</button>
        <button class="filter-pill" data-filter="business">Business</button>
        <button class="filter-pill" data-filter="marketing">Marketing</button>
        <button class="filter-pill" data-filter="data">Data Science</button>
    </div>
    
    <!-- Courses Grid -->
    <div class="courses-grid">
        @forelse($courses ?? [] as $index => $course)
        <div class="course-card" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}" data-category="{{ $course->category ?? 'programming' }}">
            <div class="course-image-wrapper">
                <img src="{{ $course->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500' }}" 
                     alt="{{ $course->name ?? 'Course' }}" 
                     class="course-image">
                <span class="course-badge">{{ $course->level ?? 'Beginner' }}</span>
                <div class="course-rating">
                    <svg width="16" height="16" fill="#fbbf24" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span>{{ $course->rating ?? '4.8' }}</span>
                </div>
            </div>
            
            <div class="course-content">
                <div class="course-meta">
                    <span class="course-category">{{ $course->category ?? 'Programming' }}</span>
                    <div class="course-duration">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0114 0z"/>
                        </svg>
                        <span>{{ $course->duration ?? '8 jam' }}</span>
                    </div>
                </div>
                
                <h3 class="course-title">{{ $course->name ?? 'Web Development Fundamentals' }}</h3>
                <p class="course-description">{{ $course->description ?? 'Pelajari dasar-dasar pengembangan web modern dengan HTML, CSS, dan JavaScript.' }}</p>
                
                <div class="course-instructor">
                    <div class="instructor-avatar">{{ substr($course->instructor ?? 'JD', 0, 2) }}</div>
                    <div class="instructor-info">
                        <div class="instructor-name">{{ $course->instructor ?? 'John Doe' }}</div>
                        <div class="instructor-role">Senior Developer</div>
                    </div>
                </div>
                
                <div class="course-footer">
                    <div class="course-stats">
                        <div class="stat-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>{{ $course->students ?? rand(100, 500) }}</span>
                        </div>
                        <div class="stat-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>{{ $course->modules ?? '12' }} Modul</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('lms.show', $course->id ?? 1) }}" class="course-action">
                        Mulai Belajar
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <!-- Default Course Cards if no data -->
        @for($i = 1; $i <= 6; $i++)
        <div class="course-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" data-category="programming">
            <div class="course-image-wrapper">
                <img src="https://images.unsplash.com/photo-{{ 1516321318423 + $i }}-f06f85e504b3?w=500" 
                     alt="Course {{ $i }}" 
                     class="course-image">
                <span class="course-badge">{{ $i <= 2 ? 'Beginner' : ($i <= 4 ? 'Intermediate' : 'Advanced') }}</span>
                <div class="course-rating">
                    <svg width="16" height="16" fill="#fbbf24" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span>{{ number_format(4.5 + ($i * 0.1), 1) }}</span>
                </div>
            </div>
            
            <div class="course-content">
                <div class="course-meta">
                    <span class="course-category">{{ ['Programming', 'Design', 'Business', 'Marketing', 'Data Science', 'Programming'][$i-1] }}</span>
                    <div class="course-duration">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ 6 + $i }} jam</span>
                    </div>
                </div>
                
                <h3 class="course-title">
                    {{ ['Web Development Fundamentals', 'UI/UX Design Mastery', 'Digital Marketing Strategy', 'Business Analytics', 'Machine Learning Basics', 'Advanced React Development'][$i-1] }}
                </h3>
                <p class="course-description">
                    {{ ['Pelajari dasar pengembangan web modern dengan HTML, CSS, dan JavaScript dari awal.', 
                        'Kuasai prinsip desain UI/UX untuk menciptakan pengalaman pengguna yang luar biasa.', 
                        'Strategi pemasaran digital yang efektif untuk mengembangkan bisnis Anda.',
                        'Analisis data bisnis untuk pengambilan keputusan yang lebih baik.',
                        'Pengenalan machine learning dan implementasi praktis dengan Python.',
                        'Teknik advanced React untuk membangun aplikasi web yang scalable.'][$i-1] }}
                </p>
                
                <div class="course-instructor">
                    <div class="instructor-avatar">{{ substr(['JD', 'SM', 'RK', 'AP', 'ML', 'TC'][$i-1], 0, 2) }}</div>
                    <div class="instructor-info">
                        <div class="instructor-name">{{ ['John Doe', 'Sarah Miller', 'Robert Kim', 'Anna Park', 'Mike Lee', 'Tom Chen'][$i-1] }}</div>
                        <div class="instructor-role">{{ ['Senior Developer', 'UI/UX Expert', 'Marketing Guru', 'Data Analyst', 'ML Engineer', 'React Expert'][$i-1] }}</div>
                    </div>
                </div>
                
                <div class="course-footer">
                    <div class="course-stats">
                        <div class="stat-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">