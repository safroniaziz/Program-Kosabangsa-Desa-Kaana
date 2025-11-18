<div class="row">
    <div class="col-md-6">
        <h5>DCM Assessment Details</h5>
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
                <td><span class="badge badge-info">DCM</span></td>
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
                <td>{{ $assessment->total_score ?? 'N/A' }}</td>
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
        </table>
    </div>
    <div class="col-md-6">
        <h6>Category Responses</h6>
        @if(is_array($answers))
            @foreach($answers as $category => $questions)
                <h6 class="text-uppercase mt-3">{{ str_replace('_', ' ', $category) }}</h6>
                <div class="table-responsive" style="max-height: 200px; overflow-y: auto;">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Question</th>
                                <th width="80">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $index => $question)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $question['text'] ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge badge-{{ $question['answer'] == 'yes' ? 'danger' : 'success' }}">
                                            {{ ucfirst($question['answer'] ?? 'N/A') }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                No answers recorded
            </div>
        @endif

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
