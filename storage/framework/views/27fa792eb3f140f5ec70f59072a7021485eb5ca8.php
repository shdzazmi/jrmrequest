<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Ubah service order SV'. $serviceOrder->id); ?>
<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-12">
                </div>
            </div>
        </section>
    </div>

    <div class = "row">
        <div class = "col-sm-4 pl-5 pb-5">
            <div class="content">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fas fa-box"></i> Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fas fa-wrench"></i> Jasa Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pl-3 pb-3" style="font-size: 14px">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <?php echo $__env->make('service_orders.table_produk', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <?php echo $__env->make('service_orders.table_service', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class = "col-sm-8 pr-5 pb-5">
            <div class="content" style="font-size: 12px">
                <?php echo Form::model($serviceOrder, ['route' => ['serviceOrders.update', $serviceOrder->id], 'method' => 'patch']); ?>

                <?php echo $__env->make('service_orders.fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::close(); ?>

                <?php echo $__env->make('service_orders.list_order', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-primary btn-block" onclick="uploadServiceOrder()">Simpan</button>
                <a href="<?php echo e(route('serviceOrders.index')); ?>" class="btn btn-default btn-outline btn-block">Cancel</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_scripts'); ?>

    <script>
        tampilLoading('Memuat...');
        getTotalPrice();
        var tbOrder = document.getElementById("table-body");
        function getTotalPrice() {
            var total = 0;
            var table = document.getElementById("table-body");
            var totaltext = document.getElementById("total-text");
            for(var i = 0; i < table.rows.length; i++)
            {
                total = total + parseInt(table.rows[i].cells[8].innerHTML.replaceAll([".",","],""));
            }
            totaltext.innerHTML = numberFormat(total) ;
        }

        function updateSubtotal(id) {
            var qty =  ($(id).closest("tr").find("input[id*='qtyInput']").val()) ;
            var price = ($(id).closest("tr").find("input[id*='hargaInput']").val()) ;
            var disc = ($(id).closest("tr").find("input[id*='discInput']").val()) / 100;
            var jumlah = qty*price;
            var discprice = jumlah*disc;
            var afterdisc = jumlah-discprice;
            $(id).closest("tr").find('td:eq(8)').text(afterdisc);

            getTotalPrice();
            return false;
        }

        function updateInputHarga(id) {
            Number($(id).closest("tr").find("input[id*='hargaInput']").val($(id).attr('data-value')));
            updateSubtotal(id);
        }



        function uploadServiceOrder() {

            let nama = document.getElementById("nama_input").value;
            let tanggal = document.getElementById("tanggal_input").value;
            let mobil = document.getElementById("mobil_input").value;
            let nopol = document.getElementById("nopol_input").value;
            let status = document.getElementById("status_input").value;
            let td_content = $('#table-body td').text();
            let table = document.getElementById( "table-body" );
            let outlet = document.getElementById( "outlet_input" ).value;
            var ppn = 0;
            if(document.getElementById( "ppn_input" ).checked === true){
                ppn = 1;
            }
            var tanpabongkar = 0;
            if(document.getElementById( "tanpabongkar_input" ).checked === true){
                tanpabongkar = 1;
            }
            let url = '<?php echo e(route("serviceOrders.updateData")); ?>';
            let urlOrder = '<?php echo e(route("serviceOrders.update", ":id")); ?>';
            urlOrder = urlOrder.replace(':id', document.getElementById('id_input').value);
            if (td_content !== "" && nama !== "" && tanggal !== "" && mobil !== "" && nopol !== ""){
                // tampilLoading('Menambahkan data...');
                // listorder
                for ( let i = 0; i < table.rows.length; i++ ) {
                    let harga = table.rows[i].cells[5].children[0].value;
                    let qty = table.rows[i].cells[6].children[0].value;
                    let disc = table.rows[i].cells[7].children[0].value;
                    let subtotal = table.rows[i].cells[8].innerHTML;
                    let id = table.rows[i].cells[0].innerHTML;
                    let uid = document.getElementById( "uid_input" ).value;
                    let barcode = table.rows[i].cells[1].innerHTML;
                    let ketnama = table.rows[i].cells[3].children[0].value;
                    let type = table.rows[i].cells[2].innerHTML;
                    let ket = table.rows[i].cells[9].children[0].value;
                    let nourut = table.rows[i].cells[11].innerHTML;

                    let data = {
                        id: id,
                        uid : uid,
                        barcode: barcode,
                        ketnama: ketnama,
                        harga: harga,
                        qty: qty,
                        discount: disc,
                        type: type,
                        keterangan: ket,
                        subtotal: subtotal,
                        nourut: nourut
                    };
                    console.log(data);
                    $.ajax({
                        url: url,
                        method:"POST",
                        data: data,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                    });
                }

                var dataorder = {
                    uid : document.getElementById( "uid_input" ).value,
                    nama,
                    tanggal,
                    operator : document.getElementById( "operator_input" ).value,
                    mobil,
                    status,
                    nopol,
                    ppn,
                    tanpabongkar,
                    outlet
                };

                // Serviceorder
                $.ajax({
                    url: urlOrder,
                    method:"PATCH",
                    data: dataorder,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data){
                        var url = '<?php echo e(route("serviceOrders.show", [":id"])); ?>';
                        url = url.replace(':id', data.id);
                        window.onbeforeunload = null;
                        window.location.href = url;
                    },
                    error: function (data){
                        toastError("Gagal!", "Terjadi kesalahan internal.");
                        window.onbeforeunload = null;
                        window.location.href = '<?php echo e(route("serviceOrders.index")); ?>';
                    }
                });

            } else {
                toastError("Gagal!", "Lengkapi data.")
            }
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/edit.blade.php ENDPATH**/ ?>
