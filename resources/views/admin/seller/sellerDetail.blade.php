@extends('admin\admin')

@section('sidebar-content')
    <div class="text-center">
        <h1> {{ $seller->store_name }} has Product </h1>
        <p>
            All Product {{ $sellerHasProductCount }}
        </p>
    </div>
    <div style="min-height: 75vh">

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
                            <?php foreach (json_decode($item->img_product)as $picture) { ?>
                            <img src="/images/imgProduct/{{ $picture }}" alt="">
                            <?php break; } ?>
                        </td>
                        <td scope="row">
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>

                        <td>
                            {{ $item->price }} $
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
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sellerHasProduct->links() }}
@stop
