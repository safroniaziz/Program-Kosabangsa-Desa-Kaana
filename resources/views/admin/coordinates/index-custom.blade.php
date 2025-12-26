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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCoordinateModal">
                            <i class="fas fa-plus"></i> Add New Coordinate
                        </button>
                    </div>
                </div>

                <!-- Search -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" placeholder="Search by name, address, or region...">
                            <div class="input-group-append">
                                <button type="button" id="btn-search" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select id="filter-region" class="form-control">
                            <option value="">All Regions</option>
                            <option value="Bengkulu Utara">Bengkulu Utara</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" id="btn-filter" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Apply Filters
                        </button>
                        <button type="button" id="btn-reset" class="btn btn-default ml-2">
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
                                <th>Name</th>
                                <th>Region</th>
                                <th>Address</th>
                                <th>Coordinates</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="coordinates-tbody">
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
                            <label class="mr-2">Show:</label>
                            <select id="per-page" class="form-control form-control-sm" style="width: auto;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="ml-2">entries</span>
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

<!-- Create Coordinate Modal -->
<div class="modal fade" id="createCoordinateModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="createCoordinateForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Coordinate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="region">Region *</label>
                        <input type="text" class="form-control" id="region" name="region" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude">Latitude * (-90 to 90)</label>
                                <input type="number" step="any" class="form-control" id="latitude" name="latitude" min="-90" max="90" required>
                                <small class="form-text text-muted">Must be between -90 and 90</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude">Longitude * (-180 to 180)</label>
                                <input type="number" step="any" class="form-control" id="longitude" name="longitude" min="-180" max="180" required>
                                <small class="form-text text-muted">Must be between -180 and 180</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Coordinate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Coordinate Modal -->
<div class="modal fade" id="editCoordinateModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editCoordinateForm">
                @csrf
                <input type="hidden" id="edit-coordinate-id" name="coordinate_id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Coordinate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-name">Name *</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-region">Region *</label>
                        <input type="text" class="form-control" id="edit-region" name="region" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-address">Address</label>
                        <textarea class="form-control" id="edit-address" name="address" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-latitude">Latitude * (-90 to 90)</label>
                                <input type="number" step="any" class="form-control" id="edit-latitude" name="latitude" min="-90" max="90" required>
                                <small class="form-text text-muted">Must be between -90 and 90</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-longitude">Longitude * (-180 to 180)</label>
                                <input type="number" step="any" class="form-control" id="edit-longitude" name="longitude" min="-180" max="180" required>
                                <small class="form-text text-muted">Must be between -180 and 180</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Description</label>
                        <textarea class="form-control" id="edit-description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Coordinate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Coordinate Detail Modal -->
