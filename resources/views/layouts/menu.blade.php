
<li class="nav-item">
    <a href="/#"
       class="nav-link">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>Buat PO</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('requestbarangs.index') }}"
       class="nav-link {{ Request::is('requestbarangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>Request barang</p>
    </a>
</li>


