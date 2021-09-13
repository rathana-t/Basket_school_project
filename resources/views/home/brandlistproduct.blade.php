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
                                        <div class="row">

                                            @if (Session::has('user'))
                                                <div class="col">
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
                                                        <button class="btn btn-sm btn-primary">
                                                            Order Now
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <button type="button" value="{{ $item->id }}"
                                                        class="btn btn-sm submit_wish_list btn-danger">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-heart"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="col">

                                                    <a href="{{ url('login') }}">
                                                        <button class="btn btn-sm btn-primary">
                                                            Order Now
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col">

                                                    <a href="{{ url('login') }}">
                                                        <button class="btn btn-sm btn-danger">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
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
