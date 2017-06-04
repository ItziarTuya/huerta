@extends('layouts.shop')

@section('content')

    <div class="panel-heading">
        <h2>Shopping at Marketplace</h2>
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
