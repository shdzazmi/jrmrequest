<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<div class="table-responsive">
    <table class="table dataTable display" id="serviceOrders-table">
        <thead>
            <tr>
                <th>id</th>
                <th>No. Penawaran</th>
                <th>Outlet</th>
                <th>Nama</th>
                <th>Mobil</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th class="text-center">Status</th>
                <th class="text-center">Approval</th>
                <th class="text-center" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($serviceOrders as $serviceOrder)
            <tr>
                <td style="vertical-align: middle">{{ $serviceOrder->id }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->no_penawaran }}</td>
                <td style="vertical-align: middle">
                    @if($serviceOrder->outlet == "JRM")
                        <i class="fas fa-store text-red"></i> {{ $serviceOrder->outlet }}
                    @else
                        <i class="fas fa-warehouse text-blue"></i> {{ $serviceOrder->outlet }}
                    @endif
                </td>
                <td style="vertical-align: middle">{{ $serviceOrder->nama }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->mobil }} - {{ $serviceOrder->nopol }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->tanggal }}</td>
                <td style="vertical-align: middle">{{ $serviceOrder->operator }}</td>
                <td style="vertical-align: middle" class="text-center">
                    @if( $serviceOrder->status== 'Proses')
                        <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $serviceOrder->status }}</a>
                        @if(Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route("serviceOrders.editStatus", [$serviceOrder->id, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
                            </div>
                        @endif
                    @elseif( $serviceOrder->status== 'Approved')
                        <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $serviceOrder->status }}</a>
                        @if(Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route("serviceOrders.editStatus", [$serviceOrder->id, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
                            </div>
                        @endif
                    @elseif( $serviceOrder->status== 'Batal')
                        <a href="javascript:void(0)" class="badge badge-pill badge-danger">{{ $serviceOrder->status }}</a>
                    @endif
                </td>
                <td style="vertical-align: middle" class="text-center">
                    @if($serviceOrder->approve_produk != 'false')
                        <span class="badge badge-pill badge-success mb-1"><i class="fas fa-check"></i> Sparepart</span><br>
                    @else
                        <span class="badge badge-pill badge-warning text-white mb-1">Sparepart</span><br>
                    @endif
                    @if($serviceOrder->approve_service != 'false')
                        <span class="badge badge-pill badge-success mb-1"><i class="fas fa-check"></i> Service</span>
                    @else
                        <span class="badge badge-pill badge-warning text-white mb-1">Service</span><br>
                    @endif
                </td>
                <td style="vertical-align: middle" class="text-center" width="120">
                    {!! Form::open(['route' => ['serviceOrders.destroy', $serviceOrder->id], 'method' => 'delete']) !!}
                    @if($serviceOrder->status != 'Approved')
                        @if(Auth::user()->role=="Master")
                            @if(Auth::user()->divisi == 'Sparepart')
                                @if($serviceOrder->approve_produk == 'false')
                                    <a href="{{route('serviceOrders.approve', [$serviceOrder->id])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                                @else
                                    <a href="{{route('serviceOrders.approve', [$serviceOrder->id])}}" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a>
                                @endif
                            @elseif(Auth::user()->divisi == 'Service')
                                @if($serviceOrder->approve_service == 'false')
                                    <a href="{{route('serviceOrders.approve', [$serviceOrder->id])}}" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                                @else
                                    <a href="{{route('serviceOrders.approve', [$serviceOrder->id])}}" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a>
                                @endif
                            @endif
                        @endif
                    @endif
                    <div class='btn-group'>
                        <a href="{{ route('serviceOrders.show', [$serviceOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @if($serviceOrder->status != 'Approved')
                            <a href="{{ route('serviceOrders.edit', [$serviceOrder->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                        @endif
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
            const table = $('#serviceOrders-table').DataTable({
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
                    {data: 'outlet', name: 'outlet'},
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
                    $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
                },
            });
        });

    </script>
@endpush
