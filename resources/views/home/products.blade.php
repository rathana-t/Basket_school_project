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

        .duct img {
            height: 180px;
            width: 300px;
            object-fit: contain;
            border-radius: 5px;
        }

        .duct-height {
            min-height: 1000px;
        }

    </style>
    <div class="container">

        <div class="duct">
            <div class="row">
                <div class="col-3">
                    @include('/home/components/productSidebar')
                </div>
                <div class="col-9">
                    <div class="mt-2 duct-height">
                        <p>
                            {{ $productCount }} Items
                        </p>
                        <div class="border-bottom"></div>
                        <div class="row pt-3">
                            @for ($a = 1; $a <= $i; $a++)
                                @foreach ($products[$a] as $item)
                                    <div class="col-md-4">
                                        <div class="card mb-3 shadow-sm rounded">
                                            <div class="p-3">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                                    alt="" class="img-fluid">
                                                <div class="pt-2 pb-2">
                                                    <div class="b">
                                                        {{ $item->name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        ${{ $item->price }}
                                                    </div>
                                                    <button class="btn btn-sm btn-primary">
                                                        Order Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endfor

                        </div>
                    </div>
                    <div class="mt-4">
                        {{ $products[$i]->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
