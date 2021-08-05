@extends('application')

@section('content')
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/logout" method="GET">
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="mt-5">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Logout
                </button>
            </div>
            <a href="{{ url('/sellerLogInPage') }}">Register a Seller</a>
        </div>
    </div>
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
    <style>
        /* vitou */
        .modify .card {
            border: none;
        }

        .modify .small-txt {
            font-size: 11px;
            font-weight: normal;
        }

        .modify .big-txt {
            font-family: 'Poppins';
            font-size: 17px;
            font-weight: bold;
        }

        .modify .orange-txt {
            font-family: 'poppins';
            color: orange;
            font-size: 17px;
            font-weight: bold 100px;
        }

        .modify img {
            object-fit: cover;
            border-radius: 5px;
        }

        .con-color {
            background-color: rgb(240, 240, 240);
        }

        .modified .navbar {
            background-color: transparent !important;
        }

        .modified .navbar a {
            color: #000000 !important;
        }

        .modified .navbar a img {
            color: #000000 !important;
        }

        .modified .nav-item {
            margin-left: 30px;
        }

    </style>


@endsection
