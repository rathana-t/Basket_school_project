@extends('application')

@section('content')

    <div class="container">
        @foreach ($detail_pro as $detail)
            <div class="deatail_page mt-5">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <?php foreach (json_decode($detail->img_product)as $picture) { ?>
                            <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid p-4">
                            <?php break; } ?>
                            <div class="row">
                                <div class="pl-4 pr-4">
                                    <div class="col-md-3">
                                        <?php foreach (json_decode($detail->img_product)as $picture) { ?>
                                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                            class="img-fluid pb-4">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4">
                                <h2>
                                    {{ $detail->name }}
                                </h2>
                                <div class="order mt-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" fill="currentColor"
                                        class="bi bi-bag-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                    <span>165 orders</span>
                                </div>
                                <div class="price mb-3">
                                    <h4>
                                        ${{ $detail->price }}
                                    </h4>
                                </div>
                                <p class="des">
                                    {{ $detail->description }}
                                    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eos minima, quod vel
                                    obcaecati libero corporis consectetur sed! Culpa dolores omnis tenetur eius, facilis
                                    sint magnam est sed animi dicta. --}}
                                </p>
                                <p class="store_name mb-3">
                                    <span><strong>Store</strong></span>
                                    <span class="pl-4">Phnom Penh</span>
                                </p>
                                @include('/admin/components/msg')

                                <p class="store_name">
                                    <span><strong>Brand</strong></span>
                                    <span class="pl-4"> {{ $detail->brand_name }} </span>
                                </p>
                                <hr>
                                <div style="margin-top: 10px">
                                    @if (Session::has('user'))
                                        <form action="{{ route('add_to_cart') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $data_user->id }}" name="user_id">
                                            <input type="hidden" value="{{ $detail->id }}" name="product_id">
                                            <input type="hidden" value="{{ $detail->price }}" name="total">
                                            <input type="number" class="form-group col-md-2" id="quantity" placeholder="Qty"
                                                required name="quantity" min="1" max="100">
                                            <button type="submit" class="btn btn-primary">
                                                Add to cart
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ url('login') }}" class="btn btn-primary ">
                                            Add to cart
                                        </a>
                                        <a href="" class="btn btn-outline-primary mr-5">
                                            buy now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 related-product">
                    <p class="font-weight-light">All related Product</p>
                </div>
            </div>
        @endforeach
    </div>
@stop
