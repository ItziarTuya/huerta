@include('layouts.welcome')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        @if (Auth::user()->isProducer())
                        @else
                            <a href="{{ route('home') }}">Home</a>
                        @endif
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @endif


            <div class="content">
                <h5> Welcome {{ $user->name }} </h5>
                <div class="title m-b-md">
                   Orchard
                </div>
                <p>Where do we start?</p>


                <div class="links">
                    <a href="{{ route('producer.product.create') }}">Add products</a>
                    <a href="{{ route('producer.profile') }}">Update profile</a>
                    <a href="{{-- route('producer.profile') --}}">Show sales</a>
                    <a href="{{-- route('producer.profile') --}}">Go shopping</a>
                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

