@extends('layouts.dashboard.dashboard')

@section('title', 'Data Ekonomi - Admin')

@section('menu')
    Data Ekonomi
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Data Ekonomi</li>
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
                                <span class="symbol-label bg-success"><i class="fas fa-chart-line text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['total'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Total Data</span>
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
                                <span class="symbol-label bg-primary"><i class="fas fa-store text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['umkm'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">UMKM</span>
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
                                <span class="symbol-label bg-warning"><i class="fas fa-seedling text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['pertanian'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Pertanian</span>
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
                                <span class="symbol-label bg-info"><i class="fas fa-umbrella-beach text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['pariwisata'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Pariwisata</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Ekonomi & UMKM</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" placeholder="Cari...">
                            <button type="button" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select id="filter-category" class="form-select">
                            <option value="">Semua Kategori</option>
                            <option value="umkm">UMKM</option>
                            <option value="pertanian">Pertanian</option>
                            <option value="perikanan">Perikanan</option>
                            <option value="perdagangan">Perdagangan</option>
                            <option value="pariwisata">Pariwisata</option>
                            <option value="keuangan">Akses Keuangan</option>
                        </select>
                    </div>
                    <div class="col-md-5 text-end">
                        <button type="button" id="btn-reset" class="btn btn-secondary"><i class="fas fa-redo"></i> Reset</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Usaha</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Pemilik</th>
                                <th>Karyawan</th>
                                <th>Pendapatan/Tahun</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data-tbody"></tbody>
                    </table>
                </div>

                <div id="loading-indicator" class="text-center py-4" style="display: none;">
                    <div class="spinner-border text-primary"></div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <select id="per-page" class="form-control form-control-sm" style="width: auto;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                        </select>
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
                <h5 class="modal-title">Tambah Data Ekonomi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Nama Usaha</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Kategori</label>
                            <select class="form-select" name="category" required>
                                <option value="umkm">UMKM</option>
                                <option value="pertanian">Pertanian</option>
                                <option value="perikanan">Perikanan</option>
                                <option value="perdagangan">Perdagangan</option>
                                <option value="pariwisata">Pariwisata</option>
                                <option value="keuangan">Akses Keuangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis/Tipe</label>
                            <input type="text" class="form-control" name="type" placeholder="Warung, Toko, dll">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Pemilik</label>
                            <input type="text" class="form-control" name="owner_name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah Karyawan</label>
                            <input type="number" class="form-control" name="employee_count" min="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pendapatan/Tahun (Rp)</label>
                            <input type="number" class="form-control" name="annual_revenue" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="2"></textarea>
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
                <h5 class="modal-title">Edit Data Ekonomi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm">
                @csrf @method('PUT')
                <input type="hidden" id="edit_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Nama Usaha</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Kategori</label>
                            <select class="form-select" id="edit_category" name="category" required>
                                <option value="umkm">UMKM</option>
                                <option value="pertanian">Pertanian</option>
                                <option value="perikanan">Perikanan</option>
                                <option value="perdagangan">Perdagangan</option>
                                <option value="pariwisata">Pariwisata</option>
                                <option value="keuangan">Akses Keuangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis/Tipe</label>
                            <input type="text" class="form-control" id="edit_type" name="type">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Pemilik</label>
                            <input type="text" class="form-control" id="edit_owner_name" name="owner_name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah Karyawan</label>
                            <input type="number" class="form-control" id="edit_employee_count" name="employee_count" min="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pendapatan/Tahun (Rp)</label>
                            <input type="number" class="form-control" id="edit_annual_revenue" name="annual_revenue" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="edit_address" name="address">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="2"></textarea>
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
let currentPage = 1, perPage = 10, searchQuery = '', categoryFilter = '';

