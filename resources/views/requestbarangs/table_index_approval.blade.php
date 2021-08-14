
<div class="table-responsive">
    <table class="table dataTable display" id="tbRequestApproval">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Direquest oleh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requestbarangs as $requestbarang)
                @php
                    $produk = $produks->firstWhere('barcode', $requestbarang->barcode)
                @endphp
                <tr>
                    <td>{{$requestbarang->tanggal}}</td>
                    <td>
                        {{$requestbarang->nama}} @if($requestbarang->kendaraan != "") - {{$requestbarang->kendaraan}} @endif<br>
                        <span class="badge badge-pill badge-primary">{{$requestbarang->barcode}}</span>
                        <span class="badge badge-pill badge-primary">{{$requestbarang->kd_supplier}}</span>
                        @if($requestbarang->partno1 != "")
                            <br/>PN: {{$requestbarang->partno1 }}
                        @endif
                        @if($produk->qty!='')
                            <br>Stok: {{$produk->qty}}
                        @endif
                    </td>
                    <td>{{$requestbarang->keterangan}}</td>
                    <td>
                        {{$requestbarang->user}}
                        <i class="fas fa-check-circle text-green" data-toggle="tooltip" title="Konfirmasi: {{$requestbarang->approve_request}}"></i>
                    </td>
                    <td>
                        @if(Auth::user()->divisi == 'Purchasing')
                            @if($requestbarang->status=='Requested')
                                <a href="{{route('requestbarang.approve_purchase', [$requestbarang->id])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a><br>
                            @else
                                <a href="{{route('requestbarang.approve_purchase', [$requestbarang->id])}}" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a><br>
                            @endif
                        @endif
                        <div class='btn-group'>
                            <a href="{{ route('requestbarangs.show', [$requestbarang->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
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
            $table = $('#tbRequestApproval').DataTable({
                select: true,
                order: [[0, "desc"]],
                autoWidth: false,
                pageLength: 50,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                    emptyTable: "Tidak ada request barang saat ini"
                },
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'operator', name: 'operator'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
