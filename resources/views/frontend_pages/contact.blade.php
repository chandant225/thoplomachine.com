 @extends('layouts.frontend_layouts.app')

 @prepend('metatag')
     <title>Contact Outofbox Design | Free Web Based Consultation</title>
     <meta name="description"
         content="Get Free Web Based consultation in Nepal. Contact Outofbox Design for the best web design and development consultation. Call (+977-9863992047) NOW!" />
     <meta name="keywords" content="" />
     <meta name="distribution" content="" />
     <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />

     <meta property="og:url" content="http://outofboxdesign.com/contact" />
     <meta property="og:title" content="OutOfBoxDesign" />
     <meta property="og:description" content="" />
     <meta property="og:image" content=""" />
@endprepend

 @push('styles')
                                                                            <link rel=" stylesheet"
         href="{{ asset('/css/contact.css') }}">
 @endpush
 @push('script')
 @endpush

 @section('content')

     <div class="gap"></div>

     <section id="contact-head" class="borders">
         <div class="blog-header-title">
             <h1 class="color">Contact</h1>
             <p class="color">
                 Leave us a little info, and we’ll be in touch.
             </p>
             <div class="c-btn">
                 <a href="#contact-form" class="button">
                     Send Us an Email
                 </a>
             </div>

             <div class="links">
                 <a href="/" class="color">Home</a> <i class="fa fa-angle-right color"></i> <span
                     class="color">Contact</span>
             </div>
         </div>
     </section>

     <div class="contact-body bg-color">
         <section>
             <div class="contact-us-infos row col-11 m-auto">
                 <div class="cf-title col-lg-3 col-md-12">
                     <h2 class="color">Our offices</h2>
                     <p class="color">
                         Schedule your visit with us.
                     </p>
                 </div>
                 <div class="cf-address row col-lg-9 col-md-12">
                     <div class="cu-item col-md-4 col-sm-6 ">
                         <div class="cu-content">
                             <h4 class="color">
                                 Nepal
                             </h4>
                             <p class="color">
                                 <strong class="font-weight-bold color">Outofboxdesign.</strong><br>
                                 <span class="color">Mahadevsthan, Koteshwor, Kathmandu</span>
                             </p>
                             <p class="cu-adder color">
                                 Call us: +977-9802266312
                             </p>
                             <p class="color">
                                 Assistance hours: Sunday – Friday
                             </p>
                             <p class="color">
                                 8 am to 8 pm EST (toll free)
                             </p>
                         </div>
                     </div>



                 </div>
             </div>

         </section>



         <section id="contact-us" class="col-md-11 col-sm-12 m-auto">
             <div class="contact-us row mt-5 mb-5 col-12 p-0 m-0">

                 <div class="contact-infos border-primary-color col-md-12 col-lg-3">
                     <div class="title-description mb-3">
                         <div class="col-12 p-0">
                             <h4 class="font-weight-bold mb-3 color">Work inquiries</h4>
                             <p class="text-secondary color">
                                 Fill in this form or send us an e-mail with your inquiry.
                             </p>
                         </div>
                     </div>
                 </div>

                 <section class="contact-form p-4 col-md-12 col-lg-9" id="contact-form">

                     <div class="row">
                         <div class="form-group col-md-6">
                             <label class="name color">Name(required)</label>
                             <input class="form-field" type="text" id='name' placeholder="Your Name" name="name" required>
                         </div>
                         <div class="form-group col-md-6">
                             <label class="phone color">Phone(required)</label>
                             <input class="form-field" type="number" id="phone" placeholder="Your Phone Number" name="phone"
                                 required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="email color">Email(required)</label>
                         <input class="form-field" type="email" id="email" placeholder="Your Email Address" name="email"
                             required>
                     </div>
                     <div class="form-group">
                         <label class="message color">Message(required)</label>
                         <textarea class="form-field" rows="5" id="message" placeholder="Message" name="message"
                             required></textarea>
                     </div>
                     <button class="button" onclick="sendMessage()">
                         Send Message
                         <i style="display: none;" class="fa fa-spinner text-white fa-spin"></i>
                     </button>

                     <div id="response" class="text-light mt-2">

                     </div>

                 </section>

             </div>

         </section>


         <div class="contact-map col-12 m-0 p-0">
             @if (isset($map))
                 @if ($map->count() !== 0)
                     {!! $map->name !!}
                 @endif
             @endif
         </div>
     </div>


     @isset($faq)
         @include('frontend_pages.components.faq')
     @endisset



     <script type="application/ld+json">
         {
             "@context": "https://schema.org",
             "@type": "LocalBusiness",
             "name": "Outofbox Design - Contact",
             "image": "http://outofboxdesign.com/storage/logo/GdNvE3j9saZRvwWQp6VGUgtie6gQjg4QP7LJMJJs.png",
             "@id": "",
             "url": "http://outofboxdesign.com/contact",
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


     <script type="application/javascript">
         function sendMessage() {
             $('.fa-spinner').css('display', 'inline-block');
             $.ajax({
                 url: '/save-contact',
                 type: 'POST',
                 dataType: 'JSON',
                 data: {
                     _token: "{{ csrf_token() }}",
                     'name': $('#name').val(),
                     'phone': $('#phone').val(),
                     'email': $('#email').val(),
                     'message': $('#message').val(),
                 },
                 success: function(response) {
                     window.location = '/thank-you';
                     $('#name').val(''),
                         $('#phone').val(''),
                         $('#email').val(''),
                         $('#message').val(''),
                         $('#response').html(response.message);
                     $('#response').css('padding', '5px 10px');
                     setTimeout(() => {
                         $('#response').css('padding', '0px');
                         $('#response').html('');
                     }, 4000);
                 }

             })
         }
     </script>





 @endsection