$(function() {
    loadData();
    $('#btn-search').click(() => { searchQuery = $('#search-input').val(); currentPage = 1; loadData(); });
    $('#search-input').keypress(e => { if (e.which == 13) $('#btn-search').click(); });
    $('#filter-category').change(function() { categoryFilter = $(this).val(); currentPage = 1; loadData(); });
    $('#btn-reset').click(() => { searchQuery = ''; categoryFilter = ''; $('#search-input, #filter-category').val(''); currentPage = 1; loadData(); });
    $('#per-page').change(function() { perPage = parseInt($(this).val()); currentPage = 1; loadData(); });

    $('#createForm').submit(function(e) {
        e.preventDefault();
        $.post("{{ route('admin.economic-activities.store') }}", $(this).serialize(), function(r) {
            $('#createModal').modal('hide'); $('#createForm')[0].reset();
            Swal.fire('Berhasil', r.message, 'success'); loadData();
        }).fail(xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Error', 'error'));
    });

    $(document).on('click', '.btn-edit', function() {
        $.get("{{ url('admin/economic-activities') }}/" + $(this).data('id'), function(d) {
            $('#edit_id').val(d.id); $('#edit_name').val(d.name); $('#edit_category').val(d.category);
            $('#edit_type').val(d.type); $('#edit_owner_name').val(d.owner_name);
            $('#edit_employee_count').val(d.employee_count); $('#edit_annual_revenue').val(d.annual_revenue);
            $('#edit_address').val(d.address); $('#edit_description').val(d.description);
            $('#editModal').modal('show');
        });
    });

    $('#editForm').submit(function(e) {
        e.preventDefault();
        $.ajax({ url: "{{ url('admin/economic-activities') }}/" + $('#edit_id').val(), method: 'PUT', data: $(this).serialize(),
            success: r => { $('#editModal').modal('hide'); Swal.fire('Berhasil', r.message, 'success'); loadData(); },
            error: xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Error', 'error')
        });
    });

    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({ title: 'Hapus?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', confirmButtonText: 'Ya!' })
        .then(r => { if (r.isConfirmed) $.ajax({ url: "{{ url('admin/economic-activities') }}/" + id, method: 'DELETE', data: {_token: '{{ csrf_token() }}'}, success: () => { Swal.fire('Berhasil', 'Dihapus', 'success'); loadData(); }}); });
    });

    $(document).on('click', '.btn-toggle', function() {
        $.post("{{ url('admin/economic-activities') }}/" + $(this).data('id') + "/toggle", {_token: '{{ csrf_token() }}'}, r => { Swal.fire('Berhasil', r.message, 'success'); loadData(); });
    });
});

function loadData() {
    $('#loading-indicator').show(); $('#data-tbody').hide();
    $.get("{{ route('admin.economic-activities.data') }}", { page: currentPage, per_page: perPage, search: searchQuery, category: categoryFilter }, function(r) {
        let html = '';
        if (!r.data.length) html = '<tr><td colspan="9" class="text-center">Tidak ada data</td></tr>';
        else r.data.forEach((item, i) => {
            html += `<tr><td>${(currentPage-1)*perPage+i+1}</td><td>${item.name}</td><td><span class="badge badge-light-success">${item.category_label}</span></td><td>${item.type||'-'}</td><td>${item.owner_name||'-'}</td><td>${item.employee_count||'-'}</td><td>${item.annual_revenue}</td><td>${item.status}</td><td>${item.action}</td></tr>`;
        });
        $('#data-tbody').html(html).show(); $('#loading-indicator').hide();
        $('#table-info').text(r.total ? `${(r.current_page-1)*r.per_page+1} - ${Math.min(r.current_page*r.per_page, r.total)} dari ${r.total}` : 'Tidak ada data');
        let pHtml = '';
        if (r.last_page > 1) {
            pHtml = '<nav><ul class="pagination pagination-sm mb-0">';
            for (let i = 1; i <= r.last_page; i++) pHtml += `<li class="page-item ${i==r.current_page?'active':''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
            pHtml += '</ul></nav>';
        }
        $('#pagination-container').html(pHtml);
        $('.page-link').click(function(e) { e.preventDefault(); currentPage = $(this).data('page'); loadData(); });
    });
}
</script>
@endpush
