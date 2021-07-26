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

        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="text-left">Image</th>
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
                        <td>
                            <a href="seller/{{ $item->stock }}">
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="/images/imgProduct/{{ $picture }}" alt="">
                                <?php break; } ?>
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->id }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->top_buy }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->price }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->stock }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->brand_name }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->cat_name }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                {{ $item->created_at }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                <button type="button" class="btn btn-info">View</button>
                            </a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                delete
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('delete', $item->id) }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>




@stop
