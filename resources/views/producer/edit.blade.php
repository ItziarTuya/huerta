@extends('layouts.navigation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-collapse">
                    <div class="panel-heading"><h2>Edit profile</h2></div>
                    <div class="panel-body">

                        @component('partial.form_zero')

                            @slot('action')
                                {{ url('user/edit') }}
                            @endslot

                            @include('partial.form_cp', ['name' => 'name', 'type' => 'text', 'label' => 'Name', 'value' => $user->name])
                            @include('partial.form_cp', ['name' => 'email', 'type' => 'email', 'label' => 'E-Mail Address', 'value' => $user->email])

                            @slot('submit')
                               Save
                            @endslot

                        @endcomponent

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection