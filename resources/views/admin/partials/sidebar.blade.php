<style>
  /** 
  * AUTHOR: JVJB
  * DATE: 03/25/2024
  * THIS WILL MAKE SURE THAT THE SEARCH RESULT KEYWORD WILL MAKE DARKER COLOR
  */
  .sidebar-search-results > .list-group > .list-group-item > .search-title > .text-light {
    color: #343a40 !important;
  }
</style>
<aside class="main-sidebar sidebar-light-success elevation-1">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="/images/CvSU-logo-64x64.webp" alt="CvSU Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Office of Alumni Affairs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ $googleUserInfo->picture }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $googleUserInfo->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact nav-collapse-hide-child text-sm" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link" data-state="dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.alumni-profiles') }}" class="nav-link" data-state="alumni-profiles">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Alumni Profiles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.job-postings') }}" class="nav-link" data-state="job-postings">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Job Postings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link" data-state="users">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.reports.index') }}" class="nav-link" data-state="reports">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Integrated Library System
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>E-books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>E-journals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Control Center
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>E-books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>E-journals</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
               About
              </p>
            </a>
          </li>
          <li class="nav-header">MASTERFILES</li>
          <li class="nav-item">
            <a href="{{ route('admin.industries') }}" class="nav-link" data-state="industries">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Industries
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script type="text/javascript">
  // SIDEBAR SCRIPT
  const url = window.location.pathname;
  LinkClickHandler(url);

  function LinkClickHandler(url) {
    let tab = url.replace("/admin/", "");
    tab = tab.replace("/create", "");
    document.querySelector('[data-state="' + tab + '"]').classList.add('active');
    document.querySelector('[data-state="' + tab + '"]').classList.add('bg-gradient-success');
  }
</script>