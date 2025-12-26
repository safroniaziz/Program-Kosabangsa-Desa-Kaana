@extends('layouts.dashboard.dashboard')

@section('title', 'Alert Kesehatan Mental - Admin')

@section('menu')
    Alert Kesehatan Mental
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Alert Kesehatan Mental</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- Stats Cards -->
        <div class="row g-5 g-xl-8 mb-8">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-primary">
                                    <i class="fas fa-bell text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['total'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Total Alert</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-danger">
                                    <i class="fas fa-exclamation-triangle text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['active'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Alert Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-warning">
                                    <i class="fas fa-heartbeat text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['critical'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Alert Critical</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-success">
                                    <i class="fas fa-check-circle text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['acknowledged'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Acknowledged</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Alert Kesehatan Mental</h3>
                        <div class="card-toolbar">
                            <div class="d-flex gap-3">
                                <select id="filter-status" class="form-select form-select-sm">
                                    <option value="all">Semua Status</option>
                                    <option value="active">Active</option>
                                    <option value="acknowledged">Acknowledged</option>
                                    <option value="resolved">Resolved</option>
                                    <option value="dismissed">Dismissed</option>
                                </select>
                                <select id="filter-severity" class="form-select form-select-sm">
                                    <option value="all">Semua Severity</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="critical">Critical</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Search -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="search-input" class="form-control" placeholder="Cari nama user atau tipe alert...">
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
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Alert Type</th>
                                        <th>Severity</th>
                                        <th>Status</th>
                                        <th>Acknowledged By</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
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

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detail-content">
                <!-- Content loaded via AJAX -->
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
            searchQuery = $(this).val();
            currentPage = 1;
            loadData();
        }
    });

    $('#btn-reset').click(function() {
        $('#search-input').val('');
        $('#filter-status').val('all');
        $('#filter-severity').val('all');
        searchQuery = '';
        currentPage = 1;
        loadData();
    });

    $('#per-page').change(function() {
        perPage = $(this).val();
        currentPage = 1;
        loadData();
    });

    // Filters
    $('#filter-status, #filter-severity').change(function() {
        currentPage = 1;
        loadData();
    });

    // View Detail
    $(document).on('click', '.btn-view', function() {
        let id = $(this).data('id');
        $.get(`{{ url('admin/mental-health-alerts') }}/${id}`, function(data) {
            let html = `
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>User:</strong> ${data.user?.name || 'N/A'}</p>
                        <p><strong>Alert Type:</strong> ${data.alert_type}</p>
                        <p><strong>Severity:</strong> ${data.severity}</p>
                        <p><strong>Status:</strong> ${data.status}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Created:</strong> ${new Date(data.created_at).toLocaleString()}</p>
                        <p><strong>Acknowledged By:</strong> ${data.acknowledged_by_data?.name || '-'}</p>
                        <p><strong>Acknowledged At:</strong> ${data.acknowledged_at ? new Date(data.acknowledged_at).toLocaleString() : '-'}</p>
                    </div>
                </div>
                <hr>
                <p><strong>Alert Message:</strong></p>
                <p>${data.alert_message || '-'}</p>
                <hr>
                <p><strong>Trigger Scores:</strong></p>
                <pre>${JSON.stringify(data.trigger_scores, null, 2)}</pre>
                <hr>
                <p><strong>Recommended Actions:</strong></p>
                <ul>
                    ${data.recommended_actions ? data.recommended_actions.map(a => `<li>${a}</li>`).join('') : '<li>-</li>'}
                </ul>
            `;
            $('#detail-content').html(html);
            $('#detailModal').modal('show');
        });
    });

    // Acknowledge/Resolve
    $(document).on('click', '.btn-acknowledge', function() {
        let id = $(this).data('id');
        let status = $(this).data('status');
        let statusLabel = status === 'acknowledged' ? 'acknowledge' : 'resolve';
        
        Swal.fire({
            title: `${statusLabel.charAt(0).toUpperCase() + statusLabel.slice(1)} alert ini?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(`{{ url('admin/mental-health-alerts') }}/${id}/acknowledge`, {
                    _token: '{{ csrf_token() }}',
                    status: status
                }, function(response) {
                    Swal.fire('Berhasil', response.success, 'success');
                    loadData();
                });
            }
        });
    });

    // Delete
    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Yakin hapus alert ini?',
            text: "Data tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('admin/mental-health-alerts') }}/${id}`,
                    type: 'DELETE',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function(response) {
                        Swal.fire('Berhasil', response.success, 'success');
                        loadData();
                    }
                });
            }
        });
    });
});

function loadData() {
    $('#loading-indicator').show();
    $('#data-tbody').hide();

    let params = new URLSearchParams({
        page: currentPage,
        per_page: perPage,
        search: searchQuery,
        status: $('#filter-status').val(),
        severity: $('#filter-severity').val()
    });

    $.get(`{{ route('admin.mental-health-alerts.data') }}?${params}`)
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
        html = '<tr><td colspan="8" class="text-center">Tidak ada data</td></tr>';
    } else {
        data.forEach(function(item, index) {
            let no = (currentPage - 1) * perPage + index + 1;
            html += `
                <tr>
                    <td>${no}</td>
                    <td>${item.user_name || 'N/A'}</td>
                    <td>${item.alert_type || '-'}</td>
                    <td>${item.severity_badge || '-'}</td>
                    <td>${item.status_badge || '-'}</td>
                    <td>${item.acknowledged_info || '-'}</td>
                    <td>${item.created || '-'}</td>
                    <td>${item.action || ''}</td>
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
