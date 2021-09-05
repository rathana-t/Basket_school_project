@extends('seller\seller')


@section('sidebar-content')
    <a href="{{ url('seller/export/commission', $data_seller->id) }}">
        <button class="btn btn-primary">
            Export Excel
        </button>
    </a>
    <div>
        <div class="row">
            <div class="col-md-1 text-center">
                <strong>
                    No
                </strong>
            </div>
            <div class="col-md-2 text-center">
                <strong>
                    Product
                </strong>
            </div>
            <div class="col-md-1 text-center">
                <strong>
                    Price
                </strong>
            </div>
            <div class="col-md-2 text-center">
                <strong>
                    Qauntity Order
                </strong>
            </div>
            <div class="col-md-2 text-center">
                <strong>
                    Total Price
                </strong>
            </div>
            <div class="col-md-2 text-center">
                <strong>
                    Commission
                </strong>
            </div>
            <div class="col-md-2 text-center">
                <strong>
                    Commission Price
                </strong>
            </div>
        </div>
        <?php
        $no = 1;
        ?>
        @foreach ($report as $item)
            <div class="row">
                <div class="col-md-1 text-center">
                    {{ $no++ }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->pro_name }}
                </div>
                <div class="col-md-1 text-center">
                    {{ $item->pro_price }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->quantity_order }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->total_price }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->commission }}
                </div>
                <div class="col-md-2 text-center">
                    {{ $item->commission_price }}
                </div>
            </div>
        @endforeach
    </div>
@stop
