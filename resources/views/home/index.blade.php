@extends('application')

@section('content')
    <div class="container">
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
                <div class="col-md-12">
                    <div class="horizontal1">
                        @for ($i = 0; $i < 20; $i++)
                            <img src="/images/brand.svg" alt="" class="image-fluid mr-2">
                        @endfor
                    </div>
                </div>
            </div>
            <div class="border-bottom mt-2"></div>
        </div>

        <div class="category pt-3">
            <div>
                Category
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Computer Mouse</p>
                            <div class="text-center">
                                <img src="https://i.insider.com/605cc0ee106eb50019d059ba?width=1136&format=jpeg" alt=""
                                    class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Computer KeyBoard</p>
                            <div class="text-center">
                                <img src="https://www.windowscentral.com/sites/wpcentral.com/files/styles/large/public/field/image/2021/02/razer-huntsman-v2-analog-lede.jpg"
                                    alt="" class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Monitor</p>
                            <div class="text-center">
                                <img src="https://i.pcmag.com/imagery/reviews/05R7ApclhnnV0xTx4drU4BE-1.1617290389.fit_lpad.size_625x365.jpg"
                                    alt="" class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Chair and Table</p>
                            <div class="text-center">
                                <img src="https://cdn.mos.cms.futurecdn.net/chg3AGHkpwVFcZeK26TKuA.jpg" alt=""
                                    class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Chair and Table</p>
                            <div class="text-center">
                                <img src="https://store.hp.com/app/assets/images/uploads/prod/how-to-build-gpu-mining-rig-hero1532382543025.jpg"
                                    alt="" class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Chair and Table</p>
                            <div class="text-center">
                                <img src="https://cdn.mos.cms.futurecdn.net/chg3AGHkpwVFcZeK26TKuA.jpg" alt=""
                                    class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                    @foreach ($data_pro as $pro)
                        <div class="col-md">
                            <div class="text-center m-0">
                                <a target="_blank" href="{{ route('detail', $pro->id) }}">
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
        {{-- <div class="all-pro">
            <h1>
                All Products:
            </h1>
            <div class="row">
                @foreach ($data_pro as $pro)
                    <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                        <div class="text-center">
                            <a target="_blank" href="{{ route('detail', $pro->id) }}">
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
        </div> --}}
    </div>
@stop
