@extends('layouts.frontend_layouts.app')

@push('metatag')
    <title>Website Design Portfolio & Work Samples | Outofbox Design</title>
    <meta name="description"
        content="Check out our Portfolio & Work Samples of website Design, Logo design, Landing page design & more. 3 years in the industry and 100+ Projects delivered." />
    <meta name="keywords" content="" />
    <meta name="distribution" content="" />
    <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />

    <meta property="og:url" content="http://outofboxdesign.com/portfolio" />
    <meta property="og:title" content="OutOfBoxDesign" />
    <meta property="og:description" content="" />
    <meta property="og:image" content=""" />
@endpush

@push('styles')
                            <link rel=" stylesheet" href="{{ asset('/css/portfolio.css') }}">
@endpush
@push('script')
@endpush

@section('content')

    <div class="gap"></div>

    <section id="contact-head" class="borders">
        <div class="blog-header-title">
            <h1 class="color">Portfolio</h1>
            <p class="color">
                Leave us a little info, and we’ll be in touch.
            </p>


            <div class="links">
                <a href="/" class="color">Home</a> <i class="fa fa-angle-right color"></i> <span
                    class="color">Portfolio</span>
            </div>

        </div>
    </section>

    <section id="portfolio">
        <div class="portfolio-body">
            <portfolio></portfolio>
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

@endsection
