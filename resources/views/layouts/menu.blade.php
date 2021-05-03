<li class="nav-item">
    <a href="{{ route('salesOrders.index') }}"
       class="nav-link {{ Request::is('salesOrders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>Sales Order</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('requestbarangs.index') }}" class="nav-link {{ Request::is('requestbarangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            Request
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('requestbarangs.index') }}" class="nav-link {{ Request::is('requestbarangs') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('showAll') }}" class="nav-link {{ Request::is('requestbarangsall*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Semua Request</p>
            </a>
        </li>
    </ul>
</li>

@if(Auth::user()->role == "Master")
<li class="nav-item">
    <a href="{{ route('search') }}"
       class="nav-link {{ Request::is('search*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-search"></i>
        <p>Pencarian</p>
    </a>
</li>
@endif

@if(Auth::user()->role == "Admin" || Auth::user()->role == "Master")
    <li class="nav-item">
        <a href="{{ route('location') }}"
           class="nav-link {{ Request::is('location*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Lokasi</p>
        </a>
    </li>
@endif

@if(Auth::user()->role == "Master")
    <li class="nav-item">
        <a href="#"
           class="nav-link {{ Request::is('security*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-secret"></i>
            <p>Security
            <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-friends nav-icon text-sm"></i>
                    <p>Karyawan keluar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-box nav-icon text-sm"></i>
                    <p>Barang keluar</p>
                </a>
            </li>
        </ul>
    </li>
@endif

@if(Auth::user()->role == "Master")
    <li class="nav-item">
        <a href="{{ route('admin') }}"
           class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Admin</p>
        </a>
    </li>
@endif
