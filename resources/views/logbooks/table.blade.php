<div class="table-responsive">
    <table class="table" id="logbooks-table">
        <thead>
            <tr>
                <th>Id Karyawan</th>
        <th>Nama</th>
        <th>Waktu</th>
        <th>Status</th>
        <th>Keterangan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($logbooks as $logbook)
            <tr>
                <td>{{ $logbook->id_karyawan }}</td>
                <td>{{ $karyawan->firstWhere('id_karyawan', $logbook->id_karyawan)->nama }}</td>
                <td>{{ $logbook->waktu }}</td>
                <td>{{ $logbook->status }}</td>
                <td>{{ $logbook->keterangan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['logbooks.destroy', $logbook->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('logbooks.show', [$logbook->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('logbooks.edit', [$logbook->id]) }}" class='btn btn-default btn-xs'>
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
