@extends('layouts.navigation')

@section('content')

	<h2>Products</h2>
    <table class="table table-products">
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
            	    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ url('/producer/products/'.$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('producer.products', $product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/producer/products/create') }}" class="btn btn-primary">Create Product</a>

@endsection