@extends('layouts.app')
@section('title', 'Logbook barang keluar')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Logbook Barangs</h1>
                </div>
                <div class="col-sm-6" align="right">
                    <a href="{{ route('security') }}" class="btn btn-default">Kembali</a>
                    <a class="btn btn-primary"
                       href="{{ route('logbookBarangs.create') }}">
                        Tambah baru
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body">
                @include('logbook_barangs.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

