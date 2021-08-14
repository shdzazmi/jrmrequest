

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Customer</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Nama Field -->
            <div class="form-group col-sm-12">
                <?php echo Form::label('nama', 'Nama:'); ?>

                <?php echo Form::text('nama', null, ['id'=>'nama_input', 'class' => 'form-control']); ?>

            </div>
            <!-- Tanggal Field -->
            <div class="form-group col-sm-12">
                <?php echo Form::label('tanggal', 'Tanggal:'); ?>

                <?php echo Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal_input']); ?>

            </div>
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
            <!-- id Field -->
            <div>
                <?php echo Form::hidden('id', null, ['id'=>'id_input', 'style'=>'width=1px']); ?>

            </div>
            <!-- status Field -->
            <?php if(isset($status)): ?>
                <div>
                    <?php echo Form::hidden('status', $status, ['id'=>'status_input', 'style'=>'width=1px']); ?>

                </div>
            <?php else: ?>
                <div>
                    <?php echo Form::hidden('status', null, ['id'=>'status_input', 'style'=>'width=1px']); ?>

                </div>
            <?php endif; ?>
            <!-- Operator Field -->
            <div>
                <?php echo Form::hidden('user', Auth::user()->name, ['id'=>'operator_input','style'=>'width=1px']); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript">
        $('#tanggal_input').datetimepicker({
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
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/fields.blade.php ENDPATH**/ ?>