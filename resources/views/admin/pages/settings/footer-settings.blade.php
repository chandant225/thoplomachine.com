@extends('admin.layouts.app')
@section('admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page">Footer Settings</li>
        </ol>
    </nav>
</div>
<hr>

@endsection
