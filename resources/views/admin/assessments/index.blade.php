@extends('layouts.dashboard.dashboard')

@section('title', 'Assessments Management - Admin')

@section('menu')
    Assessments Management
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Assessments</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Assessments</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filters -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="filter-type">Assessment Type</label>
                        <select id="filter-type" class="form-control select2">
                            <option value="all">All Types</option>
                            <option value="ptsd">PTSD</option>
                            <option value="dcm">DCM</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filter-risk">Risk Level</label>
                        <select id="filter-risk" class="form-control select2">
                            <option value="all">All Levels</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filter-date-from">Date From</label>
                        <input type="date" id="filter-date-from" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="filter-date-to">Date To</label>
                        <input type="date" id="filter-date-to" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" id="btn-filter" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Apply Filters
                        </button>
                        <button type="button" id="btn-reset" class="btn btn-default ml-2">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                        <a href="{{ route('admin.assessments.export') }}" class="btn btn-success float-right" id="btn-export">
                            <i class="fas fa-download"></i> Export
                        </a>
                    </div>
                </div>

                <!-- DataTable -->
                <table id="assessments-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Risk Level</th>
                            <th>Score</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Assessment Detail Modal -->
<div class="modal fade" id="assessmentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assessment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="assessment-detail">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        let table = $('#assessments-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.assessments.data') }}",
                type: 'GET',
                data: function (d) {
                    d.type = $('#filter-type').val();
                    d.risk_level = $('#filter-risk').val();
                    d.date_from = $('#filter-date-from').val();
                    d.date_to = $('#filter-date-to').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'user_name', name: 'user_name'},
                {data: 'user_email', name: 'user_email'},
                {data: 'type_badge', name: 'type_badge', orderable: false},
                {data: 'risk_badge', name: 'risk_badge', orderable: false},
                {data: 'score', name: 'score'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[6, 'desc']],
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
                'excel',
                'pdf',
                'print'
            ]
        });

        // Filter button
        $('#btn-filter').click(function () {
            table.ajax.reload();
        });

        // Reset filters
        $('#btn-reset').click(function () {
            $('#filter-type').val('all').trigger('change');
            $('#filter-risk').val('all').trigger('change');
            $('#filter-date-from').val('');
            $('#filter-date-to').val('');
            table.ajax.reload();
        });

        // View assessment details
        $(document).on('click', '.btn-view', function () {
            let id = $(this).data('id');
            showLoader();

            $.get(`{{ route('admin.assessments.show', ':id') }}`.replace(':id', id))
                .done(function (data) {
                    $('#assessment-detail').html(data);
                    $('#assessmentModal').modal('show');
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Failed to load assessment details');
                    hideLoader();
                });
        });

        // Delete assessment
        $(document).on('click', '.btn-delete', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoader();

                    $.ajax({
                        url: `{{ route('admin.assessments.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            showAlert('success', response.success);
                            table.ajax.reload();
                            hideLoader();
                        },
                        error: function () {
                            showAlert('error', 'Failed to delete assessment');
                            hideLoader();
                        }
                    });
                }
            });
        });
    });
</script>
@endpush