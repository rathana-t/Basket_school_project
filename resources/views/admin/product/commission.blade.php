@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')


    edit
    <form action="{{ url('admin/update/commission') }}" method="POST">
        @csrf
        <input type="text" name="commission" value="{{ $commission }}" id="">
        <button type="submit">update</button>
    </form>

    <div>
        Commission:
        @if ($commission == '')
            not set yet 0 %
        @else
            {{ $commission }} %
        @endif
    </div>
    <br>
    <div>
        <a href="{{ url('admin/export/allcommission') }}">
            <button class="btn btn-primary">
                Export Excel all sellers
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
                        <div class="text-center">{{ $itemA->store_name }}</div>

                        <div class="text-center">
                            <a href="{{ url('admin/export/single/commission', $itemA->id) }}">
                                <button class="btn btn-primary">
                                    Export Excel this seller
                                </button>
                            </a>
                        </div>

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
                        $index = 1;
                        ?>
                    @endif
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
                @endif
            @endforeach
        </div>
    @endforeach

@stop
