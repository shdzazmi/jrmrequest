<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Request barang'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request Barang</h1>
                    </div>
                    <div class="col-sm" align="right">
                        <a href="<?php echo e(route('export_excel')); ?>" title="Export excel" class='btn btn-outline-info'>
                            <i class="fas fa-file-download"></i>
                            Export
                        </a>
                        <a href="<?php echo e(route('showAll')); ?>" class='btn btn-outline-info'>
                            Semua request
                        </a>
                        <?php if(Auth::user()->divisi == 'Purchasing' || Auth::user()->role == 'Dev'): ?>
                        <a href="<?php echo e(route('requestbarang.index_approval')); ?>" class='btn btn-outline-info'>
                            Approval
                        </a>
                        <?php endif; ?>
                        <a class="btn btn-info"
                           href="<?php echo e(route('requestbarangs.create')); ?>">
                            Tambah baru
                        </a>
                    </div>

                </div>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Petunjuk</h5>
                    Request barang berisi data barang kosong yang pernah diminta oleh customer, klik tombol Tambah baru untuk menambahkan data.
                    Berikut data Request yang telah disetujui oleh Purchasing.
                </div>

            </div>
        </section>

        <div class="content px-3">

            <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-outline card-info">
                <div class="card-body">
                    <?php echo $__env->make('requestbarangs.table_index', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/index.blade.php ENDPATH**/ ?>
