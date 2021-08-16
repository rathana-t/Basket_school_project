@extends('application')

@section('content')
    <style>
        .store_img img {
            width: 1140px;
            height: 250px;
            object-fit: cover;
        }

        .store_content .store-info p {
            margin: 0px;
            font-size: 14px;
        }

    </style>

    <div class="store_content">
        <div class="store-info pt-4">
            <div class="shadow-sm">
                <div class="container pb-4">
                    <h4>
                        {{ $store->store_name }}
                    </h4>
                    <div class="text-muted">
                        <p>
                            @if ($countProduct > 1)
                                {{ $countProduct }} products
                            @else
                                {{ $countProduct }} product
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container product">
            <div class="product-item pt-4 pb-3">
                <div class="row item">
                    @foreach ($product as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">

                                <div class="m-3">
                                    <a href="/product/product/{{ $item->id }}">
                                        <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                            class="img-fluid">
                                        <?php break; } ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
