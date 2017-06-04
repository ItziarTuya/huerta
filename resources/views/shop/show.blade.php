@extends('layouts.navigation')

@section('content')

    <div class="panel-heading">
        <h2>Show Product</h2>
        <hr>
    </div>

    <div class="container">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif

        <div class="row">
            <div class="col-md-5">
                <img src="{{ $product->getPictureUrl() }}" alt="" class="img-responsive img-thumbnail">
            </div>

            <div class="col-md-7">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Produced by: {{ $product->user->name }}</p>

                @if ($product->stock > 0)
                    <form method="POST" action="{{ url('shop/add/'.$product->id) }}" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <div class="input-group">
                                <input type="number" step="1" min="1" max="{{ $product->stock }}" id="quantity" name="quantity" class="form-control" value="1" required>
                                <div class="input-group-addon">u</div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">
                                Add to Cart
                            </button>
                        </div>
                    </form>
                @else
                    <div class="alert alert-warning">Out of Stock</div>
                @endif
            </div>
        </div>
    </div>
@endsection
