<?php use Illuminate\Support\Arr;

$__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('message', __('Not Found')); ?>
<?php $__env->startSection('image'); ?>

    <div style="background-image: url(<?php echo e(asset('svg/404.svg')); ?>);" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::illustrated-layout', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/errors/404.blade.php ENDPATH**/ ?>
