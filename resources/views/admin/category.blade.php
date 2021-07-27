@extends('admin\admin')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is category page
            </h1>
            <a href="{{ url('/admin/add-category') }}"> Add New Category </a>
        </div>
    </div>
@stop
