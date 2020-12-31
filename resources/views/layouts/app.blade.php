<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

         <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">
                    <img src="https://www.99minutos.com/static/media/logo-99minutos.b60d26d8.png" width="189px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item  @if (Request::url() == route('branches')) active @endif">
                        <a class="nav-link" href="/branches">Branches</a>
                    </li>
                    <li class="nav-item @if (Request::url() == route('pull-request')) active @endif">
                        <a class="nav-link" href="/pull-request">Pull request</a>
                    </li>
                    <li class="nav-item @if (Request::url() == route('pull-request-create')) active @endif">
                        <a class="nav-link" href="/pull-request-create">Nuevo pull request</a>
                    </li>
                </div>
            </nav>
            <div id="app">
                @yield('content') 
            </div>
        
        </div>
    </body>
</html>
