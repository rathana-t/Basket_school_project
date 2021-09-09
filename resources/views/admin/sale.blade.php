@extends('admin\admin')

@section('sidebar-content')
    <div class="dashboard">
        <div class="small-card">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="/admin/seller/{{ $seller->id }}">
                        <div class="card shadow-sm rounded bg-light">
                            <div class="card-body text-dark">
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
                        <div class="card shadow-sm rounded bg-dark">
                            <div class="card-body text-white">
                                <div class="q">
                                    Sold
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

    <?php
    $no = 1;
    ?>
    <a href="{{ url('admin/export/single/commission', $seller->id) }}" class="btn btn-primary col-3 mb-3">
        Export
    </a>
    <div id="product">
        <div class="card border-0 cs-shadow rounded">
            <div style="min-height: 500px">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Pirce</th>
                            <th scope="col" class="text-center">Qauntity</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col" class="text-center">Commission</th>
                            <th scope="col" class="text-center">Commission Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $item)
                            <tr class="seller-list">
                                <td class="text-center">
                                    <div>
                                        {{ $no++ }}
                                    </div>
                                </td>
                                <td>
                                    <div class="short">
                                        {{-- <img src="/images/imgProduct/{{ $item->img_product }}" alt=""> --}}
                                        {{ $item->pro_name }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        {{ $item->pro_price }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        {{ $item->quantity_order }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        {{ $item->total_price }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        {{ $item->commission }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        {{ $item->commission_price }}
                                        <a href="{{ url('product', $item->pro_id) }}" target="blank"
                                            style="float: right">
                                            <button type="button" class="btn btn-sm  btn-outline-dark">View</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pl-2" style="margin-top:-67px">
                {{ $report->links() }}
            </div>
        </div>
    </div>

@stop
