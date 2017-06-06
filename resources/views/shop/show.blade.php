@extends('layouts.shop')

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

            <div class="col-md-6 col-md-offset-1" style="padding-top: 20px;">
                <h2 style="padding-bottom: 20px;">
                    {{ $product->name }}
                    <span class="pull-right">{{ $product->getFormatedPrice() }}</span>
                </h2>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <p class="form-control-static" style="padding-bottom: 20px;">{{ $product->description }}</p>
                    <label for="producer" class="control-label">Produced by</label>
                    <p class="form-control-static" style="padding-bottom: 20px;">{{ $product->user->name }}</p>

                @if ($product->stock > 0)
                    <form method="POST" action="{{ url('shop/add/'.$product->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <div class="input-group" style="padding-bottom: 20px;">
                                <input type="number" step="1" min="1" max="{{ $product->stock }}" id="quantity" name="quantity" class="form-control" value="1" required>
                                <div class="input-group-addon">u</div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success pull-right">
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
