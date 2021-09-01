@extends('application')

@section('content')
    @include('/home/components/navigation')

    {{-- <div class="container">
        <div class="product-height">
            <div class="product pt-3 ">
                <div class="mb-3">
                    <h5>
                        Products
                    </h5>
                </div>
                <div class="product-item">
                    <div class="row">
                        @foreach ($products as $item)
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
            </div>
        </div>
        {{ $products->links() }}
    </div> --}}

    <style>
        .duct .card1 .card {}

        .duct .card-footer {
            background-color: white !important;
        }

        .duct .card-body {
            padding-bottom: 0px !important;
        }

        .duct .btn-primary {
            color: #fff;
            width: 100px;
        }

        .duct h4 {
            font-size: 16px;
            color: #035ebe;
        }

        .duct .brand {
            height: 200px;
            overflow-y: auto;
        }

        .duct .brand::-webkit-scrollbar {
            height: 5px;
            width: 7px;
        }

        .duct .brand::-webkit-scrollbar-thumb {
            background: #afb3b6;
            border-radius: 5px;
        }

        .duct .form-control:focus {
            border-color: #a7a7a7;
            box-shadow: inset 0 1px 1px rgba(185, 185, 185, 0.075), 0 0 8px rgba(167, 167, 167, 0.6);
        }

        .duct .price label {
            font-size: 14px;
            padding-left: 5px;
        }

        .duct .apply button {
            width: 200px !important;
        }

    </style>

    <div class="container">
        <div class="duct">
            <div class="row">
                <div class="col-3">
                    <div class="card1">
                        <div class="card">
                            <div class="p-3">
                                <h4>
                                    Product
                                </h4>
                                <div class="pt-2">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="First name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-3">
                            </div>
                            <div class="p-3">
                                <h4>
                                    Brand
                                </h4>
                                <div class="pt-2">
                                    <?php
                                    $id = 1;
                                    ?>
                                    <div class="brand">
                                        @for ($i = 0; $i < 10; $i++)
                                            <div class="custom-control custom-checkbox mb-2 pr-3">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="{{ $i }}">
                                                        <label class="custom-control-label" for="{{ $i }}">
                                                            Hello
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <span class="badge badge-primary badge-pill">
                                                            12
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-3">
                            </div>
                            <div class="p-3 price">
                                <h4>
                                    Price
                                </h4>
                                <div class="pt-2">
                                    <div class="row">
                                        <div class="col">
                                            <label for="inputEmail4">Min</label>
                                            <input type="number" class="form-control" placeholder="$0">
                                        </div>
                                        <div class="col">
                                            <label for="inputEmail4">Max</label>
                                            <input type="number" class="form-control" placeholder="$9999">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-3">
                            </div>
                            <div class="p-3 price">
                                <h4>
                                    Sort
                                </h4>
                                <div class="pt-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                                <option>High-low</option>
                                                <option>Low-high</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-3">
                            </div>
                            <div class="p-3 apply">
                                <div class="text-center">
                                    <button class="btn btn-sm btn-primary">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="mt-2">
                        <p>
                            164 Items
                        </p>
                        <div class="border-bottom"></div>
                        <div class="row pt-3">
                            @for ($i = 0; $i < 9; $i++)
                                <div class="col-md-4">
                                    <div class="card mb-3 shadow-sm rounded">
                                        <div class="card-body">
                                            <img src="https://thegadgetflow.com/wp-content/uploads/2021/07/back-to-school-gadgets-06-1024x576.jpeg"
                                                class="img-fluid" alt="...">
                                            <div class="pt-2 pb-2">
                                                Monitor
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    $92
                                                </div>
                                                <button class="btn btn-sm btn-primary">
                                                    Order Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="mt-4">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
