@extends('seller\seller')


@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            @if (Session::has('product_add'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('product_add') }}
                </div>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <h1>
                This is dashboard page
            </h1>
        </div>
    </div>
@stop
