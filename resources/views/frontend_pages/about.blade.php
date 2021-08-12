 @extends('layouts.frontend_layouts.app')

 @prepend('metatag')
     <title>Hire Amazing Web developers in Nepal | Outofbox Design</title>
     <meta name="description"
         content="Want to Stand out and build your website out of the box? We are a team of amazing web developers in Nepal, equipped with the best skill & experience. Contact us" />
     <meta name="keywords" content="" />
     <meta name="distribution" content="" />
     <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />

     <meta property="og:url" content="http://outofboxdesign.com/about" />
     <meta property="og:title" content="OutOfBoxDesign" />
     <meta property="og:description" content="" />
     <meta property="og:image" content=""" />
@endprepend

 @push('styles')
                                <link rel=" stylesheet" href="{{ asset('/css/about.css') }}">
 @endpush
 @push('script')
 @endpush

 @section('content')

     <div class="gap"></div>

     <section id="about-head" class="borders">
         <div class="blog-header-title">
             <p class="color text-secondary">
                 Who We Are
             </p>
             <h1 class="color pl-0 mb-5 col-lg-6 col-md-8 col-sm-12 col-12">
                 We Are Creative Website Design Agency
             </h1>

             <div class="links">
                 <a href="/" class="color">Home</a> <i class="fa fa-angle-right color"></i> <span class="color">About</span>
             </div>
         </div>
     </section>

     <section id="about-content">
         <div class="about-content">
             <div class="about-description">
                 <div class="row">
                     <div class="about-title col-lg-6 col-md-7">
                         <h1 class="color">Who We Are ?</h1>
                         <p>About</p>
                     </div>
                     <div class="about-detail col-lg-6 col-md-5">
                         <p class="color">
                             As a creative website design agency, Outofbox Design is expert at designing custom,responsive
                             and mobile friendly websites that drive more conversions. Whether it is for B2B or B2C
                             business, We can help you design high converting websites & landing pages. We can also help you
                             in developing an effective brand identity and strategy. We create eye-catchy designs that
                             capture your visitor's attention, and help you generate higher interaction & sales. We truly
                             understand the importance of SEO for your business and thus focus on developing a search engine
                             optimized website.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section id="our-mission" class="bg-color">

         <div class="om-wrapper row">
             <div class="our-mission col-lg-6 col-md-12" data-aos="fade-up">
                 <div class="om-title borders">
                     <h1 class="color">Our Mission</h1>
                     <p class="color">
                         Turn your vision into reality
                     </p>
                 </div>
                 <div class="om-description">
                     <p class="color">
                         Our mission is to build top notch websites & applications, in the most creative way, helping people
                         setting up their business online and increase their revenue with the latest web technology.
                     </p>
                 </div>
             </div>
             <div class="our-mission  col-lg-6 col-md-12" data-aos="fade-up">
                 <div class="om-title borders">
                     <h1 class="color">Our Vision</h1>
                     <p class="color">
                         It's not what you do but how you do it
                     </p>
                 </div>
                 <div class="om-description">
                     <p class="color">
                         To inspire the new generation designer to think out of the box and become more creative.
                         "It's not what you do but how you do it" - John Wooden
                     </p>
                 </div>
             </div>
         </div>

     </section>

     <section id="our-teams">
         <div class="our-teams">
             <div class="ot-title">
                 <h1 class="color">Our Team</h1>
             </div>
             <div class="our-teams-wrapper row">

                 @foreach ($teams as $item)
                     <div class="ot-item col-lg-3 col-md-4 col-sm-12">
                         <div class="ot-content">
                             <div class="ot-image">
                                 <img src="{{ asset('/storage/' . $item->image) }}" alt="">
                                 <div class="social-icons">
                                     @if ($item->facebook !== null)
                                         <span>
                                             <a href="{{ $item->facebook }}" target="_blank">
                                                 <i class="fab fa-facebook-f"></i>
                                             </a>
                                         </span>
                                     @endif
                                     @if ($item->twitter !== null)
                                         <span>
                                             <a href="{{ $item->twitter }}" target="_blank">
                                                 <i class="fab fa-twitter"></i>
                                             </a>
                                         </span>
                                     @endif
                                     @if ($item->linkedin !== null)
                                         <span>
                                             <a href="{{ $item->linkedin }}" target="_blank">
                                                 <i class="fab fa-linkedin"></i>
                                             </a>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="ot-name">
                                 <h3 class="color">
                                     {{ $item->name }}
                                 </h3>
                                 <p class="color">
                                     {{ $item->role }}
                                 </p>
                             </div>

                         </div>
                     </div>
                 @endforeach




             </div>
         </div>
     </section>



     @isset($faq)
         @include('frontend_pages.components.faq')
     @endisset


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
                         <a href="/contact" class="button">Contact Us <i class="fa fa-arrow-right text-light"></i></a>
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
             "@type": "LocalBusiness",
             "name": "About Outofbox Design - Web Design Company",
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












 @endsection
