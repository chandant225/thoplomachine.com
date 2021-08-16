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
            <div class="col-lg-12 text-start">
              <h3>{{ $service->name }}</h3>
              {!! $service->description !!}
            </div>
          </div>

        </div>
  </Section>

@endsection
