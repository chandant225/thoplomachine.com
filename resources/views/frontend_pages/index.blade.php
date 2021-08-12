@extends('layouts.frontend_layouts.app')
@push('styles')
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/swiper/css/swiper.min.css') }}">
@endpush
@push('metatag')
    <title>Creative Web Design & Development Company Nepal | Outofbox Design</title>
    <meta name="description"
        content="Outofbox Design is a Creative web design & development company based in Nepal. We design websites that are responsive, SEO optimized & conversion oriented. " />
    <meta name="keywords" content="" />
    <meta name="distribution" content="" />
    <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />

    <meta property="og:url" content="http://outofboxdesign.com/" />
    <meta property="og:title" content="OutOfBoxDesign" />
    <meta property="og:description" content="" />
    <meta property="og:image" content=""" />
@endpush
@push('script')                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                    <script src=" {{ asset('/assets/vendors/swiper/js/swiper.min.js') }}">

                    </script>
@endpush

@section('content')

                    <div class=" gap">
    </div>

    <section id="banner">
        <div class="banner">
            <div class="banner-wrapper row col-12 p-0 m-0">
                <div class="banner-title col-md-12 col-lg-6 p-0">
                    <h4 class='color col-lg-5 col-sm-10 col-12' data-aos="zoom-in">
                        Turn your vision into reality
                    </h4>
                    <h1 class="color col-lg-12 col-md-10">
                        Redefining Web <br>
                        <span id="type" class="txt-rotate" data-period="2000" data-rotate='[ "Design", "Development"]'>
                        </span>
                        <br> Landscape in Nepal
                    </h1>
                    <p class="color mt-4 col-xl-12 col-md-8 col-sm-12">
                        Time to build a unique & creative website that best captures your company’s real essence. We help
                        you create a unique brand that resembles your targeted audience & customers.
                    </p>
                    <div class="banner-button mt-5 pl-3">
                        <a href="/contact-us" class="button">
                            Wanna Stand Out?
                        </a>
                    </div>
                </div>
                <div class="banner-image col-md-12 col-lg-6">
                    <img src="{{ asset('/assets/images/banner.png') }}" alt="Web design in Nepal">
                </div>
            </div>
        </div>
    </section>


    <section id="review" class="col-sm-12 col-lg-11" data-aos="fade-up">
        <div class="review  mb-5 col-lg-6 col-md-8">

            <!-- Swiper -->
            <div class="swiper-container mySwiper">
                <h5 class="swiper-title">
                    Reviews
                </h5>
                <div class="swiper-buttons">
                    <div class="swiper-button-next swiper-btn hover"></div>
                    <div class="swiper-button-prev swiper-btn hover"></div>
                </div>
                <div class="swiper-wrapper col-12 p-0 m-0">

                    <div class="swiper-slide">
                        <div class="s-body">
                            <div class="s-info">
                                <div class="s-content row col-12 p-0 m-0">
                                    <div class="s-image col-3">
                                        <img src="{{ asset('/assets/images/review/3.jpg') }}"
                                            alt="Smriti Shreshtha's Review for Outofbox Design">
                                    </div>
                                    <div class="s-info col-9">
                                        <p>
                                            Thanks for Creating a wonderful digital platform for our business. Services are
                                            quick and great making a huge impact on our Business. They know what they are
                                            doing. Looking forward to continue working.
                                        </p>
                                        <div class="s-name">
                                            <span>Dr Smriti Shreshtha</span>
                                            <i class="fas fa-circle"></i>
                                            <label>Anova Skin Clinic</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="s-body">
                            <div class="s-info">
                                <div class="s-content row col-12 p-0 m-0">
                                    <div class="s-image col-3">
                                        <img src="{{ asset('/assets/images/review/1.jpg') }}"
                                            alt="Komal Sharma's Review for Outofbox Design">
                                    </div>
                                    <div class="s-info col-9 p-0">
                                        <p>
                                            Professional Workflows, repetitive follow-up, and Customers Satisfaction
                                            explains what Out of the Box design is all about. This company is really making
                                            a level up in this Domain. Good Luck and Grateful.
                                        </p>
                                        <div class="s-name">
                                            <span>Komal Sharma</span>
                                            <i class="fas fa-circle"></i>
                                            <label>Leader</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="s-body">
                            <div class="s-info">
                                <div class="s-content row col-12 p-0 m-0">
                                    <div class="s-image col-3">
                                        <img src="{{ asset('/assets/images/review/4.jpg') }}"
                                            alt="Mj Mansuri's Review for Outofbox Design">
                                    </div>
                                    <div class="s-info col-9">
                                        <p>
                                            Ring them 3 A.M at night, they respond. Have worked with them on some of our
                                            projects. Their work reflects professionalism and proficiency. Had a great
                                            experience working with them. Thanks, team.
                                        </p>
                                        <div class="s-name">
                                            <span>Mj Mansuri</span>
                                            <i class="fas fa-circle"></i>
                                            <label>The Fern Residency</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="s-body">
                            <div class="s-info">
                                <div class="s-content row col-12 p-0 m-0">
                                    <div class="s-image col-3">
                                        <img src="{{ asset('/assets/images/review/2.jpg') }}"
                                            alt="Krishna Keshav's Review for Outofbox Design">
                                    </div>
                                    <div class="s-info col-9">
                                        <p>
                                            Had a great time working with the Out of Box Design team. Grateful for your
                                            inputs in Thoplo. Ethical Working style with amazing deliverance in time. Adding
                                            those extras attributes was really something.
                                        </p>
                                        <div class="s-name">
                                            <span>Krishna Keshav</span>
                                            <i class="fas fa-circle"></i>
                                            <label>Thoplo Machines</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



    <section id="services" class="bg-color">

        <div class="services col-lg-10 col-md-11 m-auto">
            <div class="services-wrapper row justify-content-between col-12 p-0 m-0 m-auto">

                <div class="service-title col-lg-6 col-md-12" data-aos="fade-up">
                    <h4 class="color font-weight-bold text-center mb-4 borders pb-4">Who We Are ?</h4>
                    <h4 class="color text-center">
                        We acknowledge that you’re in need of a platform that best addresses your queries, understands your
                        needs and crafts those into reality, while delivering a real time result. Equipped with a team of
                        highly skilled and professional web developers, we help you build a foundation where your vision can
                        stand strong and turn them into a reality. With creative designs that reflect your brand persona,
                        delivering a website that steals the spotlight and retains your consumer is all what we strive for.
                    </h4>
                </div>

                <div class="service-list row col-lg-6 col-md-12" data-aos="fade-up">


                    <h4 class="color borders col-12 text-center pb-4 mb-5 font-weight-bold">
                        Our Expertise
                    </h4>

                    <div class="service-item col-md-6">
                        <h6 class="si-title color borders">Wordpress Web design</h6>
                        <div class="si-info">

                            <p class="sii-desc color">
                                Build your WordPress Website with the design aesthetics you want. Snappy and Fast!!
                            </p>
                        </div>
                    </div>

                    <div class="service-item col-md-6">
                        <h6 class="si-title color borders">Ecommerce Web Design</h6>
                        <div class="si-info">

                            <p class="sii-desc color">
                                We create the Right Ecommerce Web Design that assures your sales with the best UI and UX.
                            </p>
                        </div>
                    </div>

                    <div class="service-item col-md-6">
                        <h6 class="si-title color borders">Custom Web Design</h6>
                        <div class="si-info">

                            <p class="sii-desc color">
                                Trouble fitting in? Our expertise for Custom Web Design, exactly what your idea needs.
                            </p>
                        </div>
                    </div>

                    <div class="service-item col-md-6">
                        <h6 class="si-title color borders">Software Development</h6>
                        <div class="si-info">

                            <p class="sii-desc color">
                                Fully Automated and Business-Centric Software Development that fits your requirement.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section id="portfolio">
        <div class="portfolio">
            <div class="portfolio-wrapper">
                <div class="portfolio-list row col-12 p-0 m-0">

                    @foreach ($portfolio as $item)
                        <div class="portfolio-item">
                            @if ($item->video !== null)
                                <div class="play-button" onclick="openVideo({{ $item }})">
                                    <i class="fas fa-play"></i>
                                    <div class="pb-bg"></div>
                                </div>
                            @endif
                            <a href="javascript:void(0);" onclick="openPortfolio({{ $item }})">
                                <div class="portfolio-image">
                                    <img src="{{ asset('/storage/' . $item->image) }}"
                                        alt="{{ $item->name }} website design portfolio">
                                </div>
                                <div class="portfolio-title">
                                    <h3>{{ $item->name }}</h3>
                                    <p>{{ $item->category }}</p>
                                </div>

                                <div class="p-view">
                                    <i class="fas fa-expand"></i>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="see-more">
                <a href="/portfolio" class="color"> View All portfolio <i class="fa fa-arrow-right color"></i></a>
            </div>
        </div>
    </section>

    <section>
        <div class="portfolio-modal">
            <div class="pm-wrapper row p-0 m-0 col-12">
                <i class="fa fa-close" onclick="closePortfolio()"></i>

                <div class="pm-image col-lg-5 p-0">
                    <img id="p-image" src="" alt="{{ $item->name }} website design portfolio">
                </div>

                <div class="pm-desc col-lg-6 pr-5">

                    <div class="pm-date">
                        {{-- <span id="p-name">Identity, Mocup</span> --}}
                        <i class="fas fa-circle"></i>
                        <span id="p-date">June 3, 2019</span>
                    </div>
                    <h4 class="pm-title" id="p-name">
                    </h4>
                    <p class="pm-info" id="p-description">
                    </p>
                    <div class="pm-list row">
                        <div class="pm-item col-md-4 col-sm-4">
                            <h4>Technology</h4>
                            <p id="p-technology"></p>
                        </div>
                        <div class="pm-item col-sm-4">
                            <h4>Category</h4>
                            <p id="p-category"></p>
                        </div>
                        <div class="pm-item col-sm-4">
                            <h4>Client</h4>
                            <p id="p-client"></p>
                        </div>
                    </div>
                    <div class="view-project">
                        <a herf="" id="p-link" target="_blank">
                            View Project <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section>
        <div class="video-modal">
            <div class="vm-wrapper p-0 m-0 col-12">
                <i class="fa fa-close" onclick="closeVideo();"></i>

                <div id="v-video" class="vm-image col-lg-8 p-0">

                </div>

            </div>
        </div>
    </section>


    <section id="steps" class="mb-5">
        <div class="steps col-lg-11 col-md-11 col-11 m-auto">
            <div class="s-title mb-5">
                <h2 class="border-bottom color p-3">ALL OUR DESIGNS ARE</h2>
            </div>
            <div class="steps-wapper row">

                <div class="steps-item col-md-4 col-sm-12" data-aos="fade-up">
                    {{-- <h5 class="shead color"></h5> --}}
                    <h4 class="stitle color">
                        Responsive
                    </h4>
                    <p class="sdesc color">
                        The best design always fits in any device. We make sure that your website loads as smooth as a knife
                        on butter on any platform. We share the same vision towards perfection like you.
                    </p>
                    <div class="siamge">
                        <img class="col-12 p-0" src="{{ asset('/assets/images/responsive.png') }}"
                            alt="responsive website design">
                    </div>
                </div>

                <div class="steps-item col-md-4 col-sm-12" data-aos="fade-up">
                    {{-- <h5 class="shead color"></h5> --}}
                    <h4 class="stitle color">
                        SEO Optimized
                    </h4>
                    <p class="sdesc color">
                        We work together with a team of SEO experts and handcraft the SEO on your Website. Why revamp later
                        and Stay behind the Game. Our actions are SEO centric from the start for your better ranking.
                    </p>
                    <div class="siamge">
                        <img class="col-12 p-0" src="{{ asset('/assets/images/seo-optimized.png') }}"
                            alt="seo optimize website design">
                    </div>
                </div>

                <div class="steps-item col-md-4 col-sm-12" data-aos="fade-up">
                    {{-- <h5 class="shead color"></h5> --}}
                    <h4 class="stitle color">
                        Conversion-oriented
                    </h4>
                    <p class="sdesc color">
                        Every business needs Conversion and we make sure you generate it in the right way. We design Result
                        oriented Buyer Journey on your website, helping your prospects to take tangible actions.
                    </p>
                    <div class="simage">
                        <img class="col-12 p-0" src="{{ asset('/assets/images/Conversion-oriented.png') }}"
                            alt="conversion oriented website design">
                    </div>
                </div>

            </div>
        </div>
    </section>


    @isset($faq)
        @include('frontend_pages.components.faq')
    @endisset


    <div class="seo-tags primary-bg pt-4 pb-4">
        <div class="seo-wrapper row col-xl-10 col-11 m-auto">
            <div class="col-md-6">
                <h2 class="text-light text-center mb-0" style="font-size:20px">
                    Web Design Company Nepal
                </h2>
            </div>
            <div class="col-md-6">
                <h3 class="text-light text-center mb-0" style="font-size:20px">
                    Web Design in Nepal
                </h3>
            </div>
        </div>
    </div>




    <section id="contact">
        <div class="contact col-md-11 col-sm-11 col-12 m-auto">
            <div class="contact-wrapper ">
                <div class="contact-items row col-12 mb-3">
                    <div class="c-item">
                        {{-- <h6>COLLOBORATION</h6> --}}
                        <h4>
                            Got an idea? Let's Talk
                        </h4>
                    </div>
                    <div class="c-item">
                        <a href="/contact-us" class="button">Contact Us <i class="fa fa-arrow-right text-light"></i></a>
                    </div>
                </div>
                <div class="contact-info">
                    <p class="mb-0 col-lg-6 col-md-8 col-sm-10 pl-0">
                        We create eye-catchy designs that capture your visitor's attention, and help you generate higher
                        interaction & sales.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Outofbox Design",
            "url": "http://outofboxdesign.com/",
            "logo": "http://outofboxdesign.com/storage/logo/GdNvE3j9saZRvwWQp6VGUgtie6gQjg4QP7LJMJJs.png",
            "sameAs": [
                "https://www.facebook.com/outofboxdesign",
                "https://www.linkedin.com/company/outofbox-design/"
            ]
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "Outofbox Design",
            "image": "http://outofboxdesign.com/storage/logo/GdNvE3j9saZRvwWQp6VGUgtie6gQjg4QP7LJMJJs.png",
            "@id": "",
            "url": "http://outofboxdesign.com/",
            "telephone": "9863992047",
            "priceRange": "$$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Mahadevsthan, Koteshwor",
                "addressLocality": "Kathmandu",
                "postalCode": "44600",
                "addressCountry": "NP"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Sunday"
                ],
                "opens": "09:00",
                "closes": "17:00"
            },
            "sameAs": [
                "https://www.facebook.com/outofboxdesign",
                "https://www.linkedin.com/company/outofbox-design/"
            ]
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [{
                "@type": "Question",
                "name": "What is web design and development?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Web Design and development is the process of creating a website to represent your business. Web design is mainly focused on the website interface and Experience, whereas web development is the actual production of the website."
                }
            }, {
                "@type": "Question",
                "name": "How much does it cost to build a website in Nepal?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Website design and development Cost in Nepal generally depends upon the type of website and technology used to build that website. If you want to build a secure, proper SEO-optimized website it would take an ample amount of time and cost."
                }
            }, {
                "@type": "Question",
                "name": "Which is the best website design and development company in Nepal?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Good Website Design and development companies are hard to find. Project Cost, development team, and time are the KPIs to consider.  As a leading & well-recognized company, Outofbox Design is committed to delivering clean and appealing Web Design and Development in Nepal at an affordable price."
                }
            }]
        }
    </script>


    <script type="application/javascript">
        function openPortfolio(elem) {

            var date = moment(elem.created_at).format("MMM Do YY");
            $('.portfolio-modal').css('display', 'block');
            $('#p-name').html(elem.name);
            $('#p-date').html(date);
            $('#p-image').attr('src', '/storage/' + elem.image);
            $('#p-description').html(elem.description);
            $('#p-technology').html(elem.technology);
            $('#p-category').html(elem.category);
            $('#p-client').html(elem.client);
            $('#p-link').attr('href', elem.link);
        }

        function closePortfolio() {
            $('.portfolio-modal').css('display', 'none');
        }

        function openVideo(elem) {
            $('.video-modal').css('display', 'block');
            $('#v-video').html(elem.video);
        }

        function closeVideo() {
            $('.video-modal').css('display', 'none');
            $('#v-video').html('');
        }
    </script>


    <!-- Initialize Swiper -->
    <script type="application/javascript">
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script type="application/javascript">
        var TxtRotate = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtRotate.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 300 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('txt-rotate');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-rotate');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtRotate(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
            document.body.appendChild(css);
        };
    </script>

    <script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js">
    </script>

@endsection
