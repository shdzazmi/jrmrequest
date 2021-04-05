<div class="table-responsive">
    <table class="table dataTable table-striped" id="tbRequest">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Part number</th>
                <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requestbarangs as $requestbarang)
            <tr>
                <td>{{ $requestbarang->tanggal}}</td>
                <td>{{ $requestbarang->nama}}<br/><span class="badge bg-secondary">{{ $requestbarang->barcode }}</span></td>
                <td>{{ $requestbarang->kd_supplier}}</td>
                <td>{{ $requestbarang->kendaraan}}</td>
                <td>{{ $requestbarang->part_number}}</td>
                <td>{{ $requestbarang->keterangan}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['requestbarangs.destroy', $requestbarang->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requestbarangs.show', [$requestbarang->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('requestbarangs.edit', [$requestbarang->id]) }}" class='btn btn-default btn-xs'>
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
            $('#tbRequest').DataTable({
                select: true,
                oSearch: {"sSearch": "{{$nama}}"},
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'kd_supplier', name: 'kd_supplier'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'part_number', name: 'part_number'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
        });

    </script>
@endpush
