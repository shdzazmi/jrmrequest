<style>
</style>

<div class="table-responsive">
    <table class="table dataTable display" id="tbAdmin">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Divisi</th>
                <th style="width: 80px">Action</th>
            </tr>
        </thead>
        <tbody id="tbRole">
            <?php use Illuminate\Support\Arr;

            $i = 1 ?>
        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($users->name); ?></td>
                <td>
                    <?php if($users->role == 'Admin'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($users->role); ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Master"])); ?>">Master</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Head"])); ?>">Head</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Admin"])); ?>">Admin</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "User"])); ?>">User</a>
                        </div>
                    <?php elseif($users->role == 'User'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($users->role); ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Master"])); ?>">Master</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Head"])); ?>">Head</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Admin"])); ?>">Admin</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "User"])); ?>">User</a>
                        </div>
                    <?php elseif($users->role == 'Master'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($users->role); ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Master"])); ?>">Master</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Head"])); ?>">Head</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Admin"])); ?>">Admin</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "User"])); ?>">User</a>
                        </div>
                    <?php elseif($users->role == 'Dev'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($users->role); ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Master"])); ?>">Master</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Head"])); ?>">Head</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Admin"])); ?>">Admin</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "User"])); ?>">User</a>
                        </div>
                    <?php elseif($users->role == 'Head'): ?>
                        <a href="javascript:void(0)" class="badge badge-pill badge-warning text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($users->role); ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Master"])); ?>">Master</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Head"])); ?>">Head</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "Admin"])); ?>">Admin</a>
                            <a class="dropdown-item" href="<?php echo e(route("admin.edit", [$users->id, "User"])); ?>">User</a>
                        </div>
                <?php endif; ?>
                </td>
                <td>
                    <?php echo e($users->divisi); ?>

                </td>
                <td>
                    <button type="button" class="btn btn-xs btn-default" onclick="edituser(<?php echo e($users->id); ?>)">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<!--Modal-->
<!-- The Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Edit user</h5>&nbsp <h5 id="iduser" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php echo $__env->make('admin.edit', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function() {
            const table = $('#tbAdmin').DataTable({
                select: true,
                pageLength: 25,
                autoWidth: false,
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                }
            });
        });

        function edituser(id) {
            var url = '<?php echo e(route("admin.show", [":id"])); ?>';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                success: function (data){
                    $('#editModal').modal('show');
                    $('#iduser').text(data.name);
                    $('#ids').val(data.id);
                    $('#name').val(data.name);
                    $('#username').val(data.email);
                    $('#role').val(data.role);
                    $('#divisi').val(data.divisi);
                },
                error: function (data) {
                    toastError("Error", data);
                }
            });
        }


    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/admin/table.blade.php ENDPATH**/ ?>
