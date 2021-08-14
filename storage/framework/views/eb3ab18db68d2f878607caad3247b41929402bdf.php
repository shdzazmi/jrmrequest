<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Request barang'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

<?php $__env->startSection('content'); ?>
    <div class="col-md-10 offset-md-1" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request Approval</h1>
                    </div>
                    <div class="col-sm" align="right">







                    </div>

                </div>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                    Beri approval untuk barang yang direquest oleh staff Gudang.
                </div>
            </div>
        </section>

        <div class="content px-3">

            <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-outline card-info">
                <div class="card-body">
                    <?php echo $__env->make('requestbarangs.table_index_approval', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/index_approval.blade.php ENDPATH**/ ?>
