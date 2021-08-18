@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')

    <div class="text-center">
        <a href="{{ url('/admin/add-brand') }}"> Add New Brand </a>
    </div>
    <div style="min-height: 75vh">

        <table class="table table-hover seller-list">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="text-left">Image</th>
                    <th scope="col" class="text-left">ID</th>
                    <th scope="col" class="text-left">Brand</th>
                    <th scope="col" class="text-left">Created at</th>
                    <th scope="col" class="text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $item)
                    <tr>
                        <td>
                            <a>
                                <img src="/images/brandImages/{{ $item->brand_img }}" alt="" style="object-fit: contain">
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $item->id }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $item->created_at }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                <button type="button" class="btn btn-info">View</button>
                            </a>
                            <button type="button" value="{{ $item->id }}" class="delete_brand_btn btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $brands->links() }}

@stop
