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

    /* Custom Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        padding: 8rem 0 6rem;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: float 6s ease-in-out infinite;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(45deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
        animation: fadeInUp 1s ease-out;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #e2e8f0;
        margin-bottom: 2rem;
        animation: fadeInUp 1s ease-out 0.2s both;
    }

    /* Search Bar */
    .search-container {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        animation: fadeInUp 1s ease-out 0.4s both;
    }

    .search-bar {
        width: 100%;
        padding: 1rem 1.5rem 1rem 3.5rem;
        border: none;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .search-bar:focus {
        outline: none;
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .search-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        width: 1.25rem;
        height: 1.25rem;
    }

    /* Stats Section */
    .stats-section {
        background: white;
        padding: 4rem 0;
        margin-top: -3rem;
        position: relative;
        z-index: 10;
        border-radius: 2rem 2rem 0 0;
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        transition: all 0.3s ease;
        animation: fadeInUp 1s ease-out;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #64748b;
        font-weight: 500;
    }

    /* Course Grid */
    .courses-section {
        padding: 4rem 0;
        background: #f8fafc;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1rem;
        color: #1e293b;
        animation: fadeInUp 1s ease-out;
    }

    .section-subtitle {
        text-align: center;
        color: #64748b;
        font-size: 1.125rem;
        margin-bottom: 3rem;
        animation: fadeInUp 1s ease-out 0.2s both;
    }

    .course-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .course-card {
        background: white;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 1s ease-out;
        position: relative;
    }

    .course-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .course-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .course-card:hover::before {
        transform: scaleX(1);
    }

    .course-image {
        height: 200px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }

    .course-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M20 20c0-11.046-8.954-20-20-20v20h20z'/%3E%3C/g%3E%3C/svg%3E");
    }

    .course-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 3rem;
        height: 3rem;
        color: white;
        opacity: 0.9;
    }

    .course-content {
        padding: 1.5rem;
    }

    .course-category {
        display: inline-block;
        background: #ede9fe;
        color: #7c3aed;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .course-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #1e293b;
        line-height: 1.4;
    }

    .course-description {
        color: #64748b;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .course-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #e2e8f0;
    }

    .course-duration {
        display: flex;
        align-items: center;
        color: #64748b;
        font-size: 0.875rem;
    }

    .course-level {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .level-beginner {
        background: #dcfce7;
        color: #16a34a;
    }

    .level-intermediate {
        background: #fef3c7;
        color: #d97706;
    }

    .level-advanced {
        background: #fee2e2;
        color: #dc2626;
    }

    .course-btn {
        width: 100%;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .course-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    /* Filter Section */
    .filter-section {
        background: white;
        padding: 2rem 0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .filter-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.5rem 1.5rem;
        border: 2px solid #e2e8f0;
        background: white;
        color: #64748b;
        border-radius: 9999px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: #667eea;
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .course-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .filter-container {
            flex-direction: column;
            align-items: center;
        }
    }

    /* Loading Animation */
    .loading {
        opacity: 0.5;
        pointer-events: none;
    }

    .loading .course-card {
        animation: pulse 2s infinite;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container mx-auto px-4 text-center">
        <h1 class="hero-title">Learning Management System</h1>
        <p class="hero-subtitle">Temukan course terbaik untuk mengembangkan skill Anda menuju masa depan yang cemerlang</p>

        <!-- Search Bar -->
        <div class="search-container">
            <div class="relative">
                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" class="search-bar" placeholder="Cari course yang Anda inginkan..." id="courseSearch">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-label">Total Courses</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Students</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <div class="stat-label">Expert Instructors</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">95%</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section">
    <div class="filter-container">
        <button class="filter-btn active" data-filter="all">Semua Course</button>
        <button class="filter-btn" data-filter="programming">Programming</button>
        <button class="filter-btn" data-filter="design">Design</button>
        <button class="filter-btn" data-filter="business">Business</button>
        <button class="filter-btn" data-filter="marketing">Marketing</button>
        <button class="filter-btn" data-filter="data-science">Data Science</button>
    </div>
</section>

<!-- Courses Section -->
<section class="courses-section">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Course Populer</h2>
        <p class="section-subtitle">Pilih dari berbagai course berkualitas tinggi yang dirancang oleh para ahli</p>

        <div class="course-grid" id="courseGrid">
            <!-- JavaScript Course -->
            <div class="course-card" data-category="programming">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Programming</span>
                    <h3 class="course-title">JavaScript Modern & ES6+</h3>
                    <p class="course-description">Pelajari JavaScript modern dengan ES6+ features, async/await, dan best practices untuk web development.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            24 jam
                        </div>
                        <span class="course-level level-intermediate">Intermediate</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- React Course -->
            <div class="course-card" data-category="programming">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Programming</span>
                    <h3 class="course-title">React.js Fundamental</h3>
                    <p class="course-description">Kuasai React.js dari dasar hingga mahir dengan hooks, context API, dan state management.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            32 jam
                        </div>
                        <span class="course-level level-intermediate">Intermediate</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- UI/UX Design Course -->
            <div class="course-card" data-category="design">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Design</span>
                    <h3 class="course-title">UI/UX Design Mastery</h3>
                    <p class="course-description">Pelajari prinsip design thinking, user research, prototyping, dan tools design modern.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            28 jam
                        </div>
                        <span class="course-level level-beginner">Beginner</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- Python Course -->
            <div class="course-card" data-category="programming">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Programming</span>
                    <h3 class="course-title">Python untuk Data Science</h3>
                    <p class="course-description">Belajar Python dari basic hingga data analysis dengan pandas, numpy, dan machine learning.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            40 jam
                        </div>
                        <span class="course-level level-beginner">Beginner</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- Digital Marketing Course -->
            <div class="course-card" data-category="marketing">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Marketing</span>
                    <h3 class="course-title">Digital Marketing Strategy</h3>
                    <p class="course-description">Strategi digital marketing lengkap: SEO, SEM, social media, content marketing, dan analytics.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            20 jam
                        </div>
                        <span class="course-level level-intermediate">Intermediate</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- Business Analytics Course -->
            <div class="course-card" data-category="business">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Business</span>
                    <h3 class="course-title">Business Analytics</h3>
                    <p class="course-description">Analisis data bisnis menggunakan Excel, SQL, dan tools analytics untuk decision making.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            36 jam
                        </div>
                        <span class="course-level level-intermediate">Intermediate</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- Machine Learning Course -->
            <div class="course-card" data-category="data-science">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Data Science</span>
                    <h3 class="course-title">Machine Learning Fundamentals</h3>
                    <p class="course-description">Konsep dasar machine learning, algoritma populer, dan implementasi dengan Python scikit-learn.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            45 jam
                        </div>
                        <span class="course-level level-advanced">Advanced</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>

            <!-- Graphic Design Course -->
            <div class="course-card" data-category="design">
                <div class="course-image">
                    <svg class="course-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div class="course-content">
                    <span class="course-category">Design</span>
                    <h3 class="course-title">Graphic Design Mastery</h3>
                    <p class="course-description">Belajar desain grafis profesional dengan Adobe Creative Suite: Photoshop, Illustrator, InDesign.</p>
                    <div class="course-meta">
                        <div class="course-duration">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            30 jam
                        </div>
                        <span class="course-level level-beginner">Beginner</span>
                    </div>
                    <button class="course-btn">Lihat Course</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('courseSearch');
    const courseCards = document.querySelectorAll('.course-card');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const courseGrid = document.getElementById('courseGrid');

    // Search courses
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        courseCards.forEach(card => {
            const title = card.querySelector('.course-title').textContent.toLowerCase();
            const description = card.querySelector('.course-description').textContent.toLowerCase();
            const category = card.querySelector('.course-category').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm) || category.includes(searchTerm)) {
                card.style.display = 'block';
                card.style.animation = 'fadeInUp 0.5s ease-out';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Filter courses
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');

            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Add loading state
            courseGrid.classList.add('loading');

            setTimeout(() => {
                courseCards.forEach(card => {
                    if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeInUp 0.5s ease-out';
                    } else {
                        card.style.display = 'none';
                    }
                });

                courseGrid.classList.remove('loading');
            }, 300);
        });
    });

    // Smooth scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 1s ease-out';
                entry.target.style.opacity = '1';
            }
        });
    }, observerOptions);

    // Observe all course cards
    courseCards.forEach(card => {
        card.style.opacity = '0';
        observer.observe(card);
    });

    // Add parallax effect to hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.hero-section');

        if (heroSection) {
            heroSection.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Course card click handlers
    const courseButtons = document.querySelectorAll('.course-btn');
    courseButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);

            // You can add navigation logic here
            console.log('Course clicked:', this.closest('.course-card').querySelector('.course-title').textContent);
        });
    });

    // Add smooth scrolling for internal links
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
});
</script>
@endsection
