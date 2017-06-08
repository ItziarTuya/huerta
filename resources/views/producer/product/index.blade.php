@extends('layouts.navigation')

@section('content')

	<h2>Products</h2>
    <table class="table table-products">
        <thead>
            <tr>
                <th>Name</th>

                <th class="text-right">Price</th>
                <th class="text-right">Stock</th>
                <th class="text-center">Category</th>
                <th class="text-center">Picture</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr @if ($product->trashed()) class="danger" @endif>
                    <td>{{ $product->name }}</td>
                    <td class="text-right">{{ $product->getFormatedPrice() }}</td>
                    <td class="text-right">{{ $product->stock }} u</td>
            	    <td class="text-center">{{ $product->category }}</td>
                    <td class="text-center">
                        <img src="{{ $product->getPictureUrl() }}" alt="{{ $product->name }}" style="width: 40px; height: 40px;" class="img-thumbnail">
                    </td>
                    <td class="text-center">
                        @if (!$product->trashed())
                            <a href="{{ url('/producer/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-info">Edit</a>
                            <form method="POST" action="{{ url('/producer/products', $product->id) }}" class="form-button">
                                <input type="hidden" name="_method" value="DELETE" >
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
    @if (!Auth::user()->isAdmin())
        <div>
            <a href="{{ url('/producer/products/create') }}" class="btn btn-primary">Create Product</a>
        </div>
    @endif

@endsection