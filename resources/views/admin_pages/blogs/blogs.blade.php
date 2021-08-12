@extends('layouts.admin_layouts.app')

@section('content')

    @include('layouts.admin_layouts.session')

    <div class="container-fluid">

        {{-- header nav --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/')}}">Home</a></li>
                
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </nav>


        <hr>

        {{-- blog listing --}}
        <blog></blog>

        <div class="mt-5">
            <blog-category></blog-category>
        </div>




    




    </div>

   

   





    
    
@endsection