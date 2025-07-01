@props([
    'editRoute',
    'deleteRoute',
    'modelId',
    'confirmMessage' => 'Are you sure?'
])

<a href="{{ route($editRoute, $modelId) }}" class="btn btn-sm btn-warning me-1">
    {{ __('Edit') }}
</a>

<form action="{{ route($deleteRoute, $modelId) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('{{ $confirmMessage }}')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">{{ __('active') }}</button>
</form>
