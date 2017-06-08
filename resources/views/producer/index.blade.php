@extends('layouts.app')

@section('content')
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
                   <hr>
                </div>

                <p class="init">Where do we start?</p>

                <div class="links welcome-links">
                    <a href="{{ url('producer/products') }}" >Products</a>
                    <a href="{{ url('producer/sales') }}" >Sales</a>
                    <a href="{{ url('shop/index') }}" >Go shopping</a>
                    <a href="{{ url('shop/cart/'.$shoppingCart->id) }}" >Shopping cart</a>
                    <a href="{{ url('user/edit') }}" >Profile</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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

