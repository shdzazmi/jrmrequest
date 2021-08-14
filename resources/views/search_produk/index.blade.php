@extends('layouts.app')
@section('title', 'Pencarian produk')

<style>

    .blink-2 {
        background-color: dodgerblue!important;
        color: white!important;
        -webkit-animation: blink-2 0.9s infinite both;
        animation: blink-2 0.9s infinite both;
    }

    @-webkit-keyframes blink-2 {
        0% {opacity: 1;}
        50% {opacity: 0.2;}
        100% {opacity: 1;}
    }
    @keyframes blink-2 {
        0% {opacity: 1;}
        50% {opacity: 0.2;}
        100% {opacity: 1;}
    }

</style>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

@section('content')

    <div class="animate__animated animate__fadeIn preloader flex-column justify-content-center align-items-center">
        <img class="animate__animated animate__rubberBand animate__infinite" src="{{asset('storage/logo.png')}}" alt="AdminLTELogo" height="60" width="60">
        <h3>Memuat . . .</h3>
    </div>

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
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1" id="tabHeader">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item" id="tableHead">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fas fa-th"></i> Table</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        @include('search_produk.table')
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!--4-->
    <div class="modal fade" id="modalLokasi">
        <div class="modal-dialog modal-dialog-centered modal-xl ">
            <div class="modal-content">
                <div class="modal-body p-3">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <div class="row">
                        <div class="col-sm-12">
                            <b id="rak"></b> &nbsp&nbsp
                            Lantai: <b id="lantai"></b> &nbsp&nbsp
                            Baris : <i class="fas fa-arrows-alt-v"></i> <b id="baris"></b> &nbsp&nbsp
                            Kolom : <i class="fas fa-arrows-alt-h"></i> <b id="kolom"></b> &nbsp&nbsp
                        </div>
                        <div id="denah4" class="col-sm-12 pb-3" style="display: none">
                            @include('location.denah.4')
                        </div>
                        <div id="denah3" class="col-sm-12 pb-3" style="display: none">
                            @include('location.denah.3')
                        </div>
                        <div id="denah2" class="col-sm-12 pb-3" style="display: none">
                            @include('location.denah.2')
                        </div>
                        <div id="denah1" class="col-sm-12 pb-3" style="display: none">
{{--                            @include('location.denah.1')--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('page_scripts')
    <script>

        $(document).ready(function() {
            $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
        });

        $(".modal").on("hidden.bs.modal", function(){
            $('td').removeClass('blink-2');
        });

        function locate(location) {
            $(document).ready(function() {

                $("#modalLokasi").modal({});

                $lantai = location.substring(0,1);
                if($lantai === 'A'){
                    $("#denah1").show();
                    $("#denah2").hide();
                    $("#denah3").hide();
                    $("#denah4").hide();
                    $lantai = '1';
                } else if($lantai === 'B'){
                    $("#denah1").hide();
                    $("#denah2").show();
                    $("#denah3").hide();
                    $("#denah4").hide();
                    $lantai = '2';
                } else if($lantai === 'C'){
                    $("#denah1").hide();
                    $("#denah2").hide();
                    $("#denah3").show();
                    $("#denah4").hide();
                    $lantai = '3';
                } else if($lantai === 'D'){
                    $("#denah1").hide();
                    $("#denah2").hide();
                    $("#denah3").hide();
                    $("#denah4").show();
                    $lantai = '4';
                } else {
                    $("#denah1").show();
                    $lantai = '-';
                }

                $rak = location.substring(0,3);

                $baris = location.substring(4,5);
                if($baris === ''){
                    $baris = '-';
                }

                $kolom = location.substring(5,6);
                if($kolom === ''){
                    $kolom = '-';
                }

                console.log('Rak '+$rak+' Baris '+$baris+' Kolom '+$kolom);
                var element = document.getElementById($rak);
                element.classList.add("blink-2");
                document.getElementById('rak').innerHTML = location;
                document.getElementById('lantai').innerHTML = $lantai;
                document.getElementById('baris').innerHTML = $baris;
                document.getElementById('kolom').innerHTML = $kolom;
            });
        }

    </script>
@endpush
