@extends('application')

@section('content')
    @include('/home/components/navigation')

    <div class="container">
        <div class="brand mt-4">
            <h5>
                Brand
            </h5>
            <div class="brand-item">
                <div class="row">
                    @foreach ($brands as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="card mb-3">
                                <div class="p-3 text-center">
                                    <a href="/brand/{{ $item->id }}">
                                        <img src="/images/brandImages/{{ $item->brand_img }}" alt="" class="img-fluid">
                                        <div class="border-bottom pb-1"></div>
                                        @foreach ($result as $a)
                                            @if ($a->brand_id == $item->id)
                                                <p>{{ $a->total_pro }}
                                            @endif
                                        @endforeach
                                        Products</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
