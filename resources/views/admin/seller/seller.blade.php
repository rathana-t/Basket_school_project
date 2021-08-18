@extends('admin\admin')

@section('sidebar-content')

    @include('/admin/components/modal')
    <div style="min-height: 75vh">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-left">Image</th>
                    <th scope="col" class="text-left">ID</th>
                    <th scope="col" class="text-left">Store name</th>
                    <th scope="col" class="text-left">Email</th>
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
                            <a href="seller/{{ $item->id }}">
                                <img src="/images/sellerProfile/{{ $item->profile }}" alt="" class="img-fluid">
                            </a>
                        </td>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td class="text-left">
                            {{ $item->store_name }}
                        </td>
                        <td class="text-left">
                            {{ $item->email }}
                        </td>
                        <td class="text-left">
                            {{ $item->phone }}
                        </td>
                        <td class="text-left">
                            <div class="b Address" style="cursor: pointer">
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
    </div>
    {{ $sellers->links() }}



@stop
