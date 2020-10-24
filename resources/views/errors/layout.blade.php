<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <link rel="icon" href="{{ asset('img/favicon.svg') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body>
        <div class="content">
            <div class="title">
                @yield('message')
            </div>
        </div>
    </body>
</html>
