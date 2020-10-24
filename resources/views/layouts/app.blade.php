<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ Auth::user() }}">
    <link rel="icon" href="{{ asset('img/favicon.svg') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('social')
    @yield('custom')
    @yield('avatar')
    <title>Ecoguata</title>
</head>
<body>
    <div id="app">
        @include('partials.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('partials.footer')
    <script src="https://kit.fontawesome.com/bd9f0e4c73.js" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
</body>
</html>