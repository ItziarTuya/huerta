@extends('layouts.shop')

@section('content')

    <div class="panel-heading">
        <h2>Shopping Cart</h2>
        <hr>
    </div>

    <div class="container">
        <table class="table table-products">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-right">Price By Unit</th>
                    <th class="text-right">Units</th>
                    <th class="text-right">TotalPrice</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shoppingCart->buyItems as $buyItem)
                    <tr>
                        <td>
                            <a href="{{ url('shop/show/'.$buyItem->product->id) }}">{{ $buyItem->product->name }}</a>
                        </td>
                        <td class="text-right">{{ $buyItem->product->price }} €</td>
                        <td class="text-right">{{ $buyItem->quantity }} u</td>
                        <td class="text-right">{{ $buyItem->getTotalPrice() }} €</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td colspan="4"  class="text-right">{{ $shoppingCart->getTotalPrice() }} €</td>
            </tfoot>
        </table>
        @if ($shoppingCart->isPending())
            <div>
                <a href="{{ url('shop/index') }}" class="btn btn-info">Return to Shop</a>
                <a href="{{ url('/shop/cart/clear', $shoppingCart->id) }}" class="btn btn-warning">Empty cart</a>

                @if ($shoppingCart->getNumItems() > 0)
                    <form method="POST" action="{{ url('/shop/cart/confirm', $shoppingCart->id) }}" class="form-button">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success"> Confirm </button>
                    </form>
                @endif
            </div>
        @endif
    </div>

@endsection
