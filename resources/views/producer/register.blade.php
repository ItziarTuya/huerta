@extends('layouts.app')

@section('content')

        @component('partial.form_zero')
        @slot('title')
           <strong>Producer register</strong>
        @endslot

        @slot('action')
            {{ route('producer.register') }}
        @endslot
    @endcomponent

@endsection
