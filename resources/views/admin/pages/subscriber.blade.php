@extends('admin.layouts.app')
@section('admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Subscriber</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page">Subscriber</li>
        </ol>
    </nav>
</div>
<hr>
<div class="text-muted">
    <h4>Total Items: {{ $subscribers->total() }}</h4>
</div>
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-5">

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                    @if (($subscribers->total()) > 0)
                    @foreach ($subscribers as $key=>$subscriber)
                    <tr>
                      <th scope="row">{{ $key+1 }}</th>
                      <td>{{ $subscriber->email}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <th>

                            <div class="text-center text-muted">
                                Sorry no subscriber found.
                            </div>
                        </th>
                    </tr>
                    @endif
                </tbody>
              </table>

              <div class="mt-2">
            {{ $subscribers->links() }}
              </div>
        </div>
        <div class="col-sm-6">
            <h5>Send Mail to Subscriber</h5>
        </div>
    </div>


</div>
@endsection
