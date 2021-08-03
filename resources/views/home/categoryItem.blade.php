@extends('application')

@section('content')
    <div class="container">
        <h1>
            {{ $cate_name->name }}
        </h1>
        @foreach ($second_cate as $item)
            <h5 class="border-bottom">
                {{ $item->name }}
            </h5>
            <div class="row">
                @foreach ($products as $product)
                    @if ($product->s_cat_id == $item->id)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            {{ $product->name }}
                            <?php foreach (json_decode($product->img_product)as $picture) { ?>
                            <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1 img-fluid">
                            <?php break; } ?>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
@stop
