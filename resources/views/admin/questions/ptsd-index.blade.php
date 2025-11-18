@extends('admin.layouts.app')

@section('title', 'PTSD Questions - Admin')

@section('content-title')
    <h1 class="m-0">PTSD Questions Management</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.questions.index') }}">Questions</a></li>
    <li class="breadcrumb-item active">PTSD Questions</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">PTSD Questions List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add-question">
                            <i class="fas fa-plus"></i> Add New Question
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search and Filters -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" id="search-input" class="form-control" placeholder="Search questions...">
                                <div class="input-group-append">
                                    <button class="btn btn-default" type="button" id="search-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select id="per-page" class="form-control">
                                <option value="10">10 per page</option>
                                <option value="25">25 per page</option>
                                <option value="50">50 per page</option>
                                <option value="100">100 per page</option>
                            </select>
                        </div>
                        <div class="col-md-3 text-right">
                            <button class="btn btn-default btn-sm" id="refresh-btn">
                                <i class="fas fa-sync-alt"></i> Refresh
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Question</th>
                                    <th width="80">Order</th>
                                    <th width="100">Status</th>
                                    <th width="120">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="questions-tbody">
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        Loading...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-6">
                            <div id="pagination-info"></div>
                        </div>
                        <div class="col-md-6">
                            <nav id="pagination-nav"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Question Modal -->
<div class="modal fade" id="modal-add-question" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New PTSD Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-question">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="question_text">Question Text <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="question_text" name="question_text" rows="3" required></textarea>
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="order" name="order" min="1" required>
                                <span class="text-danger error-text"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Question
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Question Modal -->
<div class="modal fade" id="modal-edit-question" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit PTSD Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-question">
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_question_text">Question Text <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="edit_question_text" name="question_text" rows="3" required></textarea>
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_order">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="edit_order" name="order" min="1" required>
                                <span class="text-danger error-text"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active">
                                    <label class="form-check-label" for="edit_is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Question
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Question Modal -->
<div class="modal fade" id="modal-view-question" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Question Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Question Text:</label>
                    <p id="view_question_text" class="form-control-plaintext"></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Order:</label>
                            <p id="view_order" class="form-control-plaintext"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status:</label>
                            <p id="view_status" class="form-control-plaintext"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentPage = 1;
let currentSearch = '';
let currentPerPage = 10;

// Load questions
function loadQuestions(page = 1, search = '', perPage = 10) {
    currentPage = page;
    currentSearch = search;
    currentPerPage = perPage;

    $.ajax({
        url: '{{ route("admin.questions.ptsd.data") }}',
        type: 'GET',
        data: {
            page: page,
            search: search,
            per_page: perPage
        },
        success: function(response) {
            renderQuestions(response.data);
            renderPagination(response);
        },
        error: function() {
            $('#questions-tbody').html('<tr><td colspan="5" class="text-center text-danger">Error loading questions</td></tr>');
        }
    });
}

// Render questions table
function renderQuestions(questions) {
    let html = '';
    questions.forEach(function(question, index) {
        html += `
            <tr>
                <td>${((currentPage - 1) * currentPerPage) + index + 1}</td>
                <td>${question.question_text}</td>
                <td>${question.order}</td>
                <td>
                    <span class="badge badge-${question.is_active ? 'success' : 'secondary'}">
                        ${question.is_active ? 'Active' : 'Inactive'}
                    </span>
                </td>
                <td>${question.action}</td>
            </tr>
        `;
    });

    if (html === '') {
        html = '<tr><td colspan="5" class="text-center">No questions found</td></tr>';
    }

    $('#questions-tbody').html(html);
}

