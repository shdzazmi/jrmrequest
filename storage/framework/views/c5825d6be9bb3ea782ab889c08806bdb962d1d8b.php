<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar order</h5>
    </div>
    <div class="card-body table-responsive p-0" style="height: 250px;">
        <table class="table table-sm" id="orderlist" style="font-size: 14px;">
            <thead>
                <tr>
                    <th style="display:none;">ID</th>
                    <th style="display:none;">Barcode</th>
                    <th style="text-align: center; width: 30%">Produk</th>
                    <th style="text-align: center; width: 10%">Detail</th>
                    <th style="text-align: center; width: 25%">Harga</th>
                    <th style="text-align: center; width: 10%">Qty</th>
                    <th style="text-align: center; width: 10%">Disc %</th>
                    <th style="text-align: center; width: 10%">Jumlah</th>
                    <th style="text-align: center; width: 25%">Ket</th>
                    <th style="text-align: center">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Hapus semua">
                            <span style="color: darkred" onclick="deleteAllRowService()" >
                                <i class="fas fa-ban"></i>
                            </span>
                        </a>
                    </th>
                    <th style="display:none;">Nourut</th>

                </tr>
            </thead>

            <tbody id="table-body" style="font-size: 12px">
                <?php if(isset($listorder)): ?>


                        <?php $__currentLoopData = $listorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listorders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $produk = $produks->firstWhere('barcode', $listorders->barcode)
                            ?>
                        <tr>
                            <td style="display:none;"><?php echo e($listorders->id); ?></td>
                            <td style="display:none;"><?php echo e($listorders->barcode); ?></td>
                            <td style="display:none;"><?php echo e($listorders->type); ?></td>
                            <td style="vertical-align: middle;"><input style="font-size: 12px; width: 250px;" type="text" class="form-control form-control-sm" id="namaInput" value="<?php echo e($listorders->ketnama); ?>"></td>
                            <td style="vertical-align: middle;">
                                <?php if(isset($produk->kd_supplier)): ?>
                                    <span class="badge badge-pill bg-primary"><?php echo e($produk->kd_supplier); ?></span><br/>
                                    <span class="badge badge-pill bg-secondary">PN1</span> <?php echo e($produk->partno1); ?><br/>
                                    <span class="badge badge-pill bg-secondary">PN2</span> <?php echo e($produk->partno2); ?>

                                <?php endif; ?>
                            </td>
                            <?php if(Auth::user()->role == 'Master'||Auth::user()->role == 'Admin' || Auth::user()->role == "Head"): ?>
                                <td style="vertical-align: middle;"><input style="text-align: right; font-size: 12px;width: 120px;" type="number" class="form-control form-control-sm inputharga" id="hargaInput" onchange="updateSubtotal(this)" value="<?php echo e($listorders->harga); ?>"></td>
                            <?php else: ?>
                                <td style="vertical-align: middle;"><input style="text-align: right; font-size: 12px;width: 120px;" type="number" class="form-control form-control-sm inputharga" id="hargaInput" onchange="updateSubtotal(this)" value="<?php echo e($listorders->harga); ?>"></td>
                            <?php endif; ?>
                            <td style="vertical-align: middle;"><input style="width: 50px; text-align: right; font-size: 12px" type="number" class="form-control form-control-sm" value="<?php echo e($listorders->qty); ?>" min="1" id="qtyInput" onchange="updateSubtotal(this);"/></td>
                            <td style="vertical-align: middle;"><input style="width: 60px; text-align: right; font-size: 12px" type="number" class="form-control form-control-sm" value="<?php echo e($listorders->discount); ?>" min="1" id="discInput" onchange="updateSubtotal(this);"/></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo e($listorders->subtotal); ?></td>
                            <td style="vertical-align: middle;"><input style="width: 60px; font-size: 12px" type="text" class="form-control form-control-sm" value="<?php echo e($listorders->keterangan); ?>" id="ketInput"/></td>
                            <td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="<?php echo e($listorders->id); ?>" onclick="deleteRowService(this)"><i class="fas fa-trash"></i></button></td>
                            <td style="display:none;"><?php echo e($listorders->nourut); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <?php $__currentLoopData = $listjasa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listjasas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $produk = $produks->firstWhere('barcode', $listjasas->barcode)
                            ?>
                            <tr>
                                <td style="display:none;"><?php echo e($listjasas->id); ?></td>
                                <td style="display:none;"><?php echo e($listjasas->barcode); ?></td>
                                <td style="display:none;"><?php echo e($listjasas->type); ?></td>
                                <td style="vertical-align: middle;"><input  style="font-size: 12px; width: 250px;" type="text" class="form-control form-control-sm" id="namaInput" value="<?php echo e($listjasas->ketnama); ?>"></td>
                                <td style="vertical-align: middle;">
                                </td>
                                <?php if(Auth::user()->role == 'Master'||Auth::user()->role == 'Admin' || Auth::user()->role == "Head"): ?>
                                    <td style="vertical-align: middle;"><input style="text-align: right; font-size: 12px;width: 120px;" type="number" class="form-control form-control-sm inputharga" id="hargaInput" onchange="updateSubtotal(this)" value="<?php echo e($listjasas->harga); ?>"></td>
                                <?php else: ?>
                                    <td style="vertical-align: middle;"><input  style="text-align: right; font-size: 12px;width: 120px;" type="number" class="form-control form-control-sm inputharga" id="hargaInput" onchange="updateSubtotal(this)" value="<?php echo e($listjasas->harga); ?>" ></td>
                                <?php endif; ?>
                                <td style="vertical-align: middle;"><input  style="width: 50px; text-align: right; font-size: 12px" type="number" class="form-control form-control-sm" value="<?php echo e($listjasas->qty); ?>" min="1" id="qtyInput" onchange="updateSubtotal(this);"/></td>
                                <td style="vertical-align: middle;"><input  style="width: 60px; text-align: right; font-size: 12px" type="number" class="form-control form-control-sm" value="<?php echo e($listjasas->discount); ?>" min="1" id="discInput" onchange="updateSubtotal(this);"/></td>
                                <td style="text-align: right; vertical-align: middle;"><?php echo e($listjasas->subtotal); ?></td>
                                <td style="vertical-align: middle;"><input  style="width: 60px; font-size: 12px" type="text" class="form-control form-control-sm" value="<?php echo e($listjasas->keterangan); ?>" id="ketInput"/></td>
                                <td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="<?php echo e($listjasas->id); ?>" onclick="deleteRowService(this)"><i class="fas fa-trash"></i></button></td>
                                <td style="display:none;"><?php echo e($listjasas->nourut); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer pb-0">
        <div class="row">
            <div class="col-sm-3 p-0">
                <h6>Total</h6>
            </div>
            <div class="col-sm-9 p-0 text-right">
                <h6 id="total-text">0</h6>
            </div>
        </div>
    </div>
