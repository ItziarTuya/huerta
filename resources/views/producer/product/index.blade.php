@extends('layouts.navigation')

@section('content')

	<h2>Products</h2>
    <table class="table table-products">
        <thead>
            <tr>
                <th>Name</th>

                <th class="text-right">Price</th>
                <th class="text-right">Stock</th>
                <th>Category</th>
                <th>Picture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr @if ($product->trashed()) class="danger" @endif>
                    <td>{{ $product->name }}</td>
                    <td class="text-right">{{ $product->getFormatedPrice() }}</td>
                    <td class="text-right">{{ $product->stock }} u</td>
            	    <td>{{ $product->category }}</td>
                    <td><img src="{{ $product->getPictureUrl() }}" alt="" style="width: 40px; height: 40px;" class="img-thumbnail"></td>
                    <td>
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
    <div>
        <a href="{{ url('/producer/products/create') }}" class="btn btn-primary">Create Product</a>
    </div>

@endsection