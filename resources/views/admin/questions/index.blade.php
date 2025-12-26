@extends('layouts.dashboard.dashboard')

@section('title', 'Bank Soal - Admin')

@section('menu')
    Bank Soal
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Bank Soal</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- Stats Cards -->
        <div class="row g-5 g-xl-8 mb-8">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-light-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-primary">
                                    <i class="fas fa-list-check text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ App\Models\ChecklistMasalahQuestion::count() }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Soal DCM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-light-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label bg-warning">
                                        <i class="fas fa-brain text-white fs-2"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="text-gray-800 fs-1 fw-bold">{{ App\Models\PTSDQuestion::count() }}</span>
                                    <span class="text-gray-600 fw-semibold d-block">Soal PTSD</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.questions.ptsd.index') }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-external-link-alt me-1"></i> Kelola PTSD
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DCM Questions Table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-check me-2 text-primary"></i>Daftar Soal DCM (Checklist Masalah)</h3>
            </div>
            <div class="card-body">
                <!-- Search -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" placeholder="Cari soal...">
                            <button type="button" id="btn-search" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" id="btn-reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Pertanyaan</th>
                                <th style="width: 150px;">Kategori</th>
                                <th style="width: 80px;">Order</th>
                            </tr>
                        </thead>
                        <tbody id="data-tbody">
                        </tbody>
                    </table>
                </div>

                <!-- Loading indicator -->
                <div id="loading-indicator" class="text-center py-4" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <label class="me-2">Show:</label>
                            <select id="per-page" class="form-control form-control-sm" style="width: auto;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            <span class="ms-2">entries</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="pagination-container" class="d-flex justify-content-end"></div>
                    </div>
                </div>

                <!-- Info -->
                <div class="row mt-2">
                    <div class="col-12">
                        <div id="table-info" class="text-muted small"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentPage = 1;
let perPage = 10;
let searchQuery = '';

$(function() {
    loadData();

    $('#btn-search').click(function() {
        searchQuery = $('#search-input').val();
        currentPage = 1;
        loadData();
    });

    $('#search-input').keypress(function(e) {
        if (e.which == 13) {
            $('#btn-search').click();
        }
    });

    $('#btn-reset').click(function() {
        searchQuery = '';
        $('#search-input').val('');
        currentPage = 1;
        loadData();
    });

    $('#per-page').change(function() {
        perPage = parseInt($(this).val());
        currentPage = 1;
        loadData();
    });
});

function loadData() {
    $('#loading-indicator').show();
    $('#data-tbody').hide();

    $.ajax({
        url: "{{ route('admin.questions.data') }}",
        method: 'GET',
        data: {
            page: currentPage,
            per_page: perPage,
            search: searchQuery
        },
        success: function(response) {
            renderTable(response.data || []);
            renderPagination(response);
            renderInfo(response);
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        },
        error: function(xhr) {
            Swal.fire('Error', 'Gagal memuat data', 'error');
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        }
    });
}

function renderTable(data) {
    let html = '';
    if (data.length === 0) {
        html = '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>';
    } else {
        data.forEach(function(item, index) {
            let no = (currentPage - 1) * perPage + index + 1;
            html += `
                <tr>
                    <td class="text-center">${no}</td>
                    <td>${item.question || '-'}</td>
                    <td><span class="badge badge-light-primary">${item.category || '-'}</span></td>
                    <td class="text-center">${item.order_number || '-'}</td>
                </tr>
            `;
        });
    }
    $('#data-tbody').html(html);
}

function renderPagination(response) {
    let html = '';
    if (response.total > 0) {
        html += '<nav><ul class="pagination pagination-sm mb-0">';
        if (response.current_page > 1) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.current_page - 1}">Prev</a></li>`;
        }
        let startPage = Math.max(1, response.current_page - 2);
        let endPage = Math.min(response.last_page, response.current_page + 2);
        if (startPage > 1) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`;
            if (startPage > 2) html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }
        for (let i = startPage; i <= endPage; i++) {
            html += `<li class="page-item ${i === response.current_page ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }
        if (endPage < response.last_page) {
            if (endPage < response.last_page - 1) html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.last_page}">${response.last_page}</a></li>`;
        }
        if (response.current_page < response.last_page) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.current_page + 1}">Next</a></li>`;
        }
        html += '</ul></nav>';
    }
    $('#pagination-container').html(html);
    $('.page-link').click(function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        if (page && page !== currentPage) {
            currentPage = page;
            loadData();
        }
    });
}

function renderInfo(response) {
    if (response.total > 0) {
        let start = (response.current_page - 1) * response.per_page + 1;
        let end = Math.min(response.current_page * response.per_page, response.total);
        $('#table-info').text(`Menampilkan ${start} sampai ${end} dari ${response.total} data`);
    } else {
        $('#table-info').text('Tidak ada data');
    }
}
</script>
@endpush