</div>

<script>

    function deleteRowService(r) {
        var ids = $(r).attr('data-value');
        var i = r.parentNode.parentNode.rowIndex;
        if (typeof ids !== 'undefined') {
            $.ajax({
                url: '<?php echo e(route("listServiceOrder.delete")); ?>',
                method:"POST",
                cache: false,
                data: {id: ids},
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                success: function (data){
                    if (data === "success") {
                        document.getElementById("table-body").deleteRow(i-1);
                        getTotalPrice();
                    } else {
                        toastError("Error!", "Terjadi kesalahan internal.")
                    }
                }
            });
        } else {
            document.getElementById("table-body").deleteRow(i-1);
            getTotalPrice();
        }
    }

    function deleteAllRowService() {
        var uid = document.getElementById( "uid_input" ).value;
        var tableHeaderRowCount = 0;
        var table = document.getElementById('table-body');
        var rowCount = table.rows.length;
        var url = '<?php echo e(route("listServiceOrder.deleteAll", [":uid"])); ?>';
        url = url.replace(':uid', uid);

        $.ajax({
            url: url,
            method:"POST",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            success: function (data){
                if (data === "success") {
                    for (var i = tableHeaderRowCount; i < rowCount; i++) {
                        table.deleteRow(tableHeaderRowCount);
                    }
                    getTotalPrice();
                } else {
                    toastError("Error!", "Terjadi kesalahan internal.")
                }
            }
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/list_order.blade.php ENDPATH**/ ?>