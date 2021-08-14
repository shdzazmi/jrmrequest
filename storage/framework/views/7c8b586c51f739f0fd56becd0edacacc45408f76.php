<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-10 offset-md-1" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin</h1>
                    </div>
                    <div class="col-sm" align="right">

                    </div>
                </div>
            </div>
        </section>

        <div class="content px-3">
            <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">

                <div class="col-sm-12">
                    <div class="card card-outline card-red">
                        <div class="card-header">
                            <h3 class="card-title"><b>User management</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle = 'modal' data-target = '#myModal'>
                                    <i class="fas fa-user"></i> Tambah user
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $__env->make('admin.table', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">
                    <div class="card card-outline card-red">
                        <div class="card-header">
                            <h3 class="card-title"><b>Data Karyawan</b></h3>
                            <div class="card-tools">
                                <a type="button" href="<?php echo e(route('karyawans.create')); ?>" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-user"></i> Tambah karyawan
                                </a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle m-0 text-muted">Digunakan untuk scan pada security</h6>
                        </div>
                        <div class="card-body p-0">
                            <?php echo $__env->make('karyawans.table', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="card-footer clearfix float-right">
                                <div class="float-right">
                                    <?php echo $__env->make('adminlte-templates::common.paginate', ['records' => $karyawans], Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </div>

        <!--Modal-->
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Register a new membership</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo $__env->make('admin.create', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>f

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

    <script type="text/javascript">
        $("#btnModal").click(function(){});
    </script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/admin/index.blade.php ENDPATH**/ ?>
