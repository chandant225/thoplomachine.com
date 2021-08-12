@extends('frontend.layouts.app')
@section('content')

<div class="page-title-area">
    <div class="d-table">
       <div class="d-table-cell">
          <div class="container">
             <h2>{{ $service->title }}</h2>
          </div>
       </div>
    </div>
    <div class="shape1"><img src="{{ asset('frontend/images/shape1.png') }}" alt="shape"></div>
    <div class="shape2 rotateme"><img src="{{ asset('frontend/fonts/shape2.svg') }}" alt="shape"></div>
    <div class="shape3"><img src="{{ asset('frontend/fonts/shape3.svg') }}" alt="shape"></div>
    <div class="shape4"><img src="{{ asset('frontend/fonts/shape4.svg') }}" alt="shape"></div>
    <div class="shape5"><img src="{{ asset('frontend/images/shape5.png') }}" alt="shape"></div>
    <div class="shape6 rotateme"><img src="{{ asset('frontend/fonts/shape4.svg') }}" alt="shape"></div>
    <div class="shape7"><img src="{{ asset('frontend/fonts/shape4.svg') }}" alt="shape"></div>
    <div class="shape8 rotateme"><img src="{{ asset('frontend/fonts/shape2.svg') }}" alt="shape"></div>
 </div>
 <div class="services-details-area ptb-80">
    <div class="container">
                <h3>{{ $service->title }}</h3>
                {!! $service->description !!}

       <div class="separate"></div>
    </div>

    <div class="solutions-area ptb-80">
        <div class="container">
           <div class="row justify-content-center">
               @if(count($recent) > 0)
               <h2>Others Services</h2>
               @foreach ($recent as $item)
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-solutions-box">
                        <div class="icon"><img src="{{ URL::asset('storage/') }}/{{ $item->image }}" alt="{{ $item->title }}"></div>
                        <h3><a href="{{ url('/service/') }}/{{ $item->slug }}">{{ $item->title }}</a></h3>
                        <p>{{ $item->service_intro }}</p>
                        <a class="learn-more-btn" href="{{ url('/service/') }}/{{ $item->slug }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="16"/>
                            <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                            Learn More
                        </a>
                    </div>
                </div>
               @endforeach
               @endif
           </div>
        </div>


 </div>
@endsection
