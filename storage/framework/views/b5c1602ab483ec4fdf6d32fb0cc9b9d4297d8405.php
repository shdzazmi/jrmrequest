<style>
    #tbproduk_catalogue{
        display:none;
    }
</style>

<!-- Table produk simple-->
    <div class="card-body table-responsive p-0 pb-2">
        <table style="table-layout: fixed;" class="table dataTable display"  id="tbproduk_catalogue">
            <thead>
            <tr style="text-align:center">
                <th style="">ID</th>
                <th style="width: 30%">Produk</th>
                <th style="width: 15%">PN1</th>
                <th style="width: 15%">PN2</th>
                <th style="width: 20%">Kendaraan</th>
                <th style="width: 10%">Harga</th>
                <th style="width: 10%">Merek</th>
            </tr>
            </thead>











            <tbody class="p-0 m-0">
                <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->nama); ?></td>
                        <td><?php echo e($item->partno1); ?></td>
                        <td><?php echo e($item->partno2); ?></td>
                        <td><?php echo e($item->kendaraan); ?></td>
                        <td><?php echo e($item->harga); ?></td>
                        <td><?php echo e($item->merek); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->startPush('page_scripts'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    // tampilLoading('Memuat...');
    $(document).ready(function() {
        $('#tbproduk_catalogue tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="search" class="form-control"/>' );
        } );

        const tbProduk = $('#tbproduk_catalogue').DataTable({
            order: [[0, "asc"]],
            autoWidth: false,
            columnDefs: [
                {
                    targets: [ 0 ],
                    visible: false,
                }
            ],
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "Baris: _MENU_",
            },
            initComplete: function () {
                Swal.close();
                $("#tbproduk_catalogue").show();
                // // Apply the search
                // this.api().columns().every( function () {
                //     var that = this;
                //
                //     $( 'input', this.footer() ).on( 'keyup change clear', function () {
                //         if ( that.search() !== this.value ) {
                //             that
                //                 .search( this.value )
                //                 .draw();
                //         }
                //     } );
                // } );
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues_genuine/table.blade.php ENDPATH**/ ?>
