@extends('layouts.app')
@section('title', 'Pencarian produk')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

@section('content')
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


        <div class="card card-outline card-primary">
            @include('search_produk.table')
        </div>

    </div>

@endsection
