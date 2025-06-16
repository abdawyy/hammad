<table id="{{ $id }}" class="table" data-url="{{ $ajaxUrl }}">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column['title'] }}</th>
            @endforeach
        </tr>
    </thead>
</table>

@push('scripts')
<script>
$(function () {
    const table = $('#{{ $id }}');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: table.data('url'),
        columns: @json($columns)
    });
});
</script>
@endpush
