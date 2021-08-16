@extends('frontend.layouts.app')

@section('title', 'Our Products - Thoplomachine')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Product</li>
      </ol>
      <h2>Product</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
    <!-- ======= Pricing Section ======= -->
  <section id="product" class="product">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Products</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
              <div class="card h-100 mb-4">
                  <div class="card-header">
                      <h5 class="card-title m-0 p-0 font-weight-bolder text-center">Connected Devices and Sensors</h5>
                  </div>
                  <div class="card-body text-left">
                      <p class="card-text">Arduino, Raspbery, Watson or Adafruit </p>
                      <span class="font-lead-base font-weight-bold text-muted">20% Off!</span>
                      <div class="promotion-promo">$ 11.5</div>
                      <div class="promotion-price">
                          <div class="promotion-price-desc">Now</div>
                          <div class="promotion-price-text">$ 9.5</div>
                      </div>
                  </div>
                  <div class="card-footer text-center"><a href="ShopInner.html" class="btn btn-warning">view more</a></div>
              </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
              <div class="card h-100 mb-4">
                  <div class="card-header">
                      <h5 class="card-title m-0 p-0 font-weight-bolder text-center">IOT Big Data Analytics</h5>
                  </div>
                  <div class="card-body text-left">
                      <p class="card-text">Big Data and Analytics Dashboard for sensor projects.</p>
                      <span class="font-lead-base font-weight-bold text-muted">20% Off!</span>
                      <div class="promotion-promo">$ 22.23</div>
                      <div class="promotion-price">
                          <div class="promotion-price-desc">Now</div>
                          <div class="promotion-price-text">$ 20.23</div>
                      </div>
                  </div>
                  <div class="card-footer text-center"><a href="ShopInner.html" class="btn btn-warning">view more</a></div>
              </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-3 pro-m">
              <div class="card h-100 mb-4">
                  <div class="card-header">
                      <h5 class="card-title m-0 p-0 font-weight-bolder  text-center">Device Data Counter Status</h5>
                  </div>
                  <div class="card-body text-left">
                      <p class="card-text">Up to 500 registered devices, data analyzed per month.</p>
                      <span class="font-lead-base font-weight-bold text-muted">20% Off!</span>
                      <div class="promotion-promo">$ 12.2</div>
                      <div class="promotion-price">
                          <div class="promotion-price-desc">Now</div>
                          <div class="promotion-price-text">$ 10.2</div>
                      </div>
                  </div>
                  <div class="card-footer text-center"><a href="ShopInner.html" class="btn btn-warning">view more</a></div>
              </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-3 pro-m">
              <div class="card h-100 mb-4">
                  <div class="card-header">
                      <h5 class="card-title m-0 p-0 font-weight-bolder  text-center">Enterprise Edition Package</h5>
                  </div>
                  <div class="card-body text-left">
                      <p class="card-text">All features with cloud storage and Full support.</p>
                      <span class="font-lead-base font-weight-bold text-muted">20% Off!</span>
                      <div class="promotion-promo">$ 10</div>
                      <div class="promotion-price">
                          <div class="promotion-price-desc">Now</div>
                          <div class="promotion-price-text">$ 8</div>
                      </div>
                  </div>
                  <div class="card-footer text-center"><a href="ShopInner.html" class="btn btn-warning">view more</a></div>
              </div>
          </div>

      </div>

    </div>
  </section><!-- End Pricing Section -->
    </div>
  </section>

@endsection
