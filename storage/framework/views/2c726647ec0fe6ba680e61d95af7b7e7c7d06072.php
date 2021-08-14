<!-- Tanggal Field -->
<div class="col-sm-12">
    <?php echo Form::label('tanggal', 'Tanggal:'); ?>

    <p><?php echo e($requestbarang->tanggal); ?></p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    <?php echo Form::label('nama', 'Produk:'); ?>

    <p><?php echo e($requestbarang->nama); ?></p>
</div>

<!-- Barcode Field -->
<div class="col-sm-12">
    <?php echo Form::label('barcode', 'Barcode:'); ?>

    <p><?php echo e($requestbarang->barcode); ?></p>
</div>

<!-- Kendaraan Field -->
<div class="col-sm-12">
    <?php echo Form::label('kendaraan', 'Kendaraan:'); ?>

    <p><?php echo e($requestbarang->kendaraan); ?></p>
</div>

<!-- Part Number Field -->
<div class="col-sm-12">
    <?php echo Form::label('partno1', 'Part Number:'); ?>

    <p><?php echo e($requestbarang->partno1); ?></p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    <?php echo Form::label('keterangan', 'Keterangan:'); ?>

    <p><?php echo e($requestbarang->keterangan); ?></p>
</div>

<!-- User Field -->
<div class="col-sm-12">
    <?php echo Form::label('user', 'Direquest oleh:'); ?>

    <p><?php echo e($requestbarang->user); ?></p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    <?php echo Form::label('created_at', 'Created At:'); ?>

    <p><?php echo e($requestbarang->created_at); ?></p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    <?php echo Form::label('updated_at', 'Updated At:'); ?>

    <p><?php echo e($requestbarang->updated_at); ?></p>
</div>

<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/show_fields.blade.php ENDPATH**/ ?>