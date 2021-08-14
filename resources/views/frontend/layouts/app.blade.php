@include('frontend.layouts.header')

  <!-- ======= Nav ======= -->
    @include('frontend.layouts.nav')
    <!-- ======= Hero Section ======= -->

  <main id="main">

        @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <!-- End Footer -->
@include('frontend.layouts.footer')
