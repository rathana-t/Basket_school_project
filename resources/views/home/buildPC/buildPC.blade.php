@extends('application')

@section('content')
    @include('/home/components/msg')


    <div class="shopping-cart">
        <div class="container">
            <div class="pt-3">
                <div class="row">
                    <div class="col-lg-9">
                        @foreach ($category as $itemA)
                            <h5 class="mb-1">
                                {{ $itemA->name }}
                            </h5>
                            @foreach ($second_cate as $itemB)
                                @if ($itemA->id == $itemB->category_id)
                                    {{ $itemB->name }}
                                    <div class="card ">
                                        <table class="table-borderless">
                                            <tbody>
                                                <?php
                                                $number = 0;
                                                ?>
                                                @foreach ($data_pro as $pro)
                                                    @if ($pro->s_cat_id == $itemB->id)
                                                        <?php
                                                        $number = 1;
                                                        ?>
                                                        <td colspan="3">
                                                            <a href="/product/product/{{ $pro->id }}" target="_blank">
                                                                <div class="row" style="margin-left: 10px">
                                                                    <img style="width: 100px;"
                                                                        src="{{ asset('images/imgProduct') }}/{{ $pro->img_product }}"
                                                                        alt="" class="img-fluid">
                                                                    <div class="b" style="margin-top: 38px">
                                                                        {{ $pro->name }}
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            $ {{ $pro->price }}
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('CustomPC/product') }}" method="POSt">
                                                                @csrf
                                                                <input hidden type="text" name="s_cate_id" id=""
                                                                    value="{{ $itemB->id }}">
                                                                <input hidden type="text" name="A_U" id="" value="1">
                                                                <button type="submit"
                                                                    class="btn-sm btn btn btn-light border">
                                                                    change
                                                                </button>
                                                            </form>

                                                        </td>
                                                        <td>
                                                            <a href="{{ url('CustomPC/remove', $itemB->id) }}"
                                                                class="btn-sm remove_cart btn btn-light border">
                                                                Remove
                                                            </a>
                                                        </td>
                                                    @endif
                                                @endforeach
                                                @if ($number == 0)
                                                    <td colspan="3">
                                                        <div class="row" style="margin-left: 10px">
                                                            <img style="width: 100px;" src="{{ asset('img_null.jpg') }}"
                                                                alt="" class="img-fluid">
                                                            <div class="b" style="margin-top: 38px">
                                                                No Item
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <form action="{{ url('CustomPC/product') }}" method="POSt">
                                                            @csrf
                                                            <input hidden type="text" name="s_cate_id" id=""
                                                                value="{{ $itemB->id }}">
                                                            <input hidden type="text" name="A_U" id="" value="0">
                                                            <button style="width: 73px" type="submit"
                                                                class="btn-sm btn btn btn-light border">
                                                                Add
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <div style="margin-right: 55px;"></div>
                                                    </td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            @endforeach

                        @endforeach

                    </div>

                    <div class="col-lg-3">
                        <div class="payment" style="position: fixed;width:300px">
                            <div class="card sticky-top">
                                <div class="card-header text-center" style="background-color:white">
                                    Build Total Price
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label" for="exampleRadios1">
                                                <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                            </label>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        @if ($counter > 0)
                                            <div class="text-center">
                                                <a href="{{ url('/CustomPC/add_to_cart') }}"
                                                    class="fill_address btn btn-primary text-center text-white">ADD TO
                                                    CART</a>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <button class="fill_address btn btn-primary text-center text-white">No
                                                    product
                                                </button>
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="countProduct">
            <div class="border-top">
                <div class="p-3">
                    <div class="p-2 ">
                        5 Products ,89 items
                    </div>
                    {{-- @if ($counter > 1)
                                    @if ($quantity > 1)
                                        <div class="p-2 ">
                                            {{ $counter }} Products , {{ $quantity }} items
                                        </div>
                                    @else
                                        <div class="p-2 ">
                                            {{ $counter }} Products , {{ $quantity }} item
                                        </div>
                                    @endif
                                @else
                                    @if ($quantity > 1)
                                        <div class="p-2 ">
                                            {{ $counter }} Product , {{ $quantity }} items
                                        </div>
                                    @else
                                        <div class="p-2 ">
                                            {{ $counter }} Product , {{ $quantity }} item
                                        </div>
                                    @endif
                                @endif --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <style>
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

    </style>
@stop
