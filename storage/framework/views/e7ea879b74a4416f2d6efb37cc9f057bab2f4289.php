
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css"/>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('tanggal', 'Tanggal:'); ?>

    <?php echo Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']); ?>

</div>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            icons: {
                time: "fas fa-clock",
                date: "fas fa-calendar",
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down",
                previous: "fas fa-chevron-left",
                next: "fas fa-chevron-right"
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('nama', 'Produk:'); ?>

    <div class="input-group">
        <?php echo Form::text('nama', null, ['class' => 'form-control', 'id' => 'inputNama']); ?>

        <?php echo Form::button('<i class="fa fa-search"></i>', array('class' => 'btn btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#myModal', 'id' => '#btnModal', 'title' => 'Pencarian')); ?>

    </div>
</div>

<!--Table hover-->
<style>
    #requestbarangproduk tbody tr:hover{
        cursor: pointer;
    }
</style>

<!--Modal-->
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Cari produk</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="content px-3">
                    <!-- Table Produk -->
                    <div class="table-responsive">
                        <table class="table dataTable display" id="requestbarangproduk">
                            <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Barcode</th>
                                <th>Kode Supplier</th>
                                <th>Kendaraan</th>
                                <th>Part Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class='clickable-row' data-dismiss="modal">
                                    <td><?php echo e($item['nama']); ?></td>
                                    <td><?php echo e($item['barcode']); ?></td>
                                    <td><?php echo e($item['kd_supplier']); ?></td>
                                    <td><?php echo e($item['kendaraan']); ?></td>
                                    <td><?php echo e($item['partno1']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(".show-modal").click(function(){
            $("#myModal").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    });
</script>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript">
        $("#btnModal").click(function(){
        });
    </script>
<?php $__env->stopPush(); ?>

<!-- Barcode Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('barcode', 'Barcode:'); ?>

    <?php echo Form::text('barcode', null, ['class' => 'form-control', 'id' => 'inputBarcode']); ?>

</div>

<!-- Kode supplier Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('kd_supplier', 'Kode supplier:'); ?>

    <?php echo Form::text('kd_supplier', null, ['class' => 'form-control', 'id' => 'inputKd_supplier']); ?>

</div>

<!-- Kendaraan Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('kendaraan', 'Kendaraan:'); ?>

    <?php echo Form::text('kendaraan', null, ['class' => 'form-control', 'id' => 'inputKendaraan']); ?>

</div>

<!-- Part Number Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('partno1', 'Part Number:'); ?>

    <?php echo Form::text('partno1', null, ['class' => 'form-control', 'id' => 'inputPartNumber']); ?>

</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('keterangan', 'Keterangan:'); ?>

    <?php echo Form::text('keterangan', null, ['class' => 'form-control']); ?>

</div>

<!-- User Field -->
<div>
    <?php echo Form::hidden('user', Auth::user()->name, ['style'=>'width=1px']); ?>

</div>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#requestbarangproduk').DataTable( {
                select: true,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                }
            } );
        } );

        var table = document.getElementById('requestbarangproduk');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                document.getElementById("inputNama").value = this.cells[0].innerHTML;
                document.getElementById("inputBarcode").value = this.cells[1].innerHTML;
                document.getElementById("inputKd_supplier").value = this.cells[2].innerHTML;
                document.getElementById("inputKendaraan").value = this.cells[3].innerHTML;
                document.getElementById("inputPartNumber").value = this.cells[4].innerHTML;
            };
        }
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/requestbarangs/fields.blade.php ENDPATH**/ ?>