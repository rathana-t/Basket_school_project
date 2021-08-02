@extends('application')
@section('content')
    <div class="container">
        @include('home/components/selectbyBrand')
        <button class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            Filter
        </button>


        <div class="" id="collapseExample">
            <div class="card card-body">
                <form action="{{ route('search-filter') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-3 list-style">

                                <h5 class="border-bottom">ProductName</h5>
                                <input type="text" class="form-control" id="exampleInputPhone" value="{{ $pro_name }}"
                                    name="pro_name">
                            </div>
                            <div class="col-md-3 list-style">
                                <h5 class="border-bottom">Price</h5>

                                <div class="row">
                                    <label for="min">Min price</label>
                                    <input id="min" class="min" value="{{ $min_price }}" name="min" type="number"
                                        step="5" min="0" />
                                    <label for="max">Max price</label>
                                    <input id="max" class="max" name="max" value="{{ $max_price }}" type="number"
                                        step="-5" min="0" />
                                    {{-- <li><a href="#"></a></li> --}}
                                </div>
                            </div>
                            <div class="col-md-3 list-style">
                                <h5 class="border-bottom">Brand Name</h5>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    <option value="{{ $brand_id }}">All Brands</option>
                                    @foreach ($brand as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                            {{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3 list-style">
                                <h5 class="border-bottom">sort product by price</h5>
                                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                    <option value="h_l">high to low</option>
                                    <option value="l_h">low to high</option>

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-5">
                            search
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="category mt-4">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card shadow-sm">
                            <div class="m-3">
                                <p>{{ $item->name }}</p>
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1 img-fluid">
                                <?php break; } ?>
                                <a href="{{ route('detail', $item->id) }}">See all</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
