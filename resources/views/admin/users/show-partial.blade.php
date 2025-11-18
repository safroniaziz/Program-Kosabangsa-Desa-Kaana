<div class="user-detail">
    <div class="row">
        <div class="col-md-6">
            <h6 class="fw-bold mb-3">Informasi User</h6>
            <table class="table table-sm">
                <tr>
                    <th width="150">Nama</th>
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
                    <th>Email Verified</th>
                    <td>
                        @if($user->email_verified_at)
                            <span class="badge bg-success">Verified</span>
                            <small class="text-muted">({{ $user->email_verified_at->format('d/m/Y H:i') }})</small>
                        @else
                            <span class="badge bg-warning">Unverified</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Registered</th>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h6 class="fw-bold mb-3">Statistik Assessment</h6>
            <table class="table table-sm">
                <tr>
                    <th width="150">Total Assessment</th>
                    <td><strong>{{ $user->assessments->count() }}</strong></td>
                </tr>
                <tr>
                    <th>PTSD Assessment</th>
                    <td>{{ $user->assessments->where('assessment_type', 'ptsd')->count() }}</td>
                </tr>
                <tr>
                    <th>DCM Assessment</th>
                    <td>{{ $user->assessments->whereIn('assessment_type', ['dcm', 'checklist_masalah'])->count() }}</td>
                </tr>
                <tr>
                    <th>Completed</th>
                    <td>{{ $user->assessments->where('status', 'completed')->count() }}</td>
                </tr>
                @if($user->assessments->count() > 0)
                <tr>
                    <th>Last Assessment</th>
                    <td>{{ $user->assessments->sortByDesc('created_at')->first()->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>

