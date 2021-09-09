@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')
    <div class="dashboard">
        <div class="small-card">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="/admin/product" class="Product-btn" role="button">
                        <div class="card shadow-sm rounded bg-dark">
                            <div class="card-body text-white">
                                <div class="q">
                                    Products
                                </div>
                                <div>
                                    {{ $proCount }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 ">
                    <a href="/admin/productRequest">
                        <div class="card shadow-sm rounded bg-light">
                            <div class="card-body text-dark">
                                <div class="q">
                                    Incomplete
                                </div>
                                <div>
                                    {{ $proPCount }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="product">
        <div class="card border-0 cs-shadow rounded">
            <div style="min-height: 500px">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th scope="col" class=" text-center">ID</th>
                            <th scope="col" class=" text-center">Image</th>
                            <th scope="col" class=" text-center">Sale</th>
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
                                <td class=" text-center">
                                    {{ $item->id }}
                                </td>
                                <td class=" text-center">
                                    <a href="product/{{ $item->id }}">
                                        <img src="/images/imgProduct/{{ $item->img_product }}" alt="">
                                    </a>
                                </td>
                                
                                <td class="text-center">
                                    {{ $item->top_buy }}
                                </td>
                                <td>
                                    <div class="short">
                                        {{ $item->name }}
                                    </div>
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
                                    {{ Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}
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
            <div class="pl-2">
                {{ $pro->links() }}
            </div>
        </div>
    </div>


@stop
