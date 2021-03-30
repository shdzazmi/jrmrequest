<div class="table-responsive">
    <table class="table" id="requestbarangs-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Kendaraan</th>
                <th>Part Number</th>
                <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requestbarangs as $requestbarang)
            <tr>
                <td>{{ $requestbarang->tanggal }}</td>
                <td>{{ $requestbarang->nama }}</td>
                <td>{{ $requestbarang->kendaraan }}</td>
                <td>{{ $requestbarang->part_number }}</td>
                <td>{{ $requestbarang->keterangan }}</td>
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
