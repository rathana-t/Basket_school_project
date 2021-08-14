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
                        <input style="width: 100px" type="number" min="1" class="text-center"
                            value="{{ $item->quantity }}" name="edit_cart_value" id="">
                    @endif
                @endforeach --}}
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <input type="number" min="1" class="form-control form-control-sm" name="edit_cart_value"
                                id="" value="1" required>
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
