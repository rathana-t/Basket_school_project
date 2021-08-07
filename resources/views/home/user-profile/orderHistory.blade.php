@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <h6 class="mt-4">History Order</h6>
        <div class="row mt-2 modify">
            <div class="col-md-3 border">
                <div class="card mt-2">
                    <p class="small-txt">ORDER PLACED</p>
                    <p class="big-txt">02 March, 2021</p>
                    <p class="small-txt">PRICE</p>
                    <p class="big-txt">$2.80</p>
                </div>
            </div>
            <div class="col-md-9 border">
                <div class="card mt-2">
                    <p class="small-txt">DELIVERED ON 03 MARCH, 2021</p>
                    <P class="orange-txt">Delivered</P>
                </div>
                <div class="row d-flex justify-content-between border-top">
                    <div class="col-md-3 col-sm-5 col">
                        <div class="card">
                            <img src="https://wallpaperaccess.com/full/3143683.jpg" class="img-fluid m-2">
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-7 col">
                        <div class="text-left mt-2">
                            <p class="small-txt">Product Name</p>
                            <p class="big-txt">Keyboard</p>
                            <p class="small-txt">Brand </p>
                            <p class="big-txt">ROG</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
