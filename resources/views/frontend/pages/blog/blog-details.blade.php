@extends('frontend.layouts.app')

@section('title', $blog->title)
@section('seo_title', $blog->meta_title)
@section('meta_description', $blog->meta_description)
@section('meta_keywords', $blog->meta_tags)


@section('styles')
<style type="text/css">
    .social li{
        list-style: none;
        background: #e2e2e2;
        margin-left: 5px;
        text-align: center;
        border-radius:5px;
    }
   .social li span{
        font-size: 20px;
    }
    .social ul li{
        display: inline-block;
        padding: 10px 10px 5px;
    }
   .social #social-links{
        float: left;
    }
</style>
@endsection
@section('content')



<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/blogs') }}">Blogs</a></li>
        <li>{{ $blog->title }}</li>
      </ol>
      <h1>{{ $blog->title }}</h1>

    </div>
  </section><!-- End Breadcrumbs -->

      <Section class="blog-inner">
        <div class="container" data-aos="zoom-in">

          <div class="row">
            <div class="col-lg-8 text-start">
              <h3>{{ $blog->title }}</h3>
              <br>
              <div class="blog-row"><i class="fas fa-calendar-alt"></i> {{ formated_date($blog->crated_at) }} <i
                  class="fas fa-briefcase ms-3"></i>{{ $blog->category }}</div>
              <br>
              <div class="img-banner">
                <img src="{{ get_storage_location() }}/{{ $blog->image }}" width="100%" alt="{{ $blog->title }}">
              </div>
              <br>
              {!! $blog->description !!}
              <div>

                  <div class="card-body social mt-4 float-right">

                      {!! $socialShare !!}
                  </div>
              </div>

              <div class="row mt-5">
                <h3 class=" text-uppercase">Our category</h3>
                <div class="col-md-4">

                    <div class="card">
                      <img class="card-img"
                        src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                        alt="Bologna">
                      <div class="card-body">
                        <h4 class="card-title">Pasta with Prosciutto</h4>
                        <div class=" text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp; June 13, 2019 <br>
                          <i class="fas fa-briefcase "></i> PHP</div>
                        <p class="card-text text-secondary mt-2 mb-1">I love quick, simple pasta dishes, and this is one
                          of my
                          favorite.</p>
                        <a href="BlogInner.html" class="read-more">Read More</a>
                      </div>

                    </div>
                </div>
                <div class="col-md-4">

                  <div class="card">
                    <img class="card-img"
                      src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                      alt="Bologna">
                    <div class="card-body">
                      <h4 class="card-title">Pasta with Prosciutto</h4>
                      <div class=" text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp; June 13, 2019 <br>
                        <i class="fas fa-briefcase "></i> PHP</div>
                      <p class="card-text text-secondary mt-2 mb-1">I love quick, simple pasta dishes, and this is one
                        of my
                        favorite.</p>
                      <a href="BlogInner.html" class="read-more">Read More</a>
                    </div>

                  </div>
                </div>
                <div class="col-md-4">

                  <div class="card">
                    <img class="card-img"
                      src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                      alt="Bologna">
                    <div class="card-body">
                      <h4 class="card-title">Pasta with Prosciutto</h4>
                      <div class=" text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp; June 13, 2019 <br>
                        <i class="fas fa-briefcase "></i> PHP</div>
                      <p class="card-text text-secondary mt-2 mb-1">I love quick, simple pasta dishes, and this is one
                        of my
                        favorite.</p>
                      <a href="BlogInner.html" class="read-more">Read More</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 text-start">
              <h3 class=" text-uppercase">Related Blog</h3>

              <div class="row">
                <div class="card">
                  <div class="row">
                    <div class="col-md-4 p-0 m-0">
                      <img class="d-block w-100 h-100 p-0" src="https://picsum.photos/150?image=641" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-block">
                        <h5>Lorem, ipsum dolor sit amet consectetur adipisicing e</h5>
                        <a href="BlogInner.html">Read More</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="card">
                  <div class="row">
                    <div class="col-md-4 p-0 m-0">
                      <img class="d-block w-100 h-100 p-0" src="https://picsum.photos/150?image=641" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-block">
                        <h5>Lorem, ipsum dolor sit amet consectetur adipisicing e</h5>
                        <a href="BlogInner.html">Read More</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="card">
                  <div class="row">
                    <div class="col-md-4 p-0 m-0">
                      <img class="d-block w-100 h-100 p-0" src="https://picsum.photos/150?image=641" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-block">
                        <h5>Lorem, ipsum dolor sit amet consectetur adipisicing e</h5>
                        <a href="BlogInner.html">Read More</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="card">
                  <div class="row">
                    <div class="col-md-4 p-0 m-0">
                      <img class="d-block w-100 h-100 p-0" src="https://picsum.photos/150?image=641" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-block">
                        <h5>Lorem, ipsum dolor sit amet consectetur adipisicing e</h5>
                        <a href="BlogInner.html">Read More</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <h3 class=" text-uppercase">Category</h3>
                <div class="card">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="category">
                          <ul>
                           @foreach ($categories as $category)
                           <li><a href=""><i class="fas fa-check-double me-2"></i>{{ $category->category }}</a></li>

                           <hr>
                           @endforeach
                       </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </Section>


@endsection
