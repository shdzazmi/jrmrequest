<aside class="main-sidebar sidebar-dark-info elevation-2">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/jrm/public/storage/logo.png"
             alt="Logo"
             class="brand-image img-circle">
        <span class="brand-text"><b>JRM</b>Portal</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
