@extends('application')

@section('content')
    @include('/home/components/navigation')
    @foreach ($detail_pro as $item)

        <div class="container">
            <div class="deatail_page mt-5">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 border-right">

                            <img id="main" src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                class="img-fluid p-4">
                            <img id="sub_img1_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img1 }}" alt=""
                                class="img-fluid p-4" style="display: none;">
                            <img id="sub_img2_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img2 }}" alt=""
                                class="img-fluid p-4" style="display: none;">
                            <img id="sub_img3_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img3 }}" alt=""
                                class="img-fluid p-4" style="display: none;">
                            <img id="sub_img4_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img4 }}" alt=""
                                class="img-fluid p-4" style="display: none;">
                            <img id="sub_img5_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img5 }}"
                                alt="" class="img-fluid p-4" style="display: none;">
                            <img id="sub_img6_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img6 }}"
                                alt="" class="img-fluid p-4" style="display: none;">
                            <img id="sub_img7_main" src="{{ asset('images/imgProduct') }}/{{ $item->sub_img7 }}"
                                alt="" class="img-fluid p-4" style="display: none;">


                            <div class="p-2">
                                <div class="wrapper">
                                    <div class="col-md-4" id="main_sub" onclick="main()">
                                        <div class="Item mb-2 card">
                                            <div class="p-2">
                                                <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($item->sub_img1)
                                        <div class="col-md-4" id="sub_img1" onclick="sub_img1()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img1 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($item->sub_img2)
                                        <div class="col-md-4" id="sub_img2" onclick="sub_img2()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img2 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($item->sub_img3)
                                        <div class="col-md-4" id="sub_img3" onclick="sub_img3()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img3 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($item->sub_img4)
                                        <div class="col-md-4" id="sub_img4" onclick="sub_img4()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img4 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($item->sub_img5)
                                        <div class="col-md-4" id="sub_img5" onclick="sub_img5()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img5 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($item->sub_img6)
                                        <div class="col-md-4" id="sub_img6" onclick="sub_img6()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img6 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($item->sub_img7)
                                        <div class="col-md-4" id="sub_img7" onclick="sub_img7()">
                                            <div class="Item mb-2 card">
                                                <div class="p-2">
                                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->sub_img7 }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4" style="margin-bottom: -30px">
                                <h4>
                                    {{ $item->name }}
                                </h4>
                                <small>
                                    # {{ $item->code_product }}
                                </small>
                                <div class="order mt-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" fill="currentColor"
                                        class="bi bi-bag-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                    <span>
                                        @if ($item->top_buy == '')
                                        @else
                                            @if ($item->top_buy == '1')
                                                {{ $item->top_buy }} Order
                                            @else
                                                {{ $item->top_buy }} Orders
                                            @endif
                                        @endif
                                    </span>
                                </div>
                                <div class="price mb-3">
                                    <h4>
                                        ${{ $item->price }}
                                    </h4>
                                </div>
                                <p class="des">
                                    {{ $item->description }}
                                    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eos minima, quod vel
                                    obcaecati libero corporis consectetur sed! Culpa dolores omnis tenetur eius, facilis
                                    sint magnam est sed animi dicta. --}}
                                </p>
                                <p class="store_name mb-3">
                                    <span><strong>Store address</strong></span>
                                    <span class="pl-4">Phnom Penh</span>
                                </p>
                                <p class="store_name">
                                    <span><strong>Brand</strong></span>
                                    <span class="pl-4"> {{ $item->brand_name }} </span>
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div style="margin-top: 10px">
                                            @if (Session::has('user'))
                                                @if ($item->stock <= 0)
                                                    <button class="btn btn-warning mt-2" style="width: 170px">
                                                        <span class="p-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-x-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                            </svg>
                                                        </span>
                                                        No Stock
                                                    </button>
                                                @else
                                                    {{-- <form action="{{ route('add_to_cart') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf --}}
                                                    {{-- <input type="hidden" value="{{ $data_user->id }}" name="user_id"
                                                class="class_user_id"> --}}
                                                    {{-- <input type="hidden" value="{{ $item->id }}" name="product_id"
                                                class="class_product_id"> --}}
                                                    {{-- <input type="hidden" value="{{ $item->price }}" name="total"
                                                class="class_total"> --}}
                                                    {{-- <input type="hidden" class="form-control class_quantity form-control-sm"
                                                value="1" id="quantity" hidden name="quantity"> --}}
                                                    <button type="submit" value="{{ $item->id }}"
                                                        class="btn submit_add_to_cart btn-primary mt-2"
                                                        style="width: 170px">
                                                        <span class="p-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-check-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                            </svg>
                                                        </span>
                                                        Add to cart
                                                    </button>

                                                    {{-- </form> --}}
                                                @endif
                                                {{-- <form action="{{ route('add_to_wishlist') }}" method="POST"
                                            class="mt-2">
                                            @csrf --}}
                                                <div class="mt-2">
                                                    <input type="hidden" name="u_id" class="class_u_id"
                                                        value="{{ $data_user->id }}" id="">
                                                    <input type="hidden" name="pro_id" class="class_pro_id"
                                                        value="{{ $item->id }}" id="">
                                                    <button type="submit" class="btn submit_wish_list btn-danger"
                                                        style="width: 170px">
                                                        <span class="p-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-heart"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                            </svg>
                                                        </span>
                                                        Add to wishlist
                                                    </button>
                                                </div>
                                                {{-- </form> --}}

                                            @else
                                                @if ($item->stock <= 0)
                                                    <button class="btn btn-warning mt-2" style="width: 170px">
                                                        <span class="p-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-x-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                            </svg>
                                                        </span>
                                                        No Stock
                                                    </button>
                                                @else
                                                    <a href="{{ url('login') }}">
                                                        <button type="submit" class="btn btn-primary mt-2"
                                                            style="width: 170px">
                                                            <span class="p-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                </svg>
                                                            </span>
                                                            Add to cart
                                                        </button>
                                                    </a>
                                                @endif

                                                <div class="mt-2">
                                                    <a href="{{ url('login') }}">
                                                        <button type="submit" class="btn btn-danger">
                                                            <span class="p-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                            Add to wishlist
                                                        </button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <style>
                .comment_box {
                    height: 250px;
                    padding: 5px;
                    padding-bottom: 50px;
                    border-radius: 10px 0px 0px 10px;
                    overflow: auto;
                }

                .comment_list div {
                    font-size: 13px;
                    color: rgb(44, 81, 182);
                }

                .comment_list p {
                    padding-left: 5px;
                    font-size: 13px;
                    background-color: rgb(226, 223, 223);
                    border-radius: 5px;
                    max-width: 80%;
                    color: black;
                }

                .comment_user p {
                    margin-left: 60px;
                }

                .comment_user {
                    margin-left: 60px;
                    margin-bottom: -10px;
                }

                .comment_not_user {
                    max-width: 85%;
                    margin-bottom: -10px;

                }

                .cs-card {
                    background-color: rgb(236, 236, 236);
                    border-radius: 10px;
                }

                .feedback .card {
                    max-height: 600px;
                    overflow: auto;
                }

                .feedback .name {
                    font-size: 16px;
                    font-weight: 500;
                }

                .feedback .card::-webkit-scrollbar {
                    height: 5px;
                    width: 8px;
                }

                ::-webkit-scrollbar-thumb {
                    background: #afb3b6;
                    border-radius: 5px;
                }

                .des::-webkit-scrollbar {
                    height: 5px;
                    width: 8px;
                }

                ::-webkit-scrollbar-thumb {
                    background: #afb3b6;
                    border-radius: 5px;
                }

            </style>
            <div class="mt-3 feedback pb-4">
                <h5 class="text-center">
                    Feedback
                </h5>
                <div class="row justify-content-center">
                    <div class="col-8">

                        <div class="card border-0 cs-shadow rounded" id="comment_id_scroll">
                            {{-- <div class="comment_box" id="comment_id_scroll">
                            <div class="comment_list">

                            </div>
                        </div> --}}
                            <div class="mb-2 mt-2">
                                <div class="pl-2 pr-2 commmmmmm">
                                    {{-- <div class="cs-card mb-2">
                                        <div class="p-1">
                                            <div class="name not_user">

                                            </div>
                                            <small class="not_user_comment">

                                            </small>
                                        </div>
                                    </div> --}}

                                </div>
                                {{-- <div class="pl-2 pr-2 commmmmmm2"> --}}
                                {{-- <div class="cs-card">
                                            <div class="p-1">
                                                <div class="name text-right for_user">

                                                </div>
                                                <small class="user_comment">

                                                </small>
                                            </div>
                                        </div> --}}

                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="input-group mt-2 cs-shadow">
                            {{-- <form action="{{ url('post_comment_product') }}" method="POST">
                @csrf --}}
                            <input type="text" class="form-control comment_value" name="comment" id="textcommentfield"
                                placeholder="Comment . . ." aria-label="Recipient's username"
                                aria-describedby="basic-addon2" required>
                            <input hidden type="text" name="product_comment_id" value="{{ $item->id }}" id=""
                                class="product_comment_id">
                            @if (Session::has('user'))
                                <input hidden type="text" name="user_id" value="{{ $data_user->id }}" id=""
                                    class="user_id_post_comment">

                                <div class="input-group-append">
                                    <button class="btn btn-primary submit_post_comment" type="button"
                                        onclick="clearText()">Send</button>
                                </div>
                            @else
                                <input hidden type="text" name="user_id" value="" id="" class="user_id_post_comment">
                                <input hidden type="text" name="product_comment_id" value="{{ $item->id }}" id=""
                                    class="product_comment_id">
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <div class="input-group-append">
                                        Send
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <div class="product pt-4 pb-2" id="Product">
            <div class="mt-5 related-product">
                <p class="font-weight-light">All related Product</p>
            </div>
            <div class="product-item">
                <div class="row">
                    @foreach ($related_pro as $item)
                        @if ($item->s_cat_id == $product_id->s_cat_id)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="card mb-3">
                                    <div class="m-3">
                                        <a href="/product/product/{{ $item->id }}">
                                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                                alt="" class="img-fluid">
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
                                            <div class="store_name">
                                                <a href="/store/{{ $item->seller_id }}" class="text-muted">
                                                    {{ $item->store_name }}
                                                </a>
                                            </div>
                                            @if (Session::has('user'))
                                                @if ($item->stock <= 0)
                                                    <div class="col">
                                                        <button class="btn btn-sm btn-warning mt-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                </svg>
                                                            </span>
                                                            No Stock
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <button type="submit" value="{{ $item->id }}"
                                                            class="btn submit_add_to_cart btn-sm btn-primary mt-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="col">
                                                    <div class="mt-2">
                                                        <button type="button" value="{{ $item->id }}"
                                                            class="btn btn-sm submit_wish_list btn-danger">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                                @if ($item->stock <= 0)
                                                    <div class="col">
                                                        <button class="btn btn-sm btn-warning mt-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary ">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="col">

                                                    <a href="{{ url('login') }}" class="btn btn-sm btn-danger">
                                                        <span class="p-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-heart"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($item->s_cat_id != $product_id->s_cat_id)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="card mb-3">
                                    <div class="m-3">
                                        <a href="/product/product/{{ $item->id }}">
                                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                                alt="" class="img-fluid">
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
                                            <div class="store_name">
                                                <a href="/store/{{ $item->seller_id }}" class="text-muted">
                                                    {{ $item->store_name }}
                                                </a>
                                            </div>
                                            @if (Session::has('user'))
                                                @if ($item->stock <= 0)
                                                    <div class="col">
                                                        <button class="btn btn-sm btn-warning mt-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <button type="submit" value="{{ $item->id }}"
                                                            class="btn submit_add_to_cart btn-sm btn-primary mt-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="col">
                                                    <div class="mt-2">
                                                        <button type="button" value="{{ $item->id }}"
                                                            class="btn btn-sm submit_wish_list btn-danger">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                                @if ($item->stock <= 0)
                                                    <div class="col">
                                                        <button class="btn btn-sm btn-warning mt-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <a href="{{ url('login') }}" class="btn btn-sm btn-primary ">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="col">
                                                    <a href="{{ url('login') }}" class="btn btn-sm btn-danger">
                                                        <span class="p-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-heart"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div> --}}
    @if (Session::has('add-to-cart-success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add to cart',
                    showConfirmButton: false,
                    timer: 1000
                })
            });
        </script>
    @endif
    @if (Session::has('add-to-wishlist-success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add to wishlist',
                    showConfirmButton: false,
                    timer: 1000
                })
            });
        </script>
    @endif
    <script>
        //plugin bootstrap minus and plus
        //http://jsfiddle.net/laelitenetwork/puJ6G/
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>
@stop
