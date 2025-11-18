@extends('layouts_old.app')

@section('title', 'Pemetaan Potensi Desa - Desa Kaana')

@section('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Mapbox CSS -->
<link href='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css' rel='stylesheet' />

<style>
.mapping-hero {
    position: relative;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 55%, #1d4ed8 100%);
    color: #f8fafc;
    overflow: hidden;
}

.mapping-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle at 15% 20%, rgba(148, 163, 184, 0.12), transparent 40%),
        radial-gradient(circle at 85% 10%, rgba(226, 232, 240, 0.18), transparent 45%),
        radial-gradient(circle at 40% 80%, rgba(37, 99, 235, 0.14), transparent 50%);
    pointer-events: none;
}

.mapping-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(15, 23, 42, 0.4), transparent 45%, rgba(30, 64, 175, 0.3));
    pointer-events: none;
}

.mapping-hero .hero-surface {
    position: relative;
    z-index: 1;
}

.metric-grid {
    display: grid;
    gap: 1.25rem;
}

.metric-card {
    background: rgba(15, 23, 42, 0.65);
    border: 1px solid rgba(148, 163, 184, 0.18);
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 20px 50px rgba(15, 23, 42, 0.25);
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.metric-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 28px 60px rgba(15, 23, 42, 0.35);
}

.metric-icon {
    width: 48px;
    height: 48px;
    border-radius: 999px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, rgba(96, 165, 250, 0.18), rgba(59, 130, 246, 0.35));
    border: 1px solid rgba(148, 163, 184, 0.25);
}

.metric-value {
    font-size: 2.5rem;
    font-weight: 700;
    letter-spacing: -0.04em;
    margin-bottom: 0.35rem;
}

.metric-label {
    font-size: 0.9rem;
    font-weight: 500;
    color: rgba(226, 232, 240, 0.85);
}

.metric-subtext {
    font-size: 0.75rem;
    color: rgba(148, 163, 184, 0.8);
}

.badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.65rem 1.1rem;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.02em;
    background: rgba(148, 163, 184, 0.15);
    border: 1px solid rgba(148, 163, 184, 0.2);
    color: #e2e8f0;
}

.hero-summary {
    display: grid;
    gap: 0.9rem;
    margin-top: 1.5rem;
}

.hero-summary li {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    font-size: 0.95rem;
    color: rgba(226, 232, 240, 0.9);
}

.hero-summary svg {
    width: 20px;
    height: 20px;
    color: #60a5fa;
}

.data-card {
    background: #ffffff;
    border-radius: 1rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    padding: 1.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.data-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
}

.data-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
}

.data-card-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #0f172a;
}

.data-chip {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.4rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 999px;
    background: rgba(59, 130, 246, 0.12);
    color: #1d4ed8;
}

.map-card {
    background: #ffffff;
    border-radius: 1.5rem;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
}

.map-toolbar {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(15, 23, 42, 0.85);
    padding: 0.5rem;
    border-radius: 999px;
    border: 1px solid rgba(148, 163, 184, 0.2);
}

.map-toolbar button {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 0.55rem 1.25rem;
    border-radius: 999px;
    transition: background-color 0.2s ease, color 0.2s ease;
}

.map-info-list li {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
    padding: 0.65rem 0;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
}

.map-info-list li:last-child {
    border-bottom: none;
}

.map-info-card {
    background: #ffffff;
    border-radius: 1rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 14px 35px rgba(15, 23, 42, 0.08);
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    height: 100%;
}

.map-info-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
}

.map-info-card-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0f172a;
}

.map-info-card-subtitle {
    font-size: 0.85rem;
    color: #64748b;
}

.legend-dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 999px;
    margin-right: 0.45rem;
}

.section-subtitle {
    color: #64748b;
    max-width: 680px;
    margin-left: auto;
    margin-right: auto;
}

.chart-container {
    background: #ffffff;
    border-radius: 1rem;
    border: 1px solid #e2e8f0;
    padding: 1.75rem;
    box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
}

.custom-popup {
    opacity: 0 !important;
    visibility: hidden !important;
    pointer-events: none;
}

.custom-popup.popup-ready {
    opacity: 1 !important;
    visibility: visible !important;
    pointer-events: auto;
    animation: popupFadeIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes popupFadeIn {
    from {
        opacity: 0;
        transform: translateY(-8px) scale(0.96);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.custom-popup .mapboxgl-popup-content {
    border-radius: 0.75rem;
    padding: 0;
    box-shadow: 0 20px 50px rgba(15, 23, 42, 0.2), 0 0 0 1px rgba(148, 163, 184, 0.1);
    overflow: hidden;
    background: #ffffff;
    max-width: 240px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.custom-popup .mapboxgl-popup-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.02) 0%, rgba(139, 92, 246, 0.02) 100%);
    pointer-events: none;
    z-index: 0;
}

.custom-popup .mapboxgl-popup-tip {
    border-top-color: #ffffff;
    filter: drop-shadow(0 4px 6px rgba(15, 23, 42, 0.1));
}

.custom-popup .mapboxgl-popup-close-button {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(15, 23, 42, 0.05);
    border-radius: 50%;
    color: #64748b;
    font-size: 18px;
    font-weight: 600;
    transition: all 0.2s ease;
    right: 12px;
    top: 12px;
    z-index: 10;
}

.custom-popup .mapboxgl-popup-close-button:hover {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    transform: rotate(90deg);
}

.popup-image-container {
    position: relative;
    width: 100%;
    height: 120px;
    overflow: hidden;
    background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
}

.popup-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.popup-image-container:hover .popup-image {
    transform: scale(1.05);
}

.popup-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.3) 100%);
    pointer-events: none;
}

.popup-image-source {
    position: absolute;
    bottom: 0.75rem;
    right: 0.75rem;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.375rem 0.75rem;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    border-radius: 0.5rem;
    font-size: 0.7rem;
    color: #475569;
    text-decoration: none;
    transition: all 0.2s ease;
    z-index: 2;
}

