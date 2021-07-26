@extends('layouts\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is product page
            </h1>
            <div class="text-left">
                <a style="margin:10px " href="{{ url('seller/add-product') }}">
                    <button type="button" class="btn btn-success">Create & Sell</button>
                </a>
            </div>
        </div>

        <div class="text-center">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">ID</th>
                        <th scope="col" class="text-left">Top</th>
                        <th scope="col" class="text-left">Name</th>
                        <th scope="col" class="text-left">Price</th>
                        <th scope="col" class="text-left">Stock</th>
                        <th scope="col" class="text-left">Brand</th>
                        <th scope="col" class="text-left">Category</th>
                        <th scope="col" class="text-left">Joined</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pro as $item)
                        <tr class="seller-list">
                            <th scope="row" class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->id }}
                                </a>
                            </th>
                            <td class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->top_buy }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td class="text-left">$
                                <a href="product/{{ $item->id }}">
                                    {{ $item->price }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->stock }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->brand_name }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->cat_name }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="product/{{ $item->id }}">
                                    {{ $item->created_at }}
                                </a>
                            </td>
                            <td class="text-right">
                                <a href="product/{{ $item->id }}">
                                    <button type="button" class="btn btn-info">View</button>
                                </a>
                                <a href="edit/product/{{ $item->id }}">
                                    <button style="margin-left:5px" type=" button" class="btn btn-primary">Edit</button>
                                </a>
                                <button style="margin-left:20px" type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
