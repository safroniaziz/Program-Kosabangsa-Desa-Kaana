@extends('layouts.dashboard.dashboard')

@section('title', 'Jawaban User - Admin')

@section('menu')
    Jawaban User
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Jawaban User</li>
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
                                    <i class="fas fa-clipboard-list text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ number_format($stats['total']) }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Total Jawaban</span>
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
                                    <i class="fas fa-calendar-day text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ number_format($stats['today']) }}</span>
                                <span class="text-gray-600 fw-semibold d-block">Hari Ini</span>
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
                                    <i class="fas fa-brain text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ number_format($stats['ptsd']) }}</span>
                                <span class="text-gray-600 fw-semibold d-block">PTSD</span>
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
                                    <i class="fas fa-list-check text-white fs-2"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-800 fs-1 fw-bold">{{ number_format($stats['dcm']) }}</span>
                                <span class="text-gray-600 fw-semibold d-block">DCM</span>
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
                        <h3 class="card-title">Daftar Jawaban User</h3>
                        <div class="card-toolbar">
                            <select id="filter-type" class="form-select form-select-sm">
                                <option value="all">Semua Tipe</option>
                                <option value="ptsd">PTSD</option>
                                <option value="checklist_masalah">DCM</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Read Only:</strong> Data ini adalah hasil dari assessment yang sudah dikerjakan user.
                        </div>
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Tipe Assessment</th>
                                    <th>No. Soal</th>
                                    <th>Jawaban</th>
                                    <th>Waktu Respon</th>
                                    <th>Dijawab</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Jawaban</h5>
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
            url: "{{ route('admin.user-answers.data') }}",
            data: function(d) {
                d.assessment_type = $('#filter-type').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'user_name', name: 'user_name'},
            {data: 'assessment_type', name: 'assessment_type', orderable: false},
            {data: 'question_number', name: 'question_number'},
            {data: 'answer_display', name: 'answer_value', orderable: false},
            {data: 'response_time', name: 'response_time_ms'},
            {data: 'answered', name: 'answered_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[6, 'desc']]
    });

    $('#filter-type').change(function() {
        table.ajax.reload();
    });

    $(document).on('click', '.btn-view', function() {
        let id = $(this).data('id');
        $.get(`{{ url('admin/user-answers') }}/${id}`, function(data) {
            let html = `
                <p><strong>User:</strong> ${data.user_assessment?.user?.name || 'N/A'}</p>
                <p><strong>Assessment:</strong> ${data.user_assessment?.assessment_type || 'N/A'}</p>
                <p><strong>No. Soal:</strong> ${data.question_number}</p>
                <p><strong>Jawaban:</strong> ${data.answer_value}</p>
                <p><strong>Waktu Respon:</strong> ${data.response_time_ms ? data.response_time_ms + ' ms' : '-'}</p>
                <p><strong>Dijawab:</strong> ${data.answered_at || '-'}</p>
            `;
            $('#detail-content').html(html);
            $('#detailModal').modal('show');
        });
    });
});
</script>
@endpush
