@extends('frontend.layouts.app')

@section('title', $service->name)
@section('seo_title', $service->seo_title)
@section('meta_description', $service->meta_description)
@section('meta_keywords', $service->meta_keywords)


@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/services') }}">Services</a></li>
        <li>{{ $service->title }}</li>
      </ol>
      <h1>{{ $service->name }}</h1>

    </div>
  </section><!-- End Breadcrumbs -->
  <Section class="cta-content">
    <div class="container" data-aos="zoom-in">

      <div class="row">
        <h3 class=" text-uppercase">{{ $service->name }}</h3>

        <div class="col-lg-8 text-start">
          <br>
          <div class="img-banner">
            <img src="{{ get_storage_location() }}/{{ $service->image }}"
              width="100%" alt="{{ $service->name }}">
          </div>
          <br>
          {!! $service->description !!}
        </div>
        <div class="col-lg-4 text-start">
            @if(count($others_services) > 0)
                <div class="row mt-4">
                  <h3 class=" text-uppercase">Category</h3>
                  <div class="card">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="category">
                          <ul>
                            @foreach ($others_services as $service)

                            <li><a href="{{ url('service') }}/{{ $service->slug }}">{{ $service->name }}</a></li>

                            @endforeach
                            <hr>
                          </ul>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
            @endif
        </div>

      </div>
  </Section>

@endsection
