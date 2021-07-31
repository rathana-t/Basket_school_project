@extends('application')

@section('content')
    <div class="container">
        @include('home/components/selectbyBrand')
        <h1>
            {{ $smallCateName->name }}
        </h1>
        <div class="cate-item">
            <div class="row mt-3">
                @foreach ($smallCate as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="text-center mb-4">
                            <a href="{{ route('detail', $item->id) }}">
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="/images/imgProduct/{{ $picture }}" alt="" class="img-fluid mb-1">
                                <?php break; } ?><br>
                                <a>{{ $item->name }}</a>
                                <div>
                                    <a>{{ $item->price }} &nbsp;$</a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
