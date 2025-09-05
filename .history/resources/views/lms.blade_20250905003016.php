@extends('layouts.app')

@section('title', 'Learning Management System')

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #7c3aed;
        --accent: #06b6d4;
        --success: #059669;
        --warning: #d97706;
        --error: #dc2626;
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-accent: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --gradient-cyber: linear-gradient(135deg, #00d4ff 0%, #090979 50%, #020024 100%);
        --gradient-sunset: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
        --gradient-ocean: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        --shadow-inner: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        --border-radius-sm: 0.375rem;
        --border-radius-md: 0.5rem;
        --border-radius-lg: 0.75rem;
        --border-radius-xl: 1rem;
        --border-radius-2xl: 1.5rem;
        --border-radius-3xl: 2rem;
        --transition-all: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-transform: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-opacity: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(to bottom, #f8fafc, #f1f5f9);
        color: #1e293b;
        line-height: 1.6;
    }

    /* Modern Hero Section */
    .hero-wrapper {
        background: var(--gradient-cyber);
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .hero-pattern {
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        background-image: 
            radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(255,255,255,0.05) 0%, transparent 50%);
        animation: heroFloat 20s ease-in-out infinite;
    }

    @keyframes heroFloat {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-20px, -30px) rotate(1deg); }
        66% { transform: translate(20px, -15px) rotate(-1deg); }
    }

    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.1;
        animation: shapeFloat 15s ease-in-out infinite;
    }

    .shape-1 {
        width: 120px;
        height: 120px;
        background: linear-gradient(45deg, #00d4ff, rgba(0,212,255,0.3));
        border-radius: 50% 40% 60% 30%;
        top: 15%;
        left: 10%;
        animation-duration: 20s;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, rgba(255,255,255,0.2), #00d4ff);
        border-radius: 30% 70% 40% 60%;
        bottom: 15%;
        right: 10%;
        animation-duration: 25s;
        animation-delay: -5s;
    }

    .shape-3 {
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        top: 60%;
        left: 60%;
        animation-duration: 18s;
        animation-delay: -10s;
    }

    @keyframes shapeFloat {
        0%, 100% {
            transform: translateY(0) rotate(0deg) scale(1);
            opacity: 0.1;
        }
        33% {
            transform: translateY(-40px) rotate(120deg) scale(1.1);
            opacity: 0.2;
        }
        66% {
            transform: translateY(40px) rotate(240deg) scale(0.9);
            opacity: 0.15;
        }
    }

    /* Enhanced Search Bar */
    .search-container {
        max-width: 800px;
        margin: 2rem auto;
        position: relative;
    }

    .search-wrapper {
        position: relative;
        background: rgba(255,255,255,0.98);
        backdrop-filter: blur(20px);
        border-radius: var(--border-radius-3xl);
        box-shadow: var(--shadow-2xl);
        padding: 4px;
        transition: var(--transition-all);
    }

    .search-wrapper:hover {
        transform: translateY(-2px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.2);
    }

    .search-bar {
        width: 100%;
        padding: 24px 80px 24px 32px;
        border: none;
        border-radius: var(--border-radius-3xl);
        font-size: 1.125rem;
        font-weight: 500;
        background: transparent;
        transition: var(--transition-all);
        outline: none;
        color: #1e293b;
    }

    .search-bar::placeholder {
        color: #64748b;
        font-weight: 400;
    }

    .search-btn {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--gradient-cyber);
        border: none;
        border-radius: var(--border-radius-2xl);
        padding: 16px 32px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition-all);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-btn:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: var(--shadow-xl);
    }

    /* Modern Stats Grid */
    .stats-section {
        margin-top: -80px;
        position: relative;
        z-index: 10;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 32px;
        padding: 0 20px;
    }

    .stat-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(20px);
        padding: 40px 32px;
        border-radius: var(--border-radius-2xl);
        box-shadow: var(--shadow-lg);
        transition: var(--transition-all);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.2);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: var(--gradient-cyber);
        transform: scaleX(0);
        transform-origin: left;
        transition: var(--transition-transform);
    }

    .stat-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: var(--shadow-2xl);
        background: rgba(255,255,255,1);
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-cyber);
        border-radius: var(--border-radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        transition: var(--transition-all);
        box-shadow: var(--shadow-lg);
    }

    .stat-card:hover .stat-icon {
        transform: rotate(5deg) scale(1.1);
        box-shadow: var(--shadow-xl);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        background: var(--gradient-cyber);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        line-height: 1;
    }

    .stat-label {
        font-size: 1.125rem;
        color: #64748b;
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    /* Revolutionary Course Cards */
    .courses-section {
        padding: 120px 0 80px;
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
        gap: 48px;
        padding: 60px 20px 0;
    }

    .course-card {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(20px);
        border-radius: var(--border-radius-3xl);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        border: 1px solid rgba(255,255,255,0.3);
        transform-style: preserve-3d;
    }

    .course-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(124, 58, 237, 0.05) 100%);
        opacity: 0;
        transition: var(--transition-opacity);
        z-index: 1;
    }

    .course-card:hover {
        transform: translateY(-16px) rotateX(2deg) rotateY(2deg) scale(1.02);
        box-shadow: 
            0 40px 80px rgba(0,0,0,0.12),
            0 0 0 1px rgba(255,255,255,0.5);
        background: rgba(255,255,255,1);
    }

    .course-card:hover::before {
        opacity: 1;
    }

    .course-image-wrapper {
        position: relative;
        height: 280px;
        overflow: hidden;
        border-radius: var(--border-radius-2xl) var(--border-radius-2xl) 0 0;
    }

    .course-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: scale(1.1);
    }

    .course-card:hover .course-image {
        transform: scale(1.2) rotate(1deg);
    }

    .course-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.7) 100%);
        opacity: 0;
        transition: var(--transition-opacity);
    }

    .course-card:hover .course-overlay {
        opacity: 1;
    }

    .course-badge {
        position: absolute;
        top: 24px;
        left: 24px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        padding: 12px 20px;
        border-radius: var(--border-radius-xl);
        font-size: 0.875rem;
        font-weight: 700;
        color: var(--primary);
        box-shadow: var(--shadow-lg);
        z-index: 2;
        transition: var(--transition-all);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .course-card:hover .course-badge {
        transform: scale(1.05);
        background: var(--gradient-cyber);
        color: white;
    }

    .course-rating {
        position: absolute;
        top: 24px;
        right: 24px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        padding: 12px 16px;
        border-radius: var(--border-radius-xl);
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.925rem;
        font-weight: 700;
        box-shadow: var(--shadow-lg);
        z-index: 2;
        transition: var(--transition-all);
        border: 1px solid rgba(255,255,255,0.3);
        color: #f59e0b;
    }

    .course-card:hover .course-rating {
        transform: scale(1.05);
        background: rgba(245, 158, 11, 0.1);
    }

    .course-content {
        padding: 40px 32px;
        position: relative;
        z-index: 2;
    }

    .course-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .course-category {
        display: inline-flex;
        align-items: center;
        padding: 10px 18px;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(124, 58, 237, 0.1));
        border-radius: var(--border-radius-2xl);
        font-size: 0.875rem;
        color: var(--primary);
        font-weight: 700;
        transition: var(--transition-all);
        border: 1px solid rgba(37, 99, 235, 0.2);
    }

    .course-card:hover .course-category {
        background: var(--gradient-cyber);
        color: white;
        transform: scale(1.05);
    }

    .course-duration {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.925rem;
        color: #64748b;
        font-weight: 600;
    }

    .course-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
        line-height: 1.2;
        transition: var(--transition-all);
        letter-spacing: -0.025em;
    }

    .course-card:hover .course-title {
        background: var(--gradient-cyber);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transform: translateY(-2px);
    }

    .course-description {
        color: #64748b;
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 32px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        font-weight: 500;
    }

    .course-instructor {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px 0;
        border-top: 2px solid #f1f5f9;
        border-bottom: 2px solid #f1f5f9;
        margin-bottom: 28px;
        transition: var(--transition-all);
    }

    .course-card:hover .course-instructor {
        border-color: rgba(37, 99, 235, 0.2);
    }

    .instructor-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--gradient-cyber);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 1.25rem;
        box-shadow: var(--shadow-lg);
        transition: var(--transition-all);
        border: 3px solid rgba(255,255,255,0.3);
    }

    .course-card:hover .instructor-avatar {
        transform: scale(1.1) rotate(5deg);
        box-shadow: var(--shadow-xl);
    }

    .instructor-info {
        flex: 1;
    }

    .instructor-name {
        font-weight: 700;
        color: #0f172a;
        font-size: 1.125rem;
        margin-bottom: 4px;
        letter-spacing: -0.025em;
    }

    .instructor-role {
        font-size: 0.925rem;
        color: #64748b;
        font-weight: 600;
    }

    .course-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .course-stats {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.925rem;
        color: #64748b;
        font-weight: 600;
        transition: var(--transition-all);
    }

    .course-card:hover .stat-item {
        color: var(--primary);
    }

    .course-action {
        background: var(--gradient-cyber);
        color: white;
        padding: 16px 32px;
        border-radius: var(--border-radius-xl);
        font-weight: 700;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
        font-size: 1rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255,255,255,0.2);
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
        transform: translateY(-4px) scale(1.05);
        box-shadow: var(--shadow-2xl);
        text-decoration: none;
        color: white;
    }

    .course-action:hover::before {
        width: 400px;
        height: 400px;
    }

    .course-action svg {
        transition: var(--transition-transform);
        z-index: 1;
        position: relative;
    }

    .course-action:hover svg {
        transform: translateX(6px);
    }

    /* Modern Filter Pills */
    .filter-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 60px;
        padding: 0 20px;
    }

    .filter-pill {
        padding: 16px 32px;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(20px);
        border: 2px solid rgba(37, 99, 235, 0.1);
        border-radius: var(--border-radius-3xl);
        font-weight: 700;
        color: #64748b;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        font-size: 1rem;
        letter-spacing: -0.025em;
    }

    .filter-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-cyber);
        transform: scaleX(0);
        transform-origin: left;
        transition: var(--transition-transform);
        z-index: -1;
    }

    .filter-pill:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: var(--shadow-xl);
        border-color: transparent;
        color: var(--primary);
        background: rgba(255,255,255,1);
    }

    .filter-pill.active {
        background: var(--gradient-cyber);
        color: white;
        border-color: transparent;
        transform: translateY(-2px) scale(1.05);
        box-shadow: var(--shadow-xl);
    }

    .filter-pill.active::before {
        transform: scaleX(1);
    }

    /* Enhanced Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: 80px;
        position: relative;
    }

    .section-header::before {
        content: '';
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 6px;
        background: var(--gradient-cyber);
        border-radius: var(--border-radius-lg);
    }

    .section-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 24px;
        letter-spacing: -0.05em;
        line-height: 1.1;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
        font-weight: 500;
        line-height: 1.6;
    }

    .gradient-text {
        background: var(--gradient-cyber);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Loading States */
    .skeleton-loader {
        background: linear-gradient(90deg, #f1f5f9 0%, #e2e8f0 50%, #f1f5f9 100%);
        background-size: 200% 100%;
        animation: shimmer 1.5s ease-in-out infinite;
        border-radius: var(--border-radius-lg);
    }

    @keyframes shimmer {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Progress Indicators */
    .progress-bar {
        height: 10px;
        background: #e2e8f0;
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        margin-top: 16px;
    }

    .progress-fill {
        height: 100%;
        background: var(--gradient-cyber);
        border-radius: var(--border-radius-lg);
        transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .progress-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        animation: progressShine 2s ease-in-out infinite;
    }

    @keyframes progressShine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Enhanced Tooltips */
    .tooltip {
        position: relative;
    }

    .tooltip-content {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(-12px);
        background: #0f172a;
        color: white;
        padding: 12px 16px;
        border-radius: var(--border-radius-lg);
        font-size: 0.875rem;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition-all);
        z-index: 1000;
        box-shadow: var(--shadow-xl);
    }

    .tooltip-content::after {
        content: '';
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        border: 6px solid transparent;
        border-top-color: #0f172a;
    }

    .tooltip:hover .tooltip-content {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-16px);
    }

    /* Load More Button */
    .load-more-btn {
        background: var(--gradient-cyber);
        color: white;
        padding: 20px 48px;
        border-radius: var(--border-radius-2xl);
        font-weight: 700;
        font-size: 1.125rem;
        border: none;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        letter-spacing: -0.025em;
    }

    .load-more-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .load-more-btn:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: var(--shadow-2xl);
    }

    .load-more-btn:hover::before {
        width: 400px;
        height: 400px;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .courses-grid {
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 40px;
        }
        
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }
    }

    @media (max-width: 768px) {
        .hero-wrapper {
            min-height: 80vh;
            padding: 60px 0;
        }
        
        .courses-grid {
            grid-template-columns: 1fr;
            gap: 32px;
            padding: 40px 16px 0;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 0 16px;
        }

        .course-title {
            font-size: 1.5rem;
        }

        .filter-container {
            gap: 12px;
            justify-content: flex-start;
            overflow-x: auto;
            padding: 0 16px 20px;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .filter-container::-webkit-scrollbar {
            display: none;
        }

        .filter-pill {
            flex-shrink: 0;
            padding: 12px 24px;
            font-size: 0.925rem;
        }

        .search-container {
            margin: 1.5rem 16px;
        }

        .search-bar {
            padding: 20px 70px 20px 24px;
            font-size: 1rem;
        }

        .search-btn {
            padding: 12px 20px;
        }
    }

    @media (max-width: 480px) {
        .course-content {
            padding: 32px 24px;
        }

        .course-footer {
            flex-direction: column;
            gap: 20px;
            align-items: stretch;
        }

        .course-action {
            text-align: center;
            justify-content: center;
            width: 100%;
        }
    }

    /* Animation Classes */
    .fade-in {
        animation: fadeIn 0.8s ease-out forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
        opacity: 0;
        transform: translateY(40px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
        opacity: 0;
        transform: translateX(-40px);
    }

    @keyframes slideInLeft {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .scale-in {
        animation: scaleIn 0.6s ease-out forwards;
        opacity: 0;
        transform: scale(0.9);
    }

    @keyframes scaleIn {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--gradient-cyber);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
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

                    <a href="{{ url('/lms/' . ($course->id ?? 1)) }}" class="course-action">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>{{ 100 + ($i * 50) }}</span>
                        </div>
                        <div class="stat-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>{{ 8 + $i }} Modul</span>
                        </div>
                    </div>

                    <a href="{{ url('/lms/' . $i) }}" class="course-action">
                        Mulai Belajar
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endfor
        @endforelse
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-12" data-aos="fade-up">
        <button class="px-8 py-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-xl hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            Lihat Semua Kursus
        </button>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Animated Counter
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200;

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const increment = target / speed;

        const updateCount = () => {
            const count = +counter.innerText;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    };

    // Intersection Observer for counter animation
    const observerOptions = {
        threshold: 0.7,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                if (!counter.classList.contains('counted')) {
                    animateCounter(counter);
                    counter.classList.add('counted');
                }
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        observer.observe(counter);
    });

    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-pill');
    const courseCards = document.querySelectorAll('.course-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filter = button.getAttribute('data-filter');

            courseCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    card.classList.add('fade-in');
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    const searchBar = document.querySelector('.search-bar');
    const searchBtn = document.querySelector('.search-btn');

    const performSearch = () => {
        const searchTerm = searchBar.value.toLowerCase();

        courseCards.forEach(card => {
            const title = card.querySelector('.course-title').textContent.toLowerCase();
            const description = card.querySelector('.course-description').textContent.toLowerCase();
            const category = card.querySelector('.course-category').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm) || category.includes(searchTerm)) {
                card.style.display = 'block';
                card.classList.add('fade-in');
            } else {
                card.style.display = 'none';
            }
        });
    };

    searchBar.addEventListener('keyup', performSearch);
    searchBtn.addEventListener('click', performSearch);

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Parallax effect on hero
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroPattern = document.querySelector('.hero-pattern');
        const shapes = document.querySelectorAll('.shape');

        if (heroPattern) {
            heroPattern.style.transform = `translateY(${scrolled * 0.5}px)`;
        }

        shapes.forEach((shape, index) => {
            const speed = 0.5 + (index * 0.1);
            shape.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
});
</script>
@endsection
