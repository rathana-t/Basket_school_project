@extends('application')

@section('content')
    <div class="container">
        <div class="category mt-4">
            <h1>
                Category
            </h1>
            <div class="row mt-3">
                @foreach ($cate as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card mb-3">
                            <div class="m-3">
                                <p>{{ $item->name }}</p>
                                <div class="text-center">
                                    <img src="/images/categoryImages/{{ $item->category_img }}" alt=""
                                        class="img-fluid mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
