<header class="main-header">
    <!-- Logo -->
    <a href="/kehadiran" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><strong>SIM</strong></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>diskominfo</b>Jabar</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      {{-- nav menu custom --}}
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('AdminLte-2/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ auth()->user()->nama }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- Menu Footer-->
                <li class="user-header">
                  <img src="{{ asset('AdminLte-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                  <p>
                    <span class="hidden-xs">{{ auth()->user()->nama }}</span>
                  <small>{{ auth()->user()->nip }}</small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat btn-xs">Ubah Kata Sandi</a>
                  </div>
                  <div class="pull-right">
                    <form action="/logout" method="post">
                      @csrf
                      
                        <button class="btn btn-primary btn-flat btn-xs" type="submit"><i class="fa fa-sign-out" ></i> <span>Logout</span></button>
                        
                    </form>
                  </div>
                </li>
              </ul>
          </li>
        </ul>
      </div>  
    </nav>
  </header>
</body>
  {{-- <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-gears"></i>
      <span class="hidden-xs">Dashboard</span>
    </a>
    <ul class="dropdown-menu">
      <li class="user-footer">
        <div class="pull-left">
          <button type="submit"><i class="fa fa-sign-out" ></i> <span>Add User Permission</span></button>
          </div>
        <div class="pull-right">
          <form action="/logout" method="post">
            @csrf
            <button type="submit"><i class="fa fa-sign-out" ></i> <span>Logout</span></button>
          </form>
        </div>
      </li>
    </ul>
  </li> --}}
