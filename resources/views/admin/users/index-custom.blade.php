@extends('layouts.dashboard.dashboard')

@section('title', 'User Management - Admin')

@section('menu')
    User Management
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Users</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                            <i class="fas fa-plus"></i> Add New User
                        </button>
                        <a href="{{ route('admin.users.export') }}" class="btn btn-success float-right">
                            <i class="fas fa-download"></i> Export Users
                        </a>
                    </div>
                </div>

                <!-- Search -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" placeholder="Cari nama atau email...">
                            <div class="input-group-append">
                                <button type="button" id="btn-search" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" id="btn-reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="check-all"></th>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Assessments</th>
                                <th>Last Assessment</th>
                                <th>Registered</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="users-tbody">
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

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="createUserForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editUserForm">
                @csrf
                <input type="hidden" id="edit-user-id" name="user_id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-password">Password (leave blank to keep current)</label>
                        <input type="password" class="form-control" id="edit-password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="edit-password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="edit-password_confirmation" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="edit-role">Role</label>
                        <select class="form-control" id="edit-role" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- User Detail Modal -->
<div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="user-detail">
                <!-- Content will be loaded via AJAX -->
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

    $(function () {
        loadUsers();

        // Check all functionality
        $('#check-all').change(function () {
            $('.check-row').prop('checked', $(this).prop('checked'));
        });

        // Search functionality
        $('#btn-search').click(function() {
            searchQuery = $('#search-input').val();
            currentPage = 1;
            loadUsers();
        });

        $('#search-input').keypress(function(e) {
            if (e.which == 13) {
                searchQuery = $(this).val();
                currentPage = 1;
                loadUsers();
            }
        });

        // Reset filters
        $('#btn-reset').click(function() {
            $('#search-input').val('');
            searchQuery = '';
            currentPage = 1;
            loadUsers();
        });

        // Per page change
        $('#per-page').change(function() {
            perPage = $(this).val();
            currentPage = 1;
            loadUsers();
        });

        // Create user
        $('#createUserForm').submit(function (e) {
            e.preventDefault();
            showLoader();

            $.ajax({
                url: "{{ route('admin.users.store') }}",
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    showAlert('success', response.success);
                    var modalEl = document.getElementById('createUserModal');
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                    $('#createUserForm')[0].reset();
                    loadUsers();
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
                        showAlert('error', 'Gagal membuat user');
                    }
                    hideLoader();
                }
            });
        });

        // Edit user
        $(document).on('click', '.btn-edit', function () {
            let id = $(this).data('id');
            showLoader();

            $.get(`{{ route('admin.users.edit', ':id') }}`.replace(':id', id))
                .done(function (user) {
                    $('#edit-user-id').val(user.id);
                    $('#edit-name').val(user.name);
                    $('#edit-email').val(user.email);
                    $('#edit-role').val(user.role || 'user');
                    var modalEl = document.getElementById('editUserModal');
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Gagal memuat data user');
                    hideLoader();
                });
        });

        $('#editUserForm').submit(function (e) {
            e.preventDefault();
            let id = $('#edit-user-id').val();
            showLoader();

            $.ajax({
                url: `{{ route('admin.users.update', ':id') }}`.replace(':id', id),
                type: 'PUT',
                data: $(this).serialize(),
                success: function (response) {
                    showAlert('success', response.success);
                    var modalEl = document.getElementById('editUserModal');
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                    loadUsers();
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
                        showAlert('error', 'Gagal mengupdate user');
                    }
                    hideLoader();
                }
            });
        });

        // View user details
        $(document).on('click', '.btn-view', function () {
            let id = $(this).data('id');
            showLoader();

            $.get(`{{ route('admin.users.show', ':id') }}`.replace(':id', id))
                .done(function (response) {
                    $('#user-detail').html(response.html || response);
                    var modalEl = document.getElementById('userDetailModal');
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Gagal memuat detail user');
                    hideLoader();
                });
        });

        // Delete user
        $(document).on('click', '.btn-delete', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoader();

                    $.ajax({
                        url: `{{ route('admin.users.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            showAlert('success', 'User berhasil dihapus');
                            loadUsers();
                            hideLoader();
                        },
                        error: function (xhr) {
                            let errorMsg = 'Gagal menghapus user';
                            if (xhr.responseJSON && xhr.responseJSON.error) {
                                errorMsg = xhr.responseJSON.error;
                            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            }
                            showAlert('error', errorMsg);
                            hideLoader();
                        }
                    });
                }
            });
        });
    });

    function loadUsers() {
        $('#loading-indicator').show();
        $('#users-tbody').hide();

        let params = new URLSearchParams({
            page: currentPage,
            per_page: perPage,
            search: searchQuery
        });

        $.get(`{{ route('admin.users.data') }}?${params}`)
            .done(function(response) {
                const data = Array.isArray(response.data) ? response.data : [];
                renderTable(data);
                renderPagination(response);
                renderInfo(response);
                $('#loading-indicator').hide();
                $('#users-tbody').show();
            })
            .fail(function(xhr) {
                let errorMsg = 'Gagal memuat data user';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                showAlert('error', errorMsg);
                $('#loading-indicator').hide();
                $('#users-tbody').show();
            });
    }

    function renderTable(data) {
        let html = '';

        if (data.length === 0) {
            html = '<tr><td colspan="8" class="text-center">Tidak ada data user</td></tr>';
        } else {
            data.forEach(function(user, index) {
                let no = (currentPage - 1) * perPage + index + 1;
                html += `
                    <tr>
                        <td><input type="checkbox" class="check-row" value="${user.id}"></td>
                        <td>${no}</td>
                        <td>${user.name || 'N/A'}</td>
                        <td>${user.email || 'N/A'}</td>
                        <td>${user.assessment_count || 0}</td>
                        <td>${user.last_assessment || 'N/A'}</td>
                        <td>${user.created_at || 'N/A'}</td>
                        <td>${user.action || ''}</td>
                    </tr>
                `;
            });
        }

        $('#users-tbody').html(html);
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
                loadUsers();
            }
        });
    }

    function renderInfo(response) {
        let start = (response.current_page - 1) * response.per_page + 1;
        let end = Math.min(response.current_page * response.per_page, response.total);
        let info = `Menampilkan ${start} sampai ${end} dari ${response.total} data`;
        $('#table-info').text(info);
    }
</script>
@endpush