.popup-image-source:hover {
    background: rgba(255, 255, 255, 1);
    color: #3b82f6;
    transform: translateY(-1px);
}

.popup-header {
    position: relative;
    padding: 1rem 1.25rem 0.875rem;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-bottom: 1px solid #e2e8f0;
    z-index: 1;
}

.popup-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
    background-size: 200% 100%;
    animation: gradientShift 3s ease infinite;
}

@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.popup-category-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.4rem 0.75rem;
    border-radius: 999px;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.025em;
    margin-bottom: 0.625rem;
    backdrop-filter: blur(8px);
    transition: transform 0.2s ease;
}

.popup-category-badge:hover {
    transform: scale(1.05);
}

.popup-title {
    font-size: 1rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
    line-height: 1.3;
    letter-spacing: -0.01em;
}

.popup-body {
    padding: 1rem 1.25rem;
    background: #ffffff;
    position: relative;
    z-index: 1;
}

.popup-body:empty {
    padding: 0;
}

.popup-description {
    font-size: 0.8rem;
    color: #64748b;
    line-height: 1.5;
    margin: 0 0 0.875rem;
}

.popup-footer {
    padding: 0.75rem 1.25rem;
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    z-index: 1;
}

.popup-coordinates {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: #64748b;
    font-family: 'Monaco', 'Menlo', monospace;
}

.popup-action-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: #3b82f6;
    background: rgba(59, 130, 246, 0.1);
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.popup-action-btn:hover {
    background: rgba(59, 130, 246, 0.15);
    color: #2563eb;
    transform: translateY(-1px);
}

.popup-icon {
    width: 20px;
    height: 20px;
    opacity: 0.7;
}

.popup-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
    margin: 0.75rem 0;
}

.popup-features {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 0.75rem;
}

.popup-feature-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: 500;
    background: rgba(148, 163, 184, 0.1);
    color: #475569;
    border: 1px solid rgba(148, 163, 184, 0.15);
}

