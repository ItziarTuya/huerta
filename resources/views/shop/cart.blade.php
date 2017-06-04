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
    </div>

@endsection
