@extends('application')

@section('content')
    @include('/home/components/navbar_user')
    <div class="container">
        @foreach ($data as $item)
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
                            <div class="p-4">
                                <h2>
                                    {{ $item->name }}
                                </h2>
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
                                </p>
                                <p class="store_name mb-3">
                                    <span><strong>Store</strong></span>
                                    <span class="pl-4">Phnom Penh</span>
                                </p>
                                <p class="store_name">
                                    <span><strong>Brand</strong></span>
                                    <span class="pl-4"> {{ $item->brand_name }} </span>
                                </p>
                                <hr>
                                <div style="color: rgba(255, 102, 0, 0.856)">
                                    {{ $message->message }}
                                </div>
                                <a href="{{ url('/delete-order', $item->id) }}" class="btn btn-sm btn-dark mt-3">
                                    Remove
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop
