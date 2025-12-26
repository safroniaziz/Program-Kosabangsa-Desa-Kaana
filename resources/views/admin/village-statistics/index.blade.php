@extends('layouts.dashboard.dashboard')

@section('title', 'Statistik Desa - Admin')

@section('menu')
    Statistik Desa
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Statistik Desa</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Statistik Desa</h3>
                        <div class="card-toolbar">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus"></i> Tambah Statistik
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Search -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="search-input" class="form-control" placeholder="Cari key atau label...">
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
                                        <th>Key</th>
                                        <th>Label</th>
                                        <th>Value</th>
                                        <th>Subtext</th>
                                        <th>Icon</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="data-tbody">
                                    <!-- Data will be loaded via AJAX -->
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
                                        <option value="100">100</option>
                                    </select>
                                    <span class="ms-2">entries</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="pagination-container" class="d-flex justify-content-end">
                                    <!-- Pagination will be loaded via AJAX -->
                                </div>
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="row mt-2">
                            <div class="col-12">
                                <div id="table-info" class="text-muted small">
                                    <!-- Info will be loaded via AJAX -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="createForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Statistik Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Key</label>
                        <input type="text" class="form-control" name="key" required placeholder="contoh: total_penduduk">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Label</label>
                        <input type="text" class="form-control" name="label" required placeholder="contoh: Total Penduduk">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Value</label>
                        <input type="number" class="form-control" name="value" required placeholder="contoh: 1500">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtext</label>
                        <input type="text" class="form-control" name="subtext" placeholder="contoh: Jiwa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon (Font Awesome)</label>
                        <input type="text" class="form-control" name="icon" placeholder="contoh: fas fa-users">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" class="form-control" name="order" value="0">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="create_is_active" checked>
                        <label class="form-check-label" for="create_is_active">Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm">
                @csrf
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Statistik Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Key</label>
                        <input type="text" class="form-control" id="edit_key" name="key" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Label</label>
                        <input type="text" class="form-control" id="edit_label" name="label" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Value</label>
                        <input type="number" class="form-control" id="edit_value" name="value" required>
                        <small class="form-text text-muted" id="edit_value_hint" style="display: none;">
                            <i class="fas fa-info-circle"></i> Nilai ini dihitung otomatis dari data warga yang terdaftar di sistem.
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtext</label>
                        <input type="text" class="form-control" id="edit_subtext" name="subtext">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon (Font Awesome)</label>
                        <input type="text" class="form-control" id="edit_icon" name="icon">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" class="form-control" id="edit_order" name="order">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active">
                        <label class="form-check-label" for="edit_is_active">Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
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

    // Search functionality
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

    // Reset filters
    $('#btn-reset').click(function() {
        $('#search-input').val('');
        searchQuery = '';
        currentPage = 1;
        loadData();
    });

    // Per page change
    $('#per-page').change(function() {
        perPage = $(this).val();
        currentPage = 1;
        loadData();
    });

    // Create
    $('#createForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('admin.village-statistics.store') }}",
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire('Berhasil', response.success, 'success');
                $('#createModal').modal('hide');
                $('#createForm')[0].reset();
                loadData();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let msg = errors ? Object.values(errors).flat().join('\n') : 'Terjadi kesalahan';
                Swal.fire('Error', msg, 'error');
            }
        });
    });

    // Edit
    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        $.get(`{{ url('admin/village-statistics') }}/${id}`, function(data) {
            $('#edit_id').val(data.id);
            $('#edit_key').val(data.key);
            $('#edit_label').val(data.label);
            $('#edit_value').val(data.value);
            $('#edit_subtext').val(data.subtext);
            $('#edit_icon').val(data.icon);
            $('#edit_order').val(data.order);
            $('#edit_is_active').prop('checked', data.is_active);
            
            // Jika key adalah total_population, buat field value menjadi read-only
            // dan update value dari data users terbaru
            if (data.key === 'total_population') {
                $('#edit_value').prop('readonly', true).addClass('bg-light');
                $('#edit_value_hint').show();
                // Update value dengan data terbaru dari users (akan di-sync oleh controller saat submit)
            } else {
                $('#edit_value').prop('readonly', false).removeClass('bg-light');
                $('#edit_value_hint').hide();
            }
            
            $('#editModal').modal('show');
        });
    });

    $('#editForm').submit(function(e) {
        e.preventDefault();
        let id = $('#edit_id').val();
        let key = $('#edit_key').val();
        
        // Jika key adalah total_population, ambil value terbaru dari server
        let formData = $(this).serialize();
        if (key === 'total_population') {
            // Value akan di-override oleh controller, tapi kita tetap kirim untuk validasi
            // Controller akan menghitung ulang dari data users
        }
        
        $.ajax({
            url: `{{ url('admin/village-statistics') }}/${id}`,
            type: 'PUT',
            data: formData,
            success: function(response) {
                Swal.fire('Berhasil', response.success, 'success');
                $('#editModal').modal('hide');
                loadData();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let msg = errors ? Object.values(errors).flat().join('\n') : 'Terjadi kesalahan';
                Swal.fire('Error', msg, 'error');
            }
        });
    });

    // Toggle Status
    $(document).on('click', '.btn-toggle', function() {
        let id = $(this).data('id');
        $.post(`{{ url('admin/village-statistics') }}/${id}/toggle-status`, {
            _token: '{{ csrf_token() }}'
        }, function(response) {
            Swal.fire('Berhasil', response.success, 'success');
            loadData();
        });
    });

    // Delete
    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('admin/village-statistics') }}/${id}`,
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
        search: searchQuery
    });

    $.get(`{{ route('admin.village-statistics.data') }}?${params}`)
        .done(function(response) {
            const data = Array.isArray(response.data) ? response.data : [];
            renderTable(data);
            renderPagination(response);
            renderInfo(response);
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        })
        .fail(function(xhr) {
            let errorMsg = 'Gagal memuat data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            }
            Swal.fire('Error', errorMsg, 'error');
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        });
}

function renderTable(data) {
    let html = '';

    if (data.length === 0) {
        html = '<tr><td colspan="9" class="text-center">Tidak ada data</td></tr>';
    } else {
        data.forEach(function(item, index) {
            let no = (currentPage - 1) * perPage + index + 1;
            html += `
                <tr>
                    <td>${no}</td>
                    <td>${item.key || '-'}</td>
                    <td>${item.label || '-'}</td>
                    <td>${item.value || 0}</td>
                    <td>${item.subtext || '-'}</td>
                    <td>${item.icon_preview || '-'}</td>
                    <td>${item.order || 0}</td>
                    <td>${item.status || '-'}</td>
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

        // Previous button
        if (response.current_page > 1) {
            html += `<li class="page-item">
                <a class="page-link" href="#" data-page="${response.current_page - 1}">Previous</a>
            </li>`;
        }

        // Page numbers
        let startPage = Math.max(1, response.current_page - 2);
        let endPage = Math.min(response.last_page, response.current_page + 2);

        if (startPage > 1) {
            html += `<li class="page-item">
                <a class="page-link" href="#" data-page="1">1</a>
            </li>`;
            if (startPage > 2) {
                html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            html += `<li class="page-item ${i === response.current_page ? 'active' : ''}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>`;
        }

        if (endPage < response.last_page) {
            if (endPage < response.last_page - 1) {
                html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
            html += `<li class="page-item">
                <a class="page-link" href="#" data-page="${response.last_page}">${response.last_page}</a>
            </li>`;
        }

        // Next button
        if (response.current_page < response.last_page) {
            html += `<li class="page-item">
                <a class="page-link" href="#" data-page="${response.current_page + 1}">Next</a>
            </li>`;
        }

        html += '</ul></nav>';
    }

    $('#pagination-container').html(html);

    // Pagination click events
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
    let info = `Menampilkan ${start} sampai ${end} dari ${response.total} data`;
    $('#table-info').text(info);
}
</script>
@endpush
