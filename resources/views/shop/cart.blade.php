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
                    <th class="text-right">Price</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($shoppingCart->buyItems as $buyItem)
                    <tr>
                        <td>
                            <a href="{{ url('shop/show/'.$buyItem->product->id) }}">{{ $buyItem->product->name }}</a>
                        </td>
                        <td class="text-right">{{ $buyItem->product->getFormatedPrice() }}</td>
                        <td class="text-right">{{ $buyItem->quantity }} u</td>
                        <td class="text-right">{{ $buyItem->getFormatedTotalPrice() }}</td>
                        <td class="text-center">
                            @if ($shoppingCart->isPending())
                                <form method="POST" action="{{ url('shop/cart/'.$shoppingCart->id.'/item/'.$buyItem->id) }}" class="form-button">
                                    <input type="hidden" name="_method" value="DELETE" >
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                                </form>
                            @endif
                        </td>
                    </tr>

                @empty
                    <div class="alert alert-warning">
                        <strong>Your shopping cart is empty</strong>
                    </div>
                @endforelse
            </tbody>
            <tfoot>
                <td colspan="4" class="text-right">
                    <strong> Total Price: {{ $shoppingCart->getFormatedTotalPrice() }} </strong>
                </td>
                <td></td>
            </tfoot>
        </table>
        @if ($shoppingCart->isPending())
            <div>
                <a href="{{ url('shop/index') }}" class="btn btn-info">Return to Shop</a>

                @if ($shoppingCart->getNumItems() > 0)
                    <form method="POST" action="{{ url('/shop/cart/clear', $shoppingCart->id) }}" class="form-button">
                        <input type="hidden" name="_method" value="DELETE" >
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning"> Empty cart </button>
                    </form>
                    <form method="POST" action="{{ url('/shop/cart/confirm', $shoppingCart->id) }}" class="form-button">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success"> Confirm </button>
                    </form>
                @endif
            </div>
        @endif
    </div>

@endsection
