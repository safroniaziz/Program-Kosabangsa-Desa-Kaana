@extends('layouts.dashboard.dashboard')

@section('title', 'Hasil DCM - Admin')

@section('menu')
    Hasil DCM
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Hasil DCM</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!-- Stats Cards -->
        <div class="row g-5 g-xl-8 mb-8">
            <div class="col-xl-2 col-md-4">
                <div class="card bg-light-primary">
                    <div class="card-body py-3">
                        <div class="text-center">
                            <span class="text-gray-800 fs-2 fw-bold">{{ $stats['total'] }}</span>
                            <span class="text-gray-600 fw-semibold d-block fs-7">Total</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="card bg-light-danger">
                    <div class="card-body py-3">
                        <div class="text-center">
                            <span class="text-gray-800 fs-2 fw-bold">{{ $stats['fisik'] }}</span>
                            <span class="text-gray-600 fw-semibold d-block fs-7">Fisik</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="card bg-light-warning">
                    <div class="card-body py-3">
                        <div class="text-center">
                            <span class="text-gray-800 fs-2 fw-bold">{{ $stats['emosi'] }}</span>
                            <span class="text-gray-600 fw-semibold d-block fs-7">Emosi</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="card bg-light-info">
                    <div class="card-body py-3">
                        <div class="text-center">
                            <span class="text-gray-800 fs-2 fw-bold">{{ $stats['mental'] }}</span>
                            <span class="text-gray-600 fw-semibold d-block fs-7">Mental</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="card bg-light-primary">
                    <div class="card-body py-3">
                        <div class="text-center">
                            <span class="text-gray-800 fs-2 fw-bold">{{ $stats['perilaku'] }}</span>
                            <span class="text-gray-600 fw-semibold d-block fs-7">Perilaku</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="card bg-light-success">
                    <div class="card-body py-3">
                        <div class="text-center">
                            <span class="text-gray-800 fs-2 fw-bold">{{ $stats['spiritual'] }}</span>
                            <span class="text-gray-600 fw-semibold d-block fs-7">Spiritual</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Hasil Assessment DCM</h3>
                        <div class="card-toolbar">
                            <select id="filter-category" class="form-select form-select-sm">
                                <option value="all">Semua Kategori</option>
                                <option value="1">Fisik</option>
                                <option value="2">Emosi</option>
                                <option value="3">Mental</option>
                                <option value="4">Perilaku</option>
                                <option value="5">Spiritual</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Read Only:</strong> Hasil assessment DCM (Daftar Checklist Masalah) yang sudah dikerjakan user.
                        </div>
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Kategori Dominan</th>
                                    <th>Skor per Kategori</th>
                                    <th>Total Checked</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
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
                <h5 class="modal-title">Detail Hasil DCM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detail-content">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    let table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.dcm-results.data') }}",
            data: function(d) {
                d.category = $('#filter-category').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'user_name', name: 'user.name'},
            {data: 'category_badge', name: 'dominant_category', orderable: false},
            {data: 'scores_display', name: 'category_scores', orderable: false},
            {data: 'total_checked', name: 'total_checked'},
            {data: 'created', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[5, 'desc']]
    });

    $('#filter-category').change(function() {
        table.ajax.reload();
    });

    $(document).on('click', '.btn-view', function() {
        let id = $(this).data('id');
        $.get(`{{ url('admin/dcm-results') }}/${id}`, function(data) {
            let result = data.result;
            let interp = data.interpretation;
            let scores = result.category_scores || {};
            
            let html = `
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold">Informasi User</h6>
                        <p><strong>Nama:</strong> ${result.user?.name || 'N/A'}</p>
                        <p><strong>Tanggal:</strong> ${new Date(result.created_at).toLocaleString()}</p>
                        <p><strong>Total Masalah:</strong> ${result.total_checked} item</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold">Skor per Kategori</h6>
                        <ul class="list-unstyled">
                            <li><span class="badge badge-danger">Fisik:</span> ${scores[1] || 0}</li>
                            <li><span class="badge badge-warning">Emosi:</span> ${scores[2] || 0}</li>
                            <li><span class="badge badge-info">Mental:</span> ${scores[3] || 0}</li>
                            <li><span class="badge badge-primary">Perilaku:</span> ${scores[4] || 0}</li>
                            <li><span class="badge badge-success">Spiritual:</span> ${scores[5] || 0}</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <h6 class="fw-bold">Interpretasi</h6>
                <div class="alert alert-warning">
                    <strong>${interp?.title || 'N/A'}</strong><br>
                    ${interp?.description || '-'}
                </div>
                <h6 class="fw-bold">Rekomendasi</h6>
                <ul>
                    ${interp?.recommendations?.map(r => `<li>${r}</li>`).join('') || '<li>-</li>'}
                </ul>
            `;
            $('#detail-content').html(html);
            $('#detailModal').modal('show');
        });
    });
});
</script>
@endpush
