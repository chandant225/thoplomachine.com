<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title','Thoplomachine')</title>

  <meta name="keywords" content="@yield('meta_keywords','default keywords')">
  <meta name="title" content="@yield('seo_title','Seo Title')">
  <meta name="description" content="@yield('meta_description','default description')">

<link rel="canonical" href="{{ env('APP_URL') }}" />

<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="@yield('seo_title','Seo Title')" />
<meta property="og:description"
    content="@yield('meta_description','default description')" />

<meta property="og:url" content="{{ env('APP_URL') }}/" />
<meta property="og:site_name" content="{{ env('APP_NAME') }}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description"
    content="@yield('meta_description','default description')" />

<meta name="twitter:title" content="@yield('seo_title','Seo Title')" />
<meta name="twitter:site" content="@Thoplomachine" />
<meta name="twitter:creator" content="@Thoplomachine" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

    @yield('styles')

    <style>
        .img-fit {
            width: 31%;
        object-fit: cover;
        margin-top: -20px;
        }
    </style>
</head>

<body>
