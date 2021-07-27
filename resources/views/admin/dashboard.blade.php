@extends('admin\admin')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            @if (Session::has('brand_add'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('brand_add') }}
                </div>
            @endif
            <h1>
                This is dashboard page
            </h1>
        </div>
    </div>
@stop
