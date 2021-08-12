@extends('layouts.admin_layouts.app')

@section('content')

    @include('layouts.admin_layouts.session')

    <div class="container-fluid">

        {{-- header nav --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>

       <div class="title">
           <h3>Contact Messages</h3>
       </div>

        <hr>


        {{-- slider listing --}}
        <section>

            <contacts></contacts>

        </section>

        <hr>

        <section>
            {{-- slider section --}}
            <div class="row">
                <div class="p-3">
                    <h3 class="display-6">Map</h3>
                </div>
               @if ($map->count() == 0)
                     <div class="p-3">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#LogoModal">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>  
                @else  
                    <div class="p-3">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#LogoEditModal">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>                
               @endif            
            </div>

            @if ($map->count() !== 0)
                <div class="logo mb-3">
                    {!!$map[0]->name !!}
                </div>                
            @endif

        </section>



        {{-- logo add modal --}}     
    <div class="modal fade" id="LogoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <form action="{{url('/admin/map')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Map</label>
                            <textarea class="form-control" name="map"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>

    {{-- logo add modal --}}     
    <div class="modal fade" id="LogoEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <form action="{{url('/admin/map/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label>Map</label>
                            <textarea class="form-control" name="map" rows="3"></textarea>
                        </div>
                        @if ($map->count() !== 0)
                        <input type="text" name="id" value="{{$map[0]->id}}" hidden>   
                        @endif
                            
                       

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>



    </div>

   

   


    


   


    
    
@endsection