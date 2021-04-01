@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1>Request Barang</h1>
                </div>
                <div class="col-sm" align="right">
                    <div class='btn-group'>
                        <a href="/requestbarang/export_excel" data-toggle="tooltip" title="Export excel" class='btn btn-primary btn-s'>
                            <i class="fas fa-file-download"></i>
                        </a>
                    </div>
                    <div class='btn-group'>
                        <a class="btn btn-primary float-right"
                           href="{{ route('requestbarangs.create') }}">
                            Tambah baru
                        </a>
                    </div>
                </div>

            </div>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                Request barang berisi data barang kosong yang pernah diminta oleh customer, klik tombol Tambah baru untuk menambahkan data.
            </div>

        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card card-outline card-primary">
            <div class="card-body p-0">
                @include('requestbarangs.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $requestbarangs])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
