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
                                                                <div class="b">
                                                                    {{ $item->name }}
                                                                </div>
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
                                                            {{-- {{ $item->stock }} --}}
                                                            {{-- <form action="{{ url('/edit-quantity-cart') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->cart_id }}">
                                                                <select class="browser-default custom-select"
                                                                    style="width: 70px"
                                                                    onchange='if(this.value != 0) { this.form.submit(); }'
                                                                    name="quantity">
                                                                    <option value="1"
                                                                        {{ $item->quantity == 1 ? 'selected' : '' }}>1
                                                                    </option>
                                                                    @if ($item->stock >= 2)
                                                                        <option value="2"
                                                                            {{ $item->quantity == 2 ? 'selected' : '' }}>
                                                                            2
                                                                        </option>
                                                                    @endif
                                                                    @if ($item->stock >= 3)
                                                                        <option value="3"
                                                                            {{ $item->quantity == 3 ? 'selected' : '' }}>
                                                                            3
                                                                        </option>
                                                                    @endif
                                                                    @if ($item->stock >= 4)
                                                                        <option value="4"
                                                                            {{ $item->quantity == 4 ? 'selected' : '' }}>
                                                                            4
                                                                        </option>
                                                                    @endif
                                                                    @if ($item->stock >= 5)
                                                                        <option value="5"
                                                                            {{ $item->quantity == 5 ? 'selected' : '' }}>
                                                                            5
                                                                        </option>
                                                                    @endif
                                                                    {{-- @for ($i = 1; $i < $item->stock; $i++)
                                                                        <option value="{{ $i }}"
                                                                            {{ $item->quantity == $i ? 'selected' : '' }}>
                                                                            {{ $i }}
                                                                        </option>
                                                                    @endfor --}}
                                                            {{-- </select>
                                                            </form> --}}
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('/product', $item->id) }}">
                                                                $ {{ $item->total }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button type="button" value="{{ $item->id }}"
                                                                class="btn btn-sm submit_wish_list btn-dark">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-heart" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            {{-- <a href="{{ route('add_to_wishlist2', [$data_user->id, $item->id]) }}"
                                                                class="btn-sm btn btn btn-light border">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="#969696" class="bi bi-heart-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                                </svg>
                                                            </a> --}}
                                                            <button type="button" value="{{ $item->cart_id }}"
                                                                class="btn-sm remove_cart btn btn-light border">
                                                                Remove
                                                            </button>



                                                            {{-- <div class="modal fade"
                                                                id="remove_cart_modal{{ $item->cart_id }}" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">

                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="{{ url('remove-cart', $item->cart_id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <div class="modal-body text-center">
                                                                                Remove this products from cart
                                                                                {{ $item->cart_id }}?
                                                                            </div>
                                                                            <input type="hidden" name="remove_cart_id"
                                                                                id="remove_cart_id"
                                                                                value="{{ $item->cart_id }}">
                                                                            <div
                                                                                class="modal-footer modal-footer-remove_cart_modal">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Remove</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div> --}}



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
                                    <a href="{{ url('/product') }}" type="button" class="btn btn-info text-white">
                                        Your Cart is Empty! Go Shopping ?
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            <div class="payment">
                                <div class="card">
                                    <form action="{{ url('/confirm-order-product') }}" method="POST">
                                        @csrf

                                        <div class="card-header text-center" style="background-color:white">
                                            Choose payment
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="exampleRadios1" value="cash_on_delivery" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Cash on Delivery
                                                        <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="exampleRadios2" value="wing">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Visa Card/MasterCard
                                                        <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                @if ($counter > 0)
                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="fill_address btn btn-primary text-center text-white">Checkout</button>
                                                    </div>
                                                @else
                                                    <div class="___class_+?46___">
                                                        <a class="fill_address btn btn-primary text-center text-white">No
                                                            product
                                                        </a>
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function IsEmpty() {
            var cover_img = document.forms['frm'].cover_img.value;
            var sub_img1 = document.forms['frm'].sub_img1.value;
            var sub_img2 = document.forms['frm'].sub_img2.value;
            var sub_img3 = document.forms['frm'].sub_img3.value;
            var sub_img4 = document.forms['frm'].sub_img4.value;
            var sub_img5 = document.forms['frm'].sub_img5.value;
            var sub_img6 = document.forms['frm'].sub_img6.value;
            var sub_img7 = document.forms['frm'].sub_img7.value;
            if (cover_img === "" && sub_img1 === "" && sub_img2 === "" && sub_img3 === "" && sub_img4 === "" && sub_img5 ===
                "" && sub_img6 === "" && sub_img7 === "") {
                alert("Please add picture for your product!");
                return false;
            }
            return true;
        }
    </script>

@stop
