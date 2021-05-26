<div class="table-responsive">
    <table class="table" id="karyawans-table">
        <thead>
            <tr>
                <th>Id Karyawan</th>
                <th>Nama</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->id_karyawan }}</td>
            <td>{{ $karyawan->nama }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['karyawans.destroy', $karyawan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('karyawans.show', [$karyawan->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('karyawans.edit', [$karyawan->id]) }}" class='btn btn-default btn-xs'>
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
