@extends('layouts.admin_layouts.app')

@section('content')

    @include('layouts.admin_layouts.session')

    <div class="container-fluid">

        {{-- header nav --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Infos</li>
                <li class="breadcrumb-item active" aria-current="page">Our Teams</li>
            </ol>
        </nav>


        <hr>

        {{-- blog listing --}}
        <our-teams></our-teams>




    




    </div>

   

   





    
    
@endsection