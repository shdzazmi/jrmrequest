<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Sales order'); ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-10 offset-md-1">
                <div class="col-sm-6">
                    <h1>Sales Order Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="col-sm-10 offset-md-1">
        <div class="content px-3">

            <div class="pb-2">
                <a class="btn btn-default" href="<?php echo e(url()->previous()); ?>">Back</a>
                <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-download"></i>
                    Export
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo e(route('salesOrder.getPdf',[$salesOrder->uid])); ?>"><i class="fas fa-file-pdf" style="color: darkred;"></i> PDF</a>
                    <a class="dropdown-item" href="<?php echo e(route('salesOrder.export_excel',[$salesOrder->uid])); ?>"><i class="fas fa-file-excel" style="color: darkgreen;"></i> Excel</a>
                </div>
                <?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head"): ?>
                    <?php if(substr($salesOrder->uid, 0, 1) !== 'S'): ?>
                        <a class="btn btn-outline-info float-right" href="<?php echo e(route('salesOrders.edit', [$salesOrder->id])); ?>">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="position-relative" style="height: 180px">

                <div class="card">
                    <div class="card-header pt-4">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h5><i class="fas fa-cog"></i> Jaya Raya Mobil</h5>
                                    <?php echo Form::label('nama', 'Customer: '); ?>

                                    <?php echo e($salesOrder->nama); ?> &nbsp
                                    <?php echo Form::label('tanggal', 'Tanggal:'); ?>

                                    <?php echo e($salesOrder->tanggal); ?> &nbsp
                                </div>
                                <div class="col text-right">
                                    <?php if($salesOrder->status === "Proses"): ?>
                                        <div class="badge badge-warning text-white text-md">
                                            <?php echo e($salesOrder->status); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if($salesOrder->status === "Selesai"): ?>
                                        <div class="badge badge-success text-md">
                                            <?php echo e($salesOrder->status); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if($salesOrder->status === "Batal"): ?>
                                        <div class="badge badge-danger text-md">
                                            <?php echo e($salesOrder->status); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if($salesOrder->status === "Void"): ?>
                                        <div class="badge badge-secondary text-md">
                                            <?php echo e($salesOrder->status); ?>

                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <?php echo Form::label('id', 'No. Order: '); ?>

                                    <?php if(substr($salesOrder->uid, 0, 1) === 'S'): ?>
                                        <?php echo e($salesOrder->uid); ?>

                                    <?php else: ?>
                                        SO<?php echo e($salesOrder->id); ?> &nbsp
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                    <div class="card-body p-0">
                        <?php echo $__env->make('sales_orders.show_fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>

    <script>



    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/show.blade.php ENDPATH**/ ?>
