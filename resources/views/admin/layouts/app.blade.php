@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div id="content-wrapper" class="d-flex flex-column">

<div id="content">
    @include('admin.layouts.topbar')

    <div class="container-fluid" id="app">

        @yield('admin')
    </div>
</div>
</div>

{{-- @include('admin.layouts.scripts') --}}


<!-- Bootstrap core JavaScript-->
<script src="{{ asset("assets/admin/vendor/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset("assets/admin/vendor/jquery-easing/jquery.easing.min.js") }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

<script src="{{ mix('js/admin.js') }}"></script>


@yield('scripts')
</body>

</html>
