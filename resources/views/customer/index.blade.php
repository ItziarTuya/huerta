@extends('layouts.app')

@section('content')

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
                   <hr>
                </div>

                <div class="links welcome-links">
                    <p class="init">Where do we start?</p>
                    <a href="{{ url('shop/index') }}">Go shopping</a>
                    <a href="{{ url('shop/cart/'.$shoppingCart->id) }}">Shopping cart</a>
                    <a href="{{ url('customer/orders/') }}">Order history</a>
                    <a href="{{ url('user/edit') }}">Profile</a>
                    <a href="" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>

            </div>
        </div>

@endsection


