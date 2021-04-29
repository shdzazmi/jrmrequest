@extends('layouts.app')
@section('title', 'Home')
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
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{$salesordercount}}</h3>
                            <b>Sales Order</b>
                            <br>
                            <a href="{{ route('salesOrders.index') }}" class="text text-light">More info</a>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <a href="{{ route('salesOrders.create') }}" class="small-box-footer">
                            Buat Sales Order Baru <i class="fas fa-plus-circle"></i>
                        </a>
                        <div class="list-group no-padding">
                            <a href="{{ route('salesOrders.index') }}" class="list-group-item text-gray">
                                Proses <span class="float-right badge-pill bg-warning text-light">{{$prosescount}}</span>
                            </a>
                            <a href="{{ route('salesOrders.index') }}" class="list-group-item text-gray">
                                Selesai <span class="float-right badge-pill bg-success">{{$selesaicount}}</span>
                            </a>
                            <a href="{{ route('salesOrders.index') }}" class="list-group-item text-gray">
                                Batal <span class="float-right badge-pill bg-danger">{{$batalcount}}</span>
                            </a>
                        </div>
                    </div>




            </div>


            <!-- small card -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <h3>{{$requestcount}}</h3>
                        <b>Request Barang</b>
                        <br>
                        <a href="{{ route('requestbarangs.index') }}" class="text text-light">More info</a>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a href="{{ route('requestbarangs.create') }}" class="small-box-footer">
                        Tambah baru <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>

            @if(Auth::user()->role == "Admin" || Auth::user()->role == "Master")
                <!-- small card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-primary">
                        <div class="inner">
                            <h5>Sinkronisasi Data</h5>
                            <b>Last update:</b>
                            <p>{{$time}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <a href="JavaScript:void(0)" class="small-box-footer" onclick="synchronize()">
                            Update <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection

@push('page_scripts')
    <script>

        function synchronize() {
            const produkAjax = '{{ route('synchronize') }}'
            Swal.queue([{
                title: 'Sinkronisasi Data',
                confirmButtonText: 'Sinkronkan!',
                text:
                    'Sinkron data produk untuk request dan sales order?',
                showLoaderOnConfirm: true,
                showCancelButton: true,
                preConfirm: () => {
                    return fetch(produkAjax).then(data => Swal.fire('Sukses!','Data telah tersinkron','success'))
                }
            }])
        }

    </script>
@endpush
