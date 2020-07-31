
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('images/icon.png') }}" alt="m3" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><small></small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/img/iconbg.png') }}" class="img-circle elevation-2" title="Created at {{ Auth::user()->created_at }} " alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" title="Created at {{ Auth::user()->created_at }} ">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link active">
                  <i class=" fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('confirm-deposit.index') }}" class="nav-link">
              <i class="nav-icon fas fa-piggy-bank"></i>
              <p>
            Deposits
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('confirm-withdrawal.index') }}" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
              Withdrawal
              </p>
            </a>
           </li>
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
              </p>
            </a>
          </li>
        <li class="nav-item">
          <a href="{{ route('permission.index') }}" class="nav-link">
          <i class="nav-icon fas fa-people-carry"></i>
          <p>
          Permission
          </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('purchase.index') }}" class="nav-link">
          <i class="nav-icon fas fa-piggy-bank"></i>
          <p>
          Admin Donations
          </p>
          </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('role.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
				    Roles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('messages.index') }}" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
        Messages
              </p>
            </a>
          </li>

		      <li class="nav-item">
            <a href="{{ route('members.index') }}" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
				All Members
              </p>
            </a>
          </li>

          <li class="nav-item">
                <a href="{{ route('admin-logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
            Logout
                  </p>
                </a>
          <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display:none">
            {{ csrf_field() }}
          </form>
          </li>
 


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>