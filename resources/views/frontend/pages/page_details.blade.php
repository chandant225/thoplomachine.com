@extends('frontend.layouts.app')

{{-- @section('title', 'Clients - Thoplomachine') --}}
@section('title', $page->title)
@section('seo_title', $page->meta_title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)


@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>{{ $page->title }}</li>
      </ol>
      <h1>{{ $page->title }}</h1>

    </div>
  </section><!-- End Breadcrumbs -->
  <section class="inner-page">
    <div class="container">
      <!-- ======= protfolio Section ======= -->
      <section id="protfolio" class="protfolio section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ $page->title }}</h2>
          </div>
          <div class="row">
            {!! $page->content !!}
            </div>

        </div>
      </section>
    </div>
  </section>

@endsection
