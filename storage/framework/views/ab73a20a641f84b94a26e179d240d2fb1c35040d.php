<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Ubah sales order'); ?>

<?php $__env->startSection('content'); ?>

    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-12">
                        <h5>Edit Sales Order</h5>
                    </div>
            </div>
        </section>
    </div>

    <div class = "col-sm-12">
        <?php echo $__env->make('adminlte-templates::common.errors', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class = "row">
        <div class = "col-sm-3">
            <div class="content px-3 pb-2">
                <?php echo Form::model($salesOrder, ['route' => ['salesOrders.update', $salesOrder->id], 'method' => 'patch']); ?>

                <?php echo $__env->make('sales_orders.fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::close(); ?>

                <button class="btn btn-primary btn-block" onclick="updateSalesOrder()">Simpan</button>
                <a href="<?php echo e(route('salesOrders.index')); ?>" class="btn btn-default btn-outline btn-block">Cancel</a>
            </div>
        </div>
        <div class = "col-sm-9">
            <div class="content px-3">
                <?php echo $__env->make('sales_orders.list_order', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <div class = "row">
        <div class="col-sm-12">
            <div class="content px-3" style="height: 300px">
                <?php echo $__env->make('sales_orders.table_produk', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>

    <script>

        tampilLoading('Memuat...');

        getTotalPrice();
        function getTotalPrice() {
            var total = 0;
            var table = document.getElementById("table-body");
            var totaltext = document.getElementById("total-text");
            for(var i = 0; i < table.rows.length; i++)
            {
                total = total + parseFloat(table.rows[i].cells[6].innerHTML);
            }
            totaltext.innerHTML = numberFormat(total);
        }

        function updateSubtotal(id) {
            var qty =  Number($(id).closest("tr").find("input[id*='qtyInput']").val());
            var price = Number($(id).closest("tr").find("input[id*='hargaInput']").val());
            $(id).closest("tr").find('td:eq(6)').text(qty*price);
            getTotalPrice();
            return false;
        }

        function updateInputHarga(id) {
            Number($(id).closest("tr").find("input[id*='hargaInput']").val($(id).attr('data-value')));
            updateSubtotal(id)
            // var table = document.getElementById( "table-body" );
            // for ( var i = 0; i < table.rows.length; i++ ) {
            //     var hargainput = table.rows[i].cells[3].children[0].children[0].value;
            //     console.log(hargainput)
            // }
        }

        function updateSalesOrder() {

            var td_content = $('#table-body td').text();
            var table = document.getElementById( "table-body" );
            var nama = document.getElementById( "nama_input" ).value;
            var tanggal = document.getElementById( "tanggal_input" ).value;
            var url = '<?php echo e(route("salesOrder.updateData")); ?>';
            var urlOrder = '<?php echo e(route("salesOrders.update", ":id")); ?>';
            urlOrder = urlOrder.replace(':id', document.getElementById('id_input').value);
            if(td_content !== "" && nama !== "" && tanggal !== ""){
                tampilLoading('Menambahkan data...');
                // listorder
                for ( var i = 0; i < table.rows.length; i++ ) {
                    var harga = table.rows[i].cells[4].children[0].children[0].value;
                    var qty = table.rows[i].cells[5].children[0].value;
                    var subtotal = harga*qty;
                    var data = {
                        id: table.rows[i].cells[0].innerHTML,
                        uid : document.getElementById( "uid_input" ).value,
                        produk: table.rows[i].cells[1].innerHTML,
                        barcode: table.rows[i].cells[2].innerHTML,
                        kendaraan: table.rows[i].cells[3].innerHTML,
                        keterangan: table.rows[i].cells[7].children[0].value,
                        harga: harga,
                        qty: qty,
                        subtotal: subtotal.toString()
                    };
                    // console.log(data)
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

                // salesorder
                var dataorder = {
                    uid : document.getElementById( "uid_input" ).value,
                    nama,
                    tanggal,
                    tipeharga : $('#tipeharga').find(":selected").val(),
                    status : document.getElementById( "status_input" ).value,
                    operator : document.getElementById( "operator_input" ).value,

                };
                // console.log(data)

                $.ajax({
                    url: urlOrder,
                    method:"PATCH",
                    data: dataorder,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data){
                        toastSuccess("Sukses!", "Data berhasil diperbarui");
                        var url = '<?php echo e(route("salesOrders.show", [":id"])); ?>';
                        url = url.replace(':id', data.id);
                        window.onbeforeunload = null
                        window.location.href = url;
                    },
                    error: function (data){
                        toastSuccess("Sukses!", "Data berhasil diperbarui");
                        window.onbeforeunload = null
                        window.location.href = '<?php echo e(route("salesOrders.index")); ?>';
                    }
                });

            } else {
                toastError("Gagal!", "Lengkapi data.")
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/edit.blade.php ENDPATH**/ ?>
