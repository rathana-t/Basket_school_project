@extends('seller\seller')

@section('sidebar-content')
    @include('seller\components\msg')
    <h1>
        {{ $data_seller->store_name }}
    </h1>

    <div class="category mt-4">
        <div class="text-center">
            <h1>
                Choose Main Category
            </h1>
        </div>
        <div class="row mt-3">
            @foreach ($main_cate as $item)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm">
                        <a href="{{ url('/seller/add-product', $item->id) }}">
                            <div class="m-2">
                                <p>{{ $item->name }}</p>
                                <div class="text-center">
                                    <img src="/images/categoryImages/{{ $item->category_img }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@stop
