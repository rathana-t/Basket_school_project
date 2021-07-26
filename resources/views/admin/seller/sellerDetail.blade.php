@extends('layouts\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1 > {{ $seller->store_name }} has Product </h1>
            <p>
                All Product {{$sellerHasProductCount}}
            </p>
        </div>
        <div class="text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">ID</th>
                        <th scope="col" class="text-left">Product name</th>
                        <th scope="col" class="text-left">Price</th>
                        <th scope="col" class="text-left">Stock</th>
                        <th scope="col" class="text-left">Post at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellerHasProduct as $item)
                        <tr class="seller-list">
                            <th scope="row" class="text-left">
                                <a href="seller/{{ $item->id }}">
                                    {{ $item->id }}
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
