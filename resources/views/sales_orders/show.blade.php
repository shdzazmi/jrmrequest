@extends('layouts.app')
@section('title', 'Sales order')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-10 offset-md-1">
                <div class="col-sm-6">
                    <h1>Sales Order Details</h1>
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
                    <a class="dropdown-item" href="{{ route('salesOrder.getPdf',[$salesOrder->uid]) }}"><i class="fas fa-file-pdf" style="color: darkred;"></i> PDF</a>
                    <a class="dropdown-item" href="{{ route('salesOrder.export_excel',[$salesOrder->uid]) }}"><i class="fas fa-file-excel" style="color: darkgreen;"></i> Excel</a>
                </div>
                @if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head")
                    @if(substr($salesOrder->uid, 0, 1) !== 'S')
                        <a class="btn btn-outline-info float-right" href="{{ route('salesOrders.edit', [$salesOrder->id]) }}">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                    @endif
                @endif
            </div>
            <div class="position-relative" style="height: 180px">

                <div class="card">
                    <div class="card-header pt-4">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h5><i class="fas fa-cog"></i> Jaya Raya Mobil</h5>
                                    {!! Form::label('nama', 'Customer: ') !!}
                                    {{ $salesOrder->nama }} &nbsp
                                    {!! Form::label('tanggal', 'Tanggal:') !!}
                                    {{ $salesOrder->tanggal }} &nbsp
                                </div>
                                <div class="col text-right">
                                    @if($salesOrder->status === "Proses")
                                        <div class="badge badge-warning text-white text-md">
                                            {{ $salesOrder->status }}
                                        </div>
                                    @endif
                                    @if($salesOrder->status === "Selesai")
                                        <div class="badge badge-success text-md">
                                            {{ $salesOrder->status }}
                                        </div>
                                    @endif
                                    @if($salesOrder->status === "Batal")
                                        <div class="badge badge-danger text-md">
                                            {{ $salesOrder->status }}
                                        </div>
                                    @endif
                                    @if($salesOrder->status === "Void")
                                        <div class="badge badge-secondary text-md">
                                            {{ $salesOrder->status }}
                                        </div>
                                    @endif
                                    <br>
                                    {!! Form::label('id', 'No. Order: ') !!}
                                    @if(substr($salesOrder->uid, 0, 1) === 'S')
                                        {{$salesOrder->uid}}
                                    @else
                                        SO{{ $salesOrder->id }} &nbsp
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="card-body p-0">
                        @include('sales_orders.show_fields')
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

@push('page_scripts')

    <script>



    </script>

@endpush
