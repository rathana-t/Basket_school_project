<div class="modal-content">

    @foreach ($data_pro as $item)
        <p class="text-primary m-1 sizetext">
            {{ $item->name }}
        </p>
        <div class="font-weight-light m-1">
            <?php foreach (json_decode($item->img_product)as $picture) { ?>
            <img style="width: 100px;" src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1">
            <?php break; } ?>
        </div>
    @endforeach
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
    <form action="{{ url('/order-product') }}" method="POST">
        @csrf
        <div class="modal-body text-center">
            Thank you for buy the product please fill your address, and we will call to your phone number that
            you use in your acctount.
        </div>
        <input type="text" name="address" value="{{ $data_user->address }}" placeholder="address" required>
        <div class="modal-footer">
            <a href="/cart" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Ok</button>
        </div>
    </form>
</div>
