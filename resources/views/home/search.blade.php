@extends('application')
@section('content')
    <style>
        .search-filter label {
            color: rgba(50, 50, 255, 0.842)
        }

    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <form action="{{ route('search-filter') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="search-filter">

                            <div class="m-3">
                                <label for="exampleInputEmail1">Product</label>
                                <input type="text" class="form-control" id="exampleInputPhone" placeholder="Product name"
                                    value="{{ $pro_name }}" name="pro_name">

                                <label for="exampleInputEmail1" class="mt-2">Sort</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                    <option value="h_l" @if ($sort == 'h_l') selected @endif>High-low</option>
                                    <option value="l_h" @if ($sort == 'l_h') selected @endif>Low-high</option>
                                </select>

                                <label for="exampleInputEmail1" class="mt-2">Price</label>
                                <div class="row">
                                    <div class="col">
                                        <input id="min" class="form-control" placeholder="Min" value="{{ $min_price }}"
                                            name="min" type="number" min="0" />
                                    </div>
                                    <div class="col">
                                        <input id="max" class="form-control" placeholder="Max" name="max"
                                            value="{{ $max_price }}" type="number" min="0" />
                                    </div>
                                </div>

                                <label for="exampleInputEmail1" class="mt-2">brand</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    <option value="{{ $brand_id }}">All brands</option>
                                    @foreach ($brand as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                @foreach ($data as $item)
                    <div class="row">
                        <div class="card mb-2">
                            <div class="row p-2">
                                <div class="col-md-5 text-center border-right">
                                    <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                    <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1 img-fluid">
                                    <?php break; } ?>
                                </div>
                                <div class="col-md-7 ">
                                    <div> <a>{{ $item->name }}</a> </div>
                                    <div class="text-muted"> <a>Price: {{ $item->price }} &nbsp;$</a> </div>
                                    <a href="{{ url('/product', $item->id) }}">
                                        <button type="button" class="btn btn-info mt-3">View detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
