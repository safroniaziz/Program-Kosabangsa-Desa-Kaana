<div class="assessment-history">
    <div class="mb-3">
        <h5 class="mb-2">
            Riwayat Assessment 
            @if($type === 'ptsd')
                <span class="badge bg-primary text-white">PTSD</span>
            @elseif($type === 'dcm' || $type === 'checklist_masalah')
                <span class="badge bg-purple text-white">DCM</span>
            @endif
        </h5>
        @if($assessments->count() > 0)
            <p class="text-muted small">Total: {{ $assessments->count() }} assessment</p>
        @endif
    </div>

    @if($assessments->count() > 0)
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-sm table-bordered table-hover">
                <thead class="thead-light sticky-top">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assessments as $index => $assessment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $assessment->completed_at ? $assessment->completed_at->format('d/m/Y H:i') : $assessment->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Belum ada riwayat assessment untuk user ini.
        </div>
    @endif
</div>

