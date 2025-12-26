<div class="user-detail">
    <div class="row mb-4">
        <!-- Info User -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary py-3">
                    <h6 class="mb-0 text-white"><i class="fas fa-user me-2"></i>Informasi User</h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-0">
                        <tr>
                            <th width="140">Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge bg-danger">Admin</span>
                                @else
                                    <span class="badge bg-primary">User</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $user->gender === 'male' ? 'Laki-laki' : ($user->gender === 'female' ? 'Perempuan' : '-') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{ ucfirst($user->religion ?? '-') }}</td>
                        </tr>
                        <tr>
                            <th>Status Sosek</th>
                            <td>{{ str_replace('_', ' ', ucfirst($user->socioeconomic_status ?? '-')) }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan</th>
                            <td>{{ strtoupper(str_replace('_', ' ', $user->education_level ?? '-')) }}</td>
                        </tr>
                        <tr>
                            <th>Terdaftar</th>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Stats Assessment -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success py-3">
                    <h6 class="mb-0 text-white"><i class="fas fa-chart-bar me-2"></i>Statistik Assessment</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <h3 class="mb-0 text-primary">{{ $user->assessments->count() }}</h3>
                            <small class="text-muted">Total</small>
                        </div>
                        <div class="col-4">
                            <h3 class="mb-0 text-warning">{{ $user->assessments->where('assessment_type', 'ptsd')->count() }}</h3>
                            <small class="text-muted">PTSD</small>
                        </div>
                        <div class="col-4">
                            <h3 class="mb-0 text-info">{{ $user->assessments->whereIn('assessment_type', ['dcm', 'checklist_masalah'])->count() }}</h3>
                            <small class="text-muted">DCM</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-6">
                            <span class="badge bg-success fs-6">{{ $user->assessments->where('status', 'completed')->count() }}</span>
                            <small class="d-block text-muted">Selesai</small>
                        </div>
                        <div class="col-6">
                            <span class="badge bg-secondary fs-6">{{ $user->assessments->where('status', '!=', 'completed')->count() }}</span>
                            <small class="d-block text-muted">Pending</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Assessment -->
    @if($user->assessments->count() > 0)
    <div class="card">
        <div class="card-header bg-info py-3">
            <h6 class="mb-0 text-white"><i class="fas fa-clipboard-list me-2"></i>Daftar Assessment</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Skor</th>
                            <th>Risk Level</th>
                            <th>Tanggal</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->assessments->sortByDesc('created_at') as $assessment)
                        <tr>
                            <td>
                                @if($assessment->assessment_type === 'ptsd')
                                    <span class="badge bg-warning">PTSD</span>
                                @else
                                    <span class="badge bg-info">DCM</span>
                                @endif
                            </td>
                            <td>
                                @if($assessment->status === 'completed')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif($assessment->status === 'in_progress')
                                    <span class="badge bg-primary">Berlangsung</span>
                                @else
                                    <span class="badge bg-secondary">{{ $assessment->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if($assessment->total_score !== null)
                                    <strong>{{ $assessment->total_score }}</strong>/{{ $assessment->max_score ?? '-' }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @php
                                    $risk = $assessment->risk_level ?? ($assessment->results['risk_level'] ?? null);
                                @endphp
                                @if($risk === 'critical' || $risk === 'high')
                                    <span class="badge bg-danger">{{ ucfirst($risk) }}</span>
                                @elseif($risk === 'medium')
                                    <span class="badge bg-warning">Medium</span>
                                @elseif($risk)
                                    <span class="badge bg-success">{{ ucfirst($risk) }}</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $assessment->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <button class="btn btn-xs btn-outline-primary btn-toggle-answers" 
                                        data-assessment-id="{{ $assessment->id }}">
                                    <i class="fas fa-eye"></i> Jawaban
                                </button>
                            </td>
                        </tr>
                        <!-- Expandable Answers Row -->
                        <tr class="answers-row d-none" id="answers-{{ $assessment->id }}">
                            <td colspan="6" class="bg-light">
                                <div class="p-3">
                                    <h6 class="fw-bold mb-3">
                                        <i class="fas fa-list-check me-2"></i>Jawaban Assessment #{{ $assessment->id }}
                                    </h6>
                                    @php
                                        $answers = $assessment->userAnswers ?? collect();
                                    @endphp
                                    @if($answers->count() > 0)
                                        <div class="row">
                                            @foreach($answers->sortBy('question_number')->take(20) as $answer)
                                            <div class="col-md-3 col-6 mb-2">
                                                <span class="badge bg-secondary">Q{{ $answer->question_number }}</span>
                                                @if($answer->answer_value == 1)
                                                    <span class="badge bg-success">Ya</span>
                                                @elseif($answer->answer_value == 0)
                                                    <span class="badge bg-light text-dark">Tidak</span>
                                                @else
                                                    <span class="badge bg-info">{{ $answer->answer_value }}</span>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                        @if($answers->count() > 20)
                                            <small class="text-muted">+ {{ $answers->count() - 20 }} jawaban lainnya...</small>
                                        @endif
                                    @else
                                        <p class="text-muted mb-0">Belum ada jawaban terekam.</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        User ini belum pernah mengerjakan assessment.
    </div>
    @endif
</div>

<script>
document.querySelectorAll('.btn-toggle-answers').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var assessmentId = this.getAttribute('data-assessment-id');
        var row = document.getElementById('answers-' + assessmentId);
        if (row) {
            row.classList.toggle('d-none');
            var icon = this.querySelector('i');
            if (row.classList.contains('d-none')) {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    });
});
</script>
