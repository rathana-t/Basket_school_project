@extends('application')


@section('content')
    @include('/home/components/navbar_user')
    <div class="container mt-5">
        <div class="order">
            {{-- <h1 class="text-center mb-5">
                This order page
            </h1> --}}
            <div class="order mb-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        @foreach ($data as $item)

                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-around">
                                        <p @if ($item->pending == 1) class="active"
                                        @else class="text-muted" @endif>Pending</p>
                                        ---->
                                        <p @if ($item->processing == 1) class="active"
                                            @else class="text-muted" @endif>Processing</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center border-right">
                                            <div class="font-weight-light m-1">
                                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                                <img style="width: 100px;" src="/images/imgProduct/{{ $picture }}"
                                                    alt="" class="mb-1">
                                                <?php break; } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text"> price $ {{ $item->price }}</p>
                                            <p class="card-text">Qty {{ $item->quantity }}</p>
                                            <p class="card-text">total price {{ $item->total }}</p>
                                            <p class="card-text"><small class="text-muted">Order 3 mins ago(not fixed
                                                    yet)</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
