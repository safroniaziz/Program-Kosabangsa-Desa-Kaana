@extends('admin.layouts.app')

@section('title', 'Coordinate Map - Admin')

@section('content-title')
    <h1 class="m-0">Coordinate Map</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.coordinates.index') }}">Coordinates</a></li>
    <li class="breadcrumb-item active">Map View</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Interactive Map</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.coordinates.index') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-list"></i> List View
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Map Container -->
                <div id="map" style="height: 600px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Map Statistics -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-map-marker-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Locations</span>
                <span class="info-box-number" id="total-locations">0</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Active Locations</span>
                <span class="info-box-number" id="active-locations">0</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-chart-line"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Assessments</span>
                <span class="info-box-number" id="total-assessments">0</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fas fa-map"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Regions Covered</span>
                <span class="info-box-number" id="regions-covered">0</span>
            </div>
        </div>
    </div>
</div>

<!-- Region Distribution -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Assessments by Region</h3>
            </div>
            <div class="card-body">
                <canvas id="regionChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Locations</h3>
            </div>
            <div class="card-body">
                <div id="top-locations-list"></div>
            </div>
        </div>
    </div>
</div>

<!-- Location Detail Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Location Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="location-detail">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>
<style>
    #map {
        height: 600px;
        width: 100%;
    }
    .custom-popup {
        min-width: 200px;
    }
    .leaflet-container {
        font-family: inherit;
    }
</style>
@endpush

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

<script>
    let map;
    let markers = [];
    let locations = [];
    let regionChart;

    $(function () {
        // Initialize map
        map = L.map('map').setView([-6.4025, 106.7942], 8); // Centered on Java

        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Load map data
        loadMapData();
        loadStatistics();
    });

    function loadMapData() {
        showLoader();

        $.get("{{ route('admin.coordinates.map-data') }}")
            .done(function(data) {
                locations = data;

                // Clear existing markers
                markers.forEach(marker => map.removeLayer(marker));
                markers = [];

                // Add markers for each location
                locations.forEach(location => {
                    let marker = L.marker([location.lat, location.lng])
                        .addTo(map)
                        .bindPopup(location.info_window);

                    marker.on('click', function() {
                        showLocationDetail(location.id);
                    });

                    markers.push(marker);
                });

                // Fit map to show all markers
                if (locations.length > 0) {
                    let group = new L.featureGroup(markers);
                    map.fitBounds(group.getBounds().pad(0.1));
                }

                updateRegionChart();
                updateTopLocations();
                hideLoader();
            })
            .fail(function() {
                showAlert('error', 'Failed to load map data');
                hideLoader();
            });
    }

    function loadStatistics() {
        $.get("{{ route('admin.reports.coordinate-statistics') }}")
            .done(function(data) {
                $('#total-locations').text(data.totalCoordinates);
                $('#active-locations').text(data.totalCoordinates - data.unusedCoordinates);
                $('#total-assessments').text(data.totalCoordinates);
                $('#regions-covered').text(data.regionDistribution ? data.regionDistribution.length : 0);
            });
    }

    function updateRegionChart() {
        let regionCounts = {};
        locations.forEach(location => {
            regionCounts[location.region] = (regionCounts[location.region] || 0) + location.assessment_count;
        });

        let ctx = document.getElementById('regionChart').getContext('2d');

        if (regionChart) {
            regionChart.destroy();
        }

        regionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(regionCounts),
                datasets: [{
                    label: 'Assessments',
                    data: Object.values(regionCounts),
                    backgroundColor: '#17a2b8'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    function updateTopLocations() {
        let sortedLocations = [...locations].sort((a, b) => b.assessment_count - a.assessment_count).slice(0, 5);

        let html = '<ul class="list-group list-group-flush">';
        sortedLocations.forEach((location, index) => {
            html += `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${index + 1}. ${location.name}</strong>
                        <br>
                        <small class="text-muted">${location.region}</small>
                    </div>
                    <span class="badge badge-primary badge-pill">${location.assessment_count} assessments</span>
                </li>
            `;
        });
        html += '</ul>';

        $('#top-locations-list').html(html);
    }

    function showLocationDetail(id) {
        showLoader();

        $.get(`{{ route('admin.coordinates.show', ':id') }}`.replace(':id', id))
            .done(function(data) {
                $('#location-detail').html(data);
                $('#locationModal').modal('show');
                hideLoader();
            })
            .fail(function() {
                showAlert('error', 'Failed to load location details');
                hideLoader();
            });
    }

    // Refresh map every 30 seconds
    setInterval(loadMapData, 30000);
</script>
@endpush