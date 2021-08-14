<style>
    tr.hide-table-padding td {
        padding: 0;
    }
     div.dataTables_wrapper {
         width:100% !important;
     }
    .table-nopadding{
        padding-bottom: 0;
        margin-bottom: 0;
    }

</style>

<div class="table-responsive table p-0">

    <?php if(count($listorder) != 0): ?>
        <table class="table-sm table table-nopadding dataTable display" id="tbRequest">
            <thead>
            <tr>
                <th style="text-align: center; width:5%;">No</th>
                <th style="width:40%;">Produk</th>
                <th style="width:10%;">Keterangan</th>
                <th style="text-align: center; width:10%;">Qty</th>
                <th style="text-align: center; width:15%;">Harga</th>
                <?php if($totaldiscount != 0): ?> <th style="text-align: center; width:15%;">Discount</th> <?php endif; ?>
                <th style="text-align: center; width:20%;">Jumlah</th>
            </tr>
            </thead>
            <tbody>

            <?php $i=1 ?>
            <?php $__currentLoopData = $listorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $produk = $produks->firstWhere('barcode', $item['barcode'])
                ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td>
                        <?php echo e($item['ketnama']); ?><br>
                        <span class="badge badge-pill bg-primary"><?php echo e($produk->barcode); ?></span>
                        <span class="badge badge-pill bg-primary"><?php echo e($produk->kd_supplier); ?></span>
                        <span class="badge badge-pill bg-primary"><?php echo e($produk->merek); ?></span>
                        <?php if($produk->partno1 != ""): ?>
                            <br/>PN1: <?php echo e($produk->partno1); ?>

                        <?php endif; ?>
                        <?php if($produk->partno2 != ""): ?>
                            <br/>PN2: <?php echo e($produk->partno2); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($item['keterangan']); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e(number_format($item['qty'])); ?> <?php echo e($produk->satuan); ?>

                    </td>
                    <td class="text-right">
                        <?php echo e(number_format($item['harga'],0,",",".")); ?>

                    </td>
                    <?php if($totaldiscount != 0): ?>
                        <td class="text-right">
                            <?php if($item['discount'] != 0): ?>
                                <?php echo e(floatval($item['discount'])); ?>%
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <td class="text-right">
                        <?php echo e(number_format($item['subtotal'],0,",",".")); ?>

                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if($totaldiscount != 0): ?> <td></td> <?php endif; ?>
            <td style="text-align: right; font-size: 14px"><b>Subtotal Produk:</b></td>
            <td style="text-align: right"><b><?php echo e(number_format($totalproduk)); ?></b></td>
            </tfoot>
        </table>
    <?php endif; ?>

    <?php if(count($listjasa) != 0): ?>
        <table class="table-sm table table-nopadding dataTable display mt-3" id="tbRequest">
            <thead>
            <tr>
                <th style="text-align: center; width:5%;">No</th>
                <th style="width:40%;">Jasa Service</th>
                <th style="width:10%;">Keterangan</th>
                <th style="text-align: center; width:10%;">Qty</th>
                <th style="text-align: center; width:15%;">Harga</th>
                <?php if($totaldiscount != 0): ?> <th style="text-align: center; width:15%;">Discount</th> <?php endif; ?>
                <th style="text-align: center; width:20%;">Jumlah</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
            <?php $__currentLoopData = $listjasa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                global $barcode;
                $barcode = $item['barcode'];
                if($barcode == null){
                    $barcode = $item['bcodejasa'];
                }
                    $produk = $services->firstWhere('barcode', $barcode)
                ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td>
                        <?php echo e($item['ketnama']); ?> <span class="badge badge-pill bg-primary"><?php echo e($produk->barcode); ?></span>

                    </td>
                    <td>
                        <?php echo e($item['keterangan']); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e(number_format($item['qty'])); ?>

                    </td>
                    <td class="text-right">
                        <?php echo e(number_format($item['harga'],0,",",".")); ?>

                    </td>
                    <?php if($totaldiscount != 0): ?>
                        <td class="text-right">
                            <?php if($item['discount'] != 0): ?>
                                <?php echo e(floatval($item['discount'])); ?>%
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <td class="text-right">
                        <?php echo e(number_format($item['subtotal'],0,",",".")); ?>

                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if($totaldiscount != 0): ?> <td></td> <?php endif; ?>
            <td style="text-align: right; font-size: 14px"><b>Subtotal Jasa:</b></td>
            <td style="text-align: right"><b><?php echo e(number_format($totaljasa)); ?></b></td>
            </tfoot>
        </table>
    <?php endif; ?>

    <table class="table table-condensed table-borderless pb-0 mb-0">
        <tbody>
        <?php if($serviceOrder->ppn == 1): ?>
            <tr>
                <td class="text-right" style="width:80%;">
                    <b>Total:</b>
                </td>
                <td  class="text-right" style="width:20%;">
                    <b><?php echo e(number_format($grandtotal)); ?></b>
                </td>
            </tr>
            <tr>
                <td class="text-right" style="width:80%;">
                    <b>PPN 10%:</b>
                </td>
                <td  class="text-right" style="width:20%;">
                    <b><?php echo e(number_format(0.1*$grandtotal)); ?></b>
                </td>
            </tr>
            <tr>
                <td class="text-right" style="width:80%;">
                    <h5>Grand total:</h5>
                </td>
                <td  class="text-right" style="width:20%;">
                    <h5><?php echo e(number_format(0.1*$grandtotal+$grandtotal)); ?></h5>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td class="text-right" style="width:80%;">
                    <h5>Grand total:</h5>
                </td>
                <td  class="text-right" style="width:20%;">
                    <h5><?php echo e(number_format($grandtotal)); ?></h5>
                </td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>

</div>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/show_fields.blade.php ENDPATH**/ ?>