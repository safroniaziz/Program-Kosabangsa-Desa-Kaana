@extends('layouts.dashboard.dashboard')

@section('title', 'Coordinate Management - Admin')

@section('menu')
    Coordinate Management
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Coordinates</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Coordinates</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.coordinates.map') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-map"></i> Map View
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCoordinateModal">
                            <i class="fas fa-plus"></i> Add New Coordinate
                        </button>
                        <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#importModal">
                            <i class="fas fa-file-import"></i> Import CSV
                        </button>
                        <a href="{{ route('admin.coordinates.export') }}" class="btn btn-success float-right">
                            <i class="fas fa-download"></i> Export
                        </a>
                    </div>
                </div>

                <table id="coordinates-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Region</th>
                            <th>Coordinates</th>
                            <th>Assessments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Coordinate Modal -->
<div class="modal fade" id="createCoordinateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="createCoordinateForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Coordinate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="region">Region *</label>
                                <input type="text" class="form-control" id="region" name="region" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude">Latitude *</label>
                                <input type="number" step="any" class="form-control" id="latitude" name="latitude" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude">Longitude *</label>
                                <input type="number" step="any" class="form-control" id="longitude" name="longitude" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Coordinate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Coordinate Modal -->
<div class="modal fade" id="editCoordinateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editCoordinateForm">
                @csrf
                <input type="hidden" id="edit-coordinate-id" name="coordinate_id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Coordinate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-name">Name *</label>
                                <input type="text" class="form-control" id="edit-name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-region">Region *</label>
                                <input type="text" class="form-control" id="edit-region" name="region" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-address">Address</label>
                        <textarea class="form-control" id="edit-address" name="address" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-latitude">Latitude *</label>
                                <input type="number" step="any" class="form-control" id="edit-latitude" name="latitude" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-longitude">Longitude *</label>
                                <input type="number" step="any" class="form-control" id="edit-longitude" name="longitude" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Description</label>
                        <textarea class="form-control" id="edit-description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Coordinate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="importForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Import Coordinates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="import-file">CSV File</label>
                        <input type="file" class="form-control" id="import-file" name="file" accept=".csv" required>
                        <small class="form-text text-muted">
                            CSV format: Name, Address, Latitude, Longitude, Region, Description
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Coordinate Detail Modal -->
<div class="modal fade" id="coordinateDetailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Coordinate Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="coordinate-detail">
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
        let table = $('#coordinates-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.coordinates.data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'address', name: 'address'},
                {data: 'region', name: 'region'},
                {
                    data: 'latitude',
                    name: 'latitude',
                    render: function (data, type, row) {
                        return `${row.latitude}, ${row.longitude}`;
                    }
                },
                {data: 'assessment_count', name: 'assessment_count'},
                {
                    data: 'location',
                    name: 'location',
                    orderable: false,
                    searchable: false
                },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[0, 'asc']]
        });

        // Create coordinate
        $('#createCoordinateForm').submit(function (e) {
            e.preventDefault();
            showLoader();

            $.ajax({
                url: "{{ route('admin.coordinates.store') }}",
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    showAlert('success', response.success);
                    $('#createCoordinateModal').modal('hide');
                    $(this)[0].reset();
                    table.ajax.reload();
                    hideLoader();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key] + '\n';
                        }
                        showAlert('error', errorMessage);
                    } else {
                        showAlert('error', 'Failed to create coordinate');
                    }
                    hideLoader();
                }
            });
        });

        // Edit coordinate
        $(document).on('click', '.btn-edit', function () {
            let id = $(this).data('id');
            showLoader();

            $.get(`{{ route('admin.coordinates.edit', ':id') }}`.replace(':id', id))
                .done(function (coordinate) {
                    $('#edit-coordinate-id').val(coordinate.id);
                    $('#edit-name').val(coordinate.name);
                    $('#edit-address').val(coordinate.address);
                    $('#edit-latitude').val(coordinate.latitude);
                    $('#edit-longitude').val(coordinate.longitude);
                    $('#edit-region').val(coordinate.region);
                    $('#edit-description').val(coordinate.description);
                    $('#editCoordinateModal').modal('show');
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Failed to load coordinate data');
                    hideLoader();
                });
        });

        $('#editCoordinateForm').submit(function (e) {
            e.preventDefault();
            let id = $('#edit-coordinate-id').val();
            showLoader();

            $.ajax({
                url: `{{ route('admin.coordinates.update', ':id') }}`.replace(':id', id),
                type: 'PUT',
                data: $(this).serialize(),
                success: function (response) {
                    showAlert('success', response.success);
                    $('#editCoordinateModal').modal('hide');
                    table.ajax.reload();
                    hideLoader();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key] + '\n';
                        }
                        showAlert('error', errorMessage);
                    } else {
                        showAlert('error', 'Failed to update coordinate');
                    }
                    hideLoader();
                }
            });
        });

        // View coordinate details
        $(document).on('click', '.btn-view', function () {
            let id = $(this).data('id');
            showLoader();

            $.get(`{{ route('admin.coordinates.show', ':id') }}`.replace(':id', id))
                .done(function (data) {
                    $('#coordinate-detail').html(data);
                    $('#coordinateDetailModal').modal('show');
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Failed to load coordinate details');
                    hideLoader();
                });
        });

        // Delete coordinate
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
                        url: `{{ route('admin.coordinates.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            showAlert('success', response.success);
                            table.ajax.reload();
                            hideLoader();
                        },
                        error: function (xhr) {
                            showAlert('error', xhr.responseJSON.error || 'Failed to delete coordinate');
                            hideLoader();
                        }
                    });
                }
            });
        });

        // Import coordinates
        $('#importForm').submit(function (e) {
            e.preventDefault();
            showLoader();

            let formData = new FormData(this);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{ route('admin.coordinates.import') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    showAlert('success', response.success);
                    $('#importModal').modal('hide');
                    $(this)[0].reset();
                    table.ajax.reload();
                    hideLoader();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key] + '\n';
                        }
                        showAlert('error', errorMessage);
                    } else {
                        showAlert('error', xhr.responseJSON.error || 'Failed to import coordinates');
                    }
                    hideLoader();
                }
            });
        });
    });
</script>
@endpush