  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-pink elevation-4  sidebar-bg">
    <!-- Brand Logo -->
    <a href="/" class="brand-link sidebar-bg">
      <img src="/images/icon.png" alt="PremiumCash Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PremiumSave</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/iconbg.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link @if(route::is('home')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('update.index', Auth::user()->id) }}" class="nav-link @if(route::is('update.index')) active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('testimony.index') }}" class="nav-link">
              <i class="nav-icon fa fa-bullhorn"></i>
              <p>Testimonial</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('myreferral') }}" class="nav-link @if(route::is('myreferral')) active @endif">
              <i class="nav-icon fa fa-users"></i>
              <p>Referral</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>