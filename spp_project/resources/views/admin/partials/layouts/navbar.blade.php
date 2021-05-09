<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></div>
    <div class="mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->username }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Change's Passwords
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-group">
                    @csrf
                    <button type="submit" class=" btn btn-flat has-icon text-danger"><i class="fas fa-sign-out-alt"></i>
                      </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
