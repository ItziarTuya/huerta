@extends('layouts.app')

@section('content')

    @component('partial.form_zero')

        @slot('title')
           <strong>General register</strong>
        @endslot

        @slot('action')
            {{ route('register') }}
        @endslot

        @include('partial.form_cp_name')
        @include('partial.form_cp_mail')
        @include('partial.form_cp_pwd')

        @slot('submit')
           Register
        @endslot

    @endcomponent

@endsection