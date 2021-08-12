
@if (session('success'))
    <div class="alert alert-success" id="alert" style="z-index:9999;width: 280px;position:fixed; top: 20px; right: 20px;">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="alert" style="z-index:9999;width: 280px;position:fixed; top: 20px; right: 20px;">
        {{session('error')}}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-primary" id="alert" style="z-index:9999;width: 280px;position:fixed; top: 20px; right: 20px;">
        {{session('info')}}
    </div>
@endif