// Render pagination
function renderPagination(response) {
    // Pagination info
    $('#pagination-info').html(`
        Showing ${response.from} to ${response.to} of ${response.total} entries
    `);

    // Pagination links
    if (response.last_page > 1) {
        let pagination = '<ul class="pagination pagination-sm justify-content-end">';

        // Previous
        if (response.current_page > 1) {
            pagination += `<li class="page-item">
                <a class="page-link" href="#" data-page="${response.current_page - 1}">Previous</a>
            </li>`;
        }

        // Page numbers
        for (let i = 1; i <= response.last_page; i++) {
            if (i === response.current_page) {
                pagination += `<li class="page-item active"><a class="page-link" href="#">${i}</a></li>`;
            } else if (i === 1 || i === response.last_page || (i >= response.current_page - 2 && i <= response.current_page + 2)) {
                pagination += `<li class="page-item">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
            } else if (i === response.current_page - 3 || i === response.current_page + 3) {
                pagination += `<li class="page-item disabled"><a class="page-link" href="#">...</a></li>`;
            }
        }

        // Next
        if (response.current_page < response.last_page) {
            pagination += `<li class="page-item">
                <a class="page-link" href="#" data-page="${response.current_page + 1}">Next</a>
            </li>`;
        }

        pagination += '</ul>';
        $('#pagination-nav').html(pagination);
    } else {
        $('#pagination-nav').html('');
    }
}

// Event listeners
$(document).ready(function() {
    // Initial load
    loadQuestions();

    // Search
    $('#search-btn').click(function() {
        loadQuestions(1, $('#search-input').val(), currentPerPage);
    });

    $('#search-input').keypress(function(e) {
        if (e.which == 13) {
            loadQuestions(1, $(this).val(), currentPerPage);
        }
    });

    // Per page
    $('#per-page').change(function() {
        loadQuestions(1, currentSearch, $(this).val());
    });

    // Refresh
    $('#refresh-btn').click(function() {
        loadQuestions(currentPage, currentSearch, currentPerPage);
    });

    // Pagination
    $(document).on('click', '.pagination .page-link', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        if (page) {
            loadQuestions(page, currentSearch, currentPerPage);
        }
    });

    // Add question form
    $('#form-add-question').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("admin.questions.ptsd.store") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#modal-add-question').modal('hide');
                showAlert('success', response.success);
                $('#form-add-question')[0].reset();
                loadQuestions(currentPage, currentSearch, currentPerPage);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    displayErrors(xhr.responseJSON.errors);
                } else {
                    showAlert('error', 'Error creating question');
                }
            }
        });
    });

    // Edit button
    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/admin/questions/ptsd/${id}/edit`,
            type: 'GET',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_question_text').val(response.question_text);
                $('#edit_order').val(response.order);
                $('#edit_is_active').prop('checked', response.is_active);
                $('#modal-edit-question').modal('show');
            },
            error: function() {
                showAlert('error', 'Error loading question');
            }
        });
    });

    // Update question form
    $('#form-edit-question').submit(function(e) {
        e.preventDefault();
        let id = $('#edit_id').val();
        $.ajax({
            url: `/admin/questions/ptsd/${id}`,
            type: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#modal-edit-question').modal('hide');
                showAlert('success', response.success);
                loadQuestions(currentPage, currentSearch, currentPerPage);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    displayErrors(xhr.responseJSON.errors);
                } else {
                    showAlert('error', 'Error updating question');
                }
            }
        });
    });

    // View button
    $(document).on('click', '.btn-view', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/admin/questions/ptsd/${id}`,
            type: 'GET',
            success: function(response) {
                $('#view_question_text').text(response.question_text);
                $('#view_order').text(response.order);
                $('#view_status').html(`<span class="badge badge-${response.is_active ? 'success' : 'secondary'}">${response.is_active ? 'Active' : 'Inactive'}</span>`);
                $('#modal-view-question').modal('show');
            },
            error: function() {
                showAlert('error', 'Error loading question');
            }
        });
    });

    // Delete button
    $(document).on('click', '.btn-delete', function() {
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
                $.ajax({
                    url: `/admin/questions/ptsd/${id}`,
                    type: 'DELETE',
                    success: function(response) {
                        showAlert('success', response.success);
                        loadQuestions(currentPage, currentSearch, currentPerPage);
                    },
                    error: function() {
                        showAlert('error', 'Error deleting question');
                    }
                });
            }
        });
    });
});

// Display validation errors
function displayErrors(errors) {
    $('.error-text').empty();
    for (let field in errors) {
        $(`[name="${field}"]`).siblings('.error-text').text(errors[field][0]);
    }
}
</script>
@endpush