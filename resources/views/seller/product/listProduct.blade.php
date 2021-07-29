@extends('seller\seller')

@section('sidebar-content')
    @include('seller\components\msg')
    <h1>
        {{ $data_seller->store_name }}
    </h1>

    <div class="category mt-4">
        <h1>
            Category
        </h1>
        <div class="row mt-3">
            @foreach ($main_cate as $item)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <a href="{{ url('/seller/add-product', $item->id) }}">
                            <div class="m-2">
                                <p>{{ $item->name }}</p>
                                <div class="text-center">
                                    <img src="/images/categoryImages/{{ $item->category_img }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <a href="{{ url('/seller/choose-category') }}">
        <button type="button" class="btn btn-success mt-3 mb-3">Create & Sell</button>
    </a>
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
@stop
