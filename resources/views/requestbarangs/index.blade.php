@extends('layouts.app')
<style>
        #tbRequest tbody tr:hover{
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }

</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

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
                    <a href="/requestbarangsall" data-toggle="tooltip" class='btn btn-info'>
                        Show All
                    </a>
                    <div class='btn-group'>
                        <a class="btn btn-info float-right"
                           href="{{ route('requestbarangs.create') }}">
                            Tambah baru
                        </a>
                    </div>
                </div>

            </div>
            <div class="callout callout-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                Request barang berisi data barang kosong yang pernah diminta oleh customer, klik tombol Tambah baru untuk menambahkan data.
            </div>

        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')


        <div class="card card-outline card-info">
            <div class="card-body">
                @include('requestbarangs.tableDashboard')
            </div>
        </div>
    </div>

@endsection
