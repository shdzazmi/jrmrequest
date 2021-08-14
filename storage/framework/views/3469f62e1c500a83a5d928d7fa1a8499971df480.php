<li class="nav-item">
    <a href="<?php echo e(route('salesOrders.index')); ?>" class="nav-link <?php echo e(Request::is('salesOrders*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>
            Sales Order
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="<?php echo e(route('salesOrders.index')); ?>" class="nav-link <?php echo e(Request::is('salesOrders') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>JRMPortal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('salesOrder.affari')); ?>" class="nav-link <?php echo e(Request::is('salesOrdersAffari') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Affari</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('serviceOrders.index')); ?>" class="nav-link <?php echo e(Request::is('serviceOrders*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-tools"></i>
        <p>
            Service Order
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="<?php echo e(route('serviceOrders.index')); ?>" class="nav-link <?php echo e(Request::is('serviceOrders') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>JRMPortal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('serviceOrders.affari')); ?>" class="nav-link <?php echo e(Request::is('serviceOrders/Affari') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Affari</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('requestbarangs.index')); ?>" class="nav-link <?php echo e(Request::is('requestbarang*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            Request
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <?php if(Auth::user()->divisi != 'Purchasing'): ?>
            <li class="nav-item">
            <a href="<?php echo e(route('requestbarangs.index')); ?>" class="nav-link <?php echo e(Request::is('requestbarangs') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('showAll')); ?>" class="nav-link <?php echo e(Request::is('requestbarangsall*') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Semua Request</p>
            </a>
        </li>
        <?php endif; ?>
        <?php if(Auth::user()->divisi == 'Purchasing' || Auth::user()->role == 'Dev'): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('requestbarang.index_approval')); ?>" class="nav-link <?php echo e(Request::is('requestbarang/approval*') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Approval</p>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</li>

<li class="nav-item">
    <a href="<?php echo e(route('search')); ?>"
       class="nav-link <?php echo e(Request::is('search*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-search"></i>
        <p>Pencarian</p>
    </a>
</li>

<?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head"): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('location')); ?>"
           class="nav-link <?php echo e(Request::is('location*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Lokasi</p>
        </a>
    </li>
<?php endif; ?>











<?php if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" ): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('security')); ?>"
           class="nav-link <?php echo e(Request::is('security*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-user-secret"></i>
            <p>Security</p>
        </a>
    </li>
<?php endif; ?>

<?php if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" ): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('admin')); ?>"
           class="nav-link <?php echo e(Request::is('admin*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Admin</p>
        </a>
    </li>
<?php endif; ?>

<li class="nav-item">
    <a href="<?php echo e(route('fileCatalogues.index')); ?>"
       class="nav-link <?php echo e(Request::is('fileCatalogues*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>File</p>
    </a>
</li>

<?php $__env->startPush('page_scripts'); ?>
    <script>



    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/layouts/menu.blade.php ENDPATH**/ ?>