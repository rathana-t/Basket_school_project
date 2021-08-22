@extends('seller\seller')


@section('sidebar-content')
    @include('seller\components\msg')

    <div class="header-card pb-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card1 shadow-sm rounded">
                    <div class="card border-0">
                        <h5 class="card-header text-white border-0">Total Make</h5>
                        <div class="card-body">
                            <p>
                                <span class="card-title">
                                    <strong>18956$ </strong>
                                </span>
                                <span>/ 2346 Orders</span>
                            </p>
                            <p>20232 Items</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card2 shadow-sm rounded">
                    <div class="card border-0">
                        <h5 class="card-header text-white border-0">New Orders</h5>
                        <div class="card-body">
                            <p>
                                <span class="card-title">
                                    <strong>18956$ </strong>
                                </span>
                                <span>/ 2346 Orders</span>
                            </p>
                            <p>20232 Items</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card3 shadow-sm rounded">
                    <div class="card border-0">
                        <h5 class="card-header text-white border-0">In Processing</h5>
                        <div class="card-body">
                            <p>
                                <span class="card-title">
                                    <strong>18956$ </strong>
                                </span>
                                <span>/ 2346 Orders</span>
                            </p>
                            <p>20232 Items</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card4 shadow-sm rounded">
                    <div class="card border-0">
                        <h5 class="card-header text-white border-0">Old Orders</h5>
                        <div class="card-body">
                            <p>
                                <span class="card-title">
                                    <strong>18956$ </strong>
                                </span>
                                <span>/ 2346 Orders</span>
                            </p>
                            <p>20232 Items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card shadow-sm rounded">
                <div class="p-3">
                    <h5 class="pl-2">
                        Best Sale
                    </h5>
                    <table class="table table-borderless" style="min-height: 300px">
                        <thead>
                            <tr>
                                <th class="col-md-6">Product</th>
                                <th class="col-md-2">Price</th>
                                <th class="col-md-2">Sold</th>
                                <th class="col-md-2">Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr>
                                    <td>....</td>
                                    <td>....</td>
                                    <td>....</td>
                                    <td>....</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card shadow-sm rounded">
                <div class="p-3">
                    <h5 class="pl-2">
                        Out Of Stock
                    </h5>
                    <table class="table table-borderless" style="min-height: 300px">
                        <thead>
                            <tr>
                                <th class="col-md-6">Product</th>
                                <th class="col-md-2">Price</th>
                                <th class="col-md-2">Sold</th>
                                <th class="col-md-2">Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr>
                                    <td>....</td>
                                    <td>....</td>
                                    <td>....</td>
                                    <td>....</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
