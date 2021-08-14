<style>
    #serviceOrders-table{
        display:none;
    }
</style>
<div class="table-responsive">
    <table class="table dataTable display" id="serviceOrders-table">
        <thead>
            <tr>
                <th>id</th>
                <th>No. Penawaran</th>
                <th>Nama</th>
                <th>Mobil</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th>Status</th>
                <th>Approval</th>
                <th class="text-center" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($serviceOrders as $serviceOrder)
            @php
                $status = $serviceOrdersStatus->firstWhere('no_penawaran', $serviceOrder->uid)
            @endphp
            <tr>
                <td style="vertical-align: middle">{{ $serviceOrder->id }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->uid }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->nama }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->mobil }} - {{ $serviceOrder->nopol }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->tanggal }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->operator }}</td>
                <td style="vertical-align: middle" class="text-center">
                    @if(isset($status->status))
                        @if( $status->status== 'Proses')
                            <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status->status }}</a>
                            @if(Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route("serviceOrders.editStatusAffari", [$serviceOrder->uid, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
                                </div>
                            @endif
                        @elseif( $status->status== 'Approved')
                            <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status->status }}</a>
                            @if(Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route("serviceOrders.editStatusAffari", [$serviceOrder->uid, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
                                </div>
                            @endif
                        @elseif( $status->status== 'Batal')
                            <a href="javascript:void(0)" class="badge badge-pill badge-danger">{{ $status->status }}</a>
                        @else
                            <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status->status }}</a>
                            @if(Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route("serviceOrders.editStatusAffari", [$serviceOrder->uid, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
                                </div>
                            @endif
                        @endif
                    @else
                        <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proses</a>
                        @if(Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route("serviceOrders.editStatusAffari", [$serviceOrder->uid, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
                            </div>
                        @endif
                    @endif

                </td>
                <td style="vertical-align: middle" class="text-center">
                    @if(isset($status->approve_produk))
                        @if($status->approve_produk != 'false')
                            <span class="badge badge-pill badge-success mb-1"><i class="fas fa-check"></i> Sparepart</span><br>
                        @else
                            <span class="badge badge-pill badge-warning text-white mb-1">Sparepart</span><br>
                        @endif
                    @else
                        <span class="badge badge-pill badge-warning text-white mb-1">Sparepart</span><br>
                    @endif
                    @if(isset($status->approve_produk))
                        @if($status->approve_service != 'false')
                            <span class="badge badge-pill badge-success mb-1"><i class="fas fa-check"></i> Service</span>
                        @else
                            <span class="badge badge-pill badge-warning text-white mb-1">Service</span><br>
                        @endif
                    @else
                        <span class="badge badge-pill badge-warning text-white mb-1">Service</span><br>
                    @endif
                </td>
                <td style="vertical-align: middle" class="text-center" width="120">
                    @if(isset($status->status))
                        @if($status->status != 'Approved')
                            @if(Auth::user()->role=="Master")
                                @if(Auth::user()->divisi == 'Sparepart')
                                    @if($status->approve_produk == 'false')
                                        <a href="{{route('serviceOrders.approveAffari', [$serviceOrder->uid])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                                    @else
                                        <a href="{{route('serviceOrders.approveAffari', [$serviceOrder->uid])}}" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a>
                                    @endif
                                @elseif(Auth::user()->divisi == 'Service')
                                    @if($status->approve_service == 'false')
                                        <a href="{{route('serviceOrders.approveAffari', [$serviceOrder->uid])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                                    @else
                                        <a href="{{route('serviceOrders.approveAffari', [$serviceOrder->uid])}}" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @else
                        <a href="{{route('serviceOrders.approveAffari', [$serviceOrder->uid])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                    @endif
                    <div class='btn-group'>
                        <a href="{{ route('serviceOrders.showaffari', [$serviceOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i> Show
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
            let table = $('#serviceOrders-table').DataTable({
                select: true,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                },
                columns: [
                    {data: 'no', name: 'no'},
                    {data: 'no_penawaran', name: 'no_penawaran'},
                    {data: 'nama', name: 'nama'},
                    {data: 'mobil', name: 'mobil'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'operator', name: 'operator'},
                    {data: 'status', name: 'status'},
                    {data: 'approval', name: 'approval'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[0, "desc"]],
                columnDefs: [
                    {
                        targets: [ 0 ],
                        visible: false,
                    }
                ],
                initComplete: function () {
                    $("#serviceOrders-table").show();
                    $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
                }
            });
        });

    </script>
@endpush
