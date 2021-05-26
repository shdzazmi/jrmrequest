
<!-- Keluar Modal -->
<div class="modal fade" id="modal-kembali" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scan kembali</h4>
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
                            {!! Form::text('waktu', null, ['class' => 'form-control','id'=>'waktukembali']) !!}
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-sm-6" hidden>
                            {!! Form::label('status', 'Status:') !!}
                            <select name="status" class="form-control">
                                <option>Karyawan kembali</option>
                            </select>
                        </div>

                        <!-- Keterangan Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('keterangan', 'Keterangan:') !!}
                            {!! Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan-kembali']) !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="javascript:void(0)" class="btn btn-dark float-right" data-dismiss="modal" onclick="scan_kembali()"><i class="fas fa-qrcode"></i> Scan cepat</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Scan Keluar cepat Modal -->
<div class="modal fade" id="modal-scankembali" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scan kembali</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="modal_kembali()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body p-0">
                    <div id="qr-reader-kembali"></div>
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
        $('#waktukembali').datetimepicker({
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
        function scan_kembali() {
            $('#modal-scankembali').modal('show');
        }

        <!-- qrcode scanner -->
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader-kembali", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== lastResult) {
                beep.play();
                lastResult = qrCodeMessage;
                if (qrCodeMessage.startsWith("T") || qrCodeMessage.startsWith("M") || qrCodeMessage.startsWith("P")) {
                    var url = '{{ route("logbook.store") }}';
                    var data = {
                        id: qrCodeMessage,
                        status : "Karyawan kembali",
                        keterangan : document.getElementById('keterangan-kembali').value,
                    };
                    console.log(data);
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
