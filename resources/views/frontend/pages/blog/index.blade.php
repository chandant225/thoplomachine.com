@extends('frontend.layouts.app')
@section('title', 'Blogs - Thoplomachine')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">

            <ol>
              <li><a href="index.html">Home</a></li>
              <li>Blog</li>
            </ol>
            <h2>Blog</h2>

          </div>
        </section><!-- End Breadcrumbs -->

            <section class="inner-page">
          <div class="container">
            <!-- ======= Blog ======= -->
        <Section id='blog' class="blog">
          <div class="container" data-aos="fade-up">
            <div class="section-title">
              <h2>Our Recent Blog</h2>

            </div>
            <div class="row mt-4">
        @if(count($blog) > 0)

                @foreach ($blog as $item)<div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="card">
                  <img class="card-img"
                    src="{{ URL::asset('storage/') }}/{{ $item->image }}"
                    alt="{{ $item->title }}">
                  <div class="card-body">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <div class="views m-2 font-weight-bold"><i class="fas fa-calendar-day"></i> &nbsp;{{ \Carbon\Carbon::parse($item->created_at )->toFormattedDateString() }}

                    </div>
                    <p class="card-text text-secondary ">{!! $item->blog_introduction !!}</p>
                    <a href="{{ route('blog.view', $item->slug) }}" >Read More</a>
                  </div>
                  <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                  </div>
                </div>
              </div>
              @endforeach

            @else
            No Blogs published
            @endif


            </div>
          </div>
        </Section>
        <!-- ======= End Blog ======= -->
          </div>
        </section>

      </main><!-- End #main -->




@endsection
