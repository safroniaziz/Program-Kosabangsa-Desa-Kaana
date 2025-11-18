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
        <div class="card shadow-sm">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="fw-bold m-0">Daftar Assessment</h3>
                </div>
            </div>
            <div class="card-body">
                <!-- Filters -->
                <div class="row mb-4 g-3">
                    <div class="col-md-4 col-sm-6">
                        <label for="search-input" class="form-label fw-semibold">Cari User</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="search-input" class="form-control" placeholder="Nama atau email user...">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="filter-type" class="form-label fw-semibold">Tipe Assessment</label>
                        <select id="filter-type" class="form-select">
                            <option value="">Semua Tipe</option>
                            <option value="ptsd">PTSD</option>
                            <option value="dcm">DCM</option>
                        </select>
                    </div>
                    <div class="col-md-5 col-sm-12 d-flex align-items-end">
                        <div class="ms-auto">
                            <label class="form-label fw-semibold d-block mb-2">Tampilkan</label>
                            <select id="per-page" class="form-select form-select-sm" style="width: auto; display: inline-block;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-muted small ms-2">entries</span>
                        </div>
                    </div>
                </div>

                <!-- Loading indicator -->
                <div id="loading-indicator" class="text-center py-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mt-2 mb-0">Memuat data...</p>
                </div>

                <!-- Table -->
                <div class="table-responsive" id="table-container">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>User</th>
                                <th>Email</th>
                                <th style="width: 100px;">Type</th>
                                <th style="width: 80px;" class="text-center">Score</th>
                                <th style="width: 150px;">Date</th>
                                <th style="width: 120px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="assessments-tbody">
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination & Info -->
                <div class="row mt-4 align-items-center">
                    <div class="col-md-6">
                        <div id="table-info" class="text-muted small">
                            <!-- Info will be loaded via AJAX -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="pagination-container" class="d-flex justify-content-end">
                            <!-- Pagination will be loaded via AJAX -->
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
    </div>
@endsection

@push('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Common functions
    function showLoader() {
        $('#loading-indicator').show();
    }

    function hideLoader() {
        $('#loading-indicator').hide();
    }

    function showAlert(type, message) {
        Swal.fire({
            icon: type,
            title: message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    }

    let currentPage = 1;
    let perPage = 10;
    let totalPages = 0;
    let searchQuery = '';
    let filters = {
        type: ''
    };
    let searchTimeout;

    $(function () {
        loadAssessments();

        // Auto-search on input (with debounce)
        $('#search-input').on('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                searchQuery = $('#search-input').val();
                currentPage = 1;
                loadAssessments();
            }, 500); // Wait 500ms after user stops typing
        });

        // Auto-filter on type change
        $('#filter-type').on('change', function() {
            filters.type = $(this).val();
            currentPage = 1;
            loadAssessments();
        });

        // Per page change
        $('#per-page').on('change', function() {
            perPage = $(this).val();
            currentPage = 1;
            loadAssessments();
        });
    });

    function loadAssessments() {
        $('#loading-indicator').show();
        $('#table-container').hide();

        let params = new URLSearchParams({
            page: currentPage,
            per_page: perPage
        });
        
        if (searchQuery) {
            params.append('search', searchQuery);
        }
        
        if (filters.type) {
            params.append('type', filters.type);
        }

        $.get(`{{ route('admin.assessments.data') }}?${params}`)
            .done(function(response) {
                // Ensure data is an array
                const data = Array.isArray(response.data) ? response.data : [];
                renderTable(data);
                renderPagination(response);
                renderInfo(response);
                $('#loading-indicator').hide();
                $('#table-container').show();
            })
            .fail(function(xhr) {
                let errorMsg = 'Failed to load assessments';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                showAlert('error', errorMsg);
                $('#loading-indicator').hide();
                $('#table-container').show();
            });
    }

    function renderTable(data) {
        let html = '';

        // Ensure data is an array
        if (!Array.isArray(data)) {
            data = [];
        }

        if (data.length === 0) {
            html = `
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 opacity-50"></i>
                            <p class="mb-0">Tidak ada data assessment ditemukan</p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            data.forEach(function(assessment, index) {
                let no = (currentPage - 1) * perPage + index + 1;
                html += `
                    <tr>
                        <td class="text-muted">${no}</td>
                        <td>
                            <div class="fw-semibold">${assessment.user_name}</div>
                        </td>
                        <td>
                            <div class="text-muted small">${assessment.user_email}</div>
                        </td>
                        <td>${assessment.type_badge}</td>
                        <td class="text-center">
                            <span class="badge bg-primary">${assessment.score}</span>
                        </td>
                        <td>
                            <div class="text-muted small">${assessment.created_at}</div>
                        </td>
                        <td class="text-center">${assessment.action}</td>
                    </tr>
                `;
            });
        }

        $('#assessments-tbody').html(html);
    }

    function renderPagination(response) {
        let html = '';

        if (response.total > 0 && response.last_page > 1) {
            html += '<nav><ul class="pagination pagination-sm mb-0">';

            // Previous button
            if (response.current_page > 1) {
                html += `<li class="page-item">
                    <a class="page-link" href="#" data-page="${response.current_page - 1}">
                        <i class="fas fa-chevron-left"></i>
                    </a>
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
                    <a class="page-link" href="#" data-page="${response.current_page + 1}">
                        <i class="fas fa-chevron-right"></i>
                    </a>
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
        if (response.total > 0) {
            let start = (response.current_page - 1) * response.per_page + 1;
            let end = Math.min(response.current_page * response.per_page, response.total);
            let info = `Menampilkan ${start} sampai ${end} dari ${response.total} data`;
            $('#table-info').text(info);
        } else {
            $('#table-info').text('Tidak ada data');
        }
    }

    // View assessment details
    $(document).on('click', '.btn-view', function () {
        let id = $(this).data('id');
        showLoader();

        $.get(`{{ route('admin.assessments.show', ':id') }}`.replace(':id', id))
            .done(function (response) {
                $('#assessment-detail').html(response.html || response);
                $('#assessmentModal').modal('show');
                hideLoader();
            })
            .fail(function () {
                showAlert('error', 'Failed to load assessment details');
                hideLoader();
            });
    });

    // View assessment history
    $(document).on('click', '.btn-history', function () {
        let userId = $(this).data('user-id');
        let type = $(this).data('type');
        showLoader();

        $.get(`{{ route('admin.assessments.history', [':userId', ':type']) }}`.replace(':userId', userId).replace(':type', type))
            .done(function (response) {
                $('#assessment-detail').html(response.html || response);
                $('#assessmentModal .modal-title').text('Riwayat Assessment');
                $('#assessmentModal').modal('show');
                hideLoader();
            })
            .fail(function () {
                showAlert('error', 'Failed to load assessment history');
                hideLoader();
            });
    });

    // View assessment detail from history
    $(document).on('click', '.btn-view-history', function () {
        let id = $(this).data('id');
        showLoader();

        $.get(`{{ route('admin.assessments.show', ':id') }}`.replace(':id', id))
            .done(function (response) {
                $('#assessment-detail').html(response.html || response);
                $('#assessmentModal .modal-title').text('Assessment Detail');
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