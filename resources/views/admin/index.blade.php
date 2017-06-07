@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">


            <div class="content">
                <h5> Welcome {{ $user->name }} </h5>
                <div class="title m-b-md">
                   Orchard
                   <hr>
                </div>

                <p class="init">Where do we start?</p>

                <div class="links">
                    <a href="{{ url('admin/products') }}">Products</a>
                    <a href="{{ url('admin/users') }}">Users</a>
                    <a href="{{ url('admin/shoppingcarts') }}">Shopping Carts</a>
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

