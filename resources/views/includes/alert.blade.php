
@if ($alert = session()->pull('alert'))

    {{-- <div class="alert alert-success mb-0 rounded-0 text-center small py-2" role="alert">
        A simple warning alert—check it out!
    </div> --}}

    <div class="alert custom-alert alert-warning alert-dismissible fade show mb-0 text-center" role="alert">
        <strong>Holy guacamole!</strong> <span>{{ $alert  }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
@endif

