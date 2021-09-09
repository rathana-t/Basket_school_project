@extends('admin\admin')

@section('sidebar-content')

    <div class="dashboard">
        <div class="small-card">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="/admin/seller/{{ $seller->id }}">
                        <div class="card shadow-sm rounded bg-dark">
                            <div class="card-body text-white">
                                <div class="q">
                                    Product
                                </div>
                                <div>
                                    {{-- {{ $proCount }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 ">
                    <a href="/admin/seller/{{ $seller->id }}/sale">
                        <div class="card shadow-sm rounded bg-light">
                            <div class="card-body text-dark">
                                <div class="q">
                                    Sale
                                </div>
                                <div>
                                    {{-- {{ $proPCount }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h5 class="pb-3">
            <span style="color: orangered">{{ $seller->store_name }}</span> has Product
            {{ $sellerHasProductCount }}
        </h5>
    </div>

    <div class="seller-product">
        <div class="row">
            @foreach ($sellerHasProduct as $item)
                <div class="col-md-3 pb-3">
                    <div class="card border-0 cs-shadow rounded">
                        <div class="pl-3 pr-3 pt-2 pb-2 border-bottom">
                            <img src="/images/imgProduct/{{ $item->img_product }}" alt="" class="img-fluid">
                            <div class="pt-2 short">
                                {{ $item->name }}
                            </div>
                            <div class="short">
                                ${{ $item->price }}
                            </div>
                        </div>
                        <div class="pl-3 pr-3 pt-2 pb-2 text-right">
                            <a href="/admin/product/{{ $item->id }}">
                                <button type="button" class="btn btn-sm btn-outline-dark">View</button>
                            </a>
                            <button type="button" class="btn btn-sm btn-dark">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $sellerHasProduct->links() }}

    {{-- <div style="min-height: 75vh">
        <table class="table table-hover">
            <thead>
                <tr class="___class_+?3___">
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
                    <tr class="seller-list">
                        <td>
                            <a href="/admin/product/{{ $item->id }}">
                                <img src="/images/imgProduct/{{ $item->img_product }}" alt="">
                            </a>
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
                            <a href="/admin/product/{{ $item->id }}">
                                <button type="button" class="btn btn-info">View</button>
                            </a>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@stop
