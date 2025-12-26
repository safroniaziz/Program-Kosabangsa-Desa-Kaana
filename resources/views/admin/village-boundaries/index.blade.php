@extends('layouts.dashboard.dashboard')

@section('title', 'Batas Wilayah - Admin')

@section('menu')
    Batas Wilayah
@endsection

@section('link')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item text-gray-700">Batas Wilayah</li>
@endsection

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Batas Wilayah Desa</h3>
                        <div class="card-toolbar">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus"></i> Tambah Batas Wilayah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Search -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="search-input" class="form-control" placeholder="Cari nama desa...">
                                    <button type="button" id="btn-search" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
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
                                        <th>No</th>
                                        <th>Nama Desa</th>
                                        <th>Center</th>
                                        <th>Koordinat Polygon</th>
                                        <th>Zoom</th>
                                        <th>Color</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="data-tbody">
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
                                    <label class="me-2">Show:</label>
                                    <select id="per-page" class="form-control form-control-sm" style="width: auto;">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                    <span class="ms-2">entries</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="pagination-container" class="d-flex justify-content-end"></div>
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="row mt-2">
                            <div class="col-12">
                                <div id="table-info" class="text-muted small"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="createForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Batas Wilayah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Nama Desa</label>
                                <input type="text" class="form-control" name="village_name" required placeholder="contoh: Desa Kaana">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Center Latitude</label>
                                <input type="number" step="any" class="form-control" name="center_latitude" required placeholder="-6.123456">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Center Longitude</label>
                                <input type="number" step="any" class="form-control" name="center_longitude" required placeholder="106.123456">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Default Zoom</label>
                                <input type="number" class="form-control" name="default_zoom" value="14" min="1" max="20">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Fill Color</label>
                                <input type="color" class="form-control form-control-color" name="fill_color" value="#007bff">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fill Opacity (0-1)</label>
                                <input type="number" step="0.1" min="0" max="1" class="form-control" name="fill_opacity" value="0.3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Line Color</label>
                                <input type="color" class="form-control form-control-color" name="line_color" value="#007bff">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Line Width</label>
                                <input type="number" class="form-control" name="line_width" value="2" min="1" max="10">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Coordinates (GeoJSON Format)</label>
                        <textarea class="form-control" name="coordinates" rows="6" required placeholder='[[106.123, -6.123], [106.124, -6.124], ...]'></textarea>
                        <small class="text-muted">Format: Array of [longitude, latitude] pairs dalam format JSON</small>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="create_is_active" checked>
                        <label class="form-check-label" for="create_is_active">Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editForm">
                @csrf
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Batas Wilayah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Nama Desa</label>
                                <input type="text" class="form-control" id="edit_village_name" name="village_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Center Latitude</label>
                                <input type="number" step="any" class="form-control" id="edit_center_latitude" name="center_latitude" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Center Longitude</label>
                                <input type="number" step="any" class="form-control" id="edit_center_longitude" name="center_longitude" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Default Zoom</label>
                                <input type="number" class="form-control" id="edit_default_zoom" name="default_zoom" min="1" max="20">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Fill Color</label>
                                <input type="color" class="form-control form-control-color" id="edit_fill_color" name="fill_color">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fill Opacity (0-1)</label>
                                <input type="number" step="0.1" min="0" max="1" class="form-control" id="edit_fill_opacity" name="fill_opacity">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Line Color</label>
                                <input type="color" class="form-control form-control-color" id="edit_line_color" name="line_color">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Line Width</label>
                                <input type="number" class="form-control" id="edit_line_width" name="line_width" min="1" max="10">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Coordinates (GeoJSON Format)</label>
                        <textarea class="form-control" id="edit_coordinates" name="coordinates" rows="6" required></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active">
                        <label class="form-check-label" for="edit_is_active">Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Batas Wilayah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="preview-map" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Coordinates Modal -->
<div class="modal fade" id="coordinatesModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-map-marker-alt me-2"></i>Daftar Koordinat Polygon</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge badge-primary fs-6" id="coords-count">0 titik</span>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="copyCoordinates()">
                        <i class="fas fa-copy me-1"></i> Copy JSON
                    </button>
                </div>
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-sm table-bordered table-striped">
                        <thead class="table-dark sticky-top">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                            </tr>
                        </thead>
                        <tbody id="coords-tbody">
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <label class="form-label fw-bold">Raw JSON:</label>
                    <textarea id="coords-json" class="form-control font-monospace" rows="5" readonly></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
