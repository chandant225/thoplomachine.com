@extends('frontend.layouts.app')

@section('title', 'Contact Us -Thoplomachine')
@section('content')

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Contact us</li>
      </ol>
      <h1>Contact us</h1>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact</h2>
            <p>Every idea either big or Small has the potential to create an impact. Do you have such an idea to
              transform your home/industry and be the next trendsetter in IOT Automation? Control and regulate your
              home/ industry seamlessly.
              <br>
              Well, you need the right team to match your passion and Energy.
              <br>

              Let’s grab a coffee and change the world together.
            </p>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="contact-box">
                <div class="contact-box-inner">
                  <i class="far fa-envelope"></i>
                  <h5>Mail Here</h5>
                  <br>
                  <h6>{{ get_setting('site_email') }}</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-box">
                <div class="contact-box-inner">
                  <i class="fas fa-map-marker-alt"></i>
                  <h5>Visit Here</h5>
                  <br>
                  {!! get_setting('location') !!}
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-box">
                <div class="contact-box-inner">
                  <i class="fas fa-phone-alt"></i>
                  <h5>Call Here</h5>
                  <h6 class="phone-number">
                      {{ get_setting('site_phone') }}
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Contact Section -->
    </div>

    <div class="container ">
      <div class="contact-section">
      <div class="row">

          <div class="col-md-6 p-3 bg-light text-center">
            <h1 class=" ">Get In Touch With Us</h1>
            <h5 class="text-secondary ">Anything On your Mind. We’ll Be Glad To Assist You!</h5>
            <img src="{{ asset('assets/frontend/img/undraw_Envelope_re_f5j4.svg') }}" width="80%" height="100%" alt="">
          </div>
          <div class="col-md-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="8" required></textarea>
              </div>
              <div class="text-center mt-3"><button type="submit">Send Message</button></div>
            </form>

        </div>
      </div>
    </div>
    </div>

    <div class="row">
      <div class="google-map">
        <div class="container-fluid">
          <div class="responsive-map">
              {!! get_setting('map') !!}
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
