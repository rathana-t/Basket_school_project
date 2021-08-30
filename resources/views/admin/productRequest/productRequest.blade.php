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

    <div class="card border-0 shadow rounded">
        <div style="min-height: 500px">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="bg-color4 text-white">
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Stock</th>
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
                                <a href="productRequest/{{ $item->id }}">
                                    <img src="/images/imgProduct/{{ $item->img_product }}" alt="">
                                </a>
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td class="text-center">
                                ${{ $item->price }}
                            </td>
                            <td class="text-center">
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
                                <a href="productRequest/{{ $item->id }}">
                                    <button type="button" class="btn btn-dark btn-sm">View</button>
                                </a>
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
@stop
