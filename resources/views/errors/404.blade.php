@extends('layouts.app')

 @section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                   Orchard
                </div>

               <div class="alert alert-warning" style="padding-top: 20px;">
                    <p><strong> Sorry </strong> Page not found</p>
               </div>

                <div class="links" style="padding-top: 20px;">
                    <a href="{{ route('welcome') }}">Home</a>
                </div>
            </div>
        </div>

 @endsection