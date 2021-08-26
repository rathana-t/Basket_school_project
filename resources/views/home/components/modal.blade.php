<div class="modal fade" id="remove_cart_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('remove-cart') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                    Remove this products from cart ?
                </div>
                <input type="hidden" name="remove_cart_id" id="remove_cart_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Remove</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit_cart_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/edit-quantity-cart') }}" method="POST" class="text-center">
                @csrf
                <div class="modal-body text-center">
                    {{-- @foreach ($data_pro as $item)
                    @if ($item->cart_id == 1)
                        <input style="width: 100px" type="number" min="1" class="text-center" max="10000"
                            value="{{ $item->quantity }}" name="edit_cart_value" id="">
                    @endif
                @endforeach --}}
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <input type="number" min="1" class="form-control form-control-sm" name="edit_cart_value"
                                max="10000" id="" value="1" required>
                            <input type="hidden" name="edit_cart_id" id="edit_cart_id">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/logout" method="GET">
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="remove_wish_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/remove-wishlist') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                    Remove this product from your wishList !
                </div>
                <input type="hidden" name="remove_wish_id" id="remove_wish_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-primary">Remove</button>
                </div>
            </form>
        </div>
    </div>
</div>
