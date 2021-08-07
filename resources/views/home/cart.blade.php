@extends('application')

@section('content')

    @include('/admin/components/modal')


    <div class="container mt-4">
        <h6>Your Shopping Cart and product</h6>
        <div class="row">
            <div class="col-md-8 ">
                <div class="d-flex ml-5">
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
                @foreach ($data_pro as $item)

                    <div class="order-margin show-order">
                        <div class="container">
                            <p class="text-primary m-1 sizetext">
                                {{ $item->name }}
                            </p>
                            <p class="font-weight-lighter m-1 sizetext">#WOM304870</p>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
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
                                <button type="button" class="btn-sm btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-save2" viewBox="0 0 16 16">
                                        <path
                                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z">
                                        </path>
                                    </svg>
                                    Save for later
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom mt-3"></div>
                @endforeach

                <div class="d-flex flex-row-reverse mt-1">
                    @if ($counter > 1)
                        <div class="p-2 ">Subtotal({{ $counter }} main items) : $ {{ $total_price_all_quantity }}
                        </div>
                    @else
                        <div class="p-2 ">Subtotal({{ $counter }} main item) : $ {{ $total_price_all_quantity }}
                        </div>
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
                                            <p class="new-table">$15.00</p>
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
                                            Pay later/ Cash on Delivery
                                            <p class="new-table">$15.00</p>
                                        </label>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td class="pay" colspan="4">
                                <div class="new-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios3" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios3">
                                            Pay later/ Cash on Delivery
                                            <p class="new-table">$15.00</p>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=" 4">
                                <div class="">
                                    <button type="submit" class="btn btn-primary text-center w-100">Checkout</button>
                                </div>
                            </td>
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
    </script>
@stop
