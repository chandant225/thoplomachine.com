@extends('frontend.layouts.app')

@section('title', $aboutus->seo_title ? $aboutus->seo_title : 'About Us')

@section('meta_description'){{$aboutus->meta_description ? $aboutus->meta_description : ""}}@endsection
@section('meta_keywords'){{$aboutus->meta_keywords ? $aboutus->meta_keywords : ""}}@endsection
@section('seo_title'){{$aboutus->seo_title ? $aboutus->seo_title : $aboutus->title}}@endsection

@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>About Us</li>
        </ol>
        <h2>About Us</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
           <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About Us</h2>
          </div>

          <div class="row content">
            <div class="col-lg-6   about-img" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/frontend/img/about-us.png" class="img-fluid animated" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
            @if($aboutus)
                {!! $aboutus->description !!}
            @else
                No Data
            @endif
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->
      </div>
    </section>

  </main><!-- End #main -->

@endsection
