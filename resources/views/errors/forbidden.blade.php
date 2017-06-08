@extends('layouts.app')

 @section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                   Orchard
                </div>

               <div class="alert alert-danger" style="padding-top: 20px;">
                    <p><strong> You're not allow to see this content! </strong></p>
               </div>

                <div class="links" style="padding-top: 20px;">
                    <a href="{{ route('welcome') }}">Home</a>
                </div>
            </div>
        </div>

 @endsection