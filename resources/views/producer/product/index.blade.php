@extends('layouts.app')

@section('content')

	<h1>Productos</h1>
	@foreach ($products as $product)
		<h3>{{ $product->name }}</h3>
	@endforeach
	
@endsection