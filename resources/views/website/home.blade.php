<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ESWIFT</title>

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-style.css') }}">
    </head>
    <body class="antialiased">
        <div class="container">
            <h1>home</h1>
        </div>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script>
               $(document).ready(function(){
        console.log("jQuery is working!");
    }); 
        </script>
    </body>
</html>
