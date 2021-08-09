@extends('application')

@section('content')
    @include('/home/components/navigation')
    <div class="container">
        <div class="cate-item">
            <h1>
                {{ $cate_name->name }}
            </h1>
            @foreach ($second_cateItem as $item)
                <h5 class="border-bottom">
                    {{ $item->name }}
                </h5>
                <div class="row">
                    @foreach ($products as $product)
                        @if ($product->s_cat_id == $item->id)
                            <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                                <a href="{{ route('detail', $product->id) }}">
                                    <?php foreach (json_decode($product->img_product)as $picture) { ?>
                                    <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1">
                                    <?php break; } ?>
                                    <div> <a>{{ $product->name }}</a> </div>
                                    <div class="text-muted"> <a>{{ $product->price }} &nbsp;$</a> </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@stop
