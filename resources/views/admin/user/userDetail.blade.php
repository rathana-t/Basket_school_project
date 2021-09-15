@extends('admin\admin')

@section('sidebar-content')
    <h1 class="text-center">{{ $user->username }}</h1>

    <td class="text-left">
        {{ $user->username }}
    </td>
    <td class="text-left">
        {{ $user->phone }}
    </td>
    <td class="text-left">
        @if ($user->address == '')
            <div style="color: rgba(255, 140, 0, 0.836)">
                No address
            </div>
        @else
            <div class="b Address" style="cursor: pointer">
                {{ $user->address }}
            </div>
        @endif
    </td>
    <td class="text-left">
        {{ $user->created_at }}
    </td>
@stop
