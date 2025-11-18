<div class="row">
    <div class="col-md-6">
        <h5>{{ $coordinate->name }}</h5>
        <p class="text-muted mb-3">{{ $coordinate->full_address }}</p>

        <table class="table table-sm">
            <tr>
                <th width="150">Region:</th>
                <td>{{ $coordinate->region }}</td>
            </tr>
            <tr>
                <th>Latitude:</th>
                <td>{{ $coordinate->latitude }}</td>
            </tr>
            <tr>
                <th>Longitude:</th>
                <td>{{ $coordinate->longitude }}</td>
            </tr>
            <tr>
                <th>Total Assessments:</th>
                <td>{{ $coordinate->assessments_count }}</td>
            </tr>
            @if($coordinate->description)
            <tr>
                <th>Description:</th>
                <td>{{ $coordinate->description }}</td>
            </tr>
            @endif
            <tr>
                <th>Created:</th>
                <td>{{ $coordinate->created_at->format('d M Y H:i') }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ $coordinate->google_maps_url }}" target="_blank" class="btn btn-info btn-sm">
                <i class="fas fa-map"></i> View on Google Maps
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <h6>Recent Assessments</h6>
        @if($coordinate->assessments->count() > 0)
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Type</th>
                            <th>Risk</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coordinate->assessments->take(5) as $assessment)
                            <tr>
                                <td>{{ $assessment->user->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge badge-{{ $assessment->assessment_type == 'ptsd' ? 'warning' : 'info' }}">
                                        {{ strtoupper($assessment->assessment_type) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $assessment->risk_level == 'high' ? 'danger' : ($assessment->risk_level == 'medium' ? 'warning' : 'success') }}">
                                        {{ ucfirst($assessment->risk_level) }}
                                    </span>
                                </td>
                                <td>{{ $assessment->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($coordinate->assessments->count() > 5)
                <small class="text-muted">Showing 5 of {{ $coordinate->assessments->count() }} assessments</small>
            @endif
        @else
            <p class="text-muted">No assessments yet for this location.</p>
        @endif
    </div>
</div>