@extends('application')

@section('content')
    @include('/home/components/navigation')

    <style>
        .product-item .card-footer {
            background: white;
        }

    </style>

    <div class="container">
        <div class="product pt-3">
            <h5>
                {{ $smallCateName->name }}
            </h5>
            <div class="product-item">
                <div class="row mt-3">
                    @foreach ($products as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3 shadow-sm rounded border-0">
                                <div class="pt-2 pb-2 pl-3 pr-3">
                                    <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                                        <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                            class="img-fluid">
                                        <div class="product_name">
                                            <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                                                <div class="b">
                                                    {{ $item->name }}
                                                </div>
                                            </a>
                                        </div>
                                    </a>
                                    <div class="store_name">
                                        <a href="/store/{{ $item->seller_id }}" class="text-muted">
                                            {{ $item->store_name }}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div class="price">
                                            <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                                                ${{ $item->price }}
                                            </a>
                                        </div>

                                        <div class="row">
                                            @if (Session::has('user'))
                                                @if ($item->stock <= 0)
                                                    <button class="btn btn-sm btn-warning mr-2 ml-2 no-stock">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-x-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                            </svg>
                                                        </span>
                                                        no stock
                                                    </button>
                                                @else
                                                    <form action="{{ route('add_to_cart') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <input type="hidden" value="{{ $data_user->id }}" name="user_id"> --}}
                                                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                        {{-- <input type="hidden" value="{{ $item->price }}" name="total"> --}}
                                                        {{-- <input type="hidden" class="form-control form-control-sm" value="1"
                                                        id="quantity" hidden placeholder="Qty" required name="quantity" min="1"
                                                        max="{{ $item->stock }}" style="width: 170px"> --}}
                                                        <input hidden type="checkbox" checked name="redirect" id="">
                                                        <button class="btn btn-sm btn-primary mr-2 ml-2">
                                                            Order Now
                                                        </button>
                                                    </form>
                                                @endif
                                                <button type="button" value="{{ $item->id }}"
                                                    class="btn submit_wish_list btn-sm btn-dark mr-3">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                            <path
                                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            @else
                                                @if ($item->stock <= 0)
                                                    <button class="btn btn-sm btn-warning mr-2 ml-2 no-stock">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-x-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                            </svg>
                                                        </span>
                                                        no stock
                                                    </button>
                                                @else
                                                    <a href="{{ url('login') }}">
                                                        <button class="btn btn-sm btn-primary mr-2 ml-2">
                                                            Order Now
                                                        </button>
                                                    </a>
                                                @endif
                                                <a href="{{ url('login') }}">
                                                    <button class="btn  btn-sm btn-dark mr-3">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-heart"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </a>
                                            @endif
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
{{-- @if (\Route::current()->getName() == 'smallcateItem1')
    <div class="card mb-3">
        <div class="m-3">
            <a href="/category/{{ $cate->id }}/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                    class="img-fluid">
            </a>
        </div>
        <div class="border-top">
            <div class="pl-4 pr-4 pb-2 pt-2">
                <div class="product_name">
                    <a
                        href="/category/{{ $cate->id }}/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                        {{ $item->name }}
                    </a>
                </div>
                <div class="price">
                    <a
                        href="/category/{{ $cate->id }}/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                        ${{ $item->price }}
                    </a>
                </div>
                <div class="store_name">
                    <a href="/category/{{ $cate->id }}/store/{{ $item->seller_id }}" class="text-muted">
                        {{ $item->store_name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="card mb-3">
        <div class="m-3">
            <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                    class="img-fluid">
            </a>
        </div>
        <div class="border-top">
            <div class="pl-4 pr-4 pb-2 pt-2">
                <div class="product_name">
                    <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
                        {{ $item->name }}
                    </a>
                </div>
                <div class="price">
                    <a href="/smallcate/{{ $smallCateName->id }}/product/{{ $item->id }}">
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
@endif --}}
