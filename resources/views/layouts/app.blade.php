<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon -->
        <link href="{{ config('app.asset_url')}}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ config('app.asset_url')}}/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="{{ config('app.asset_url')}}/css/dataTables.bootstrap4.min.css" rel="stylesheet">
         <link href="{{ config('app.asset_url')}}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ config('app.asset_url')}}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link type="text/css" href="{{ config('app.asset_url')}}/css/app.css" rel="stylesheet">
 
         
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

       
        @stack('js')
        <script   src="{{ config('app.asset_url')}}/vendor/jquery/dist/jquery.min.js"></script>
        <script   src="{{ config('app.asset_url')}}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script   src="{{ config('app.asset_url')}}/js/jquery.dataTables.min.js"></script>
         
        <script src="{{ config('app.asset_url')}}/js/app.js?v=1.0.0"></script>
        
        @yield('scriptjs')
    </body>
</html>