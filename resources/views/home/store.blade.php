@extends('application')

@section('content')
    <style>
        .store_img img {
            width: 1140px;
            height: 250px;
            object-fit: cover;
        }

        .store_content .store-info p {
            margin: 0px;
            font-size: 14px;
        }

    </style>
    <div class="container">
        <div class="store_img text-center">
            <img src="https://media.wired.com/photos/6081f4280c9b5877078878e2/16:9/w_2399,h_1349,c_limit/business_plaintext_apple_1313768378.jpg"
                alt="" class="img-fluid">
        </div>
        <div class="store_content">
            <div class="store-info border-bottom mb-4 mt-4">
                <h4>
                    Store_name
                </h4>
                <div class="text-muted">
                    <p>
                        070425858
                    </p>
                    <p>
                        Joined .....
                    </p>
                    <p>
                        Location:.....
                    </p>
                </div>
            </div>
            <div class="">
                <h1 class="text-center">
                    All product in ..
                </h1>
                <div class="row item">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="text-center">
                                <img src="https://media.wired.com/photos/6081f4280c9b5877078878e2/16:9/w_2399,h_1349,c_limit/business_plaintext_apple_1313768378.jpg"
                                    alt="" class="img-fluid">
                                <p>
                                    Product name
                                </p>
                                <p>
                                    Price 100
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@stop
