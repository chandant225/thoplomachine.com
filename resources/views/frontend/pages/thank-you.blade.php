@extends('frontend.layouts.app')

@section('title', 'Thank you -Thoplomachine')
@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Thank You</li>
      </ol>
      <h1>Thank You</h1>

    </div>
  </section><!-- End Breadcrumbs -->

<div class="jumbotron text-center m-5">
  <h1 class="display-1 text-success">Thank You!</h1>
  <p class="lead">We will get back to you soon.</p>

  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{ url('/') }}" role="button">Continue to homepage</a>
  </p>
</div>

@endsection
