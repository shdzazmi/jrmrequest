@extends('layouts.app')
@section('title', 'Service order')
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
                <a class="btn btn-default" href="{{ route('serviceOrders.index') }}">Back</a>
                <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-download"></i>
                    Export
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('serviceOrders.getPdf',[$serviceOrder->uid]) }}"><i class="fas fa-file-pdf" style="color: darkred;"></i> PDF</a>
                </div>
                @if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev")
                    <a class="btn btn-outline-info float-right" href="{{ route('serviceOrders.edit', [$serviceOrder->id]) }}">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                @endif
            </div>
            <div class="position-relative" style="height: 180px">

                <div class="card">
                    <div class="card-header pt-4">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5><i class="fas fa-cog"></i> Jaya Raya Mobil</h5>
                                {!! Form::label('nama', 'Customer: ') !!}
                                {{ $serviceOrder->nama }} &nbsp
                                {!! Form::label('tanggal', 'Tanggal:') !!}
                                {{ $serviceOrder->tanggal }} &nbsp
                            </div>
                            <div class="col text-right">
                                {!! Form::label('id', 'No. Order: ') !!}
                                SV{{ $serviceOrder->id }} &nbsp
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @include('service_orders.show_fields')
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
