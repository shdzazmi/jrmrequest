
<!-- Keluar Modal -->
<div class="modal fade" id="modal-tamu" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scan tamu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'logbooks.store']) !!}

                <div class="card-body">
                    <div class="row">
                        <!-- Id Karyawan Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('id_karyawan', 'Id Karyawan:') !!}
                            {!! Form::text('id_karyawan', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Waktu Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('waktu', 'Waktu:') !!}
                            {!! Form::text('waktu', null, ['class' => 'form-control','id'=>'waktutamu']) !!}
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('status', 'Status:') !!}
                            <select id="status" name="status" class="form-control" required>
                                <option value="" disabled selected hidden>Status</option>
                                <option>Tamu masuk</option>
                                <option>Tamu keluar</option>
                            </select>
                        </div>

                        <!-- Keterangan Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('keterangan', 'Keterangan:') !!}
                            {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="javascript:void(0)" class="btn btn-dark float-right" onclick="scan_tamu()"><i class="fas fa-qrcode"></i> Scan cepat</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Scan Keluar cepat Modal -->
<div class="modal fade" id="modal-scantamu" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scan tamu</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="modal_tamu()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body p-0">
                    <div id="qr-reader-tamu"></div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('page_scripts')
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script type="text/javascript">
        $('#waktutamu').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            icons: {
                time: "fas fa-clock",
                date: "fas fa-calendar",
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down",
                previous: "fas fa-chevron-left",
                next: "fas fa-chevron-right"
            }
        });

        $('body').on('shown.bs.modal', '#modal-security', function () {
            $('input:visible:enabled:first', this).focus();
        });

        <!-- buka modal scan -->
        function scan_tamu() {
            if (document.getElementById('status').value !== ""){
                $('#modal-tamu').modal('hide')
                $('#modal-scantamu').modal('show');
            } else {
                Swal.fire(
                    'Gagal!',
                    'Isi status terlebih dahulu',
                    'error'
                )
            }
        }

        <!-- qrcode scanner -->
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader-tamu", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== lastResult) {
                beep.play();
                lastResult = qrCodeMessage;
                if (qrCodeMessage.startsWith("G")) {
                    var url = '{{ route("logbook.store") }}';
                    var data = {
                        id: qrCodeMessage,
                        status : document.getElementById('status').value,
                    };
                    // console.log(data);
                    $.ajax({
                        url: url,
                        method: "POST",
                        data : data,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function (data){
                            toastSuccess('Scan berhasil', 'Data logbook tersimpan')
                        }
                    });
                    $('#modal-scantamu').modal('hide');
                    $('#modal-tamu').modal('show');

                } else {
                    Swal.fire(
                        'Gagal!',
                        'Scan QR Code yang benar',
                        'error'
                    )
                }
            }
        }
    </script>
@endpush
