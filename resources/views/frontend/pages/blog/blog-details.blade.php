@extends('frontend.layouts.app')
@section('content')

@section('title', $blog->title)

@section('meta_description')
        {{$blog->meta_description ? $blog->meta_description : ""}}
@endsection

@section('meta_kewords')
         {{$blog->meta_keywords ? $blog->meta_keywords : ""}}
@endsection

@section('seo_title')
         {{$blog->seo_title ? $blog->seo_title : $blog->title}}
@endsection

 <main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('blogs') }}">Blogs</a></li>
                  <li class="breadcrumb-item active text-white" aria-current="page">{{ $blog->title }}</li>
                </ol>
              </nav>
          <ol>
          <h1>{{ $blog->title }}</h1>

        </div>
      </section><!-- End Breadcrumbs -->



    <Section class="blog-inner">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-8 text-start">
            <h3>{{ $blog->title }}</h3>
            {!! $blog->description !!}
          </div>
          <div class="col-lg-4 text-start">
            <h3>Our Blog</h3>

            <div class="row">
              <div class="card">
                <div class="row">
                  <div class="col-md-4 p-0 m-0">
                    <img class="d-block w-100 h-100 p-0" src="https://picsum.photos/150?image=641" alt="">
                  </div>
                  <div class="col-md-8">
                    <div class="card-block">
                      <h5>Lorem, ipsum dolor sit amet consectetur adipisicing e</h5>
                      <span class="text-secondary">Change around the content for awsomenes</span>
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
                      <span class="text-secondary">Change around the content for awsomenes</span>
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
                      <span class="text-secondary">Change around the content for awsomenes</span>
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
                      <span class="text-secondary">Change around the content for awsomenes</span>
                      <a href="BlogInner.html">Read More</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </Section>


  </main><!-- End #main -->

@endsection
