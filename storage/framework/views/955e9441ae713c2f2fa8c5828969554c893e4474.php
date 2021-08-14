<style>
    tr.hide-table-padding td {
        padding: 0;
    }

    .table-nopadding{
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .accordion-toggle .expand-button:after
    {
        position: absolute;
        left:.75rem;
        top: 50%;
        transform: translate(0, -50%);
        content: '-';
    }
    .accordion-toggle.collapsed .expand-button:after
    {
        content: '+';
    }
    #tbRequest tbody tr:hover{
        cursor: pointer;
    }
</style>

<div class="table-responsive table p-0">
    <table class="table-sm table table-striped table-nopadding " id="tbRequest">
        <thead>
        <tr>
            <th style="text-align: center; width:5%;">No</th>
            <th style="width:50%;">Produk</th>
            <th style="text-align: center; width:10%;">Qty</th>
            <th style="text-align: center; width:15%;">Harga</th>
            <th style="text-align: center; width:15%;">Ket</th>
            <th style="text-align: center; width:20%;">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        <?php $i=1 ?>
        <?php $__currentLoopData = $listorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $produk = $produks->firstWhere('barcode', $item->barcode) ?>
            <tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse-<?php echo e($item->id); ?>">
            <td><?php echo e($i++); ?></td>
            <td>
                <?php echo e($produk->nama); ?> <?php if($produk->kendaraan != ""): ?> • <?php echo e($produk->kendaraan); ?> <?php endif; ?>
            </td>
            <td style="text-align: center">
                <?php echo e(number_format($item->qty)); ?> <?php echo e($produk->satuan); ?>

            </td>
            <td class="text-right">
                <?php echo e(number_format($item->harga,0,",",".")); ?>

            </td>
            <td>
                <?php echo e($item->keterangan); ?>

            </td>
            <td class="text-right">
                 <?php echo e(number_format($item->subtotal,0,",",".")); ?>

            </td>
            </tr>

            <tr class="hide-table-padding">
                <td></td>
                <td colspan="5">
                    <div id="collapse-<?php echo e($item->id); ?>" class="collapse in">
                        <p>
                            Barcode:&nbsp<?php echo e($item->barcode); ?>&nbsp&nbsp
                            Supplier:&nbsp<?php echo e($produk->kd_supplier); ?>&nbsp&nbsp
                            <?php if($produk->kendaraan != ""): ?>
                                <br>Kendaraan:&nbsp<?php echo e($produk->kendaraan); ?>&nbsp&nbsp
                            <?php endif; ?>
                            <br>
                            <?php if($produk->merek != ""): ?>
                                Merek:&nbsp<span class="badge badge-dark"><?php echo e($produk->merek); ?></span>
                            <?php endif; ?>
                            <?php if($produk->partno1 != ""): ?>
                                Part number:&nbsp<span class="badge badge-dark">1. <?php echo e($produk->partno1); ?></span>
                                <?php if($produk->partno2 != ""): ?>
                                    <span class="badge badge-dark">2. <?php echo e($produk->partno2); ?></span>&nbsp&nbsp
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($produk->partno2 != ""): ?>
                                    <span class="badge badge-dark">1. <?php echo e($produk->partno2); ?></span>&nbsp&nbsp
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($produk->lokasi1 != ""): ?>
                                <br>Lokasi:&nbsp<span class="badge badge-dark">1. <?php echo e($produk->lokasi1); ?></span>
                            <?php endif; ?>
                            <?php if($produk->lokasi2 != ""): ?>
                                <span class="badge badge-dark">2. <?php echo e($produk->lokasi2); ?></span>&nbsp&nbsp
                            <?php endif; ?>
                            <?php if($produk->lokasi3 != ""): ?>
                                <span class="badge badge-dark">3. <?php echo e($produk->lokasi3); ?></span>&nbsp&nbsp
                            <?php endif; ?>
                            Stok: <span class="badge badge-dark"><?php echo e(number_format($produk->qty)); ?></span>
                            <?php if($item->keterangan != ''): ?>
                                <br>Ket: <?php echo e($item->keterangan); ?>

                            <?php endif; ?>

                        </p>
                    </div>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <table class="table dataTable display">
            <tbody>
            <tr>
                <th class="text-right" style="width:80%;">
                    Total:
                </th>
                <td  class="text-right" style="width:20%;">
                    <b><?php echo e(number_format($totalharga)); ?></b>
                </td>
            </tr>
            </tbody>
        </table>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/show_fields.blade.php ENDPATH**/ ?>