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
                        <a href="/category" class="d-flex align-items-center btn btn btn-outline-secondary">See all</a>
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
                                        @if (Session::has('user'))
                                            <form action="{{ route('add_to_cart') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $data_user->id }}" name="user_id">
                                                <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                <input type="hidden" value="{{ $item->price }}" name="total">
                                                <input type="hidden" class="form-control form-control-sm" value="1"
                                                    id="quantity" hidden placeholder="Qty" required name="quantity" min="1"
                                                    max="{{ $item->stock }}" style="width: 170px">
                                                <input hidden type="checkbox" checked name="redirect" id="">
                                                <button class="btn btn-sm btn-primary">
                                                    Order Now
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ url('login') }}">
                                                <button class="btn btn-sm btn-primary">
                                                    Order Now
                                                </button>
                                            </a>
                                        @endif
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
