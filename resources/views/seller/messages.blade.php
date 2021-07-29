@extends('seller\seller')


@section('sidebar-content')
    <div class="container">
        <div class="text-center mb-5">
            <h1>
                This is messages page
            </h1>
        </div>

        @foreach ($sellerHasMessage as $item)
            @if ($item->sent == 1)
                <div class="card mb-3" style=" background: rgba(231, 216, 216, 0.4);">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="https://www.logitech.com/content/dam/logitech/en/products/mice/mx-master-3/gallery/mx-master-product-gallery-graphite-top.png"
                                alt="..." class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product name</h5>
                                <p class="card-text" style="overflow-y: hidden; height:60px; width:100px">
                                    {{ $item->msg }}
                                </p>
                                <p class="card-text"><small class="text-muted">Date: {{ $item->created_at }}</small></p>
                                <a href="messages/{{ $item->id }}">
                                    <button type="button" class="btn btn-info">Read full messages</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="https://www.logitech.com/content/dam/logitech/en/products/mice/mx-master-3/gallery/mx-master-product-gallery-graphite-top.png"
                                alt="..." class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product name</h5>
                                <p class="card-text" style="overflow-y: hidden; height:60px; width:100px">
                                    {{ $item->msg }}
                                </p>
                                <p class="card-text"><small class="text-muted">Date: {{ $item->created_at }}</small></p>
                                <a href="messages/{{ $item->id }}">
                                    <button type="button" class="btn btn-info">Read full messages</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@stop
