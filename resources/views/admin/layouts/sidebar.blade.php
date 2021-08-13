
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
            </a>

            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ Route::currentRouteName() == 'admin' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            {{-- <div class="sidebar-heading">
                Interface
            </div> --}}

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Blogs</span>
                </a>
                <div id="collapseTwo" class="{{ Route::currentRouteName()  == 'blogs.index' || Route::currentRouteName()  == 'categories.index'  ? 'collapse show' : 'collapse'}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item {{ Route::currentRouteName() == 'blogs.index' ? 'active' : '' }}" href="{{ url('/admin/blogs') }}">Blogs</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}" href="{{ url("/admin/categories") }}">Category</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePortfolio"
                    aria-expanded="true" aria-controls="collapsePortfolio">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Portfolio</span>
                </a>
                <div id="collapsePortfolio" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                        <a class="collapse-item {{ Route::currentRouteName() == 'portfolio.index' ? 'active' : '' }}" href="{{ route('portfolio.index') }}">Portfolio</a>
                        {{-- <a class="collapse-item {{ Route::currentRouteName() == 'portfolio.categories.index' ? 'active' : '' }}" href="{{ route('portfolio.categories.index') }}">Category</a> --}}
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Route::currentRouteName() == 'service.index' ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('service.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Services</span></a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == 'teams.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('teams.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Teams</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Application Settings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.app.setting' ? 'active' : '' }}" href="{{ route('admin.app.setting') }}">General Settings</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>




            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
