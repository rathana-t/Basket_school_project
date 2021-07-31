@extends('seller\seller')

@section('sidebar-content')
    @include('/admin/components/modal')

    @include('seller\components\msg')

    <h1 class="text-center mb-5">List all products</h1>
    <div class="text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-left">ID</th>
                    <th scope="col" class="text-left">Name</th>
                    <th scope="col" class="text-left">Price</th>
                    <th scope="col" class="text-left">Stock</th>
                    <th scope="col" class="text-left">Post at</th>
                    <th scope="col" class="text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellerHasProduct as $item)
                    <tr class="seller-list-product">
                        <th scope="row" class="text-left">
                            {{ ++$i }}
                            </a>
                        </th>
                        <td class="text-left">
                            <a href="seller/{{ $item->name }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td class="text-left">
                            <a href="seller/{{ $item->price }}">
                                {{ $item->price }}
                            </a>
                        </td>
                        <td class="text-left">
                            <a href="seller/{{ $item->stock }}">
                                {{ $item->stock }}
                            </a>
                        </td>
                        <td class="text-left">
                            <a href="seller/{{ $item->created_at }}">
                                {{ $item->created_at }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ url('detailPage', $item->id) }}">
                                <button style="margin: 2px" type="button" class="btn btn-info">View</button>
                            </a>
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
@stop
