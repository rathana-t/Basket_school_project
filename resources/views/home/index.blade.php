@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container">

        <div class="header border-1">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush cs-list-group">
                                @foreach ($second_cate as $item)
                                    <li class="list-group-item">
                                        <a href="/smallcate/{{ $item->id }}">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($img as $item)
                                        <div class="carousel-item active">
                                            <img src="images/home/{{ $item->img1 }}" class="d-block w-100 " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/home/{{ $item->img2 }}" class="d-block w-100 " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/home/{{ $item->img3 }}" class="d-block w-100 " alt="...">
                                        </div>
                                    @endforeach

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-sale pt-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="row">
                    <div class="col-md-3 align-self-center">
                        <div class="card-body text-center">
                            <h1 class="mt-auto mb-auto">
                                Top 3 Products
                            </h1>
                        </div>
                    </div>
                    @foreach ($topSale as $item)
                        <div class="col-md-3 border-left">
                            <a href="/product/{{ $item->id }}">
                                <div class="card-body">
                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                        class="img-fluid">
                                    <div class="pt-3 pb-3 text-center">
                                        <div>
                                            Monitor
                                        </div>
                                        <div>
                                            $214
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="category pt-4 pb-2" id="Category">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
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
                                    <a href="category/{{ $item->id }}">
                                        <div class="shadow card-banner align-items-end background-img mb-4"
                                            style="background-image: url('/images/categoryImages/{{ $item->category_img }}')">
                                            <div class="caption m-4 w-100">
                                                <h5 class="text-white card-title">
                                                    {{ $item->name }}
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="category pt-4 pb-2" id="Subcategory">
            <div class="d-flex justify-content-between mb-3">
                <h5>
                    Subcategory
                </h5>
                <a href="/smallcate" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($second_cate as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="/smallcate/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product pt-4 pb-2" id="Product">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Best sale
                </h5>
            </div>
            <div class="product-item">
                <div class="row">
                    @foreach ($topSale as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-3">
                                    <a href="/product/product/{{ $item->id }}">
                                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                            class="img-fluid">
                                    </a>
                                </div>

                                <div class="border-top">
                                    <div class="pl-4 pr-4 pb-2 pt-2">
                                        <div class="product_name">
                                            <a href="/product/product/{{ $item->id }}">
                                                <div class="b">
                                                    {{ $item->name }}
                                                </div>
                                            </a>
                                        </div>
                                        <div class="price">
                                            <a href="/product/product/{{ $item->id }}">
                                                ${{ $item->price }}
                                            </a>
                                        </div>
                                        <div class="store_name">
                                            <a href="/store/{{ $item->seller_id }}" class="text-muted">
                                                {{ $item->store_name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
        <div class="pt-4 pb-2" id="Product">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Products
                </h5>
                <a href="/product" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="duct">
                <div class="row">
                    @foreach ($data_pro as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            {{-- <div class="card mb-3">
                                    <div class="m-3">
                                        <a href="/product/product/{{ $item->id }}">
                                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                                class="img-fluid">
                                        </a>
                                    </div>

                                    <div class="border-top">
                                        <div class="pl-4 pr-4 pb-2 pt-2">
                                            <div class="product_name">
                                                <a href="/product/product/{{ $item->id }}">
                                                    <div class="b">
                                                        {{ $item->name }}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="price">
                                                <a href="/product/product/{{ $item->id }}">
                                                    ${{ $item->price }}
                                                </a>
                                            </div>
                                            <div class="store_name">
                                                <a href="/store/{{ $item->seller_id }}" class="text-muted">
                                                    {{ $item->store_name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div> --}}
                            <div class="card mb-3 shadow-sm rounded">
                                <div class="p-3">
                                    <a href="/product/product/{{ $item->id }}">
                                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                            class="img-fluid">
                                        <div class="pt-2 pb-2">
                                            <div class="b">
                                                {{ $item->name }}
                                            </div>
                                            {{-- <div class="text-mute">
                                                {{ $item->store_name }}
                                            </div> --}}
                                        </div>
                                    </a>
                                </div>
                                <div class="card-footer text-right">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <a href="/product/product/{{ $item->id }}">
                                                ${{ $item->price }}
                                            </a>
                                        </div>
                                        <button class="btn btn-sm btn-primary">
                                            Order Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="brand pt-4 pb-4" id="Brand">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Brand
                </h5>
                <a href="/brand" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="brand-item">
                <div class="row">
                    @foreach ($brand as $item)
                        <div class="col-6 col-md-2">
                            <div class="card mb-3">
                                <div class="p-3 text-center">
                                    <a href="/brand/{{ $item->id }}">
                                        <img src="/images/brandImages/{{ $item->brand_img }}" alt=""
                                            class="img-fluid">
                                        <div class="border-bottom pb-2 pt-1"></div>
                                        @foreach ($result as $a)
                                            @if ($a->brand_id == $item->id)
                                                {{ $a->total_pro }}
                                            @endif
                                        @endforeach
                                        <span>Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
