<aside class="main-sidebar sidebar-dark-light elevation-2 border-bottom-0">
    <a href="<?php use Illuminate\Support\Arr;

    echo e(route('home')); ?>" class="brand-link">
        <img src="<?php echo e(asset('storage/logo.png')); ?>"
             alt="Logo"
             class="brand-image img-circle">
        <span class="brand-text"><b>JRM</b>Portal</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <?php echo $__env->make('layouts.menu', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>
