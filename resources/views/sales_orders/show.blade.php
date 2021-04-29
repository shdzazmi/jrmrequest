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
            <a class="btn btn-default" href="{{ route('salesOrders.index') }}">Back</a>
            <a class="btn btn-danger" href="{{ route('salesOrder.getPdf',[$salesOrder->id]) }}">Download PDF</a>
            <a class="btn btn-info" href="{{ route('salesOrder.export_excel',[$salesOrder->id]) }}">Download Excel</a>
            </div>
            <div class="position-relative" style="height: 180px">
                <div class="ribbon-wrapper ribbon-lg">
                @if($salesOrder->status === "Proses")
                    <div class="ribbon bg-warning text-lg">
                        {{ $salesOrder->status }}
                    </div>
                @endif
                @if($salesOrder->status === "Selesai")
                    <div class="ribbon bg-success text-lg">
                        {{ $salesOrder->status }}
                    </div>
                @endif
                @if($salesOrder->status === "Batal")
                    <div class="ribbon bg-danger text-lg">
                        {{ $salesOrder->status }}
                    </div>
                @endif
                @if($salesOrder->status === "Void")
                    <div class="ribbon bg-secondary text-lg">
                        {{ $salesOrder->status }}
                    </div>
                @endif
                </div>
                        
                <div class="card">
                    <div class="card-header pt-4">
                        <h4><i class="fas fa-file-invoice-dollar" style="color: dark;"></i> SO{{ $salesOrder->id }}</h4>
                        {!! Form::label('nama', 'Nama: ') !!}
                        {{ $salesOrder->nama }} &nbsp
                        {!! Form::label('tanggal', 'Tanggal:') !!}
                        {{ $salesOrder->tanggal }} &nbsp
                    </div>
                    <div class="card-body p-0">
                        @include('sales_orders.show_fields')
                    </div>
                    <div class="card-footer">
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
