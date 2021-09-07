@extends('application')

@section('content')
    @include('/home/components/navigation')

    <style>
        .se-cate .opacity {
            opacity: 0.5;
        }

        .se-cate .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
        }

        .se-cate img {
            height: 200px;
            object-fit: cover;
        }

    </style>
    <div class="container">
        <div class="pt-3">
            <h5>
                Subcategory
            </h5>
        </div>
        <div class="row se-cate">
            @foreach ($second_cate as $item)
                <div class="col-md-3">
                    <div class="card bg-dark border-0 mb-3">
                        <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                            class="card-img opacity">
                        <div class="card-img-overlay text-white">
                            <h5 class="text-white pb-2">
                                {{ $item->name }}
                            </h5>
                            <a href="/smallcate/{{ $item->id }}" class="btn btn-light"> See more </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="category pt-3 ">
            <div class="category-item">
                <div class="row mt-3">
                    @foreach ($second_cate as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="m-3">
                                    <p>{{ $item->name }}</p>
                                    <a href="/smallcate/{{ $item->id }}">
                                        <div class="text-center">
                                            <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt=""
                                                class="img-fluid mb-2">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
@stop
