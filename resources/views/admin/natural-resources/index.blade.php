@extends('layouts.dashboard.dashboard')

@section('title', 'Sumber Daya Alam - Admin')

@section('menu')
    Sumber Daya Alam
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Sumber Daya Alam</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- Stats Cards -->
        <div class="row g-5 g-xl-8 mb-8">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-success">
                                    <i class="fas fa-leaf text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['total'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Total SDA</span>
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
                                    <i class="fas fa-tractor text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['lahan'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Lahan Pertanian</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-primary">
                                    <i class="fas fa-water text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['air'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Sumber Air</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label bg-info">
                                    <i class="fas fa-tree text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['hutan'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Hutan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Sumber Daya Alam</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filters -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" placeholder="Cari...">
                            <button type="button" id="btn-search" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select id="filter-category" class="form-select">
                            <option value="">Semua Kategori</option>
                            <option value="lahan">Lahan Pertanian</option>
                            <option value="air">Sumber Air</option>
                            <option value="mineral">Potensi Mineral</option>
                            <option value="mesin">Mesin Pertanian</option>
                            <option value="hutan">Hutan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-5 text-end">
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
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Luas/Ukuran</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data-tbody"></tbody>
                    </table>
                </div>

                <div id="loading-indicator" class="text-center py-4" style="display: none;">
                    <div class="spinner-border text-primary" role="status"></div>
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="pagination-container" class="d-flex justify-content-end"></div>
                    </div>
                </div>
                <div id="table-info" class="text-muted small mt-2"></div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sumber Daya Alam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Kategori</label>
                            <select class="form-select" name="category" required>
                                <option value="lahan">Lahan Pertanian</option>
                                <option value="air">Sumber Air</option>
                                <option value="mineral">Potensi Mineral</option>
                                <option value="mesin">Mesin Pertanian</option>
                                <option value="hutan">Hutan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis/Tipe</label>
                            <input type="text" class="form-control" name="type" placeholder="Sawah, Ladang, Sungai, dll">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Luas/Ukuran</label>
                            <input type="number" step="0.01" class="form-control" name="area_size">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="unit" placeholder="Ha, m², liter">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kondisi</label>
                            <select class="form-select" name="condition">
                                <option value="">-- Pilih --</option>
                                <option value="baik">Baik</option>
                                <option value="sedang">Sedang</option>
                                <option value="rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                                <label class="form-check-label">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sumber Daya Alam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Nama</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Kategori</label>
                            <select class="form-select" id="edit_category" name="category" required>
                                <option value="lahan">Lahan Pertanian</option>
                                <option value="air">Sumber Air</option>
                                <option value="mineral">Potensi Mineral</option>
                                <option value="mesin">Mesin Pertanian</option>
                                <option value="hutan">Hutan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis/Tipe</label>
                            <input type="text" class="form-control" id="edit_type" name="type">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Luas/Ukuran</label>
                            <input type="number" step="0.01" class="form-control" id="edit_area_size" name="area_size">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="edit_unit" name="unit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kondisi</label>
                            <select class="form-select" id="edit_condition" name="condition">
                                <option value="">-- Pilih --</option>
                                <option value="baik">Baik</option>
                                <option value="sedang">Sedang</option>
                                <option value="rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active" value="1">
                                <label class="form-check-label">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
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
let categoryFilter = '';

$(function() {
    loadData();

    $('#btn-search').click(function() {
        searchQuery = $('#search-input').val();
        currentPage = 1;
        loadData();
    });

    $('#search-input').keypress(function(e) {
        if (e.which == 13) $('#btn-search').click();
    });

    $('#filter-category').change(function() {
        categoryFilter = $(this).val();
        currentPage = 1;
        loadData();
    });

    $('#btn-reset').click(function() {
        searchQuery = '';
        categoryFilter = '';
        $('#search-input').val('');
        $('#filter-category').val('');
        currentPage = 1;
        loadData();
    });

    $('#per-page').change(function() {
        perPage = parseInt($(this).val());
        currentPage = 1;
        loadData();
    });

    // Create
    $('#createForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('admin.natural-resources.store') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#createModal').modal('hide');
                $('#createForm')[0].reset();
                Swal.fire('Berhasil', response.message, 'success');
                loadData();
            },
            error: function(xhr) {
                Swal.fire('Error', xhr.responseJSON?.message || 'Terjadi kesalahan', 'error');
            }
        });
    });

    // Edit
    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        $.get("{{ url('admin/natural-resources') }}/" + id, function(data) {
            $('#edit_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_category').val(data.category);
            $('#edit_type').val(data.type);
            $('#edit_area_size').val(data.area_size);
            $('#edit_unit').val(data.unit);
            $('#edit_condition').val(data.condition);
            $('#edit_description').val(data.description);
            $('#edit_is_active').prop('checked', data.is_active);
            $('#editModal').modal('show');
        });
    });

    $('#editForm').submit(function(e) {
        e.preventDefault();
        let id = $('#edit_id').val();
        $.ajax({
            url: "{{ url('admin/natural-resources') }}/" + id,
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#editModal').modal('hide');
                Swal.fire('Berhasil', response.message, 'success');
                loadData();
            },
            error: function(xhr) {
                Swal.fire('Error', xhr.responseJSON?.message || 'Terjadi kesalahan', 'error');
            }
        });
    });

    // Delete
    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Hapus Data?',
            text: 'Data yang dihapus tidak dapat dikembalikan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/natural-resources') }}/" + id,
                    method: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        Swal.fire('Berhasil', response.message, 'success');
                        loadData();
                    }
                });
            }
        });
    });

    // Toggle Status
    $(document).on('click', '.btn-toggle', function() {
        let id = $(this).data('id');
        $.post("{{ url('admin/natural-resources') }}/" + id + "/toggle", { _token: '{{ csrf_token() }}' }, function(response) {
            Swal.fire('Berhasil', response.message, 'success');
            loadData();
        });
    });
});

function loadData() {
    $('#loading-indicator').show();
    $('#data-tbody').hide();

    $.get("{{ route('admin.natural-resources.data') }}", {
        page: currentPage,
        per_page: perPage,
        search: searchQuery,
        category: categoryFilter
    }, function(response) {
        renderTable(response.data || []);
        renderPagination(response);
        renderInfo(response);
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
            let sizeDisplay = item.area_size ? `${item.area_size} ${item.unit || ''}` : '-';
            html += `
                <tr>
                    <td>${no}</td>
                    <td>${item.name}</td>
                    <td><span class="badge badge-light-success">${item.category_label}</span></td>
                    <td>${item.type || '-'}</td>
                    <td>${sizeDisplay}</td>
                    <td>${item.condition || '-'}</td>
                    <td>${item.status}</td>
                    <td>${item.action}</td>
                </tr>
            `;
        });
    }
    $('#data-tbody').html(html);
}

function renderPagination(response) {
    let html = '';
    if (response.total > 0 && response.last_page > 1) {
        html += '<nav><ul class="pagination pagination-sm mb-0">';
        if (response.current_page > 1) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.current_page - 1}">Prev</a></li>`;
        }
        for (let i = 1; i <= response.last_page; i++) {
            html += `<li class="page-item ${i === response.current_page ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
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
        $('#table-info').text(`Menampilkan ${start} - ${end} dari ${response.total} data`);
    } else {
        $('#table-info').text('Tidak ada data');
    }
}
</script>
@endpush
