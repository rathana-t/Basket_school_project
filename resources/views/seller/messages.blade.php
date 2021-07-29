@extends('seller\seller')


@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is messages page
            </h1>

        </div>
        {{ $i = 0 }}
        <table class="table table-hover">
            <thead>
                <tr class="text-left">
                    <th scope="col">ID</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellerHasMessage as $item)
                    @if ($item->sent == 1)
                        <tr class="seller-list text-left " style="background-color: aquamarine">
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    {{ ++$i }}
                                </a>
                            </td>
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    {{ $item->msg }}
                                </a>
                            </td>
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    {{ $item->created_at }}
                                </a>
                            </td>
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    <button type="button" class="btn btn-info">View</button>
                                </a>
                                <button type="button" value="{{ $item->id }}" class="deletebtn btn btn-danger">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @else
                        <tr class="seller-list text-left ">
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    {{ ++$i }}
                                </a>
                            </td>
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    {{ $item->msg }}
                                </a>
                            </td>
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    {{ $item->created_at }}
                                </a>
                            </td>
                            <td>
                                <a href="messages/{{ $item->id }}">
                                    <button type="button" class="btn btn-info">View</button>
                                </a>
                                <button type="button" value="{{ $item->id }}" class="deletebtn btn btn-danger">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endif

                @endforeach
            </tbody>
        </table>
    </div>
@stop
