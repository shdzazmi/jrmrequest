<?php echo e($ketnama); ?> <?php if($kendaraan != ""): ?> • <?php echo e($kendaraan); ?> <?php endif; ?>
<br/>
<span class="badge bg-secondary"><?php echo e($barcode); ?></span>
<span class="badge bg-secondary"><?php echo e($kd_supplier); ?></span>
<span class="badge bg-primary"><?php echo e($merek); ?></span>
<?php if($partno1 != ""): ?>
    <br>
    Part number:
    <span class="badge badge-dark"><?php echo e($partno1); ?></span>
    <?php if($partno2 != ""): ?>
        <span class="badge badge-dark"><?php echo e($partno2); ?></span>&nbsp&nbsp
    <?php endif; ?>
<?php else: ?>
    <?php if($partno2 != ""): ?>
        <span class="badge badge-dark"><?php echo e($partno2); ?></span>&nbsp&nbsp
    <?php endif; ?>
<?php endif; ?>

<?php if($lokasi1 != ""): ?>
    <br>Lokasi:&nbsp<span class="badge badge-dark"><?php echo e($lokasi1); ?></span>
<?php endif; ?>
<?php if($lokasi2 != ""): ?>
    <span class="badge badge-dark"><?php echo e($lokasi2); ?></span>&nbsp&nbsp
<?php endif; ?>
<?php if($lokasi3 != ""): ?>
    <span class="badge badge-dark"><?php echo e($lokasi3); ?></span>&nbsp&nbsp
<?php endif; ?>
<br>
Harga:
1 <span class="badge badge-dark"><?php echo e(number_format($harga)); ?></span>&nbsp&nbsp
2 <span class="badge badge-dark"><?php echo e(number_format($harga2)); ?></span>&nbsp&nbsp
3 <span class="badge badge-dark"><?php echo e(number_format($harga3)); ?></span>&nbsp&nbsp
Min <span class="badge badge-dark"><?php echo e(number_format($hargamin)); ?></span>&nbsp&nbsp
<br>
Stok: <span class="badge badge-primary"><?php echo e($qty); ?></span> <?php echo e($satuan); ?>

<br>
Stok Toko: <span class="badge badge-dark"><?php echo e($qtyTk); ?></span>&nbsp&nbsp Stok Gudang <span class="badge badge-dark"><?php echo e($qtyGd); ?></span>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/search_produk/columns/produk_simple.blade.php ENDPATH**/ ?>