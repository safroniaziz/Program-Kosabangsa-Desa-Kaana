@extends('admin.layouts.app')

@section('title', 'PTSD Assessments - Admin')

@section('content-title')
    <h1 class="m-0">PTSD Assessments</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.assessments.index') }}">Assessments</a></li>
    <li class="breadcrumb-item active">PTSD</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">PTSD Assessments (PCL-5)</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.assessments.index') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to All
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> This page shows all PTSD assessments completed using the PCL-5 questionnaire.
                </div>

                <table id="ptsd-assessments-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Risk Level</th>
                            <th>PCL-5 Score</th>
                            <th>Severity</th>
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
                <h5 class="modal-title">PTSD Assessment Details</h5>
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
@endsection

@push('scripts')
<script>
    $(function () {
        let table = $('#ptsd-assessments-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.assessments.ptsd.data') }}",
                type: 'GET'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'user_name', name: 'user_name'},
                {data: 'user_email', name: 'user_email'},
                {data: 'risk_badge', name: 'risk_badge', orderable: false},
                {data: 'score', name: 'score'},
                {data: 'severity', name: 'severity'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[6, 'desc']]
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