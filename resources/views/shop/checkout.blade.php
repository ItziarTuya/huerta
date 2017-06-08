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
            <form class="form-horizontal">
                <div class="form-group">

                    <div class="userDetails">
                        <div class="form-group">
                            <h4 class="col-sm-5 col-sm-offset-3">Personal details</h4>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Full name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="John Doe Smith">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-4 control-label">Full Address</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="Main Street 5. 07013 - Sacramento. California">
                            </div>
                        </div>
                    </div>

                    <div class="paymentDetails" style="padding-top: 20px;">
                        <div class="form-group">
                            <h4 class="col-sm-5 col-sm-offset-3">Payment details</h4>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <label class="radio-inline">
                                    <input type="radio" name="visa"> Visa
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="mastercard"> Mastercard
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="american"> American Express
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardholder" class="col-sm-4 control-label">Card Holder</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="John Doe Smith">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardNum" class="col-sm-4 control-label">Card Number</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="4485 5843 4437 2700">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardNum" class="col-sm-4 control-label">CVC</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="585">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exp" class="col-sm-4 control-label">Valid thru</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="04/18">
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