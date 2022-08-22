<aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-dark">
        <img src="{{ url('/logo.png') }}" alt="Logo" class="brand-image" />
        <span class="brand-text font-weight-normal">Helpdesk</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pegawai" class="nav-link {{ Request::is('pegawai') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/ruang-rapat" class="nav-link {{ Request::is('ruang-rapat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Ruang Rapat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/peminjaman" class="nav-link {{ Request::is('peminjaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Peminjaman</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/notulen" class="nav-link {{ Request::is('notulen') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Notulen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/absensi" class="nav-link {{ Request::is('absensi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Absensi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporan" class="nav-link {{ Request::is('laporan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
