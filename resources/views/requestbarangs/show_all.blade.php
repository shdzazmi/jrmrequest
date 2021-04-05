@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Request Barang</h1>
                </div>
                <div class="col-sm" align="right">

                    <a href="/requestbarang/export_excel" data-toggle="tooltip" title="Export excel" class='btn btn-info'>
                        <i class="fas fa-file-download"></i>
                        Export
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card card-outline card-info">
            <div class="card-body">
                @include('requestbarangs.table')
            </div>
        </div>
    </div>

@endsection

