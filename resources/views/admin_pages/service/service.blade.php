@extends('layouts.admin_layouts.app')

@section('content')

    @include('layouts.admin_layouts.session')

    <div class="container-fluid">

        {{-- header nav --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pages</li>
                <li class="breadcrumb-item active" aria-current="page">Service</li>
            </ol>
        </nav>


        <hr>

        {{-- blog listing --}}
        <service></service>
        <br><br>
       
        <service-category></service-category>
        

    </div>

   

   





    
    
@endsection