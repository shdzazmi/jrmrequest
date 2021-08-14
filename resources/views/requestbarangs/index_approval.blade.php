@extends('layouts.app')
@section('title', 'Request barang')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

@section('content')
    <div class="col-md-10 offset-md-1" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request Approval</h1>
                    </div>
                    <div class="col-sm" align="right">
{{--                        <a href="{{ route('showAll') }}" class='btn btn-outline-info'>--}}
{{--                            Semua request--}}
{{--                        </a>--}}
{{--                        <a class="btn btn-info"--}}
{{--                           href="{{ route('requestbarangs.create') }}">--}}
{{--                            Tambah baru--}}
{{--                        </a>--}}
                    </div>

                </div>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                    Beri approval untuk barang yang direquest oleh staff Gudang.
                </div>
            </div>
        </section>

        <div class="content px-3">

            @include('flash::message')

            <div class="card card-outline card-info">
                <div class="card-body">
                    @include('requestbarangs.table_index_approval')
                </div>
            </div>

        </div>
    </div>

@endsection
