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
                        </td>
                        <td>
                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                class="img-fluid">
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->price }}
                        </td>
                        <td>
                            {{ $item->stock }}
                        </td>
                        <td>
                            {{ $item->created_at }}
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
