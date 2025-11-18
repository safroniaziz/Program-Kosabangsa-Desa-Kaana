<div class="row">
    <div class="col-md-6">
        <h5>PTSD Assessment Details</h5>
        <table class="table table-sm">
            <tr>
                <th width="150">User:</th>
                <td>{{ $assessment->user->name ?? 'N/A' }} ({{ $assessment->user->email ?? 'N/A' }})</td>
            </tr>
            <tr>
                <th>Assessment ID:</th>
                <td>#{{ $assessment->id }}</td>
            </tr>
            <tr>
                <th>Type:</th>
                <td><span class="badge badge-warning">PTSD</span></td>
            </tr>
            <tr>
                <th>Risk Level:</th>
                <td>
                    <span class="badge badge-{{ $assessment->risk_level == 'high' ? 'danger' : ($assessment->risk_level == 'medium' ? 'warning' : 'success') }}">
                        {{ ucfirst($assessment->risk_level) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Total Score:</th>
                <td>{{ $assessment->total_score ?? $assessment->pcl5_total_score ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Max Score:</th>
                <td>{{ $assessment->max_score ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{ ucfirst($assessment->status) }}</td>
            </tr>
            <tr>
                <th>Started:</th>
                <td>{{ $assessment->started_at ? $assessment->started_at->format('d M Y H:i:s') : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Completed:</th>
                <td>{{ $assessment->completed_at ? $assessment->completed_at->format('d M Y H:i:s') : 'N/A' }}</td>
            </tr>
            @if($assessment->coordinate)
            <tr>
                <th>Location:</th>
                <td>{{ $assessment->coordinate->name }}</td>
            </tr>
            @endif
        </table>

        @if($assessment->pcl5_severity)
        <h6 class="mt-3">PCL-5 Severity</h6>
        <div class="alert alert-{{ $assessment->pcl5_severity == 'high' ? 'danger' : ($assessment->pcl5_severity == 'moderate' ? 'warning' : 'info') }}">
            {{ ucfirst($assessment->pcl5_severity) }}
        </div>
        @endif
    </div>
    <div class="col-md-6">
        <h6>Responses</h6>
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Question</th>
                        <th width="80">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @if(is_array($answers))
                        @foreach($answers as $index => $answer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $answer['question'] ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $answer['score'] ?? 0 }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center text-muted">No answers recorded</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if(isset($assessment->results['interpretation']))
        <h6 class="mt-3">Interpretation</h6>
        <div class="alert alert-info">
            {{ $assessment->results['interpretation'] }}
        </div>
        @endif

        @if(isset($assessment->results['recommendations']) && is_array($assessment->results['recommendations']))
        <h6 class="mt-3">Recommendations</h6>
        <ul class="list-group">
            @foreach($assessment->results['recommendations'] as $recommendation)
                <li class="list-group-item">{{ $recommendation }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>