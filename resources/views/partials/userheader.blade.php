<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-olored" style="background: #344049">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" style="font-size:20px; color:#fff;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i> &nbsp;PremiumSave</a> 
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><div id="google_translate_element"></div></li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link text-white" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">New Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Thank you for signing up
            <span class="float-right text-muted text-sm">{{ Auth::user()->created_at->diffForHumans() }}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Make investment and earn
            <span class="float-right text-muted text-sm">{{ Auth::user()->created_at->diffForHumans() }}</span>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
            class="fa fa-power-off"></i></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
        {{ csrf_field() }}
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->