@extends('application')

@section('content')

    @include('/home/components/navbar_user')

    <div class="container mt-4 pb-4">
        <h5 class="">History Order</h5>
        @foreach ($data as $item)
            <div class="card mb-3 shadow-sm">
                <div class="row modify p-3">
                    <div class="col-md-3 border-right">
                        <div class="">
                            <p class="small-txt">Order date</p>
                            <p class="big-txt">{{ $item->cre }}</p>
                            <p class="small-txt">Message</p>
                            <p class="small-txt">{{ $item->message }}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="small-txt">Quantity</p>
                                    <p class="big-txt">{{ $item->quantity }}</p>
                                </div>
                                <div class="col">
                                    <p class="small-txt">Total</p>
                                    <p class="big-txt">$ {{ $item->total }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="">
                            <p class="small-txt">DELIVERED ON {{ $item->up }}</p>
                            <P class="orange-txt">Delivered</P>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3 col-sm-5 col">
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid">
                                <?php break; } ?>
                            </div>
                            <div class="col-md-9 col-sm-7 col">
                                <div class="text-left ">
                                    <p class="small-txt">Product Name</p>
                                    <p class="big-txt">{{ $item->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
