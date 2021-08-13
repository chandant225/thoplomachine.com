@extends('frontend.layouts.app')

{{-- @section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)
@section('meta_description', $post->meta_description)
@section('seo_title', $post->meta_description) --}}

@section('content')
    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
        <div class="container">

          <div class="row" data-aos="zoom-in">

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>

          </div>

        </div>
      </section><!-- End Cliens Section -->

      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2> #dare to automate</h2>
          </div>

          <div class="row content">
            <div class="col-lg-6 text-center">
              <img src="assets/img/about-us.png" class="img-fluid animated" alt="" width="250px">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Having half a decade of experience working as a freelancer with National and International clients, we
                have helped 100’s of industries boosting their products with our automation system.
              </p>
              <a href="AboutUs.html" class="btn-learn-more">Learn More</a>
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->

      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">

          <div class="row">

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

              <div class="content">
                <h3>Why <strong>Thoplo machine</strong></h3>
                <p>
                  Our execution strategy incorporates proven methodologies, extremely qualified personnel, and a highly
                  responsive approach to managing deliverables.
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
              style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
          </div>

        </div>
      </section><!-- End Why Us Section -->

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
                  src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/3_im0078_We_Asked_You_Answered_We_Delivered_684x684.jpg?$684_684_PNG$"
                  alt="" id="slider">
              </div>
            </div>
            <div class="col-md-6">
              <div class="content ">
                <div class="content-item  "
                  onmouseenter="changeImg('https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/3_im0078_We_Asked_You_Answered_We_Delivered_684x684.jpg?$684_684_PNG$')"
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
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Services</h2>
          </div>

          <div class="row">
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon">
                  <div class="icon-img">
                  </div>
                </div>
                <div class="card-body">
                  <h4><a href="">Fish Pond Automation</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                  <a class="learn-more-btn" href="ServicesInner.html">
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
            </div>

            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
              data-aos-delay="200">
              <div class="icon-box">
                <div class="icon">
                  <div class="icon-img">
                  </div>
                </div>
                <div class="card-body">
                  <h4><a href="">IoT Devices - Home Automation</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                  <a class="learn-more-btn" href="ServicesInner.html">
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
            </div>

            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
              data-aos-delay="300">
              <div class="icon-box">
                <div class="icon">
                  <div class="icon-img">
                  </div>
                </div>
                <div class="card-body">
                  <h4><a href="">IoT Devices - Industrial Automation</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                  <a class="learn-more-btn" href="ServicesInner.html">
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
            </div>

            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
              data-aos-delay="400">
              <div class="icon-box">
                <div class="icon">
                  <div class="icon-img">

                  </div>
                </div>
                <div class="card-body">
                  <h4><a href="">Long Range Device Development</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                  <a class="learn-more-btn" href="ServicesInner.html">
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
            </div>

          </div>

        </div>
      </section><!-- End Services Section -->


      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

          <div class="row align-items-center">
            <div class="col-lg-9 text-center text-lg-start">
              <h3>Let’s Play with AI and IoT Automation, Simplifying your Life with Thoplo.</h3>

            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="#">Reach Us</a>
            </div>
          </div>

        </div>
      </section><!-- End Cta Section -->


      <!-- ======= Blog ======= -->
      <Section id='blog' class="blog">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Our Recent Blog</h2>

          </div>
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="card">
                <img class="card-img"
                  src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                  alt="Bologna">
                <div class="card-body">
                  <h4 class="card-title">Pasta with Prosciutto</h4>
                  <p class="card-text">I love quick, simple pasta dishes, and this is one of my favorite.</p>
                  <a href="BlogInner.html" class="btn btn-info">Read More</a>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                  <div class="views">Oct 20, 12:45PM
                  </div>
                  <div class="stats">
                    <i class="far fa-eye"></i> 1347
                    <i class="far fa-comment"></i> 12
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
              data-aos-delay="200">
              <div class="card">
                <img class="card-img"
                  src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                  alt="Bologna">
                <div class="card-body">
                  <h4 class="card-title">Pasta with Prosciutto</h4>
                  <p class="card-text">I love quick, simple pasta dishes, and this is one of my favorite.</p>
                  <a href="BlogInner.html" class="btn btn-info">Read More</a>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                  <div class="views">Oct 20, 12:45PM
                  </div>
                  <div class="stats">
                    <i class="far fa-eye"></i> 1347
                    <i class="far fa-comment"></i> 12
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
              data-aos-delay="200">
              <div class="card">
                <img class="card-img"
                  src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                  alt="Bologna">
                <div class="card-body">
                  <h4 class="card-title">Pasta with Prosciutto</h4>
                  <p class="card-text">I love quick, simple pasta dishes, and this is one of my favorite.</p>
                  <a href="BlogInner.html" class="btn btn-info">Read More</a>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                  <div class="views">Oct 20, 12:45PM
                  </div>
                  <div class="stats">
                    <i class="far fa-eye"></i> 1347
                    <i class="far fa-comment"></i> 12
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </Section>
      <!-- ======= End Blog ======= -->
      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>AI and IoT Automation FAQ's</h2>
          </div>

          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                  data-bs-target="#faq-list-1">What are IoT devices? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                  <p>
                    IoT devices are smart devices that are connected wirelessly to the network such as sensors, actuators,
                    gadgets, appliances or machines, and are capable of transmitting data over the internet or other
                    networks. With the feature of super connectivity, these devices are capable of communicating and
                    interacting over the internet.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
                  class="collapsed">Why do we need IoT and automated devices?<i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    The world has been managed to take leaps and humanity has thrived due to the incorporation of AI. AI
                    has transformed life by automating everyday tasks and has been able to make some revolutionary changes
                    through predictive and intuitive personal digital assistants, autonomous vehicles, and smart
                    algorithms that are able to predict human behavior and their routine response patterns. Basically, AI
                    has managed to ease tasks by making everything simpler.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                  class="collapsed">How A.I Is Changing our life as we know it?<i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum
                    integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt.
                    Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi
                    quis
                  </p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4"
                  class="collapsed">What are the fields revolutionized by IoT?<i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    There is probably no domain that is not touched by automated IoT devices. IoT devices have changed the
                    game of sectors by innovating Smart homes, the automobile industry, smart farming, healthcare, energy,
                    manufacturing, healthcare, and many more. IoT devices continue to show and extend their dominance over
                    other areas and continue to grow bigger.
                  </p>
                </div>
              </li>


            </ul>
          </div>

        </div>
      </section><!-- End Frequently Asked Questions Section -->

@endsection
