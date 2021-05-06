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
         
                  <li class={{ Request::is('admin/dashboard') ? 'active-menu' : '' }}><a class="nav-link" href="{{ url('/admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Starter</li>
          <li><a class="nav-link" href="credits.html"><i class="fas fa-money-check-alt"></i> <span>Entry
                      Pembayaran</span></a></li>
          <li><a class="nav-link" href="credits.html"><i class="fas fa-history"></i> <span>History</span></a></li>
      </ul>
      </ul>
  </aside>
</div>
