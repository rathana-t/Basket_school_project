@extends('application')

@section('content')
    @include('/home/components/navigation')

    <div class="container">
        <div class="product pt-3">
            <div class="mb-3 d-flex justify-content-between">
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
                                        <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                            class="img-fluid">
                                        <?php break; } ?>
                                    </a>
                                    <div class="product_name">
                                        <a href="/product/product/{{ $item->id }}">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                    <div class="store_name">
                                        <a href="" class="text-muted">Store</a>
                                    </div>

                                    <div class="price">
                                        <a href="/product/product/{{ $item->id }}">
                                            ${{ $item->price }}
                                        </a>
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
