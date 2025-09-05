@extends('layouts.app')

@section('title', 'Learning Management System')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: #f8fafc;
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
        position: relative;
    }

    .courses-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 20%, rgba(37, 99, 235, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(124, 58, 237, 0.03) 0%, transparent 50%);
        pointer-events: none;
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
        gap: 48px;
        padding: 60px 20px 0;
        position: relative;
        z-index: 1;
    }

    .course-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(25px);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 
            0 4px 20px rgba(0, 0, 0, 0.08),
            0 1px 3px rgba(0, 0, 0, 0.1);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        border: 1px solid rgba(255,255,255,0.4);
        transform-style: preserve-3d;
        will-change: transform;
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
        transform: translateY(-20px) rotateX(3deg) rotateY(3deg) scale(1.03);
        box-shadow:
            0 50px 100px rgba(0,0,0,0.15),
            0 0 0 1px rgba(255,255,255,0.6),
            inset 0 1px 0 rgba(255,255,255,0.8);
        background: rgba(255,255,255,1);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .course-card:hover::before {
        opacity: 1;
    }

    .course-image-wrapper {
        position: relative;
        height: 280px;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .course-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: scale(1.05);
        filter: brightness(0.9) saturate(1.1);
    }

    .course-card:hover .course-image {
        transform: scale(1.15) rotate(2deg);
        filter: brightness(1) saturate(1.2);
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
        padding: 12px 20px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 20px;
        font-size: 0.875rem;
        color: #667eea;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(102, 126, 234, 0.2);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    .course-card:hover .course-category {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: scale(1.05);
        border-color: transparent;
    }

    .course-duration {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.925rem;
        color: #64748b;
        font-weight: 600;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        transition: color 0.3s ease;
    }

    .course-card:hover .course-duration {
        color: #475569;
    }

    .course-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
        line-height: 1.2;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: -0.025em;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    .course-card:hover .course-title {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        transition: color 0.3s ease;
    }

    .course-card:hover .course-description {
        color: #475569;
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
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        transition: color 0.3s ease;
    }

    .instructor-role {
        font-size: 0.925rem;
        color: #64748b;
        font-weight: 600;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        transition: color 0.3s ease;
    }

    .course-card:hover .instructor-name {
        color: #667eea;
    }

    .course-card:hover .instructor-role {
        color: #475569;
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 18px 36px;
        border-radius: 16px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
        font-size: 1rem;
        box-shadow: 
            0 8px 25px rgba(102, 126, 234, 0.3),
            0 2px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255,255,255,0.2);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 0.9rem;
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
        transform: translateY(-6px) scale(1.08);
        box-shadow: 
            0 15px 40px rgba(102, 126, 234, 0.4),
            0 5px 15px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        color: white;
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
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
        padding: 18px 36px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(25px);
        border: 2px solid rgba(102, 126, 234, 0.15);
        border-radius: 50px;
        font-weight: 700;
        color: #64748b;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        font-size: 1rem;
        letter-spacing: -0.025em;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
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
        transform: translateY(-6px) scale(1.08);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.3);
        color: #667eea;
        background: rgba(255,255,255,1);
    }

    .filter-pill.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: transparent;
        transform: translateY(-4px) scale(1.08);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
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
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
        font-weight: 500;
        line-height: 1.6;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

    /* Enhanced Ripple Animations */
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    @keyframes clickRipple {
        0% {
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            width: 200px;
            height: 200px;
            opacity: 0;
        }
    }

    /* Magnetic Effect for Cards */
    .course-card.magnetic {
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* Enhanced Glow Effect */
    .course-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 24px;
        padding: 2px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.3));
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .course-card:hover::after {
        opacity: 1;
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 22px 52px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 1.125rem;
        border: none;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
        letter-spacing: -0.025em;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
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
        transform: translateY(-6px) scale(1.08);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
    }

    .load-more-btn:hover::before {
        width: 400px;
        height: 400px;
    }

    /* Enhanced Responsive Design */
    @media (max-width: 1200px) {
        .courses-grid {
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 40px;
            padding: 50px 20px 0;
        }
    }

    @media (max-width: 1024px) {
        .courses-grid {
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 36px;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .course-card {
            border-radius: 20px;
        }

        .course-image-wrapper {
            height: 260px;
        }
    }

    @media (max-width: 768px) {
        .hero-wrapper {
            min-height: 80vh;
            padding: 60px 0;
        }

        .courses-grid {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 32px;
            padding: 40px 16px 0;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 0 16px;
        }

        .course-title {
            font-size: 1.5rem;
        }

        .course-image-wrapper {
            height: 240px;
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

    @media (max-width: 640px) {
        .courses-grid {
            grid-template-columns: 1fr;
            gap: 28px;
            padding: 30px 16px 0;
        }

        .course-card {
            border-radius: 18px;
        }

        .course-image-wrapper {
            height: 220px;
        }

        .course-content {
            padding: 28px 20px;
        }
    }

    @media (max-width: 480px) {
        .course-content {
            padding: 24px 18px;
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
            padding: 16px 24px;
            font-size: 0.85rem;
        }

        .course-image-wrapper {
            height: 200px;
        }

        .course-title {
            font-size: 1.3rem;
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
<!-- Revolutionary Hero Section -->
<section class="hero-wrapper">
    <div class="hero-pattern"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white">
            <div class="fade-in-up" style="animation-delay: 0.1s;">
                <span class="inline-block px-8 py-3 bg-white/20 backdrop-blur-xl rounded-full text-sm font-bold mb-8 border border-white/30">
                    🚀 Platform Pembelajaran Digital Masa Depan
                </span>
            </div>

            <h1 class="text-6xl md:text-8xl font-black mb-8 fade-in-up" style="animation-delay: 0.2s; letter-spacing: -0.05em; line-height: 0.9;">
                Learning Management
                <span class="block text-5xl md:text-7xl mt-4 opacity-90 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                    Revolution
                </span>
            </h1>

            <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto opacity-95 fade-in-up font-medium leading-relaxed" style="animation-delay: 0.3s;">
                Bergabunglah dengan revolusi pembelajaran digital. Akses ribuan kursus premium,
                belajar dari expert terbaik, dan wujudkan potensi maksimal Anda.
            </p>

            <div class="search-container fade-in-up" style="animation-delay: 0.4s;">
                <div class="search-wrapper">
                    <input type="text" class="search-bar" placeholder="Temukan kursus impian Anda...">
                    <button class="search-btn">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="hidden md:inline">Cari</span>
                    </button>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center mt-12 fade-in-up" style="animation-delay: 0.5s;">
                <a href="#courses" class="inline-flex items-center gap-3 px-10 py-4 bg-white text-gray-900 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Mulai Belajar Gratis
                </a>
                <a href="#about" class="inline-flex items-center gap-3 px-10 py-4 border-2 border-white/30 text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition-all duration-300 backdrop-blur-sm">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.01M15 10h1.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Modern Stats Section -->
<section class="stats-section">
    <div class="container mx-auto">
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <svg width="32" height="32" fill="white" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div class="stat-number" data-target="25000">0</div>
                <div class="stat-label">Siswa Aktif</div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <svg width="32" height="32" fill="white" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="stat-number" data-target="500">0</div>
                <div class="stat-label">Kursus Premium</div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">
                    <svg width="32" height="32" fill="white" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-flex items-baseline">
                    <div class="stat-number" data-target="98">0</div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">%</span>
                </div>
                <div class="stat-label">Tingkat Kepuasan</div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon">
                    <svg width="32" height="32" fill="white" viewBox="0 0 24 24">
                        <path d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                    </svg>
                </div>
                <div class="stat-number" data-target="15000">0</div>
                <div class="stat-label">Sertifikat Terbit</div>
            </div>
        </div>
    </div>
</section>

<!-- Revolutionary Courses Section -->
<section id="courses" class="courses-section">
    <div class="container mx-auto px-4">
        <!-- Enhanced Section Header -->
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">
                <span class="gradient-text">Kursus Revolusioner</span>
            </h2>
            <p class="section-subtitle">
                Jelajahi koleksi kursus premium yang dirancang oleh expert terbaik dunia
            </p>
        </div>

        <!-- Modern Filter Pills -->
        <div class="filter-container" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-pill active" data-filter="all">🌟 Semua Kursus</button>
            <button class="filter-pill" data-filter="programming">💻 Programming</button>
            <button class="filter-pill" data-filter="design">🎨 Design</button>
            <button class="filter-pill" data-filter="business">📊 Business</button>
            <button class="filter-pill" data-filter="marketing">📈 Marketing</button>
            <button class="filter-pill" data-filter="data">📊 Data Science</button>
        </div>

        <!-- Revolutionary Courses Grid -->
        <div class="courses-grid">
            @forelse($courses ?? [] as $index => $course)
            <div class="course-card" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}" data-category="{{ $course->category ?? 'programming' }}">
                <div class="course-image-wrapper">
                    <img src="{{ $course->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=600&fit=crop&crop=entropy&auto=format&q=80' }}"
                         alt="{{ $course->name ?? 'Course' }}"
                         class="course-image">
                    <div class="course-overlay"></div>
                    <span class="course-badge">{{ $course->level ?? 'Beginner' }}</span>
                    <div class="course-rating">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span>{{ $course->rating ?? '4.9' }}</span>
                    </div>
                </div>

                <div class="course-content">
                    <div class="course-meta">
                        <span class="course-category">{{ $course->category ?? 'Programming' }}</span>
                        <div class="course-duration">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $course->duration ?? '12 jam' }}</span>
                        </div>
                    </div>

                    <h3 class="course-title">{{ $course->name ?? 'Mastering Modern Web Development' }}</h3>
                    <p class="course-description">{{ $course->description ?? 'Pelajari teknologi web terdepan dengan pendekatan praktis dan project-based learning yang akan mengakselerasi karir Anda sebagai developer.' }}</p>

                    <div class="course-instructor">
                        <div class="instructor-avatar">{{ substr($course->instructor ?? 'JD', 0, 2) }}</div>
                        <div class="instructor-info">
                            <div class="instructor-name">{{ $course->instructor ?? 'John Doe' }}</div>
                            <div class="instructor-role">Senior Full-Stack Developer</div>
                        </div>
                    </div>

                    <div class="course-footer">
                        <div class="course-stats">
                            <div class="stat-item tooltip">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span>{{ $course->students ?? rand(500, 2500) }}</span>
                                <div class="tooltip-content">Total Students</div>
                            </div>
                            <div class="stat-item tooltip">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span>{{ $course->modules ?? '18' }} Modul</span>
                                <div class="tooltip-content">Course Modules</div>
                            </div>
                        </div>

                        <a href="{{ url('/lms/' . ($course->id ?? 1)) }}" class="course-action">
                            <span style="position: relative; z-index: 2;">Mulai Sekarang</span>
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="position: relative; z-index: 2;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Progress Bar -->
                    @if(isset($course->progress))
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $course->progress }}%"></div>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <!-- Premium Default Course Cards -->
            @for($i = 1; $i <= 6; $i++)
            <div class="course-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" data-category="{{ ['programming', 'design', 'business', 'marketing', 'data', 'programming'][$i-1] }}">
                <div class="course-image-wrapper">
                    <img src="https://images.unsplash.com/photo-{{ [1516321318423, 1551434678, 1559056199, 1552664688, 1504384308, 1498050108][$i-1] }}-f06f85e504b3?w=800&h=600&fit=crop&crop=entropy&auto=format&q=80"
                         alt="Course {{ $i }}"
                         class="course-image">
                    <div class="course-overlay"></div>
                    <span class="course-badge">{{ ['Beginner', 'Intermediate', 'Advanced', 'Expert', 'Beginner', 'Intermediate'][$i-1] }}</span>
                    <div class="course-rating">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span>{{ number_format(4.7 + ($i * 0.05), 1) }}</span>
                    </div>
                </div>

                <div class="course-content">
                    <div class="course-meta">
                        <span class="course-category">{{ ['💻 Programming', '🎨 Design', '📊 Business', '📈 Marketing', '🔬 Data Science', '⚡ Programming'][$i-1] }}</span>
                        <div class="course-duration">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ 8 + ($i * 2) }} jam</span>
                        </div>
                    </div>

                    <h3 class="course-title">
                        {{ ['Mastering Modern Web Development', 'Advanced UI/UX Design Principles', 'Strategic Digital Marketing', 'Business Intelligence & Analytics', 'Machine Learning Fundamentals', 'Full-Stack React Development'][$i-1] }}
                    </h3>
                    <p class="course-description">
                        {{ ['Pelajari teknologi web terdepan dengan pendekatan praktis dan project-based learning yang akan mengakselerasi karir Anda.',
                            'Kuasai prinsip desain modern untuk menciptakan pengalaman pengguna yang memukau dan conversion-driven.',
                            'Strategi pemasaran digital komprehensif untuk mendominasi pasar dan meningkatkan ROI bisnis Anda.',
                            'Analisis data bisnis tingkat lanjut untuk pengambilan keputusan strategis yang data-driven.',
                            'Pahami konsep machine learning dan implementasi praktis untuk membangun solusi AI yang powerful.',
                            'Teknik advanced React untuk membangun aplikasi web enterprise-grade yang scalable dan performant.'][$i-1] }}
                    </p>

                    <div class="course-instructor">
                        <div class="instructor-avatar">{{ substr(['JD', 'SM', 'RK', 'AP', 'ML', 'TC'][$i-1], 0, 2) }}</div>
                        <div class="instructor-info">
                            <div class="instructor-name">{{ ['John Doe', 'Sarah Miller', 'Robert Kim', 'Anna Park', 'Mike Lee', 'Tom Chen'][$i-1] }}</div>
                            <div class="instructor-role">{{ ['Senior Full-Stack Developer', 'Lead UI/UX Designer', 'Digital Marketing Expert', 'Data Science Director', 'ML Research Engineer', 'React Architect'][$i-1] }}</div>
                        </div>
                    </div>

                    <div class="course-footer">
                        <div class="course-stats">
                            <div class="stat-item tooltip">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span>{{ 500 + ($i * 300) }}</span>
                                <div class="tooltip-content">Total Students</div>
                            </div>
                            <div class="stat-item tooltip">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span>{{ 12 + ($i * 2) }} Modul</span>
                                <div class="tooltip-content">Course Modules</div>
                            </div>
                        </div>

                        <a href="{{ url('/lms/' . $i) }}" class="course-action">
                            <span style="position: relative; z-index: 2;">Mulai Sekarang</span>
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="position: relative; z-index: 2;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Progress Bar for some courses -->
                    @if($i <= 3)
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ 20 + ($i * 15) }}%"></div>
                    </div>
                    @endif
                </div>
            </div>
            @endfor
            @endforelse
        </div>

        <!-- Enhanced Load More Button -->
        <div class="text-center mt-16" data-aos="fade-up">
            <button class="load-more-btn">
                <span style="position: relative; z-index: 2;">Jelajahi Semua Kursus</span>
            </button>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS with enhanced settings
    AOS.init({
        duration: 1200,
        once: true,
        offset: 120,
        easing: 'ease-out-cubic'
    });

    // Enhanced Animated Counter with Intersection Observer
    const counters = document.querySelectorAll('.stat-number');
    const counterOptions = {
        threshold: 0.8,
        rootMargin: '0px 0px -100px 0px'
    };

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateCount = () => {
            if (current < target) {
                current += increment;
                counter.innerText = Math.floor(current);
                requestAnimationFrame(updateCount);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };

        updateCount();
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                if (!counter.classList.contains('counted')) {
                    setTimeout(() => animateCounter(counter), Math.random() * 500);
                    counter.classList.add('counted');
                }
            }
        });
    }, counterOptions);

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });

    // Enhanced Filter functionality with smooth animations
    const filterButtons = document.querySelectorAll('.filter-pill');
    const courseCards = document.querySelectorAll('.course-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.transform = 'translateY(0) scale(1)';
            });

            // Add active class to clicked button
            button.classList.add('active');
            button.style.transform = 'translateY(-2px) scale(1.05)';

            const filter = button.getAttribute('data-filter');

            // Animate cards out
            courseCards.forEach((card, index) => {
                card.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                card.style.transform = 'translateY(20px) scale(0.95)';
                card.style.opacity = '0';

                setTimeout(() => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                        // Animate cards back in
                        setTimeout(() => {
                            card.style.transform = 'translateY(0) scale(1)';
                            card.style.opacity = '1';
                        }, index * 50);
                    } else {
                        card.style.display = 'none';
                    }
                }, 200);
            });
        });
    });

    // Enhanced Search functionality with debouncing
    const searchBar = document.querySelector('.search-bar');
    const searchBtn = document.querySelector('.search-btn');
    let searchTimeout;

    const performSearch = () => {
        const searchTerm = searchBar.value.toLowerCase().trim();

        courseCards.forEach((card, index) => {
            const title = card.querySelector('.course-title').textContent.toLowerCase();
            const description = card.querySelector('.course-description').textContent.toLowerCase();
            const category = card.querySelector('.course-category').textContent.toLowerCase();

            // Animate out first
            card.style.transition = 'all 0.3s ease';
            card.style.transform = 'translateY(10px)';
            card.style.opacity = '0';

            setTimeout(() => {
                if (!searchTerm || title.includes(searchTerm) || description.includes(searchTerm) || category.includes(searchTerm)) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.transform = 'translateY(0)';
                        card.style.opacity = '1';
                    }, index * 30);
                } else {
                    card.style.display = 'none';
                }
            }, 150);
        });
    };

    const debouncedSearch = () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 300);
    };

    searchBar.addEventListener('input', debouncedSearch);
    searchBtn.addEventListener('click', performSearch);

    // Enhanced search bar interactions
    searchBar.addEventListener('focus', () => {
        searchBar.parentElement.style.transform = 'translateY(-4px) scale(1.02)';
        searchBar.parentElement.style.boxShadow = '0 40px 80px rgba(0,0,0,0.25)';
    });

    searchBar.addEventListener('blur', () => {
        searchBar.parentElement.style.transform = 'translateY(0) scale(1)';
        searchBar.parentElement.style.boxShadow = '0 25px 50px rgba(0,0,0,0.15)';
    });

    // Enhanced parallax effect
    let ticking = false;

    const updateParallax = () => {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.3;
        const heroPattern = document.querySelector('.hero-pattern');
        const shapes = document.querySelectorAll('.shape');

        if (heroPattern) {
            heroPattern.style.transform = `translate3d(0, ${rate}px, 0)`;
        }

        shapes.forEach((shape, index) => {
            const speed = 0.3 + (index * 0.1);
            const yPos = -(scrolled * speed);
            shape.style.transform = `translate3d(0, ${yPos}px, 0) rotate(${scrolled * 0.02}deg)`;
        });

        ticking = false;
    };

    const requestTick = () => {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    };

    window.addEventListener('scroll', requestTick);

    // Enhanced Course card hover effects with magnetic interaction
    courseCards.forEach(card => {
        let isHovered = false;
        card.classList.add('magnetic');
        
        // Magnetic effect
        card.addEventListener('mousemove', (e) => {
            if (!isHovered) return;
            
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            const distance = Math.sqrt(x * x + y * y);
            const maxDistance = Math.max(rect.width, rect.height) / 2;
            const strength = Math.min(distance / maxDistance, 1);
            
            const rotateX = (y / rect.height) * 10 * strength;
            const rotateY = (x / rect.width) * -10 * strength;
            
            card.style.transform = `translateY(-20px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.03)`;
        });
        
        card.addEventListener('mouseenter', () => {
            isHovered = true;
            
            // Add subtle scale and glow to other cards
            courseCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.style.transform = 'scale(0.97)';
                    otherCard.style.opacity = '0.6';
                    otherCard.style.filter = 'blur(1px)';
                }
            });
            
            // Add ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(102, 126, 234, 0.1);
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
                z-index: 1;
            `;
            
            const rect = card.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (rect.width / 2 - size / 2) + 'px';
            ripple.style.top = (rect.height / 2 - size / 2) + 'px';
            
            card.appendChild(ripple);
            
            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 600);
        });

        card.addEventListener('mouseleave', () => {
            isHovered = false;
            
            // Reset all cards with smooth transition
            courseCards.forEach(otherCard => {
                otherCard.style.transform = 'scale(1)';
                otherCard.style.opacity = '1';
                otherCard.style.filter = 'blur(0)';
            });
        });
        
        // Add click animation with enhanced feedback
        card.addEventListener('click', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const clickRipple = document.createElement('div');
            clickRipple.style.cssText = `
                position: absolute;
                left: ${x}px;
                top: ${y}px;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(102, 126, 234, 0.3);
                transform: translate(-50%, -50%);
                animation: clickRipple 0.6s ease-out;
                pointer-events: none;
                z-index: 10;
            `;
            
            card.appendChild(clickRipple);
            
            // Add click feedback
            card.style.transform = 'translateY(-20px) rotateX(0deg) rotateY(0deg) scale(0.98)';
            setTimeout(() => {
                card.style.transform = 'translateY(-20px) rotateX(0deg) rotateY(0deg) scale(1.03)';
            }, 150);
            
            setTimeout(() => {
                if (clickRipple.parentNode) {
                    clickRipple.parentNode.removeChild(clickRipple);
                }
            }, 600);
        });
    });

    // Enhanced smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const targetPosition = target.offsetTop - 100;
                const startPosition = window.pageYOffset;
                const distance = targetPosition - startPosition;
                const duration = 1000;
                let start = null;

                const step = (timestamp) => {
                    if (!start) start = timestamp;
                    const progress = timestamp - start;
                    const percentage = Math.min(progress / duration, 1);

                    // Easing function
                    const ease = percentage < 0.5 ? 4 * percentage * percentage * percentage : (percentage - 1) * (2 * percentage - 2) * (2 * percentage - 2) + 1;

                    window.scrollTo(0, startPosition + distance * ease);

                    if (progress < duration) {
                        window.requestAnimationFrame(step);
                    }
                };

                window.requestAnimationFrame(step);
            }
        });
    });

    // Load more button enhancement
    const loadMoreBtn = document.querySelector('.load-more-btn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            loadMoreBtn.style.transform = 'scale(0.95)';
            setTimeout(() => {
                loadMoreBtn.style.transform = 'scale(1)';
            }, 150);

            // Simulate loading more courses
            setTimeout(() => {
                // Add loading animation or load more courses
                console.log('Loading more courses...');
            }, 300);
        });
    }

    // Intersection Observer for fade-in animations
    const fadeInElements = document.querySelectorAll('.fade-in-up, .fade-in');
    const fadeInOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -50px 0px'
    };

    const fadeInObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, fadeInOptions);

    fadeInElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
        fadeInObserver.observe(element);
    });

    // Progress bar animation
    const progressBars = document.querySelectorAll('.progress-fill');
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBar = entry.target;
                const width = progressBar.style.width;
                progressBar.style.width = '0%';
                setTimeout(() => {
                    progressBar.style.width = width;
                }, 200);
            }
        });
    }, { threshold: 0.5 });

    progressBars.forEach(bar => {
        progressObserver.observe(bar);
    });

    // Keyboard navigation enhancement
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            searchBar.blur();
        }
        if (e.key === '/' && !searchBar.matches(':focus')) {
            e.preventDefault();
            searchBar.focus();
        }
    });

    // Performance optimization: Throttle resize events
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Recalculate layouts if needed
            AOS.refresh();
        }, 250);
    });

    console.log('🚀 LMS Revolution initialized successfully!');
});
</script>
@endsection
