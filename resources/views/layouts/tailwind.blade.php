<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') {{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <link rel="x icon" type="img/png" href="images/CvSU-logo-16x16.webp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .hoverable-button {
                transition: background-color 0.3s ease, transform 0.3s ease; 
            }
            .hoverable-button:hover {
                background-color: #003618;
                transform: scale(1.05);     
            }
            .shadow { 
                box-shadow: 0px 2px 10px 2px rgba(0, 0, 0, 0.2);
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Custom JS -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    </head>
    <body>
        @yield('main-content-header')
        @yield('main-content')
    </body>
</html>