let previewMap = null;
let currentPage = 1;
let perPage = 10;
let searchQuery = '';

$(function() {
    loadData();

    $('#btn-search').click(function() {
        searchQuery = $('#search-input').val();
        currentPage = 1;
        loadData();
    });

    $('#search-input').keypress(function(e) {
        if (e.which == 13) {
            searchQuery = $(this).val();
            currentPage = 1;
            loadData();
        }
    });

    $('#btn-reset').click(function() {
        $('#search-input').val('');
        searchQuery = '';
        currentPage = 1;
        loadData();
    });

    $('#per-page').change(function() {
        perPage = $(this).val();
        currentPage = 1;
        loadData();
    });

    // Create
    $('#createForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('admin.village-boundaries.store') }}",
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire('Berhasil', response.success, 'success');
                $('#createModal').modal('hide');
                $('#createForm')[0].reset();
                loadData();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let msg = errors ? Object.values(errors).flat().join('\n') : 'Terjadi kesalahan';
                Swal.fire('Error', msg, 'error');
            }
        });
    });

    // Preview Map
    $(document).on('click', '.btn-preview', function() {
        let id = $(this).data('id');
        $.get(`{{ url('admin/village-boundaries') }}/${id}`, function(data) {
            $('#previewModal').modal('show');
            
            setTimeout(function() {
                if (previewMap) {
                    previewMap.remove();
                }
                
                previewMap = L.map('preview-map').setView([data.center_latitude, data.center_longitude], data.default_zoom);
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(previewMap);
                
                if (data.coordinates && data.coordinates.length > 0) {
                    let coords = data.coordinates.map(c => [c[1], c[0]]);
                    L.polygon(coords, {
                        color: data.line_color || '#007bff',
                        weight: data.line_width || 2,
                        fillColor: data.fill_color || '#007bff',
                        fillOpacity: data.fill_opacity || 0.3
                    }).addTo(previewMap);
                }
            }, 300);
        });
    });

    // Edit
    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        $.get(`{{ url('admin/village-boundaries') }}/${id}`, function(data) {
            $('#edit_id').val(data.id);
            $('#edit_village_name').val(data.village_name);
            $('#edit_center_latitude').val(data.center_latitude);
            $('#edit_center_longitude').val(data.center_longitude);
            $('#edit_default_zoom').val(data.default_zoom);
            $('#edit_fill_color').val(data.fill_color || '#007bff');
            $('#edit_fill_opacity').val(data.fill_opacity);
            $('#edit_line_color').val(data.line_color || '#007bff');
            $('#edit_line_width').val(data.line_width);
            $('#edit_coordinates').val(JSON.stringify(data.coordinates, null, 2));
            $('#edit_is_active').prop('checked', data.is_active);
            $('#editModal').modal('show');
        });
    });

    $('#editForm').submit(function(e) {
        e.preventDefault();
        let id = $('#edit_id').val();
        $.ajax({
            url: `{{ url('admin/village-boundaries') }}/${id}`,
            type: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire('Berhasil', response.success, 'success');
                $('#editModal').modal('hide');
                loadData();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let msg = errors ? Object.values(errors).flat().join('\n') : 'Terjadi kesalahan';
                Swal.fire('Error', msg, 'error');
            }
        });
    });

    // Toggle Status
    $(document).on('click', '.btn-toggle', function() {
        let id = $(this).data('id');
        $.post(`{{ url('admin/village-boundaries') }}/${id}/toggle-status`, {
            _token: '{{ csrf_token() }}'
        }, function(response) {
            Swal.fire('Berhasil', response.success, 'success');
            loadData();
        });
    });

    // Delete
    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('admin/village-boundaries') }}/${id}`,
                    type: 'DELETE',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function(response) {
                        Swal.fire('Berhasil', response.success, 'success');
                        loadData();
                    }
                });
            }
        });
    });
});

function loadData() {
    $('#loading-indicator').show();
    $('#data-tbody').hide();

    let params = new URLSearchParams({
        page: currentPage,
        per_page: perPage,
        search: searchQuery
    });

    $.get(`{{ route('admin.village-boundaries.data') }}?${params}`)
        .done(function(response) {
            const data = Array.isArray(response.data) ? response.data : [];
            renderTable(data);
            renderPagination(response);
            renderInfo(response);
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        })
        .fail(function(xhr) {
            Swal.fire('Error', 'Gagal memuat data', 'error');
            $('#loading-indicator').hide();
            $('#data-tbody').show();
        });
}

function renderTable(data) {
    let html = '';
    // Store data globally for coordinate modal access
    window.boundaryData = data;
    
    if (data.length === 0) {
        html = '<tr><td colspan="8" class="text-center">Tidak ada data</td></tr>';
    } else {
        data.forEach(function(item, index) {
            let no = (currentPage - 1) * perPage + index + 1;
            
            // Format coordinates for display with clickable button
            let coordsDisplay = '-';
            if (item.coordinates && Array.isArray(item.coordinates) && item.coordinates.length > 0) {
                let totalPoints = item.coordinates.length;
                coordsDisplay = `
                    <button type="button" class="btn btn-sm btn-info btn-coords" data-index="${index}" title="Lihat semua ${totalPoints} titik">
                        <i class="fas fa-list-ol me-1"></i>${totalPoints} titik
                    </button>`;
            }
            
            html += `
                <tr>
                    <td>${no}</td>
                    <td>${item.village_name || '-'}</td>
                    <td>${item.center || '-'}</td>
                    <td>${coordsDisplay}</td>
                    <td>${item.default_zoom || 14}</td>
                    <td>${item.color_preview || '-'}</td>
                    <td>${item.status || '-'}</td>
                    <td>${item.action || ''}</td>
                </tr>
            `;
        });
    }
    $('#data-tbody').html(html);
}

function renderPagination(response) {
    let html = '';
    if (response.total > 0) {
        html += '<nav><ul class="pagination pagination-sm mb-0">';
        if (response.current_page > 1) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.current_page - 1}">Previous</a></li>`;
        }
        let startPage = Math.max(1, response.current_page - 2);
        let endPage = Math.min(response.last_page, response.current_page + 2);
        if (startPage > 1) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`;
            if (startPage > 2) html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }
        for (let i = startPage; i <= endPage; i++) {
            html += `<li class="page-item ${i === response.current_page ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }
        if (endPage < response.last_page) {
            if (endPage < response.last_page - 1) html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.last_page}">${response.last_page}</a></li>`;
        }
        if (response.current_page < response.last_page) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${response.current_page + 1}">Next</a></li>`;
        }
        html += '</ul></nav>';
    }
    $('#pagination-container').html(html);
    $('.page-link').click(function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        if (page && page !== currentPage) {
            currentPage = page;
            loadData();
        }
    });
}

