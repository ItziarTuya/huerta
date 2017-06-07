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
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->confirmed_at }}</td>
                    <td class="text-right">{{ number_format($product->buy_price, 2, '.', ',') }} €</td>
                    <td class="text-right">{{ $product->quantity }}</td>
                    <td class="text-right">{{ number_format($product->buy_price * $product->quantity, 2, '.', ',') }} €</td>
                </tr>

            @empty
                <div class="alert alert-warning">
                    <strong>There no sales to show at the moment.</strong>
                </div>

            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}

@endsection