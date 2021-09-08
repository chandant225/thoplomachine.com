@extends('frontend.layouts.app')

@section('title', 'Our Teams - Thoplomachine')

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.html">Home</a></li>
        <li>{{ get_setting('ourteams_title') }}</li>
      </ol>
      <h2>{{ get_setting('ourteams_title') }}</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ get_setting('ourteams_title') }}</h2>
            <p>
                {{ get_setting('ourteam_description') }}
            </p>
          </div>

          <div class="row mt-3">
            @if (count($teams) > 0)
                @foreach ($teams as $team)
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic"><img src="{{ get_storage_location() }}/{{ $team->image }}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->role }}</span>
                            @if($team->description)
                                <p>
                                    {{ $team->description }}
                                </p>
                            @endif

                            <div class="social">
                                @if ($team->facebook)
                                    <a href="{{ $team->facebook }}"><i class="ri-facebook-fill"></i></a>
                                @endif
                                @if ($team->twitter)
                                    <a href="{{ $team->twitter }}"><i class="ri-twitter-fill"></i></a>
                                @endif

                                @if ($team->linkedin)
                                    <a href="{{ $team->linkedin }}"><i class="ri-linkedin-box-fill"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <span class="text-bold">No data found.</span>
            @endif

          </div>

        </div>
      </section><!-- End Team Section -->
    </div>
  </section>
@endsection
