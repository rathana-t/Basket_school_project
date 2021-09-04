@extends('seller\seller')


@section('sidebar-content')

    <div>
        <div class="row">
            <div class="col-md-2">
                <strong>
                    No
                </strong>
            </div>
            <div class="col-md-2">
                <strong>
                    Seller name
                </strong>
            </div>
            <div class="col-md-2">
                <strong>
                    Product
                </strong>
            </div>
            <div class="col-md-2">
                <strong>
                    Price
                </strong>
            </div>
            <div class="col-md-2">
                <strong>
                    Qauntity
                </strong>
            </div>
            <div class="col-md-2">
                <strong>
                    Total
                </strong>
            </div>
        </div>
        {{-- @for ($i = 0; $i < 10; $i++)
            <div class="row">
                <div class="col-md-2">
                    {{ $data_seller->store_name }}
                </div>
                <div class="col-md-2">
                    Product
                </div>
                <div class="col-md-2">
                    Price
                </div>
                <div class="col-md-2">
                    Qauntity
                </div>
                <div class="col-md-2">
                    Total
                </div>
            </div>
        @endfor --}}
        <?php
        $no = 1;
        ?>
        @foreach ($product as $item)
            <div class="row">
                <div class="col-md-2">
                    {{ $no++ }}
                </div>
                <div class="col-md-2">
                    {{ $data_seller->store_name }}
                </div>
                <div class="col-md-2">
                    {{ $item->name }}
                </div>
                <div class="col-md-2">
                    {{ $item->price }}
                </div>
                <div class="col-md-2">
                    {{ $item->quantity }}
                </div>
                <div class="col-md-2">
                    {{ $item->quantity * $item->price }}
                </div>
            </div>
        @endforeach
    </div>
@stop
