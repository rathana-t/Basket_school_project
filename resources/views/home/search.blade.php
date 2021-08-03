@extends('application')
@section('content')
    <div class="container">
        <div class="mt-4 text-center">
            <button class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Advance Seach
            </button>
        </div>

        <div class="collapse mt-3" id="collapseExample">
            <form action="{{ route('search-filter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card p-3 shadow-sm">
                            <div class="row">
                                <div class="col-md-3 list-style">
                                    <input type="text" class="form-control" id="exampleInputPhone"
                                        placeholder="Product name" value="{{ $pro_name }}" name="pro_name">
                                </div>
                                <div class="col-md-4 list-style">
                                    <div class="row">
                                        <div class="col">
                                            <input id="min" class="form-control" placeholder="Min"
                                                value="{{ $min_price }}" name="min" type="number" min="0" />
                                        </div>
                                        <div class="mt-2">
                                            ->
                                        </div>
                                        <div class="col">
                                            <input id="max" class="form-control" placeholder="Max" name="max"
                                                value="{{ $max_price }}" type="number" min="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 list-style">
                                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                        <option value="{{ $brand_id }}">Brands</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                                {{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-3 list-style">
                                    <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                        <option value="h_l" @if ($sort == 'h_l') selected @endif>High-low</option>
                                        <option value="l_h" @if ($sort == 'l_h') selected @endif>Low-high</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">
                                    search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-3 search_product border-top">
            <h1 class="text-center">
                Results
            </h1>
            @foreach ($data as $item)
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="mb-2 shadow-sm">
                            <div class="row p-2">
                                <div class="col-md-5 text-center border-right">
                                    <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                    <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1 img-fluid">
                                    <?php break; } ?>
                                </div>
                                <div class="col-md-7 ">
                                    <div> <a>{{ $item->name }}</a> </div>
                                    <div class="text-muted"> <a>Price: {{ $item->price }} &nbsp;$</a> </div>
                                    <a>
                                        <button type="button" class="btn btn-info mt-3">View detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
