@extends('layouts.dashboard.dashboard')

@section('title', 'Infrastruktur & Sarana - Admin')

@section('menu')
    Infrastruktur & Sarana
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Infrastruktur & Sarana</li>
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
                                <span class="symbol-label bg-primary"><i class="fas fa-building text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['total'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Total Infrastruktur</span>
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
                                <span class="symbol-label bg-warning"><i class="fas fa-road text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['jalan'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Jalan</span>
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
                                <span class="symbol-label bg-success"><i class="fas fa-bolt text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['listrik'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Jaringan Listrik</span>
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
                                <span class="symbol-label bg-info"><i class="fas fa-tint text-white fs-2"></i></span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ $stats['air'] }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Air Bersih</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Infrastruktur & Sarana Prasarana</h3>
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
                            <option value="jalan">Jalan</option>
                            <option value="jembatan">Jembatan</option>
                            <option value="listrik">Jaringan Listrik</option>
                            <option value="air">Air Bersih</option>
                            <option value="telekomunikasi">Telekomunikasi</option>
                            <option value="fasilitas_umum">Fasilitas Umum</option>
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
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Kondisi</th>
                                <th>Cakupan</th>
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
                            <option value="50">50</option>
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
                <h5 class="modal-title">Tambah Infrastruktur</h5>
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
                                <option value="jalan">Jalan</option>
                                <option value="jembatan">Jembatan</option>
                                <option value="listrik">Jaringan Listrik</option>
                                <option value="air">Air Bersih</option>
                                <option value="telekomunikasi">Telekomunikasi</option>
                                <option value="fasilitas_umum">Fasilitas Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis/Tipe</label>
                            <input type="text" class="form-control" name="type" placeholder="Aspal, Beton, dll">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kondisi</label>
                            <select class="form-select" name="condition">
                                <option value="baik">Baik</option>
                                <option value="sedang">Sedang</option>
                                <option value="rusak">Rusak</option>
                                <option value="tidak_ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cakupan (%)</label>
                            <input type="number" class="form-control" name="coverage_percentage" min="0" max="100" placeholder="0-100">
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
                <h5 class="modal-title">Edit Infrastruktur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm">
                @csrf @method('PUT')
                <input type="hidden" id="edit_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Nama</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Kategori</label>
                            <select class="form-select" id="edit_category" name="category" required>
                                <option value="jalan">Jalan</option>
                                <option value="jembatan">Jembatan</option>
                                <option value="listrik">Jaringan Listrik</option>
                                <option value="air">Air Bersih</option>
                                <option value="telekomunikasi">Telekomunikasi</option>
                                <option value="fasilitas_umum">Fasilitas Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis/Tipe</label>
                            <input type="text" class="form-control" id="edit_type" name="type">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kondisi</label>
                            <select class="form-select" id="edit_condition" name="condition">
                                <option value="baik">Baik</option>
                                <option value="sedang">Sedang</option>
                                <option value="rusak">Rusak</option>
                                <option value="tidak_ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cakupan (%)</label>
                            <input type="number" class="form-control" id="edit_coverage_percentage" name="coverage_percentage" min="0" max="100">
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
        $.post("{{ route('admin.infrastructures.store') }}", $(this).serialize(), function(r) {
            $('#createModal').modal('hide'); $('#createForm')[0].reset();
            Swal.fire('Berhasil', r.message, 'success'); loadData();
        }).fail(xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Error', 'error'));
    });

    $(document).on('click', '.btn-edit', function() {
        $.get("{{ url('admin/infrastructures') }}/" + $(this).data('id'), function(d) {
            $('#edit_id').val(d.id); $('#edit_name').val(d.name); $('#edit_category').val(d.category);
            $('#edit_type').val(d.type); $('#edit_condition').val(d.condition);
            $('#edit_coverage_percentage').val(d.coverage_percentage); $('#edit_description').val(d.description);
            $('#editModal').modal('show');
        });
    });

    $('#editForm').submit(function(e) {
        e.preventDefault();
        $.ajax({ url: "{{ url('admin/infrastructures') }}/" + $('#edit_id').val(), method: 'PUT', data: $(this).serialize(),
            success: r => { $('#editModal').modal('hide'); Swal.fire('Berhasil', r.message, 'success'); loadData(); },
            error: xhr => Swal.fire('Error', xhr.responseJSON?.message || 'Error', 'error')
        });
    });

    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({ title: 'Hapus?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', confirmButtonText: 'Ya, Hapus!' })
        .then(r => { if (r.isConfirmed) $.ajax({ url: "{{ url('admin/infrastructures') }}/" + id, method: 'DELETE', data: {_token: '{{ csrf_token() }}'}, success: () => { Swal.fire('Berhasil', 'Data dihapus', 'success'); loadData(); }}); });
    });

    $(document).on('click', '.btn-toggle', function() {
        $.post("{{ url('admin/infrastructures') }}/" + $(this).data('id') + "/toggle", {_token: '{{ csrf_token() }}'}, r => { Swal.fire('Berhasil', r.message, 'success'); loadData(); });
    });
});

function loadData() {
    $('#loading-indicator').show(); $('#data-tbody').hide();
    $.get("{{ route('admin.infrastructures.data') }}", { page: currentPage, per_page: perPage, search: searchQuery, category: categoryFilter }, function(r) {
        let html = '';
        if (!r.data.length) html = '<tr><td colspan="8" class="text-center">Tidak ada data</td></tr>';
        else r.data.forEach((item, i) => {
            html += `<tr><td>${(currentPage-1)*perPage+i+1}</td><td>${item.name}</td><td><span class="badge badge-light-primary">${item.category_label}</span></td><td>${item.type||'-'}</td><td>${item.condition_badge}</td><td>${item.coverage_percentage ? item.coverage_percentage+'%' : '-'}</td><td>${item.status}</td><td>${item.action}</td></tr>`;
        });
        $('#data-tbody').html(html).show(); $('#loading-indicator').hide();
        $('#table-info').text(r.total ? `Menampilkan ${(r.current_page-1)*r.per_page+1} - ${Math.min(r.current_page*r.per_page, r.total)} dari ${r.total}` : 'Tidak ada data');
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
