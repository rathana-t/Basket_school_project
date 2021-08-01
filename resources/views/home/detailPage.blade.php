@extends('application')

@section('content')
    <div class="container set-margin">
        {{-- Unfinsih --}}
        @foreach ($detail_pro as $detail)

            <div class="row">
                <div class="col-md-2 d-flex">
                    <?php foreach (json_decode($detail->img_product)as $picture) { ?>
                    <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid"
                        style="height: 150px;margin:5px;">
                    <?php } ?>
                </div>
            </div>

            <div class="view">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <?php foreach (json_decode($detail->img_product)as $picture) { ?>
                        <img src="{{ asset('images/imgProduct') }}/{{ $picture }}" alt="" class="img-fluid"
                            style="height: 400px;width:400px">
                        <?php break; } ?>
                    </div>
                    <div class="col-md-6">
                        <h5>
                            {{ $detail->name }}
                        </h5>
                        <p class="font-weight-light m-1 sizetext">
                            #HIR578789
                        </p>
                        <p class="text-primary m-1">
                            {{ $detail->se_cate }} in
                            {{ $detail->cat_name }}
                        </p>
                        <p class="text-primary m-1">
                            {{ $detail->brand_name }}
                        </p>
                        <p class="font-weight-light m-1 sizetext">
                            Selected by
                        </p>
                        <p class="border-bottom m-1 font-weight-bold">
                            PLP
                        </p>
                        <p class="text-danger m-1 ">
                            {{ $detail->price }}
                        </p>
                        <button type="button" class="btn btn-primary">Description</button>
                        <div class="card description">
                            <p class="text-left m-2">
                                {{ $detail->description }}
                            </p>
                        </div>
                        <div class="mt-2">
                            Dimensions:<strong class="w-50">15.60 x 304.10 x 212.40 cm</strong>
                        </div>
                        <p class="text-primary">Color[?]</p>
                        <div class="set">
                            <button type="button" class="btn">
                                <p class="mt-2">Black</p>
                                <p class="text-success">Have in stock</p>
                            </button>
                            <button type="button" class="btn">
                                <p class="mt-2">Black</p>
                                <p class="text-success">Have in stock</p>
                            </button>
                            <button type="button" class="btn">
                                <p class="mt-2">Black</p>
                                <p class="text-success">Have in stock</p>
                            </button>
                        </div>
                        <p class="text-primary mt-3">Size[?]</p>
                        <div class="set">
                            <button type="button" class="btn">
                                <p class="mt-2">As photo</p>
                                <p class="text-success">Have in stock</p>
                            </button>
                        </div>
                        <p class="font-weight-light mt-2 sizetext">Free Delivery in cambodia</p>
                        <a href="{{ route('add_to_cart', $detail->id) }}" class="btn btn-primary">Add to Cart | <img
                                src="/images/vector.png"></a>
                        <div class="favourite">
                            <a href="#" class="font-weight-light"><img src="/images/heart.png">Add to Favourite</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 related-product">
                <p class="font-weight-light">All related Product</p>
                <div class="row">
                    @for ($i = 0; $i <= 20; $i++)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <img src="https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/macbook-pro-13-og-202011?wid=1200&hei=630&fmt=jpeg&qlt=95&.v=1604347427000"
                                class="img-fluid">
                            <div>
                                <p class="text-left w-100">
                                    Aluminium Alloy Waterproof Round Desktop Gaming Mouse Mat Pad
                                    Computer Accessory
                                </p>
                                <p class="custom-margin">#SRD123456</p>
                                <ul class="list-unstyled custom-margin" style="display:flex">
                                    <li class="box" style="border:1px solid #000;background: #000;"></li>
                                    <li class="box" style="border:1px solid silver;background: silver;"></li>
                                </ul>
                                <p class="text-danger custom-margin">$1500.00</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
    </div>
    @endforeach

@stop
