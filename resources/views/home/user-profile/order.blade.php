@extends('application')

@section('content')
    @include('/home/components/navbar_user')
    <div class="container mt-4">
        <div class="order">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php
                    $no_pro = 0;
                    ?>
                    @if ($count == 1)
                        @foreach ($data as $item)
                            @if ($item->use_payment_method)
                                <?php
                                $no_pro = 1;
                                ?>
                                <div class="card cs-shadow border-0 mb-4 ">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-around">
                                            <div class="text-mute">
                                                Pending
                                            </div>
                                            ---->
                                            <div class="active">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    fill="currentColor" class="bi bi-hourglass-bottom" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                                                </svg>
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

                                    <div class="card mb-4 cs-shadow border-0">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-around">
                                                <div class=" {{ $item->pending == 1 ? 'active' : 'text-mute' }} ">
                                                    @if ($item->pending == 1)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                            fill="currentColor" class="bi bi-hourglass-bottom"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                                                        </svg>
                                                    @endif
                                                    Pending
                                                </div>
                                                ---->
                                                <div class=" {{ $item->processing == 1 ? 'active' : 'text-mute' }} ">
                                                    @if ($item->processing == 1)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                            fill="currentColor" class="bi bi-hourglass-bottom"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                                                        </svg>
                                                    @endif
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
                                                            class="btn btn-sm btn-dark">Cancel</a>
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
