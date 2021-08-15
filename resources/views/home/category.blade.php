@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container">
        <div class="category pt-3">
            <h5>
                All Categoires
            </h5>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($cate as $item)
                        <div class="col-xs-6 col-sm-4">
                            <a href="category/{{ $item->id }}">
                                <div class="card-banner align-items-end background-img mb-4"
                                    style="background-image: url('/images/categoryImages/{{ $item->category_img }}')">
                                    <div class="caption m-4 w-100">
                                        <h5 class="text-white card-title">
                                            {{ $item->name }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
