@extends('layouts.app')

@section('title', 'Learning Management System')

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        --hover-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .hero-section {
        background: var(--primary-gradient);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: -50%;
        width: 200%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: float 20s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateX(0) translateY(0); }
        25% { transform: translateX(-10px) translateY(-10px); }
        50% { transform: translateX(10px) translateY(5px); }
        75% { transform: translateX(-5px) translateY(10px); }
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        animation: fadeInUp 0.8s ease;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: rgba(255,255,255,0.95);
        margin-bottom: 2rem;
        animation: fadeInUp 1s ease;
    }

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

    .search-box {
        max-width: 600px;
        margin: 0 auto;
        animation: fadeInUp 1.2s ease;
    }

    .search-input {
        padding: 18px 25px;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .search-input:focus {
        box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        transform: translateY(-2px);
    }

    .stats-container {
        display: flex;
        justify-content: center;
        gap: 60px;
        margin-top: 50px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        color: white;
        animation: fadeInUp 1.4s ease;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 1rem;
        opacity: 0.9;
    }

    .course-section {
        padding: 80px 0;
        background: transparent;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 15px;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: #6c757d;
    }

    .course-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 35px;
        margin-top: 50px;
    }

    .course-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        cursor: pointer;
    }

    .course-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .course-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--hover-shadow);
    }

    .course-card:hover::before {
        transform: scaleX(1);
    }

    .course-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.6s ease;
        position: relative;
    }

    .course-card:hover .course-image {
        transform: scale(1.1);
    }

    .course-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255,255,255,0.95);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #764ba2;
        backdrop-filter: blur(10px);
        z-index: 1;
    }

    .course-content {
        padding: 25px;
        position: relative;
    }

    .course-category {
        display: inline-block;
        padding: 6px 15px;
        background: linear-gradient(135deg, #667eea20, #764ba220);
        border-radius: 20px;
        font-size: 0.85rem;
        color: #764ba2;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .course-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 12px;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .course-card:hover .course-title {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .course-description {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .course-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
    }

    .course-stats {
        display: flex;
        gap: 20px;
    }

    .stat {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .stat i {
        color: #667eea;
    }

    .course-action {
        background: var(--primary-gradient);
        color: white;
        padding: 12px 28px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
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
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        color: white;
        text-decoration: none;
    }

    .course-action:hover::before {
        width: 300px;
        height: 300px;
    }

    .instructor-info {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .instructor-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }

    .instructor-details {
        flex: 1;
    }

    .instructor-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2d3436;
    }

    .instructor-title {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .filter-tabs {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 50px;
        flex-wrap: wrap;
    }

    .filter-tab {
        padding: 12px 30px;
        background: white;
        border: 2px solid transparent;
        border-radius: 30px;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-tab:hover {
        border-color: #667eea;
        color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
    }

    .filter-tab.active {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .course-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }
        
        .stats-container {
            gap: 30px;
        }
    }

    .loading-skeleton {
        animation: pulse 1.5s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container hero-content">
        <h1 class="hero-title text-center">Learning Management System</h1>
        <p class="hero-subtitle text-center">Tingkatkan kemampuan Anda dengan kursus berkualitas dari instruktur terbaik</p>
        
        <div class="search-box">
            <input type="text" class="form-control search-input" placeholder="Cari kursus yang Anda inginkan...">
        </div>
        
        <div class="stats-container">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <span class="stat-number">1,234</span>
                <span class="stat-label">Siswa Aktif</span>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <span class="stat-number">50+</span>
                <span class="stat-label">Kursus Tersedia</span>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <span class="stat-number">98%</span>
                <span class="stat-label">Tingkat Kepuasan</span>
            </div>
        </div>
    </div>
</section>

<!-- Course Section -->
<section class="course-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Kursus Populer</h2>
            <p class="section-subtitle">Pilih kursus terbaik untuk pengembangan karir Anda</p>
        </div>
        
        <div class="filter-tabs" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-tab active">Semua</button>
            <button class="filter-tab">Programming</button>
            <button class="filter-tab">Design</button>
            <button class="filter-tab">Business</button>
            <button class="filter-tab">Marketing</button>
        </div>
        
        <div class="course-grid">
            @forelse($courses as $course)
            <div class="course-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div style="position: relative; overflow: hidden;">
                    @if($course->is_featured)
                    <span class="course-badge">Featured</span>
                    @endif
                    <img src="{{ $course->image ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $course->name }}" class="course-image">
                </div>
                
                <div class="course-content">
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
