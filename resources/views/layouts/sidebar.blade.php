<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="AdminLte-2/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->nama }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="kehadiran">
            <i class="fa fa-users"></i> <span>Data Kehadiran</span>
          </a>
        </li>
        <li>
          <a href="cuti">
            <i class="fa fa-th"></i> <span>Data Cuti</span>
          </a>
        </li>
        <li>
          <a href="absen-masuk">
            <i class="fa fa-th"></i> <span>Belum Absen Masuk</span>
          </a>
        </li>
        <li>
          <a href="absen-pulang">
            <i class="fa fa-th"></i> <span>Belum Absen Pulang</span>
          </a>
        </li>
        <li>
          <a href="terlambat-harian">
            <i class="fa fa-th"></i> <span>Data Terlambat Harian</span>
          </a>
        </li>
        <li class="header">FILES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Rekapitulasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="rekapTAP"><i class="fa fa-circle-o"></i>Tidak Absen Pulang</a></li>
            <li><a href="rekapTAM"><i class="fa fa-circle-o"></i>Terlambat Masuk</a></li>
            <li><a href="rekapUnit"><i class="fa fa-circle-o"></i>Terlambat Unit Kerja</a></li>
          </ul>
        </li>
        @if(Auth::user()->roles == "ADMIN")
        <li class="header">DASHBOARD</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-User"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all-user"><i class="fa fa-circle-o"></i>All Users</a></li>
            <li><a href="add-new-user"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li> 
      </ul>  
      @endif
    </section>
  </aside>

 