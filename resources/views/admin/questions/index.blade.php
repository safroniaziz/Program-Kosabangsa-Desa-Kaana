@extends('admin.layouts.app')

@section('title', 'Questions Management - Admin')

@section('content-title')
    <h1 class="m-0">Questions Management</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item active">Questions</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Questions Management</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-list-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">DCM Questions</span>
                                    <span class="info-box-number">{{ App\Models\ChecklistMasalahQuestion::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-brain"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">PTSD Questions</span>
                                    <span class="info-box-number">{{ App\Models\PTSDQuestion::count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 text-center">
                            <a href="{{ route('admin.questions.index') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-list-check"></i> Manage DCM Questions
                            </a>
                        </div>
                        <div class="col-md-6 text-center">
                            <a href="{{ route('admin.questions.ptsd.index') }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-brain"></i> Manage PTSD Questions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection