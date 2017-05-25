@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Crear Producto</h1>
	<form class="form-horizontal" role="form" method="POST" action="{{ route('producer.product.store') }}">
	    {{ csrf_field() }}

	    <div class="form-group">
	        <label for="name" class="col-md-4 control-label">Nombre</label>

	        <div class="col-md-6">
	            <input id="name" type="text" class="form-control" name="name" required>
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-md-6 col-md-offset-4">
	            <button type="submit" class="btn btn-primary">
	                Crear
	            </button>
	        </div>
	    </div>
	</form>
</div>
@endsection