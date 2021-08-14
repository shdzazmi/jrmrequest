<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title">Data Customer</h5>
    </div>
    <div class="card-body pb-1 mb-1 pt-1 mt-1">
        <div class="row">
            <!-- uid Field -->
            <?php if(isset($uid)): ?>
                <div>
                    <?php echo Form::hidden('uid', $uid, ['id'=>'uid_input', 'style'=>'width=1px']); ?>

                </div>
            <?php else: ?>
                <div>
                    <?php echo Form::hidden('uid', null, ['id'=>'uid_input', 'style'=>'width=1px']); ?>

                </div>
            <?php endif; ?>
            <!-- status Field -->
            <?php if(isset($status)): ?>
                <div>
                    <?php echo Form::hidden('status', $status, ['id'=>'status_input', 'style'=>'width=1px']); ?>

                </div>
            <?php else: ?>
                <div>
                    <?php echo Form::hidden('status', 'Proses', ['id'=>'status_input', 'style'=>'width=1px']); ?>

                </div>
            <?php endif; ?>
            <!-- id Field -->
            <div>
                <?php echo Form::hidden('id', null, ['id'=>'id_input', 'style'=>'width=1px']); ?>

            </div>
            <!-- Nama Field -->
            <div class="form-group col-sm-2">
                <?php if(isset($nama)): ?>
                    <?php echo Form::label('nama', 'Nama:'); ?>

                    <?php echo Form::text('nama', $nama, ['class' => 'form-control form-control-sm', 'id'=>'nama_input']); ?>

                <?php else: ?>
                    <?php echo Form::label('nama', 'Nama:'); ?>

                    <?php echo Form::text('nama', null, ['class' => 'form-control form-control-sm', 'id'=>'nama_input']); ?>

                <?php endif; ?>
            </div>

            <!-- Mobil Field -->
            <?php if(isset($mobil)): ?>
                <div class="form-group col-sm-2">
                    <?php echo Form::label('mobil', 'Mobil:'); ?>

                    <?php echo Form::text('mobil', $mobil, ['class' => 'form-control form-control-sm', 'id'=>'mobil_input']); ?>

                </div>
            <?php else: ?>
                <div class="form-group col-sm-2">
                    <?php echo Form::label('mobil', 'Mobil:'); ?>

                    <?php echo Form::text('mobil', null, ['class' => 'form-control form-control-sm', 'id'=>'mobil_input']); ?>

                </div>
            <?php endif; ?>

            <!-- Nopol Field -->
            <?php if(isset($nopol)): ?>
                <div class="form-group col-sm-2">
                    <?php echo Form::label('nopol', 'No. Polisi:'); ?>

                    <?php echo Form::text('nopol', $nopol, ['class' => 'form-control form-control-sm','id'=>'nopol_input']); ?>

                </div>
            <?php else: ?>
                <div class="form-group col-sm-2">
                    <?php echo Form::label('nopol', 'No. Polisi:'); ?>

                    <?php echo Form::text('nopol', null, ['class' => 'form-control form-control-sm','id'=>'nopol_input']); ?>

                </div>
            <?php endif; ?>

            <!-- Tanggal Field -->
            <div class="form-group col-sm-2">
                <?php echo Form::label('tanggal', 'Tanggal:'); ?>

                <?php echo Form::text('tanggal', null, ['class' => 'form-control form-control-sm','id'=>'tanggal_input']); ?>

            </div>

            <!-- Operator Field -->
            <div>
                <?php echo Form::hidden('user', Auth::user()->name, ['id'=>'operator_input','style'=>'width=1px']); ?>

            </div>

            <!-- Outlet Field -->
            <div class="form-group col-sm-2">
                <?php if(isset($serviceOrder->outlet)): ?>
                    <label for="outlet_input">Outlet:</label>
                    <select name="outlet" id="outlet_input" class="form-control form-control-sm" required>
                        <option selected hidden><?php echo e($serviceOrder->outlet); ?></option>
                        <option>JRM</option>
                        <option>BLPK</option>
                    </select>
                <?php else: ?>
                    <label for="outlet_input">Outlet:</label>
                    <select name="outlet" id="outlet_input" class="form-control form-control-sm" required>
                        <option value="" disabled selected hidden>Pilih outlet</option>
                        <option>JRM</option>
                        <option>BLPK</option>
                    </select>
                <?php endif; ?>

            </div>

            <div class="form-group col-sm-2">
                <label class="mb-0">Keterangan: </label>
                <div class="row">
                    <div class="form-check col-sm-12">
                        <?php if(isset($serviceOrder)): ?>
                            <?php if($serviceOrder->ppn == 1): ?>
                                <input name="ppn" type="checkbox" class="form-check-input" id="ppn_input" checked>
                            <?php else: ?>
                                <input name="ppn" type="checkbox" class="form-check-input" id="ppn_input">
                            <?php endif; ?>
                        <?php else: ?>
                            <input name="ppn" type="checkbox" class="form-check-input" id="ppn_input">
                        <?php endif; ?>
                        <label class="form-check-label" for="ppn_input">PPN</label>
                    </div>

                    <div class="form-check col-sm-12">
                        <?php if(isset($serviceOrder)): ?>
                            <?php if($serviceOrder->tanpabongkar == 1): ?>
                                <input name="tanpabongkar" type="checkbox" class="form-check-input" id="tanpabongkar_input" checked>
                            <?php else: ?>
                                <input name="tanpabongkar" type="checkbox" class="form-check-input" id="tanpabongkar_input">
                            <?php endif; ?>
                        <?php else: ?>
                            <input name="tanpabongkar" type="checkbox" class="form-check-input" id="tanpabongkar_input">
                        <?php endif; ?>
                        <label class="form-check-label" for="tanpabongkar_input">Tanpa bongkar</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript">
        $('#tanggal_input').datetimepicker({
            format: 'DD-MM-YYYY',
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
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/service_orders/fields.blade.php ENDPATH**/ ?>