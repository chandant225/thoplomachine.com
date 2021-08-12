 @extends('layouts.frontend_layouts.app')
{{-- metatags --}}
@push('metatag')
    <title>{{$blog->meta_title}}</title>
    <meta name="description" content="{{$blog->meta_description}}" />
    <meta name="keywords" content="{{$blog->meta_tags}}" />
    <meta name="distribution" content="{{$blog->meta_title}}" />
    <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />

    <meta property="og:title" content="{{$blog->title}}">
    <meta property="og:description" content="{{$blog->description}}">
    <meta property="og:image" content="{{asset('/storage/'.$blog->image)}}">
   
@endpush
{{-- styles --}}
@push('styles')
  <link rel="stylesheet" href="{{asset('/css/blog-detail.css')}}">   
<link rel="stylesheet" href="{{asset('/assets/vendors/swiper/css/swiper.min.css')}}">  

@endpush
{{-- script --}}
@push('script')
 <script src="{{ asset('js/share.js') }}"></script>
 <script src="{{asset('/assets/vendors/swiper/js/swiper.min.js')}}"></script>

@endpush

@section('content')

 <div class="gap"></div>
   
    <div class="blog-container col-md-10 col-sm-11 col-12 m-auto">
        <section id="blog-head" class="col-lg-8 col-md-11 col-sm-11 pl-0">
            <div class="blog-header-title">            
                <p class="b-cat">
                    <strong class="color text-capitalize">{{$blog->category}}</strong> <i class="fa fa-circle"></i> <span class="color">4 min read</span>
                </p>
                <h1 class="b-title color">
                    {{$blog->title}}
                </h1>  
                <div class="b-info row col-12 mr-0 pr-0 justify-content-between">
                    <div class="bi-info">
                        <ul class="row">
                            <li class="bii-item color">
                                <i class="fa fa-user color"></i> {{$blog->written_by}}
                            </li>
                            <li class="bii-item color text-lowercase">
                                <i class="fa fa-calendar color "></i> 
                                   {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                            </li>
                        </ul>
                    </div>

                    <div class="bi-share">
                        {!!Share::currentPage()
                        ->facebook()
                            ->twitter()
                            ->linkedin()
                            ->whatsapp()!!}
                    </div>
                </div>         
            </div>
        </section>


        <section id="blog-body" class="col-lg-9 col-md-11 col-sm-11 p-0">
            <div class="blog-body color" >

                {!! $blog->description !!}
                
            </div>
        </section>


        <section id="review" class="col-12">
            <div class="review  mb-5 col-lg-4 col-md-12 col-12" >

                <!-- Swiper -->
                <div class="swiper-container mySwiper col-12">
                    <h5 class="swiper-title" >
                        Next Post
                    </h5>
                    <div class="swiper-buttons">
                        <div class="swiper-button-next swiper-btn hover"></div>
                        <div class="swiper-button-prev swiper-btn hover"></div>
                    </div>
                    <div class="swiper-wrapper col-12 p-0 m-0">
                        @foreach($next as $item)
                            <div class="swiper-slide">
                                <div class="s-body">
                                    <div class="s-info">
                                        <p >
                                            {{$item->title}}
                                        </p>                                
                                    </div>
                                </div>
                            </div>
                        @endforeach                    
                    </div>                           
                </div>        
        
            </div>
        </section>

        <section id="recent-post" class="col-lg-11 col-md-11 col-sm-11 p-0">

            <div class="rp-title mb-5">
                <h4 class="font-weight-bold color">Recent Post</h4>
            </div>
            
            <div class="blog-list row col-12 p-0 m-0">

               @if ($related->count() > 0)
                    @foreach ($related as $item) 
                            <div class="blog-item col-lg-4 col-md-6">
                                <a href="{{'/blog/'.$blog->slug}}" class="b-content">
                                    <div class="b-image">
                                        <img src="https://colabrio.ams3.cdn.digitaloceanspaces.com/ohio.clbthemes.com/clb_blog_3-882x1024.jpg" alt="">
                                    </div>
                                    <p class="b-cat">
                                        <strong class="color text-capitalize">{{$item->category}}</strong> <i class="fa fa-circle"></i> <span class="color">4 min read</span>
                                    </p>
                                    <h4 class="b-title color">
                                        {{$item->title}}
                                    </h4>
                                    <p class="description color">
                                        {!! Str::words($item->meta_description, 10) !!}
                                    </p>
                                    <div class="read-more color">
                                        Read more <i class="fa fa-arrow-right color"></i>
                                    </div>
                                </div>
                            </a>
                    @endforeach     
                   
               @endif           



            </div>
        </section>


    </div>



    <!-- Initialize Swiper -->
  <script type="application/javascript">
    var swiper = new Swiper(".mySwiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    $('table').addClass('table')

  </script>


@endsection