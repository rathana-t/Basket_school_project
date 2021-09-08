@extends('application')

@section('content')
    @include('/home/components/navbar_user')

    <style>
        div.a {
            white-space: nowrap;
            width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .list-group .active {
            background-color: #80858a !important;
            border-color: #80858a !important;
        }

        .list-group span {
            color: #035ebe;
            text-transform: capitalize;
        }

    </style>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach ($data as $item)
                        @if ($item->read == 0)
                            <a class="list-group-item list-group-item-action active" aria-current="true"
                                href="/message/{{ $item->id }}">
                                <div class="d-flex justify-content-between pt-2 pb-2">
                                    <div class="a">
                                        <span>{{ $item->store_name }}</span> : {{ $item->message }}
                                    </div>
                                    <div>
                                        {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    </div>
                                </div>
                            </a>
                        @else
                            <a class="list-group-item list-group-item-action" aria-current="true"
                                href="/message/{{ $item->id }}">
                                <div class="d-flex justify-content-between pt-2 pb-2">
                                    <div class="a">
                                        <span>{{ $item->store_name }}</span>: {{ $item->message }}
                                    </div>
                                    <div>
                                        {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop
