@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-collapse">
                    <div class="panel-heading"><h2>New product description</h2></div>
                    <div class="panel-body">

	        	@component('partial.form_zero')
                    @include('partial.form_product')

                        @slot('action')
                            {{ route('producer.product.store') }}
                        @endslot

                        @slot('submit')
                           Create
                        @endslot

                @endcomponent

            </div>
        </div>
    </div>

@endsection