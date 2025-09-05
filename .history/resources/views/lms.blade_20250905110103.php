@extends('layouts.app')

@section('title', 'Full-Stack Web Development Course')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    
    * {
        font-family: 'Inter', sans-serif;
    }

    /* Smooth animations */
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

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

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

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slideInRight {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-pulse-gentle {
        animation: pulse 2s ease-in-out infinite;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #6366f1, #8b5cf6);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #4f46e5, #7c3aed);
    }

    /* Glass morphism effect */
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Module card hover effects */
    .module-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .module-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Progress ring animation */
    .progress-ring {
        transform: rotate(-90deg);
    }

    .progress-ring circle {
        transition: stroke-dashoffset 0.5s ease-in-out;
    }

    /* Smooth transitions for all interactive elements */
    .btn-primary {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
    }

    /* Material icons feel */
    .material-icon {
        transition: all 0.3s ease;
    }

    .material-icon:hover {
        transform: scale(1.1);
    }

    /* Elegant section dividers */
    .section-divider {
        background: linear-gradient(90deg, transparent 0%, #e2e8f0 50%, transparent 100%);
        height: 1px;
    }
</style>
@endsection

@section('content')
<!-- Hero Section - Clean & Professional -->
<section class="relative min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 flex items-center justify-center overflow-hidden">
    <!-- Subtle background pattern -->
    <div class="absolute inset-0 opacity-[0.02]">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #6366f1 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-6xl mx-auto">
            <!-- Main content grid -->
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left content -->
                <div class="animate-fadeInUp">
                    <!-- Course badge -->
                    <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-2 rounded-full text-sm font-medium mb-8">
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse-gentle"></div>
                        <span>Kursus Lengkap • 120+ Jam Pembelajaran</span>
                    </div>

                    <!-- Main heading -->
                    <h1 class="text-5xl lg:text-6xl font-black text-slate-900 mb-6 leading-tight">
                        Full-Stack Web
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                            Development
                        </span>
                    </h1>

                    <p class="text-xl text-slate-600 mb-8 leading-relaxed font-medium">
                        Kuasai pengembangan web modern dari frontend hingga backend. Belajar dengan pendekatan praktis 
                        menggunakan teknologi terkini seperti React, Node.js, dan database.
                    </p>

                    <!-- Course stats -->
                    <div class="grid grid-cols-3 gap-6 mb-8">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-slate-900">24</div>
                            <div class="text-sm text-slate-600">Modul</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-slate-900">180+</div>
                            <div class="text-sm text-slate-600">Materi</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-slate-900">15</div>
                            <div class="text-sm text-slate-600">Proyek</div>
                        </div>
                    </div>

                    <!-- CTA buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="scrollToModules()" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h1m4 0h1m6-10V7a3 3 0 11-6 0V4h6zM6 20h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                            </svg>
                            Mulai Belajar Sekarang
                        </button>
                        <button class="border-2 border-slate-300 text-slate-700 px-8 py-4 rounded-xl font-semibold text-lg hover:border-slate-400 hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h1m4 0h1m6-10V7a3 3 0 11-6 0V4h6zM6 20h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                            </svg>
                            Preview Kursus
                        </button>
                    </div>
                </div>

                <!-- Right content - Course preview -->
                <div class="animate-slideInRight">
                    <div class="relative">
                        <!-- Main card -->
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                            <!-- Course header -->
                            <div class="p-6 border-b border-slate-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-slate-900">Full-Stack Web Development</h3>
                                        <p class="text-sm text-slate-600 mt-1">Dari Pemula hingga Mahir</p>
                                    </div>
                                    <div class="flex items-center gap-1 text-yellow-500">
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                        <span class="text-sm font-semibold text-slate-700">4.9</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress overview -->
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm font-medium text-slate-700">Progress Keseluruhan</span>
                                    <span class="text-sm font-bold text-slate-900">0%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2 mb-6">
                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full" style="width: 0%"></div>
                                </div>

                                <!-- Recent modules preview -->
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <span class="text-blue-600 font-bold text-sm">1</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-slate-900">HTML & CSS Fundamentals</div>
                                            <div class="text-xs text-slate-500">8 materi • 12 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-slate-300 rounded-full"></div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg opacity-60">
                                        <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center">
                                            <span class="text-slate-400 font-bold text-sm">2</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-slate-600">JavaScript Essentials</div>
                                            <div class="text-xs text-slate-400">12 materi • 18 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-slate-200 rounded-full"></div>
                                    </div>

                                    <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg opacity-40">
                                        <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center">
                                            <span class="text-slate-400 font-bold text-sm">3</span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium text-slate-500">React Development</div>
                                            <div class="text-xs text-slate-400">15 materi • 25 jam</div>
                                        </div>
                                        <div class="w-6 h-6 border-2 border-slate-200 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating elements -->
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Overview Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-6">
                Apa yang Akan Anda Pelajari?
            </h2>
            <p class="text-xl text-slate-600 leading-relaxed">
                Kursus komprehensif yang dirancang untuk membawa Anda dari pemula hingga menjadi full-stack developer yang handal
            </p>
        </div>

        <!-- Learning outcomes grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @php
            $outcomes = [
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>',
                    'title' => 'Frontend Development',
                    'description' => 'HTML5, CSS3, JavaScript ES6+, React.js, dan responsive design'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>',
                    'title' => 'Backend Development',
                    'description' => 'Node.js, Express.js, RESTful API, dan microservices architecture'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>',
                    'title' => 'Database Management',
                    'description' => 'MongoDB, MySQL, data modeling, dan database optimization'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                    'title' => 'Security & Authentication',
                    'description' => 'JWT, OAuth, HTTPS, dan best practices keamanan web'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/></svg>',
                    'title' => 'Deployment & DevOps',
                    'description' => 'Git, Docker, CI/CD, dan deployment ke cloud platform'
                ],
                [
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>',
                    'title' => 'Project Management',
                    'description' => 'Agile methodology, project planning, dan collaboration tools'
                ]
            ];
            @endphp

            @foreach($outcomes as $outcome)
            <div class="group">
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 h-full transition-all duration-300 hover:border-blue-300 hover:shadow-lg hover:bg-white">
                    <div class="text-blue-600 mb-4 group-hover:text-blue-700 transition-colors">
                        {!! $outcome['icon'] !!}
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3">{{ $outcome['title'] }}</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $outcome['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<!-- Modules Section - Modern & Clean -->
<section id="modules" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <!-- Section header -->
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-6">
                Kurikulum Pembelajaran
            </h2>
            <p class="text-xl text-slate-600 leading-relaxed">
                24 modul terstruktur dengan 180+ materi pembelajaran yang akan membawa Anda menjadi full-stack developer
            </p>
        </div>

        <!-- Module progress overview -->
        <div class="max-w-2xl mx-auto mb-16">
            <div class="bg-white rounded-xl border border-slate-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-slate-700">Progress Keseluruhan</span>
                    <span class="text-sm font-bold text-slate-900">0 dari 24 modul</span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-3">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-3 rounded-full transition-all duration-1000" style="width: 0%"></div>
                </div>
                <div class="mt-4 text-center">
                    <span class="text-sm text-slate-600">Mulai perjalanan belajar Anda hari ini!</span>
                </div>
            </div>
        </div>

        <!-- Modules grid -->
        <div class="max-w-6xl mx-auto">
            @php
            $modules = [
                [
                    'number' => 1,
                    'title' => 'HTML & CSS Fundamentals',
                    'description' => 'Pelajari dasar-dasar HTML5 dan CSS3, semantic elements, flexbox, grid, dan responsive design.',
                    'duration' => '12 jam',
                    'materials' => 8,
                    'status' => 'available',
                    'progress' => 0,
                    'materials_list' => [
                        ['type' => 'text', 'title' => 'Pengenalan HTML5', 'duration' => '30 min', 'optional_video' => true, 'optional_file' => 'html-guide.pdf'],
                        ['type' => 'text', 'title' => 'Semantic Elements', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'CSS Selectors & Properties', 'duration' => '60 min', 'optional_video' => true, 'optional_file' => 'css-cheatsheet.pdf'],
                        ['type' => 'text', 'title' => 'Flexbox Layout', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'CSS Grid System', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Responsive Design', 'duration' => '120 min', 'optional_video' => true, 'optional_file' => 'responsive-examples.zip'],
                        ['type' => 'text', 'title' => 'CSS Animations', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Project: Landing Page', 'duration' => '180 min', 'optional_file' => 'project-assets.zip']
                    ]
                ],
                [
                    'number' => 2,
                    'title' => 'JavaScript Essentials',
                    'description' => 'Kuasai JavaScript dari dasar hingga advanced: ES6+, DOM manipulation, asynchronous programming.',
                    'duration' => '18 jam',
                    'materials' => 12,
                    'status' => 'locked',
                    'progress' => 0,
                    'materials_list' => [
                        ['type' => 'text', 'title' => 'JavaScript Fundamentals', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Variables & Data Types', 'duration' => '30 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Functions & Scope', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Objects & Arrays', 'duration' => '75 min', 'optional_video' => true, 'optional_file' => 'js-examples.js'],
                        ['type' => 'text', 'title' => 'DOM Manipulation', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Event Handling', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'ES6+ Features', 'duration' => '120 min', 'optional_video' => true, 'optional_file' => 'es6-guide.pdf'],
                        ['type' => 'text', 'title' => 'Async Programming', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Fetch API & AJAX', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Error Handling', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Local Storage', 'duration' => '30 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Project: Interactive App', 'duration' => '240 min', 'optional_file' => 'project-starter.zip']
                    ]
                ],
                [
                    'number' => 3,
                    'title' => 'Git & Version Control',
                    'description' => 'Pelajari Git untuk version control, collaboration, dan workflow development yang profesional.',
                    'duration' => '8 jam',
                    'materials' => 6,
                    'status' => 'locked',
                    'progress' => 0,
                    'materials_list' => [
                        ['type' => 'text', 'title' => 'Git Fundamentals', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Repository Management', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Branching & Merging', 'duration' => '90 min', 'optional_video' => true, 'optional_file' => 'git-workflow.pdf'],
                        ['type' => 'text', 'title' => 'GitHub Collaboration', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Pull Requests & Code Review', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Project: Team Collaboration', 'duration' => '150 min']
                    ]
                ],
                [
                    'number' => 4,
                    'title' => 'React.js Development',
                    'description' => 'Bangun aplikasi web modern dengan React: components, hooks, state management, dan ecosystem.',
                    'duration' => '25 jam',
                    'materials' => 15,
                    'status' => 'locked',
                    'progress' => 0,
                    'materials_list' => [
                        ['type' => 'text', 'title' => 'React Introduction', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'JSX & Components', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Props & State', 'duration' => '75 min', 'optional_video' => true, 'optional_file' => 'react-examples.zip'],
                        ['type' => 'text', 'title' => 'Event Handling', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Conditional Rendering', 'duration' => '30 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Lists & Keys', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Forms & Validation', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'React Hooks', 'duration' => '120 min', 'optional_video' => true, 'optional_file' => 'hooks-guide.pdf'],
                        ['type' => 'text', 'title' => 'useEffect & Lifecycle', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Context API', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'React Router', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'API Integration', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Testing Components', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Performance Optimization', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Project: React Application', 'duration' => '300 min', 'optional_file' => 'react-project.zip']
                    ]
                ],
                [
                    'number' => 5,
                    'title' => 'Node.js & Express',
                    'description' => 'Backend development dengan Node.js dan Express: server, routing, middleware, dan RESTful API.',
                    'duration' => '20 jam',
                    'materials' => 12,
                    'status' => 'locked',
                    'progress' => 0,
                    'materials_list' => [
                        ['type' => 'text', 'title' => 'Node.js Introduction', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'NPM & Package Management', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'File System & Modules', 'duration' => '75 min', 'optional_video' => true, 'optional_file' => 'nodejs-examples.zip'],
                        ['type' => 'text', 'title' => 'Express.js Setup', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Routing & Middleware', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Request & Response', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'RESTful API Design', 'duration' => '120 min', 'optional_video' => true, 'optional_file' => 'api-design-guide.pdf'],
                        ['type' => 'text', 'title' => 'Error Handling', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'File Upload', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Environment Variables', 'duration' => '30 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'API Testing', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Project: REST API', 'duration' => '240 min', 'optional_file' => 'api-project.zip']
                    ]
                ],
                [
                    'number' => 6,
                    'title' => 'Database & MongoDB',
                    'description' => 'Database design dan implementasi dengan MongoDB: CRUD operations, aggregation, indexing.',
                    'duration' => '15 jam',
                    'materials' => 10,
                    'status' => 'locked',
                    'progress' => 0,
                    'materials_list' => [
                        ['type' => 'text', 'title' => 'Database Fundamentals', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'MongoDB Introduction', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Document Structure', 'duration' => '45 min', 'optional_video' => true, 'optional_file' => 'mongodb-guide.pdf'],
                        ['type' => 'text', 'title' => 'CRUD Operations', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Query & Filtering', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Mongoose ODM', 'duration' => '90 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Schema Design', 'duration' => '60 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Aggregation Pipeline', 'duration' => '75 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Indexing & Performance', 'duration' => '45 min', 'optional_video' => true],
                        ['type' => 'text', 'title' => 'Project: Database Design', 'duration' => '180 min', 'optional_file' => 'database-project.zip']
                    ]
                ]
            ];
            @endphp

            <div class="space-y-6">
                @foreach($modules as $module)
                <div class="module-card bg-white rounded-xl border border-slate-200 overflow-hidden {{ $module['status'] === 'locked' ? 'opacity-60' : '' }}">
                    <!-- Module header -->
                    <div class="p-6 border-b border-slate-100">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <!-- Module number -->
                                <div class="w-12 h-12 {{ $module['status'] === 'available' ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-400' }} rounded-lg flex items-center justify-center font-bold text-lg">
                                    {{ $module['number'] }}
                                </div>
                                
                                <!-- Module info -->
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $module['title'] }}</h3>
                                    <p class="text-slate-600 leading-relaxed mb-4">{{ $module['description'] }}</p>
                                    
                                    <div class="flex items-center gap-6 text-sm text-slate-500">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span>{{ $module['duration'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <span>{{ $module['materials'] }} materi</span>
                                        </div>
                                        @if($module['progress'] > 0)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-green-600">{{ $module['progress'] }}% selesai</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action button -->
                            <div class="flex items-center gap-3">
                                @if($module['status'] === 'available')
                                <button onclick="openModule({{ $module['number'] }})" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition-all flex items-center gap-2">
                                    <span>{{ $module['progress'] > 0 ? 'Lanjutkan' : 'Mulai' }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </button>
                                @else
                                <div class="flex items-center gap-2 text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span class="text-sm font-medium">Terkunci</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Progress bar -->
                        @if($module['progress'] > 0)
                        <div class="mt-4">
                            <div class="w-full bg-slate-100 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full transition-all duration-1000" style="width: {{ $module['progress'] }}%"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Materials preview (collapsible) -->
                    <div class="border-t border-slate-100">
                        <button onclick="toggleMaterials({{ $module['number'] }})" class="w-full p-4 text-left flex items-center justify-between hover:bg-slate-50 transition-colors">
                            <span class="text-sm font-medium text-slate-700">Lihat Materi Pembelajaran</span>
                            <svg class="w-4 h-4 text-slate-400 transform transition-transform" id="arrow-{{ $module['number'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <div id="materials-{{ $module['number'] }}" class="hidden px-6 pb-6">
                            <div class="space-y-2">
                                @foreach(array_slice($module['materials_list'], 0, 6) as $index => $material)
                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg">
                                    <div class="w-8 h-8 bg-slate-200 rounded-lg flex items-center justify-center">
                                        <span class="text-slate-600 font-medium text-sm">{{ $index + 1 }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-sm font-medium text-slate-900">{{ $material['title'] }}</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-3 mt-1">
                                            <span>{{ $material['duration'] }}</span>
                                            @if(isset($material['optional_video']) && $material['optional_video'])
                                            <span class="text-blue-600">• Video tersedia</span>
                                            @endif
                                            @if(isset($material['optional_file']))
                                            <span class="text-green-600">• File: {{ $material['optional_file'] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($module['status'] === 'available')
                                    <div class="w-6 h-6 border-2 border-slate-300 rounded-full"></div>
                                    @else
                                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    @endif
                                </div>
                                @endforeach
                                @if(count($module['materials_list']) > 6)
                                <div class="text-center py-2">
                                    <span class="text-sm text-slate-500">+{{ count($module['materials_list']) - 6 }} materi lainnya</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Learning Path Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-6">
                Path Pembelajaran Terstruktur
            </h2>
            <p class="text-xl text-slate-600 leading-relaxed">
                Ikuti jalur pembelajaran yang telah dirancang khusus untuk mengoptimalkan proses belajar Anda
            </p>
        </div>

        <!-- Learning timeline -->
        <div class="max-w-4xl mx-auto">
            <div class="relative">
                <!-- Vertical line -->
                <div class="absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-slate-200"></div>

                @php
                $learningPath = [
                    [
                        'phase' => 'Foundation',
                        'title' => 'Dasar-dasar Web Development',
                        'duration' => '4-6 minggu',
                        'modules' => ['HTML & CSS Fundamentals', 'JavaScript Essentials', 'Git & Version Control'],
                        'description' => 'Membangun fondasi yang kuat dengan mempelajari teknologi dasar web development.',
                        'position' => 'left'
                    ],
                    [
                        'phase' => 'Frontend',
                        'title' => 'Pengembangan Frontend Modern',
                        'duration' => '6-8 minggu',
                        'modules' => ['React.js Development', 'Advanced CSS', 'Frontend Tools'],
                        'description' => 'Kuasai pengembangan antarmuka pengguna yang interaktif dan responsif.',
                        'position' => 'right'
                    ],
                    [
                        'phase' => 'Backend',
                        'title' => 'Server-side Development',
                        'duration' => '6-8 minggu',
                        'modules' => ['Node.js & Express', 'Database & MongoDB', 'API Development'],
                        'description' => 'Pelajari pengembangan backend untuk membangun aplikasi yang scalable.',
                        'position' => 'left'
                    ],
                    [
                        'phase' => 'Integration',
                        'title' => 'Full-Stack Integration',
                        'duration' => '4-6 minggu',
                        'modules' => ['Authentication & Security', 'Deployment & DevOps', 'Final Projects'],
                        'description' => 'Integrasikan semua komponen menjadi aplikasi full-stack yang utuh.',
                        'position' => 'right'
                    ]
                ];
                @endphp

                @foreach($learningPath as $index => $path)
                <div class="relative flex items-center mb-16 last:mb-0">
                    <!-- Timeline dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-12 h-12 bg-blue-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center z-10">
                        <span class="text-white font-bold">{{ $index + 1 }}</span>
                    </div>

                    <!-- Content card -->
                    <div class="w-full {{ $path['position'] === 'left' ? 'pr-8 md:pr-12' : 'pl-8 md:pl-12' }} {{ $path['position'] === 'right' ? 'md:ml-auto' : '' }}">
                        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow {{ $path['position'] === 'left' ? 'md:text-right' : '' }} max-w-md {{ $path['position'] === 'right' ? 'md:ml-auto' : '' }}">
                            <!-- Phase badge -->
                            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm font-medium mb-4">
                                <span>{{ $path['phase'] }}</span>
                                <span>•</span>
                                <span>{{ $path['duration'] }}</span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $path['title'] }}</h3>
                            <p class="text-slate-600 mb-4 leading-relaxed">{{ $path['description'] }}</p>

                            <!-- Modules list -->
                            <div class="space-y-2">
                                @foreach($path['modules'] as $module)
                                <div class="flex items-center gap-2 text-sm {{ $path['position'] === 'left' ? 'md:justify-end' : '' }}">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-slate-700">{{ $module }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Learning Modal - Modern Design -->
<div id="learningModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl max-w-6xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
            <!-- Modal Header -->
            <div class="bg-slate-50 border-b border-slate-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 id="modalTitle" class="text-2xl font-bold text-slate-900">HTML & CSS Fundamentals</h2>
                        <p id="modalSubtitle" class="text-slate-600 mt-1">Modul 1 • 8 Materi</p>
                    </div>
                    <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 transition-colors p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex h-[calc(90vh-140px)]">
                <!-- Sidebar - Materials List -->
                <div class="w-1/3 bg-slate-50 border-r border-slate-200 overflow-y-auto">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-slate-900">Materi Pembelajaran</h3>
                            <div class="text-sm text-slate-500">
                                <span id="currentProgress">0/8</span>
                            </div>
                        </div>
                        
                        <!-- Progress bar -->
                        <div class="mb-6">
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div id="modalProgressBar" class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                            </div>
                        </div>

                        <div id="materialsList" class="space-y-2">
                            <!-- Materials will be populated by JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="flex-1 flex flex-col">
                    <!-- Content Display Area -->
                    <div class="flex-1 bg-slate-100 relative">
                        <div id="contentArea" class="w-full h-full flex items-center justify-center">
                            <!-- Default state -->
                            <div class="text-center">
                                <div class="w-16 h-16 bg-slate-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-700 mb-2">Pilih Materi untuk Memulai</h3>
                                <p class="text-slate-500">Klik pada salah satu materi di sidebar untuk memulai pembelajaran</p>
                            </div>
                        </div>
                    </div>

                    <!-- Material Info & Navigation -->
                    <div class="bg-white border-t border-slate-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 id="currentMaterialTitle" class="text-xl font-bold text-slate-900 mb-1">Pilih materi untuk memulai</h4>
                                <div class="flex items-center gap-4 text-sm text-slate-600">
                                    <span id="currentMaterialDuration">Durasi akan ditampilkan di sini</span>
                                    <span id="currentMaterialType" class="hidden px-2 py-1 bg-slate-100 rounded text-xs font-medium"></span>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <button id="prevBtn" onclick="previousMaterial()" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-lg font-medium hover:bg-slate-200 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </button>
                                
                                <button id="nextBtn" onclick="nextMaterial()" class="btn-primary text-white px-4 py-2 rounded-lg font-medium transition-all">
                                    Selanjutnya
                                    <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variables for learning modal
let currentModule = null;
let currentMaterialIndex = 0;
let currentMaterials = [];

// Module data - Updated structure with text-based content
const modulesData = [
    {
        number: 1,
        title: 'HTML & CSS Fundamentals',
        description: 'Pelajari dasar-dasar HTML5 dan CSS3, semantic elements, flexbox, grid, dan responsive design.',
        duration: '12 jam',
        materials: 8,
        materials_list: [
            {
                type: 'text',
                title: 'Pengenalan HTML5',
                duration: '30 min',
                content: 'HTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur dan konten halaman web...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                optional_file: 'html-guide.pdf'
            },
            {
                type: 'text',
                title: 'Semantic Elements',
                duration: '45 min',
                content: 'Semantic elements memberikan makna yang jelas pada struktur dokumen HTML...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'CSS Selectors & Properties',
                duration: '60 min',
                content: 'CSS (Cascading Style Sheets) digunakan untuk mengatur tampilan dan layout halaman web...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                optional_file: 'css-cheatsheet.pdf'
            },
            {
                type: 'text',
                title: 'Flexbox Layout',
                duration: '90 min',
                content: 'Flexbox adalah sistem layout CSS yang memungkinkan pengaturan elemen secara fleksibel...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'CSS Grid System',
                duration: '75 min',
                content: 'CSS Grid adalah sistem layout dua dimensi yang powerful untuk mengatur layout website...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'Responsive Design',
                duration: '120 min',
                content: 'Responsive design memastikan website tampil optimal di berbagai ukuran layar...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU',
                optional_file: 'responsive-examples.zip'
            },
            {
                type: 'text',
                title: 'CSS Animations',
                duration: '60 min',
                content: 'CSS animations memungkinkan pembuatan efek visual yang menarik tanpa JavaScript...',
                optional_video: 'https://www.youtube.com/embed/qz0aGYrrlhU'
            },
            {
                type: 'text',
                title: 'Project: Landing Page',
                duration: '180 min',
                content: 'Dalam project ini, Anda akan membuat landing page yang responsive menggunakan HTML dan CSS...',
                optional_file: 'project-assets.zip'
            }
        ]
    }
];

// Function to scroll to modules section
function scrollToModules() {
    document.getElementById('modules').scrollIntoView({ 
        behavior: 'smooth' 
    });
}

// Toggle materials visibility
function toggleMaterials(moduleNumber) {
    const materialsDiv = document.getElementById(`materials-${moduleNumber}`);
    const arrow = document.getElementById(`arrow-${moduleNumber}`);
    
    if (materialsDiv.classList.contains('hidden')) {
        materialsDiv.classList.remove('hidden');
        arrow.style.transform = 'rotate(180deg)';
    } else {
        materialsDiv.classList.add('hidden');
        arrow.style.transform = 'rotate(0deg)';
    }
}

// Open module function
function openModule(moduleNumber) {
    currentModule = modulesData.find(m => m.number === moduleNumber);
    if (!currentModule) return;
    
    currentMaterials = currentModule.materials_list;
    currentMaterialIndex = 0;

    // Update modal title
    document.getElementById('modalTitle').textContent = currentModule.title;
    document.getElementById('modalSubtitle').textContent = `Modul ${moduleNumber} • ${currentMaterials.length} Materi`;

    // Populate materials list
    populateMaterialsList();

    // Show modal
    document.getElementById('learningModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Load first material
    loadMaterial(0);
}

// Close modal function
function closeModal() {
    document.getElementById('learningModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Populate materials list in sidebar
function populateMaterialsList() {
    const materialsList = document.getElementById('materialsList');
    materialsList.innerHTML = '';

    currentMaterials.forEach((material, index) => {
        const materialItem = document.createElement('div');
        materialItem.className = `flex items-start gap-3 p-3 rounded-lg cursor-pointer transition-all duration-200 ${
            index === currentMaterialIndex ? 'bg-blue-50 border border-blue-200' : 'hover:bg-slate-100'
        }`;
        materialItem.onclick = () => loadMaterial(index);

        // Material type icon
        const icon = material.type === 'text' 
            ? '<div class="w-8 h-8 bg-slate-500 rounded-lg flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>'
            : '<div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>';

        materialItem.innerHTML = `
            ${icon}
            <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-900 mb-1">${material.title}</div>
                <div class="text-xs text-slate-500 mb-2">${material.duration}</div>
                <div class="flex flex-wrap gap-1">
                    ${material.optional_video ? '<span class="text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded">Video</span>' : ''}
                    ${material.optional_file ? '<span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded">File</span>' : ''}
                </div>
            </div>
            ${index === currentMaterialIndex ? '<div class="w-3 h-3 bg-blue-500 rounded-full flex-shrink-0 mt-1"></div>' : ''}
        `;

        materialsList.appendChild(materialItem);
    });

    // Update progress
    updateProgress();
}

// Load material content
function loadMaterial(index) {
    currentMaterialIndex = index;
    const material = currentMaterials[index];
    const contentArea = document.getElementById('contentArea');

    // Update material info
    document.getElementById('currentMaterialTitle').textContent = material.title;
    document.getElementById('currentMaterialDuration').textContent = material.duration;
    
    const typeSpan = document.getElementById('currentMaterialType');
    typeSpan.textContent = material.type === 'text' ? 'Materi Teks' : 'Video';
    typeSpan.classList.remove('hidden');

    // Update navigation buttons
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    prevBtn.disabled = index === 0;
    nextBtn.disabled = index === currentMaterials.length - 1;

    // Load content based on type
    if (material.type === 'text') {
        contentArea.innerHTML = `
            <div class="w-full h-full bg-white overflow-y-auto">
                <div class="max-w-4xl mx-auto p-8">
                    <div class="prose prose-lg max-w-none">
                        <h1 class="text-3xl font-bold text-slate-900 mb-6">${material.title}</h1>
                        <div class="text-slate-700 leading-relaxed text-lg mb-8">
                            ${material.content}
                        </div>
                        
                        <!-- Additional resources -->
                        <div class="border-t pt-6 mt-8">
                            <h3 class="text-xl font-semibold text-slate-900 mb-4">Sumber Tambahan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                ${material.optional_video ? `
                                    <div class="border border-slate-200 rounded-lg p-4">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-slate-900">Video Penjelasan</h4>
                                                <p class="text-sm text-slate-600">Tonton untuk pemahaman lebih dalam</p>
                                            </div>
                                        </div>
                                        <button onclick="showVideo('${material.optional_video}')" class="w-full bg-red-50 text-red-700 py-2 px-4 rounded-lg font-medium hover:bg-red-100 transition-colors">
                                            Tonton Video
                                        </button>
                                    </div>
                                ` : ''}
                                
                                ${material.optional_file ? `
                                    <div class="border border-slate-200 rounded-lg p-4">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-slate-900">File Pendukung</h4>
                                                <p class="text-sm text-slate-600">${material.optional_file}</p>
                                            </div>
                                        </div>
                                        <button onclick="downloadFile('${material.optional_file}')" class="w-full bg-blue-50 text-blue-700 py-2 px-4 rounded-lg font-medium hover:bg-blue-100 transition-colors">
                                            Download File
                                        </button>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Update materials list UI
    populateMaterialsList();
}

// Show video in modal
function showVideo(videoUrl) {
    const contentArea = document.getElementById('contentArea');
    contentArea.innerHTML = `
        <div class="w-full h-full bg-black">
            <iframe
                src="${videoUrl}?autoplay=1&rel=0"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                class="w-full h-full">
            </iframe>
        </div>
    `;
}

// Download file function
function downloadFile(filename) {
    // Simulate file download
    alert(`Mengunduh file: ${filename}`);
}

// Update progress display
function updateProgress() {
    const completed = currentMaterialIndex + 1;
    const total = currentMaterials.length;
    const percentage = (completed / total) * 100;
    
    document.getElementById('currentProgress').textContent = `${completed}/${total}`;
    document.getElementById('modalProgressBar').style.width = `${percentage}%`;
}

// Navigation functions
function previousMaterial() {
    if (currentMaterialIndex > 0) {
        loadMaterial(currentMaterialIndex - 1);
    }
}

function nextMaterial() {
    if (currentMaterialIndex < currentMaterials.length - 1) {
        loadMaterial(currentMaterialIndex + 1);
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (document.getElementById('learningModal').classList.contains('hidden')) return;

    if (e.key === 'ArrowLeft') {
        previousMaterial();
    } else if (e.key === 'ArrowRight') {
        nextMaterial();
    } else if (e.key === 'Escape') {
        closeModal();
    }
});

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎓 Modern LMS Interface loaded successfully!');
    
    // Add smooth scrolling to all anchor links
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

    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all module cards for animation
    document.querySelectorAll('.module-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endsection
