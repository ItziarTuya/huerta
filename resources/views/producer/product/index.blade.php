@extends('layouts.app')

@section('content')

	<h1>Productos</h1>
	@foreach ($products as $product)
		<h3>{{ $product->name }}</h3>
        <a href="{{ url('/producer/products/'.$product->id) }}">Show</a>
	@endforeach
	
@endsection