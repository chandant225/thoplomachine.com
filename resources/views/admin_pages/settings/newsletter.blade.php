@extends('layouts.admin_layouts.app')

@section('content')

    @include('layouts.admin_layouts.session')

    <div class="container-fluid">

        {{-- header nav --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
            </ol>
        </nav>

       <div class="title">
           <h3>Newsletter</h3>
       </div>

        <hr>


        {{-- slider listing --}}
        <section>

            <news-letter></news-letter>

        </section>

        


    </div>

   

   


    


   


    
    
@endsection