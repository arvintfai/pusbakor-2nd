<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light ml-2">PUSBAKOR PROJECT</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('perusahaan') }}" class="nav-link">
            <i class="nav-icon fas fa-industry"></i>
            <p>
              Perusahaan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('proyek') }}" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>
              Proyek
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('desa') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>Desa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('skalausaha') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>Skala Usaha</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jenisperusahaan') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>Jenis Perusahaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('statusmodal') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>Status Modal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('resiko') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>Resiko</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kbli') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>KBLI</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kecamatan') }}" class="nav-link">
                <i class="fas fa-angle-double-right nav-icon"></i>
                <p>Kecamatan</p>
              </a>
            </li>
          </ul>
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Admin
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('user') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
          </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>