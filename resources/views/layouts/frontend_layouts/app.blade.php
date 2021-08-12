@include('layouts.frontend_layouts.header')

    <div id="app">        
        @include('layouts.frontend_layouts.navbar')
        <div class="body-content">
            @yield('content')
        </div>
      
    @include('layouts.frontend_layouts.footer')

    </div>
    @include('layouts.frontend_layouts.script')
    

</body>
</html>

