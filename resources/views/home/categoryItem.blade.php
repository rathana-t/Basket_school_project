@extends('application')

@section('content')
    @include('/home/components/navigation')
    {{-- <div class="container product pb-5">
        <div class="product-item pt-3">
            <div class="cateItem">
                @foreach ($second_cateItem as $item)
                    <div class="card border-0 mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="pb-2">
                                <h5 class="mb-3">
                                    {{ $item->name }}
                                </h5>
                                <div class="smallCard">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            @if ($product->s_cat_id == $item->id)
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="card mb-3">
                                                        <div class="m-3">
                                                            <a
                                                                href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                                                <img src="{{ asset('images/imgProduct') }}/{{ $product->img_product }}"
                                                                    alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="border-top">
                                                            <div class="pl-4 pr-4 pb-2 pt-2">
                                                                <div class="product_name">
                                                                    <a
                                                                        href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                                                        {{ $product->name }}
                                                                    </a>
                                                                </div>
                                                                <div class="price">
                                                                    <a
                                                                        href="/category/{{ $cate_name->id }}/product/{{ $product->id }}">
                                                                        ${{ $product->price }}
                                                                    </a>
                                                                </div>
                                                                <div class="store_name">
                                                                    <a href="/store/{{ $product->seller_id }}"
                                                                        class="text-muted">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="container">

        <div class="pt-3">
            <h5>
                Subcategory
            </h5>
        </div>
        <div class="row se-cate">
            @foreach ($second_cateItem as $item)
                <div class="col-md-3">
                    <div class="card bg-dark border-0 mb-3">
                        <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                            class="card-img opacity">
                        <div class="card-img-overlay text-white">
                            <h5 class="text-white pb-2">
                                {{ $item->name }}
                            </h5>
                            <a href="/smallcate/{{ $item->id }}" class="btn btn-light"> See more </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- <div class="category pt-3 ">
            <h5>
                Subcategory
            </h5>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($second_cateItem as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="/smallcate/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                                                class="img-fluid mb-2">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
@stop
