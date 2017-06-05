@extends('layouts.navigation')

@section('content')

    <div class="container">
        <div class="row aligner">
            <div class="col-md-8">
                <div class="panel panel-collapse">
                    <div class="panel-heading"><h2>Edit product</h2></div>
                    <div class="panel-body">

                        @component('partial.form_zero')
                                @slot('method')
                                    PUT
                                @endslot
                                @slot('enctype')
                                    multipart/form-data
                                @endslot
                                @slot('action')
                                    {{ url('producer/products', [$product->id]) }}
                                @endslot

                                @include('partial.form_cp', ['name' => 'name', 'type' => 'text', 'label' => 'Name', 'value' => $product->name])

                                @include('partial.form_cp', ['name' => 'description', 'type' => 'text', 'label' => 'Description', 'value' => $product->description])

                                @include('partial.form_cp', ['name' => 'category', 'type' => 'text', 'label' => 'Category', 'value' => $product->category])

                                @include('partial.form_cp_optional', ['name' => 'picture', 'type' => 'file', 'label' => 'Image', 'value' => $product->picture])

                                @include('partial.form_cp', ['name' => 'price', 'type' => 'number', 'min' => '1', 'label' => 'Price', 'value' => $product->price])

                                @include('partial.form_cp', ['name' => 'stock', 'type' => 'number', 'min' => '1', 'label' => 'Stock (quantity)', 'value' => $product->stock])

                                @slot('submit')
                                   Update
                                @endslot

                        @endcomponent

                    </div>

                </div>
            </div>

            <div class="col-md-2">

                <img src="{{ $product->getPictureUrl() }}" alt="" class="img-responsive img-thumbnail">

            </div>
        </div>
    </div>

@endsection