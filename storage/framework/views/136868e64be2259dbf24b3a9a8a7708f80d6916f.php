<style>
    img {
        object-fit: cover;
        height: 100px;
    }
</style>

<?php $__currentLoopData = $fileCatalogues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileCatalogue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card mb-2 shadow">
        <?php if($fileCatalogue->cover_path == ""): ?>
            <a href="<?php echo e($fileCatalogue->file_path); ?>"><span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span></a>
        <?php else: ?>
            <a href="<?php echo e($fileCatalogue->file_path); ?>"><span class="mailbox-attachment-icon has-img"><img src="<?php echo e($fileCatalogue->cover_path); ?>" alt="Cover" style="height: 180px"></span></a>
        <?php endif; ?>
        <div class="mailbox-attachment-info" style="height:100%;">
            <a href="<?php echo e($fileCatalogue->file_path); ?>" class="mailbox-attachment-name"><i class="fas fa-file-pdf"></i> <?php echo e($fileCatalogue->Nama); ?></a>
            <span class="mailbox-attachment-size mt-1">
                <?php if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" ): ?>
                    <?php echo Form::open(['route' => ['fileCatalogues.destroy', $fileCatalogue->id], 'method' => 'delete']); ?>


                    <div class="card-tools float-right">
                        <a href="<?php echo e(route('fileCatalogues.edit', [$fileCatalogue->id])); ?>" type="button" class="btn btn-tool"><i class="far fa-edit"></i></a>

                        <button type="submit" class="btn btn-tool" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <?php echo Form::close(); ?>

                <?php endif; ?>
            </span>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues/grid.blade.php ENDPATH**/ ?>