@extends('layouts.app')
@section('title', 'Lokasi produk')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lokasi produk</h1>
                </div>
            </div>
        </div>
    </section>

    {{--Pencarian--}}
    <div class="content px-3">
        @include('flash::message')
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Pencarian</b></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    @include('location.fields')
                </div>

                <div class="row">
                    <div class="clearfix"></div>
                    @include('location.table')
                </div>

            </div>

        </div>

    </div>

    {{--Input lokasi--}}
    <div class="content px-3">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Edit lokasi</b></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    @include('location.fields_editLokasi')
                </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="batchScan">
                                    <label class="form-check-label">Batch scan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary" id="btnSubmits" onclick="submitLokasi()">Submit</button>
                        </div>
                    </div>

                <div class="row pt-2">
                    <div class="clearfix"></div>
                    @include('location.table_editLokasi')
                </div>

            </div>

        </div>

    </div>

@endsection

@push('page_scripts')

    <script>
        var kodeLokasi = document.getElementById('kodelokasi');
        var kodeBarcode = document.getElementById('kodeBarcode');
        var batchScan = document.getElementById('batchScan')

        kodeLokasi.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                kodeBarcode.focus();
            }
        });

        kodeBarcode.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("btnSubmits").click();
            }
        });

        function submitLokasi() {

            if (kodeLokasi.value !== "" && kodeBarcode.value !== "") {
                if (batchScan.checked === true) {
                    $('#tbEditData').append(
                        '<tr>' +
                        '<td>' + kodeLokasi.value + '</td>  ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                        '</tr>');
                    kodeBarcode.value = '';
                    kodeBarcode.focus();
                } else {
                    $('#tbEditData').append(
                        '<tr>' +
                        '<td>' + kodeLokasi.value + '</td>  ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td>' + kodeBarcode.value + '</td> ' +
                        '<td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                        '</tr>');
                    kodeLokasi.value = '';
                    kodeBarcode.value = '';
                    kodeLokasi.focus();
                }

            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Kode lokasi dan barcode harus diisi.",
                    icon: "error", //built in icons: success, warning, error, info
                    toast: "true",
                    timer: 2000, //timeOut for auto-close
                    showConfirmButton: false,
                    position: 'top'
                });
            }

            // hide table
            $(function(){
                var hide = true;
                $('#tbEditLocation td').each(function(){
                    var td_content = $(this).text();
                    if(td_content!==""){
                        hide = false;
                    }
                })
                if(hide){
                    $('#tbEditLocation').hide();
                } else {
                    $('#tbEditLocation').show();
                }
            })

        }

        function searchBarcode() {
            var barcode = document.getElementById('inputBarcode').value.substr(3);

            var url = '{{ route("location.search", ":id") }}';
            url = url.replace(':id', barcode);
            window.location.href = url;
        }
    </script>
@endpush
