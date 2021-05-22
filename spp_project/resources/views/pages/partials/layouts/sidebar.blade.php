<div class="main-sidebar sidebar-style-2">
    @if(auth()->user()->level == "admin")
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
           
                    <li class={{ Request::is('pages/dashboard') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/pages/dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Database</li>
            <li class="nav-item dropdown {{ Request::is('pages/data_siswa') || Request::is('pages/data_siswa/tambah_siswa') || Request::is('pages/data_petugas') || Request::is('pages/data_petugas/tambah_petugas') || Request::is('pages/data_kelas') || Request::is('pages/data_kelas/tambah_kelas') ? 'active-parent active' : '' }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Database</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('pages/data_siswa') || Request::is('pages/data_siswa/tambah_siswa') ? 'active-link' : '' }}"><a class="nav-link" href="{{ url('/pages/data_siswa') }}">Data Siswa</a></li>
                    <li class="{{ Request::is('pages/data_petugas') || Request::is('admin/data_petugas/tambah_petugas') ? 'active-link' : '' }}"><a class="nav-link" href="{{ url('/pages/data_petugas') }}">Data Petugas</a></li>
                    <li class="{{ Request::is('pages/data_kelas') || Request::is('pages/data_kelas/tambah_kelas') ? 'active-link' : '' }}"><a class="nav-link" href="{{ url('/pages/data_kelas') }}">Data Kelas</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class={{ Request::is('pages/spp_tahunan') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/pages/spp_tahunan') }}"><i class="fas fa-calendar-alt"></i> <span>SPP</span></a></li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-money-check-alt"></i> <span>Entry
                        Pembayaran</span></a></li>
            <li class={{ Request::is('pages/history_pembayaran') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/pages/history_pembayaran') }}"><i class="fas fa-history"></i> <span>History</span></a></li>
        </ul>
        </ul>
    </aside>
    @endif

    @if (auth()->user()->level == "petugas")
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
           
                    <li class={{ Request::is('pages/dashboard') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/pages/dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class={{ Request::is('pages/entry_pembayaran') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/pages/entry_pembayaran') }}"><i class="fas fa-money-check-alt"></i> <span>Entry
                        Pembayaran</span></a></li>
            <li class={{ Request::is('pages/history_pembayaran') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/pages/history_pembayaran') }}"><i class="fas fa-history"></i> <span>History</span></a></li>
        </ul>
        </ul>
    </aside>
    @endif
</div>
