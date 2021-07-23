@extends('component\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is brand page
            </h1>
            <a href="{{ url('/admin/add-brand') }}"> Add New Brand </a>
        </div>
    </div>
@stop
