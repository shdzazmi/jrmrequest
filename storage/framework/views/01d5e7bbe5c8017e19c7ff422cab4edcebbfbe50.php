<?php if( $status== 'Proses'): ?>
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($status); ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Selesai"])); ?>"><span class="badge badge-pill badge-success">Selesai</span></a>
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Batal"])); ?>"><span class="badge badge-pill badge-danger">Batal</span></a>
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Void"])); ?>"><span class="badge badge-pill badge-secondary">Void</span></a>
        </div>
    </td>
<?php elseif( $status== 'Selesai'): ?>
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($status); ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Batal"])); ?>"><span class="badge badge-pill badge-danger">Batal</span></a>
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Void"])); ?>"><span class="badge badge-pill badge-secondary">Void</span></a>
        </div>
    </td>
<?php elseif( $status== 'Batal'): ?>
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($status); ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Selesai"])); ?>"><span class="badge badge-pill badge-success">Selesai</span></a>
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Void"])); ?>"><span class="badge badge-pill badge-secondary">Void</span></a>
        </div>
    </td>
<?php else: ?>
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($status); ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Batal"])); ?>"><span class="badge badge-pill badge-danger">Batal</span></a>
            <a class="dropdown-item" href="<?php echo e(route("salesOrder.editStatus", [$id, "Selesai"])); ?>"><span class="badge badge-pill badge-success">Selesai</span></a>
        </div>
    </td>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/bladeaction/badge_sales_order.blade.php ENDPATH**/ ?>