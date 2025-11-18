@extends('admin.layouts.app')

@section('title', 'Assessments Management - Admin')

@section('content-title')
    <h1 class="m-0">Assessments Management</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item active">Assessments</li>
@endsection

@section('content')
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
                        <select id="filter-type" class="form-control">
                            <option value="">All Types</option>
                            <option value="ptsd">PTSD</option>
                            <option value="dcm">DCM</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filter-risk">Risk Level</label>
                        <select id="filter-risk" class="form-control">
                            <option value="">All Levels</option>
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
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" placeholder="Search by user name or email...">
                            <div class="input-group-append">
                                <button type="button" id="btn-search" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
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
                        <tbody id="assessments-tbody">
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
@endsection

@push('scripts')
<script>
    let currentPage = 1;
    let perPage = 10;
    let totalPages = 0;
    let searchQuery = '';
    let filters = {
        type: '',
        risk_level: '',
        date_from: '',
        date_to: ''
    };

    $(function () {
        loadAssessments();

        // Search functionality
        $('#btn-search').click(function() {
            searchQuery = $('#search-input').val();
            currentPage = 1;
            loadAssessments();
        });

        $('#search-input').keypress(function(e) {
            if (e.which == 13) {
                searchQuery = $(this).val();
                currentPage = 1;
                loadAssessments();
            }
        });

        // Filter functionality
        $('#btn-filter').click(function() {
            filters.type = $('#filter-type').val();
            filters.risk_level = $('#filter-risk').val();
            filters.date_from = $('#filter-date-from').val();
            filters.date_to = $('#filter-date-to').val();
            currentPage = 1;
            loadAssessments();
        });

        // Reset filters
        $('#btn-reset').click(function() {
            $('#filter-type').val('');
            $('#filter-risk').val('');
            $('#filter-date-from').val('');
            $('#filter-date-to').val('');
            $('#search-input').val('');
            searchQuery = '';
            filters = {
                type: '',
                risk_level: '',
                date_from: '',
                date_to: ''
            };
            currentPage = 1;
            loadAssessments();
        });

        // Per page change
        $('#per-page').change(function() {
            perPage = $(this).val();
            currentPage = 1;
            loadAssessments();
        });
    });

    function loadAssessments() {
        $('#loading-indicator').show();
        $('#assessments-tbody').hide();

        let params = new URLSearchParams({
            page: currentPage,
            per_page: perPage,
            search: searchQuery,
            ...filters
        });

        $.get(`{{ route('admin.assessments.index') }}/data?${params}`)
            .done(function(response) {
                renderTable(response.data);
                renderPagination(response);
                renderInfo(response);
                $('#loading-indicator').hide();
                $('#assessments-tbody').show();
            })
            .fail(function() {
                showAlert('error', 'Failed to load assessments');
                $('#loading-indicator').hide();
            });
    }

    function renderTable(data) {
        let html = '';

        if (data.length === 0) {
            html = '<tr><td colspan="8" class="text-center">No assessments found</td></tr>';
        } else {
            data.forEach(function(assessment, index) {
                let no = (currentPage - 1) * perPage + index + 1;
                html += `
                    <tr>
                        <td>${no}</td>
                        <td>${assessment.user_name}</td>
                        <td>${assessment.user_email}</td>
                        <td>${assessment.type_badge}</td>
                        <td>${assessment.risk_badge}</td>
                        <td>${assessment.score}</td>
                        <td>${assessment.created_at}</td>
                        <td>${assessment.action}</td>
                    </tr>
                `;
            });
        }

        $('#assessments-tbody').html(html);
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
                loadAssessments();
            }
        });
    }

    function renderInfo(response) {
        let start = (response.current_page - 1) * response.per_page + 1;
        let end = Math.min(response.current_page * response.per_page, response.total);
        let info = `Showing ${start} to ${end} of ${response.total} entries`;
        $('#table-info').text(info);
    }

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
                        loadAssessments();
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
</script>
@endpush