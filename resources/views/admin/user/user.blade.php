@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card border-0 shadow-sm rounded">
        <div style="min-height: 500px">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phonenumber</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="user-list">
                            <th scope="row" class="text-left">
                                {{ $item->id }}
                            </th>
                            <td class="text-left">
                                {{ $item->username }}
                            </td>
                            <td class="text-left">
                                {{ $item->phone }}
                            </td>
                            <td class="text-left">
                                @if ($item->address == '')
                                    <div style="color: rgba(255, 140, 0, 0.836)">
                                        No address
                                    </div>
                                @else
                                    <div class="b Address" style="cursor: pointer">
                                        {{ $item->address }}
                                    </div>
                                @endif
                            </td>
                            <td class="text-left">
                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="text-left">
                                <a href="user/{{ $item->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-dark">View</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-dark removeUser"
                                    value="{{ $item->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pl-2">
            {{ $users->links() }}
        </div>
    </div>
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you are sure you want to delete this user?
                    <br>
                    All wishlist and order will also delete.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ url('/admin/deleteUser') }}" method="post">

                        @csrf
                        <input hidden id="delete_user" name="id">
                        <button type="submit" class="btn btn-danger" id="delete_user">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.removeUser', function() {
                var getsellerid = $(this).val();
                console.log(getsellerid);
                $('#show').modal('show');
                $('#delete_user').val(getsellerid);
            });
        });
    </script>
    {{-- <div style="min-height: 75vh">
        <div class="text-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">ID</th>
                        <th scope="col" class="text-left">Username</th>
                        <th scope="col" class="text-left">Phonenumber</th>
                        <th scope="col" class="text-left">Address</th>
                        <th scope="col" class="text-left">Joined</th>
                        <th scope="col" class="text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="user-list">
                            <th scope="row" class="text-left">
                                {{ $item->id }}
                            </th>
                            <td class="text-left">
                                {{ $item->username }}
                            </td>
                            <td class="text-left">
                                {{ $item->phone }}
                            </td>
                            <td class="text-left">
                                @if ($item->address == '')
                                    <div style="color: rgba(255, 140, 0, 0.836)">
                                        No address
                                    </div>
                                @else
                                    <div class="b Address" style="cursor: pointer">
                                        {{ $item->address }}
                                    </div>
                                @endif
                            </td>
                            <td class="text-left">
                                {{ $item->created_at }}
                            </td>
                            <td class="text-left">
                                <a href="user/{{ $item->id }}">
                                    <button type="button" class="btn btn-sm btn-info">View</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->links() }} --}}
@stop
