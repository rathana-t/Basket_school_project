@extends('layouts\sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            @if (Session::has('product_add'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('product_add') }}
                </div>
            @endif
        </div>
        <h1>
            {{ $data_seller->store_name }}
        </h1>


        <div class="category mt-4">
            <h1>
                Category
            </h1>
            <div class="row mt-3">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-2">
                            <p>Laptop</p>
                            <div class="text-center">
                                <img src="https://i2.wp.com/techfortuner.com/wp-content/uploads/2021/03/best-gaming-laptops-with-strong-gpu.jpg"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-2">
                            <p>Pc Parts</p>
                            <div class="text-center">
                                <img src="https://press-start.com.au/wp-content/uploads/2020/08/Amazon-PC-Parts-1.jpg"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-2">
                            <p>Peripherals</p>
                            <div class="text-center">
                                <img src="https://www.gadgetnutz.com/wp-content/uploads/2021/01/hyperx_ces2021.jpg" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <div class="m-2">
                            <p>Network</p>
                            <div class="text-center">
                                <img src="https://cdn.mos.cms.futurecdn.net/yL7k3fYHWZE98det6kuQXY.jpg" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-left">
            <a style="margin:10px " href="{{ url('/seller/add-product') }}">
                <button type="button" class="btn btn-success">Create & Sell</button>
            </a>
        </div>
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
                                {{-- <a href="seller/{{ $item->id }}"> --}}
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
    </div>
@stop
