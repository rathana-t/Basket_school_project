@extends('application')

@section('content')

    <div class="container">
        <div class="deatail_page mt-5">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <img id="main" src="{{ asset('wing_thumbnail.png') }}" alt="" class="img-fluid p-4">
                    </div>
                    <div class="col-md-6">
                        <div class="p-4">
                            <h2>
                                Payment
                            </h2>
                            <form action="{{ url('order-product') }}" method="POST">
                                @csrf
                                <input type="hidden" name="payment" value="{{ $payment }}" id="">
                                <input type="hidden" name="address" value="{{ $address }}" id="">
                                <div class="card">
                                    <div class="p-3 price">
                                        <label for="exampleInputEmail1" class="mt-2">wing Account</label>
                                        <input type="number" class="form-control" name="wing_account" id=""
                                            placeholder="##########">
                                        <label for="exampleInputEmail1" class="mt-2">Year Of Birth</label>
                                        <input type="number" class="form-control" name="year_birth" id=""
                                            placeholder="YYYY">
                                        <label for="exampleInputEmail1" class="mt-2">PIN</label>
                                        <input type="number" class="form-control" name="pin" id="" placeholder="PIN...">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mt-3">
                                                Pay Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
