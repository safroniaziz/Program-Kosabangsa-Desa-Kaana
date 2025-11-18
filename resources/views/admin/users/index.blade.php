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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                            <i class="fas fa-plus"></i> Add New User
                        </button>
                        <a href="{{ route('admin.users.export') }}" class="btn btn-success float-right">
                            <i class="fas fa-download"></i> Export Users
                        </a>
                    </div>
                </div>

                <table id="users-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="check-all"></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Assessments</th>
                            <th>Last Assessment</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
    </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        let table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.users.data') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return `<input type="checkbox" class="check-row" value="${row.id}">`;
                    }
                },
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'verified', name: 'verified', orderable: false},
                {data: 'assessment_count', name: 'assessment_count'},
                {data: 'last_assessment', name: 'last_assessment'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[7, 'desc']]
        });

        // Check all functionality
        $('#check-all').change(function () {
            $('.check-row').prop('checked', $(this).prop('checked'));
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
                    $('#createUserModal').modal('hide');
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
                        showAlert('error', 'Failed to create user');
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
                    $('#editUserModal').modal('show');
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Failed to load user data');
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
                    $('#editUserModal').modal('hide');
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
                        showAlert('error', 'Failed to update user');
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
                .done(function (data) {
                    $('#user-detail').html(data);
                    $('#userDetailModal').modal('show');
                    hideLoader();
                })
                .fail(function () {
                    showAlert('error', 'Failed to load user details');
                    hideLoader();
                });
        });

        // Delete user
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
                        url: `{{ route('admin.users.destroy', ':id') }}`.replace(':id', id),
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
                            showAlert('error', xhr.responseJSON.error || 'Failed to delete user');
                            hideLoader();
                        }
                    });
                }
            });
        });
    });
</script>
@endpush