@extends('layouts.app')
@section('title', 'Sales order')
<style>

    #myBtn {
        top: 80px;
        border: none;
        outline: none;
        color: white;
        padding: 15px;
        border-radius: 50%;

        display: inline-block;
        background-color: #007afe;
        text-align: center;
        position: fixed;
        right: 45px;
        transition: background-color .3s,
        opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }
    #myBtn:active {
        background-color: #555;
    }
    #myBtn.show {
        opacity: 1;
        visibility: visible;
    }
    #myBtn::after {
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
    }
    #myBtn:hover {
        cursor: pointer;
        background-color: #509fff;
    }

</style>

@section('content')

    <div class="col-md-10 offset-md-1" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sales Orders</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a class="btn btn-outline-primary"
                           href="{{ route('salesOrders.index') }}">
                            <i class="fas fa-redo-alt"></i> Refresh
                        </a>
                        <a href="{{ route('salesOrder.dashboard_excel') }}" title="Export excel" class='btn btn-outline-primary'>
                            <i class="fas fa-file-download"></i>
                            Export
                        </a>
                        <a class="btn btn-primary"
                           href="{{ route('salesOrders.create') }}">
                            Tambah baru
                        </a>
                    </div>

                </div>
                <div class="alert alert-primary alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                        Ubah status Sales Order dengan cara klik Badge status, buat Sales Order baru dengan cara klik tombol Tambah Baru.
                    </div>
            </div>
        </section>

        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>

            <div class="card card-outline card-primary">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fas fa-cog"></i> JRMPortal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fas fa-dollar-sign"></i> Affari</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            @include('sales_orders.table')
                            <div class="card-footer clearfix float-right"><div class="float-right"></div></div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            @include('sales_orders.table_affari')
                            <div class="card-footer clearfix float-right"><div class="float-right"></div></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <a href="{{route('salesOrders.index')}}" id="myBtn" title="Refresh"><i class="fas fa-redo-alt"></i></a>

@endsection
@push('page_scripts')
    <script>
        //Get the button
        var mybutton = $('#myBtn');

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                mybutton.addClass('show');
            } else {
                mybutton.removeClass('show');
            }
        }
    </script>
@endpush
