<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('metatag')


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RFXFY8R85B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RFXFY8R85B');
    </script>

    <!-- Global site tag (gtag.js) - Google Ads: 718627976 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-718627976"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-718627976');
    </script>

    @if (isset($script))
        @foreach ($script as $item)
            {!! $item->script !!}
        @endforeach
    @endif






    <link rel="canonical" href="{{ 'https://outofboxdesign.com/' . request()->path() }}" />


    {{-- meta tags --}}
    <link rel="icon" style="background-color:white;" type="image/png" href="{{ asset('/assets/images/fav.png') }}">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/fontawesome/css/all.css/') }}">
    @stack('styles')


    <!-- Scripts -->
    <script src="{{ asset('/assets/bootstrap/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ mix('/js/frontend.js') }}" defer></script>
    <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- recaptcha --}}
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='https://www.google.com/recaptcha/api.js?render=explicit&hl=eng }}' async defer></script>
    @stack('script')

    <script type="application/javascript">
        function toggleNav() {
            if ($('.nav-list').css('display') == 'flex') {
                $('.nav-list ul').css('animation', 'nav_out 0.5s ease-in');
                $('.nav-menu .fa-times').css('display', 'none');

                setTimeout(() => {
                    $('.nav-list').css('display', 'none');
                }, 500);

            } else {
                $('.nav-list').css('display', 'flex');
                $('.nav-menu .fa-times').css('display', 'block');
                $('.nav-list ul').css('animation', 'nav_in 0.5s ease-in');
            }
        }

        function toggleSearch() {
            if ($('.nav-search').css('display') == 'flex') {
                $('.nav-search').css('display', 'none');
            } else {
                $('.nav-search').css('display', 'flex');
                $('.nav-search').css('animation', 'searchShow 0.5s ease');
            }
        }



        // color toggler
        var bg_color = '';


        function toggleColor(color) {
            if (color == 'Dark') {
                $('#toggler-color span').html('Light');
                $('#toggler-color').css('top', '0px');
                $('body').css('background-color', 'white');
                $('.color').css('color', 'black');
                $('.bg-color').css('background-color', 'rgba(0, 0, 0, 0.02)');
                $('.borders').css('border-bottom', '0.5px solid rgba(35, 34, 38, 0.4)');

                bg_color = '';
            }
            if (color == 'Light') {
                $('#toggler-color span').html("Dark");
                $('#toggler-color').css('top', '50px');
                $('body').css('background-color', 'black');
                $('.color').css('color', 'white');
                $('.bg-color').css('background-color', 'rgba(0, 0, 0, 0.2)');
                $('.borders').css('border-bottom', '0.5px solid white');
                bg_color = 'black';
            }
        }
    </script>
</head>

<body>

    <div id="alert-message"></div>

    {{-- mouse cursor pointer --}}
    {{-- <div class="pointer">
    <div class="dot"></div>
</div> --}}

    <div class="scroll-top" onclick="scrollUp()">
        <div class="st-wrapper">
            <p class="color">Scroll to top</p>
            <div class="st-line ">
                <div class="st-line-inner"></div>
            </div>
        </div>
    </div>

    {{-- dark light toggle button --}}
    <div class="color-toggler">
        <div class="color-name tb-item" id="toggler-color"><span>Light</span></div>
        <div class="toggler-button">
            <div class="tb-item toggler-item light" onclick="toggleColor('Dark')">
                Light
            </div>
            <div class="tb-item toggler-item dark" onclick="toggleColor('Light')">
                Dark
            </div>
        </div>
    </div>
