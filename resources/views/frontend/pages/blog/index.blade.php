@extends('frontend.layouts.app')
@section('title', 'Our recent blogs - Thoplomachine')
@section('content')
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
          <div class="row">
            @if (count($blogs) > 0)
                @foreach ($blogs as $blog)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ url('blog') }}/{{ $blog->slug }}">
                      <div class="card">
                        <img class="card-img"
                          src="{{ get_storage_location() }}/{{ $blog->image }}"
                          alt="{{$blog->title }}">
                        <div class="card-body ">
                          <h4 class="card-title">{{ $blog->title }}</h4>
                          <div class="blog-row text-secondary">
                            <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;
                            {{ formated_date($blog->created_at) }}
                            <i class="fas fa-briefcase ms-4 "></i>&nbsp;&nbsp;
                            {{ $blog->category }}
                          </div>
                          <p class="card-text text-secondary mt-2 mb-1">
                              {{ $blog->blog_intro }}
                          </p>
                          <a href="{{ url('blog') }}/{{ $blog->slug }}" class="read-more">Read More</a>
                        </div>

                      </div>
                    </a>
                  </div>
                @endforeach
            @else
                <span class="text-bold">No data found.</span>
            @endif

            <div class="mt-4 text-right">

                {{ $blogs->links() }}
            </div>

          </div>
        </div>
      </Section>
      <!-- ======= End Blog ======= -->
    </div>
  </section>
@endsection
