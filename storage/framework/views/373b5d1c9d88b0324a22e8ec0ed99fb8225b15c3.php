<style>

</style>

<div class="table-responsive">
    <table class="table dataTable display" id="tbRequest">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Operator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $requestbarangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requestbarang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo Form::open(['route' => ['requestbarangs.destroy', $requestbarang->id], 'method' => 'delete']); ?>


                <tr>
                    <td><?php echo e($requestbarang->tanggal); ?></td>
                    <td>
                        <?php echo e($requestbarang->nama); ?> <?php if($requestbarang->kendaraan != ""): ?> - <?php echo e($requestbarang->kendaraan); ?> <?php endif; ?><br>
                        <span class="badge badge-pill badge-primary"><?php echo e($requestbarang->barcode); ?></span>
                        <span class="badge badge-pill badge-primary"><?php echo e($requestbarang->kd_supplier); ?></span>
                        <?php if($requestbarang->partno1 != ""): ?> <br/>PN: <?php echo e($requestbarang->partno1); ?> <?php endif; ?>
                    </td>
                    <td><?php echo e($requestbarang->keterangan); ?></td>
                    <td><?php echo e($requestbarang->user); ?></td>
                    <td>
                        <?php if($requestbarang->status=='Proses'): ?> <span class="badge badge-pill badge-warning text-white">Proses</span>
                        <?php elseif($requestbarang->status=='Requested'): ?> <span class="badge badge-pill badge-info">Requested</span>
                        <?php elseif($requestbarang->status=='Approved'): ?> <span class="badge badge-pill badge-primary">Approved</span>
                        <?php elseif($requestbarang->status=='Done'): ?> <span class="badge badge-pill badge-success">Done</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(Auth::user()->role == 'Head'): ?>
                            <?php if($requestbarang->status=='Proses'): ?>
                                <a href="<?php echo e(route('requestbarang.approve_request', [$requestbarang->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Konfirmasi </a><br>
                            <?php elseif($requestbarang->status=='Requested'): ?>
                                <a href="<?php echo e(route('requestbarang.approve_request', [$requestbarang->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a><br>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($requestbarang->status == "Proses"): ?>
                        <div class='btn-group'>
                            <a href="<?php echo e(route('requestbarangs.show', [$requestbarang->id])); ?>" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head"): ?>
                                <a href="<?php echo e(route('salesOrders.edit', [$requestbarang->id])); ?>" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <?php echo Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                    </td>
                </tr>
                <?php echo Form::close(); ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            const table = $('#tbRequest').DataTable({
                select: true,
                pageLength: 50,
                order: [[0, "desc"]],
                autoWidth: false,
                oSearch: {"sSearch": "<?php echo e($nama); ?>"},
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'user', name: 'user'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                }
            });
        })

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/table_all.blade.php ENDPATH**/ ?>