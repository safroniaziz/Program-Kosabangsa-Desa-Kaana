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
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Parallax effect on scroll
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            heroSection.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
</script>
@endsection
