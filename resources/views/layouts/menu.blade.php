<li class="nav-item">
    <a href="{{ route('salesOrders.index') }}"
       class="nav-link {{ Request::is('salesOrders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>Sales Orders</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('requestbarangs.index') }}"
       class="nav-link {{ Request::is('requestbarangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>Request barang</p>
    </a>
</li>



