<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('AdminLte-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
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
            <i class="fa fa-heartbeat"></i> <span>Siaga Covid-19</span>
          </a>
        </li>
        <li>
          <a href="/data-pegawai">
            <i class="fa fa-users"></i> <span>Pegawai</span>
          </a>
        </li>
        <li>
          <a href="cuti">
            <i class="fa fa-book"></i> <span>Cuti</span>
          </a>
        </li>
        <li>
          <a href="absen-masuk">
            <i class="fa fa-line-chart"></i> <span>Statistik</span>
          </a>
        </li>
        <li class="header">FILES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Layanan Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="rekapTAP"><i class="fa fa-file-text"></i>Pengajuan Cuti</a></li>
            <li><a href="rekapTAM"><i class="fa fa-info "></i>Pengaduan</a></li>
          </ul>
        </li>
        {{-- @if(Auth::user()->roles == "ADMIN") --}}
        <li class="header">DASHBOARD</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-new-user"><i class="fa fa-plus"></i> Tambah Baru</a></li>
          </ul>
        </li> 
      </ul>  
      {{-- @endif --}}
    </section>
  </aside>

 