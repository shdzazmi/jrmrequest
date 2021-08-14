<li class="nav-item">
    <a href="{{ route('salesOrders.index') }}" class="nav-link {{ Request::is('salesOrders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>
            Sales Order
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('salesOrders.index') }}" class="nav-link {{ Request::is('salesOrders') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>JRMPortal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salesOrder.affari') }}" class="nav-link {{ Request::is('salesOrdersAffari') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Affari</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('serviceOrders.index') }}" class="nav-link {{ Request::is('serviceOrders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>
            Service Order
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('serviceOrders.index') }}" class="nav-link {{ Request::is('serviceOrders') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>JRMPortal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('serviceOrders.affari') }}" class="nav-link {{ Request::is('serviceOrders/Affari') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Affari</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('requestbarangs.index') }}" class="nav-link {{ Request::is('requestbarang*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            Request
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        @if(Auth::user()->divisi != 'Purchasing')
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
        @endif
        @if(Auth::user()->divisi == 'Purchasing' || Auth::user()->role == 'Dev')
        <li class="nav-item">
            <a href="{{ route('requestbarang.index_approval') }}" class="nav-link {{ Request::is('requestbarang/approval*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Approval</p>
            </a>
        </li>
        @endif
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('search') }}"
       class="nav-link {{ Request::is('search*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-search"></i>
        <p>Pencarian</p>
    </a>
</li>

@if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head")
    <li class="nav-item">
        <a href="{{ route('location') }}"
           class="nav-link {{ Request::is('location*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Lokasi</p>
        </a>
    </li>
@endif

{{--@if(Auth::user()->role == "Dev")--}}
{{--    <li class="nav-item">--}}
{{--        <a href="{{ route('denah') }}"--}}
{{--           class="nav-link {{ Request::is('denah*') ? 'active' : '' }}">--}}
{{--            <i class="nav-icon fas fa-boxes"></i>--}}
{{--            <p>Petunjuk Lokasi</p>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--@endif--}}

@if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" )
    <li class="nav-item">
        <a href="{{route('security')}}"
           class="nav-link {{ Request::is('security*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-secret"></i>
            <p>Security</p>
        </a>
    </li>
@endif

@if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" )
    <li class="nav-item">
        <a href="{{ route('admin') }}"
           class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Admin</p>
        </a>
    </li>
@endif

<li class="nav-item">
    <a href="{{ route('fileCatalogues.index') }}"
       class="nav-link {{ Request::is('fileCatalogues*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>File</p>
    </a>
</li>

@push('page_scripts')
    <script>



    </script>
@endpush
