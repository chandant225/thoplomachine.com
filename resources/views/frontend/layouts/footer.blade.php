<footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            @if (get_setting('app_logo'))
            <a href="{{ url('/') }}" ><img src="{{ URL::asset('storage/') }}/{{ get_setting('app_logo') }}" alt="{{ env('APP_NAME') }}" class="img-fluid mb-4 img-fit"></a>
        @else

        <h1 class="logo me-auto text-dark"><a href="{{ url('/') }}"></a>Tmachine</h1>
        @endif
            <br>
            <p>
              {!! get_setting('location') !!}
              <br>
              <strong>Phone:</strong> {{ get_setting('site_phone') }}<br>
              <strong>Email:</strong> {{ get_setting('site_email') }}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
              {{-- <li><i class="bx bx-chevron-right"></i> <a href="{{ url() }}">About us</a></li> --}}
              @if(count($pages) > 0)
                @foreach ($pages as $page)
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ url($page->slug) }}">{{ $page->title }}</a></li>
                @endforeach
              @endif
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
                @php
                    $services = footer_services();
                @endphp
                @if(count($services) > 0)
                    @foreach($services as $service)
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('service') }}/{{ $service->slug }}">{{ $service->name }}</a></li>
                    @endforeach
                @endif
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            {{-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> --}}
            <div class="social-links mt-3">
              <a href="{{ get_setting('twitter') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="{{ get_setting('facebook') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="{{ get_setting('instagram') }}" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="{{ get_setting('skype') }}" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="{{ get_setting('linkedin') }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/frontend/vendor/aos/aos.j') }}s"></script>
  <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>
