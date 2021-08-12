@extends('application')

@section('content')
    @include('/home/components/navigation')

    <div class="container">
        <div class="categoryItem pt-3">
            <h5>
                {{ $smallCateName->name }}
            </h5>
            <div class="cate-item">
                <div class="row mt-3">
                    @foreach ($products as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-3">
                                    <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                                        <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                            class="img-fluid">
                                        <?php break; } ?>
                                    </a>
                                    <div class="product_name">
                                        <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                    <div class="store_name">
                                        <a href="" class="text-muted">Store</a>
                                    </div>
                                    <div class="price">
                                        <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
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
