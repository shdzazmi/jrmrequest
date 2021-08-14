<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Buat request'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Request barang</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <?php echo $__env->make('adminlte-templates::common.errors', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card">

            <?php echo Form::open(['route' => 'requestbarangs.store']); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo $__env->make('requestbarangs.fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class="card-footer">
                <?php echo Form::submit('Save', ['class' => 'btn btn-primary', 'id'=>'add-data']); ?>

                <a href="<?php echo e(route('requestbarangs.index')); ?>" class="btn btn-default">Cancel</a>
            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/create.blade.php ENDPATH**/ ?>
