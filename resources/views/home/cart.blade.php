@extends('application')

@section('content')

    @include('/admin/components/modal')
    @include('/admin/components/msg')

    <div class="container mt-4">
        <h6>Your Shopping Cart and product</h6>

        <div class="row">
            <div class="col-md-8 ">
                <div class="d-flex">
                    <div class="p-2 des-margin">Product</div>
                    <div class="ml-auto p-2">Description</div>
                    <div class="ml-auto p-2">Qty</div>
                    <div class="ml-auto p-2">Total price</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="border-top"></div>

                @if ($counter > 0)
                    @foreach ($data_pro as $item)

                        <div class="order-margin show-order">

                            <div class="container">
                                <p class="text-primary m-1 sizetext">
                                    {{ $item->name }}
                                </p>

                                {{-- <p class="font-weight-lighter m-1 sizetext">#WOM304870</p> --}}
                                <div class="d-flex">
                                    <div class="font-weight-light m-1">
                                        <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                        <img style="width: 100px;" src="/images/imgProduct/{{ $picture }}" alt=""
                                            class="mb-1">
                                        <?php break; } ?>
                                    </div>

                                    <div class="wrapperrr">
                                        <div class="p-2 des-margin textoverflow">{{ $item->description }}</div>
                                    </div>
                                    <div class="ml-auto p-2">{{ $item->quantity }}

                                        <button type="button" value="{{ $item->cart_id }}"
                                            class="btn-sm edit_cart  btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>

                                    </div>
                                    <div class="ml-auto p-2">$ {{ $item->total }}</div>
                                </div>
                                <p class="font-weight-light m-1">$ {{ $item->price }}</p>
                                <div class="delete m-1">
                                    <button type="button" value="{{ $item->cart_id }}"
                                        class="btn-sm remove_cart btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                        Delete
                                    </button>
                                    <a href="{{ route('add_to_wishlist2', [$data_user->id, $item->id]) }}"
                                        class="btn-sm btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                        Add to wishlist
                                    </a>
                                    <a href="{{ url('/product', $item->id) }}" type="button" class="btn-sm btn btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mt-3"></div>
                    @endforeach
                @else
                    <div class="text-center mt-4">
                        <a href="{{ url('/') }}" type="button" class="btn btn-info">
                            Your Cart is Empty! Go Shopping ?
                        </a>
                    </div>
                @endif
                <div class="d-flex flex-row-reverse mt-1">
                    @if ($counter > 1)
                        @if ($quantity > 1)
                            <div class="p-2 ">Subtotal({{ $counter }} Products , {{ $quantity }} items) : $
                                {{ $total_price_all_quantity }}
                            </div>
                        @else
                            <div class="p-2 ">Subtotal({{ $counter }} Products , {{ $quantity }} item) : $
                                {{ $total_price_all_quantity }}
                            </div>
                        @endif
                    @else
                        @if ($quantity > 1)
                            <div class="p-2 ">Subtotal({{ $counter }} Product , {{ $quantity }} items) : $
                                {{ $total_price_all_quantity }}
                            </div>
                        @else
                            <div class="p-2 ">Subtotal({{ $counter }} Product , {{ $quantity }} item) : $
                                {{ $total_price_all_quantity }}
                            </div>
                        @endif
                    @endif
                </div>

                {{-- <p class="font-weight-light cart-text">The price and availability of items at PLP.com are subject to
                    change. The Cart is a temporary place to store a list of your items and reflects each item's most recent
                    price.
                    </p> --}}
            </div>

            <div class="col-md-4 custom">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="4">
                                <p class="text-center font-weight-bold new-table">Choose payment option to
                                    checkout</p>
                                <p class="text-center sizetext new-table">Buy over 10$ for free delivery</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="pay" colspan="4">
                                <div class="new-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Pay later/ Cash on Delivery
                                            <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pay" colspan=" 4">
                                <div class="new-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Pay method
                                            <p class="new-table">$ {{ $total_price_all_quantity }}</p>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            @if ($counter > 0)
                                <td colspan=" 4">
                                    <div class="">
                                        <a href="{{ url('/confirm-order-product') }}"
                                            class="fill_address btn btn-primary text-center w-100">Checkout</a>
                                    </div>
                                </td>
                            @else
                                <td colspan=" 4">
                                    <div class="">
                                        <a href="" class="fill_address btn btn-primary text-center w-100">No product</a>
                                    </div>
                                </td>
                            @endif

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="modal fade" id="edit_cart_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('edit-quantity-cart') }}" method="POST" class="text-center">
                    @csrf
                    <div class="modal-body text-center">
                        Edit quantity of product
                    </div>
                    {{-- @foreach ($data_pro as $item)
                        @if ($item->cart_id == 1)
                            <input style="width: 100px" type="number" min="1" class="text-center"
                                value="{{ $item->quantity }}" name="edit_cart_value" id="">
                        @endif
                    @endforeach --}}
                    <input style="width: 150px" type="number" min="1" class="text-center" placeholder="New quantity"
                        name="edit_cart_value" id="" required>
                    <input type="hidden" name="edit_cart_id" id="edit_cart_id">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove_cart', function() {
                var cart_id = $(this).val();
                // alert(cart_id);
                $('#remove_cart_modal').modal('show');
                $('#remove_cart_id').val(cart_id);
            })
        });
        $(document).ready(function() {
            $(document).on('click', '.edit_cart', function() {
                var cart_id = $(this).val();
                // alert(cart_id);
                $('#edit_cart_modal').modal('show');
                $('#edit_cart_id').val(cart_id);
            })
        });
        // $(document).ready(function() {
        //     $(document).on('click', '.fill_address', function() {
        //         var cart_id = $(this).val();
        //         // alert(cart_id);
        //         $('#address_user_modal').modal('show');
        //         // $('#edit_cart_id').val(cart_id);
        //     })
        // });


        // $(document).ready(function() {
        //     $('#link2').on('click', function() {
        //         var id_cart = $(this).val();
        //         window.location.href = '{{ url('/product') }}'.val(cart_id);
        //     });
        // });
    </script>
@stop
