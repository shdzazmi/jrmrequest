<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<div class="table-responsive">
    <table class="table dataTable display" id="serviceOrders-table">
        <thead>
            <tr>
                <th>id</th>
                <th>No. Penawaran</th>
                <th>Outlet</th>
                <th>Nama</th>
                <th>Mobil</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th class="text-center">Status</th>
                <th class="text-center">Approval</th>
                <th class="text-center" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $serviceOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="vertical-align: middle"><?php echo e($serviceOrder->id); ?></td>
                <td style="vertical-align: middle"><?php echo e($serviceOrder->no_penawaran); ?></td>
                <td style="vertical-align: middle">
                    <?php if($serviceOrder->outlet == "JRM"): ?>
                        <i class="fas fa-store text-red"></i> <?php echo e($serviceOrder->outlet); ?>

                    <?php else: ?>
                        <i class="fas fa-warehouse text-blue"></i> <?php echo e($serviceOrder->outlet); ?>

                    <?php endif; ?>
                </td>
                <td style="vertical-align: middle"><?php echo e($serviceOrder->nama); ?></td>
                <td style="vertical-align: middle"><?php echo e($serviceOrder->mobil); ?> - <?php echo e($serviceOrder->nopol); ?></td>
                <td style="vertical-align: middle"><?php echo e($serviceOrder->tanggal); ?></td>
                <td style="vertical-align: middle"><?php echo e($serviceOrder->operator); ?></td>
                <td style="vertical-align: middle" class="text-center">
                    <?php if( $serviceOrder->status== 'Proses'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($serviceOrder->status); ?></a>
                        <?php if(Auth::user()->role == "Master" || Auth::user()->role == "Dev"): ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route("serviceOrders.editStatus", [$serviceOrder->id, "Batal"])); ?>"><span class="badge badge-pill badge-danger">Batal</span></a>
                            </div>
                        <?php endif; ?>
                    <?php elseif( $serviceOrder->status== 'Approved'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($serviceOrder->status); ?></a>
                        <?php if(Auth::user()->role == "Master" || Auth::user()->role == "Dev"): ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route("serviceOrders.editStatus", [$serviceOrder->id, "Batal"])); ?>"><span class="badge badge-pill badge-danger">Batal</span></a>
                            </div>
                        <?php endif; ?>
                    <?php elseif( $serviceOrder->status== 'Batal'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-danger"><?php echo e($serviceOrder->status); ?></a>
                    <?php endif; ?>
                </td>
                <td style="vertical-align: middle" class="text-center">
                    <?php if($serviceOrder->approve_produk != 'false'): ?>
                        <span class="badge badge-pill badge-success mb-1"><i class="fas fa-check"></i> Sparepart</span><br>
                    <?php else: ?>
                        <span class="badge badge-pill badge-warning text-white mb-1">Sparepart</span><br>
                    <?php endif; ?>
                    <?php if($serviceOrder->approve_service != 'false'): ?>
                        <span class="badge badge-pill badge-success mb-1"><i class="fas fa-check"></i> Service</span>
                    <?php else: ?>
                        <span class="badge badge-pill badge-warning text-white mb-1">Service</span><br>
                    <?php endif; ?>
                </td>
                <td style="vertical-align: middle" class="text-center" width="120">
                    <?php echo Form::open(['route' => ['serviceOrders.destroy', $serviceOrder->id], 'method' => 'delete']); ?>

                    <?php if($serviceOrder->status != 'Approved'): ?>
                        <?php if(Auth::user()->role=="Master"): ?>
                            <?php if(Auth::user()->divisi == 'Sparepart'): ?>
                                <?php if($serviceOrder->approve_produk == 'false'): ?>
                                    <a href="<?php echo e(route('serviceOrders.approve', [$serviceOrder->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('serviceOrders.approve', [$serviceOrder->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a>
                                <?php endif; ?>
                            <?php elseif(Auth::user()->divisi == 'Service'): ?>
                                <?php if($serviceOrder->approve_service == 'false'): ?>
                                    <a href="<?php echo e(route('serviceOrders.approve', [$serviceOrder->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('serviceOrders.approve', [$serviceOrder->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class='btn-group'>
                        <a href="<?php echo e(route('serviceOrders.show', [$serviceOrder->id])); ?>" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <?php if($serviceOrder->status != 'Approved'): ?>
                            <a href="<?php echo e(route('serviceOrders.edit', [$serviceOrder->id])); ?>" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                        <?php endif; ?>
                        <?php echo Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function() {
            const table = $('#serviceOrders-table').DataTable({
                select: true,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                },
                columns: [
                    {data: 'no', name: 'no'},
                    {data: 'no_penawaran', name: 'no_penawaran'},
                    {data: 'outlet', name: 'outlet'},
                    {data: 'nama', name: 'nama'},
                    {data: 'mobil', name: 'mobil'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'operator', name: 'operator'},
                    {data: 'status', name: 'status'},
                    {data: 'approval', name: 'approval'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[0, "desc"]],
                columnDefs: [
                    {
                        targets: [ 0 ],
                        visible: false,
                    }
                ],
                initComplete: function () {
                    $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
                },
            });
        });

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/table.blade.php ENDPATH**/ ?>