function renderInfo(response) {
    let start = (response.current_page - 1) * response.per_page + 1;
    let end = Math.min(response.current_page * response.per_page, response.total);
    $('#table-info').text(`Menampilkan ${start} sampai ${end} dari ${response.total} data`);
}

// Show coordinates modal
$(document).on('click', '.btn-coords', function() {
    let index = $(this).data('index');
    let item = window.boundaryData[index];
    
    if (item && item.coordinates && Array.isArray(item.coordinates)) {
        let coords = item.coordinates;
        
        // Update count badge
        $('#coords-count').text(`${coords.length} titik koordinat`);
        
        // Build table rows
        let tableHtml = '';
        coords.forEach(function(coord, i) {
            tableHtml += `
                <tr>
                    <td class="text-center">${i + 1}</td>
                    <td><code>${coord[0].toFixed(6)}</code></td>
                    <td><code>${coord[1].toFixed(6)}</code></td>
                </tr>
            `;
        });
        $('#coords-tbody').html(tableHtml);
        
        // Set raw JSON
        $('#coords-json').val(JSON.stringify(coords, null, 2));
        
        // Show modal
        $('#coordinatesModal').modal('show');
    }
});

// Copy coordinates to clipboard
function copyCoordinates() {
    let json = $('#coords-json').val();
    navigator.clipboard.writeText(json).then(function() {
        Swal.fire({
            icon: 'success',
            title: 'Copied!',
            text: 'Koordinat berhasil disalin ke clipboard',
            timer: 1500,
            showConfirmButton: false
        });
    });
}
</script>
@endpush
