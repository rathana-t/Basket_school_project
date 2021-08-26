@extends('seller\seller')

@section('sidebar-content')
    @include('/admin/components/modal')
    @include('seller\components\msg')

    @include('/seller/components/product')

    <div class="card border-0 shadow rounded mt-4">
        <div style="min-height: 500px">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Stock</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellerHasProduct as $item)
                        <tr class="product-list">
                            <td class="text-center">
                                <a href="{{ route('detail', $item->id) }}">
                                    <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                        class="img-fluid">
                                </a>
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td class="text-center">
                                $ {{ $item->price }}
                            </td>
                            <td class="text-center">
                                {{ $item->stock }} Items
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>
                            <td>
                                <a href="{{ route('detail', $item->id) }}" class="btn btn-info text-white">
                                    View
                                </a>
                                <a href="{{ route('edit_product', $item->id) }}" class="btn btn-primary text-white">
                                    Edit
                                </a>
                                <button type="button" value="{{ $item->id }}"
                                    class="deletebtn btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pl-4">
            {{ $sellerHasProduct->links() }}
        </div>
    </div>

    {{-- <div style="min-height: 75vh">
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
                            <a href="{{ route('detail', $item->id) }}">
                                <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}" alt=""
                                    class="img-fluid">
                            </a>
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            $ {{ $item->price }}
                        </td>
                        <td>
                            {{ $item->stock }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <a href="{{ route('detail', $item->id) }}" class="btn btn-info text-white">
                                View
                            </a>
                            <a href="{{ route('edit_product', $item->id) }}" class="btn btn-primary text-white">
                                Edit
                            </a>
                            <button type="button" value="{{ $item->id }}"
                                class="deletebtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sellerHasProduct->links() }} --}}

@stop
