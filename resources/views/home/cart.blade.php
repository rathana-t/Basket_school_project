@extends('application')

@section('content')

    @include('/home/components/modal')
    @include('/home/components/msg')
    @include('/home/components/navigation')
    <div class="shopping-cart">
        <div class="container">
            <div class="pt-3">
                <h5 class="mb-3">
                    Shopping Cart
                </h5>
                <div>
                    <div class="row">
                        <div class="col-lg-9">
                            @if ($counter > 0)
                                <div class="card mb-3">
                                    <div class="p-2">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col" colspan="3">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_pro as $item)
                                                    <tr class="mb-3">
                                                        <td colspan="3">
                                                            <a href="{{ url('/product', $item->id) }}">
                                                                <img style="width: 100px;"
                                                                    src="/images/imgProduct/{{ $item->img_product }}"
                                                                    alt="" class="img-fluid">
                                                                {{ $item->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/product', $item->id) }}">
                                                                $ {{ $item->price }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <button type="button" value="{{ $item->cart_id }}"
                                                                        class="btn-sm edit_cart btn btn btn-light border">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="#969696"
                                                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <a href="{{ url('/product', $item->id) }}">
                                                                        {{ $item->quantity }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/product', $item->id) }}">
                                                                $ {{ $item->total }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('add_to_wishlist2', [$data_user->id, $item->id]) }}"
                                                                class="btn-sm btn btn btn-light border">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="#969696" class="bi bi-heart-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                                </svg>
                                                            </a>
                                                            <button type="button" value="{{ $item->cart_id }}"
                                                                class="btn-sm remove_cart btn btn-light border">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="countProduct">
                                        <div class="border-top">
                                            <div class="p-3">
                                                @if ($counter > 1)
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center mt-4">
                                    <a href="{{ url('/') }}" type="button" class="btn btn-info text-white">
                                        Your Cart is Empty! Go Shopping ?
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            <div class="payment">
                                <div class="card">
                                    <div class="card-header text-center" style="background-color:white">
                                        Choose payment
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios1" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Cash on Delivery
                                                    <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios2" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Credit card
                                                    <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            @if ($counter > 0)
                                                <div class="text-center">
                                                    <a href="{{ url('/confirm-order-product') }}"
                                                        class="fill_address btn btn-primary text-center text-white">Checkout</a>
                                                </div>
                                            @else
                                                <div class="">
                                                    <a href=""
                                                        class="fill_address btn btn-primary text-center text-white">No
                                                        product</a>
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
        </div>
    </div>



@stop
