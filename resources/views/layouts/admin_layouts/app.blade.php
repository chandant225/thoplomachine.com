
@include('layouts.admin_layouts.header')
    <div id="app">            
        @include('layouts.admin_layouts.sidebar') 
         <!-- Main content -->
        <div class="main-content" id="panel">           
            @include('layouts.admin_layouts.topbar')
            <main class='main-content bgc-grey-100'>
                <div class=" mt-3">                   
                    @yield('content')                   
                    @include('layouts.admin_layouts.footer')    
                </div>                
            </main>                 
        </div>       
    </div>        
@include('layouts.admin_layouts.script') 
</body>
</html>
       

    

