<div class="table-responsive">
    <table class="table table-head-fixed" id="tbSearchLocation">
        <thead>
        <tr>
            <th>Produk</th>
            <th>Barcode</th>
            <th>Kendaraan</th>
            <th>Lokasi 1</th>
            <th>Lokasi 2</th>
            <th>Lokasi 3</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="table-body">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item['nama']); ?></td>
                <td><?php echo e($item['barcode']); ?></td>
                <td><?php echo e($item['kendaraan']); ?></td>
                <td><?php echo e($item['lokasi1']); ?></td>
                <td><?php echo e($item['lokasi2']); ?></td>
                <td><?php echo e($item['lokasi3']); ?></td>
                <td>
                    <a href="javascript:void(0)" data-id="<?php echo e($item['barcode']); ?>" class='btn btn-default btn-xs' title="Edit lokasi" id="btnEditLokasi" data-toggle="tooltip">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>
<!--Modal-->
<!-- The Modal -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit lokasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Form -->
                <form id="productForm" name="productForm" class="form-horizontal" action="<?php echo e(route("location.store")); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="barcode" id="barcode">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="lokasi1" class="control-label">Lokasi 1</label>
                            <input type="search" class="form-control" id="lokasi1" name="lokasi1" value="" maxlength="7">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="lokasi2" class="control-label">Lokasi 2</label>
                            <input type="search" class="form-control" id="lokasi2" name="lokasi2" value="" maxlength="7">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="lokasi3" class="control-label">Lokasi 3</label>
                            <input type="search" class="form-control" id="lokasi3" name="lokasi3" value="" maxlength="7">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btnSimpanLokasi">Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    <?php $__env->startPush('page_scripts'); ?>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <script>


            $('#btnEditLokasi').click(function () {
                var barcode = $(this).data('id');
                var url = '<?php echo e(route("location.edit", [":bcode"])); ?>';
                url = url.replace(':bcode', barcode);
                $.ajax({
                    url: url,
                    method: "GET",
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data){
                        $('#modalEdit').modal('show');
                        $('#barcode').val('barcode');
                        $('#lokasi1').val(data.lokasi1);
                        $('#lokasi2').val(data.lokasi2);
                        $('#lokasi3').val(data.lokasi3);
                    }
                });
            });


            $(document).ready(function(){
                $(".show-modal").click(function(){
                    $("#modalEdit").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                });
            });

            $(document).each( function () {
                $('#tbSearchLocation').DataTable({
                    select: true,
                    bFilter: false,
                    lengthChange: false,
                    pageLength: 50,
                    language: {
                        searchPlaceholder: "Pencarian",
                        search: "",
                        lengthMenu: "Baris: _MENU_",
                    }
                })
                $(function(){
                    var hide = true;
                    $('#tbSearchLocation td').each(function(){
                        var td_content = $(this).text();
                        if(td_content!==""){
                            hide = false;
                        }
                    })
                    if(hide){
                        $('#tbSearchLocation').hide();
                    }
                })
            });

            function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("table-body").deleteRow(i-1);
                getTotalPrice();
            }

            function deleteAllRow() {
                var tableHeaderRowCount = 0;
                var table = document.getElementById('table-body');
                var rowCount = table.rows.length;
                for (var i = tableHeaderRowCount; i < rowCount; i++) {
                    table.deleteRow(tableHeaderRowCount);
                }
            }
        </script>

    <?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/location/table_all.blade.php ENDPATH**/ ?>
