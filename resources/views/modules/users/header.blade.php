<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('content') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img src="{{url('storage/plantilla/icono-blanco.png')}}" class="img-responsive" style="padding: 10px">
      </span>
      
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="{{url('storage/plantilla/logo-blanco-lineal.png')}}" class="img-responsive" style="padding: 10px">
      </span>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->photo == '')
                <img src="{{url('storage/users/anonymous.png')}}" class="user-image" alt="User Image">
              @else
                <img src="{{url('storage/users/'.Auth::user()->photo)}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-primary btn-flat">Mis datos</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" 
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                  class="btn btn-danger btn-flat">Salir</a>
                </div>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>