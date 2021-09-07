@extends('frontend.layouts.app')

{{-- @section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)
@section('meta_description', $post->meta_description)
@section('seo_title', $post->meta_description) --}}

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>{{ get_setting('about_title') }}</li>
      </ol>
      <h2>{{ get_setting('about_title') }}</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ get_setting('about_title') }}</h2>
          </div>

          <div class="row content">
            <div class="col-lg-6   about-img" data-aos="zoom-in" data-aos-delay="200">
              <img src="{{ get_setting('about_image') ? get_storage_location(). '/'.get_setting('about_image') : asset('assets/frontend/img/about-us.png') }}" class="img-fluid animated" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              {!! get_setting('about_us_page_description') !!}
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->
    </div>
  </section>
@endsection
