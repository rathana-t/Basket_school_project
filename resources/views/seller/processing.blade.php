@extends('seller\seller')

@section('sidebar-content')
    <div style="min-height: 75vh">

        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">Image product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Quality</th>
                    <th scope="col">Total price</th>
                    <th scope="col">OrderDate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @include('/seller/components/modal')

                    <tr class="seller-list text-center">
                        <td><?php foreach (json_decode($item->img_product)as $picture) { ?>
                            <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid">
                            <?php break; } ?>
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->u_name }}</td>
                        <td>{{ $item->u_phone }}</td>
                        <td>
                            <a data-toggle="modal" data-target="#address" style="cursor: pointer">
                                {{ $item->u_address }}
                            </a>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>$ {{ $item->total }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" value="{{ $item->order_id }}"
                                class="open_delivery_modal btn btn-primary">
                                Delivery
                            </button>

                            <a href="{{ url('product', $item->id) }}" class="btn btn-info">
                                View
                            </a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{ $data->links() }}

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
