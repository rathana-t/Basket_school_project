@extends('application')

@section('content')
    @include('/home/components/navigation')

    <div class="container mt-4 text-center">
        This is brand page
        @foreach ($product as $item)
            <p>
                {{ $item->name }}
            </p>
        @endforeach
    </div>
@stop
