@props([
    'title' => '',
    'value' => 0,
    'icon' => 'ki-outline ki-abstract-28',
    'color' => 'primary',
    'trend' => null,
    'trendValue' => null,
    'percentage' => null,
    'description' => null
])

@php
    $colorClasses = [
        'primary' => 'bg-primary text-white',
        'success' => 'bg-success text-white',
        'warning' => 'bg-warning text-white',
        'danger' => 'bg-danger text-white',
        'info' => 'bg-info text-white',
        'dark' => 'bg-dark text-white'
    ];

    $bgColorClass = $colorClasses[$color] ?? $colorClasses['primary'];

    $iconContainerClasses = [
        'primary' => 'bg-light-primary text-primary',
        'success' => 'bg-light-success text-success',
        'warning' => 'bg-light-warning text-warning',
        'danger' => 'bg-light-danger text-danger',
        'info' => 'bg-light-info text-info',
        'dark' => 'bg-light-dark text-dark'
    ];

    $iconBgClass = $iconContainerClasses[$color] ?? $iconContainerClasses['primary'];
@endphp

<!--begin::Stats Card-->
<div class="card card-flush border-0 shadow-sm h-100">
    <div class="card-body p-6">
        <!--begin::Header-->
        <div class="d-flex align-items-center justify-content-between">
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <h3 class="fs-5 fw-bold text-gray-800 mb-1">{{ $title }}</h3>
                <!--end::Title-->

                <!--begin::Value-->
                <div class="d-flex align-items-center">
                    <span class="fs-2hx fw-bolder text-gray-800 me-2">{{ number_format($value) }}</span>

                    @if($trend && $trendValue)
                        <span class="badge badge-{{ $trend === 'up' ? 'success' : 'danger' }} fs-7 fw-bolder">
                            <i class="ki-outline ki-arrow-{{ $trend === 'up' ? 'up' : 'down' }} fs-5"></i>
                            {{ $trendValue }}%
                        </span>
                    @endif
                </div>
                <!--end::Value-->
            </div>
            <!--end::Info-->

            <!--begin::Icon-->
            <div class="symbol symbol-60px {{ $iconBgClass }} me-4">
                <i class="{{ $icon }} fs-2x"></i>
            </div>
            <!--end::Icon-->
        </div>
        <!--end::Header-->

        @if($description)
        <!--begin::Description-->
        <div class="mt-3">
            <span class="text-gray-600 fs-7 fw-semibold">{{ $description }}</span>
            @if($percentage !== null)
                <div class="progress h-5px mt-2">
                    <div class="progress-bar bg-{{ $color }}" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="text-gray-500 fs-8 mt-1">{{ $percentage }}%</span>
            @endif
        </div>
        <!--end::Description-->
        @endif
    </div>
</div>
<!--end::Stats Card-->