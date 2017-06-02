@extends('layouts.navigation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-collapse">
                    <div class="panel-heading"><h2>New product description</h2></div>
                    <div class="panel-body">

	        	@component('partial.form_zero')

                        @slot('action')
                            {{ route('producer.product.store') }}
                        @endslot

                        @slot('enctype')
                            multipart/form-data
                        @endslot

                        @include('partial.form_cp', ['name' => 'name', 'type' => 'text', 'label' => 'Name'])

                        @include('partial.form_cp', ['name' => 'description', 'type' => 'text', 'label' => 'Description'])

                        @include('partial.form_cp', ['name' => 'category', 'type' => 'text', 'label' => 'Category'])

                        @include('partial.form_cp', ['name' => 'picture', 'type' => 'file', 'label' => 'Picture'])

                        @include('partial.form_cp', ['name' => 'price', 'type' => 'number', 'min' => '1', 'label' => 'Price'])

                        @include('partial.form_cp', ['name' => 'stock', 'type' => 'number', 'min' => '1', 'label' => 'Stock (quantity)'])

                        @slot('submit')
                           Create
                        @endslot

                @endcomponent

            </div>
        </div>
    </div>

@endsection