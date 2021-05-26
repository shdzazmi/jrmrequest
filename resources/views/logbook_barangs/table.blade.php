<div class="table-responsive">
    <table class="table dataTable display" id="logbookBarangs-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Driver</th>
                <th>Plat</th>
                <th>Tujuan</th>
                <th>Barcode</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($logbookBarangs as $logbookBarang)
            <tr>
                <td>{{ $logbookBarang->tanggal }}</td>
                <td>{{ $logbookBarang->nama }}</td>
                <td>{{ $logbookBarang->driver }}</td>
                <td>{{ $logbookBarang->plat }}</td>
                <td>{{ $logbookBarang->tujuan }}</td>
                <td>{{ $logbookBarang->barcode }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['logbookBarangs.destroy', $logbookBarang->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('logbookBarangs.show', [$logbookBarang->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('logbookBarangs.edit', [$logbookBarang->id]) }}" class='btn btn-default btn-xs'>
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
            const table = $('#logbookBarangs-table').DataTable({
                select: true,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                }
            });
        });
    </script>
@endpush
