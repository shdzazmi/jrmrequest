<style>

</style>

<div class="table-responsive">
    <table class="table dataTable display" id="tbRequest">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Operator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requestbarangs as $requestbarang)
                {!! Form::open(['route' => ['requestbarangs.destroy', $requestbarang->id], 'method' => 'delete']) !!}

                <tr>
                    <td>{{$requestbarang->tanggal}}</td>
                    <td>
                        {{$requestbarang->nama}} @if($requestbarang->kendaraan != "") - {{$requestbarang->kendaraan}} @endif<br>
                        <span class="badge badge-pill badge-primary">{{$requestbarang->barcode}}</span>
                        <span class="badge badge-pill badge-primary">{{$requestbarang->kd_supplier}}</span>
                        @if($requestbarang->partno1 != "") <br/>PN: {{$requestbarang->partno1 }} @endif
                    </td>
                    <td>{{$requestbarang->keterangan}}</td>
                    <td>{{$requestbarang->user}}</td>
                    <td>
                        @if($requestbarang->status=='Proses') <span class="badge badge-pill badge-warning text-white">Proses</span>
                        @elseif($requestbarang->status=='Requested') <span class="badge badge-pill badge-info">Requested</span>
                        @elseif($requestbarang->status=='Approved') <span class="badge badge-pill badge-primary">Approved</span>
                        @elseif($requestbarang->status=='Done') <span class="badge badge-pill badge-success">Done</span>
                        @endif
                    </td>
                    <td>
                        @if(Auth::user()->role == 'Head')
                            @if($requestbarang->status=='Proses')
                                <a href="{{route('requestbarang.approve_request', [$requestbarang->id])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Konfirmasi </a><br>
                            @elseif($requestbarang->status=='Requested')
                                <a href="{{route('requestbarang.approve_request', [$requestbarang->id])}}" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a><br>
                            @endif
                        @endif
                        @if($requestbarang->status == "Proses")
                        <div class='btn-group'>
                            <a href="{{ route('requestbarangs.show', [$requestbarang->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head")
                                <a href="{{ route('salesOrders.edit', [$requestbarang->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            @endif
                        </div>
                        @endif

                    </td>
                </tr>
                {!! Form::close() !!}

            @endforeach
        </tbody>
    </table>
</div>

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            const table = $('#tbRequest').DataTable({
                select: true,
                pageLength: 50,
                order: [[0, "desc"]],
                autoWidth: false,
                oSearch: {"sSearch": "{{$nama}}"},
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'user', name: 'user'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                }
            });
        })

    </script>
@endpush
