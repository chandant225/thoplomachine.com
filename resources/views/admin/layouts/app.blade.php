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

@include('admin.layouts.scripts')
</body>

</html>
