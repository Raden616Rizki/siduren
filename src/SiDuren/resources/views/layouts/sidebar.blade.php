<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/archive">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SiDuren</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Arsip -->
    <li class="nav-item {{ Request::is('archive*') ? 'active' : '' }}">
        <a class="nav-link" href="/archive">
            <i class="fas fa-fw fa-star"></i>
            <span>Arsip</span></a>
    </li>

    <!-- Nav Item - Kategori -->
    <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}">
        <a class="nav-link" href="/category">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - About -->
    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
        <a class="nav-link" href="/archive">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>About</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
