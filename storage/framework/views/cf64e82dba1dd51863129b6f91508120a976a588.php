<style>
    #salesorderproduk_simples{
        display:none;
    }
</style>

<!-- Table produk simple-->
    <div style="font-size:12px;" class="card-body table-responsive p-0 pb-2">
        <table style="font-size:12px; table-layout: fixed;" class="table dataTable display"  id="salesorderproduk_simples">
            <thead>
            <tr style="text-align:center">
                <th style="width: 85%">Produk</th>
                <th style="width: 15%">Qty</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="tbsalesorder_simple" class="p-0 m-0">












































            </tbody>
        </table>
    </div>

<?php $__env->startPush('page_scripts'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    tampilLoading('Memuat...');
    $(document).ready(function() {

        const tbProduk = $('#salesorderproduk_simples').DataTable({
            ajax: {
                url: '<?php echo e(URL::to('searchdata')); ?>'
            },
            select: true,
            cache: true,
            serverSide: true,
            order: [[0, "asc"]],
            processing: true,
            autoWidth: false,
            columns: [
                {data: 'produk', name: 'produk'},
                {data: 'qty', name: 'qty'},
                {data: 'barcode', name: 'barcode'},
                {data: 'nama', name: 'nama'},
                {data: 'kendaraan', name: 'kendaraan'},
                {data: 'partno1', name: 'partno1'},
                {data: 'partno2', name: 'partno2'},
                {data: 'merek', name: 'merek'},
            ],
            columnDefs: [
                {
                    targets: [ 2,3,4,5,6,7 ],
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
                $("#salesorderproduk_simples").show();
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/search_produk/tablesimple.blade.php ENDPATH**/ ?>