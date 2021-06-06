<div class="table-responsive">
    <table class="table dataTable display" id="serviceOrders-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($serviceOrders as $serviceOrder)
            <tr>
                <td>{{ $serviceOrder->id }}</td>
                <td>{{ $serviceOrder->nama }}</td>
                <td>{{ $serviceOrder->tanggal }}</td>
                <td>{{ $serviceOrder->operator }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['serviceOrders.destroy', $serviceOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('serviceOrders.show', [$serviceOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('serviceOrders.edit', [$serviceOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function() {
            const table = $('#serviceOrders-table').DataTable({
                select: true,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                },
                columns: [
                    {data: 'no', name: 'no'},
                    {data: 'nama', name: 'nama'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'operator', name: 'operator'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[0, "desc"]],
            });
        });

    </script>
@endpush
