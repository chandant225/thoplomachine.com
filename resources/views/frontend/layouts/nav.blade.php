<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        @if (get_setting('app_logo'))
            <a href="{{ url('/') }}" class="logo me-auto"><img src="{{ URL::asset('storage/') }}/{{ get_setting('app_logo') }}" alt="{{ env('APP_NAME') }}" class="img-fluid"></a>
        @else

        <h1 class="logo me-auto text-white"><a href="{{ url('/') }}"></a>Tmachine</h1>
        @endif

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto {{ Route::current()->uri == '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
          <li><a class="nav-link {{ Route::current()->uri == '/about-us' ? 'active' : '' }}" href="{{ url('/about-us') }}">About</a></li>
          <li><a class="nav-link" href="Services.html">Services</a></li>
          <li><a class="nav-link " href="Product.html">Product</a></li>
          <li><a class="nav-link " href="Team.html">Team</a></li>
          <li><a class="nav-link " href="portfolio-details.html">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="Blog.html">Blog</a></li>
          <li><a class="nav-link scrollto" href="Contact.html">Contact</a></li>
          <li><a class="getstarted " href="Shop.html">Shop</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
