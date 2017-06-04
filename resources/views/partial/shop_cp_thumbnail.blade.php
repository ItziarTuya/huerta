    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="img-container">
                <img class="img-fixed" src="{{ $product->getPictureUrl() }}" alt="{{ $product->name }}">
            </div>
            <div class="caption">

                <h3>{{ $product->name }}</h3>
                <h5>{{ $product->category }}</h5>
                <p> {{ $product->description }}</p>

                <div class="clearfix">
                    <p>{{ $product->price }}</p>
                    <p><a href="{{ url('shop/show/'.$product->id) }}" class="btn btn-primary pull-right" role="button">Show</a></p>
                </div>
            </div>
        </div>
    </div>