@extends('layouts.navigation')

@section('content')

    <h2>Sales</h2>
    <table class="table table-products">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th class="text-right">Price</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->confirmed_at }}</td>
                    <td class="text-right">{{ number_format($product->buy_price, 2, '.', ',') }} €</td>
                    <td class="text-right">{{ $product->quantity }}</td>
                    <td class="text-right">{{ number_format($product->buy_price * $product->quantity, 2, '.', ',') }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}

@endsection