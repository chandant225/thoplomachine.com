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
    
    @php 
       
    @endphp

  <section class="inner-page">
    <div class="container">
    <!-- ======= Pricing Section ======= -->
  <section id="product" class="product">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Products</h2>
      </div>

      <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/hydro-siren.jpg" class="card-img-top" alt="hydro-siren.jpg">
                <div class="card-body">
                  <a href="/blogs/hydro-siren"><h5 class="card-title">Hydro Siren System</h5></a>
                  <p class="card-text">Siren or alerting system is one of the essential features for hydropower in order to alert nearby people and/or settlement.</p>
                  {{-- <a href="/blogs/hydro-siren" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>


          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/sensor based irrigation.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#"><h5 class="card-title">Sensor Based Irrigation</h5></a>
                  <p class="card-text">Sensor Based Irrigation scheduling is most often used to schedule irrigations under real-time, on-demand conditions.</p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/co2.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#"><h5 class="card-title">Co2 Sensor</h5></a>
                  <p class="card-text">CO2 Sensors are used to measure the levels of carbon dioxide (CO2). It is important to monitor this gas as it is an indicator of CO2 emission levels.</p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/water.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                 <a href="#"> <h5 class="card-title">Automatic water level controller</h5></a>
                  <p class="card-text"> Automatic water level controllers are a product that is created to automatically control a motor, which helps to ensure a constant reserve of water in a storage tank.</p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/weather.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#"><h5 class="card-title">Weater station</h5></a>
                  <p class="card-text">
                    A weather station is a facility, either on land or sea, with instruments and equipment for measuring atmospheric conditions to provide information for weather forecasts and to study the weather and climate.
                    {{-- {{\Illuminate\Support\Str::words('', 20)}}    --}}
                   </p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/drip.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                 <a href="#"> <h5 class="card-title">Automatic Drip irrigation system</h5></a>
                  <p class="card-text">
                          Drip irrigation is a form of irrigation that saves water and fertilizer by allowing water to drip slowly to the roots of many of different plants, either onto the soil surface or directly onto the foundation zone, through a network of valves, pipes, tubing, and emitters.
                   </p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/hydrophonic.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#"><h5 class="card-title">Hydroponic</h5></a>
                  <p class="card-text">
                    Hydroponics is a method of growing plants without soil. You can grow hydroponically all year long. Hydroponics uses less water than traditional soil-based systems. Hydroponic growing allows for faster growth and higher yields than traditional soil-based growing systems.
                   </p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="rounded shadow"  style="margin-top: 1rem;">
                <img style="height: 12rem" src="/product_images/Green house automation.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                 <a href="#"> <h5 class="card-title">Greenhouse automation system</h5></a>
                  <p class="card-text">
                          Automated greenhouse is to ease people when they wish to grow plants. It helps to monitor the situation, when they are not at home. The main aim of this paper is to minimize the human care needed for the plant by automating the green house and monitor the in-house environment status
                   </p>
                  {{-- <a href="#" class="btn btn-primary">View More</a> --}}
                </div>
              </div>
          </div>

      </div>

    </div>
  </section><!-- End Pricing Section -->
    </div>
  </section>

@endsection
