@extends('layouts.app')
@section('title', 'Service order SV'. $serviceOrder->id)
<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-10 offset-md-1">
                <div class="col-sm-6">
                    <h1>Service Order Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="col-sm-10 offset-md-1">
        <div class="content px-3">

            <div class="pb-2">
                <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-file-download"></i>
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if($serviceOrder->status == 'Approved' || Auth::user()->role == "Dev")
                            <a class="dropdown-item" href="javascript:void(0)" onclick="modal_exportservice()"><i class="fas fa-file-pdf" style="color: darkred;"></i> PDF</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('serviceOrders.export_excel',[$serviceOrder->uid]) }}"><i class="fas fa-file-excel" style="color: darkgreen;"></i> Excel</a>
                    </div>
                @if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head")
                    @if(substr($serviceOrder->no_penawaran, 0, 1) !== 'O')

                    @if($serviceOrder->status == 'Proses')
                        <a class="btn btn-outline-info float-right" href="{{ route('serviceOrders.edit', [$serviceOrder->id]) }}">
                    @else
                        <a class="btn btn-outline-info float-right disabled"  href="javascript:void(0)" onclick="toastError('Gagal', 'Order sudah Approved! tidak bisa edit')">
                    @endif
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    @endif
                @endif
            </div>

            <div class="card">
                <div class="card-header pt-4">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5><i class="fas fa-cog"></i> Jaya Raya Mobil</h5>
                            {!! Form::label('nama', 'Customer: ') !!}
                            {{ $serviceOrder->nama }} &nbsp
                            {!! Form::label('nama', 'Mobil: ') !!}
                            {{ $serviceOrder->mobil }} - {{ $serviceOrder->nopol }} &nbsp
                            {!! Form::label('tanggal', 'Tanggal:') !!}
                            {{ $serviceOrder->tanggal }} &nbsp
                            <br>
                            {!! Form::label('bongkar', 'Bongkar:') !!}
                            @if($serviceOrder->tanpabongkar == 0) <i class="fas fa-check-circle text-success"></i> @elseif($serviceOrder->tanpabongkar == 1) <i class="fas fa-times-circle text-danger"></i>  @endif  &nbsp
                            {!! Form::label('PPN', 'PPN:') !!}
                            @if($serviceOrder->ppn == 1) <i class="fas fa-check-circle text-success"></i> @elseif($serviceOrder->ppn == 0) <i class="fas fa-times-circle text-danger"></i>  @endif

                        </div>
                        <div class="col-sm-4 text-right">
                            @if($serviceOrder->status === "Proses")
                                <div class="badge badge-warning text-white text-md">
                                    {{ $serviceOrder->status }}
                                </div>
                            @endif
                            @if($serviceOrder->status === "Approved")
                                <div class="badge badge-success text-md">
                                    {{ $serviceOrder->status }}
                                </div>
                            @endif
                            @if($serviceOrder->status === "Batal")
                                <div class="badge badge-danger text-md">
                                    {{ $serviceOrder->status }}
                                </div>
                            @endif
                            <br>
                            {!! Form::label('id', 'No. Penawaran: ') !!}
                            {{ $serviceOrder->no_penawaran }} &nbsp
                        </div>
                    </div>

                </div>
                <div class="card-body p-0">
                    @include('service_orders.show_fields')
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::label('nama', 'Tgl Cetak: ') !!}
                            {{ $serviceOrder->operator }} - {{ $serviceOrder->created_at }}&nbsp
                            {!! Form::label('tanggal', 'Terakhir edit:') !!}
                            {{ $serviceOrder->updated_by }} - {{ $serviceOrder->updated_at }}&nbsp
                            @if($serviceOrder->times_updated != null)
                                ({{ $serviceOrder->times_updated }}x)
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Export pdf Modal -->
    <div class="modal fade" id="modal-export">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Export PDF</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <div class="row">
                        <div class="col-sm-12" style="text-align: center">
                            <h5>Pilih tampilan:</h5>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-app bg-secondary m-0" href="{{ route('serviceOrders.getPdf',[$serviceOrder->uid])}}"><i class="fas fa-file-invoice"></i> <h6>Detail</h6></a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-app bg-secondary m-0" href="{{ route('serviceOrders.getPdfSimple',[$serviceOrder->uid])}}"><i class="fas fa-file-alt"></i> <h6>Ringkas</h6></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@push('page_scripts')

    <script>

        function modal_exportservice() {
            $('#modal-export').modal('show');
        }

        function export_disabled(){
            Swal.fire(
                'Belum disetujui!',
                'Hubungi atasan untuk segera disetujui',
                'error'
            )
        }

    </script>

@endpush
