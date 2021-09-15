@extends('seller\seller')


@section('sidebar-content')
    <div class="container">

        <div class="card text-center mt-5">
            <div class="card-header">
                <div class="product-list text-left">
                    <img src="{{ asset('images/imgProduct') }}/{{ $message->img_product }}" alt=""
                        class="img-fluid">
                    {{ $message->name }}

                </div>
            </div>
            <div class="card-body">
                <div class="text-left">
                    Message:
                    <p class="text-left">
                        {{ $message->msg }}
                    </p>
                </div>

                <a href="{{ route('edit_product', $message->pro_id) }}" class="btn btn-primary">Edit now</a>
            </div>
        </div>
        <a href="/seller/messages" class="btn-sm btn btn-secondary mt-3">
            back
        </a>
    </div>
@stop
