@extends('layouts.app')
@section('title', 'Pencarian produk')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

@section('content')

    <div class="animate__animated animate__fadeIn preloader flex-column justify-content-center align-items-center">
        <img class="animate__animated animate__rubberBand animate__infinite" src="{{asset('storage/logo.png')}}" alt="AdminLTELogo" height="60" width="60">
        <h3>Memuat . . .</h3>
    </div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Pencarian Stok</h1>
                </div>
                <div class="col-sm" align="right">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

    </section>

    <div class="content px-3">
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1" id="tabHeader">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item" id="listHead">
                        <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fas fa-th-list"></i> List</a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-0 pt-2">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        @include('search_produk.tablesimple')
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
        });
    </script>
@endpush
