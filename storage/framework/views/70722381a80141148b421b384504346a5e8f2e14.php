<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Tambah File'); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Upload File</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <?php echo $__env->make('adminlte-templates::common.errors', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card">

            <?php echo Form::open(['route' => 'fileCatalogues.store', 'enctype'=>"multipart/form-data"]); ?>


            <div class="card-body">

                <div class="row">
                    <?php echo $__env->make('file_catalogues.fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

            </div>

            <div class="card-footer">
                <?php echo Form::submit('Upload Files', ['class' => 'btn btn-primary', 'onclick' => "tampilLoading('Uploading...');"]); ?>

                <a href="<?php echo e(route('fileCatalogues.index')); ?>" class="btn btn-default">Cancel</a>
            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues/create.blade.php ENDPATH**/ ?>
