<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        @include("layouts.header")
        @yield("cabecera")
        
    </div>
    <div id="app">
        <div class="container bg-gradient-light mt-3 opacidad-10">
        <main class="py-5">
            @yield('content')
        </main>
        </div>
    </div>
</body>
</html>
