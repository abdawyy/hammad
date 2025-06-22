<table id="{{ $id }}" class="table" data-url="{{ $ajaxUrl }}">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column['title'] }}</th>
            @endforeach
        </tr>
    </thead>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
$('#admin-table').on('error.dt', function (e, settings, techNote, message) {
    console.log('DataTables error:', message);
});

</script>
