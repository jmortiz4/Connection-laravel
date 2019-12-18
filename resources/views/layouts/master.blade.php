<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')

    <body>
        @include('partials.navbar')
        @yield('contenido')
        @include('partials.footer')
    </body>
</html>