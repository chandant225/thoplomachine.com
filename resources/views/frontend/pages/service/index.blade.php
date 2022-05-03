@extends('frontend.layouts.app')

@section('title', 'IoT Solutions and Services - Thoplomachine')
@section('meta_keywords', 'IoT Solutions and Services')
@section('meta_description', 'IoT Solutions and Services')
@section('seo_title', 'IoT Solutions and Services')

@section('styles')
<style>

</style>
@endsection
@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Services</li>
      </ol>
      <h1>{{ get_setting('services_title') }}</h1>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ get_setting('services_title') }}</h2>
            <p>
                {{ get_setting('service_desc') }}
            </p>
          </div>

          <section>
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Agriculture Automation</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Industrial automation</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Hydropower automation</button>
              </div>
            </nav>
            <div class="tab-content mt-4" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>Automation in agricyulture (Green house automation, Hrdroponics, Aquaponic, sensor based irrigation, and agriculture constultant).</p>
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/agro1.jpeg" alt="agro1.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/agro2.jpeg" alt="agro2.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/agro3.jpeg" alt="agro3.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/agro4.jpeg" alt="agro4.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> <p>Automatize industrial process with features of IOT and modern control system.</p>
              </div>
              
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><p>Hydropower automation include automatic panic siren, automatic valve controll according to water level at powerhouse dam.</p>
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/hydro1.jpeg" alt="hydro1.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/hydro2.jpeg" alt="hydro2.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="/service_images/hydro3.jpeg" alt="hydro3.jpeg" class="w-100 h-75 shadow rounded" />
                  </div>
                </div>
              </div>
            </div>
          </section>



          <div class="row">
              @if (count($services) > 0)
                  @foreach ($services as $service)

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ url('service') }}/{{ $service->slug }}">
                      <div class="card">
                        <img class="card-img image-fit"
                          src="{{ get_storage_location() }}/{{ $service->image }}"
                          alt="{{$service->title }}"
                          class="">
                          <div class="card-body">
                            <h4><a href="">{{ $service->name }}</a></h4>
                            <p>{{ $service->service_info }}</p>
                            <a class="learn-more-btn" href="{{ url('service') }}/{{ $service->slug }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            Learn More
                            </a>
                        </div>
                      </div>
                    </a>
                  </div>
                  @endforeach
              @endif
          </div>


        </div>
      </section><!-- End Services Section -->
    </div>
  </section>
@endsection
