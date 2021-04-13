<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/jrmrequest/public/storage/logo.png"
             alt="Logo"
             class="brand-image img-circle">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
