@extends('layouts.dashboard.dashboard')

@section('title', 'Batas Wilayah - Admin')

@section('menu')
    Batas Wilayah
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Batas Wilayah</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Batas Wilayah Desa</h3>
                    </div>
                    <div class="card-body">
                        <!-- Alert Info -->
                        <div class="alert alert-info d-flex align-items-center mb-4">
                            <i class="fas fa-info-circle fs-2 me-3"></i>
                            <div>
                                <strong>Data Statis</strong><br>
                                Data koordinat batas wilayah ini bersifat statis dan tidak dapat diubah, ditambah, atau dihapus karena sudah dimapping secara manual.
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
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
    </div>
</div>

@endsection

@push('scripts')
<script>
let currentPage = 1;
let perPage = 10;

$(function() {
    loadData();

    $('#per-page').change(function() {
        perPage = $(this).val();
        currentPage = 1;
        loadData();
    });
});

function loadData() {
    $('#loading-indicator').show();
    $('#data-tbody').hide();

    let params = new URLSearchParams({
        page: currentPage,
        per_page: perPage
    });

    $.get(`{{ route('admin.village-boundaries.data') }}?${params}`)
        .done(function(response) {
            const data = Array.isArray(response.data) ? response.data : [];
            renderTable(data);
            renderPagination(response);
            renderInfo(response);
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        })
        .fail(function(xhr) {
            Swal.fire('Error', 'Gagal memuat data', 'error');
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        });
}

function renderTable(data) {
    let html = '';
    
    if (data.length === 0) {
        html = '<tr><td colspan="3" class="text-center">Tidak ada data</td></tr>';
    } else {
        data.forEach(function(item) {
            html += `
                <tr>
                    <td>${item.no || '-'}</td>
                    <td>${item.latitude || '-'}</td>
                    <td>${item.longitude || '-'}</td>
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
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.current_page - 1}">Previous</a></li>`;
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
    let start = (response.current_page - 1) * response.per_page + 1;
    let end = Math.min(response.current_page * response.per_page, response.total);
    $('#table-info').text(`Menampilkan ${start} sampai ${end} dari ${response.total} data`);
}

</script>
@endpush
