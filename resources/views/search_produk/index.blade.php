@extends('layouts.app')
@section('title', 'Pencarian produk')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="text-center">Pencarian Stok</h1>
                </div>
                <div class="col-sm" align="right">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="input-group">
                    <input type="search" id="searchInput" class="form-control form-control-lg" placeholder="Ketik pencarian di sini">
                    <div class="input-group-append">
                        <button class="btn btn-lg btn-default" id="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">


        <div class="card card-outline card-primary">
            <div class="card-body">
                @include('search_produk.table')
            </div>
        </div>

    </div>

@endsection
