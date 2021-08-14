<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Lokasi produk'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lokasi produk</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="content px-3">
        <div class="card">
            <div class="class-body">
                <div class="row px-3">
                    <div class="col-sm-12 p-2">
                        <button class="btn btn-primary" onclick="blink('D02-3B')">Tunjukan lokasi</button><br>
                        <b>D01-1A</b> <br>
                        <label>Lantai:</label> 4 &nbsp&nbsp
                        <label>Baris <i class="fas fa-arrows-alt-v"></i>:</label> 1 &nbsp&nbsp
                        <label>Kolom <i class="fas fa-arrows-alt-h"></i>: </label> A &nbsp&nbsp
                    </div>
                    <div class="col-sm-12 p-2">
                        <?php echo $__env->make('location.denah.4', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>

    <script>
        function blink(location) {
            $code = location.substring(0,3);
            console.log($code);
            var element = document.getElementById($code);
            element.classList.toggle("blink-2");
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/location/index_denah.blade.php ENDPATH**/ ?>
