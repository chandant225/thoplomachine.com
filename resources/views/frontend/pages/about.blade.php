@extends('frontend.layouts.app')

{{-- @section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)
@section('meta_description', $post->meta_description)
@section('seo_title', $post->meta_description) --}}

@section('content')
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
              <img src="{{ asset('assets/frontend/img/about-us.png') }}" class="img-fluid animated" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                There occurs a strong need for an automation system in our everyday life and space. Whether it’s a
                business, institution, or even home, the inability to conduct tasks effectively and efficiently
                remains quite strong more than ever. The revolutionization in technology and the outcomes of
                automation and robotics can really bridge this gap. Thoplo machine commenced its journey in 2018 with
                the vision to grow Nepali products and promote electronic companies in Nepal as an Electronics
                projects and automation company in Nepal.
                <br><br>
                Having half a decade of experience working as a freelancer with National and International clients, we
                have helped 100’s of industries boosting their products with our automation system. Thoplo machine has
                a well-deserved reputation for quality electronic products. Here for improving customer satisfaction
                by providing training and post-sales support for our all products. <br><br> We have partnered with various
                international manufacturers throughout the world. We are committed to improving the customer
                experience through convenience, the accuracy of orders, and the timely delivery of projects. We are
                working on how to integrate electronics and automation with three different themes: IoT, Artificial
                Intelligence, and Robotics.
                <br><br>
                Our execution strategy incorporates proven methodologies, extremely qualified personnel, and a highly responsive approach to managing deliverables.
                Thoplo machine is continually proven to be an industry leader for high quality/guaranteed product/service. We are confident that we can meet the challenges ahead and stand ready to partner with you in delivering an effective IT support solution.
                <br><br>
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> User-Friendly and Interactive designs</li>
                <li><i class="ri-check-double-line"></i> Secure Connectivity and Smooth Functioning
                </li>
                <li><i class="ri-check-double-line"></i> AI-backed by Intelligent Automation </li>
                <li><i class="ri-check-double-line"></i> Custom IoT Development and Innovation</li>
                <li><i class="ri-check-double-line"></i> Time Efficient Approach with Accurate Calibration
                </li>
                <li><i class="ri-check-double-line"></i> Eco-friendly with Energy Efficient Automated IoT tools</li>
                <li><i class="ri-check-double-line"></i> Scalable Designs and flexible Integrations </li>

              </ul>
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->
    </div>
  </section>
@endsection
