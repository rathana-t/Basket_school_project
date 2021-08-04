@extends('application')

@section('content')
    <a href="" style="font-size: 30px">
        <i class="bi bi-person-circle"></i>
    </a>
    <div class="container">
        <div class="category mt-4">
            <div class="d-flex justify-content-between mb-3">
                <h5>
                    Category
                </h5>
                <a href="" class="btn btn-outline-primary">See all</a>
            </div>
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

    <div class="container">
        <div class="brand mt-4">
            <div class="mb-1 d-flex justify-content-between">
                <h5>
                    Brand
                </h5>
                <a href="" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="row">
                @foreach ($brand as $item)
                    <div class="col-6 col-md-2">
                        <div class="card">
                            <div class="p-3 text-center">
                                <img src="/images/brandImages/{{ $item->brand_img }}" alt="" class="img-fluid">
                                <div class="border-bottom pb-1"></div>
                                10 Prodoucts
                            </div>
                        </div>
                    </div>
                @endforeach
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
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="http://progearcambodia.com/wp-content/uploads/2019/10/mx-master-3.png" alt=""
                                class="img-fluid">
                            <div class="pl-3 pr-3 pb-3">
                                <div class="product_name">
                                    <a href="">
                                        Product name
                                    </a>
                                </div>
                                <div class="store_name">
                                    <a href="" class="text-muted">Store</a>
                                </div>
                                <div class="price">
                                    <a href="">$200</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="popular mt-4">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Recenlty Add
                </h5>
                <a href="" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="http://progearcambodia.com/wp-content/uploads/2019/10/mx-master-3.png" alt=""
                                class="img-fluid">
                            <div class="pl-3 pr-3 pb-3">
                                <div class="product_name">
                                    <a href="">
                                        Product name
                                    </a>
                                </div>
                                <div class="store_name">
                                    <a href="" class="text-muted">Store</a>
                                </div>
                                <div class="price">
                                    <a href="">$200</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="popular mt-4">
            <div class="mb-3 d-flex justify-content-between">
                <h5>
                    Products
                </h5>
                <a href="" class="btn btn-outline-primary">See all</a>
            </div>
            <div class="row">
                @for ($i = 0; $i < 20; $i++)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card mb-3">
                            <img src="http://progearcambodia.com/wp-content/uploads/2019/10/mx-master-3.png" alt=""
                                class="img-fluid">
                            <div class="pl-3 pr-3 pb-3">
                                <div class="product_name">
                                    <a href="">
                                        Product name
                                    </a>
                                </div>
                                <div class="store_name">
                                    <a href="" class="text-muted">Store</a>
                                </div>
                                <div class="price">
                                    <a href="">$200</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

@stop
