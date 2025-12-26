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

<!-- ========================================== -->
<!-- SECTION: POTENSI DESA - SUMBER DAYA ALAM -->
<!-- ========================================== -->
<section id="podes-sda" class="py-20 bg-gradient-to-br from-green-50 to-emerald-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                Potensi Desa
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">Sumber Daya Alam</h2>
            <p class="section-subtitle mt-4">Kekayaan alam Desa Kaana meliputi lahan pertanian, sumber air, hutan, dan aset produktif lainnya.</p>
        </div>

        <!-- SDA Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12" data-aos="fade-up" data-aos-delay="100">
            @php
                $sdaIcons = [
                    'lahan' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>',
                    'air' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
                    'hutan' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>',
                    'mesin' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
                ];
                $sdaColors = ['lahan' => 'green', 'air' => 'blue', 'hutan' => 'emerald', 'mesin' => 'amber'];
            @endphp
            @foreach(($podesStats['sda']['by_category'] ?? []) as $cat => $count)
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="w-12 h-12 rounded-xl bg-{{ $sdaColors[$cat] ?? 'gray' }}-100 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-{{ $sdaColors[$cat] ?? 'gray' }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $sdaIcons[$cat] ?? $sdaIcons['lahan'] !!}</svg>
                </div>
                <p class="text-3xl font-bold text-slate-900">{{ $count }}</p>
                <p class="text-sm text-slate-500">{{ $podesStats['sda']['labels'][$cat] ?? ucfirst($cat) }}</p>
            </div>
            @endforeach
        </div>

        <!-- SDA Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12" data-aos="fade-up" data-aos-delay="200">
            <!-- Distribusi SDA -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-slate-900 mb-6">Distribusi Sumber Daya</h3>
                <div style="position: relative; height: 250px;">
                    <canvas id="sdaDistributionChart"></canvas>
                </div>
            </div>
            <!-- Total Lahan Info -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-slate-900 mb-6">Ringkasan Lahan</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                        <span class="text-slate-700">Total Lahan Pertanian</span>
                        <span class="text-2xl font-bold text-green-600">{{ number_format($podesStats['sda']['total_lahan_ha'] ?? 0, 1) }} Ha</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                        <span class="text-slate-700">Sumber Air</span>
                        <span class="text-2xl font-bold text-blue-600">{{ $podesStats['sda']['by_category']['air'] ?? 0 }} titik</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-xl">
                        <span class="text-slate-700">Kawasan Hutan</span>
                        <span class="text-2xl font-bold text-emerald-600">{{ $podesStats['sda']['by_category']['hutan'] ?? 0 }} area</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-amber-50 rounded-xl">
                        <span class="text-slate-700">Mesin Pertanian</span>
                        <span class="text-2xl font-bold text-amber-600">{{ $podesStats['sda']['by_category']['mesin'] ?? 0 }} unit</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SDA Detail Tables -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="300">
            @php
                $sdaCatColors = ['lahan' => 'green', 'air' => 'blue', 'hutan' => 'emerald', 'mesin' => 'amber'];
                $sdaCatTitles = ['lahan' => 'Lahan Pertanian', 'air' => 'Sumber Air', 'hutan' => 'Kawasan Hutan', 'mesin' => 'Mesin Pertanian'];
            @endphp
            @foreach(['lahan', 'air', 'hutan', 'mesin'] as $cat)
            @php $catItems = $naturalResources->where('category', $cat); @endphp
            @if($catItems->count() > 0)
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg bg-{{ $sdaCatColors[$cat] }}-100 flex items-center justify-center">
                        <span class="text-{{ $sdaCatColors[$cat] }}-600 font-bold">{{ $catItems->count() }}</span>
                    </div>
                    <h4 class="text-lg font-semibold text-slate-900">{{ $sdaCatTitles[$cat] }}</h4>
                </div>
                <div class="space-y-2">
                    @foreach($catItems as $item)
                    <div class="flex items-center justify-between p-3 bg-{{ $sdaCatColors[$cat] }}-50 rounded-lg text-sm">
                        <div>
                            <p class="font-medium text-slate-800">{{ $item->name }}</p>
                            <p class="text-slate-500 text-xs">{{ $item->type }}</p>
                        </div>
                        @if($item->area_size)
                        <span class="text-{{ $sdaCatColors[$cat] }}-600 font-semibold">{{ number_format($item->area_size, 1) }} {{ $item->unit }}</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- SECTION: POTENSI DESA - INFRASTRUKTUR -->
