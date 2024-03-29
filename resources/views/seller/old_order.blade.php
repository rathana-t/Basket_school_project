@extends('seller\seller')

@section('sidebar-content')

    <div style="min-height: 75vh">
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">Image product</th>
                    <th scope="col">Product</th>
                    {{-- <th scope="col">Name</th> --}}
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Quality</th>
                    <th scope="col">Total</th>
                    <th scope="col">Delivery</th>
                    <th scope="col" style="width: 180px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @include('/seller/components/modal')
                    {{-- @if ($item->delivery == 1) --}}

                    {{-- @elseif($item->delivery ==1) --}}
                    {{-- @if ($item->seller_remove_cancel == 0) --}}

                    {{-- @else --}}
                    <tr class="product-list text-center">
                        <td>
                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                class="img-fluid">
                        </td>
                        <td class="limit_text_sss">{{ $item->name }}</td>
                        {{-- <td>{{ $item->u_name }}</td> --}}
                        <td>{{ $item->u_phone }}</td>
                        <td>
                            <div class="b Address" style="cursor: pointer">
                                {{ $item->u_address }}
                            </div>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>$ {{ $item->total }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ url('product', $item->id) }}">
                                <button class="btn btn-sm btn-primary">
                                    view
                                </button>
                            </a>
                            <a href="{{ url('/remove-oldorder', $item->order_id) }}">
                                <button class="btn btn-sm btn-danger">
                                    delete
                                </button>
                            </a>
                        </td>
                    </tr>
                    {{-- @endif --}}
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->links() }}


@stop
