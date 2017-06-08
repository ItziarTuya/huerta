@extends('layouts.navigation')

@section('content')

     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-collapse">
                <div class="panel-heading"><h2>Checkout</h2></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="POST" action="{{ url('shop/cart/checkout/'.$shoppingCart->id) }}">
                {{ csrf_field() }}
                <div class="form-group">

                    <div class="userDetails">
                        <div class="form-group">
                            <h4 class="col-sm-5 col-sm-offset-3">Personal details</h4>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-4 control-label">Full name</label>
                            <h3 class="col-sm-5">{{ $shoppingCart->user->name }}</h3>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-4 control-label">Full Address</label>
                            <div class="col-sm-5">
                                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="Main Street 5. 07013 - Sacramento. California">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="paymentDetails" style="padding-top: 20px;">
                        <div class="form-group">
                            <h4 class="col-sm-5 col-sm-offset-3">Payment details</h4>
                        </div>
                        <div class="form-group {{ $errors->has('cardholder') ? ' has-error' : '' }}">
                            <label for="cardholder" class="col-sm-4 control-label">Card Holder</label>
                            <div class="col-sm-5">
                                <input type="text" id="cardholder" name="cardholder" class="form-control" value="{{ old('cardholder') }}" placeholder="John Doe Smith">
                                @if ($errors->has('cardholder'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cardholder') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('cardNum') ? ' has-error' : '' }}">
                            <label for="cardNum" class="col-sm-4 control-label">Card Number</label>
                            <div class="col-sm-5">
                                <input type="text" id="cardNum" name="cardNum" value="{{ old('cardNum') }}" class="form-control" placeholder="4485 5843 4437 2700">
                                @if ($errors->has('cardNum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cardNum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('cardcvc') ? ' has-error' : '' }}">
                            <label for="cardcvc" class="col-sm-4 control-label">CVC</label>
                            <div class="col-sm-5">
                                <input type="text" id="cardcvc" name="cardcvc" value="{{ old('cardcvc') }}" class="form-control" placeholder="585">
                                @if ($errors->has('cardcvc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cardcvc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('cardDate') ? ' has-error' : '' }}">
                            <label  for="cardDate" class="col-sm-4 control-label">Valid thru</label>
                            <div class="col-sm-5">
                                <input type="date" id="cardDate" name="cardDate" value="{{ old('cardDate') }}" class="form-control" placeholder="04/18">
                                @if ($errors->has('cardDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cardDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 col-sm-offset-4">
                                <button type="submit" class="btn btn-block btn-primary"> Checkout </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection