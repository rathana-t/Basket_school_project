@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')
    <div class="text-left">
        <a href="{{ url('/admin/add-category') }}" class="btn btn-sm btn-success"> Add New Category </a>
    </div>

    {{-- <div style="min-height: 75vh">

        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="text-left">Image</th>
                    <th scope="col" class="text-left">ID</th>
                    <th scope="col" class="text-left">Category name</th>
                    <th scope="col" class="text-left">Created at</th>
                    <th scope="col" class="text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr class="seller-list">
                        <td>
                            <a>
                                <img src="/images/categoryImages/{{ $item->category_img }}" alt="">
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
                            <button type="button" value="{{ $item->id }}" class="delete_cate_btn btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }} --}}

    <div class="category pt-3">
        <div class="category-item">
            <div class="row mt-3">
                @foreach ($cate as $item)
                    <div class="col-xs-6 col-sm-4">
                        {{-- <a href="category/{{ $item->id }}"> --}}
                        <div class="card-banner align-items-end background-img mb-4"
                            style="background-image: url('/images/categoryImages/{{ $item->category_img }}')">
                            <div class="caption m-4 w-100">
                                <h5 class="text-white card-title">
                                    {{ $item->name }}
                                </h5>
                            </div>
                        </div>
                        {{-- </a> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
