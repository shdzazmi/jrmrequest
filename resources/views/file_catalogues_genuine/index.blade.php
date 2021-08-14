@extends('layouts.app')
@section('title', 'Pencarian katalog genuine')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Pencarian Katalog Genuine</h1>
                </div>
                <div class="col-sm" align="right">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

    </section>

    <div class="content px-3 pb-3">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#daihatsu" role="tab">Daihatsu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#ford" role="tab">Ford</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#hino" role="tab">Hino</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#honda" role="tab">Honda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#isuzu" role="tab">Isuzu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#mitsubishi" role="tab">Mitsubishi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#suzuki" role="tab">Suzuki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#toyota" role="tab">Toyota</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" align="center" id="index" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <img src="{{asset('storage/catalogue.png')}}" alt="catalogue" width="600">
                    </div>
                    <div class="tab-pane fade" id="daihatsu" role="tabpanel">
                        @include('file_catalogues_genuine.table_daihatsu')
                    </div>
                    <div class="tab-pane fade" id="ford" role="tabpanel">
                        @include('file_catalogues_genuine.table_ford')
                    </div>
                    <div class="tab-pane fade" id="hino" role="tabpanel">
                        @include('file_catalogues_genuine.table_hino')
                    </div>
                    <div class="tab-pane fade" id="honda" role="tabpanel">
                        @include('file_catalogues_genuine.table_honda')
                    </div>
                    <div class="tab-pane fade" id="isuzu" role="tabpanel">
                        @include('file_catalogues_genuine.table_isuzu')
                    </div>
                    <div class="tab-pane fade" id="mitsubishi" role="tabpanel">
                        @include('file_catalogues_genuine.table_mitsubishi')
                    </div>
                    <div class="tab-pane fade" id="suzuki" role="tabpanel">
                        @include('file_catalogues_genuine.table_suzuki')
                    </div>
                    <div class="tab-pane fade" id="toyota" role="tabpanel">
                        @include('file_catalogues_genuine.table_toyota')
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>

    </script>
@endpush
