@extends('layouts.frontend_layouts.app')

@push('metatag')
    <title>Outofbox Design | Thank you</title>
    <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />
    <!-- Event snippet for Outofbox Design Lead Form (Aug 2021) conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-718627976/gObtCNKX9eECEIjJ1dYC'
        });
    </script>
@endpush

@push('styles')
    <link rel=" stylesheet" href="{{ asset('/css/portfolio.css') }}">
@endpush
@push('script')
    <style>
        .social {
            margin-top: 30px;
        }

        .social a i {
            font-size: 30px;
            padding: 10px;
        }

        .fa-check {
            color: green;
            padding: 10px;
            border: 2px solid green;
            border-radius: 50%;
        }

    </style>
@endpush

@section('content')

    <div class="gap"></div>

    <section id="contact-head" class="borders">
        <div class="blog-header-title">
            <h1 class="color">Thank you for contacting us. <i class="fa fa-check"></i></h1>
            <p class="p-color">
                We will get back to you with your solutions within 24 hours.
            </p>

            <hr style="width:90%">

            <div class="links col-xl-5 col-md-8 col-12 p-0 color font-weight-bold">
                While you are waiting for us to roll in with answers, check out
                our interesting Blog articles or visit our facebook page.
            </div>



            <div class="social">
                <a href="https://www.facebook.com/outofboxdesign">
                    <i class="fab fa-facebook color"></i>
                </a>
                <a href="/blog">
                    <i class="fas fa-blog color"></i>
                </a>

            </div>

        </div>
    </section>






@endsection
