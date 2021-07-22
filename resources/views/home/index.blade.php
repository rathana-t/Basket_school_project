@extends('application')

@section('content')
    <div class="top-sale">
        <div class="container hero-text">
            <h1>
                Top Sale
            </h1>
            <p>
                The Most Sale Last Week
            </p>
        </div>
    </div>

    <div class="container">
        <div class="recently-add">
            <div class="d-flex justify-content-between">
                <h1>
                    Recently add:
                </h1>
                <h1 class="see-all">
                    <a href="">See all</a>
                </h1>
            </div>
            <div class="row">
                <div class="horizontal">
                    @foreach ( $data_pro as $pro )
                        
                        <div class="col-md">
                            <div class="text-center m-0">
                                <a target="_blank" href="{{ route('detail',$pro->id) }}">
                                    <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                     <img src="imgProduct/{{ $picture }}" alt="" class="img-fluid">
                                    <?php break; } ?><br>
                                    <a href="">{{ $pro->name }}</a><br>
                                    <a href="">{{ $pro->price }} &nbsp;$</a>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="brand">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <h1>
                        Select Product by Brand
                    </h1>
                </div>
                <div class="col-md-4 text-right">
                    <h1>
                        <a href=""> See all</a>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="horizontal1">
                        @for ($i = 0; $i < 10; $i++)
                            <img src="/images/brand.svg" alt="" class="image-fluid">
                        @endfor
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="all-pro">
            <h1>
                All Products:
            </h1>
            <div class="row">
                @foreach ( $data_pro as $pro )
                    <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                        <div class="text-center">
                            <a target="_blank" href="{{ route('detail',$pro->id) }}">
                                <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                    <img src="imgProduct/{{ $picture }}" alt="" class="img-fluid">
                                   <?php break; } ?><br>
                                <a href="">{{ $pro->name }}</a><br>
                                <a href="">{{ $pro->price }} &nbsp;$</a>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center see-all-product">
                <a href="">See all product</a>
            </div>
        </div>
    </div>
@stop
