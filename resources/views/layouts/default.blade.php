<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>

    <header>
        @include('partials.navbar')
    </header>
    <main class="py-4">
        @yield('content')
    </main>


    
    
@include('partials.scripts')
</body>
</html>