<div class="modal fade" id="coordinateDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Coordinate Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Common helper functions
    function showLoader() {
        $('#loading-indicator').show();
    }

    function hideLoader() {
        $('#loading-indicator').hide();
    }

    function showAlert(type, message) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: type,
                title: message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        } else {
            alert(message);
        }
    }

    let currentPage = 1;
    let perPage = 10;
    let searchQuery = '';
    let filterRegion = '';

    $(function () {
        loadCoordinates();

        // Search functionality
        $('#btn-search').click(function() {
            searchQuery = $('#search-input').val();
            currentPage = 1;
            loadCoordinates();
        });

        $('#search-input').keypress(function(e) {
            if (e.which == 13) {
                searchQuery = $(this).val();
                currentPage = 1;
                loadCoordinates();
            }
        });

        // Filter functionality
        $('#btn-filter').click(function() {
            filterRegion = $('#filter-region').val();
            currentPage = 1;
            loadCoordinates();
        });

        // Reset filters
        $('#btn-reset').click(function() {
            $('#filter-region').val('');
            $('#search-input').val('');
            searchQuery = '';
            filterRegion = '';
            currentPage = 1;
            loadCoordinates();
        });

        // Per page change
        $('#per-page').change(function() {
            perPage = $(this).val();
            currentPage = 1;
            loadCoordinates();
        });

        // Create coordinate
        $('#createCoordinateForm').submit(function (e) {
            e.preventDefault();
            showLoader();

            $.ajax({
                url: "{{ route('admin.coordinates.store') }}",
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    showAlert('success', response.success);
                    let modal = bootstrap.Modal.getInstance(document.getElementById('createCoordinateModal'));
                    if (modal) {
                        modal.hide();
                    }
                    $('#createCoordinateForm')[0].reset();
                    loadCoordinates();
                    hideLoader();
                },
                error: function (xhr) {
                    hideLoader();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            if (Array.isArray(errors[key])) {
                                errorMessage += errors[key].join('\n') + '\n';
                            } else {
                                errorMessage += errors[key] + '\n';
                            }
                        }
                        showAlert('error', errorMessage || 'Validation failed');
                    } else if (xhr.responseJSON && xhr.responseJSON.error) {
                        showAlert('error', xhr.responseJSON.error);
                    } else {
                        showAlert('error', xhr.responseJSON?.message || 'Failed to create coordinate');
                    }
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
                    $('#edit-region').val(coordinate.region);
                    $('#edit-address').val(coordinate.address);
                    $('#edit-latitude').val(coordinate.latitude);
                    $('#edit-longitude').val(coordinate.longitude);
                    $('#edit-description').val(coordinate.description || '');
                    let editModal = new bootstrap.Modal(document.getElementById('editCoordinateModal'));
                    editModal.show();
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
                    let editModal = bootstrap.Modal.getInstance(document.getElementById('editCoordinateModal'));
                    if (editModal) {
                        editModal.hide();
                    }
                    loadCoordinates();
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
                    let detailModal = new bootstrap.Modal(document.getElementById('coordinateDetailModal'));
                    detailModal.show();
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
                            loadCoordinates();
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

    });

    function loadCoordinates() {
        $('#loading-indicator').show();
        $('#coordinates-tbody').hide();

        let params = new URLSearchParams({
            page: currentPage,
            per_page: perPage,
            search: searchQuery,
            region: filterRegion
        });

        $.get(`{{ route('admin.coordinates.data') }}?${params}`)
            .done(function(response) {
                renderTable(response.data);
                renderPagination(response);
                renderInfo(response);
                $('#loading-indicator').hide();
                $('#coordinates-tbody').show();
            })
            .fail(function() {
                showAlert('error', 'Failed to load coordinates');
                $('#loading-indicator').hide();
            });
    }

    function renderTable(data) {
        let html = '';

        if (data.length === 0) {
            html = '<tr><td colspan="7" class="text-center">No coordinates found</td></tr>';
        } else {
            data.forEach(function(coordinate, index) {
                let no = (currentPage - 1) * perPage + index + 1;
                html += `
                    <tr>
                        <td>${no}</td>
                        <td>${coordinate.name}</td>
                        <td>${coordinate.region}</td>
                        <td>${coordinate.address}</td>
                        <td>${coordinate.latitude}, ${coordinate.longitude}</td>
                        <td>
                            <a href="https://www.google.com/maps?q=${coordinate.latitude},${coordinate.longitude}" target="_blank" class="btn btn-sm btn-outline-primary mr-1">
                                <i class="fas fa-map-marker-alt"></i> Map
                            </a>
                            <button type="button" class="btn btn-sm btn-info btn-view" data-id="${coordinate.id}" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="${coordinate.id}" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="${coordinate.id}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        $('#coordinates-tbody').html(html);
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
                loadCoordinates();
            }
        });
    }

    function renderInfo(response) {
        let start = (response.current_page - 1) * response.per_page + 1;
        let end = Math.min(response.current_page * response.per_page, response.total);
        let info = `Showing ${start} to ${end} of ${response.total} entries`;
        $('#table-info').text(info);
    }
</script>
@endpush