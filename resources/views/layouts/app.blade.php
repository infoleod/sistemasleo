<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-xxs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleHeader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleProduct.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesMaster.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesSearch.css') }}" rel="stylesheet">


</head>
<body>

    @include('layouts.header')

    <div id="app">
        @yield('content')
    </div>

    @include('layouts.footer')
  </body>
  </html>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>



    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
    {{-- Libreria para zoom --}}
    <script src="{{ asset('js/elevatezoom.js') }}"></script>
    <script> $("#jsZoom").elevateZoom();  </script>
    {{-- Libreria para botones emergentes --}}
    <script src="{{ asset('js/jquery-confirm.js') }}"></script>
