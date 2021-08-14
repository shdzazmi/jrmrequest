<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Pencarian katalog genuine'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Pencarian Katalog Genuine</h1>
                </div>
                <div class="col-sm" align="right">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

    </section>

    <div class="content px-3 pb-3">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#daihatsu" role="tab">Daihatsu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#ford" role="tab">Ford</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#hino" role="tab">Hino</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#honda" role="tab">Honda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#isuzu" role="tab">Isuzu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#mitsubishi" role="tab">Mitsubishi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#suzuki" role="tab">Suzuki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#toyota" role="tab">Toyota</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" align="center" id="index" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <img src="<?php echo e(asset('storage/catalogue.png')); ?>" alt="catalogue" width="600">
                    </div>
                    <div class="tab-pane fade" id="daihatsu" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_daihatsu', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="ford" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_ford', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="hino" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_hino', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="honda" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_honda', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="isuzu" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_isuzu', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="mitsubishi" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_mitsubishi', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="suzuki" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_suzuki', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="toyota" role="tabpanel">
                        <?php echo $__env->make('file_catalogues_genuine.table_toyota', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_scripts'); ?>
    <script>

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues_genuine/index.blade.php ENDPATH**/ ?>
