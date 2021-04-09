{{--<li class="nav-item">
    <a href="{{ route('salesOrders.index') }}"
       class="nav-link {{ Request::is('salesOrders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>Sales Order</p>
    </a>
</li>--}}

<li class="nav-item">
    <a href="{{ route('requestbarangs.index') }}" class="nav-link {{ Request::is('requestbarangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            Request Barang
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('requestbarangs.index') }}" class="nav-link {{ Request::is('requestbarangs') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/requestbarangsall" class="nav-link {{ Request::is('requestbarangsall*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Semua request</p>
            </a>
        </li>
    </ul>
</li>
