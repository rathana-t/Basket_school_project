@extends('seller\seller')

@section('sidebar-content')
    @include('/admin/components/modal')

    @include('seller\components\msg')
    <div style="min-height: 75vh">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Post at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellerHasProduct as $item)
                    <tr class="product-list">
                        <td>
                            {{ ++$i }}
                            </a>
                        </td>
                        <td>
                            <?php foreach (json_decode($item->img_product)as $picture) { ?>
                            <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid">
                            <?php break; } ?>
                        </td>
                        <td>
                            <a href="seller/{{ $item->name }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            <a href="seller/{{ $item->price }}">
                                {{ $item->price }}
                            </a>
                        </td>
                        <td>
                            <a href="seller/{{ $item->stock }}">
                                {{ $item->stock }}
                            </a>
                        </td>
                        <td>
                            <a href="seller/{{ $item->created_at }}">
                                {{ $item->created_at }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit_product', $item->id) }}">
                                <button style="margin: 2px" type="button" class="btn btn-info">Edit</button>
                            </a>
                            <button style="margin: 2px" type="button" value="{{ $item->id }}"
                                class="deletebtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sellerHasProduct->links() }}
@stop
