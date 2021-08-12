@extends('frontend.layouts.app')
@section('content')


         <div class="page-title-area">
            <div class="d-table">
               <div class="d-table-cell">
                  <div class="container">
                     <h2>Privacy Policy</h2>
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
         <div class="team-area pt-80 pb-50 bg-f9f6f6">
            <div class="container">
                @if($privacy)
                    {!! $privacy->description !!}
                @else
                    no data
                @endif
            </div>
         </div>
@endsection