@media (min-width: 768px) {
    .metric-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .metric-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
</style>
@endsection

@section('content')
<!-- Executive Hero -->
<section class="mapping-hero py-24">
    <div class="hero-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8" data-aos="fade-right">
                    <span class="badge-pill">
                        <span class="inline-flex h-2.5 w-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        Pemetaan Potensi Desa · Desa Kaana
                    </span>
                    <div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-tight">
                            Dashboard Strategis Pembangunan Desa Kaana
                        </h1>
                        <p class="mt-6 text-lg text-slate-200 max-w-xl leading-relaxed">
                            Ringkasan komprehensif kondisi sosial ekonomi, infrastruktur, dan potensi investasi
                            untuk mendukung pengambilan keputusan pemerintah desa dan mitra strategis.
                        </p>
                    </div>
                    <ul class="hero-summary">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5V6a9 9 0 009 9h1.5a3 3 0 013 3V21M3 4.5 7.5 3m-4.5 1.5L6 8.25" />
                            </svg>
                            Analisis terintegrasi demografi, ekonomi, pendidikan, dan akses infrastruktur.
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75h19.5M4.5 3.75h15a1.5 1.5 0 011.5 1.5v12H3v-12a1.5 1.5 0 011.5-1.5z" />
                            </svg>
                            Pembaruan data berkala dengan visual profesional untuk paparan pemangku kepentingan.
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25l7.5-4.5 7.5 4.5M3 8.25l7.5 4.5m0 0l7.5-4.5M10.5 12.75V21" />
                            </svg>
                            Menyoroti potensi prioritas dan kesiapan desa menghadapi program pengembangan.
                        </li>
                    </ul>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#map-overview" class="inline-flex items-center justify-center gap-3 px-6 py-3 rounded-xl bg-white text-slate-900 font-semibold shadow-lg shadow-slate-900/20 hover:shadow-xl transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.25v13.5M18.75 5.25v13.5M5.25 5.25 12 9m0 0 6.75-3.75M12 9v10.5" />
                            </svg>
                            Lihat Peta Strategis
                        </a>
                        <a href="#analytics" class="inline-flex items-center justify-center gap-3 px-6 py-3 rounded-xl border border-slate-200/70 text-slate-100 font-semibold hover:bg-slate-100/10 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-200" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h3.75c.621 0 1.125.504 1.125 1.125V19.5l3-1.5 3 1.5v-9.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21M8.25 9V5.25a3.75 3.75 0 117.5 0V9" />
                            </svg>
                            Analitik Potensi
                        </a>
                    </div>
                </div>

                <div class="metric-grid" data-aos="fade-left" data-aos-delay="150">
                    @foreach($statistics as $stat)
                    <div class="metric-card">
                        <div class="metric-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-sky-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7-7 7-7-7zm2 2l7 7 7-7" />
                            </svg>
                        </div>
                        <div class="metric-value" data-counter="{{ $stat->value }}">0</div>
                        <p class="metric-label">{{ $stat->label }}</p>
                        <p class="metric-subtext">{{ $stat->subtext }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Map Section -->
<section id="map-overview" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="data-chip">Peta Interaktif</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">
                Peta Strategis Desa Kaana
            </h2>
            <p class="section-subtitle mt-4">
                Visualisasi lokasi Desa Kaana di Pulau Enggano, lengkap dengan konteks geografis dan aksesibilitas utama
                untuk mendukung perencanaan pembangunan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            <div class="lg:col-span-3" data-aos="fade-right">
                <div class="map-card">
                    <div class="px-6 py-6 border-b border-slate-100 lg:px-8">
                        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-900 text-slate-50 flex items-center justify-center shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21l-1.42-1.284C6.343 15.196 3 12.208 3 8.75 3 6.13 5.007 4 7.5 4c1.54 0 3.04.726 4 1.874C12.46 4.726 13.96 4 15.5 4 17.993 4 20 6.13 20 8.75c0 3.458-3.343 6.446-7.58 10.966L12 21z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-900 leading-tight">Peta Desa Kaana</h3>
                                    <p class="text-sm text-slate-500">Pulau Enggano · Kabupaten Bengkulu Utara</p>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                <div class="map-toolbar">
                                    <button id="satellite-btn" class="text-slate-200 hover:text-slate-100 transition-colors duration-200">
                                        <span class="text-xs font-medium uppercase tracking-wide">Satelit</span>
                                    </button>
                                    <button id="street-btn" class="bg-white text-slate-900 shadow-sm transition-colors duration-200">
                                        <span class="text-xs font-medium uppercase tracking-wide">Peta Jalan</span>
                                    </button>
                                </div>
                                <span class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-500">
                                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Data aktif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div id="map" class="w-full h-[540px]"></div>
                        <div class="absolute bottom-4 left-4 bg-white/95 border border-slate-200 px-4 py-2 rounded-lg text-xs text-slate-500 shadow-sm">
                            <span class="font-semibold text-slate-700">Koordinat:</span> 5°21'S, 102°16'E
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2" data-aos="fade-left" data-aos-delay="120">
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="map-info-card">
                        <div class="map-info-card-header">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21l-1.42-1.284C6.343 15.196 3 12.208 3 8.75 3 6.13 5.007 4 7.5 4c1.54 0 3.04.726 4 1.874C12.46 4.726 13.96 4 15.5 4 17.993 4 20 6.13 20 8.75c0 3.458-3.343 6.446-7.58 10.966L12 21z" />
                                    </svg>
                                </span>
                                <div>
                                    <div class="map-info-card-title">Informasi Lokasi</div>
                                    <p class="map-info-card-subtitle">Profil geografis dan administratif desa</p>
                                </div>
                            </div>
                            <span class="data-chip">Geospasial</span>
                        </div>
                        <ul class="map-info-list">
                            <li><span>Koordinat</span><span class="font-semibold text-slate-700">5°21'S, 102°16'E</span></li>
                            <li><span>Ketinggian</span><span class="font-semibold text-slate-700">15 – 25 mdpl</span></li>
                            <li><span>Luas Area</span><span class="font-semibold text-slate-700">12.5 km²</span></li>
                            <li><span>Kecamatan</span><span class="font-semibold text-slate-700">Enggano</span></li>
                        </ul>
                    </div>

                    <div class="map-info-card">
                        <div class="map-info-card-header">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                    </svg>
                                </span>
                                <div>
                                    <div class="map-info-card-title">Kondisi Iklim</div>
                                    <p class="map-info-card-subtitle">Karakteristik cuaca dan musim dominan</p>
                                </div>
                            </div>
                            <span class="data-chip">Iklim</span>
                        </div>
                        <ul class="map-info-list">
                            <li><span>Suhu rata-rata</span><span class="font-semibold text-slate-700">26 – 28°C</span></li>
                            <li><span>Curah hujan</span><span class="font-semibold text-slate-700">2.500 mm/tahun</span></li>
                            <li><span>Kelembapan</span><span class="font-semibold text-slate-700">80 – 85%</span></li>
                            <li><span>Musim kering</span><span class="font-semibold text-emerald-500">Juni – September</span></li>
                        </ul>
                    </div>

                    <div class="map-info-card md:col-span-2">
                        <div class="map-info-card-header">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-full bg-sky-50 text-sky-500 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.5l16.5 7.5-16.5 7.5 4.5-7.5-4.5-7.5z" />
                                    </svg>
                                </span>
                                <div>
                                    <div class="map-info-card-title">Akses Transportasi</div>
                                    <p class="map-info-card-subtitle">Moda penghubung utama desa dan pusat kabupaten</p>
                                </div>
                            </div>
                            <span class="data-chip">Mobilitas</span>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="flex items-start gap-3 p-3 border border-slate-100 rounded-lg bg-slate-50/80">
                                <span class="legend-dot bg-sky-500 mt-2"></span>
                                <div>
                                    <div class="text-sm font-semibold text-slate-800">Kapal laut reguler</div>
                                    <p class="text-xs text-slate-500 leading-relaxed">Rute Bengkulu – Enggano dua kali setiap pekan.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 border border-slate-100 rounded-lg bg-slate-50/80">
                                <span class="legend-dot bg-emerald-500 mt-2"></span>
                                <div>
                                    <div class="text-sm font-semibold text-slate-800">Speedboat charter</div>
                                    <p class="text-xs text-slate-500 leading-relaxed">Durasi perjalanan 3–4 jam saat kondisi laut tenang.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 border border-slate-100 rounded-lg bg-slate-50/80 sm:col-span-2">
                                <span class="legend-dot bg-amber-500 mt-2"></span>
                                <div>
                                    <div class="text-sm font-semibold text-slate-800">Penerbangan perintis</div>
                                    <p class="text-xs text-slate-500 leading-relaxed">Operasional insidental menggunakan pesawat kecil sesuai kondisi cuaca.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Analytics Overview -->
<section id="analytics" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="data-chip">Profil Demografi</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">
                Analitik Populasi &amp; Sosial Desa Kaana
            </h2>
            <p class="section-subtitle mt-4">
                Ringkasan indikator kependudukan Desa Kaana tahun 2025 berdasarkan registrasi warga aktif untuk mendukung perencanaan layanan publik.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16" data-aos="fade-up" data-aos-delay="120">
            @foreach($statistics as $stat)
            <div class="data-card text-center space-y-4">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-sky-100 text-sky-600 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="text-4xl font-semibold text-slate-900" data-counter="{{ $stat->value }}">0</div>
                <p class="text-sm font-medium uppercase tracking-wide text-slate-500">{{ $stat->label }}</p>
                <p class="text-sm text-slate-500">{{ $stat->subtext }}</p>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="240">
            @foreach($demographics as $demo)
            <div class="data-card space-y-4">
                <div class="flex items-center gap-4">
                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-{{ $demo->color }}-100 text-{{ $demo->color }}-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM4.5 20.25a3 3 0 013-3h9a3 3 0 013 3" />
                        </svg>
                    </span>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">{{ $demo->title }}</h3>
                        @if($demo->value)
                        <p class="text-sm text-{{ $demo->color }}-500 font-medium">{{ $demo->value }}</p>
                        @endif
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-slate-600">
                    {{ $demo->description }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Data Visualization -->
<section id="insights" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="data-chip">Analitik Visual</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">
                Data Demografi dalam Visualisasi Modern
            </h2>
            <p class="section-subtitle mt-4">
                Menyajikan tren populasi, gender, dan struktur usia untuk memudahkan pemangku kepentingan memahami dinamika Desa Kaana.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="chart-container" data-aos="fade-right">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Distribusi Gender</h3>
                    <span class="data-chip">Update November 2025</span>
                </div>

                @php
                    $maleData = $chartData['gender_distribution']['male'] ?? null;
                    $femaleData = $chartData['gender_distribution']['female'] ?? null;
                    $totalPop = $chartData['total_population'] ?? 0;
                    $malePercent = $maleData ? $maleData['percentage'] : 0;
                    $femalePercent = $femaleData ? $femaleData['percentage'] : 0;
                @endphp

                <div class="flex items-center justify-center mb-10">
                    <div class="relative w-52 h-52">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient({{ $maleData['color'] ?? '#3b82f6' }} 0% {{ $malePercent }}%, {{ $femaleData['color'] ?? '#f472b6' }} {{ $malePercent }}% 100%);"></div>
                        <div class="absolute inset-5 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-3xl font-semibold text-slate-900" data-counter="{{ $totalPop }}">0</div>
                                <div class="text-sm text-slate-500">Total Penduduk</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @if($maleData)
                    <div class="data-card">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2 text-slate-700">
                                <span class="legend-dot" style="background-color: {{ $maleData['color'] }}"></span>
                                <span class="font-semibold">{{ $maleData['label'] }}</span>
                            </div>
                            <span class="text-xs font-medium text-slate-500">{{ $maleData['percentage'] }}%</span>
                        </div>
                        <div class="text-2xl font-semibold" style="color: {{ $maleData['color'] }}" data-counter="{{ $maleData['value'] }}">0</div>
                        <p class="text-xs text-slate-500 mt-1">Asal dominan pada dusun pesisir</p>
                    </div>
                    @endif
                    @if($femaleData)
                    <div class="data-card">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2 text-slate-700">
                                <span class="legend-dot" style="background-color: {{ $femaleData['color'] }}"></span>
                                <span class="font-semibold">{{ $femaleData['label'] }}</span>
                            </div>
                            <span class="text-xs font-medium text-slate-500">{{ $femaleData['percentage'] }}%</span>
                        </div>
                        <div class="text-2xl font-semibold" style="color: {{ $femaleData['color'] }}" data-counter="{{ $femaleData['value'] }}">0</div>
                        <p class="text-xs text-slate-500 mt-1">Berperan pada sektor pendidikan &amp; jasa</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="chart-container" data-aos="fade-left">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Komposisi Kelompok Usia</h3>
                    <span class="data-chip">Distribusi</span>
                </div>

                @php
                    $ageGroups = $chartData['age_group_distribution'] ?? collect();
                    $totalPop = $chartData['total_population'] ?? 0;
                    $productiveAge = $ageGroups->whereIn('label', ['Remaja (15-24)', 'Dewasa Muda (25-44)', 'Dewasa (45-64)'])->sum('value');
                    $productivePercent = $totalPop > 0 ? round(($productiveAge / $totalPop) * 100, 1) : 0;
                @endphp

                <div class="space-y-4">
                    @foreach($ageGroups as $ageGroup)
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">{{ $ageGroup['label'] }}</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full" style="width: {{ $ageGroup['percentage'] }}%; background-color: {{ $ageGroup['color'] }};"></div>
                        </div>
                        <div class="w-16 text-sm font-semibold text-slate-600 text-right" data-counter="{{ $ageGroup['value'] }}">0</div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-600">Rasio usia produktif</p>
                            <p class="text-lg font-semibold text-slate-900">{{ $productivePercent }}% penduduk</p>
                        </div>
                        <span class="data-chip">Potensi Tenaga Kerja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social & Livelihood Indicators -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="data-chip">Struktur Sosial &amp; Ekonomi</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">
                Kondisi Keberagaman dan Kesejahteraan Warga
            </h2>
            <p class="section-subtitle mt-4">
                Analisis persebaran keyakinan, kesejahteraan ekonomi, dan kualitas hunian sebagai dasar intervensi sosial terpadu.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <div class="chart-container" data-aos="fade-right" data-aos-delay="120">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Distribusi Agama</h3>
                    <span class="data-chip">Penduduk</span>
                </div>
                @php
                    $religions = $chartData['religion_distribution'] ?? collect();
                    $totalPop = $chartData['total_population'] ?? 0;
                    $religionPercentages = $religions->pluck('percentage', 'label')->toArray();
                    $religionColors = $religions->pluck('color', 'label')->toArray();
                    $cumulative = 0;
                @endphp
                <div class="flex items-center justify-center mb-10">
                    <div class="relative w-48 h-48">
                        <div class="absolute inset-0 rounded-full" style="background: conic-gradient(
                            @foreach($religions as $index => $religion)
                                {{ $religion['color'] }} {{ $cumulative }}% {{ $cumulative + $religion['percentage'] }}%
                                @php $cumulative += $religion['percentage']; @endphp
                                @if(!$loop->last), @endif
                            @endforeach
                        );"></div>
                        <div class="absolute inset-5 bg-white rounded-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-2xl font-semibold text-slate-900">100%</div>
                                <p class="text-sm text-slate-500">Populasi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    @foreach($religions as $religion)
                    <div class="flex items-center justify-between p-3 rounded-lg border" style="border-color: {{ $religion['color'] }}40; background-color: {{ $religion['color'] }}10;">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot" style="background-color: {{ $religion['color'] }}"></span>
                            <span class="font-medium">{{ $religion['label'] }}</span>
                        </div>
                        <span class="text-sm font-semibold text-slate-700" data-counter="{{ $religion['value'] }}">0 ({{ $religion['percentage'] }}%)</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="chart-container" data-aos="fade-left" data-aos-delay="120">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Status Sosial Ekonomi</h3>
                    <span class="data-chip">Kategori</span>
                </div>
                @php
                    $socioeconomic = $chartData['socioeconomic_distribution'] ?? collect();
                    $totalPop = $chartData['total_population'] ?? 0;
                @endphp
                <div class="space-y-4 mb-8">
                    @foreach($socioeconomic as $status)
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">{{ $status['label'] }}</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full" style="width: {{ $status['percentage'] }}%; background-color: {{ $status['color'] }};"></div>
                        </div>
                        <div class="w-20 text-sm font-semibold text-slate-600 text-right" data-counter="{{ $status['value'] }}">0</div>
                    </div>
                    @endforeach
                </div>
                <div class="p-4 rounded-xl bg-amber-50 border border-amber-100">
                    <p class="text-sm text-amber-700 font-medium">
                        Data berdasarkan pendataan penduduk desa.
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="chart-container" data-aos="fade-right" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Status Kepemilikan Hunian</h3>
                    <span class="data-chip">Properti</span>
                </div>
                <div class="space-y-4 mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">Milik sendiri</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-emerald-500" style="width: 78%;"></div>
                        </div>
                        <div class="w-20 text-sm font-semibold text-slate-600 text-right">257 KK</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">Kontrak/sewa</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-sky-500" style="width: 15%;"></div>
                        </div>
                        <div class="w-20 text-sm font-semibold text-slate-600 text-right">49 KK</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">Menumpang</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-amber-500" style="width: 5%;"></div>
                        </div>
                        <div class="w-20 text-sm font-semibold text-slate-600 text-right">16 KK</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">Lainnya</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-slate-400" style="width: 2%;"></div>
                        </div>
                        <div class="w-20 text-sm font-semibold text-slate-600 text-right">7 KK</div>
                    </div>
                </div>
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-100">
                    <p class="text-sm text-emerald-700 font-medium">85% rumah masuk kategori layak huni dengan sanitasi memadai.</p>
                </div>
            </div>

            <div class="chart-container" data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Akses Infrastruktur Dasar</h3>
                    <span class="data-chip">Fasilitas</span>
                </div>
                <div class="space-y-4 mb-8">
                    <div class="flex items-center justify-between p-3 border border-emerald-100 rounded-lg bg-emerald-50/70">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot bg-emerald-500"></span>
                            <span class="font-medium">Listrik PLN</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-emerald-600">95%</div>
                            <div class="text-xs text-slate-500">312 KK</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-sky-100 rounded-lg bg-sky-50/70">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot bg-sky-500"></span>
                            <span class="font-medium">Air Bersih</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-sky-600">78%</div>
                            <div class="text-xs text-slate-500">257 KK</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-violet-100 rounded-lg bg-violet-50/70">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot bg-violet-500"></span>
                            <span class="font-medium">Internet &amp; Seluler</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-violet-600">82%</div>
                            <div class="text-xs text-slate-500">270 KK</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-amber-100 rounded-lg bg-amber-50/70">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot bg-amber-500"></span>
                            <span class="font-medium">Ketersediaan jalan aspal</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-amber-600">65%</div>
                            <div class="text-xs text-slate-500">Jangkauan wilayah</div>
                        </div>
                    </div>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <p class="text-sm text-slate-700 font-medium">Indeks pembangunan desa mencapai skor 7.2/10 (kategori berkembang).</p>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Health & Mobility Overview -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                <div class="text-center mb-16" data-aos="fade-up">
                    <span class="data-chip">Kesehatan &amp; Mobilitas</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">Ketersediaan Layanan Dasar Warga</h2>
                    <p class="section-subtitle mt-4">Memantau kesiapan layanan kesehatan primer dan dukungan transportasi yang menjaga konektivitas antar dusun.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                    <div class="chart-container" data-aos="fade-right" data-aos-delay="120">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-semibold text-slate-900">Layanan Kesehatan</h3>
                            <span class="data-chip">Fasilitas</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="data-card text-center py-6">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Puskesmas</p>
                                <p class="text-2xl font-semibold text-emerald-600">1</p>
                            </div>
                            <div class="data-card text-center py-6">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Posyandu</p>
                                <p class="text-2xl font-semibold text-sky-600">3</p>
                            </div>
                            <div class="data-card text-center py-6">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Tenaga Bidan</p>
                                <p class="text-2xl font-semibold text-violet-600">2</p>
                            </div>
                            <div class="data-card text-center py-6">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Cakupan BPJS</p>
                                <p class="text-2xl font-semibold text-amber-600">85%</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 rounded-lg border border-emerald-100 bg-emerald-50/70">
                                <span class="text-sm font-medium text-slate-600">Imunisasi dasar lengkap</span>
                                <span class="text-sm font-semibold text-emerald-600">92%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg border border-sky-100 bg-sky-50/70">
                                <span class="text-sm font-medium text-slate-600">Peserta KB aktif</span>
                                <span class="text-sm font-semibold text-sky-600">78%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg border border-violet-100 bg-violet-50/70">
                                <span class="text-sm font-medium text-slate-600">Status gizi balita baik</span>
                                <span class="text-sm font-semibold text-violet-600">89%</span>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container" data-aos="fade-left" data-aos-delay="120">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-semibold text-slate-900">Transportasi &amp; Mobilitas</h3>
                            <span class="data-chip">Inventaris</span>
                        </div>
                        <div class="flex items-center justify-center mb-8">
                            <div class="relative w-44 h-44">
                                <div class="absolute inset-0 rounded-full" style="background: conic-gradient(#2563eb 0% 65%, #10b981 65% 85%, #f59e0b 85% 92%, #ef4444 92% 100%);"></div>
                                <div class="absolute inset-6 bg-white rounded-full flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-xl font-semibold text-slate-900">329</div>
                                        <p class="text-xs text-slate-500">Unit kendaraan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center justify-between p-3 rounded-lg border border-sky-100 bg-sky-50/70">
                                <div class="flex items-center gap-3 text-slate-700">
                                    <span class="legend-dot bg-sky-500"></span>
                                    <span class="font-medium">Sepeda motor</span>
                                </div>
                                <span class="text-sm font-semibold text-sky-600">214 (65%)</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg border border-emerald-100 bg-emerald-50/70">
                                <div class="flex items-center gap-3 text-slate-700">
                                    <span class="legend-dot bg-emerald-500"></span>
                                    <span class="font-medium">Sepeda</span>
                                </div>
                                <span class="text-sm font-semibold text-emerald-600">66 (20%)</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg border border-amber-100 bg-amber-50/70">
                                <div class="flex items-center gap-3 text-slate-700">
                                    <span class="legend-dot bg-amber-500"></span>
                                    <span class="font-medium">Mobil pribadi</span>
                                </div>
                                <span class="text-sm font-semibold text-amber-600">23 (7%)</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-lg border border-rose-100 bg-rose-50/70">
                                <div class="flex items-center gap-3 text-slate-700">
                                    <span class="legend-dot bg-rose-500"></span>
                                    <span class="font-medium">Truck &amp; angkutan</span>
                                </div>
                                <span class="text-sm font-semibold text-rose-600">26 (8%)</span>
                            </div>
                        </div>
                        <div class="p-4 rounded-xl bg-indigo-50 border border-indigo-100">
                            <p class="text-sm text-indigo-700 font-medium">Layanan angkutan umum tersedia dua kali sehari, menghubungkan desa dengan pusat kabupaten.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education & Digital Readiness -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                <div class="text-center mb-16" data-aos="fade-up">
                    <span class="data-chip">Pendidikan &amp; Transformasi Digital</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">Kesiapan SDM Menghadapi Era Digital</h2>
                    <p class="section-subtitle mt-4">Pemantauan partisipasi pendidikan formal dan pemanfaatan teknologi untuk memastikan kesiapan talenta desa.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="chart-container" data-aos="fade-right" data-aos-delay="120">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-semibold text-slate-900">Partisipasi Pendidikan</h3>
                            <span class="data-chip">Tahun Ajaran 2023</span>
                        </div>
                        <div class="flex items-end justify-between h-60 p-6 bg-slate-50 rounded-xl mb-6">
                            <div class="flex flex-col items-center gap-2">
                                <div class="relative w-16 bg-slate-200 rounded-t h-32">
                                    <div class="absolute bottom-0 left-0 w-full h-full rounded-t bg-emerald-500"></div>
                                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-sm font-semibold text-slate-700">45</span>
                                </div>
                                <span class="text-sm font-medium text-slate-600">TK</span>
                                <span class="text-xs font-semibold text-emerald-600">95%</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <div class="relative w-16 bg-slate-200 rounded-t h-40">
                                    <div class="absolute bottom-0 left-0 w-full h-full rounded-t bg-sky-500"></div>
                                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-sm font-semibold text-slate-700">89</span>
                                </div>
                                <span class="text-sm font-medium text-slate-600">SD</span>
                                <span class="text-xs font-semibold text-sky-600">98%</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <div class="relative w-16 bg-slate-200 rounded-t h-28">
                                    <div class="absolute bottom-0 left-0 w-full h-full rounded-t bg-amber-500"></div>
                                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-sm font-semibold text-slate-700">69</span>
                                </div>
                                <span class="text-sm font-medium text-slate-600">SMP</span>
                                <span class="text-xs font-semibold text-amber-600">92%</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <div class="relative w-16 bg-slate-200 rounded-t h-24">
                                    <div class="absolute bottom-0 left-0 w-full h-full rounded-t bg-rose-500"></div>
                                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-sm font-semibold text-slate-700">52</span>
                                </div>
                                <span class="text-sm font-medium text-slate-600">SMA</span>
                                <span class="text-xs font-semibold text-rose-500">88%</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="data-card text-center py-4">
                                <p class="text-sm font-medium text-slate-500">Total siswa aktif</p>
                                <p class="text-xl font-semibold text-emerald-600">255</p>
                            </div>
                            <div class="data-card text-center py-4">
                                <p class="text-sm font-medium text-slate-500">Rata-rata partisipasi</p>
                                <p class="text-xl font-semibold text-sky-600">94%</p>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container" data-aos="fade-left" data-aos-delay="120">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-semibold text-slate-900">Literasi Digital Masyarakat</h3>
                            <span class="data-chip">Indeks 2023</span>
                        </div>
                        <div class="space-y-5 mb-6">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-slate-600">Penggunaan internet</span>
                                    <span class="text-sm font-semibold text-sky-600">67%</span>
                                </div>
                                <div class="h-3 bg-slate-100 rounded-full">
                                    <div class="h-full rounded-full bg-sky-500" style="width: 67%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-slate-600">Aktif media sosial</span>
                                    <span class="text-sm font-semibold text-emerald-600">73%</span>
                                </div>
                                <div class="h-3 bg-slate-100 rounded-full">
                                    <div class="h-full rounded-full bg-emerald-500" style="width: 73%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-slate-600">Transaksi e-commerce</span>
                                    <span class="text-sm font-semibold text-violet-600">45%</span>
                                </div>
                                <div class="h-3 bg-slate-100 rounded-full">
                                    <div class="h-full rounded-full bg-violet-500" style="width: 45%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-slate-600">Pengguna mobile banking</span>
                                    <span class="text-sm font-semibold text-amber-600">38%</span>
                                </div>
                                <div class="h-3 bg-slate-100 rounded-full">
                                    <div class="h-full rounded-full bg-amber-500" style="width: 38%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <p class="text-sm text-slate-700 font-medium">Indeks kesiapan digital berada pada skor 5,8/10 dengan fokus peningkatan pada literasi keuangan digital.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Summary Statistics -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-white" data-aos="fade-up" data-aos-delay="600">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold mb-2">Ringkasan Indeks Pembangunan Desa</h3>
                <p class="text-blue-100">Penilaian komprehensif berdasarkan berbagai indikator sosial ekonomi</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="72">0</div>
                    <div class="text-sm text-blue-100">Indeks Pembangunan</div>
                    <div class="text-xs text-blue-200">Skor /100</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="85">0</div>
                    <div class="text-sm text-blue-100">Kesejahteraan</div>
                    <div class="text-xs text-blue-200">Persentase</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="88">0</div>
                    <div class="text-sm text-blue-100">Melek Huruf</div>
                    <div class="text-xs text-blue-200">Persentase</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-2" data-counter="93">0</div>
                    <div class="text-sm text-blue-100">Partisipasi Kerja</div>
                    <div class="text-xs text-blue-200">Persentase</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Counter Animation
    function animateCounter(element, target, duration = 2000) {
        const start = 0;
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = Math.floor(start + (target - start) * easeOutQuart);

            element.textContent = current.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
            }
        }

        requestAnimationFrame(updateCounter);
    }

    // Initialize counters with intersection observer
    const counters = document.querySelectorAll('[data-counter]');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-counter'));
                animateCounter(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));

    // Smooth scrolling for anchor links
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

    console.log('🎯 Mapping Dashboard initialized successfully!');
});
</script>

