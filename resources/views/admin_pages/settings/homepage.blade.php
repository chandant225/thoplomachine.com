@extends('layouts.admin_layouts.app')

@section('content')

    @include('layouts.admin_layouts.session')

    <div class="container-fluid">

        {{-- header nav --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
                <li class="breadcrumb-item active" aria-current="page">Logo & Homepage Slider</li>
            </ol>
        </nav>

        <section>
            {{-- slider section --}}
            <div class="row">
                <div class="p-3">
                    <h3 class="display-6">Logo</h3>
                </div>
               @if ($logo->count() == 0)
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

            @if ($logo->count() !== 0)
                <div class="logo mb-3">
                    <img class="col-md-2 col-sm-4 shadow  rounded"  src="{{asset('/storage/'.$logo[0]->name)}}" alt="">
                </div>                
            @endif

        </section>

        <hr>

        <section>
            {{-- slider section --}}
            <div class="row">
                <div class="p-3">
                    <h3 class="display-6">Homepage Slider</h3>
                </div>
               @if ($sliders->count() < 5)
                     <div class="p-3">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#SliderModal">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>                   
               @endif            
            </div>
        </section>

        {{-- slider listing --}}
        <section>

            <table id="slider-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $key =>  $item)
                        <tr>
                            <td>{{1+$key++}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                <img style="width: 60px" src="{{asset('storage/'.$item->image)}}" alt="">
                            </td>
                            <td>{{$item->description}} </td>
                            <td>{{$item->link}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="edit({{$item}})">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        
                        </tr>
                        
                    @endforeach
                    
                </tbody>
            </table>

        </section>


    </div>

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
                    <form action="{{url('/admin/logo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row col-12">
                            <div class="form-group">
                                <label>Image</label><span class="text-danger">*</span><br>
                                <label>
                                    <input onchange="previewImage('logo-image-file','logo-img-container')" id="logo-image-file" class="d-none"  type="file" name="image[]" multiple accept="image/jpg,image/png,image/jpeg" required>    
                                    <i class="fa fa-upload" style="font-size: 50px"></i>
                                </label>                  
                            </div>
                            <div id="logo-img-container">
                                    {{-- preview images  --}}
                            </div> 
                            <input type="text" name="prev_image" id="prev-image" hidden>   
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
                    <form action="{{url('/admin/logo/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row col-12">
                            <div class="form-group">
                                <label>Image</label><span class="text-danger">*</span><br>
                                <label>
                                    <input onchange="previewImage('logo-edit-image-file','logo-edit-img-container')" id="logo-edit-image-file" class="d-none"  type="file" name="image[]" multiple accept="image/jpg,image/png,image/jpeg" required>    
                                    <i class="fa fa-upload" style="font-size: 50px"></i>
                                </label>                  
                            </div>
                            <div id="logo-edit-img-container">
                                    {{-- preview images  --}}
                            </div> 
                            @if ($logo->count() !== 0)
                            <input type="text" name="id" value="{{$logo[0]->id}}" hidden>   
                            <input type="text" name="prev_image" value="{{$logo[0]->image}}" hidden>   
                            @endif
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


    {{-- slider add modal --}}     
    <div class="modal fade" id="SliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label><span class="text-danger">*</span>
                            <input class="form-control"  type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Get Started Link</label><span class="text-danger">*</span>
                            <input class="form-control"  type="url" name="link" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label><span class="text-danger">*</span>
                            <textarea class="form-control"  rows="5" name="description" required></textarea>
                        </div>
                        <div class="row col-12">
                            <div class="form-group">
                                <label>Image</label><span class="text-danger">*</span><br>
                                <label>
                                    <input onchange="previewImage('image-file','img-container')" id="image-file" class="d-none"  type="file" name="image[]" multiple accept="image/jpg,image/png,image/jpeg" required>    
                                    <i class="fa fa-upload" style="font-size: 50px"></i>
                                </label>                  
                            </div>
                            <div id="img-container">
                                    {{-- preview images  --}}
                            </div> 
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


    {{-- slider edit modal --}}
     
    <div class="modal fade" id="SliderEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form id="edit-slider-form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label><span class="text-danger">*</span>
                            <input class="form-control" id="title" type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Get Started Link</label><span class="text-danger">*</span>
                            <input class="form-control" id="link" type="url" name="link" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label><span class="text-danger">*</span>
                            <textarea class="form-control" id="description" rows="5" name="description" required></textarea>
                        </div>
                        <div class="row col-12">
                            <div class="form-group">
                                <label>Image</label><span class="text-danger">*</span><br>
                                <label>
                                    <input onchange="previewImage('edit-image-file','edit-img-container')" id="edit-image-file" class="d-none"  type="file" name="image[]" multiple accept="image/jpg,image/png,image/jpeg" >    
                                    <i class="fa fa-upload" style="font-size: 50px"></i>
                                </label>                  
                            </div>
                            <div id="edit-img-container">
                                    {{-- preview images  --}}
                            </div> 
                            <input type="text" name="prev_image" id="prev-slider-image" hidden>   
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



    <script type="application/javascript">
        function edit(elem){
            $('#edit-slider-form').attr('action', '/admin/sliders/'+elem.id);
            $('#SliderEditModal').modal();
            $('#title').val(elem.title);
            $('#link').val(elem.link);
            $('#description').val(elem.description);            
            $('#prev-slider-image').val(elem.image);

            var edit_img_container = document.getElementById('edit-img-container');
            while (edit_img_container.firstChild) {
                edit_img_container.removeChild(edit_img_container.firstChild);
            }
            var parse_image = elem.image;
            var parse_new_img = document.createElement('img');
            parse_new_img.src = '/storage/'+parse_image ;
            parse_new_img.style = "padding:5px; width:100px";
            edit_img_container.appendChild(parse_new_img);
        }
    </script>


    <script type="application/javascript">
        // preview image
        function previewImage(image_id, container_id) {
            var  image_file = document.getElementById(image_id).files;
            var img_container = document.getElementById(container_id);
                while (img_container.firstChild) {
                    img_container.removeChild(img_container.firstChild);
                }
            for (let i = 0; i < image_file.length; i++) {
                var image = document.createElement('img');
                image.src = URL.createObjectURL(image_file[i]);
                image.style = "padding:5px; width:100px";
                img_container.appendChild(image);
            }
        }
    </script>



    


    
    
@endsection