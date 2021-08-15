@extends('seller\seller')

@section('sidebar-content')
    @include('seller\components\msg')
    <div class="category mt-4">
        <div class="text-center">
            <h5>
                Choose Main Category
            </h5>
        </div>
        <div class="row mt-3">
            @foreach ($main_cate as $item)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="card shadow-sm mb-3">
                        <div class="p-3">
                            <a href="{{ url('/seller/add-product', $item->id) }}">
                                <p>{{ $item->name }}</p>
                                <div class="text-center">
                                    <img src="/images/categoryImages/{{ $item->category_img }}" alt="" class="img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@stop
