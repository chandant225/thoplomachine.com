<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs  navbar-light  bg-secondary" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header align-items-center">
            <a class="navbar-brand d-block col-9 m-auto" href="javascript:void(0)">
                <logo></logo>
            </a>
        </div>
        <div class="navbar-inner mt-3">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/analytics') }}">
                            <i class="ni ni-chart-bar-32 text-orange"></i>
                            <span class="nav-link-text">Analytics</span>
                        </a>
                    </li>

                    {{-- site settings --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cogs"></i> Site Settings
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/admin/homepage') }}">Logo & Homepage Slider</a>
                            <a class="dropdown-item" href="{{ url('/admin/script') }}">Script</a>
                            <a class="dropdown-item" href="{{ url('/admin/infos') }}">Info Pages</a>
                        </div>
                    </li>





                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/api-management') }}">
                            <i class="ni ni-user-run"></i>
                            <span class="nav-link-text">Api Management</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/contact') }}">
                            <i class="fa fa-phone text-primary"></i>
                            <span class="nav-link-text">Contact Us</span>
                        </a>
                    </li>

                    {{-- site settings --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tag"></i> Info
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/admin/infos') }}">Infos</a>
                            <a class="dropdown-item" href="{{ url('/admin/teams') }}">Our Teams</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url('/admin/blogs') }} ">
                            <i class="ni ni-books text-primary"></i>
                            <span class="nav-link-text">Blogs</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url('/admin/portfolio') }} ">
                            <i class="fa fa-trophy text-info"></i>
                            <span class="nav-link-text">Portfolio</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url('/admin/service') }} ">
                            <i class="ni ni-satisfied text-success"></i>
                            <span class="nav-link-text">Service</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url('/admin/newsletter') }} ">
                            <i class="fa fa-envelope text-primary"></i>
                            <span class="nav-link-text">Newsletter</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url('/admin/faq') }} ">
                            <i class="fa fa-comment text-primary"></i>
                            <span class="nav-link-text">Faq</span>
                        </a>
                    </li>
                </ul>

                </ul>
            </div>
        </div>
    </div>
</nav>
