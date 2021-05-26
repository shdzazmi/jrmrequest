@extends('layouts.app')
@section('title', 'Logbook barang keluar')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Logbook Barang</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')


        <div class="card">

            {{--{!! Form::open(['route' => 'logbookBarangs.store']) !!}--}}

            <div class="card-body">

                <div class="row">
                    @include('logbook_barangs.fields')
                </div>

            </div>

            <div class="row mt-0 mr-3 mb-3 ml-3">

                <!-- Table list qrcode -->
                <div class="col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List QR code barang</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table" id="listcode-table">
                                <thead>
                                <tr>
                                    <th>Kode koli</th>
                                    <th style="text-align: center">
                                        <a href="javascript:void(0)">
                                            <span style="color: darkred" onclick="deleteAllRow()" >
                                                <i class="fas fa-ban"></i>
                                            </span>
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="tblistcode">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Scanner qrcode -->
                <div class="col-sm-6">
                    <div class="card card-primary card-tools">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-qrcode"></i> Scan QR Code</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="qr-reader-barang"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('logbookBarangs.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {{--{!! Form::close() !!}--}}

        </div>

    </div>

    <!-- Scan Keluar cepat Modal -->
    <div class="modal fade" id="modal-scanbarang" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Scan barang keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body p-0">
                        <div id="qr-reader-barang"></div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push('page_scripts')
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script type="text/javascript">
        <!-- qrcode scanner -->
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader-barang", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== lastResult) {
                beep.play();
                lastResult = qrCodeMessage;
            }
        }

        var barcode = document.getElementById('barcode');
        function tambahlist(){
            if(barcode.value != ''){
                $('#tblistcode').append(
                    '<tr>' +
                    '<td>' + barcode.value + '</td> ' +
                    '<td style="text-align: center"><a href="javascript:void(0)"><span style="color: gray" onclick="deleteRow(this)" ><i class="fas fa-trash"></i></span></a></td>' +
                    '</tr>');
                barcode.value = '';
            } else {
                toastError('Gagal', 'Kode kosong!')
            }

        }

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("tblistcode").deleteRow(i - 1);
        }

        function deleteAllRow() {
            var tableHeaderRowCount = 0;
            var table = document.getElementById('tblistcode');
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) {
                table.deleteRow(tableHeaderRowCount);
            }
        }

        barcode.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                // Trigger the button element with a click
                document.getElementById("submitkodebarang").click();
            }
        });

    </script>
@endpush
