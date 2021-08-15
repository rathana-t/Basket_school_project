@extends('application')


@section('content')
    @include('/home/components/navbar_user')
    <div class="container mt-4">
        <div class="order">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($data as $item)
                        @if ($item->pending == 1 && ($item->delivery == 1 || $item->delivery == 2))
                            <div class="card mb-3">
                                <div class="card-header" style="background-color: rgb(161, 161, 161)">
                                    <div class="d-flex justify-content-around">
                                        <div class="text-white">
                                            Order was cancelled message " {{ $item->message }} "
                                        </div>
                                        <div class="remove-btn">
                                            <a href="{{ url('/delete-order', $item->order_id) }}" class="p-3">
                                                Remove
                                            </a>
                                        </div>

                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-right">
                                            <div class="font-weight-light m-1">
                                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                                <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid">
                                                <?php break; } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">Price: $ {{ $item->price }}</p>
                                            <p class="card-text">Quantity: {{ $item->quantity }} item</p>
                                            <p class="card-text">Total: {{ $item->total }}</p>
                                            <p class="card-text"><small class="text-muted">Order 3 mins ago(not fixed
                                                    yet)</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($item->pending == 1 || $item->processing == 1)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="d-flex justify-content-around">
                                        <div @if ($item->pending == 1) class="active"
                                        @else class="text-muted" @endif>Pending</div>
                                        ---->
                                        <div @if ($item->processing == 1) class="active"
                                            @else class="text-muted" @endif>Processing</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-right">
                                            <div class="font-weight-light m-1">
                                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                                <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid">
                                                <?php break; } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">Price: $ {{ $item->price }}</p>
                                            <p class="card-text">Quantity: {{ $item->quantity }} item</p>
                                            <p class="card-text">Total: {{ $item->total }}</p>
                                            <p class="card-text"><small class="text-muted">Order 3 mins ago(not fixed
                                                    yet)</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
