<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    <div id="app">
        <header>
            @include('partials.navbar')
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="resources/js/front.js" ></script>
</body>
</html>
