@extends('layouts.app')
@section('title', 'Ubah sales order')

@section('content')

    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-12">
                        <h5>Edit Sales Order</h5>
                    </div>
            </div>
        </section>
    </div>

    <div class = "col-sm-12">
        @include('adminlte-templates::common.errors')
    </div>

    <div class = "row">
        <div class = "col-sm-3">
            <div class="content px-3">
                @include('sales_orders.fields')
                <button class="btn btn-primary btn-block" onclick="uploadSalesOrder()">Check out</button>
                <a href="{{ route('salesOrders.index') }}" class="btn btn-default btn-outline btn-block">Cancel</a>
            </div>
        </div>
        <div class = "col-sm-9">
            <div class="content pr-3">
                @include('sales_orders.list_order')
            </div>
        </div>
    </div>

    <div class = "row">
        <div class="col-sm-12">
            <div class="content px-3" style="height: 300px">
                @include('sales_orders.table_produk')
            </div>
        </div>
    </div>
@endsection

