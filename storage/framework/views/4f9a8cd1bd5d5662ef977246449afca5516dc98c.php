
<div class="table-responsive">
    <table class="table dataTable display" id="tbRequestSum">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Operator</th>
                <th>Status</th>
                <th>Approver</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $requestbarangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requestbarang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($requestbarang->tanggal); ?></td>
                <td>
                    <?php echo e($requestbarang->nama); ?> <?php if($requestbarang->kendaraan != ""): ?> - <?php echo e($requestbarang->kendaraan); ?> <?php endif; ?><br>
                    <span class="badge badge-pill badge-primary"><?php echo e($requestbarang->barcode); ?></span>
                    <span class="badge badge-pill badge-primary"><?php echo e($requestbarang->kd_supplier); ?></span>
                    <?php if($requestbarang->partno1 != ""): ?> <br/>PN: <?php echo e($requestbarang->partno1); ?> <?php endif; ?>
                </td>
                <td><?php echo e($requestbarang->keterangan); ?></td>
                <td>
                    <?php echo e($requestbarang->user); ?>

                    <i class="fas fa-check-circle text-green" data-toggle="tooltip" title="Konfirmasi: <?php echo e($requestbarang->approve_request); ?>"></i>
                </td>
                <td>
                    <?php if($requestbarang->status=='Proses'): ?> <span class="badge badge-pill badge-warning text-white">Proses</span>
                    <?php elseif($requestbarang->status=='Requested'): ?> <span class="badge badge-pill badge-info">Requested</span>
                    <?php elseif($requestbarang->status=='Approved'): ?> <span class="badge badge-pill badge-primary">Approved</span>
                    <?php elseif($requestbarang->status=='Done'): ?> <span class="badge badge-pill badge-success">Done</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($requestbarang->approve_purchase); ?></td>
                <td>
                    <?php if(Auth::user()->divisi == 'Purchasing'): ?>
                        <?php if($requestbarang->status=='Approved'): ?>
                            <a href="<?php echo e(route('requestbarang.request_done', [$requestbarang->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Done </a>
                        <?php endif; ?>
                    <?php endif; ?>
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
            $table = $('#tbRequestSum').DataTable({
                select: true,
                order: [[0, "desc"]],
                autoWidth: false,
                pageLength: 50,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                    emptyTable: "Tidak ada request yang telah disetujui"
                },
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'user', name: 'user'},
                    {data: 'status', name: 'status'},
                    {data: 'approve_purchase', name: 'approve_purchase'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/table_index.blade.php ENDPATH**/ ?>