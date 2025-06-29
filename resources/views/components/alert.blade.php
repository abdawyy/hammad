@props(['type', 'message'])

@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
