@extends('layouts.app')
@section('title', 'Request barang')
@section('content')

    <div class="col-md-12" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request Barang</h1>
                    </div>
                    <div class="col-sm" align="right">
                        <a href="{{ route('export_excel') }}" data-toggle="tooltip" title="Export excel" class='btn btn-outline-info'>
                            <i class="fas fa-file-download"></i>
                            Export
                        </a>
                        <a href="{{ route('requestbarangs.index') }}" data-toggle="tooltip" class='btn btn-outline-info'>
                            Dashboard
                        </a>
                        <a class="btn btn-info"
                           href="{{ route('requestbarangs.create') }}">
                            Tambah baru
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
                    @include('requestbarangs.table_all')
                </div>
            </div>
        </div>
    </div>
@endsection
