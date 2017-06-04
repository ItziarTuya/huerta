@extends('layouts.navigation')

@section('shopNav')
    <li><a href="{{ url('shop/index') }}">SHOP</a></li>
    <li>
        <a href="{{ url('shop/cart') }}">
            {{ $shoppingCart->getNumItems() }}
            <span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
    </li>
@endsection