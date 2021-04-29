@extends('layouts.app')
@section('title', 'Sales order')

@section('content')

    <div class="col-md-10 offset-md-1" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sales Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right"
                           href="{{ route('salesOrders.create') }}">
                            Tambah baru
                        </a>
                    </div>
                    
                </div>
                <div class="alert alert-primary alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                        Ubah status Sales Order dengan cara klik Badge status, status hanya bisa diubah sekali.
                    </div>
            </div>
        </section>

        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>

            <div class="card card-outline card-primary">
                <div class="card-body">
                    @include('sales_orders.table')
                    <div class="card-footer clearfix float-right">
                        <div class="float-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