<!-- ========================================== -->
<section id="podes-infra" class="py-20 bg-gradient-to-br from-amber-50 to-orange-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-amber-100 text-amber-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Potensi Desa
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">Infrastruktur & Sarana</h2>
            <p class="section-subtitle mt-4">Kondisi infrastruktur jalan, listrik, air bersih, dan fasilitas umum di Desa Kaana.</p>
        </div>

        <!-- Infrastruktur Stats -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
            @foreach(($podesStats['infrastruktur']['by_category'] ?? []) as $cat => $count)
            <div class="bg-white rounded-xl p-4 shadow-lg border border-gray-100 text-center">
                <p class="text-2xl font-bold text-amber-600">{{ $count }}</p>
                <p class="text-xs text-slate-500">{{ $podesStats['infrastruktur']['labels'][$cat] ?? ucfirst($cat) }}</p>
            </div>
            @endforeach
        </div>

        <!-- Kondisi & Cakupan -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="200">
            <!-- Kondisi Infrastruktur -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-slate-900 mb-6">Kondisi Infrastruktur</h3>
                <div class="grid grid-cols-3 gap-4 mb-6">
                    @php $conditions = $podesStats['infrastruktur']['by_condition'] ?? []; @endphp
                    <div class="text-center p-4 bg-green-50 rounded-xl">
                        <p class="text-3xl font-bold text-green-600">{{ $conditions['baik'] ?? 0 }}</p>
                        <p class="text-sm text-slate-600">Baik</p>
                    </div>
                    <div class="text-center p-4 bg-amber-50 rounded-xl">
                        <p class="text-3xl font-bold text-amber-600">{{ $conditions['sedang'] ?? 0 }}</p>
                        <p class="text-sm text-slate-600">Sedang</p>
                    </div>
                    <div class="text-center p-4 bg-red-50 rounded-xl">
                        <p class="text-3xl font-bold text-red-600">{{ $conditions['rusak'] ?? 0 }}</p>
                        <p class="text-sm text-slate-600">Rusak</p>
                    </div>
                </div>
                <div style="position: relative; height: 200px;">
                    <canvas id="infraConditionChart"></canvas>
                </div>
            </div>
            <!-- Cakupan Layanan -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-slate-900 mb-6">Cakupan Layanan</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-slate-600 w-32">Rata-rata Cakupan</span>
                        <div class="flex-1 bg-gray-200 rounded-full h-4">
                            <div class="bg-amber-500 h-4 rounded-full" style="width: {{ $podesStats['infrastruktur']['avg_coverage'] ?? 0 }}%"></div>
                        </div>
                        <span class="text-lg font-bold text-amber-600">{{ $podesStats['infrastruktur']['avg_coverage'] ?? 0 }}%</span>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div class="p-4 bg-amber-50 rounded-xl text-center">
                        <p class="text-3xl font-bold text-amber-600">{{ $podesStats['infrastruktur']['total'] ?? 0 }}</p>
                        <p class="text-sm text-slate-600">Total Infrastruktur</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl text-center">
                        <p class="text-3xl font-bold text-green-600">{{ $conditions['baik'] ?? 0 }}</p>
                        <p class="text-sm text-slate-600">Kondisi Baik</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infrastruktur Detail Table -->
        <div class="mt-8 bg-white rounded-2xl p-6 shadow-lg border border-gray-100" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-xl font-semibold text-slate-900 mb-6">Daftar Infrastruktur</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Nama</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Kategori</th>
                            <th class="text-center py-3 px-4 font-semibold text-slate-700">Kondisi</th>
                            <th class="text-right py-3 px-4 font-semibold text-slate-700">Cakupan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($infrastructures as $infra)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <p class="font-medium text-slate-800">{{ $infra->name }}</p>
                                <p class="text-xs text-slate-500">{{ $infra->description ?? '-' }}</p>
                            </td>
                            <td class="py-3 px-4 text-slate-600">{{ $podesStats['infrastruktur']['labels'][$infra->category] ?? ucfirst($infra->category) }}</td>
                            <td class="py-3 px-4 text-center">
                                @php
                                    $condColors = ['baik' => 'green', 'sedang' => 'amber', 'rusak' => 'red'];
                                    $condLabels = ['baik' => 'Baik', 'sedang' => 'Sedang', 'rusak' => 'Rusak'];
                                @endphp
                                <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-{{ $condColors[$infra->condition] ?? 'gray' }}-100 text-{{ $condColors[$infra->condition] ?? 'gray' }}-700">
                                    {{ $condLabels[$infra->condition] ?? ucfirst($infra->condition) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right">
                                @if($infra->coverage_percentage)
                                <div class="flex items-center justify-end gap-2">
                                    <div class="w-16 bg-gray-200 rounded-full h-2">
                                        <div class="bg-amber-500 h-2 rounded-full" style="width: {{ $infra->coverage_percentage }}%"></div>
                                    </div>
                                    <span class="text-slate-700 font-medium">{{ $infra->coverage_percentage }}%</span>
                                </div>
                                @else
                                <span class="text-slate-400">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- SECTION: POTENSI DESA - EKONOMI -->
<!-- ========================================== -->
<section id="podes-ekonomi" class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                Potensi Desa
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">Ekonomi & UMKM</h2>
            <p class="section-subtitle mt-4">Potensi ekonomi lokal meliputi UMKM, sektor pertanian, perikanan, dan pariwisata.</p>
        </div>

        <!-- Ekonomi Highlight Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center">
                <p class="text-4xl font-bold text-blue-600">{{ $podesStats['ekonomi']['total'] ?? 0 }}</p>
                <p class="text-sm text-slate-500">Total Usaha</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center">
                <p class="text-4xl font-bold text-indigo-600">{{ $podesStats['ekonomi']['umkm_count'] ?? 0 }}</p>
                <p class="text-sm text-slate-500">UMKM</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center">
                <p class="text-4xl font-bold text-green-600">{{ $podesStats['ekonomi']['total_employees'] ?? 0 }}</p>
                <p class="text-sm text-slate-500">Total Karyawan</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center">
                <p class="text-3xl font-bold text-amber-600">Rp {{ number_format(($podesStats['ekonomi']['total_revenue'] ?? 0) / 1000000000, 1) }}M</p>
                <p class="text-sm text-slate-500">Pendapatan/Tahun</p>
            </div>
        </div>

        <!-- Ekonomi Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="200">
            <!-- Distribusi Ekonomi -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-slate-900 mb-6">Distribusi Sektor Ekonomi</h3>
                <div style="position: relative; height: 280px;">
                    <canvas id="ekonomiCategoryChart"></canvas>
                </div>
            </div>
            <!-- Detail per Kategori -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <h3 class="text-xl font-semibold text-slate-900 mb-6">Rincian per Sektor</h3>
                <div class="space-y-3">
                    @php $ekoColors = ['umkm' => 'blue', 'pertanian' => 'green', 'perikanan' => 'cyan', 'perdagangan' => 'purple', 'pariwisata' => 'pink', 'keuangan' => 'amber']; @endphp
                    @foreach(($podesStats['ekonomi']['by_category'] ?? []) as $cat => $count)
                    <div class="flex items-center justify-between p-3 bg-{{ $ekoColors[$cat] ?? 'gray' }}-50 rounded-lg">
                        <span class="text-slate-700">{{ $podesStats['ekonomi']['labels'][$cat] ?? ucfirst($cat) }}</span>
                        <span class="text-xl font-bold text-{{ $ekoColors[$cat] ?? 'gray' }}-600">{{ $count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Ekonomi Detail Table -->
        <div class="mt-8 bg-white rounded-2xl p-6 shadow-lg border border-gray-100" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-xl font-semibold text-slate-900 mb-6">Daftar Usaha & Potensi Ekonomi</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Nama Usaha</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Sektor</th>
                            <th class="text-center py-3 px-4 font-semibold text-slate-700">Karyawan</th>
                            <th class="text-right py-3 px-4 font-semibold text-slate-700">Pendapatan/Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $ekoColors = ['umkm' => 'blue', 'pertanian' => 'green', 'perikanan' => 'cyan', 'perdagangan' => 'purple', 'pariwisata' => 'pink', 'keuangan' => 'amber']; @endphp
                        @foreach($economicActivities as $eco)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <p class="font-medium text-slate-800">{{ $eco->name }}</p>
                                <p class="text-xs text-slate-500">{{ Str::limit($eco->description ?? '-', 50) }}</p>
                            </td>
                            <td class="py-3 px-4">
                                <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-{{ $ekoColors[$eco->category] ?? 'gray' }}-100 text-{{ $ekoColors[$eco->category] ?? 'gray' }}-700">
                                    {{ $podesStats['ekonomi']['labels'][$eco->category] ?? ucfirst($eco->category) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center font-medium text-slate-700">{{ $eco->employee_count ?? 0 }} orang</td>
                            <td class="py-3 px-4 text-right font-semibold text-green-600">
                                @if($eco->annual_revenue)
                                Rp {{ number_format($eco->annual_revenue / 1000000, 0) }} Juta
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Data Visualization -->
<section id="insights" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="data-chip">Analitik Visual</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4">
                Data Demografi Desa
            </h2>
            <p class="section-subtitle mt-4">
                Visualisasi memakai agregasi kependudukan untuk memperlihatkan dinamika gender, keyakinan, struktur usia, dan kesiapan sosial ekonomi Desa Kaana.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="chart-container" data-aos="fade-right">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Distribusi Gender</h3>
                    <span class="data-chip">Update Terbaru</span>
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
                        <p class="text-xs text-slate-500 mt-1">Mayoritas terlibat di sektor perikanan, keamanan desa, dan layanan logistik antar dusun.</p>
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
                        <p class="text-xs text-slate-500 mt-1">Aktif pada layanan kesehatan keluarga, pendidikan, serta UMKM kuliner dan kriya lokal.</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="chart-container" data-aos="fade-left">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Komposisi Kelompok Usia</h3>
                    <span class="data-chip">Profil Data Penduduk</span>
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
                    <h3 class="text-2xl font-semibold text-slate-900">Distribusi Status Sosial Ekonomi</h3>
                    <span class="data-chip">Ekonomi</span>
                </div>
                <div class="space-y-4 mb-8">
                    @php
                        $socioeconomicData = $chartData['socioeconomic_distribution'] ?? collect();
                    @endphp
                    @foreach($socioeconomicData as $socio)
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm font-medium text-slate-600">{{ $socio['label'] }}</div>
                        <div class="flex-1 h-3 rounded-full bg-slate-100">
                            <div class="h-full rounded-full" style="width: {{ $socio['percentage'] }}%; background-color: {{ $socio['color'] }};"></div>
                        </div>
                        <div class="w-20 text-sm font-semibold text-slate-600 text-right" data-counter="{{ $socio['value'] }}">0</div>
                    </div>
                    @endforeach
                </div>
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-100">
                    <p class="text-sm text-emerald-700 font-medium">
                        Data status sosial ekonomi berdasarkan pendataan penduduk desa. Distribusi yang merata menunjukkan stabilitas ekonomi masyarakat.
                    </p>
                </div>
            </div>

            <div class="chart-container" data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold text-slate-900">Komposisi Gender & Usia</h3>
                    <span class="data-chip">Demografi</span>
                </div>
                <div class="space-y-4 mb-8">
                    @php
                        $maleData = $chartData['gender_distribution']['male'] ?? null;
                        $femaleData = $chartData['gender_distribution']['female'] ?? null;
                        $ageGroups = $chartData['age_group_distribution'] ?? collect();
                    @endphp
                    @if($maleData && $femaleData)
                    <div class="flex items-center justify-between p-3 border border-blue-100 rounded-lg bg-blue-50/70 mb-4">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot bg-blue-500"></span>
                            <span class="font-medium">Laki-laki</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-blue-600">{{ $maleData['percentage'] }}%</div>
                            <div class="text-xs text-slate-500" data-counter="{{ $maleData['value'] }}">0 orang</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-pink-100 rounded-lg bg-pink-50/70 mb-4">
                        <div class="flex items-center gap-3 text-slate-700">
                            <span class="legend-dot bg-pink-500"></span>
                            <span class="font-medium">Perempuan</span>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-pink-600">{{ $femaleData['percentage'] }}%</div>
                            <div class="text-xs text-slate-500" data-counter="{{ $femaleData['value'] }}">0 orang</div>
                        </div>
                    </div>
                    @endif
                    <div class="pt-4 border-t border-slate-200">
                        <p class="text-sm font-medium text-slate-600 mb-3">Kelompok Usia Dominan:</p>
                        @foreach($ageGroups->take(3) as $ageGroup)
                        <div class="flex items-center justify-between p-2 border border-slate-100 rounded-lg bg-slate-50/70 mb-2">
                            <div class="flex items-center gap-2 text-slate-700">
                                <span class="text-xs">{{ $ageGroup['label'] }}</span>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-semibold text-slate-600">{{ $ageGroup['percentage'] }}%</span>
                                <span class="text-xs text-slate-500 ml-1" data-counter="{{ $ageGroup['value'] }}">(0)</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <p class="text-sm text-slate-700 font-medium">
                        Komposisi demografi yang seimbang memberikan basis partisipasi yang kuat untuk program pemberdayaan masyarakat.
                    </p>
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

                @php
                    $educationDistribution = collect($chartData['education_distribution'] ?? []);
                    $educationGenderComparison = collect($chartData['education_gender_comparison'] ?? []);
                    $educationOrder = ['tidak_sekolah', 'sd', 'smp', 'sma', 'diploma', 'sarjana', 'pascasarjana'];
                    $educationColors = [
                        'tidak_sekolah' => '#94a3b8',
                        'sd' => '#0ea5e9',
                        'smp' => '#f59e0b',
                        'sma' => '#ec4899',
                        'diploma' => '#8b5cf6',
                        'sarjana' => '#22c55e',
                        'pascasarjana' => '#6366f1',
                    ];
                    $orderedEducation = $educationDistribution->sortBy(function ($item) use ($educationOrder) {
                        $index = array_search($item['key'], $educationOrder, true);
                        return $index === false ? PHP_INT_MAX : $index;
                    })->values();
                    $maxEducationValue = max($orderedEducation->max('value') ?? 0, 1);
                    $totalEducationParticipants = $orderedEducation->sum('value');
                    $averageParticipation = $orderedEducation->count() ? round($orderedEducation->avg('percentage'), 1) : 0;
                    $topEducation = $orderedEducation->sortByDesc('value')->first();
                @endphp

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="chart-container" data-aos="fade-right" data-aos-delay="120">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-semibold text-slate-900">Partisipasi Pendidikan</h3>
                            <span class="data-chip">Data Penduduk</span>
                        </div>
                        <div class="space-y-4">
                            @forelse($orderedEducation as $education)
                                @php
                                    $barColor = $educationColors[$education['key']] ?? '#3b82f6';
                                @endphp
                                <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-slate-800">{{ $education['label'] }}</p>
                                            <p class="text-xs text-slate-500">{{ number_format($education['value']) }} warga</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold" style="color: {{ $barColor }};">{{ rtrim(rtrim(number_format($education['percentage'], 1), '0'), '.') }}%</p>
                                        </div>
                                    </div>
                                    <div class="mt-3 h-3 rounded-full bg-white border border-slate-200 overflow-hidden">
                                        <div style="width: {{ $education['percentage'] }}%; background-color: {{ $barColor }}; height: 100%;"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-slate-500">Belum ada data partisipasi pendidikan.</p>
                            @endforelse
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-6">
                            <div class="data-card text-center py-4">
                                <p class="text-sm font-medium text-slate-500">Total warga terdata</p>
                                <p class="text-xl font-semibold text-emerald-600">{{ number_format($totalEducationParticipants) }}</p>
                            </div>
                            <div class="data-card text-center py-4">
                                <p class="text-sm font-medium text-slate-500">Rata-rata partisipasi</p>
                                <p class="text-xl font-semibold text-sky-600">
                                    {{ $averageParticipation ? rtrim(rtrim(number_format($averageParticipation, 1), '0'), '.') : 0 }}%
                                </p>
                            </div>
                        </div>
                        @if($topEducation)
                            <div class="mt-4 p-4 rounded-xl bg-slate-50 border border-slate-100 text-sm text-slate-600">
                                Level dengan peserta terbanyak: <span class="font-semibold text-slate-900">{{ $topEducation['label'] }}</span> ({{ number_format($topEducation['value']) }} warga).
                            </div>
                        @endif
                    </div>

                    <div class="chart-container" data-aos="fade-left" data-aos-delay="120">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-semibold text-slate-900">Perbandingan Pendidikan per Gender</h3>
                            <span class="data-chip">Komposisi</span>
                        </div>
                        <div class="space-y-4">
                            @forelse($educationGenderComparison as $education)
                                <div class="p-4 rounded-xl border border-slate-100 bg-slate-50">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-slate-800">{{ $education['label'] }}</p>
                                            <p class="text-xs text-slate-500">{{ number_format($education['total']) }} warga</p>
                                        </div>
                                        <div class="text-right text-xs font-semibold text-slate-500 space-x-3">
                                            <span class="text-blue-600">{{ number_format($education['male']) }} L</span>
                                            <span class="text-rose-500">{{ number_format($education['female']) }} P</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 h-3 rounded-full bg-white border border-slate-200 overflow-hidden flex">
                                        <div class="bg-blue-500" style="width: {{ $education['male_percentage'] }}%;"></div>
                                        <div class="bg-rose-500" style="width: {{ $education['female_percentage'] }}%;"></div>
                                    </div>
                                    <div class="mt-2 flex items-center justify-between text-xs text-slate-500">
                                        <span>{{ rtrim(rtrim(number_format($education['male_percentage'], 1), '0'), '.') }}% laki-laki</span>
                                        <span>{{ rtrim(rtrim(number_format($education['female_percentage'], 1), '0'), '.') }}% perempuan</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-slate-500">Belum ada data perbandingan pendidikan berdasarkan gender.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Summary Statistics -->
        @php
            $indices = $chartData['development_indices'] ?? [
                'welfare_percentage' => 0,
                'formal_education_percentage' => 0,
                'formal_education_count' => 0,
                'users_with_education_data' => 0,
                'work_participation_percentage' => 0,
                'higher_education_percentage' => 0,
                'welfare_detail' => ['miskin' => 0, 'menengah' => 0, 'sejahtera' => 0],
                'total_population' => 0,
            ];
        @endphp
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-white" data-aos="fade-up" data-aos-delay="600">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold mb-3">Ringkasan Indeks Pembangunan Desa</h3>
                <p class="text-blue-100 text-sm">Data berdasarkan {{ number_format($indices['total_population']) }} warga terdata</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="flex items-center justify-between mb-3">
                        <div class="text-sm text-blue-200 font-medium">Kesejahteraan</div>
                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2" data-counter="{{ round($indices['welfare_percentage']) }}">0</div>
                    <div class="text-xs text-blue-200 mb-3">Status: Menengah, Menengah Atas, Kaya</div>
                    <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                        <div class="h-full bg-emerald-400" style="width: {{ $indices['welfare_percentage'] }}%"></div>
                    </div>
                    <p class="text-xs text-blue-300 mt-2">Berdasarkan data status sosial ekonomi warga</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="flex items-center justify-between mb-3">
                        <div class="text-sm text-blue-200 font-medium">Pendidikan Formal</div>
                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2" data-counter="{{ round($indices['formal_education_percentage']) }}">0</div>
                    <div class="text-xs text-blue-200 mb-3">
                        {{ number_format($indices['formal_education_count'] ?? 0) }} dari {{ number_format($indices['users_with_education_data'] ?? 0) }} warga terdata
                    </div>
                    <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-400" style="width: {{ $indices['formal_education_percentage'] }}%"></div>
                    </div>
                    <p class="text-xs text-blue-300 mt-2">SD, SMP, SMA, Diploma, Sarjana, Pascasarjana</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="flex items-center justify-between mb-3">
                        <div class="text-sm text-blue-200 font-medium">Usia Produktif</div>
                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold mb-2" data-counter="{{ round($indices['work_participation_percentage']) }}">0</div>
                    <div class="text-xs text-blue-200 mb-3">Warga berusia 15-64 tahun</div>
                    <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                        <div class="h-full bg-purple-400" style="width: {{ $indices['work_participation_percentage'] }}%"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <h4 class="text-sm font-semibold text-blue-100 mb-4">Distribusi Kesejahteraan</h4>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between text-xs text-blue-200 mb-1">
                                <span>Miskin</span>
                                <span>{{ number_format($indices['welfare_detail']['miskin']) }} warga</span>
                            </div>
                            <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                                <div class="h-full bg-red-400" style="width: {{ $indices['total_population'] > 0 ? ($indices['welfare_detail']['miskin'] / $indices['total_population']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs text-blue-200 mb-1">
                                <span>Menengah</span>
                                <span>{{ number_format($indices['welfare_detail']['menengah']) }} warga</span>
                            </div>
                            <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                                <div class="h-full bg-amber-400" style="width: {{ $indices['total_population'] > 0 ? ($indices['welfare_detail']['menengah'] / $indices['total_population']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs text-blue-200 mb-1">
                                <span>Sejahtera</span>
                                <span>{{ number_format($indices['welfare_detail']['sejahtera']) }} warga</span>
                            </div>
                            <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-400" style="width: {{ $indices['total_population'] > 0 ? ($indices['welfare_detail']['sejahtera'] / $indices['total_population']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <h4 class="text-sm font-semibold text-blue-100 mb-4">Pendidikan Tinggi</h4>
                    <div class="text-3xl font-bold mb-2" data-counter="{{ round($indices['higher_education_percentage']) }}">0</div>
                    <div class="text-xs text-blue-200 mb-3">Warga dengan pendidikan SMA ke atas</div>
                    <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-400" style="width: {{ $indices['higher_education_percentage'] }}%"></div>
                    </div>
                    <p class="text-xs text-blue-300 mt-3">Basis data untuk pengembangan SDM desa</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

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
            if (!coords) return 'N/A';
            if (Array.isArray(coords) && coords.length >= 2) {
                const lng = parseFloat(coords[0]);
                const lat = parseFloat(coords[1]);
                if (!isNaN(lng) && !isNaN(lat)) {
                    return `${lng.toFixed(6)}, ${lat.toFixed(6)}`;
                }
            }
            return 'N/A';
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

// PODES Charts
document.addEventListener('DOMContentLoaded', function() {
    // SDA Distribution Chart
    const sdaDistributionCtx = document.getElementById('sdaDistributionChart');
    if (sdaDistributionCtx) {
        new Chart(sdaDistributionCtx.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach(($podesStats['sda']['by_category'] ?? []) as $cat => $count)
                    '{{ $podesStats['sda']['labels'][$cat] ?? ucfirst($cat) }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach(($podesStats['sda']['by_category'] ?? []) as $cat => $count)
                        {{ $count }},
                        @endforeach
                    ],
                    backgroundColor: ['#22c55e', '#3b82f6', '#10b981', '#f59e0b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: { padding: 15, usePointStyle: true, font: { size: 12 } }
                    }
                }
            }
        });
    }

    // Infrastruktur Condition Chart
    const infraConditionCtx = document.getElementById('infraConditionChart');
    if (infraConditionCtx) {
        new Chart(infraConditionCtx.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Baik', 'Sedang', 'Rusak'],
                datasets: [{
                    data: [
                        {{ $podesStats['infrastruktur']['by_condition']['baik'] ?? 0 }},
                        {{ $podesStats['infrastruktur']['by_condition']['sedang'] ?? 0 }},
                        {{ $podesStats['infrastruktur']['by_condition']['rusak'] ?? 0 }}
                    ],
                    backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { padding: 20, usePointStyle: true }
                    }
                }
            }
        });
    }

    // Ekonomi Category Chart
    const ekonomiCategoryCtx = document.getElementById('ekonomiCategoryChart');
    if (ekonomiCategoryCtx) {
        new Chart(ekonomiCategoryCtx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: [
                    @foreach(($podesStats['ekonomi']['by_category'] ?? []) as $cat => $count)
                    '{{ $podesStats['ekonomi']['labels'][$cat] ?? ucfirst($cat) }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        @foreach(($podesStats['ekonomi']['by_category'] ?? []) as $cat => $count)
                        {{ $count }},
                        @endforeach
                    ],
                    backgroundColor: [
                        '#3b82f6', '#8b5cf6', '#06b6d4', '#10b981', '#f59e0b', '#ef4444', '#6b7280'
                    ],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1.5,
                indexAxis: 'y',
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: { display: false }
                    },
                    y: {
                        grid: { display: false }
                    }
                }
            }
        });
    }
});
</script>
@endsection
