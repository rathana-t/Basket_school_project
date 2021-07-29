@extends('layouts\sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is messages page
            </h1>
            @foreach ($sellerHasProduct as $item)
                {{ $item->msg }}
            @endforeach
        </div>
    </div>
@stop
