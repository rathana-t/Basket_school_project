@extends('seller\seller')

@section('sidebar-content')
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Image product</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer phone</th>
                <th scope="col">Customer Address</th>
                <th scope="col">Quality</th>
                <th scope="col">Total price</th>
                <th scope="col">OrderDate</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="seller-list text-center">
                    <td><?php foreach (json_decode($item->img_product)as $picture) { ?>
                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid">
                        <?php break; } ?>
                    </td>
                    <td>{{ $item->u_name }}</td>
                    <td>{{ $item->u_phone }}</td>
                    <td>{{ $item->u_address }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>$ {{ $item->total }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>

                        <button type="button" value="{{ $item->order_id }}" class="open_delivery_modal btn btn-primary">
                            Delivery
                        </button>

                        <a href="{{ url('product', $item->id) }}">
                            <button class="btn btn-primary">
                                view
                            </button>
                        </a>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- modal --}}

    <div class="modal fade" id="delivery_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/confirm-processing-to-delivery') }}" method="POST" class="text-center">
                    @csrf
                    <div class="modal-body text-center">
                        Are you redy to delivery this product to customer!!!.
                    </div>
                    <input type="hidden" name="order_id" id="order_id">
                    <textarea name="message" id="" required></textarea>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script></script> --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.open_delivery_modal', function() {
                var cart_id = $(this).val();
                // alert(cart_id);
                $('#delivery_modal').modal('show');
                $('#order_id').val(cart_id);
            })
        });
    </script>
@endsection
