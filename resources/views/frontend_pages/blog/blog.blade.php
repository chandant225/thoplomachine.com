 @extends('layouts.frontend_layouts.app')

 @push('metatag')
     <title>Outofbox Design | Blog</title>
     <meta name="publisher" content="Outofboxdesign (outofboxdesign.com)" />
 @endpush

 @push('styles')
     <link rel="stylesheet" href="{{ asset('/css/blog.css') }}">
 @endpush
 @push('script')
 @endpush

 @section('content')

     <div class="gap"></div>

     <section id="blog-head" class="">
         <div class="blog-header-title">
             <h1 class="color">Blog</h1>
             <p class="color">
                 Share your stories and news with everyone.
             </p>
             {{-- <div class="c-btn">
                    <a  href="#contact-form" class="button">
                        Send Us an Email    
                    </a> 
                </div> --}}

             <div class="links">
                 <a href="/" class="color">Home</a> <i class="fa fa-angle-right color"></i> <span class="color">Blog</span>
             </div>
         </div>
     </section>

     <div class="blog-body col-md-11 row">

         <div class="blog-categories col-lg-2 col-md-2 col-sm-12">
             <div class="bc-wrapper">
                 <h5 class="bc-title color">
                     Categories
                 </h5>
                 <ul class="bc-list">
                     @foreach ($category as $cat)
                         <li class="color text-capitalize">
                             <a href="{{ '/category/' . $cat->category }}" class="color">
                                 {{ $cat->category }}
                             </a>
                         </li>
                     @endforeach
                 </ul>
             </div>
         </div>

         <section class="blog-contents col-lg-10 col-md-10 col-sm-12">
             <div class="blog-list row col-12  p-0 m-0">
                 @foreach ($blogs as $blog)
                     <div class="blog-item col-lg-6 col-md-6 p-0">
                         <a href="{{ '/blog/' . $blog->slug }}" class="b-content">
                             <div class="b-image">
                                 <img src="{{ asset('/storage/' . $blog->image) }}" alt="">
                             </div>
                             <p class="b-cat">
                                 <strong class="color text-capitalize">{{ $blog->category }}</strong> <i
                                     class="fa fa-circle"></i> <span class="color">4 min read</span>
                             </p>
                             <h4 class="b-title color">
                                 {{ $blog->title }}
                             </h4>
                             <p class="description color">
                                 {!! Str::words($blog->meta_description, 10) !!}
                             </p>
                             <div class="read-more color">
                                 Read more <i class="fa fa-arrow-right color"></i>
                             </div>
                         </a>
                     </div>
                 @endforeach
             </div>
             <section>
                 {{ $blogs->links('custom.paginate') }}
             </section>
         </section>





     </div>


     @isset($faq)
         @include('frontend_pages.components.faq')
     @endisset


 @endsection
