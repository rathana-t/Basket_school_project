@extends('application')

@section('content')
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.insider.com/605cc0ee106eb50019d059ba?width=1136&format=jpeg" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.windowscentral.com/sites/wpcentral.com/files/styles/large/public/field/image/2021/02/razer-huntsman-v2-analog-lede.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i2.wp.com/techfortuner.com/wp-content/uploads/2021/03/best-gaming-laptops-with-strong-gpu.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

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
