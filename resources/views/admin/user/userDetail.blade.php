@extends('admin\admin')

@section('sidebar-content')
    <h1 class="text-center">{{ $user->username }}</h1>

    <div>
        <div>
            <td class="text-left">
                <strong class="col">Name: </strong> {{ $user->username }}
            </td>
        </div>
        <div class="col">
            <td class="text-left">
                <strong>Phone NUmber: </strong> {{ $user->phone }}
            </td>
        </div>
        <div class="col">
            <td class="text-left">
                @if ($user->address == '')
                    <div style="color: rgba(255, 140, 0, 0.836)">
                        <Strong>Address:</Strong> No address
                    </div>
                @else
                    <div class="b Address" style="cursor: pointer">
                        <Strong>Address:</Strong> {{ $user->address }}
                    </div>
                @endif
            </td>
        </div>
        <div class="col">
            <td class="text-left">
                <Strong>Joined:</Strong> {{ $user->created_at }}
            </td>
        </div>
    </div>
@stop
