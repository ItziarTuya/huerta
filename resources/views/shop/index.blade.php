@extends('layouts.shop')

@section('content')

    <div class="panel-heading" style="padding-bottom: 15px;">
        <h2>Shopping at Marketplace</h2>
        <ul class="pull-right">

            <li class="dropdown links">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Search By Category<span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('shop/index') }}">
                            All
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('shop/category/Verduras') }}">
                            Verduras
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('shop/category/Frutas') }}">
                            Frutas
                        </a>

                        <a href="{{ url('shop/category/Legumbres') }}">
                            Legumbres
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr>
    </div>

    <div class="container">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <div class="row">

            @each('partial.shop_cp_thumbnail', $products, 'product')

        </div>

        {{ $products->links() }}

    </div>

@endsection
