@extends('application')

@section('content')
    @include('/home/components/navigation')
    <style>
        .limit_text_new {
            display: block;
            width: 300px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;

        }

    </style>
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
                            @if (Session::has('user'))
                                @if ($data_user->type == 'admin')
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleCaptions" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <form action="{{ route('qqq') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="carousel-item active">
                                                    <img src="images/home/{{ $homeImg->img1 }}" class="d-block w-100 "
                                                        alt="...">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <input class="form-control-file" type="file" name="img1"
                                                            onchange="javascript:this.form.submit();">
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="images/home/{{ $homeImg->img2 }}" class="d-block w-100 "
                                                        alt="...">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <input class="form-control-file" type="file" name="img2"
                                                            onchange="javascript:this.form.submit();">
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="images/home/{{ $homeImg->img3 }}" class="d-block w-100 "
                                                        alt="...">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <input class="form-control-file" type="file" name="img3"
                                                            onchange="javascript:this.form.submit();">
                                                    </div>
                                                </div>
                                            </form>
                                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="images/home/{{ $homeImg->img1 }}" class="d-block w-100 "
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="images/home/{{ $homeImg->img2 }}" class="d-block w-100 "
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="images/home/{{ $homeImg->img3 }}" class="d-block w-100 "
                                                    alt="...">
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
                                @endif
                            @else
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="images/home/{{ $homeImg->img1 }}" class="d-block w-100 " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/home/{{ $homeImg->img2 }}" class="d-block w-100 " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/home/{{ $homeImg->img3 }}" class="d-block w-100 " alt="...">
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
                            @endif
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
                                <div class="pt-3 pb-3 pl-3 pr-3">
                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                        class="img-fluid">
                                    <div class="pt-3 pb-3 text-center">
                                        <div class="limit_text_new">
                                            {{ $item->name }}
                                        </div>
                                        <div>
                                            $ {{ $item->price }}
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
                <div class="pl-3 pr-3 pt-3 pb-3">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>
                            Category
                        </h5>
                        <a href="/category" class="d-flex align-items-center btn btn btn-outline-secondary">See all</a>
                    </div>
                    <div class="category-item">
                        <div class="row mt-3">
                            @foreach ($cate as $item)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="category/{{ $item->id }}">
                                        <div class="shadow card-banner align-items-end background-img"
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

        <div class="pt-4" id="Product">
            <div class="mb-3 d-flex justify-content-between duct-a">
                <h5>
                    Products
                </h5>
                <a href="/product" class="d-flex align-items-center btn btn btn-outline-secondary">See all</a>
            </div>
            <div class="duct">
                <div class="row">
                    @foreach ($data_pro as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3 shadow-sm rounded border-0">
                                <div class="pt-2 pb-2 pl-3 pr-3">
                                    <a href="/product/product/{{ $item->id }}">
                                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                            class="img-fluid">
                                        <div class="pt-2 pb-2">
                                            <div class="b">
                                                {{ $item->name }}
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/store/{{ $item->sId }}">
                                        <div class="store-name">
                                            {{ $item->store_name }}
                                        </div>
                                    </a>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <a href="/product/product/{{ $item->id }}">
                                                ${{ $item->price }}
                                            </a>
                                        </div>
                                        <div class="row">

                                            @if (Session::has('user'))
                                                <div class="col">
                                                    <form action="{{ route('add_to_cart') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <input type="hidden" value="{{ $data_user->id }}" name="user_id"> --}}
                                                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                        {{-- <input type="hidden" value="{{ $item->price }}" name="total"> --}}
                                                        {{-- <input type="hidden" class="form-control form-control-sm" value="1"
                                                        id="quantity" hidden placeholder="Qty" required name="quantity" min="1"
                                                        max="{{ $item->stock }}" style="width: 170px"> --}}
                                                        <input hidden type="checkbox" checked name="redirect" id="">
                                                        <button class="btn btn-sm btn-primary">
                                                            Order Now
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <button type="button" value="{{ $item->id }}"
                                                        class="btn btn-sm submit_wish_list btn-danger">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-heart"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="col">

                                                    <a href="{{ url('login') }}">
                                                        <button class="btn btn-sm btn-primary">
                                                            Order Now
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col">

                                                    <a href="{{ url('login') }}">
                                                        <button class="btn btn-sm btn-danger">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="brand pt-2 pb-4" id="Brand">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Brand
                </h5>
                <a href="/brand" class="d-flex align-items-center btn btn btn-outline-secondary">See all</a>
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
