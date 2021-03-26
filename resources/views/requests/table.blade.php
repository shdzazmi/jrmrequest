<div class="table-responsive">
    <table class="table" id="requests-table">
        <thead>
            <tr>
                <th>Tanggal</th>
        <th>Nama Produk</th>
        <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->tanggal }}</td>
            <td>{{ $request->nama_produk }}</td>
            <td>{{ $request->keterangan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['requests.destroy', $request->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requests.show', [$request->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('requests.edit', [$request->id]) }}" class='btn btn-default btn-xs'>
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
