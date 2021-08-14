<div><?php echo e($ketnama); ?> <?php if($kendaraan != ""): ?> • <?php echo e($kendaraan); ?> <?php endif; ?></div>
<span class="badge bg-dark"><?php echo e($barcode); ?></span>
<span class="badge bg-primary"><?php echo e($kd_supplier); ?></span>
<span class="badge bg-primary"><?php echo e($merek); ?></span><br/>

<?php if($partno1 != ""): ?>
    <span class="badge badge-pill bg-secondary">PN1</span> <?php echo e($partno1); ?><br/>
<?php else: ?>
    <span class="badge badge-pill bg-secondary">PN1</span> -<br/>
<?php endif; ?>

<?php if($partno2 != ""): ?>
    <span class="badge badge-pill bg-secondary">PN2</span> <?php echo e($partno2); ?><br/>
<?php else: ?>
    <span class="badge badge-pill bg-secondary">PN2</span> -<br/>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/columns/produk.blade.php ENDPATH**/ ?>