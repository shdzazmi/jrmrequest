<?php if($partno1 != ""): ?>
    PN1: <?php echo e($partno1); ?>

    <?php if($partno2 != ""): ?>
        <br>PN2: <?php echo e($partno2); ?>

    <?php endif; ?>
<?php else: ?>
    <?php if($partno2 != ""): ?>
        PN2: <?php echo e($partno2); ?>

    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues/columns/partnumber.blade.php ENDPATH**/ ?>