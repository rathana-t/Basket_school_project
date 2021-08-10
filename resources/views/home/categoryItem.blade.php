@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container">
        <div class="categoryItem">
            <h1 class="mb-3 mt-4">
                {{ $cate_name->name }}
            </h1>
            @foreach ($second_cateItem as $item)
                <h5>
                    {{ $item->name }}
                </h5>
                <div class="row">
                    @foreach ($products as $product)
                        @if ($product->s_cat_id == $item->id)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="card mb-3">
                                    <div class="m-3">
                                        <a href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                            <?php foreach (json_decode($product->img_product)as $picture) { ?>
                                            <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                                class="img-fluid">
                                            <?php break; } ?>
                                        </a>
                                        <div class="product_name">
                                            <a href="/prodcut/product/{{ $item->id }}">
                                                {{ $product->name }}
                                            </a>
                                        </div>
                                        <div class="store_name">
                                            <a href="" class="text-muted">Store</a>
                                        </div>
                                        <div class="price">
                                            <a href="/prodcut/product/{{ $product->id }}">
                                                ${{ $product->price }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@stop
