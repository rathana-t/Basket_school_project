@extends('application')

@section('content')
    @include('/home/components/navigation')

    <div class="container">
        <div class="product pt-3">
            <h5>
                {{ $brand_id->name }}
            </h5>
            <div class="product-item">
                <div class="row mt-3">
                    @foreach ($product as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-3">
                                    <a href="/brand/{{ $brand_id->id }}/product/{{ $item->id }}">
                                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                            class="img-fluid">
                                    </a>
                                </div>

                                <div class="border-top">
                                    <div class="pl-4 pr-4 pb-2 pt-2">
                                        <div class="product_name">
                                            <a href="/brand/{{ $brand_id->id }}/product/{{ $item->id }}">
                                                {{ $item->name }}
                                            </a>
                                        </div>
                                        <div class="price">
                                            <a href="/brand/{{ $brand_id->id }}/product/{{ $item->id }}">
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
@stop
