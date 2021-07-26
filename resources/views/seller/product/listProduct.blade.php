@extends('layouts\sidebar')

@section('sidebar-content')
    <div class="container">
        <h1>
            {{ $data_seller->store_name }}
        </h1>
        <div class="text-left">
            <a style="margin:10px " href="{{ url('/seller/add-product') }}">
                <button type="button" class="btn btn-success">Create & Sell</button>
            </a>
        </div>
        <div class="text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">ID</th>
                        <th scope="col" class="text-left">Name</th>
                        <th scope="col" class="text-left">Price</th>
                        <th scope="col" class="text-left">Stock</th>
                        <th scope="col" class="text-left">Post at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellerHasProduct as $item)
                        <tr class="seller-list-product">
                            <th scope="row" class="text-left">
                                {{-- <a href="seller/{{ $item->id }}"> --}}
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
