@extends('admin.layouts.app')
@section('admin')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Setting</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">General Settings</li>
        </ol>
    </nav>
</div>
<hr>
<div class="card">
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('app.setting.save') }}">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <input type="hidden" name="types[]" value="app_logo">
                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/png"
                        aria-label="Choose File" name="app_logo" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <input type="file" name="app_logo" placeholder="Choose image" id="image" accept="image/*" class="form-control">
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                    alt="preview image" style="max-height: 250px;border: 2px solid;
                    box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;">
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="hidden" name="types[]" value="location">
                <textarea name="location" class="form-control" id="location"
                    placeholder="Enter Site full Location">{{ get_setting('location') }}</textarea>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="hidden" name="types[]" value="site_email">
                <input type="email" class="form-control" id="email" name="site_email" placeholder="Enter Site Email"
                    value="{{ get_setting('site_email') }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="hidden" name="types[]" value="site_phone">
                <input type="text" class="form-control" id="phone" name="site_phone" placeholder="Enter Site Phone"
                    value="{{ get_setting('site_phone') }}">
            </div>

            <div class="form-group">
                <label for="map">Map</label>
                <input type="hidden" name="types[]" value="map">
                <textarea name="map" class="form-control" id="map"
                    placeholder="Copy location iframe from google map and paste here">{{ get_setting('map') }}</textarea>
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="hidden" name="types[]" value="facebook">
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook link"
                    value="{{ get_setting('facebook') }}">
            </div>

            <div class="form-group">
                <label for="twitter">twitter</label>
                <input type="hidden" name="types[]" value="twitter">
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter link"
                    value="{{ get_setting('twitter') }}">
            </div>

            <div class="form-group">
                <label for="skype">Skype</label>
                <input type="hidden" name="types[]" value="skype">
                <input type="text" class="form-control" id="skype" name="skype" placeholder="Enter skype link"
                    value="{{ get_setting('skype') }}">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="hidden" name="types[]" value="instagram">
                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter instagram link"
                    value="{{ get_setting('instagram') }}">
            </div>

            <div class="form-group">
                <label for="linkedin">Linked in</label>
                <input type="hidden" name="types[]" value="linkedin">
                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin link"
                    value="{{ get_setting('linkedin') }}">
            </div>

            <div class="form-group">
                <label for="seo_title">Seo title</label>
                <input type="hidden" name="types[]" value="seo_title">
                <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="Enter Seo Title"
                    value="{{ get_setting('seo_title') }}">
            </div>

            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <input type="hidden" name="types[]" value="meta_keywords">
                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="User comma to seperate the keywords"
                    value="{{ get_setting('meta_keywords') }}">
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <input type="hidden" name="types[]" value="meta_description">
                <textarea name="meta_description" class="form-control" id="meta_description"
                    placeholder="meta description">{{ get_setting('meta_description') }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@section('scripts')
<script>
    var upload = new FileUploadWithPreview("myUniqueUploadId");

    tinymce.init({
      selector: '#location',
      toolbar_mode: 'floating',
   });
</script>


<script type="text/javascript">
    let get_image = `{{ get_setting('app_logo') ? true : false }}`
    let full_url = `{{ get_storage_location() }}` +'/' +  `{{ get_setting('app_logo')}}`
    // let location  = `{{ get_storage_location() }}`
    // console.log(get_image);
    // console.log(getImage);
    if (get_image) {
        $('#preview-image-before-upload').attr('src', full_url);
    }
    $(document).ready(function (e) {
       $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });


    </script>
@endsection
@endsection
