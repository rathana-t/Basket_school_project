@extends('seller\seller')

@section('sidebar-content')
    <div class="text-center">
        <h1>
            This is old order page
        </h1>
    </div>
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
                        <a href="{{ url('product', $item->id) }}">
                            <button class="btn btn-primary">
                                view
                            </button>
                        </a>
                        <a href="">
                            <button class="btn btn-danger">
                                delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@stop
