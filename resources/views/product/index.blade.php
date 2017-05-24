@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Productos</h1>
	@foreach ($products as $product)
		<h3>{{ $product->name }}</h3>
	@endforeach
</div>
@endsection