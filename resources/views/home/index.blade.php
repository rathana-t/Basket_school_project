@extends('application')

@section('content')
    <div class="container">
        <div class="brand mt-4">
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
            <div class="horizontal1">
                @for ($i = 0; $i < 20; $i++)
                    <img src="/images/brand.svg" alt="" class="image-fluid mr-5">
                @endfor
            </div>
            <div class="border-bottom mt-2"></div>
        </div>

        <div class="category mt-4">
            <h1>
                Category
            </h1>
            <div class="row mt-3">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Laptop</p>
                            <div class="text-center">
                                <img src="https://i2.wp.com/techfortuner.com/wp-content/uploads/2021/03/best-gaming-laptops-with-strong-gpu.jpg"
                                    alt="" class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Pc Parts</p>
                            <div class="text-center">
                                <img src="https://press-start.com.au/wp-content/uploads/2020/08/Amazon-PC-Parts-1.jpg"
                                    alt="" class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Peripherals</p>
                            <div class="text-center">
                                <img src="https://www.gadgetnutz.com/wp-content/uploads/2021/01/hyperx_ces2021.jpg" alt=""
                                    class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-3">
                            <p>Network</p>
                            <div class="text-center">
                                <img src="https://cdn.mos.cms.futurecdn.net/yL7k3fYHWZE98det6kuQXY.jpg" alt=""
                                    class="img-fluid mb-2">
                            </div>
                            <a href="">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cate-item">
            <div class="laptop mt-4">
                <div class="d-flex justify-content-between">
                    <h1>
                        Laptop
                    </h1>
                    <h1 class="see-all">
                        <a href="">See all</a>
                    </h1>

                </div>
                <div class="border-bottom mt-2"></div>
                <div class="row mt-3">
                    <div class="horizontal">
                        @foreach ($data_pro as $pro)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="text-center">
                                    <a target="_blank" href="{{ route('detail', $pro->id) }}">
                                        <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                        <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid mb-1">
                                        <?php break; } ?><br>
                                        <a>{{ $pro->name }}</a>
                                        <div>
                                            <a>{{ $pro->price }} &nbsp;$</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="pc-part mt-4">
                <div class="d-flex justify-content-between">
                    <h1>
                        PC Parts
                    </h1>
                    <h1 class="see-all">
                        <a href="">See all</a>
                    </h1>
                </div>
                <div class="border-bottom mt-2"></div>
                <div class="row mt-3">
                    <div class="horizontal">
                        @foreach ($data_pro as $pro)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="text-center">
                                    <a target="_blank" href="{{ route('detail', $pro->id) }}">
                                        <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                        <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid mb-1">
                                        <?php break; } ?><br>
                                        <a>{{ $pro->name }}</a>
                                        <div>
                                            <a>{{ $pro->price }} &nbsp;$</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="peripherals mt-4">
                <div class="d-flex justify-content-between">
                    <h1>
                        Peripherals
                    </h1>
                    <h1 class="see-all">
                        <a href="">See all</a>
                    </h1>
                </div>
                <div class="border-bottom mt-2"></div>
                <div class="row mt-3">
                    <div class="horizontal">
                        @foreach ($data_pro as $pro)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="text-center">
                                    <a target="_blank" href="{{ route('detail', $pro->id) }}">
                                        <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                        <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid mb-1">
                                        <?php break; } ?><br>
                                        <a>{{ $pro->name }}</a>
                                        <div>
                                            <a>{{ $pro->price }} &nbsp;$</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="network mt-4">
                <div class="d-flex justify-content-between">
                    <h1>
                        Network
                    </h1>
                    <h1 class="see-all">
                        <a href="">See all</a>
                    </h1>
                </div>
                <div class="border-bottom mt-2"></div>
                <div class="row mt-3">
                    <div class="horizontal">
                        @foreach ($data_pro as $pro)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="text-center">
                                    <a target="_blank" href="{{ route('detail', $pro->id) }}">
                                        <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                        <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid mb-1">
                                        <?php break; } ?><br>
                                        <a>{{ $pro->name }}</a>
                                        <div>
                                            <a>{{ $pro->price }} &nbsp;$</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
