@extends('layouts\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1> {{ $seller->store_name }} has Product </h1>
            <p>
                All Product {{ $sellerHasProductCount }}
            </p>
        </div>
        
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">Image</th>
                    <th scope="col">ID</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Upload at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellerHasProduct as $item)
                    <tr class="seller-list text-center">
                        <td>
                            <a href="seller/{{ $item->stock }}">
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="/images/imgProduct/{{ $picture }}" alt="">
                                <?php break; } ?>
                            </a>
                        </td>
                        <td scope="row">
                            <a href="seller/{{ $item->id }}">
                                {{ $item->id }}
                            </a>
                        </td>
                        <td>
                            <a href="seller/{{ $item->id }}">
                                {{ $item->name }}
                            </a>
                        </td>

                        <td>
                            <a href="seller/{{ $item->id }}">
                                {{ $item->price }} $
                            </a>
                        </td>
                        <td>
                            <a href="seller/{{ $item->id }}">
                                {{ $item->stock }}
                            </a>
                        </td>
                        <td>
                            <a href="seller/{{ $item->id }}">
                                {{ $item->created_at }}
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info">View</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
