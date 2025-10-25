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

.module-item {
    transition: all 0.3s ease;
    border-radius: 12px;
    border: 2px solid transparent;
    position: relative;
}

.module-item:hover:not(.locked) {
    background: #f0f9ff;
    border-color: #3b82f6;
    transform: translateX(4px);
}

.module-item.active {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border-color: #1d4ed8;
    transform: translateX(4px);
    box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
}

.module-item.locked {
    background: #f9fafb;
    color: #9ca3af;
    cursor: not-allowed;
    opacity: 0.6;
}

.lock-icon {
    color: #9ca3af;
}

/* Line clamp utilities */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Enhanced module item hover effects */
.module-item:not(.locked):hover {
    transform: translateX(2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.module-item.active {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border: 2px solid #3b82f6;
    transform: translateX(2px);
    box-shadow: 0 6px 20px rgba(59, 130, 246, 0.15);
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
    min-height: 500px;
}

.content-area {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    min-height: 400px;
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
    <div class="container mx-auto px-4 py-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 min-h-screen">

            <!-- Sidebar - Module Materials -->
            <div class="lg:col-span-1 sidebar p-4 rounded-2xl">
                <!-- Module Header -->
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <a href="{{ route('lms') }}" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                        </a>
                        <div class="progress-circle" style="--progress: 8">
                            <span class="progress-text text-sm">8%</span>
                        </div>
                    </div>

                    <h2 class="text-lg font-bold text-gray-800 mb-2">Program Ekonomi Maritim</h2>
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-3 mb-4">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span class="text-sm font-semibold text-blue-800" id="currentModuleTitle">Modul {{ $module }}: Dasar-dasar Ekonomi Maritim</span>
                        </div>
                        <p class="text-xs text-blue-600" id="currentModuleProgress">3 dari 8 materi selesai</p>
                    </div>
                </div>

                <!-- All Modules List -->
                <div class="space-y-3" id="modulesList">
                    <!-- Modules will be populated by JavaScript -->
                </div>
                
                <!-- Current Module Materials -->
                <div class="mt-6 pt-6 border-t border-gray-200" id="materialsSection" style="display: none;">
                    <h3 class="text-sm font-bold text-gray-700 mb-3">Materi Pembelajaran</h3>
                    <div class="space-y-2" id="materialsList">
                        <!-- Materials will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3 content-area p-6 rounded-2xl">
                <div class="learning-content" id="learningContent">
                    <!-- Content will be populated by JavaScript -->
                    <div class="text-center py-12">
                        <div class="animate-spin rounded-full h-12 w-12 border-4 border-blue-500 border-t-transparent mx-auto mb-4"></div>
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

// Sample data based on module - Synced with LMS
const allModules = [
    {
        id: 1,
        title: 'Dasar-dasar Ekonomi Maritim',
        description: 'Pelajari fundamental ekonomi maritim, potensi hasil laut, dan peluang bisnis di sektor perikanan untuk membangun foundation yang kuat.',
        duration: '15 jam',
        materialsCount: 8,
        unlocked: true,
        gradient: 'from-blue-500 to-purple-600',
        materials: [
            {
                id: 1,
                title: 'Pengenalan Ekonomi Maritim',
                type: 'text',
                duration: '45 menit',
                content: `
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Pengenalan Ekonomi Maritim</h2>

                    <div class="prose max-w-none">
                        <p class="text-gray-600 mb-4">
                            Ekonomi maritim merupakan sektor yang memanfaatkan sumber daya laut untuk kegiatan ekonomi yang berkelanjutan.
                            Indonesia sebagai negara kepulauan memiliki potensi ekonomi maritim yang sangat besar.
                        </p>

                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Apa itu Ekonomi Maritim?</h3>
                        <p class="text-gray-600 mb-4">
                            Ekonomi maritim adalah sistem ekonomi yang berbasis pada pemanfaatan sumber daya laut dan pesisir
                            untuk menciptakan nilai tambah dan kesejahteraan masyarakat.
                        </p>

                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Komponen Ekonomi Maritim:</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-4 space-y-1 text-sm">
                            <li>Perikanan tangkap dan budidaya</li>
                            <li>Pengolahan hasil laut</li>
                            <li>Wisata bahari</li>
                            <li>Transportasi laut</li>
                            <li>Energi kelautan</li>
                            <li>Bioteknologi kelautan</li>
                        </ul>

                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-4">
                            <h4 class="font-semibold text-blue-800 mb-2">🌊 Fakta Menarik</h4>
                            <p class="text-blue-700 text-sm">
                                Indonesia memiliki 17.504 pulau dengan garis pantai sepanjang 108.000 km, menjadikannya negara dengan potensi ekonomi maritim terbesar di dunia.
                            </p>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Potensi Ekonomi Maritim Indonesia:</h3>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="bg-green-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-green-800 text-sm">Perikanan</h4>
                                <p class="text-green-700 text-xs">12 juta ton/tahun potensi ikan</p>
                            </div>
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-800 text-sm">Budidaya</h4>
                                <p class="text-blue-700 text-xs">47 juta ha area potensial</p>
                            </div>
                        </div>
                    </div>
                `,
                videoUrl: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                completed: false
            },
            {
                id: 2,
                title: 'Potensi Hasil Laut Indonesia',
                type: 'text',
                duration: '60 menit',
                content: `
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Potensi Hasil Laut Indonesia</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 mb-4">Indonesia memiliki kekayaan hasil laut yang luar biasa dengan berbagai jenis ikan dan biota laut yang memiliki nilai ekonomi tinggi.</p>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Jenis-jenis Hasil Laut Unggulan:</h3>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <h4 class="font-bold text-blue-800 mb-2">🐟 Ikan Konsumsi</h4>
                                <ul class="text-blue-700 text-sm space-y-1">
                                    <li>• Tuna, Kakap, Kerapu</li>
                                    <li>• Bandeng, Lele, Gurame</li>
                                </ul>
                            </div>
                            <div class="bg-green-50 p-4 rounded-xl">
                                <h4 class="font-bold text-green-800 mb-2">🦐 Crustacea</h4>
                                <ul class="text-green-700 text-sm space-y-1">
                                    <li>• Udang Windu, Vaname</li>
                                    <li>• Kepiting Bakau</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `,
                videoUrl: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                completed: false
            },
            {
                id: 3,
                title: 'Ekosistem Bisnis Perikanan',
                type: 'text',
                duration: '50 menit',
                content: `
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Ekosistem Bisnis Perikanan</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 mb-4">Memahami rantai nilai dalam bisnis perikanan dari hulu hingga hilir untuk memaksimalkan profit.</p>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Rantai Nilai Perikanan:</h3>
                        <div class="space-y-3 mb-4">
                            <div class="bg-white p-4 rounded-xl border-2 border-gray-200">
                                <h4 class="font-bold text-gray-800 mb-2">1. Produksi (Hulu)</h4>
                                <p class="text-sm text-gray-600">Perikanan tangkap dan budidaya</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border-2 border-gray-200">
                                <h4 class="font-bold text-gray-800 mb-2">2. Pengolahan (Tengah)</h4>
                                <p class="text-sm text-gray-600">Pembersihan, pembekuan, dan pengolahan lanjutan</p>
                            </div>
                        </div>
                    </div>
                `,
                videoUrl: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                completed: false
            }
        ]
    },
    {
        id: 2,
        title: 'Budidaya & Akuakultur',
        description: 'Kuasai teknik budidaya ikan air tawar dan laut, manajemen kolam, teknologi akuakultur, dan sistem produksi berkelanjutan.',
        duration: '20 jam',
        materialsCount: 12,
        unlocked: false,
        gradient: 'from-green-500 to-blue-600',
        materials: []
    },
    {
        id: 3,
        title: 'Pengolahan Hasil Laut',
        description: 'Pelajari teknologi pengolahan ikan, pembuatan produk value-added, standar keamanan pangan, dan packaging untuk pasar.',
        duration: '18 jam',
        materialsCount: 10,
        unlocked: false,
        gradient: 'from-orange-500 to-red-600',
        materials: []
    },
    {
        id: 4,
        title: 'Pemasaran Digital Maritim',
        description: 'Bangun strategi pemasaran digital untuk produk maritim: e-commerce, social media marketing, dan penetrasi pasar lokal-global.',
        duration: '16 jam',
        materialsCount: 9,
        unlocked: false,
        gradient: 'from-cyan-500 to-blue-600',
        materials: []
    },
    {
        id: 5,
        title: 'Manajemen Rantai Dingin',
        description: 'Sistem cold chain untuk menjaga kualitas hasil laut dari produksi hingga konsumen akhir.',
        duration: '20 jam',
        materialsCount: 12,
        unlocked: false,
        gradient: 'from-purple-500 to-pink-600',
        materials: []
    },
    {
        id: 6,
        title: 'Keuangan & Permodalan',
        description: 'Pengelolaan keuangan bisnis maritim: analisis kelayakan, cash flow, dan akses permodalan untuk pengembangan usaha.',
        duration: '15 jam',
        materialsCount: 10,
        unlocked: false,
        gradient: 'from-indigo-500 to-purple-600',
        materials: []
    },
    {
        id: 7,
        title: 'Ekspor & Regulasi',
        description: 'Prosedur ekspor produk maritim, pemahaman regulasi internasional, dan sertifikasi kualitas untuk pasar global.',
        duration: '14 jam',
        materialsCount: 8,
        unlocked: false,
        gradient: 'from-teal-500 to-cyan-600',
        materials: []
    },
    {
        id: 8,
        title: 'Teknologi Perikanan',
        description: 'Implementasi teknologi modern dalam industri perikanan: IoT, AI, dan automatisasi untuk efisiensi produksi.',
        duration: '17 jam',
        materialsCount: 11,
        unlocked: false,
        gradient: 'from-rose-500 to-pink-600',
        materials: []
    },
    {
        id: 9,
        title: 'Kemitraan & Koperasi',
        description: 'Membangun jaringan kemitraan strategis dan koperasi nelayan untuk strengthening collective bargaining power.',
        duration: '13 jam',
        materialsCount: 7,
        unlocked: false,
        gradient: 'from-amber-500 to-orange-600',
        materials: []
    },
    {
        id: 10,
        title: 'Keberlanjutan Lingkungan',
        description: 'Praktik perikanan ramah lingkungan dan sustainable marine business model untuk konservasi ekosistem laut.',
        duration: '16 jam',
        materialsCount: 9,
        unlocked: false,
        gradient: 'from-emerald-500 to-teal-600',
        materials: []
    },
    {
        id: 11,
        title: 'Analisis Pasar',
        description: 'Riset pasar komprehensif, analisis kompetitor, dan strategi positioning produk maritim di pasar domestik dan internasional.',
        duration: '18 jam',
        materialsCount: 10,
        unlocked: false,
        gradient: 'from-violet-500 to-purple-600',
        materials: []
    },
    {
        id: 12,
        title: 'Bisnis Plan & Implementasi',
        description: 'Penyusunan business plan komprehensif dan roadmap implementasi untuk memulai dan mengembangkan bisnis maritim yang sukses.',
        duration: '25 jam',
        materialsCount: 15,
        unlocked: false,
        gradient: 'from-slate-600 to-gray-700',
        materials: []
    }
];

const moduleData = {
    1: allModules[0]
};

// Initialize learning page
document.addEventListener('DOMContentLoaded', function() {
    loadAllModules();
    loadModule();
    populateMaterialsList();
    loadMaterial(0);
});

function loadAllModules() {
    const modulesList = document.getElementById('modulesList');
    modulesList.innerHTML = '';

    allModules.forEach((module, index) => {
        const isActive = module.id === currentModule;
        const isUnlocked = module.unlocked;
        
        const moduleElement = document.createElement('div');
        moduleElement.className = `module-item p-4 cursor-pointer rounded-xl ${isActive ? 'active' : ''} ${!isUnlocked ? 'locked' : ''}`;
        
        if (isUnlocked) {
            moduleElement.onclick = () => {
                if (module.materials && module.materials.length > 0) {
                    // Only redirect if module has content
                    window.location.href = `/learning/${module.id}`;
                } else {
                    showNotification('Modul ini sedang dalam pengembangan', 'info');
                }
            };
        } else {
            moduleElement.onclick = () => showNotification('Modul ini masih terkunci. Selesaikan modul sebelumnya terlebih dahulu.', 'warning');
        }

        // Create gradient background for active/unlocked modules
        const gradientClass = isUnlocked ? `bg-gradient-to-r ${module.gradient}` : 'bg-gray-100';
        const textColorClass = isUnlocked ? 'text-white' : 'text-gray-400';
        
        moduleElement.innerHTML = `
            <div class="relative overflow-hidden">
                ${isUnlocked ? `<div class="absolute inset-0 ${gradientClass} opacity-20 rounded-lg"></div>` : ''}
                <div class="relative z-10 flex items-start gap-3">
                    <div class="flex-shrink-0">
                        ${isUnlocked ? 
                            `<div class="w-10 h-10 rounded-xl ${isActive ? 'bg-white text-blue-600' : gradientClass + ' text-white'} flex items-center justify-center font-bold text-sm shadow-sm">
                                ${module.id}
                            </div>` :
                            `<div class="w-10 h-10 rounded-xl bg-gray-200 flex items-center justify-center">
                                <svg class="w-5 h-5 lock-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>`
                        }
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-sm ${isActive ? 'text-blue-600' : isUnlocked ? 'text-gray-800' : 'text-gray-400'} mb-1 line-clamp-2">${module.title}</h4>
                        <p class="text-xs ${isActive ? 'text-blue-500' : isUnlocked ? 'text-gray-600' : 'text-gray-400'} mb-2 line-clamp-2">${module.description}</p>
                        <div class="flex items-center gap-4 text-xs ${isActive ? 'text-blue-500' : isUnlocked ? 'text-gray-500' : 'text-gray-400'}">
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>${module.duration}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span>${module.materialsCount} materi</span>
                            </div>
                        </div>
                        ${isActive ? '<div class="mt-2"><span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full font-medium">Sedang Dipelajari</span></div>' : ''}
                        ${!isUnlocked ? '<div class="mt-2"><span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded-full">Terkunci</span></div>' : ''}
                    </div>
                </div>
            </div>
        `;

        modulesList.appendChild(moduleElement);
    });
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-green-500' : type === 'warning' ? 'bg-amber-500' : 'bg-blue-500';
    notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${bgColor} text-white`;
    notification.innerHTML = `<i class="fas fa-${type === 'success' ? 'check' : type === 'warning' ? 'exclamation-triangle' : 'info'}-circle mr-2"></i>${message}`;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 4000);
}

function loadModule() {
    const module = allModules.find(m => m.id === currentModule);
    if (module) {
        materials = module.materials || [];
        
        // Update current module info in sidebar
        const moduleTitle = document.getElementById('currentModuleTitle');
        const moduleProgress = document.getElementById('currentModuleProgress');
        const materialsSection = document.getElementById('materialsSection');
        
        if (moduleTitle) {
            moduleTitle.textContent = `Modul ${module.id}: ${module.title}`;
        }
        
        if (moduleProgress && materials.length > 0) {
            const completed = materials.filter(m => m.completed).length;
            moduleProgress.textContent = `${completed} dari ${materials.length} materi selesai`;
        }
        
        // Show/hide materials section based on availability
        if (materialsSection) {
            if (materials.length > 0) {
                materialsSection.style.display = 'block';
                populateMaterialsList();
            } else {
                materialsSection.style.display = 'none';
            }
        }
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
