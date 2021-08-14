<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Service order SV'. $serviceOrder->id); ?>
<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-10 offset-md-1">
                <div class="col-sm-6">
                    <h1>Service Order Details</h1>
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
                        <?php if($serviceOrder->status == 'Approved' || Auth::user()->role == "Dev"): ?>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="modal_exportservice()"><i class="fas fa-file-pdf" style="color: darkred;"></i> PDF</a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="<?php echo e(route('serviceOrders.export_excel',[$serviceOrder->uid])); ?>"><i class="fas fa-file-excel" style="color: darkgreen;"></i> Excel</a>
                    </div>
                <?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head"): ?>
                    <?php if(substr($serviceOrder->no_penawaran, 0, 1) !== 'O'): ?>

                    <?php if($serviceOrder->status == 'Proses'): ?>
                        <a class="btn btn-outline-info float-right" href="<?php echo e(route('serviceOrders.edit', [$serviceOrder->id])); ?>">
                    <?php else: ?>
                        <a class="btn btn-outline-info float-right disabled"  href="javascript:void(0)" onclick="toastError('Gagal', 'Order sudah Approved! tidak bisa edit')">
                    <?php endif; ?>
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="card">
                <div class="card-header pt-4">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5><i class="fas fa-cog"></i> Jaya Raya Mobil</h5>
                            <?php echo Form::label('nama', 'Customer: '); ?>

                            <?php echo e($serviceOrder->nama); ?> &nbsp
                            <?php echo Form::label('nama', 'Mobil: '); ?>

                            <?php echo e($serviceOrder->mobil); ?> - <?php echo e($serviceOrder->nopol); ?> &nbsp
                            <?php echo Form::label('tanggal', 'Tanggal:'); ?>

                            <?php echo e($serviceOrder->tanggal); ?> &nbsp
                            <br>
                            <?php echo Form::label('bongkar', 'Bongkar:'); ?>

                            <?php if($serviceOrder->tanpabongkar == 0): ?> <i class="fas fa-check-circle text-success"></i> <?php elseif($serviceOrder->tanpabongkar == 1): ?> <i class="fas fa-times-circle text-danger"></i>  <?php endif; ?>  &nbsp
                            <?php echo Form::label('PPN', 'PPN:'); ?>

                            <?php if($serviceOrder->ppn == 1): ?> <i class="fas fa-check-circle text-success"></i> <?php elseif($serviceOrder->ppn == 0): ?> <i class="fas fa-times-circle text-danger"></i>  <?php endif; ?>

                        </div>
                        <div class="col-sm-4 text-right">
                            <?php if($serviceOrder->status === "Proses"): ?>
                                <div class="badge badge-warning text-white text-md">
                                    <?php echo e($serviceOrder->status); ?>

                                </div>
                            <?php endif; ?>
                            <?php if($serviceOrder->status === "Approved"): ?>
                                <div class="badge badge-success text-md">
                                    <?php echo e($serviceOrder->status); ?>

                                </div>
                            <?php endif; ?>
                            <?php if($serviceOrder->status === "Batal"): ?>
                                <div class="badge badge-danger text-md">
                                    <?php echo e($serviceOrder->status); ?>

                                </div>
                            <?php endif; ?>
                            <br>
                            <?php echo Form::label('id', 'No. Penawaran: '); ?>

                            <?php echo e($serviceOrder->no_penawaran); ?> &nbsp
                        </div>
                    </div>

                </div>
                <div class="card-body p-0">
                    <?php echo $__env->make('service_orders.show_fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo Form::label('nama', 'Tgl Cetak: '); ?>

                            <?php echo e($serviceOrder->operator); ?> - <?php echo e($serviceOrder->created_at); ?>&nbsp
                            <?php echo Form::label('tanggal', 'Terakhir edit:'); ?>

                            <?php echo e($serviceOrder->updated_by); ?> - <?php echo e($serviceOrder->updated_at); ?>&nbsp
                            <?php if($serviceOrder->times_updated != null): ?>
                                (<?php echo e($serviceOrder->times_updated); ?>x)
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Export pdf Modal -->
    <div class="modal fade" id="modal-export">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Export PDF</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center">
                    <div class="row">
                        <div class="col-sm-12" style="text-align: center">
                            <h5>Pilih tampilan:</h5>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-app bg-secondary m-0" href="<?php echo e(route('serviceOrders.getPdf',[$serviceOrder->uid])); ?>"><i class="fas fa-file-invoice"></i> <h6>Detail</h6></a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-app bg-secondary m-0" href="<?php echo e(route('serviceOrders.getPdfSimple',[$serviceOrder->uid])); ?>"><i class="fas fa-file-alt"></i> <h6>Ringkas</h6></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>

    <script>

        function modal_exportservice() {
            $('#modal-export').modal('show');
        }

        function export_disabled(){
            Swal.fire(
                'Belum disetujui!',
                'Hubungi atasan untuk segera disetujui',
                'error'
            )
        }

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/show.blade.php ENDPATH**/ ?>
