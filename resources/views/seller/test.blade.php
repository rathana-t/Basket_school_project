@extends('seller\seller')


@section('sidebar-content')
    <a href="{{ url('seller/export/commission', $data_seller->id) }}">
        <button class="btn btn-primary">
            Export Excel
        </button>
    </a>
    <div>
        <div class="row">
            <div class="col-md-1 text-left" style="max-width: 50px">
                <strong>
                    No
                </strong>
            </div>
            <div class="col-md-2 text-left" style="max-width: 190px">
                <strong>
                    Code Product
                </strong>
            </div>
            <div class="col-md-2 text-left">
                <strong>
                    Product
                </strong>
            </div>
            <div class="col-md-1 text-center">
                <strong>
                    Price
                </strong>
            </div>
            <div class="col-md-2 text-center" style="max-width: 150px">
                <strong>
                    QTY Order
                </strong>
            </div>
            <div class="col-md-2 text-center">
                <strong>
                    Total
                </strong>
            </div>
            <div class="col-md-1 text-right">
                <strong>
                    Commission
                </strong>
            </div>
            <div class="col-md-2 text-right">
                <strong>
                    Commission Price
                </strong>
            </div>
        </div>
        <hr>
        <?php
        $no = 1;
        ?>

        @foreach ($report as $item)
            <div class="row"
                style="color:rgb(0, 0, 0);padding-top:10px;padding-bottom:10px;background-color: {{ $no % 2 == 0 ? 'rgb(192, 192, 192)' : 'rgb(151, 151, 151)' }}"
                style="">
                <div class="col-md-1 text-left" style="max-width: 50px">
                    {{ $no++ }}
                </div>
                <div class="col-md-2 text-left" style="max-width: 190px">
                    {{ $item->code_product }}
                </div>
                <div class="col-md-2 text-left">
                    <span class="limit_text"> {{ $item->pro_name }}</span>
                </div>
                <div class="col-md-1 text-center">
                    {{ $item->pro_price }}
                </div>
                <div class="col-md-2 text-center" style="max-width: 150px">
                    {{ $item->quantity_order }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->total_price }}
                </div>
                <div class="col-md-1 text-right">
                    {{ $item->commission }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->commission_price }}
                </div>
            </div>
        @endforeach
    </div>
@stop
