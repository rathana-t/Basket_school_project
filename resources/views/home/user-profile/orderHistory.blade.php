@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <h6 class="mt-4">History Order</h6>
        @foreach ($data as $item)
            <div class="row mt-2 modify">
                <div class="col-md-3 border">
                    <div class="card mt-2">
                        <p class="small-txt">ORDER PLACED</p>
                        <p class="big-txt">{{ $item->cre }}</p>
                        <p class="small-txt">QUANTITY</p>
                        <p class="big-txt">{{ $item->quantity }}</p>
                        <p class="small-txt">TOTAL PRICE</p>
                        <p class="big-txt">$ {{ $item->total }}</p>
                    </div>
                </div>
                <div class="col-md-9 border">
                    <div class="card mt-2">
                        <p class="small-txt">DELIVERED ON {{ $item->up }}</p>
                        <P class="orange-txt">Delivered</P>
                    </div>
                    <div class="row d-flex justify-content-between border-top">
                        <div class="col-md-3 col-sm-5 col">
                            <div class="card">
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid">
                                <?php break; } ?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-7 col">
                            <div class="text-left mt-2">
                                <p class="small-txt">Product Name</p>
                                <p class="big-txt">{{ $item->name }}</p>
                                <p class="small-txt">Brand </p>
                                <p class="big-txt">{{ $item->brand }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


@endsection
