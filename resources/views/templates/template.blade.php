<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF-token initialization -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>

        <!-- Laravel App.CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <!-- Jquery CDN --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <title>@yield('title')</title>
        
        @yield('head')
     
    </head>
    <body>
        @include('templates.navbar')
        <br>
        @yield('body')
        
        {{-- Script for VUE components --}}
        {{-- <script src="{{asset('js/app.js')}}"></script> --}}
        <script src="{{asset('js/app.js')}}"></script>
       
    </body>
</html>
