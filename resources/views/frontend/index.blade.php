@extends('frontend.layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Better Solutions For Your Business</h1>
          <h2>We are team of talented designers making websites with Bootstrap</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

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
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
              voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="AboutUs.html" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= gallery ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Iot things</h2>
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
                onclick="loadImage(1)"                >
                <div class="row ">
                  <div class="col-md-2 text-center"><span>01</span></div>
                  <div class="col-md-10 text-start ">
                    <h4>We Asked, You Answered, We Delivered</h4>
                    <div class="visibility-content" id="visibility-content">
                      <a href="#">Learn more</a>
                      <br>
                      <br>
                      <hr>
                    <img class="showHide" src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/3_im0078_We_Asked_You_Answered_We_Delivered_684x684.jpg?$684_684_PNG$" alt="" width="100%">
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
                      <img class="showHide" src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_detail/experiences/unbox-part2-image/vd0035_home-explore-banner_pc_684x684.jpg?$684_684_PNG$" width="100%">
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
                      <img class="showHide" src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_detail/brand/reimagine-a-better-planet/global0025_home-explore-zone_pc_684x684.jpg?$684_684_PNG$" width="100%">
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
                      <img class="showHide" src="https://images.samsung.com/is/image/samsung/assets/in/p6_gro1/p6_initial_explore_landing/home-explore-kv-update/9_da_Staycation-Tag_684x684.jpg?$684_684_PNG$" width="100%">
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
          <h2>Our Motivation</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
              voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="AboutUs.html" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End Motivation -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
                <div class="icon-img">
                  <span class="date">May 7, 2019</span>
                  <h1>Purpose over passion</h1>
                </div>
              </div>
              <div class="card-body">
                <h4><a href="">Lorem Ipsum</a></h4>
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
                  <span class="date">May 7, 2019</span>
                  <h1>Purpose over passion</h1>
                </div>
              </div>
              <div class="card-body">
                <h4><a href="">Lorem Ipsum</a></h4>
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
                  <span class="date">May 7, 2019</span>
                  <h1>Purpose over passion</h1>
                </div>
              </div>
              <div class="card-body">
                <h4><a href="">Lorem Ipsum</a></h4>
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
                  <span class="date">May 7, 2019</span>
                  <h1>Purpose over passion</h1>
                </div>
              </div>
              <div class="card-body">
                <h4><a href="">Lorem Ipsum</a></h4>
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

    <!-- ======= Our Movtivation ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Misson & goals</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
              voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="AboutUs.html" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End Motivation -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
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
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                  gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
                class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                  donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                  ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                class="collapsed">Dolor sit amet consectetur adipiscing elit? <i
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
                class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc
                  vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus
                  gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5"
                class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem
                dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada
                  nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis
                  tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

@endsection
