@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-collapse">
                    <div class="panel-heading"><h2>Producer register</h2></div>
                    <div class="panel-body">

                        @component('partial.form_zero')

                            @slot('action')
                                {{ route('producer.register') }}
                            @endslot

                            @include('partial.form_cp_name')
                            @include('partial.form_cp_mail')
                            @include('partial.form_cp_pwd')

                            @slot('submit')
                               Register
                            @endslot

                        @endcomponent

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
