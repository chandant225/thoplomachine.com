<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow nav-width">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <a href="{{ url('/') }}">
        <button class="btn btn-sm btn-primary d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2  mx-5 my-md-0 mw-100">
            Visit Site
        </button>
    </a>

    <a href="#">
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="text-decoration-none text-danger ml-5 float-right">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
