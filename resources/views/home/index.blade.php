@extends('application')

@section('content')
    <div class="index-page">
        <a href="" style="font-size: 30px">
            <i class="bi bi-person-circle"></i>
        </a>
        <div class="container">
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
        </div>

        <div class="container">
            <div class="brand mt-4">
                <div class="mb-1 d-flex justify-content-between">
                    <h5>
                        Brand
                    </h5>
                    <a href="" class="btn btn-outline-primary">See all</a>
                </div>
                <div class="brand-item">
                    <div class="row">
                        @foreach ($brand as $item)
                            <div class="col-6 col-md-2">
                                <div class="card">
                                    <div class="p-3 text-center">
                                        <img src="/images/brandImages/{{ $item->brand_img }}" alt="" class="img-fluid">
                                        <div class="border-bottom pb-1"></div>
                                        <p>10 Prodoucts</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="popular mt-4">
                <div class="mb-3 d-flex justify-content-between">
                    <h5>
                        Popular products
                    </h5>
                    <a href="" class="btn btn-outline-primary">See all</a>
                </div>
                <div class="popular-item">
                    <div class="row">
                        @foreach ($data_pro as $pro)
                            @if ($pro->s_cat_id == $item->id)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="{{ route('detail', $pro->id) }}">

                                        <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                                        <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid">
                                        <?php break; } ?>
                                        <div class="pl-3 pr-3 pb-3">
                                            <div class="product_name">
                                                <a>{{ $pro->name }}</a>
                                            </div>
                                            <div class="store_name">
                                                <a href="" class="text-muted">Store</a>
                                            </div>
                                            <div class="price">
                                                <a href="">$ {{ $pro->price }}</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif

                        @endforeach

                    </div>
                </div>
            </div>

            <div class="popular mt-4">
                <div class="mb-3 d-flex justify-content-between">
                    <h5>
                        Recenlty Add
                    </h5>
                    <a href="" class="btn btn-outline-primary">See all</a>
                </div>
                <div class="popular-item">
                    <div class="row">
                        @foreach ($recently_product as $item)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="mb-3">
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
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="popular mt-4">
                <div class="mb-3 d-flex justify-content-between">
                    <h5>
                        Products
                    </h5>
                    <a href="" class="btn btn-outline-primary">See all</a>
                </div>
                <div class="popular-item">
                    <div class="row">
                        @foreach ($data_pro as $item)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class=" mb-3">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