<!-- Mapbox JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mapbox Access Token - Token publik yang valid
    mapboxgl.accessToken = 'pk.eyJ1IjoianVydXNhbmtvZGluZyIsImEiOiJjbWNxcGYzM28wbGxtMm1vcjg1N3ptdDlmIn0.9oLmVq3VtghRi3MlaWFRyA';

    // Data dari database
    const boundaryData = @json($boundaryCoordinates);
    const poisData = @json($pois);

    const desaKaanaPolygon = boundaryData ? {
        "type": "Feature",
        "properties": {
            "name": boundaryData.village_name
        },
        "geometry": {
            "type": "Polygon",
            "coordinates": [boundaryData.coordinates]
        }
    } : null;

    // Initialize map dengan tampilan peta jalan sebagai default profesional
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: boundaryData ? boundaryData.center : [102.2615, -5.3502],
        zoom: boundaryData ? boundaryData.zoom : 13,
        pitch: 0,
        bearing: 0
    });

    // Add navigation controls
    map.addControl(new mapboxgl.NavigationControl(), 'top-right');

    // Add fullscreen control
    map.addControl(new mapboxgl.FullscreenControl(), 'top-right');

    // Add scale control
    map.addControl(new mapboxgl.ScaleControl({
        maxWidth: 100,
        unit: 'metric'
    }), 'bottom-left');

    let boundaryFitted = false;

    const ensureBoundaryLayer = () => {
        if (!desaKaanaPolygon) return;

        if (!map.getSource('desa-kaana-boundary')) {
            map.addSource('desa-kaana-boundary', {
                type: 'geojson',
                data: desaKaanaPolygon
            });

            map.addLayer({
                id: 'desa-kaana-fill',
                type: 'fill',
                source: 'desa-kaana-boundary',
                paint: {
                    'fill-color': boundaryData ? boundaryData.fill_color : '#2563eb',
                    'fill-opacity': boundaryData ? boundaryData.fill_opacity : 0.15
                }
            });

            map.addLayer({
                id: 'desa-kaana-outline',
                type: 'line',
                source: 'desa-kaana-boundary',
                paint: {
                    'line-color': boundaryData ? boundaryData.line_color : '#1d4ed8',
                    'line-width': boundaryData ? boundaryData.line_width : 2
                }
            });
        }

        if (!boundaryFitted) {
            const polygonBounds = desaKaanaPolygon.geometry.coordinates[0].reduce((bounds, coord) => {
                return bounds.extend(coord);
            }, new mapboxgl.LngLatBounds(desaKaanaPolygon.geometry.coordinates[0][0], desaKaanaPolygon.geometry.coordinates[0][0]));

            map.fitBounds(polygonBounds, { padding: 40, maxZoom: 14 });
            boundaryFitted = true;
        }
    };

    map.on('load', ensureBoundaryLayer);
    map.on('style.load', ensureBoundaryLayer);

    const desaPointsOfInterest = poisData || [];

    const categoryStyles = {
        nature: {
            gradient: 'from-teal-500 to-emerald-500',
            emoji: '🌿',
            label: 'Alam & Wisata',
            color: 'bg-teal-50 text-teal-700 border-teal-200',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>'
        },
        worship: {
            gradient: 'from-indigo-500 to-sky-500',
            emoji: '🕌',
            label: 'Tempat Ibadah',
            color: 'bg-indigo-50 text-indigo-700 border-indigo-200',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" /></svg>'
        },
        education: {
            gradient: 'from-amber-500 to-orange-500',
            emoji: '📚',
            label: 'Pendidikan',
            color: 'bg-amber-50 text-amber-700 border-amber-200',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>'
        },
        tourism: {
            gradient: 'from-rose-500 to-fuchsia-500',
            emoji: '🏖️',
            label: 'Wisata & Rekreasi',
            color: 'bg-rose-50 text-rose-700 border-rose-200',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" /></svg>'
        },
        default: {
            gradient: 'from-slate-500 to-slate-600',
            emoji: '📍',
            label: 'Lokasi',
            color: 'bg-slate-50 text-slate-700 border-slate-200',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>'
        }
    };

    // Variable untuk menyimpan popup yang sedang terbuka
    let currentOpenPopup = null;

    desaPointsOfInterest.forEach(point => {
        const style = categoryStyles[point.category] || categoryStyles.default;
        const markerEl = document.createElement('div');
        markerEl.innerHTML = `
            <div class="w-8 h-8 bg-gradient-to-br ${style.gradient} rounded-full flex items-center justify-center text-white text-base shadow-md border border-white">
                ${style.emoji}
            </div>
        `;
        markerEl.style.cursor = 'pointer';

        const popup = new mapboxgl.Popup({
            offset: 20,
            closeButton: true,
            className: 'custom-popup',
            closeOnClick: false,
            maxWidth: '240px'
        });

        const formatCoordinates = (coords) => {
            return `${coords[0].toFixed(6)}, ${coords[1].toFixed(6)}`;
        };

        const getDomainFromUrl = (url) => {
            try {
                const urlObj = new URL(url);
                return urlObj.hostname.replace('www.', '');
            } catch {
                return 'Sumber';
            }
        };

        popup.setHTML(`
            ${point.image_url ? `
            <div class="popup-image-container">
                <img src="${point.image_url}" alt="${point.name}" class="popup-image" loading="lazy" onerror="this.style.display='none'; this.parentElement.style.height='0';">
                <div class="popup-image-overlay"></div>
                <a href="${point.image_url}" target="_blank" rel="noopener noreferrer" class="popup-image-source">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    ${getDomainFromUrl(point.image_url)}
                </a>
            </div>
            ` : ''}
            <div class="popup-header">
                <div class="popup-category-badge ${style.color} border">
                    ${style.icon}
                    <span>${style.label}</span>
                </div>
                <h3 class="popup-title">${point.name}</h3>
            </div>
            <div class="popup-body">
                ${point.description ? `<p class="popup-description">${point.description}</p>` : ''}
                ${point.verified || point.isActive ? `
                ${point.description ? `<div class="popup-divider"></div>` : ''}
                <div class="popup-features">
                    ${point.verified ? `
                    <span class="popup-feature-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Lokasi Terverifikasi
                    </span>
                    ` : ''}
                    ${point.isActive ? `
                    <span class="popup-feature-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data Aktif
                    </span>
                    ` : ''}
                </div>
                ` : ''}
            </div>
            <div class="popup-footer">
                <div class="popup-coordinates">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.513 3.58C15.53 15.494 20.999 16.809 20.999 19.5c0 1.657-1.343 3-3 3h-15c-1.657 0-3-1.343-3-3 0-2.691 5.47-4.006 8.513-5.19M12 15V2.25" />
                    </svg>
                    <span>${formatCoordinates(point.coordinates)}</span>
                </div>
                <button class="popup-action-btn" onclick="window.open('https://www.google.com/maps/search/?api=1&query=${point.coordinates[1]},${point.coordinates[0]}', '_blank')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                    Buka Maps
                </button>
            </div>
        `);

        const marker = new mapboxgl.Marker({ element: markerEl, anchor: 'center' })
            .setLngLat(point.coordinates)
            .setPopup(popup)
            .addTo(map);

        // Event listener untuk menutup popup sebelumnya saat marker diklik
        markerEl.addEventListener('click', function() {
            if (currentOpenPopup && currentOpenPopup !== popup) {
                currentOpenPopup.remove();
            }
            currentOpenPopup = popup;
        });

        // Event listener saat popup dibuka - menambahkan class setelah posisi benar
        popup.on('open', function() {
            // Tunggu sampai posisi popup benar-benar dihitung oleh Mapbox
            // Menggunakan multiple requestAnimationFrame untuk memastikan posisi sudah benar
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        const popupContainer = popup._container;
                        if (popupContainer) {
                            // Pastikan posisi sudah dihitung dengan mengecek apakah ada transform
                            const computedStyle = window.getComputedStyle(popupContainer);
                            const transform = computedStyle.transform;
                            if (transform && transform !== 'none') {
                                popupContainer.classList.add('popup-ready');
                            } else {
                                // Jika belum ada transform, tunggu sedikit lagi
                                setTimeout(() => {
                                    popupContainer.classList.add('popup-ready');
                                }, 10);
                            }
                        }
                    });
                });
            });
        });

        // Event listener saat popup ditutup
        popup.on('close', function() {
            if (currentOpenPopup === popup) {
                currentOpenPopup = null;
            }
            // Hapus class saat popup ditutup
            const popupContainer = popup._container;
            if (popupContainer) {
                popupContainer.classList.remove('popup-ready');
            }
        });
    });

    // Simple toggle buttons functionality
    const satelliteBtn = document.getElementById('satellite-btn');
    const streetBtn = document.getElementById('street-btn');

    const activateButton = (activeBtn, inactiveBtn) => {
        const activeClasses = ['bg-white', 'text-slate-900', 'shadow-sm'];
        const inactiveClasses = ['text-slate-200'];

        activeClasses.forEach(cls => activeBtn.classList.add(cls));
        inactiveClasses.forEach(cls => activeBtn.classList.remove(cls));

        activeClasses.forEach(cls => inactiveBtn.classList.remove(cls));
        inactiveClasses.forEach(cls => inactiveBtn.classList.add(cls));
    };

    activateButton(streetBtn, satelliteBtn);

    satelliteBtn.addEventListener('click', function() {
        map.setStyle('mapbox://styles/mapbox/satellite-v9');
        activateButton(satelliteBtn, streetBtn);
    });

    streetBtn.addEventListener('click', function() {
        map.setStyle('mapbox://styles/mapbox/streets-v12');
        activateButton(streetBtn, satelliteBtn);
    });

    console.log('🗺️ Mapbox Streets map initialized for Desa Kaana, Enggano.');
});
</script>
@endsection
