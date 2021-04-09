@extends('layouts.app')

@section('content')

    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h5>Create Sales Order</h5>
                    </div>
            </div>
        </section>
    </div>

    <div class = "row">
        {{--Kolom kiri--}}
        <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="content px-3">
                @include('adminlte-templates::common.errors')
                {!! Form::open(['route' => 'salesOrders.store']) !!}
                @include('sales_orders.fields')

            </div>

        </div>

        {{--Kolom kanan--}}
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            <div class="content px-3">
                @include('sales_orders.list_order')
                {!! Form::submit('Checkout', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                <a href="{{ route('salesOrders.index') }}" class="btn btn-default btn-lg btn-block">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>

@endsection
@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        function getTotalPrice() {
            var total = 0;
            $(".harga").each(function () { // or $(".total_price") if given a class
                var val = $(this).text();
                total += isNaN(val) || $.trim(val) == "" ? 0 : parseFloat(val); // or parseInt(val,10);
            });
            $("#total-text").text(total); // or (total) if an int
        }
    </script>


@endpush
