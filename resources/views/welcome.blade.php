@include('layouts.welcome')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        @if (Auth::user()->isProducer())
                            <a href="{{ url('producer/index') }}">Perfil</a>
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
