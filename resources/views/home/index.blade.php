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
                                    <li class="list-group-item">{{ $item->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://thegadgetflow.com/wp-content/uploads/2021/07/back-to-school-gadgets-06-1024x576.jpeg"
                                            class="d-block w-100 " alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://thegadgetflow.com/wp-content/uploads/2021/07/back-to-school-gadgets-09-1024x576.jpeg"
                                            class="d-block w-100 " alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://thegadgetflow.com/wp-content/uploads/2021/04/Anker-PowerConf-C300-Webcam-01-1200x900.jpeg"
                                            class="d-block w-100 " alt="...">
                                    </div>
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

        <div class="top-sale pt-3">
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
        <div class="product pt-4 pb-2" id="Product">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Products
                </h5>
                <a href="/product" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="product-item">
                <div class="row">
                    @foreach ($data_pro as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="smallCard">
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

                                    {{-- @if (Session::has('user'))
                                    <a href="/add-to-wishlist2/{{ $data_user->id }}/product/{{ $item->id }}"
                                        class="btn-sm btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="/login" class="btn-sm btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </a>
                                @endif --}}
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
