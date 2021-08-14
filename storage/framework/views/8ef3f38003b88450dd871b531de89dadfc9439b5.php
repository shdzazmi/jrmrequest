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
                <th colspan="3">Action</th>
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
                        <?php if($requestbarang->partno1 != ""): ?>
                            <br/>PN: <?php echo e($requestbarang->partno1); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($requestbarang->keterangan); ?></td>
                    <td><?php echo e($requestbarang->user); ?></td>
                    <td>
                        <span class="badge badge-pill badge-warning text-white">Proses</span>
                        <span class="badge badge-pill badge-info">Requested</span>
                        <span class="badge badge-pill badge-primary">Approved</span>
                        <span class="badge badge-pill badge-success">Done</span>
                    </td>
                    <td><a class="btn btn-sm btn-default">Aksi</a></td>
                </tr>
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
                autoWidth: false,
                oSearch: {"sSearch": "<?php echo e($nama); ?>"},
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'namabarcode', name: 'namabarcode'},
                    {data: 'kd_supplier', name: 'kd_supplier'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'partno1', name: 'partno1'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'user', name: 'user'},
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
