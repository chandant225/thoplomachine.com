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
