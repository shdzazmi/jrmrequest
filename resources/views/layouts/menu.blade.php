



<li class="nav-item">
    <a href="{{ route('requests.index') }}"
       class="nav-link {{ Request::is('requests*') ? 'active' : '' }}">
        <p>Requests</p>
    </a>
</li>







<li class="nav-item">
    <a href="{{ route('requestbarangs.index') }}"
       class="nav-link {{ Request::is('requestbarangs*') ? 'active' : '' }}">
        <p>Requestbarangs</p>
    </a>
</li>


