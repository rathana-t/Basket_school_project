@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')
    <div class="dashboard">
        <div class="small-card">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="/admin/product" class="Product-btn" role="button">
                        <div class="color3">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5 class="q">
                                        Products
                                    </h5>
                                    <div>
                                        3456
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 ">
                    <a href="/admin/productRequest">
                        <div class="color4">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <h5 class="q">
                                        Pending
                                    </h5>
                                    <div>
                                        3456
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="product">
        <div class="card border-0 shadow rounded">
            <div style="min-height: 500px">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr class="bg-color3 text-white">
                            <th scope="col">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col" class=" text-center">Top</th>
                            <th scope="col">Name</th>
                            <th scope="col" class=" text-center">Price</th>
                            <th scope="col" class=" text-center">Stock</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Category</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pro as $item)
                            <tr class="seller-list">
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
                                <td class="text-center">
                                    {{ $item->top_buy }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td class=" text-center">
                                    ${{ $item->price }}
                                </td>
                                <td class=" text-center">
                                    {{ $item->stock }}
                                </td>
                                <td>
                                    {{ $item->brand_name }}
                                </td>
                                <td>
                                    {{ $item->cat_name }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->updated)->format('d M Y') }}
                                </td>
                                <td>
                                    <a href="product/{{ $item->id }}">
                                        <button type="button" class="btn btn-sm  btn-outline-dark">View</button>
                                    </a>
                                    <button type="button" value="{{ $item->id }}"
                                        class="deletebtn btn btn-sm btn-dark">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pl-4">
                {{ $pro->links() }}
            </div>
        </div>
    </div>


@stop
