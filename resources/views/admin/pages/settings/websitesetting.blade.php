@extends('admin.layouts.app')
@section('admin')

@section('styles')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
    .toggle.ios .toggle-handle { border-radius: 20rem; }
  </style>
@endsection

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Home Section</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="# ">Library</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Home Sections</li>
        </ol>
    </nav>
</div>
<hr>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion">
                <div class="card mt-3">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link text-decoration-none" data-toggle="collapse" data-target="#collapseHerosection" aria-expanded="true" aria-controls="collapseOne">
                        Hero Section
                      </button>
                    </h5>
                  </div>

                  <div id="collapseHerosection" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                      <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
                          @csrf


                            <div class="form-group">
                                <label for="sel1">Enable Hero Section?</label>
                              <input type="hidden" name="types[]" value="hero_section">
                                <select class="custom-select" id="sel1" name="hero_section">
                                <option value="1" {{ get_setting('hero_section') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ get_setting('hero_section') == '0' ? 'selected' : '' }}>NO</option>
                                </select>
                            </div>

                          <div class="form-group">
                              <label for="hero_text">Hero Text</label>
                              <input type="hidden" name="types[]" value="hero_text">
                              <textarea class="form-control editor" id="hero_text" name="hero_text"
                                  cols="5">{{ get_setting('hero_text', '<h1>
                                Leading future with Smart IoT solution</h1><h2>
                                    Climbing new heights of innovation with automation, robotics technology, and smart IoT solution</h2>') }}</textarea>
                          </div>
                          <div class="form-group">
                              <label for="hero_image">Hero Image</label>
                              <input type="hidden" name="types[]" value="hero_image">
                              <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                  accept="image/png" aria-label="Choose File" name="hero_image" />
                              <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                              <input type="file" name="hero_image" placeholder="Choose image" id="hero_image"
                                  accept="image/*" class="form-control"/>
                          </div>

                          <div class="col-md-12 mb-2">
                              <img id="preview-image-before-upload"
                                  src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                  alt="preview image" style="max-height: 250px;border: 2px solid;
                            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;"/>
                          </div>


                          <div class="form-group mt-3">
                              <label for="hero_youtube_link">Youtube Link</label>
                              <input type="hidden" name="types[]" value="hero_youtube_link">
                              <input type="text" name="hero_youtube_link" id="hero_youtube_link"
                                  placeholder="https://www.youtube.com/watch?v=XXX" class="form-control"
                                  value="{{ get_setting('hero_youtube_link') }}">
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card mt-3">
                  <div class="card-header" id="aboutUs">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        About Us
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="aboutUs" data-parent="#accordion">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
                            @csrf
                            <div class="form-group">
                                <label for="about_us_enable">Enable About Us?</label>
                              <input type="hidden" name="types[]" value="about_section">
                                <select class="custom-select" id="about_us_enable" name="about_section">
                                <option value="1" {{ get_setting('about_section') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ get_setting('about_section') == '0' ? 'selected' : '' }}>NO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="about_title">About Title</label>

                                <input type="hidden" name="types[]" value="about_title">
                                <input type="text" name="about_title" id="about_title" placeholder="#DARE TO AUTOMATE" class="form-control" value="{{ get_setting('about_title') }}"/>

                            </div>
                            <div class="form-group">
                                <label for="about_image">About Image</label>
                                <input type="hidden" name="types[]" value="about_image">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                    accept="image/png" aria-label="Choose File" name="about_image" />
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <input type="file" name="about_image" placeholder="Choose image" id="about_image"
                                    accept="image/*" class="form-control"/>
                            </div>


                            <div class="col-md-12 mb-2">
                                <img id="preview-image-about-us"
                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                    alt="preview image" style="max-height: 250px;border: 2px solid;
                              box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;"/>
                            </div>

                            <div class="form-group">
                                <label for="aboutSection">About short description</label>
                                <input type="hidden" name="types[]" value="about_description">
                                <textarea name="about_description" id="aboutSection" cols="30" rows="10" class="form-control" placeholder="About Description">{{ get_setting('about_description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_full_description">About Us page description</label>
                                <input type="hidden" name="types[]" value="about_us_page_description">
                                <textarea name="about_us_page_description" id="about_full_description" cols="30" rows="10" class="form-control">{{ get_setting('about_us_page_description') }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="card mt-3">
                  <div class="card-header" id="whyUs">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Why Us
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="whyUs" data-parent="#accordion">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
                            @csrf


                              <div class="form-group">
                                  <label for="sel1">Enable Why Us Section ?</label>
                                <input type="hidden" name="types[]" value="whyus_section">
                                  <select class="custom-select" id="sel1" name="whyus_section">
                                  <option value="1" {{ get_setting('whyus_section') == '1' ? 'selected' : '' }}>Yes</option>
                                  <option value="0" {{ get_setting('whyus_section') == '0' ? 'selected' : '' }}>NO</option>
                                  </select>
                              </div>

                            <div class="form-group">
                                <label for="whyus_title">Why Us Title</label>
                                <input type="hidden" name="types[]" value="whyus_title">
                                <input type="text" name="whyus_title" value="{{ get_setting('whyus_title') }}" placeholder="Why us title" class="form-control">

                            <div class="form-group">
                                <label for="whyus_image">Why Us Image</label>
                                <input type="hidden" name="types[]" value="whyus_image">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                    accept="image/png" aria-label="Choose File" name="whyus_image" />
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <input type="file" name="whyus_image" placeholder="Choose image" id="whyus_image"
                                    accept="image/*" class="form-control"/>
                            </div>

                            <div class="col-md-12 mb-2">
                                <img id="preview-image-whyus"
                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                    alt="preview image" style="max-height: 250px;border: 2px solid;
                              box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;"/>
                            </div>

                            <div class="form-group">
                                <label for="whyus_desc">Description</label>
                                <input type="hidden" name="types[]" value="whyus_description">
                                <textarea name="whyus_description" id="whyus_desc" placeholder="Why us description" class="form-control">{{ get_setting('whyus_description') }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                  </div>
                </div>


                {{-- contact us --}}

                <div class="card mt-3">
                    <div class="card-header" id="contact-us">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#contactUs" aria-expanded="false" aria-controls="contactUs">
                          Contact Us
                        </button>
                      </h5>
                    </div>
                    <div id="contactUs" class="collapse" aria-labelledby="contact-us" data-parent="#accordion">
                      <div class="card-body">
                          <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
                              @csrf

                              <div class="form-group">
                                  <label for="contactus_title">Contact Title</label>
                                  <input type="hidden" name="types[]" value="contactus_title">
                                  <input type="text" name="contactus_title" value="{{ get_setting('contactus_title') }}" placeholder="Contact Us title" class="form-control">

                              <div class="form-group">
                                  <label for="contactus_image">Contact us image</label>
                                  <input type="hidden" name="types[]" value="contactus_image">
                                  <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                      accept="image/png" aria-label="Choose File" name="contactus_image" />
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                  <input type="file" name="contactus_image" placeholder="Choose image" id="contactus_image"
                                      accept="image/*" class="form-control"/>
                              </div>

                              <div class="col-md-12 mb-2">
                                  <img id="preview-image-contactus-image"
                                      src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                      alt="preview image" style="max-height: 250px;border: 2px solid;
                                box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;"/>
                              </div>

                              <div class="form-group">
                                  <label for="contactus_desc">Description</label>
                                  <input type="hidden" name="types[]" value="contactus_description">
                                  <textarea name="contactus_description" id="contactus_desc\" placeholder="contact us description" class="form-control" cols="5" rows="5">{{ get_setting('contactus_description') }}</textarea>
                              </div>

                              <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                      </div>
                    </div>
                  </div>
              </div>


              {{-- our teams --}}

              <div class="card mt-3">
                <div class="card-header" id="our-teams">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#ourTeams" aria-expanded="false" aria-controls="ourTeams">
                      Our Teams
                    </button>
                  </h5>
                </div>
                <div id="ourTeams" class="collapse" aria-labelledby="our-teams" data-parent="#accordion">
                  <div class="card-body">
                      <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
                          @csrf

                          <div class="form-group">
                              <label for="ourteams_title">Our teams Title</label>
                              <input type="hidden" name="types[]" value="ourteams_title">
                              <input type="text" name="ourteams_title" value="{{ get_setting('ourteams_title') }}" placeholder="Our teams title" class="form-control">

                          <div class="form-group">
                              <label for="ourteam_desc">Our Teams Description</label>
                              <input type="hidden" name="types[]" value="ourteam_description">
                              <textarea name="ourteam_description" id="ourteam_desc" placeholder="ourteam description" class="form-control" cols="5" rows="5">{{ get_setting('ourteam_description') }}</textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                  </div>
                </div>
              </div>


              {{-- services settings --}}
              <div class="card mt-3">
                <div class="card-header" id="services">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-decoration-none" data-toggle="collapse" data-target="#services" aria-expanded="false" aria-controls="services">
                      Services
                    </button>
                  </h5>
                </div>
                <div id="services" class="collapse" aria-labelledby="services" data-parent="#accordion">
                  <div class="card-body">
                      <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
                          @csrf

                          <div class="form-group">
                              <label for="services_title">Service Title</label>
                              <input type="hidden" name="types[]" value="services_title">
                              <input type="text" name="services_title" value="{{ get_setting('services_title') }}" placeholder="Service title" class="form-control">

                          <div class="form-group">
                              <label for="service_desc">Service Description</label>
                              <input type="hidden" name="types[]" value="service_desc">
                              <textarea name="service_desc" id="service_desc" placeholder="Service description" class="form-control" cols="5" rows="5">{{ get_setting('service_desc') }}</textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
</div>
@section('scripts')
{{-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> --}}
{{-- <script src="https://cdn.tiny.cloud/1/v96d86m5e2vo346jhn45ayjy9920xgw4q9p3zlw9y0n92avm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script>
    tinymce.init({
      selector: 'textarea#hero_text',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak visualblocks',
      toolbar_mode: 'floating',
      style_formats: [
    { title: 'Headers', items: [
      { title: 'h1', block: 'h1' },
      { title: 'h2', block: 'h2' },
      { title: 'h3', block: 'h3' },
      { title: 'h4', block: 'h4' },
      { title: 'h5', block: 'h5' },
      { title: 'h6', block: 'h6' }
    ] },

    { title: 'Blocks', items: [
      { title: 'p', block: 'p' },
      { title: 'div', block: 'div' },
      { title: 'pre', block: 'pre' }
    ] },

    { title: 'Containers', items: [
      { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
      { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
      { title: 'blockquote', block: 'blockquote', wrapper: true },
      { title: 'hgroup', block: 'hgroup', wrapper: true },
      { title: 'aside', block: 'aside', wrapper: true },
      { title: 'figure', block: 'figure', wrapper: true }
    ] }
  ],
  visualblocks_default_state: true,
  end_container_on_empty_block: true,
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   });


  </script>


{{-- //hero section --}}
<script type="text/javascript">
    let get_image = `{{ get_setting('hero_image') ? true : false }}`
    let full_url = `{{ get_storage_location() }}` +'/' +  `{{ get_setting('hero_image')}}`
    // let location  = `{{ get_storage_location() }}`
    // console.log(get_image);
    // console.log(getImage);
    if (get_image) {
        $('#preview-image-before-upload').attr('src', full_url);
    }
    $(document).ready(function (e) {
       $('#hero_image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });


    </script>

    {{-- About us --}}

    <script>
        tinymce.init({
          selector: 'textarea#about_full_description',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
          toolbar_mode: 'floating'
       });


      </script>

    <script type="text/javascript">
        let get_about_image = `{{ get_setting('about_image') ? true : false }}`
        let full_about_url = `{{ get_storage_location() }}` +'/' +  `{{ get_setting('about_image')}}`
        // let location  = `{{ get_storage_location() }}`
        // console.log(get_image);
        // console.log(getImage);
        if (get_about_image) {
            $('#preview-image-about-us').attr('src', full_about_url);
        }
        $(document).ready(function (e) {
           $('#about_image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {

              $('#preview-image-about-us').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });

        });


        </script>

        {{-- Why us --}}
        <script type="text/javascript">
            let get_whyus_image = `{{ get_setting('whyus_image') ? true : false }}`
            let full_why_url = `{{ get_storage_location() }}` +'/' +  `{{ get_setting('whyus_image')}}`
            // let location  = `{{ get_storage_location() }}`
            // console.log(get_image);
            // console.log(getImage);
            if (get_whyus_image) {
                $('#preview-image-whyus').attr('src', full_why_url);
            }
            $(document).ready(function (e) {
               $('#whyus_image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {

                  $('#preview-image-whyus').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

               });

            });


            </script>


{{-- //contact us --}}
<script>
     let get_contactus_image = `{{ get_setting('contactus_image') ? true : false }}`
            let full_contactus_url = `{{ get_storage_location() }}` +'/' +  `{{ get_setting('contactus_image')}}`
            // let location  = `{{ get_storage_location() }}`
            // console.log(get_image);
            // console.log(getImage);
            if (get_contactus_image) {
                $('#preview-image-contactus-image').attr('src', full_contactus_url);
            }
            $(document).ready(function (e) {
               $('#contactus_image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {

                  $('#preview-image-contactus-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

               });

            });

</script>

@endsection
@endsection
