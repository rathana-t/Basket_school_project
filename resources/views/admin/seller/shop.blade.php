@extends('admin/seller/seller')
@section('content')
    <div class="card border-0 shadow rounded">
        <div style="min-height: 500px">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="bg-color2 text-white">
                        <th scope="col">Image</th>
                        <th scope="col">ID</th>
                        <th scope="col">Shop</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phonenumber</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellers as $item)
                        <tr class="seller-list">
                            <td>
                                @if ($item->profile == '')
                                    No Image
                                @else
                                    <a href="seller/{{ $item->id }}">
                                        <img src="/images/sellerProfile/{{ $item->profile }}" alt=""
                                            class="img-fluid">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                <div class="b">
                                    {{ $item->store_name }}
                                </div>
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                <div class="b Address" style="cursor: pointer">
                                    {{ $item->address }}
                                </div>
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>
                            <td>
                                <a href="seller/{{ $item->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-dark">View</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-dark">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pl-4">
            {{ $sellers->links() }}
        </div>
    </div>

@endsection
