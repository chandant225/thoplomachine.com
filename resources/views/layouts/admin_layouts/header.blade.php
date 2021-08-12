<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Outofbox Design</title>
    
    <script src="{{asset('/assets/admin/vendor/jquery/dist/jquery.min.js')}}" defer></script>
    <!-- Scripts -->
    <script src="{{ mix('/js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Styles -->

     <!---------------------------------- Custom fonts for this template--------------------------------------------->
    <link href="{{asset('/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/assets/admin/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('/assets/admin/css/argon.css?v=1.2.0')}}" type="text/css">
    
    

</head>
<body>


    
