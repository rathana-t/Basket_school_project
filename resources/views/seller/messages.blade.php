@extends('seller\seller')


@section('sidebar-content')
    <style>
        div.a {
            white-space: nowrap;
            width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>
    <div class="container">
        <h5>
            Messages
        </h5>
        <div class="list-group">
            @foreach ($sellerHasMessage as $item)
                @if ($item->sent == 1)
                    <a href="messages/{{ $item->id }}" class="list-group-item list-group-item-action active"
                        aria-current="true">
                        <div class="d-flex justify-content-between">
                            <div class="a">
                                {{ $item->msg }}
                            </div>
                            <div>
                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                @else
                    <a href="messages/{{ $item->id }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <div class="a">
                                {{ $item->msg }}
                            </div>
                            <div>
                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@stop
