
<div class="table-responsive">
    <table class="table dataTable display" id="tbRequestSum">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Operator</th>
                <th>Status</th>
                <th>Approver</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requestbarangs as $requestbarang)

            <tr>
                <td>{{$requestbarang->tanggal}}</td>
                <td>
                    {{$requestbarang->nama}} @if($requestbarang->kendaraan != "") - {{$requestbarang->kendaraan}} @endif<br>
                    <span class="badge badge-pill badge-primary">{{$requestbarang->barcode}}</span>
                    <span class="badge badge-pill badge-primary">{{$requestbarang->kd_supplier}}</span>
                    @if($requestbarang->partno1 != "") <br/>PN: {{$requestbarang->partno1 }} @endif
                </td>
                <td>{{$requestbarang->keterangan}}</td>
                <td>
                    {{$requestbarang->user}}
                    <i class="fas fa-check-circle text-green" data-toggle="tooltip" title="Konfirmasi: {{$requestbarang->approve_request}}"></i>
                </td>
                <td>
                    @if($requestbarang->status=='Proses') <span class="badge badge-pill badge-warning text-white">Proses</span>
                    @elseif($requestbarang->status=='Requested') <span class="badge badge-pill badge-info">Requested</span>
                    @elseif($requestbarang->status=='Approved') <span class="badge badge-pill badge-primary">Approved</span>
                    @elseif($requestbarang->status=='Done') <span class="badge badge-pill badge-success">Done</span>
                    @endif
                </td>
                <td>{{$requestbarang->approve_purchase}}</td>
                <td>
                    @if(Auth::user()->divisi == 'Purchasing')
                        @if($requestbarang->status=='Approved')
                            <a href="{{route('requestbarang.request_done', [$requestbarang->id])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Done </a>
                        @endif
                    @endif
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
            $table = $('#tbRequestSum').DataTable({
                select: true,
                order: [[0, "desc"]],
                autoWidth: false,
                pageLength: 50,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                    emptyTable: "Tidak ada request yang telah disetujui"
                },
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'user', name: 'user'},
                    {data: 'status', name: 'status'},
                    {data: 'approve_purchase', name: 'approve_purchase'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
