@extends('layouts.app')

 @section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                   Orchard
                </div>

                <div class="slogan">
                    "Evolve with us the new way <br>
                    of shopping fresh fruits and vegetables"
                </div>

                <div class="links">
                    <p class="init">Sing up as:</p>
                    <a href="{{ route('producer.register') }}">Producer</a>
                    <a href="{{ route('register') }}">Customer</a>
                </div>

                <div class="clearfix links" style="padding-top: 20px;">
                    <a href="{{ url('/login') }}">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a>
                </div>

            </div>
        </div>

 @endsection