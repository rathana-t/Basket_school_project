@extends('application')
@section('content')
    <div class="container pt-4">
        <div class="search">

            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <form action="{{ route('search-filter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="search-filter">
                                <div class="m-3">
                                    <label for="exampleInputEmail1">Product</label>
                                    <label class="styled-select">
                                        <select name="search_fill">
                                            <option value="name" {{ $fill_searcch == 'name' ? 'selected' : '' }}>Name
                                                Product</option>
                                            <option value="code" {{ $fill_searcch == 'code' ? 'selected' : '' }}>Code
                                                Product</option>
                                        </select>
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Search..."
                                        value="{{ $pro_name }}" name="pro_name">
                                    <label for="exampleInputEmail1" class="mt-2">brand</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                        <option value="{{ $brand_id }}">All brands</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="exampleInputEmail1" class="mt-2">Price</label>
                                    <div class="row">
                                        <div class="col">
                                            <input id="min" class="form-control" placeholder="Min"
                                                value="{{ $min_price }}" name="min" type="number" min="0" />
                                        </div>
                                        <div class="col">
                                            <input id="max" class="form-control" placeholder="Max" name="max"
                                                value="{{ $max_price }}" type="number" min="0" />
                                        </div>
                                    </div>

                                    <label for="exampleInputEmail1" class="mt-2">Sort</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="sort">
                                        <option value="h_l" @if ($sort == 'h_l') selected @endif>High-low</option>
                                        <option value="l_h" @if ($sort == 'l_h') selected @endif>Low-high</option>
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
                <div class="col-md-9 search">
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-xs-6 col-sm-4">
                                <div class="card mb-3">
                                    <div class="m-3">
                                        <a href="/product/product/{{ $item->id }}">
                                            <img src="{{ asset('images/imgProduct') }}/{{ $item->img_product }}"
                                                alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="border-top">
                                        <div class="pl-4 pr-4 pb-2 pt-2">
                                            <div class="product_name">
                                                <a href="/product/product/{{ $item->id }}">
                                                    <div class="b">
                                                        {{ $item->name }}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="price">
                                                <a href="/product/product/{{ $item->id }}">
                                                    ${{ $item->price }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{ $data->links() }}
    </div>
@endsection
