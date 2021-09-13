@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')

    <style>
        .limit_text {
            display: block;
            width: 150px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;

        }

    </style>

    <form action="{{ url('admin/update/commission') }}" method="POST">
        @csrf
        <h5>
            Commission
        </h5>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" name="commission" value="{{ $commission }}" id="" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </div>
    </form>

    <small class="text-muted form-text">
        Commission:
        @if ($commission == '')
            not set yet 0 %
        @else
            {{ $commission }} %
        @endif
    </small class="text-muted form-text">
    <div>
        <a href="{{ url('admin/export/allcommission') }}">
            <button class="btn btn-primary" style="margin-top: 15px">
                Export All Shop
            </button>
        </a>
    </div>
    @foreach ($seller as $itemA)
        <br>
        <div>
            <?php
            $no = 1;
            $index = 0;
            ?>
            @foreach ($report as $item)
                @if ($itemA->id == $item->seller_id)
                    @if ($index == 0)
                        <div class="text-left">
                            Seller name: {{ $itemA->store_name }}
                        </div>
                        <div class="text-center">
                            <a href="{{ url('admin/export/single/commission', $itemA->id) }}">
                                <button class="btn btn-sm btn-primary">
                                    Export Excel this seller
                                </button>
                            </a>
                        </div>
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
                        $index = 1;
                        ?>
                    @endif
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
                @endif
            @endforeach
        </div>
    @endforeach

@stop
