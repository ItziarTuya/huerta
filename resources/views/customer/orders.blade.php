@extends('layouts.navigation')

@section('content')

    <div class="panel-heading">
        <h2>Orders History</h2>
        <hr>
    </div>

    <div class="container">
        <table class="table table-products">
            <thead>
                <tr>
                    <th class="text-left">Reference</th>
                    <th class="text-center">Order date</th>
                    <th class="text-center">Order</th>
                    <th class="text-right">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($shoppingCarts as $shoppingCart)
                    <tr @if (Auth::user()->isAdmin() && $shoppingCart->isConfirmed()) class="success" @endif>
                        <td class="text-left">#orchard_{{ $shoppingCart->id }}</td>

                        @if ($shoppingCart->isPending())
                            <td class="text-center">Pending</td>
                        @else
                            <td class="text-center">{{ $shoppingCart->confirmed_at }}</td>
                        @endif

                        <td class="text-center">
                            <a href="{{ url('shop/cart/'.$shoppingCart->id) }}">show order details</a>
                        </td>
                        <td class="text-right">{{ $shoppingCart->getFormatedTotalPrice() }}</td>
                    </tr>

                @empty
                    <div class="alert alert-warning">
                        <strong>Your order history is empty</strong>
                    </div>
                @endforelse
            </tbody>
        </table>
                    <a href="{{ url('shop/index') }}" class="btn btn-info">Return to Shop</a>

        {{ $shoppingCarts->links() }}

    </div>

@endsection
