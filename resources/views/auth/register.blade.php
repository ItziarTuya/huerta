@extends('layouts.app')

@section('content')

        @component('partial.form_zero')
        @slot('title')
           <strong>General register</strong>
        @endslot

        @slot('action')
            {{ route('register') }}
        @endslot
    @endcomponent

@endsection