@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container product">
        <div class="product-item pt-3">
            @foreach ($second_cateItem as $item)
                <div class="pb-2">
                    <h5 class="mb-3">
                        {{ $item->name }}
                    </h5>
                    <div class="row">
                        @foreach ($products as $product)
                            @if ($product->s_cat_id == $item->id)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="card mb-3">
                                        <div class="m-3">
                                            <a href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $product->img_product }}"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </div>

                                        <div class="border-top">
                                            <div class="pl-4 pr-4 pb-2 pt-2">
                                                <div class="product_name">
                                                    <a href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                                <div class="price">
                                                    <a href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                                        ${{ $product->price }}
                                                    </a>
                                                </div>
                                                <div class="store_name">
                                                    <a href="/store/{{ $product->seller_id }}" class="text-muted">
                                                        {{ $product->store_name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
