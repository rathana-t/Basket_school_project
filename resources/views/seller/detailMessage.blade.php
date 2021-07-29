@extends('seller\seller')


@section('sidebar-content')
    <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header">
                Product name
            </div>
            <div class="card-body">
                <p class="text-left">
                    {{ $message->msg }}
                </p>
                <a href="#" class="btn btn-primary">Edit now</a>
            </div>
        </div>
    </div>
@stop
