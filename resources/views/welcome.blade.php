<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        

       
    </head>
    <body class="">

        


        <script>
            $(document).mousemove(function (e) {
            $(".pointer").css({ left: e.pageX, top: e.pageY });
        });
        </script>
     
    </body>
</html>
