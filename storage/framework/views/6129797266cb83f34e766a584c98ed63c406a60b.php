
<div class="table-responsive">
    <table class="table dataTable display" id="tbRequestApproval">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Direquest oleh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $requestbarangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requestbarang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $produk = $produks->firstWhere('barcode', $requestbarang->barcode)
                ?>
                <tr>
                    <td><?php echo e($requestbarang->tanggal); ?></td>
                    <td>
                        <?php echo e($requestbarang->nama); ?> <?php if($requestbarang->kendaraan != ""): ?> - <?php echo e($requestbarang->kendaraan); ?> <?php endif; ?><br>
                        <span class="badge badge-pill badge-primary"><?php echo e($requestbarang->barcode); ?></span>
                        <span class="badge badge-pill badge-primary"><?php echo e($requestbarang->kd_supplier); ?></span>
                        <?php if($requestbarang->partno1 != ""): ?>
                            <br/>PN: <?php echo e($requestbarang->partno1); ?>

                        <?php endif; ?>
                        <?php if($produk->qty!=''): ?>
                            <br>Stok: <?php echo e($produk->qty); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($requestbarang->keterangan); ?></td>
                    <td>
                        <?php echo e($requestbarang->user); ?>

                        <i class="fas fa-check-circle text-green" data-toggle="tooltip" title="Konfirmasi: <?php echo e($requestbarang->approve_request); ?>"></i>
                    </td>
                    <td>
                        <?php if(Auth::user()->divisi == 'Purchasing'): ?>
                            <?php if($requestbarang->status=='Requested'): ?>
                                <a href="<?php echo e(route('requestbarang.approve_purchase', [$requestbarang->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-check text-green"></i> Approve </a><br>
                            <?php else: ?>
                                <a href="<?php echo e(route('requestbarang.approve_purchase', [$requestbarang->id])); ?>" class="btn btn-default btn-xs"><i class="fas fa-times text-red"></i> Cancel </a><br>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class='btn-group'>
                            <a href="<?php echo e(route('requestbarangs.show', [$requestbarang->id])); ?>" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
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
            $table = $('#tbRequestApproval').DataTable({
                select: true,
                order: [[0, "desc"]],
                autoWidth: false,
                pageLength: 50,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                    emptyTable: "Tidak ada request barang saat ini"
                },
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'nama', name: 'nama'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'operator', name: 'operator'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/table_index_approval.blade.php ENDPATH**/ ?>