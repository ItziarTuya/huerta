@extends('layouts.navigation')

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

                            @include('partial.form_cp', ['name' => 'name', 'type' => 'text', 'label' => 'Name'])
                            @include('partial.form_cp', ['name' => 'email', 'type' => 'email', 'label' => 'E-Mail Address'])
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
