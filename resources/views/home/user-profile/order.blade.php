@extends('application')

@section('content')
    @include('/home/components/navbar_user')
    <div class="container mt-4">
        <div class="order">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $no_pro = 0;
                    ?>
                    @if ($count == 1)
                        @foreach ($data as $item)
                            @if ($item->use_payment_method)
                                <?php
                                $no_pro = 1;
                                ?>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-around">
                                            <div class="text-mute">
                                                Pending
                                            </div>
                                            ---->
                                            <div class="active">
                                                Processing
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 text-center border-right">
                                                <img src="/images/imgProduct/{{ $item->img_product }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">
                                                    Quantity: {{ $item->quantity }}
                                                    @if ($item->quantity > 1)
                                                        items
                                                    @else
                                                        item
                                                    @endif
                                                </p>
                                                <p class="card-text">Total: $ {{ $item->total }}</p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        Order 3 mins ago
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-center">
                                                    <div style="color: rgb(61, 192, 0)">
                                                        This order has already been paid
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($item->pending == 1 || $item->processing == 1)
                                @if ($item->user_cancel == 0)
                                    <?php
                                    $no_pro = 1;
                                    ?>

                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-around">
                                                <div class=" {{ $item->pending == 1 ? 'active' : 'text-mute' }} ">
                                                    Pending
                                                </div>
                                                ---->
                                                <div class=" {{ $item->processing == 1 ? 'active' : 'text-mute' }} ">
                                                    Processing
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 text-center border-right">
                                                    <img src="/images/imgProduct/{{ $item->img_product }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                    <p class="card-text">
                                                        Quantity: {{ $item->quantity }}
                                                        @if ($item->quantity > 1)
                                                            items
                                                        @else
                                                            item
                                                        @endif
                                                    </p>
                                                    <p class="card-text">Total: $ {{ $item->total }}</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            Order 3 mins ago
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer ">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-left">
                                                        @if ($item->processing == 1)
                                                            <div style="color: rgb(61, 192, 0)">
                                                                {{ $item->processing_message }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="text-right">
                                                        <a href="{{ url('/user_cancel_order', $item->order_id) }}"
                                                            class="btn btn-outline-danger">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif

                    @if ($count == 0 || $no_pro == 0)
                        <div class="tekxt-center mt-4">
                            <a href="{{ url('/product') }}" type="button" class="btn btn-info text-white">
                                Your Order is Empty! Go Shopping ?
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
