@extends('seller\seller')

@section('sidebar-content')

    <div style="min-height: 75vh">

        <table class="table table-hover seller-order">
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

                    @if ($item->user_cancel == 0 && $item->pending == 1 && $item->seller_cancel == 0)
                        <tr class="text-center product-list">
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
                                    class="open_pending_modal btn btn-primary">
                                    Confirm
                                </button>

                                <a href="{{ url('product', $item->id) }}" class="btn btn-info text-white">
                                    view
                                </a>
                                <button type="button" value="{{ $item->order_id }}"
                                    class="open_cancel_modal btn btn-danger">
                                    cancel
                                </button>
                            </td>
                        </tr>
                    @endif

                @endforeach
                @foreach ($data as $item)
                    @include('/seller/components/modal')

                    @if ($item->user_cancel == 1 && $item->pending == 1)
                        <tr class="text-center product-list" style="color: red">
                            <td><?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt=""
                                    class="img-fluid">
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
                                <p>Cancelled</p>

                                <a href="{{ url('product', $item->id) }}" class="btn btn-info text-white">
                                    view
                                </a>
                                <a href="{{ url('delete_user_cancel_order', $item->order_id) }}"
                                    class="btn btn-danger text-white">
                                    remove
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach


            </tbody>
        </table>
    </div>
    {{ $data->links() }}

    {{-- modal --}}

    <div class="modal fade" id="pending_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/confirm-pending') }}" method="POST" class="text-center">
                    @csrf
                    <div class="modal-body text-center">
                        Accept this order.
                    </div>
                    <input type="hidden" name="order_id" id="order_id">
                    <textarea name="message" rows="4"
                        required>Order accepted contact : {{ $data_seller->phone }}</textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancel_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/cancel-pending') }}" method="POST" class="text-center">
                    @csrf
                    <div class="modal-body text-center">
                        Leave some message to customer!!
                    </div>
                    <input type="hidden" name="cancel_order_id" id="cancel_order_id">
                    <textarea name="message" id="" required>sorry!</textarea>

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
            $(document).on('click', '.open_pending_modal', function() {
                var cart_id = $(this).val();
                // alert(cart_id);
                $('#pending_modal').modal('show');
                $('#order_id').val(cart_id);
            })
        });

        $(document).ready(function() {
            $(document).on('click', '.open_cancel_modal', function() {
                var cart_id = $(this).val();
                // alert(cart_id);
                $('#cancel_modal').modal('show');
                $('#cancel_order_id').val(cart_id);
            })
        });
    </script>
@endsection
