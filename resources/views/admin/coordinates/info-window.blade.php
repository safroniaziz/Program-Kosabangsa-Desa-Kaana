<div class="custom-popup">
    <h6 class="mb-2">{{ $coordinate->name }}</h6>
    <p class="mb-1"><small><i class="fas fa-map-marker-alt"></i> {{ $coordinate->address ?: 'No address' }}</small></p>
    <p class="mb-1"><small><i class="fas fa-globe"></i> {{ $coordinate->region }}</small></p>
    <p class="mb-0"><small><i class="fas fa-clipboard-list"></i> {{ $coordinate->assessments_count }} assessment(s)</small></p>
    @if($coordinate->description)
        <hr class="my-2">
        <p class="mb-0"><small>{{ $coordinate->description }}</small></p>
    @endif
</div>