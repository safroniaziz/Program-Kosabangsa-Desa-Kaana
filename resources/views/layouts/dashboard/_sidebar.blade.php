<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
            <div style="
                background: linear-gradient(145deg, #667eea, #764ba2);
                padding: 8px;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 50px;
                min-height: 50px;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <i class="fas fa-home fs-2x text-white"></i>
            </div>
            <div class="h-35px app-sidebar-logo-minimize d-none" style="
                background: linear-gradient(145deg, #667eea, #764ba2);
                padding: 6px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 35px;
                min-height: 35px;
            ">
                <i class="fas fa-home fs-3 text-white"></i>
            </div>
            <div class="d-flex flex-column ms-3 app-sidebar-logo-default">
                <span class="fs-3 fw-bolder text-uppercase" style="letter-spacing: 1px; font-family: 'Segoe UI', sans-serif; color: #ffffff; text-shadow: 0 0 10px rgba(255,255,255,0.3);">KOSABANGSA</span>
                <span class="fs-8 fw-light" style="margin-top: -4px; letter-spacing: 0.5px; color: rgba(255,255,255,0.9); text-shadow: 0 0 5px rgba(255,255,255,0.2);">Desa Kaana</span>
            </div>
        </a>

        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-3 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                    <!--begin:Menu item-->
                    <div class="menu-item ">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">MENU ADMIN</span>
                        </div>
                        <!--end:Menu content-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item {{ Route::is('dashboard') ? 'show' : '' }}">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <span class="menu-icon">
                                <i class="fa fa-chart-line fs-4"></i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <div class="menu-item {{ Route::is('admin.assessments.index') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.assessments.index') ? 'active' : '' }}" href="{{ route('admin.assessments.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-clipboard-check fs-4"></i>
                            </span>
                            <span class="menu-title">Assessments</span>
                        </a>
                    </div>


                    <div class="menu-item {{ Route::is('admin.users.index') ? 'show' : '' }}">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Route::is('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                            <span class="menu-icon">
                                <i class="fa fa-users fs-4"></i>
                            </span>
                            <span class="menu-title">Data Warga</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                    <div class="menu-item {{ Route::is('admin.coordinates.*') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.coordinates.*') ? 'active' : '' }}" href="{{ route('admin.coordinates.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-map-marker-alt fs-4"></i>
                            </span>
                            <span class="menu-title">Lokasi Penting</span>
                        </a>
                    </div>

                    <!--begin:Menu item - DATA DESA -->
                    <div class="menu-item ">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">DATA DESA</span>
                        </div>
                    </div>


                    <div class="menu-item {{ Route::is('admin.village-demographics.*') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.village-demographics.*') ? 'active' : '' }}" href="{{ route('admin.village-demographics.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-users-cog fs-4"></i>
                            </span>
                            <span class="menu-title">Demografi Desa</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::is('admin.village-boundaries.*') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.village-boundaries.*') ? 'active' : '' }}" href="{{ route('admin.village-boundaries.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-draw-polygon fs-4"></i>
                            </span>
                            <span class="menu-title">Batas Wilayah</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::is('admin.natural-resources.*') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.natural-resources.*') ? 'active' : '' }}" href="{{ route('admin.natural-resources.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-leaf fs-4"></i>
                            </span>
                            <span class="menu-title">Sumber Daya Alam</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::is('admin.infrastructures.*') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.infrastructures.*') ? 'active' : '' }}" href="{{ route('admin.infrastructures.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-road fs-4"></i>
                            </span>
                            <span class="menu-title">Infrastruktur</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::is('admin.economic-activities.*') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('admin.economic-activities.*') ? 'active' : '' }}" href="{{ route('admin.economic-activities.index') }}">
                            <span class="menu-icon">
                                <i class="fas fa-store fs-4"></i>
                            </span>
                            <span class="menu-title">Data Ekonomi</span>
                        </a>
                    </div>

                    {{-- Menu Alert Kesehatan dan Bank Soal dihilangkan karena belum ada data --}}

                    {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Route::is('rsbProdi.index','rsbFakultas.index') ? 'show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-clipboard-list fs-4"></i>
                            </span>
                            <span class="menu-title">Instrumen RSB</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ Route::is('rsbProdi.index') ? 'active' : '' }}" href="{{ route('rsbProdi.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Program Studi</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Route::is('rsbFakultas.index') ? 'active' : '' }}" href="{{ route('rsbFakultas.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Fakultas</span>
                                </a>
                            </div>
                        </div>
                    </div> --}}



                    <div class="menu-item ">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">TOOLS</span>
                        </div>
                        <!--end:Menu content-->
                    </div>

                    <div class="menu-item {{ Route::is('assessment') ? 'show' : '' }}">
                        <a class="menu-link {{ Route::is('assessment') ? 'active' : '' }}" href="{{ route('assessment') }}">
                            <span class="menu-icon">
                                <i class="fa fa-plus-circle fs-4"></i>
                            </span>
                            <span class="menu-title">Mulai Assessment</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::is('mapping') || Route::is('admin.mapping.*') ? 'show' : '' }}">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Route::is('mapping') || Route::is('admin.mapping.*') ? 'active' : '' }}" href="{{ route('mapping') }}">
                            <span class="menu-icon">
                                <i class="fa fa-map-marked-alt fs-4"></i>
                            </span>
                            <span class="menu-title">Peta Potensi Desa</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <i class="fa fa-sign-out-alt fs-4 text-danger"></i>
                            </span>
                            <span class="menu-title">Logout</span>
                        </a>
                        <!--end:Menu link-->

                        <!-- Form for logout -->
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
