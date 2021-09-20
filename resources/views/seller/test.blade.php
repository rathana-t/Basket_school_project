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
                No
            </div>
            <div class="col-md-2 text-left" style="max-width: 190px">
                Code Product
            </div>
            <div class="col-md-2 text-left">
                Product
            </div>
            <div class="col-md-1 text-center">
                Price
            </div>
            <div class="col-md-2 text-center" style="max-width: 150px">
                QTY Order
            </div>
            <div class="col-md-2 text-center">
                Total
            </div>
            <div class="col-md-1 text-center">
                Commission
            </div>
            <div class="col-md-2 text-center">
                Commission Price
            </div>
        </div>
        <hr>
        <?php
        $no = 1;
        ?>

        @foreach ($report as $item)
            <div class="row pb-3">
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
                <div class="col-md-1 text-center">
                    {{ $item->commission }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->commission_price }}
                </div>
            </div>
        @endforeach
    </div>
@stop
