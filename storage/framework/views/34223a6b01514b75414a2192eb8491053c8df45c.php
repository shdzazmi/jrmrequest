<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Service order'); ?>
<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<?php $__env->startSection('content'); ?>

    <div class="animate__animated animate__fadeIn preloader flex-column justify-content-center align-items-center">
        <img class="animate__animated animate__rubberBand animate__infinite" src="<?php echo e(asset('storage/logo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
        <h3>Memuat . . .</h3>
    </div>

    <div class="col-md-12">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Service Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right"
                           href="<?php echo e(route('serviceOrders.create')); ?>">
                            Tambah baru
                        </a>
                    </div>
                </div>
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                    Ubah status Service Order dengan cara klik Badge status, buat Service Order baru dengan cara klik tombol Tambah Baru.<br>
                    Service order hanya bisa dicetak jika statusnya Approved.
                </div>
            </div>
        </section>

        <div class="content px-3">

            <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="clearfix"></div>

            <div class="card card-primary card-outline">
                <div class="card-body">
                    <?php echo $__env->make('service_orders.table', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="card-footer clearfix float-right">
                        <div class="float-right">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/index.blade.php ENDPATH**/ ?>
