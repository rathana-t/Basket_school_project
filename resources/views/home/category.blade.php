@extends('application')

@section('content')
    <div class="container">
        <div class="category mt-4">
            <h1>
                All Categoires
            </h1>
            <div class="row mt-4">
                @foreach ($cate as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card shadow-sm mb-3">
                            <div class="m-3">
                                <p>{{ $item->name }}</p>
                                <div class="text-center">
                                    <img src="/images/categoryImages/{{ $item->category_img }}" alt=""
                                        class="img-fluid mb-2">
                                </div>
                                <a href="">See more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
