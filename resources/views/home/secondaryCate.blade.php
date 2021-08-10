@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container">
        <div class="category mt-4 mb-4">
            <div class="mb-3">
                <h5>
                    Subcategory
                </h5>
            </div>
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($second_cate as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card shadow-sm mb-3">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="/smallcate/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                                                class="img-fluid mb-2">
                                        </div>
                                    </a>
                                    <a href="">See all</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
