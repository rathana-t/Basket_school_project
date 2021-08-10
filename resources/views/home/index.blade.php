@extends('application')

@section('content')
    @include('/home/components/navigation')
    <style>
        .header .carousel img {
            height: 300px;
            object-fit: cover;
            position: relative;
        }

        .header .carousel .carousel-caption {
            background-color: aliceblue;
            color: black;
            height: 50px;
        }

        .header .carousel .hero-text {
            text-align: center;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
        }

        .header .carousel .hero-text h1 {
            padding: 5px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
    </style>

    <div class="container">
        <div class="header mt-3">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @foreach ($randSecond_cate as $item)
                            <li class="list-group-item">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="http://127.0.0.1:8000/images/imgProduct/61055d265e740dell-ultrasharp-27-4k-premiercolor-monitor-front.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="hero-text">
                                    <h1>Top sale product</h1>
                                    <a href="" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="popular mt-4">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Products
                </h5>
                <a href="/product" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="popular-item">
                <div class="row">
                    @foreach ($data_pro as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-2">
                                    <a href="/product/{{ $item->id }}">
                                        <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                            class="img-fluid">
                                        <?php break; } ?>
                                    </a>
                                    <div class="pl-3 pr-3 pb-3">
                                        <div class="product_name">
                                            <a href="/product/{{ $item->id }}">
                                                {{ $item->name }}
                                            </a>
                                        </div>
                                        <div class="store_name">
                                            <a href="" class="text-muted">Store</a>
                                        </div>
                                        <div class="price">
                                            <a href="/product/{{ $item->id }}">
                                                ${{ $item->price }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="category mt-4">
            <div class="d-flex justify-content-between mb-3">
                <h5>
                    Category
                </h5>
                <a href="/category" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($cate as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card shadow-sm">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="category/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/categoryImages/{{ $item->category_img }}" alt=""
                                                class="img-fluid mb-2">
                                        </div>
                                    </a>
                                    <a href="category/{{ $item->id }}">See all</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="category mt-4">
            <div class="d-flex justify-content-between mb-3">
                <h5>
                    Subcategory
                </h5>
                <a href="/category" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($second_cate as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card shadow-sm mb-2">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="category/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                                                class="img-fluid mb-2">
                                        </div>
                                    </a>
                                    <a href="category/{{ $item->id }}">See all</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

    <div style="height: 250px; background-color: #f8f9fa;">
        <div class="container d-flex justify-item-center">
            <div class="brand mt-4">
                <div class="mb-1 d-flex justify-content-between">
                    <h5>
                        Brand
                    </h5>
                    <a href="/brand" class="btn btn-outline-primary">See all</a>
                </div>
                <div class="brand-item">
                    <div class="row">
                        @foreach ($brand as $item)
                            <div class="col-6 col-md-2">
                                <div class="card">
                                    <div class="p-3 text-center">
                                        <a href="/brand/{{ $item->id }}">
                                            <img src="/images/brandImages/{{ $item->brand_img }}" alt=""
                                                class="img-fluid">
                                            <div class="border-bottom pb-1"></div>
                                            @foreach ($result as $a)
                                                @if ($a->brand_id == $item->id)
                                                    <p>{{ $a->total_pro }}
                                                @endif
                                            @endforeach
                                            Products</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
