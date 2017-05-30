@include('layouts.welcome')

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))                           {{-- is already logged?--}}
                <div class="top-right links">
                    @if (Auth::check())
                        @if (Auth::user()->isCustomer())        {{-- the user is a customer?--}}
                        @else
                            <a href="{{ route('home') }}">Home</a>
                        @endif
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @else
                {{ route('home') }}                             {{-- redirect home --}}
            @endif


            <div class="content">
                <h5> Welcome {{ $user->name }} </h5>
                <div class="title m-b-md">
                   Orchard
                </div>
                <p>Where do we start?</p>


                <div class="links">
                    <a href="{{-- route('producer.profile') --}}">Go shopping</a>
                    <a href="{{-- url('customer/edit') --}}">Update profile</a>
                    <a href="{{-- route('producer.profile') --}}">Show shopping cart</a>
                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
