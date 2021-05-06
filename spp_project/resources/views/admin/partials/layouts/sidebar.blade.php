<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
           
                    <li class={{ Request::is('/admin/dashboard') ? 'active' : '' }}><a class="nav-link" href="blank.html"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Database</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Database</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/admin/data_siswa') }}">Data Siswa</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Data Petugas</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Data Kelas</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-calendar-alt"></i> <span>SPP</span></a></li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-money-check-alt"></i> <span>Entry
                        Pembayaran</span></a></li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-history"></i> <span>History</span></a></li>
        </ul>
        </ul>
    </aside>
</div>
