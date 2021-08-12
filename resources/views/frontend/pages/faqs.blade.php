@extends('frontend.layouts.app')
@section('content')


<div class="page-title-area">
    <div class="d-table">
       <div class="d-table-cell">
          <div class="container">
             <h2>FAQ</h2>
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
 <div class="faq-area ptb-80">
    <div class="container">
        <div class="accordion" id="accordionExample">
            @if(count($faqs) > 0)
                @foreach ($faqs as $key=>$item)
                    <div class="card">
                    <div class="card-header cursor" id="heading{{ $item->id }}" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                        <div class="row">
                            <div class="col-11">
                                {{ $item->question }}
                            </div>
                            <div class="col-1">
                                {{-- @if($item->id)
                                <i class="fas fa-chevron-down"></i>
                                @else

                                <i class="fas fa-chevron-right"></i>
                                @endif --}}
                            </div>
                        </div>
                        <b>   </b>
                    </div>

                    <div id="collapse{{ $item->id }}" class="collapse {{ $key == 0 ? 'show' : ''}}" aria-labelledby="heading{{ $item->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                           {!! $item->description !!}
                        </div>
                    </div>
                    </div>

                @endforeach
            @else
                No Data To Show
            @endif
          </div>


       <div class="faq-contact">
          <h3>Ask Your Question</h3>
          @if ($message = Session::get('success'))
          <div class="col-lg-12 mt-2">
              <div class="alert alert-success alert-block text-center">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
              </div>
          </div>
      @endif

      @if ($message = Session::get('error'))
          <div class="col-lg-12 mt-2">
              <div class="alert alert-danger alert-block text-center">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
              </div>
          </div>
      @endif
          <div class="row align-items-center">
            <div class="col-md-12">

               <form id="contactForm" action="{{ url('save-contact') }}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                           <input type="text" name="name" placeholder="Your Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                           @error('name')

                          <div class="invalid-feedback" style="display:block">
                              {{ $message }}
                          </div>
                          @enderror

                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                           <input type="text" name="email" placeholder="Your email address" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                           @error('email')

                           <div class="invalid-feedback" style="display:block">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                           <input type="text" name="phone" placeholder="Your phone number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                           @error('phone')

                           <div class="invalid-feedback" style="display:block">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                           <input type="text" name="subject" placeholder="Your Subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}">

                           @error('subject')

                           <div class="invalid-feedback" style="display:block">
                               {{ $message }}
                           </div>
                           @enderror

                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                           <textarea name="message" cols="30" rows="5" placeholder="Write your message..." class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                           @error('message')

                           <div class="invalid-feedback" style="display:block">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-12 col-sm-12"><button type="submit" class="btn btn-primary">Send Message</button></div>
                  </div>
               </form>
            </div>
         </div>
       </div>
    </div>
 </div>
@section('styles')
<style>
    .cursor {
        cursor: pointer;
    }
</style>
@endsection

@endsection
