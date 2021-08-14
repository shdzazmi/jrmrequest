<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Sales order Affari'); ?>
<style>

    #myBtn {
        top: 80px;
        border: none;
        outline: none;
        color: white;
        padding: 15px;
        border-radius: 50%;

        display: inline-block;
        background-color: #007afe;
        text-align: center;
        position: fixed;
        right: 45px;
        transition: background-color .3s,
        opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }
    #myBtn:active {
        background-color: #555;
    }
    #myBtn.show {
        opacity: 1;
        visibility: visible;
    }
    #myBtn::after {
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
    }
    #myBtn:hover {
        cursor: pointer;
        background-color: #509fff;
    }

</style>

<?php $__env->startSection('content'); ?>

    <div class="animate__animated animate__fadeIn preloader flex-column justify-content-center align-items-center">
        <img class="animate__animated animate__rubberBand animate__infinite" src="<?php echo e(asset('storage/logo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
        <h3>Memuat . . .</h3>
    </div>

    <div class="col-md-10 offset-md-1" >
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sales Orders Affari</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a class="btn btn-outline-primary"
                           href="<?php echo e(route('salesOrder.affari')); ?>">
                            <i class="fas fa-redo-alt"></i> Refresh
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="content px-3">

            <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="clearfix"></div>

            <div class="card card-outline card-primary">
                <div class="card-body">
                    <?php echo $__env->make('sales_orders.table_affari', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <a href="<?php echo e(route('salesOrders.index')); ?>" id="myBtn" title="Refresh"><i class="fas fa-redo-alt"></i></a>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_scripts'); ?>
    <script>
        //Get the button
        var mybutton = $('#myBtn');

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                mybutton.addClass('show');
            } else {
                mybutton.removeClass('show');
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/index_affari.blade.php ENDPATH**/ ?>
