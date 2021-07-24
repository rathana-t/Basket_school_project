@extends('layouts\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <h1 class="text-center">User</h1>
        <div class="text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">ID</th>
                        <th scope="col" class="text-left">Username</th>
                        <th scope="col" class="text-left">Phonenumber</th>
                        <th scope="col" class="text-left">Joined</th>
                        <th scope="col" class="text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <th scope="row" class="text-left">{{ $item->id }}</th>
                            <td class="text-left">{{ $item->username }}</td>
                            <td class="text-left">{{ $item->phone }}</td>
                            <td class="text-left">{{ $item->created_at }}</td>
                            <td class="text-left">
                                <a href="user/{{$item->id}}">
                                    <button type="button" class="btn btn-info">View</button>
                                </a>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
