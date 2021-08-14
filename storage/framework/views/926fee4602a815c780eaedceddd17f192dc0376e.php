<?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev"): ?>
    <?php echo Form::open(['route' => ['destroyAll', $barcode], 'method' => 'delete']); ?>

    <?php echo Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'id'=>'delete-data','onclick' => "return confirm('Hapus semua request produk ini?')"]); ?>

    <?php echo Form::close(); ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/bladeaction/dashboard_action_requestbarangs.blade.php ENDPATH**/ ?>