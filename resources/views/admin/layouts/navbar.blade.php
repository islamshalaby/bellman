<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                Language
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="/admin-panel/lang/en" class="dropdown-item">
                    English
                </a>
                <div class="dropdown-divider"></div>
                <a href="/admin-panel/lang/ar" class="dropdown-item">
                    العربية
                </a>

            </div>
        </li>
    </ul>



</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">Task</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('companies.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{trans('messages.companies')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employees.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{trans('messages.employees')}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
