<?php echo Form::open(['route' => ['salesOrders.destroy', $id], 'method' => 'delete']); ?>

<div class='btn-group'>
    <a href="<?php echo e(route('salesOrders.show', [$id])); ?>" class='btn btn-default btn-xs'>
        <i class="far fa-eye"></i>
    </a>
    <?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head"): ?>
        <a href="<?php echo e(route('salesOrders.edit', [$id])); ?>" class='btn btn-default btn-xs'>
            <i class="far fa-edit"></i>
        </a>
        <?php echo Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

    <?php endif; ?>
</div>
<?php echo Form::close(); ?>


<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/bladeaction/action_sales_order.blade.php ENDPATH**/ ?>