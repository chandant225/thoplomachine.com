@extends('frontend.layouts.app')

@section('title', 'Clients - Thoplomachine')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Our Respected clients</li>
      </ol>
      <h1>Our Respected clients</h1>

    </div>
  </section><!-- End Breadcrumbs -->
  <section class="inner-page">
    <div class="container">
      <!-- ======= protfolio Section ======= -->
      <section id="protfolio" class="protfolio section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Automating Happiness</h2>
          </div>
          <div class="row">
             @if (count($portfolios) > 0)
             @foreach ($portfolios as $portfolio )
                <div class="col-xl-4 col-md-6 " data-aos="zoom-in" data-aos-delay="100" data-toggle="tooltip" data-placement="right" title="{{ $portfolio->name }}">
                    <div class="porfolio-box">
                        <img src="{{ get_storage_location() }}/{{ $portfolio->image }}" alt="{{ $portfolio->name }}">
                    </div>
                </div>
             @endforeach

                @else
                  <span class="text-bold">No data found.</span>
                @endif
            </div>

        </div>
      </section>
    </div>
  </section>

@endsection
