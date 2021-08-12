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

            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                <label>Upload File
                    <a href="javascript:void(0)" class="custom-file-container__image-clear"
                        title="Clear Image">&times;</a></label>
                <label class="custom-file-container__custom-file">
                    <input type="hidden" name="types[]" value="app_logo">
                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/png"
                        aria-label="Choose File" name="app_logo" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview image-preview"></div>

                @if (get_setting('app_logo'))
                <div class="m-3">
                    <h2>Previous logo</h2>
                    <img src="{{ URL::asset('storage/') }}/{{ get_setting('app_logo') }}" class="img-fluid"
                        style="width: 28%;">
                </div>
                @endif
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
                <textarea name="meta_description" class="form-control" id="map"
                    placeholder="meta description">{{ get_setting('meta_description') }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@section('scripts')
<script>
    var upload = new FileUploadWithPreview("myUniqueUploadId");
</script>
@endsection
@endsection
