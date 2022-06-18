@section('sidebar')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Laravel Task</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dipesh Tamang Jr.</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Company
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('companies.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Company</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('companies.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Company</p>
                </a>
              </li>
              

            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Department
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('departments.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('departments.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Department</p>
                </a>
              </li>
              

            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('employees.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Employee</p>
                </a>
              </li>
              

            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-award"></i>
              <p>
                Designation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('designations.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('designations.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Designation</p>
                </a>
              </li>
              

            </ul>
          </li>
          
         
          {{-- <li class="nav-item menu-closed">
            <a href="{{route('add-level')}}" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Manage Subject Level
              </p>
            </a>
          
          </li> --}}
         
         
              
         
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
@endsection
