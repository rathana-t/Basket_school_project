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
                    @if ($item->seller_cancel == 1)
                        <tr class="product-list text-center" style="color: rgb(223, 89, 12)">
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
                                <p>Cancelled</p>
                                <a href="{{ url('/remove-cancel', $item->order_id) }}">
                                    <button class="btn btn-danger">
                                        delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @elseif($item->seller_remove_cancel ==2 || $item->seller_remove_cancel==1)
                    @else
                        <tr class="product-list text-center">
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
                                <a href="{{ url('product', $item->id) }}">
                                    <button class="btn btn-primary">
                                        view
                                    </button>
                                </a>
                                <a href="{{ url('/remove-oldorder', $item->order_id) }}">
                                    <button class="btn btn-danger">
                                        delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $data->links() }}

@stop
