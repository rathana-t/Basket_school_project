@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')



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
            <button class="btn btn-primary">
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
                    <div class="card">
<div class="card-body"></div>
                        @if ($index == 0)
                            <div class="text-center">{{ $itemA->store_name }}</div>
                            <div class="text-center">
                                <a href="{{ url('admin/export/single/commission', $itemA->id) }}">
                                    <button class="btn btn-primary">
                                        Export Excel this seller
                                    </button>
                                </a>
                            </div>

                            <div class="row">
                                <div class="col">
                                    No
                                </div>
                                {{-- <div class="col-md-2 text-center">
                                Code Product
                            </div> --}}
                                <div class="col">
                                    Product
                                </div>
                                <div class="col">
                                    Price
                                </div>
                                <div class="col">
                                    Qauntity Order
                                </div>
                                <div class="col">
                                    Total Price
                                </div>
                                <div class="col">
                                    Commission
                                </div>
                                <div class="col">
                                    Commission Price
                                </div>
                            </div>
                            <?php
                            $index = 1;
                            ?>
                        @endif
                        <div class="row">
                            <div class="col">
                                {{ $no++ }}
                            </div>
                            {{-- <div class="col-md-2 text-center">
                            {{ $item->code_product }}
                        </div> --}}
                            <div class="col">
                                {{ $item->pro_name }}
                            </div>
                            <div class="col">
                                {{ $item->pro_price }}
                            </div>
                            <div class="col">
                                {{ $item->quantity_order }}
                            </div>
                            <div class="col">
                                {{ $item->total_price }}
                            </div>
                            <div class="col">
                                {{ $item->commission }}
                            </div>
                            <div class="col">
                                {{ $item->commission_price }}
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
    @endforeach

@stop
