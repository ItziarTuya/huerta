@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Perfil Productor</h1>
	<h3>{{ $user->name }}</h3>
	<a class="btn btn-default" href="{{ route('productCreate') }}">Crear Producto</a>
</div>
@endsection