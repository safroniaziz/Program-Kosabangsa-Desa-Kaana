@extends('layouts.app')

@section('title', 'Learning - Ekonomi Maritim & Perikanan')

@section('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Learning Custom CSS -->
<style>
/* Modern Learning Interface Styles */
.learning-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
}

.sidebar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.content-area {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.material-item {
    transition: all 0.3s ease;
    border-radius: 12px;
    border: 2px solid transparent;
}

.material-item:hover {
    background: #f0f9ff;
    border-color: #3b82f6;
    transform: translateX(8px);
}

.material-item.active {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border-color: #1d4ed8;
    transform: translateX(8px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.progress-circle {
    width: 60px;
    height: 60px;
    background: conic-gradient(#3b82f6 calc(var(--progress) * 1%), #e5e7eb 0);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.progress-circle::before {
    content: '';
    width: 45px;
    height: 45px;
    background: white;
    border-radius: 50%;
    position: absolute;
}

.progress-text {
    position: relative;
    z-index: 1;
    font-weight: bold;
    color: #1f2937;
}

.video-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 16px;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    border: none;
    color: white;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1d4ed8, #1e40af);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
}

.completion-badge {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.learning-content {
    max-height: calc(100vh - 200px);
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #3b82f6 #f1f5f9;
}

.learning-content::-webkit-scrollbar {
    width: 6px;
}

.learning-content::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.learning-content::-webkit-scrollbar-thumb {
    background: #3b82f6;
    border-radius: 3px;
}

.floating-nav {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 12px;
    z-index: 1000;
}

.nav-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    transition: all 0.3s ease;
}

.nav-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
}

.nav-btn:disabled {
    background: #9ca3af;
    cursor: not-allowed;
    transform: none;
}

/* Animation keyframes */
@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
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

.slide-in {
    animation: slideInRight 0.5s ease-out;
}

.fade-in {
    animation: fadeInUp 0.6s ease-out;
}
</style>
@endsection

@section('content')
<div class="learning-container">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 h-screen">

            <!-- Sidebar - Module Materials -->
            <div class="lg:col-span-1 sidebar p-6 rounded-2xl">
                <!-- Module Header -->
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <a href="{{ route('lms') }}" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                        </a>
                        <div class="progress-circle" style="--progress: 25">
                            <span class="progress-text text-sm">25%</span>
                        </div>
                    </div>

                    <h1 class="text-xl font-bold text-gray-800 mb-2" id="moduleTitle">HTML & CSS Fundamentals</h1>
                    <p class="text-sm text-gray-600 mb-4">Modul {{ $module }} dari 8</p>

                    <div class="flex items-center gap-4 text-xs text-gray-500">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>12 jam</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span>8 materi</span>
                        </div>
                    </div>
                </div>

                <!-- Materials List -->
                <div class="space-y-2" id="materialsList">
                    <!-- Materials will be populated by JavaScript -->
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3 content-area p-8 rounded-2xl">
                <div class="learning-content" id="learningContent">
                    <!-- Content will be populated by JavaScript -->
                    <div class="text-center py-20">
                        <div class="animate-spin rounded-full h-16 w-16 border-4 border-blue-500 border-t-transparent mx-auto mb-4"></div>
                        <p class="text-gray-600">Memuat materi pembelajaran...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Navigation -->
    <div class="floating-nav">
        <button class="nav-btn" id="prevBtn" onclick="previousMaterial()" disabled>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button class="nav-btn" id="nextBtn" onclick="nextMaterial()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </div>
</div>

<script>
// Learning page JavaScript
let currentModule = {{ $module }};
let currentMaterialIndex = 0;
let materials = [];

// Sample data based on module
const moduleData = {
    1: {
        title: 'HTML & CSS Fundamentals',
        description: 'Pelajari dasar-dasar HTML5 dan CSS3, semantic elements, flexbox, grid, dan responsive design.',
        duration: '12 jam',
        materialsCount: 8,
        materials: [
            {
                id: 1,
                title: 'Pengenalan HTML5',
                type: 'text',
                duration: '30 menit',
                content: `
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Pengenalan HTML5</h2>

                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 text-lg mb-6">
                            HTML (HyperText Markup Language) adalah bahasa markup standar untuk membuat halaman web.
                            HTML5 adalah versi terbaru yang memiliki fitur-fitur canggih dan semantic elements yang lebih baik.
                        </p>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Apa itu HTML5?</h3>
                        <p class="text-gray-600 mb-4">
                            HTML5 adalah evolusi dari HTML yang memperkenalkan elemen-elemen baru, API yang lebih powerful,
                            dan dukungan yang lebih baik untuk aplikasi web modern.
                        </p>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Fitur Utama HTML5:</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Semantic Elements (header, nav, main, section, article, aside, footer)</li>
                            <li>Form Controls baru (email, date, range, search)</li>
                            <li>Canvas untuk graphics</li>
                            <li>Audio dan Video elements</li>
                            <li>Local Storage</li>
                            <li>Geolocation API</li>
                        </ul>

                        <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-6">
                            <h4 class="text-lg font-semibold text-blue-800 mb-2">💡 Tips Penting</h4>
                            <p class="text-blue-700">
                                Selalu gunakan DOCTYPE HTML5 di awal dokumen: <code class="bg-blue-100 px-2 py-1 rounded">&lt;!DOCTYPE html&gt;</code>
                            </p>
                        </div>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Struktur Dasar HTML5:</h3>
                        <div class="bg-gray-900 text-green-400 p-6 rounded-lg mb-6 overflow-x-auto">
                            <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Judul Halaman&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;header&gt;
        &lt;h1&gt;Judul Utama&lt;/h1&gt;
    &lt;/header&gt;

    &lt;main&gt;
        &lt;section&gt;
            &lt;h2&gt;Konten Utama&lt;/h2&gt;
            &lt;p&gt;Paragraf konten...&lt;/p&gt;
        &lt;/section&gt;
    &lt;/main&gt;

    &lt;footer&gt;
        &lt;p&gt;&copy; 2025 Website Saya&lt;/p&gt;
    &lt;/footer&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                        </div>
                    </div>
                `,
                videoUrl: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                completed: false
            },
            {
                id: 2,
                title: 'Semantic Elements',
                type: 'text',
                duration: '45 menit',
                content: `
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Semantic Elements HTML5</h2>

                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 text-lg mb-6">
                            Semantic elements adalah elemen HTML yang memiliki makna yang jelas tentang konten yang dikandungnya.
                            Ini membantu search engines, screen readers, dan developer memahami struktur halaman.
                        </p>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Mengapa Semantic Elements Penting?</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li><strong>SEO yang lebih baik:</strong> Search engines dapat memahami konten dengan lebih baik</li>
                            <li><strong>Accessibility:</strong> Screen readers dapat navigasi dengan lebih mudah</li>
                            <li><strong>Maintainability:</strong> Kode lebih mudah dibaca dan dipelihara</li>
                            <li><strong>Struktur yang jelas:</strong> Hierarki konten menjadi lebih terorganisir</li>
                        </ul>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Elemen-elemen Semantic HTML5:</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-200">
                                <h4 class="text-lg font-bold text-blue-800 mb-3">&lt;header&gt;</h4>
                                <p class="text-blue-700 text-sm">Berisi informasi pengantar atau navigasi. Biasanya logo, judul, dan menu utama.</p>
                            </div>

                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-200">
                                <h4 class="text-lg font-bold text-green-800 mb-3">&lt;nav&gt;</h4>
                                <p class="text-green-700 text-sm">Berisi link navigasi utama. Seperti menu, breadcrumb, atau pagination.</p>
                            </div>

                            <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-6 rounded-xl border border-purple-200">
                                <h4 class="text-lg font-bold text-purple-800 mb-3">&lt;main&gt;</h4>
                                <p class="text-purple-700 text-sm">Konten utama halaman. Hanya boleh ada satu per halaman.</p>
                            </div>

                            <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-6 rounded-xl border border-orange-200">
                                <h4 class="text-lg font-bold text-orange-800 mb-3">&lt;section&gt;</h4>
                                <p class="text-orange-700 text-sm">Bagian tematik dari konten. Biasanya memiliki heading sendiri.</p>
                            </div>
                        </div>

                        <div class="bg-gray-900 text-green-400 p-6 rounded-lg mb-6 overflow-x-auto">
                            <pre><code>&lt;!-- Contoh penggunaan semantic elements --&gt;
&lt;header&gt;
    &lt;h1&gt;Website Pembelajaran&lt;/h1&gt;
    &lt;nav&gt;
        &lt;ul&gt;
            &lt;li&gt;&lt;a href="#home"&gt;Home&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="#about"&gt;About&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="#courses"&gt;Courses&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
&lt;/header&gt;

&lt;main&gt;
    &lt;section id="hero"&gt;
        &lt;h2&gt;Belajar Web Development&lt;/h2&gt;
        &lt;p&gt;Mulai journey Anda menjadi developer handal&lt;/p&gt;
    &lt;/section&gt;

    &lt;section id="courses"&gt;
        &lt;h2&gt;Kursus Tersedia&lt;/h2&gt;
        &lt;article&gt;
            &lt;h3&gt;HTML & CSS&lt;/h3&gt;
            &lt;p&gt;Pelajari dasar-dasar web development&lt;/p&gt;
        &lt;/article&gt;
    &lt;/section&gt;
&lt;/main&gt;

&lt;aside&gt;
    &lt;h3&gt;Info Tambahan&lt;/h3&gt;
    &lt;p&gt;Tips dan trik untuk developer pemula&lt;/p&gt;
&lt;/aside&gt;

&lt;footer&gt;
    &lt;p&gt;&copy; 2025 Learning Platform&lt;/p&gt;
&lt;/footer&gt;</code></pre>
                        </div>
                    </div>
                `,
                videoUrl: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                completed: false
            },
            {
                id: 3,
                title: 'CSS Selectors & Properties',
                type: 'text',
                duration: '60 menit',
                content: `
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">CSS Selectors & Properties</h2>

                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 text-lg mb-6">
                            CSS (Cascading Style Sheets) digunakan untuk mengatur tampilan dan layout halaman web.
                            Dengan CSS, kita dapat mengubah warna, font, ukuran, posisi, dan animasi elemen HTML.
                        </p>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">CSS Selectors</h3>
                        <p class="text-gray-600 mb-4">
                            Selectors adalah cara untuk memilih elemen HTML yang ingin kita beri style.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="bg-gradient-to-br from-red-50 to-pink-50 p-6 rounded-xl border border-red-200">
                                <h4 class="text-lg font-bold text-red-800 mb-3">Element Selector</h4>
                                <code class="text-red-700 bg-red-100 px-2 py-1 rounded">h1 { color: blue; }</code>
                                <p class="text-red-700 text-sm mt-2">Memilih semua elemen h1</p>
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-200">
                                <h4 class="text-lg font-bold text-blue-800 mb-3">Class Selector</h4>
                                <code class="text-blue-700 bg-blue-100 px-2 py-1 rounded">.container { width: 100%; }</code>
                                <p class="text-blue-700 text-sm mt-2">Memilih elemen dengan class="container"</p>
                            </div>

                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-200">
                                <h4 class="text-lg font-bold text-green-800 mb-3">ID Selector</h4>
                                <code class="text-green-700 bg-green-100 px-2 py-1 rounded">#header { height: 80px; }</code>
                                <p class="text-green-700 text-sm mt-2">Memilih elemen dengan id="header"</p>
                            </div>

                            <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-6 rounded-xl border border-purple-200">
                                <h4 class="text-lg font-bold text-purple-800 mb-3">Descendant Selector</h4>
                                <code class="text-purple-700 bg-purple-100 px-2 py-1 rounded">nav a { text-decoration: none; }</code>
                                <p class="text-purple-700 text-sm mt-2">Memilih semua elemen a di dalam nav</p>
                            </div>
                        </div>

                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">CSS Properties yang Sering Digunakan</h3>

                        <div class="space-y-4 mb-6">
                            <div class="bg-white p-6 rounded-xl border-2 border-gray-200 shadow-sm">
                                <h4 class="text-lg font-bold text-gray-800 mb-3">Typography</h4>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">font-family</code> - Jenis font</div>
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">font-size</code> - Ukuran font</div>
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">font-weight</code> - Ketebalan font</div>
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">line-height</code> - Tinggi baris</div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl border-2 border-gray-200 shadow-sm">
                                <h4 class="text-lg font-bold text-gray-800 mb-3">Colors & Backgrounds</h4>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">color</code> - Warna teks</div>
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">background-color</code> - Warna background</div>
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">background-image</code> - Gambar background</div>
                                    <div><code class="bg-gray-100 px-2 py-1 rounded">opacity</code> - Transparansi</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-amber-50 border-l-4 border-amber-500 p-6 mb-6">
                            <h4 class="text-lg font-semibold text-amber-800 mb-2">🎯 Praktik Terbaik</h4>
                            <ul class="text-amber-700 space-y-1 text-sm">
                                <li>• Gunakan class selector lebih sering daripada ID selector</li>
                                <li>• Buat nama class yang deskriptif (misal: .button-primary, .card-header)</li>
                                <li>• Hindari menggunakan !important kecuali sangat diperlukan</li>
                                <li>• Organisir CSS dengan logical grouping</li>
                            </ul>
                        </div>
                    </div>
                `,
                videoUrl: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                completed: false
            }
        ]
    }
};

// Initialize learning page
document.addEventListener('DOMContentLoaded', function() {
    loadModule();
    populateMaterialsList();
    loadMaterial(0);
});

function loadModule() {
    const module = moduleData[currentModule];
    if (module) {
        document.getElementById('moduleTitle').textContent = module.title;
        materials = module.materials;
    }
}

function populateMaterialsList() {
    const materialsList = document.getElementById('materialsList');
    materialsList.innerHTML = '';

    materials.forEach((material, index) => {
        const isActive = index === currentMaterialIndex;
        const isCompleted = material.completed;

        const materialElement = document.createElement('div');
        materialElement.className = `material-item p-4 cursor-pointer ${isActive ? 'active' : ''}`;
        materialElement.onclick = () => loadMaterial(index);

        materialElement.innerHTML = `
            <div class="flex items-center gap-3">
                <div class="flex-shrink-0">
                    ${isCompleted ?
                        '<div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>' :
                        `<div class="w-6 h-6 rounded-full border-2 ${isActive ? 'border-white' : 'border-gray-300'} flex items-center justify-center"><span class="text-xs font-bold ${isActive ? 'text-white' : 'text-gray-500'}">${index + 1}</span></div>`
                    }
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-sm ${isActive ? 'text-white' : 'text-gray-800'} truncate">${material.title}</h4>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-xs ${isActive ? 'text-blue-100' : 'text-gray-500'}">${material.duration}</span>
                        ${isCompleted ? '<span class="completion-badge">Selesai</span>' : ''}
                    </div>
                </div>
            </div>
        `;

        materialsList.appendChild(materialElement);
    });
}

function loadMaterial(index) {
    currentMaterialIndex = index;
    const material = materials[index];

    if (!material) return;

    const content = document.getElementById('learningContent');
    content.innerHTML = `
        <div class="fade-in">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                        Materi ${index + 1} dari ${materials.length}
                    </span>
                    <span class="text-gray-500 text-sm">${material.duration}</span>
                </div>

                ${material.videoUrl ? `
                    <div class="video-container mb-8">
                        <iframe src="${material.videoUrl}" title="${material.title}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                ` : ''}
            </div>

            ${material.content}

            <div class="flex justify-between items-center mt-12 pt-8 border-t border-gray-200">
                <button onclick="markAsCompleted(${index})" class="btn-primary" ${material.completed ? 'disabled' : ''}>
                    ${material.completed ? '✓ Sudah Selesai' : 'Tandai Selesai'}
                </button>

                <div class="flex gap-3">
                    <button onclick="previousMaterial()" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors" ${index === 0 ? 'disabled' : ''}>
                        Sebelumnya
                    </button>
                    <button onclick="nextMaterial()" class="btn-primary" ${index === materials.length - 1 ? 'disabled' : ''}>
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    `;

    // Update floating navigation
    document.getElementById('prevBtn').disabled = index === 0;
    document.getElementById('nextBtn').disabled = index === materials.length - 1;

    // Update materials list
    populateMaterialsList();

    // Scroll to top
    content.scrollTop = 0;
}

function markAsCompleted(index) {
    materials[index].completed = true;
    loadMaterial(index);
    updateProgress();
}

function previousMaterial() {
    if (currentMaterialIndex > 0) {
        loadMaterial(currentMaterialIndex - 1);
    }
}

function nextMaterial() {
    if (currentMaterialIndex < materials.length - 1) {
        loadMaterial(currentMaterialIndex + 1);
    }
}

function updateProgress() {
    const completed = materials.filter(m => m.completed).length;
    const total = materials.length;
    const percentage = Math.round((completed / total) * 100);

    const progressCircle = document.querySelector('.progress-circle');
    const progressText = document.querySelector('.progress-text');

    if (progressCircle && progressText) {
        progressCircle.style.setProperty('--progress', percentage);
        progressText.textContent = `${percentage}%`;
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') {
        e.preventDefault();
        previousMaterial();
    } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        nextMaterial();
    }
});
</script>
@endsection
