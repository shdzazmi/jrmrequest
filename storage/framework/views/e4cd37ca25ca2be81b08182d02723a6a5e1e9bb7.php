<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Lokasi produk'); ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lokasi produk</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="content px-3">
        <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <?php echo $__env->make('location.fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <hr/>
                <?php echo $__env->make('location.table', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

        </div>

    </div>


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
                    <?php echo $__env->make('location.fields_editLokasi', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-sm-3">

                    <div id="qr-reader"></div>
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
                    <?php echo $__env->make('location.table_editLokasi', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary" id="btnUpload" onclick="uploadLokasi()">Upload</button>
                    </div>
                </div>
            </div>

        </div>
        <audio id="beep">
            <source src="<?php echo e(asset('storage/beep.mp3')); ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.0.3/html5-qrcode.min.js"></script>
    <script>

        var kodeLokasi = document.getElementById('kodelokasi');
        var kodeBarcode = document.getElementById('kodeBarcode');
        var batchScan = document.getElementById('batchScan')
        var beep = document.getElementById('beep');

        kodeLokasi.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                if (kodeLokasi.value === "batch()") {
                    batchScan.checked = true;
                    kodeLokasi.focus();
                    kodeLokasi.value = '';
                } else if (kodeLokasi.value === "single()") {
                    batchScan.checked = false;
                    kodeLokasi.focus();
                    kodeLokasi.value = '';
                } else if (kodeLokasi.value.startsWith("01/")) {
                    kodeLokasi.focus();
                    kodeLokasi.value = '';
                    toastError("Gagal!", "Masukan kode lokasi yang benar!.")
                } else {
                    kodeBarcode.focus();
                }
                // Cancel the default action, if needed
                event.preventDefault();
            }
        });

        kodeBarcode.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                if (kodeBarcode.value === "batch()") {
                    batchScan.checked = true;
                    kodeBarcode.focus();
                    kodeBarcode.value = '';
                } else if (kodeBarcode.value === "single()") {
                    batchScan.checked = false;
                    kodeLokasi.focus();
                    kodeLokasi.value = '';
                    kodeBarcode.value = '';
                } else {
                    // Trigger the button element with a click
                    document.getElementById("btnSubmits").click();
                }
                // Cancel the default action, if needed
                event.preventDefault();
            }
        });

        function submitLokasi() {

            if (kodeLokasi.value !== "" && kodeBarcode.value !== "") {
                if (kodeBarcode.value.startsWith("01/")) {
                    if (kodeBarcode.value.length > 6 ) {
                        var url = '<?php echo e(route("location.put", [":bcode"])); ?>';
                        url = url.replace(':bcode', kodeBarcode.value);
                        if (batchScan.checked === true) {
                            $.ajax({
                                url: url,
                                method: "POST",
                                contentType: 'application/json',
                                headers: {
                                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                                },
                                success: function (data){
                                    $('#tbEditData').append(
                                        '<tr>' +
                                        '<td>' + kodeLokasi.value + '</td>  ' +
                                        '<td>' + kodeBarcode.value + '</td> ' +
                                        '<td>' + data.nama + '</td> ' +
                                        '<td >' + data.lokasi1 + '</td> ' +
                                        '<td >' + data.lokasi2 + '</td> ' +
                                        '<td >' + data.lokasi3 + '</td> ' +
                                        '<td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                                        '</tr>');
                                    kodeBarcode.value = '';
                                    checkTbEmpty();
                                },
                                error: function (data){
                                    toastError("Gagal!", "Terjadi kesalahan internal.")
                                }

                            });

                        } else {

                            $.ajax({
                                url: url,
                                method: "POST",
                                contentType: 'application/json',
                                headers: {
                                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                                },
                                success: function (data){
                                    $('#tbEditData').append(
                                        '<tr>' +
                                        '<td>' + kodeLokasi.value + '</td>  ' +
                                        '<td>' + kodeBarcode.value + '</td> ' +
                                        '<td>' + data.nama + '</td> ' +
                                        '<td >' + data.lokasi1 + '</td> ' +
                                        '<td >' + data.lokasi2 + '</td> ' +
                                        '<td >' + data.lokasi3 + '</td> ' +
                                        '<td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                                        '</tr>');
                                    kodeLokasi.value = '';
                                    kodeBarcode.value = '';
                                    checkTbEmpty();
                                },
                                error: function (data){
                                    toastError("Gagal!", "Terjadi kesalahan internal.")
                                }
                            });

                        }
                    } else {
                        kodeBarcode.value = '';
                        toastError("Gagal!", "Barcode kurang lengkap!.")
                    }

                } else {
                    kodeBarcode.value = '';
                    toastError("Gagal!", "Masukan barcode yang benar!.")
                }

            } else {
                toastError("Gagal!", "Kode lokasi dan barcode harus diisi.");
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

        function searchLokasi() {
            var lokasi = document.getElementById('inputLokasi').value;
            var url = '<?php echo e(route("location.searchs", ":id")); ?>';
            url = url.replace(':id', lokasi);
            window.location.href = url;
        }

        function searchBarcode() {
            var barcode = document.getElementById('inputBarcode').value;
            var url = '<?php echo e(route("location.search", ":id")); ?>';
            url = url.replace(':id', barcode);
            window.location.href = url;
        }

        function uploadLokasi() {
            var td_content = $('#tbEditLocation td').text();
            if(td_content !== ""){
                var table = document.getElementById( "tbEditLocation" );
                for ( var i = 1; i < table.rows.length; i++ ) {
                    var lokasi = table.rows[i].cells[0].innerHTML;
                    var barcode = table.rows[i].cells[1].innerHTML;
                    var url = '<?php echo e(route("location.update", [":bcode", ":lok"])); ?>';
                    url = url.replace(':bcode', barcode);
                    url = url.replace(':lok', lokasi);

                    $.ajax({
                        url: url,
                        method:"POST",
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        success: function (data){
                            toastSuccess("Sukses!", "Lokasi berhasil diperbarui")
                        },
                        error: function (data){
                            toastError("Gagal!", "Terjadi kesalahan internal.")
                        }

                    });
                }
                deleteAllRow();
            } else {
                toastError("Gagal!", "Data kosong.")
            }
        }

        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 30, qrbox: 250, aspectRatio: 2 });
        html5QrcodeScanner.render(onScanSuccess);

        function onScanSuccess(qrCodeMessage) {
            if (qrCodeMessage !== lastResult) {
                beep.play();
                lastResult = qrCodeMessage;
                if (qrCodeMessage === "batch()") {
                    batchScan.checked = true;
                    kodeLokasi.value = '';
                } else if (qrCodeMessage === "single()") {
                    batchScan.checked = false;
                    kodeLokasi.value = '';
                } else if (qrCodeMessage.startsWith("01/")) {
                    if(kodeLokasi.value !== ''){
                        kodeBarcode.value = qrCodeMessage;
                        submitLokasi();
                    } else {
                        toastError("Gagal!", "Scan kode lokasi terlebih dahulu")
                    }
                } else if (qrCodeMessage.startsWith("A") || qrCodeMessage.startsWith("B") || qrCodeMessage.startsWith("C") || qrCodeMessage.startsWith("D")) {
                    kodeLokasi.value = qrCodeMessage;
                }
            }

        }


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/location/index.blade.php ENDPATH**/ ?>
