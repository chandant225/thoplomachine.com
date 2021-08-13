@include('frontend.layouts.header')

  <!-- ======= Nav ======= -->
    @include('frontend.layouts.nav')
    <!-- ======= Hero Section ======= -->
    @include('frontend.layouts.herosection')

  <main id="main">

        @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <!-- End Footer -->
@include('frontend.layouts.footer')
