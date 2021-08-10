@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container">
        <div class="category mt-4">
            <h5>
                All Categoires
            </h5>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($cate as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card shadow-sm mb-3">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="category/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/categoryImages/{{ $item->category_img }}" alt=""
                                                class="img-fluid mb-2">
                                        </div>
                                    </a>
                                    <a href="category/{{ $item->id }}">See all item</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
