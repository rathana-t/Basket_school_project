@extends('admin\admin')

@section('sidebar-content')
    <div class="text-center">
        <h1>
            All
        </h1>
        <a href="{{ url('/admin/add-secondarycategory') }}"> Add New Category </a>
    </div>

    <table class="table table-hover text-center">
        <thead>
            <tr class="text-center">
                <th scope="col">Image</th>
                <th scope="col">ID</th>
                <th scope="col">Secondary category name</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seCategory as $item)
                <tr class="list">
                    <td>
                        <a>
                            <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt="">
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
                        <button type="button" value="{{ $item->id }}" class="deletebtn btn btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
