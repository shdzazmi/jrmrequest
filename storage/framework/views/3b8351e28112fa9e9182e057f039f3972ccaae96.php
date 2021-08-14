<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Request barang'); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-md-12" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request Barang</h1>
                    </div>
                    <div class="col-sm" align="right">
                        <a href="<?php echo e(route('export_excel')); ?>" data-toggle="tooltip" title="Export excel" class='btn btn-outline-info'>
                            <i class="fas fa-file-download"></i>
                            Export
                        </a>
                        <a href="<?php echo e(route('requestbarangs.index')); ?>" data-toggle="tooltip" class='btn btn-outline-info'>
                            Dashboard
                        </a>
                        <a class="btn btn-info"
                           href="<?php echo e(route('requestbarangs.create')); ?>">
                            Tambah baru
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="content px-3">

            <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="clearfix"></div>

            <div class="card card-outline card-info">
                <div class="card-body">
                    <?php echo $__env->make('requestbarangs.table', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/index_all.blade.php ENDPATH**/ ?>
