<div class="sidebar">
    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}
    <div class="user-panel mt-1 pb-1 mb-1 d-flex">
        <div class="info"><a href="{{ url('/') }}" class="d-block text-white">Ahmad Dani Maulana</a></div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Menu</li>
            <li class="nav-item">
                <a href="{{ url('/arsip') }}" class="nav-link {{ $activeMenu == 'arsip' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Arsip</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-folder-open"></i>
                    <p>Kategori Surat</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/about') }}" class="nav-link {{ $activeMenu == 'about' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-exclamation-circle"></i>
                    <p>About</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
