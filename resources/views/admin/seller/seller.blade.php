@extends('admin\admin')

@section('sidebar-content')
    <h1 class="text-center">Seller</h1>
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
                    <td>
                        {{ $item->id }}
                    </td>
                    <td class="text-left">
                        {{ $item->store_name }}
                    </td>
                    <td class="text-left">
                        {{ $item->phone }}
                    </td>
                    <td class="text-left">
                        <div class="b">
                            {{ $item->address }}
                        </div>
                    </td>
                    <td class="text-left">
                        {{ $item->created_at }}
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

    {{ $sellers->links() }}

@stop
