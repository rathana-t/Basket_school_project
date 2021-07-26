@extends('layouts\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <h1 class="text-center">Seller</h1>
        <div class="text-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">ID</th>
                        <th scope="col" class="text-left">Store name</th>
                        <th scope="col" class="text-left">Phonenumber</th>
                        <th scope="col" class="text-left">Address</th>
                        <th scope="col" class="text-left">Joined</th>
                        <th scope="col" class="text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellers as $item)
                        <tr class="seller-list">
                            <th scope="row" class="text-left">
                                <a href="seller/{{ $item->id }}">
                                    {{ $item->id }}
                                </a>
                            </th>
                            <td class="text-left">
                                <a href="seller/{{ $item->id }}">
                                    {{ $item->store_name }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="seller/{{ $item->id }}">
                                    {{ $item->phone }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="seller/{{ $item->id }}">
                                    {{ $item->address }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="seller/{{ $item->id }}">
                                    {{ $item->created_at }}
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="seller/{{ $item->id }}">
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
