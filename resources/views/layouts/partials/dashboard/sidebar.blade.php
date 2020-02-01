<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-truck"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Shop Co</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Users
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Users:</h6>
          <a class="collapse-item" href="{{ route('admin.users.index') }}">Manage Users</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Staff</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Staff:</h6>
          <a class="collapse-item" href="{{ route('admin.staff.new')}}">Create Staff</a>
          <a class="collapse-item" href="{{ route('admin.staff.index')}}">Manage Staff</a>
          <h6 class="collapse-header">Jobs:</h6>
          <a class="collapse-item" href="{{ route('admin.jobs.index')}}">Create Job</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Shop
    </div>

    <!-- Nav Item - Products -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="#collapseProducts">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Products</span>
      </a>
      <div id="collapseProducts" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Products:</h6>
          <a class="collapse-item" href="{{ route('admin.products.index')}}">View</a>
          <a class="collapse-item" href="{{ route('admin.products.create')}}">Create</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.category.index') }}">
        <i class="fas fa-folder"></i>
        <span>Categories</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Picking
    </div>

    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-eye"></i>
        <span>View</span></a>
    </li>

    <!-- Nav Item - Pickers -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePickers" aria-expanded="true" aria-controls="collapsePickers">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Pickers</span>
      </a>
      <div id="collapsePickers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pickers:</h6>
          <a class="collapse-item" href="utilities-color.html">Assign Pickers</a>
          <a class="collapse-item" href="utilities-border.html">Manage Staff</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Deliveries
    </div>

    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-eye"></i>
        <span>View</span></a>
    </li>


    <!-- Nav Item - Drivers -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDrivers" aria-expanded="true" aria-controls="collapseDrivers">
        <i class="fas fa-truck"></i>
        <span>Drivers</span>
      </a>
      <div id="collapseDrivers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Drivers:</h6>
          <a class="collapse-item" href="utilities-color.html">Assign Drivers</a>
          <a class="collapse-item" href="utilities-border.html">Manage Drivers</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->