<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e(config('app.name')); ?> | <?php echo $__env->yieldContent('title'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/png" href="/jrm/public/favicon.png"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <?php echo $__env->yieldContent('third_party_stylesheets'); ?>

    <?php echo $__env->yieldPushContent('page_css'); ?>

</head>

<table>
            <thead>
            <tr>
                <th></th>
                <th>Cust: <?php echo e($serviceOrder->nama); ?></th>
                <th></th>
                <th>Mobil: <?php echo e($serviceOrder->mobil); ?> - <?php echo e($serviceOrder->nopol); ?></th>
                <th></th>
                <th>Tgl: <?php echo e($serviceOrder->tanggal); ?></th>
                <th></th>
                <th></th>
                <th>No: <?php echo e($serviceOrder->no_penawaran); ?></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Qty</th>
                <th>Produk</th>
                <th>Barcode</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Part number 2</th>
                <?php if($totaldiscount != 0): ?><th>Discount %</th><?php endif; ?>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Stok Toko</th>
                <th>Stok Gudang</th>
            </tr>
</thead>
<tbody>
                <?php $i=1 ?>
                <?php $__currentLoopData = $listorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $produk = $produks->firstWhere('barcode', $item['barcode']) ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e(number_format($item['qty'])); ?> <?php echo e($produk->satuan); ?></td>
                        <td><?php echo e($produk->nama); ?> <?php if($produk['merek'] != ""): ?> (<?php echo e($produk['merek']); ?>) <?php endif; ?></td>
                        <td><?php echo e($produk->barcode); ?></td>
                        <td><?php echo e($produk->kd_supplier); ?></td>
                        <td><?php echo e($produk->kendaraan); ?></td>
                        <td>
                            <?php if($produk->partno2 != ""): ?>
                                <?php echo e($produk->partno2); ?>

                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                            <?php if($totaldiscount != 0): ?>
                                <td class="text-right">
                                    <?php echo e($item['discount']); ?>%
                                </td>
                            <?php endif; ?>
                        <td><?php echo e($item['harga']); ?></td>
                        <td><?php echo e($item['subtotal']); ?></td>
                        <td><?php echo e($produk->qtyTk); ?></td>
                        <td><?php echo e($produk->qtyGd); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>SUBTOTAL PART</b></td>
                    <td><b><?php echo e($totalproduk); ?></b></td>
                </tr>
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
                        <td><?php echo e(number_format($item['qty'])); ?></td>
                        <td><?php echo e($produk->nama); ?></td>
                        <td><?php echo e($barcode); ?></td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <?php if($totaldiscount != 0): ?>
                            <td class="text-right">
                                <?php echo e($item['discount']); ?>%
                            </td>
                        <?php endif; ?>
                        <td><?php echo e($item['harga']); ?></td>
                        <td><?php echo e($item['subtotal']); ?></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>SUBTOTAL JASA</b></td>
                    <td><b><?php echo e($totaljasa); ?></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>TOTAL</b></td>
                    <td><b><?php echo e($grandtotal); ?></b></td>
                </tr>
</tbody>
 </table>
 </html>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/export/services_orders_excel.blade.php ENDPATH**/ ?>