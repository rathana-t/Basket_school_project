@extends('application')


@section('content')
    <div class="container mt-5">
        <div class="order">
            <h1 class="text-center mb-5">
                This order page
            </h1>
            @for ($i = 0; $i < 5; $i++)
                <div class="order mb-4">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-around">
                                        <p class="active">Pending</p>
                                        ---->
                                        <p class="text-muted">Processing</p>
                                        ---->
                                        <p class="text-muted">Delivered</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-right">
                                            <img src="https://www.gannett-cdn.com/presto/2021/01/20/USAT/3a57a588-b05d-4670-bae1-5c13937eda3e-delivery-hero.jpg"
                                                alt="..." class="img-fluid">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title">Product name</h5>
                                            <p class="card-text">Price: 84$</p>
                                            <p class="card-text"><small class="text-muted">Order 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@stop
