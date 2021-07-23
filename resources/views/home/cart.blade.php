@extends('application')

@section('content')
    <div class="container mt-4">
        <h6>Your Shopping Cart and product</h6>
        <div class="row">
            <div class="col-md-8 ">
                <div class="d-flex ml-5">
                    <div class="p-2 des-margin">Description</div>
                    <div class="ml-auto p-2">Qty</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="border-top"></div>
                @for ($i = 1; $i <= 3; $i++)
                    <div class="order-margin show-order">
                        <img class="img-fluid set-img" src="/images/mouse.png">
                        <div class="container">
                            <p class="text-primary m-1 sizetext">
                                IMICE E-1300 Wireless Mouse Rechargeable Bluetooth Dual Mode Mute Luminous Wireless Mouse
                                for PC
                                Computer Laptop
                            </p>
                            <p class="font-weight-lighter m-1 sizetext">#WOM304870</p>
                            <div class="d-flex">
                                <div class="font-weight-light m-1">Color: Black <img src="/images/dot.png"> Size:As
                                    Photo</div>
                                <div class="ml-auto p-2">1</div>
                            </div>
                            <p class="font-weight-light m-1">$5.00</p>
                            <div class="delete m-1">
                                <a href="#" class="text-primary">Delete</a>
                                <a href="#" class="text-primary"><img src="/images/line.png"> Save for later</a>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom mt-3"></div>
                @endfor
                <div class="d-flex flex-row-reverse mt-1">
                    <div class="p-2 ">Subtotal(3items):$15.00</div>
                </div>
                <p class="font-weight-light cart-text">The price and availability of items at PLP.com are subject to
                    change. The Cart is a temporary place to store a list of your items and reflects each item's most recent
                    price.</p>
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
    <script>
    </script>
@stop
