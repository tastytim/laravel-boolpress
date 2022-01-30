<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    @if(Auth::check()) <meta name="user-name" content="{{ Auth::user()->name }}"> @endif
    
    <meta name="csrf-token" content="{{ csrf_token() }} ">
   
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>


    <div id="root">

    </div>
    <script src="{{ asset('js/front.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('partials.scripts')
</body>
</html>
