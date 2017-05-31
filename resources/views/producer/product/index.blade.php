@extends('layouts.app')

@section('content')

	<h1>Productos</h1>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/producer/products/create') }}" class="btn btn-lg btn-info">Create Product</a>

@endsection