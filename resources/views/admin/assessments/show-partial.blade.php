<div class="assessment-detail">
    <div class="row">
        <div class="col-md-6">
            <h6 class="text-muted mb-2">User Information</h6>
            <p><strong>Name:</strong> {{ $assessment->user->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $assessment->user->email ?? 'N/A' }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="text-muted mb-2">Assessment Information</h6>
            <p><strong>Type:</strong> 
                @if($assessment->assessment_type === 'ptsd')
                    <span class="badge bg-info text-white">PTSD</span>
                @elseif($assessment->assessment_type === 'checklist_masalah' || $assessment->assessment_type === 'dcm')
                    <span class="badge bg-purple text-white">DCM</span>
                @else
                    <span class="badge bg-secondary text-white">{{ strtoupper($assessment->assessment_type) }}</span>
                @endif
            </p>
            <p><strong>Risk Level:</strong> 
                @if($assessment->risk_level === 'low')
                    <span class="badge bg-success text-white">Low</span>
                @elseif($assessment->risk_level === 'medium')
                    <span class="badge bg-orange text-white">Medium</span>
                @elseif($assessment->risk_level === 'high')
                    <span class="badge bg-danger text-white">High</span>
                @else
                    <span class="badge bg-secondary text-white">{{ ucfirst($assessment->risk_level ?? 'N/A') }}</span>
                @endif
            </p>
            <p><strong>Total Score:</strong> {{ $assessment->total_score ?? 0 }}</p>
            <p><strong>Date:</strong> {{ $assessment->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
    
    @if($assessment->answers)
    <div class="row mt-4">
        <div class="col-12">
            <h6 class="text-muted mb-3">Assessment Answers</h6>
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(json_decode($assessment->answers, true) ?? [] as $questionId => $answer)
                        <tr>
                            <td>Question {{ $questionId }}</td>
                            <td>{{ $answer }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

