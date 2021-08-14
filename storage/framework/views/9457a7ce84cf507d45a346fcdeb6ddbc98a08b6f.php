<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'File'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('fileCatalogues.index')); ?>">File</a></li>
                            <li class="breadcrumb-item active">ESTIMATE KTB MAY 2021</li>
                        </ol>
                    </h5>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="clearfix"></div>
        <div class="row mb-2">
            <div class="col-sm-6 col-lg-8">
                <div class="container-fluid">
                    <iframe width="1000" height="480" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?resid=7650A9230C2C9C80%211345&authkey=%21AP_ixaTGVtFuWtc&em=2&wdAllowInteractivity=False&ActiveCell='ETA'!A1&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True"></iframe>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues/index_excel.blade.php ENDPATH**/ ?>
