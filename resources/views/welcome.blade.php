<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Huerta') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/gif" href="{{ asset('animated_favicon1.gif') }}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        @if (Auth::user()->isProducer())
                            <a href="{{ route('producer.profile') }}">Perfil</a>
                        @else
                            <a href="{{ route('home') }}">Home</a>
                        @endif
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                   Orchard
                </div>
                <p>Sing up as:</p>

                <div class="links">
                    <a href="{{ route('producer.register') }}">Producer</a>
                    <a href="{{ route('register') }}">Consumer</a>
                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
