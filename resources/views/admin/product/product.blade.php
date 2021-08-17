@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')

    <div class="text-center">
        <h1>
            This is product page
        </h1>
    </div>

    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Image</th>
                <th scope="col">ID</th>
                <th scope="col">Top</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Brand</th>
                <th scope="col">Category</th>
                <th scope="col">Joined</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pro as $item)
                <tr class="seller-list text-center">
                    <td>
                        <a href="product/{{ $item->id }}">
                            <?php foreach (json_decode($item->img_product)as $picture) { ?>
                            <img src="/images/imgProduct/{{ $picture }}" alt="">
                            <?php break; } ?>
                        </a>
                    </td>
                    <td>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->top_buy }}
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
                        {{ $item->brand_name }}
                    </td>
                    <td>
                        {{ $item->cat_name }}
                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    <td>
                        <a href="product/{{ $item->id }}">
                            <button type="button" class="btn btn-info">View</button>
                        </a>
                        <button type="button" value="{{ $item->id }}" class="deletebtn btn btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pro->links() }}

@stop
