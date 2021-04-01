@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Welcome</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="row mb-2">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <h3>{{$requestcount}}</h3>
                        <p>Request Barang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a href="/requestbarangs" class="small-box-footer">
                        Tambah baru <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <b>Sinkronisasi Data</b>
                        <p>Last update:</p>
                        <p>{{$time}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <a href="/synchronize" class="small-box-footer">
                        Update <i class="fas fa-sync-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
