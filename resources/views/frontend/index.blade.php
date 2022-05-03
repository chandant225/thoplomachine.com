@extends('frontend.layouts.app')

{{-- @section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)
@section('meta_description', $post->meta_description)
@section('seo_title', $post->meta_description) --}}
@section('styles')
<style>
    .image-fit {
    object-fit: cover;
    height: 174px;

}
</style>
@endsection
@section('content')
@if (get_setting('hero_section') == '1')

<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">

          {!! get_setting('hero_text') !!}

          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="{{ get_setting('hero_youtube_link')  ? get_setting('hero_youtube_link') : 'https://www.youtube.com/watch?v=lzu2liLRkJM'  }}" class="glightbox btn-watch-video"><i
                class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ get_setting('hero_image') ? get_storage_location(). '/'.get_setting('hero_image')  : asset('assets/frontend/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endif


    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
        <div class="container">
          <div data-aos="zoom-in">
          <div class="swiper">
              <div class="swiper-wrapper">
                 @if (count($clients) > 0)
                    @foreach ($clients as $client)
                      <div class="swiper-slide">
                         <img src="{{ get_storage_location() }}/{{ $client->image }}" class="" alt="{{ $client->name }}">
                        </div>
                    @endforeach
            @endif
            <div class="swiper-slide">
                 <img  src="/client/client1.jpeg" alt="client1" class="" />
            </div>
            <div class="swiper-slide">
              <img  src="/client/client2.jpeg" alt="client2" class="" />
         </div>
         <div class="swiper-slide">
          <img  src="/client/client3.jpeg" alt="client3" class="" />
     </div>
              </div>
          </div>
         

          </div>

        </div>
      </section><!-- End Cliens Section -->

      <!-- ======= About Us Section ======= -->
      @if(get_setting('about_section') == '1')
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2> {{ get_setting('about_title') ? get_setting('about_title')  : 'About Us' }} </h2>
          </div>

          <div class="row content">
            <div class="col-lg-6 text-center">
              <img src="{{ get_setting('about_image') ? get_storage_location(). '/'.get_setting('about_image') : asset('assets/frontend/img/about-us.png') }}" class="img-fluid animated" alt="" width="250px">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                {{ get_setting('about_description') }}
              </p>
              <a href="{{ url('/about-us') }}" class="btn-learn-more">Learn More</a>
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->
      @endif
      @if (get_setting('whyus_section') == '1')
      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">

          <div class="row">

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

              <div class="content">
                <h3>{{ get_setting('whyus_title') }}</h3>
                <p>
                  {{ get_setting('whyus_description') }}
                </p>
              </div>

              <div class="accordion-list">
                <ul>
                  <li>
                    <a data-bs-toggle="collapse" class="collapse"
                      data-bs-target="#accordion-list-1"><span>01</span>User-Friendly and Interactive designs<i
                        class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                      <p>
                        Innovative designs for exceptional user experience and easy to operate
                      </p>
                    </div>
                  </li>

                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>
                      Secure Connectivity and Smooth Functioning <i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Utmost-protected connectivity resulting in effortless operation
                      </p>
                    </div>
                  </li>

                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>
                      A.I backed for Intelligent Automation<i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Radical technology supported through real-time intelligent automation
                      </p>
                    </div>
                  </li>
                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span>
                      Custom IoT Development and Innovation
                      <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Path-breaking innovation with personalized IoT infrastructures
                      </p>
                    </div>
                  </li>
                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed"><span>05</span>
                      Eco-friendly with Energy Efficient Automated IoT tools<i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Eco-friendly&Energy efficient solution through smart IoT devices
                      </p>
                    </div>
                  </li>

                </ul>
              </div>

            </div>

            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
              style='background-image: url({{ get_storage_location() }}{{ '/' }}{{ get_setting('whyus_image') }});' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
          </div>

        </div>
      </section><!-- End Why Us Section -->
      @endif

      <!-- ======= Our Mission ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Inovate the SmartLife </h2>
          </div>

          <div class="row content">
            <div class="col-lg-12 pt-4 pt-lg-0">
              <p class="text-center">Thoplo machine is a firm believer that you should be the driver in control of your
                reality. The mundane
                tasks get the best out of humans. Labor-intensive repetitive tasks have constantly terminated the creative
                aspect of the human mind. Thoplo machine pursues to fill this gap by crafting automatic and smart IoT
                solutions. Thoplo machine also aspires to be the leading innovator and nourish a smart society with
                automated technologies that fit all unique needs.</p>
            </div>
          </div>

        </div>
      </section><!-- End Mission -->


      <!-- ======= gallery ======= -->
      <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Automate the infinite possibilities</h2>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="image">
                <img
                  src="/bulb.jpeg"
                  alt="" id="slider">
              </div>
            </div>
            <div class="col-md-6">
              <div class="content ">
                <div class="content-item  "
                  onmouseenter="changeImg('/bulb.jpeg')"
                  onclick="loadImage(1)">
                  <div class="row ">
                    <div class="col-md-2 text-center"><span>01</span></div>
                    <div class="col-md-10 text-start ">
                      <h4>We Asked, You Answered, We Delivered</h4>
                      <div class="visibility-content" id="visibility-content">
                        <a href="#">Learn more</a>
                        <br>
                        <br>
                        <hr>
                        <img class="showHide"
                          src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/3_im0078_We_Asked_You_Answered_We_Delivered_684x684.jpg?$684_684_PNG$"
                          alt="" width="100%">
                      </div>

                    </div>


                  </div>
                </div>

                <div class="content-item mt-5"
                  onmouseenter="changeImg('https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_detail/experiences/unbox-part2-image/vd0035_home-explore-banner_pc_684x684.jpg?$684_684_PNG$')">
                  <div class="row ">
                    <div class="col-md-2 text-center"><span>02</span></div>
                    <div class="col-md-10 text-start ">
                      <h4>Unbox & Discover</h4>
                      <div class="visibility-content">
                        <a href="#">Learn more</a>
                        <br>
                        <br>
                        <hr>
                        <img class="showHide"
                          src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_detail/experiences/unbox-part2-image/vd0035_home-explore-banner_pc_684x684.jpg?$684_684_PNG$"
                          width="100%">
                      </div>
                    </div>


                  </div>
                </div>
                <div class="content-item mt-5"
                  onmouseenter="changeImg('https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_detail/brand/reimagine-a-better-planet/global0025_home-explore-zone_pc_684x684.jpg?$684_684_PNG$')">
                  <div class="row ">
                    <div class="col-md-2 text-center"><span>03</span></div>
                    <div class="col-md-10 text-start ">
                      <h4>Reimagine a Better Planet</h4>
                      <div class="visibility-content">
                        <a href="#">Learn more</a>
                        <br>
                        <br>
                        <hr>
                        <img class="showHide"
                          src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_detail/brand/reimagine-a-better-planet/global0025_home-explore-zone_pc_684x684.jpg?$684_684_PNG$"
                          width="100%">
                      </div>
                    </div>


                  </div>
                </div>
                <div class="content-item mt-5"
                  onmouseenter="changeImg('https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/9_da_Staycation-Tag_684x684.jpg?$684_684_PNG$')">
                  <div class="row ">
                    <div class="col-md-2 text-center"><span>04</span></div>
                    <div class="col-md-10 text-start ">
                      <h4>Stay Safe, Stay Healthy</h4>
                      <div class="visibility-content">
                        <a href="#">Learn more</a>
                        <br>
                        <br>
                        <hr>
                        <img class="showHide"
                          src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/9_da_Staycation-Tag_684x684.jpg?$684_684_PNG$"
                          width="100%">
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- End Gallery Section -->

      <!-- ======= Our Movtivation ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Our Fuel to perfection</h2>
          </div>

          <div class="row content">
            <div class="col-lg-12 text-center">
              <p>With the need for radical innovation more than ever, there exists a great opportunity to ease life and
                attain operational efficiency by incorporating IoT devices. Crafted in the land of the Himalayas, the
                Thoplo machine understands that there exists a need for minimizing human intervention and attaining your
                ultimate potential. Thoplo machine aims to provide you the needed comfort with intelligent, automated, and
                smart IoT devices to ease and provide the best life experience with optimum efficiency. Thoplo machine
                strives to create energy-efficient, sustainable, and environmentally adaptable offerings while being
                accessible to every demographic so that everyone can have an excellent user experience. We believe in
                making an impact on society that stands out with our durable upgrades to life, taking the leap needed in
                the technology arena.</p>

            </div>

          </div>
      </section><!-- End Motivation -->

      <!-- ======= Services Section ======= -->
      @if (count($services) > 0)
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Services</h2>
          </div>

          <div class="row">
            @foreach ($services as $service)

              <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <a href="{{ url('service') }}/{{ $service->slug }}">
                <div class="card">
                  <img class="card-img image-fit"
                    src="{{ get_storage_location() }}/{{ $service->image }}"
                    alt="{{$service->title }}"
                    class="">
                    <div class="card-body">
                      <h4><a href="">{{ $service->name }}</a></h4>
                      <p>{{ $service->service_info }}</p>
                      <a class="learn-more-btn" href="{{ url('service') }}/{{ $service->slug }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="12" cy="12" r="10"></circle>
                          <line x1="12" y1="8" x2="12" y2="16"></line>
                          <line x1="8" y1="12" x2="16" y2="12"></line>
                      </svg>
                      Learn More
                      </a>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->
@endif


      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

          <div class="row align-items-center">
            <div class="col-lg-9 text-center text-lg-start">
              <h3>Let’s Play with AI and IoT Automation, Simplifying your Life with Thoplo.</h3>

            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="{{ url('contact-us')  }}">Reach Us</a>
            </div>
          </div>

        </div>
      </section><!-- End Cta Section -->


      <!-- ======= Blog ======= -->
      @if (count($blogs) > 0)
      <Section id='blog' class="blog">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Our Recent Blog</h2>

          </div>
          <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
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
        </div>
    </div>
</Section>
@endif
      <!-- ======= End Blog ======= -->
      <!-- ======= Frequently Asked Questions Section ======= -->
      @if (count($faqs) > 0)

          <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>AI and IoT Automation FAQ's</h2>
              </div>

              <div class="faq-list">
                <ul>
                    @foreach ($faqs as $key=>$faq )

                        <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                            data-bs-target="#faq-list-{{ $key }}">{{ $faq->title }}<i class="bx bx-chevron-down icon-show"></i><i
                            class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-{{ $key }}" class="collapse  {{ $key == 0 ? 'show' : '' }}" data-bs-parent=".faq-list">
                            {{ $faq->description }}
                        </div>
                        </li>
                     @endforeach
                </ul>
              </div>

            </div>
          </section><!-- End Frequently Asked Questions Section -->
      @endif

@endsection
